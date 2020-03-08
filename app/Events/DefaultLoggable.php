<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Support\Facades\Auth;

class DefaultLoggable
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $title;
 
    public $content;
 
    public $userId;
 
    public $model;
 
    public $modelId;

    public $comment;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(string $title, string $content, $userId = null, $model = null, $modelId = null,$comment = null)
    {
        $this->title = $title;
        $this->content = $content;
        // $this->userId = $userId ? $userId : (Auth::check() ? Auth::user()->id : 0);
        $this->userId = Auth('api')->user()->id;
        $this->model = $model;
        $this->modelId = $modelId;

        $this->comment = $comment;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
