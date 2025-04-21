<?php

namespace App\Listeners;

use Illuminate\Support\Facades\Log;
use Laravel\Cashier\Events\WebhookReceived;

class StripeEventListener
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
    public function handle(WebhookReceived $event): void
    {
        if($event->payload['type'] === 'checkout.session.completed') {
            Log::info('Stripe Checkout Session Completed', [
                'session' => $event->payload['data']['object'],
            ]);
        }
    }
}
