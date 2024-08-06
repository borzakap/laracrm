<?php

namespace App\Listeners;

use App\Events\PhoneProcessed;
use App\Listeners\Traits\Defaultable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class RestoreDefaultPhone
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
    public function handle(PhoneProcessed $event): void
    {
        $loadedPhones = $event->contact->load('phones')->phones()->get();
        $currentPhone = $event->phone;
        $default = $this->findDefault($loadedPhones, $currentPhone);
        if($default){
            $loadedPhones->each(function ($item) use ($default) {
                $item->default = ($item->id == $default) ? true : false;
            });
            $event->contact->phones()->upsert($loadedPhones->toArray(),
                    uniqueBy: ['id'], update: ['default']);
        }
    }
}
