<?php

namespace App\Listeners;

use App\Mail\ProductMaillable;
use App\Events\CreateProductEvent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CreateProductListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(CreateProductEvent $event): void
    {
        Mail::to(Auth::user()->email)->send(new ProductMaillable($event->product));
    }
}
