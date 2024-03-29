<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;


class EventNotification
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    public $event;
    public $user;

    public function __construct($event, $user)
    {
        $this->event = $event;
        $this->user = $user;
    }

    public function handle()
    {
        if (UserEmailNotificationSetup('Event_Invitation', $this->user)) {
            SendGeneralEmail::dispatch($this->user, 'Event_Invitation', [
                'name' => $this->user->name,
                'event_title' => $this->event->title,
                'event_host' => $this->event->host,
                'event_url' => $this->event->url,
                'start_date' => showDate($this->event->from_date),
                'end_date' => showDate($this->event->to_date),
                'start_time' => $this->event->start_time,
                'end_time' => $this->event->end_time,
                'description' => $this->event->event_des,
                'event_location' => $this->event->event_location,
            ]);
        }
        if (UserBrowserNotificationSetup('Event_Invitation', $this->user)) {
            send_browser_notification($this->user, 'Event_Invitation', [
                'name' => $this->user->name,
                'event_title' => $this->event->title,
                'event_host' => $this->event->host,
                'event_url' => $this->event->url,
                'start_date' => showDate($this->event->from_date),
                'end_date' => showDate($this->event->to_date),
                'start_time' => $this->event->start_time,
                'end_time' => $this->event->end_time,
                'description' => $this->event->event_des,
                'event_location' => $this->event->event_location,
            ],
                trans('common.View'),
                $this->event->url
            );
        }
        if (UserSmsNotificationSetup('Event_Invitation', $this->user)) {
            send_sms_notification($this->user, 'Event_Invitation', [
                'name' => $this->user->name,
                'event_title' => $this->event->title,
                'event_host' => $this->event->host,
                'event_url' => $this->event->url,
                'start_date' => showDate($this->event->from_date),
                'end_date' => showDate($this->event->to_date),
                'start_time' => $this->event->start_time,
                'end_time' => $this->event->end_time,
                'description' => $this->event->event_des,
                'event_location' => $this->event->event_location,
            ]);
        }

        if (UserMobileNotificationSetup('Event_Invitation', $this->user) && !empty($this->user->device_token)) {
            send_mobile_notification($this->user, 'Event_Invitation', [
                'name' => $this->user->name,
                'event_title' => $this->event->title,
                'event_host' => $this->event->host,
                'event_url' => $this->event->url,
                'start_date' => showDate($this->event->from_date),
                'end_date' => showDate($this->event->to_date),
                'start_time' => $this->event->start_time,
                'end_time' => $this->event->end_time,
                'description' => $this->event->event_des,
                'event_location' => $this->event->event_location,
            ]);
        }
    }
}
