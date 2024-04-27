<?php

namespace App\Http\Controllers\Api;

use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Services\ProductsService;
use App\Http\Requests\products\CreateProductRequest;
use App\Http\Requests\products\UpdateProductRequest;
use App\Http\Resources\CreateProductResource;
use App\Http\Resources\ProductsResource;
use App\Http\Resources\UpdateProductResource;
use App\Models\Product;

class ProductsController extends Controller
{
    use ApiResponse;

    public $productsService;
    public function __construct(ProductsService $productsService)
    {
        $this->productsService=$productsService; 
    }


    public function index(){
        return $this->productsService->getProducts();
    }

    public function store(CreateProductRequest $createProductRequest){
        if(!empty($createProductRequest->getErrors())){
            return response()->json($createProductRequest->getErrors(),406);
        }
        $data=$createProductRequest->request()->all();
        $data['user_id']=Auth::user()->id;
        $response=$this->productsService->createProduct($data);
        return $this->ApiResponse(new CreateProductResource($response));
    }

    public function update($id,UpdateProductRequest $updateProductRequest){
        if(!empty($updateProductRequest->getErrors())){
            return response()->json($updateProductRequest->getErrors(),406);
        }
        $data=$updateProductRequest->request()->all();
        $data['user_id']=Auth::user()->id;
        $response=$this->productsService->updateProduct($data,$id);
        return $this->ApiResponse(new UpdateProductResource($response));
    }

    public function destroy($id){
        $this->productsService->deleteProduct($id);
        return $this->ApiResponse('deleted successfully');
    }

    public function search(Request $request){
        $word=$request->input('search');
        $product=Product::search($word)->get();
        if(count($product)>0){
            return $this->ApiResponse(ProductsResource::collection($product));
        }
        else{
            return $this->ApiResponse('401','error');
        }

    }

}
