<?php

namespace App\Listeners;

use App\Events\EmailProcessed;
use App\Listeners\Traits\Defaultable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class RestoreDefaultEmail
{
    use Defaultable;
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
    public function handle(EmailProcessed $event): void
    {
        $loadedEmails = $event->contact->load('emails')->emails()->get();
        $currentEmail = $event->email;
        $default = $this->findDefault($loadedEmails, $currentEmail);
        if ($default) {
            $loadedEmails->each(function ($item) use ($default) {
                $item->default = ($item->id == $default) ? true : false;
            });
            $event->contact->emails()->upsert($loadedEmails->toArray(),
                    uniqueBy: ['id'], update: ['default']);
        }
    }
}
