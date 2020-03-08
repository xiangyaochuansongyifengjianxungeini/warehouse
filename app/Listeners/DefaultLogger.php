<?php

namespace App\Listeners;

use App\Events\DefaultLoggable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\ActionLog;
use Illuminate\Support\Facades\Request;

class DefaultLogger
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  DefaultLoggable  $event
     * @return void
     */
    public function handle(DefaultLoggable $event)
    {
        ActionLog::create([
            'user_id'    => $event->userId,
            'title'      => $event->title,
            'content'    => $event->content,
            'model'      => $event->model,
            'model_id'   => $event->modelId,
            'comment' => $event->comment,
            'url' => '',
            // 'uri'        => Request::getRequestUri(),
            // 'os'         => BrowserDetector::getOS(),
            // 'browser'    => BrowserDetector::getBrowser(),
            // 'created_ip' => get_client_ip(),
        ]);
    }
}
