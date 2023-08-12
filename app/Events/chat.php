<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;

class chat implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $reservation_id;
    public $message;
    public $sender_type;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($reservation_id,$message,$sender_type)
    {
        // $this->fId = $fId;
        // $this->uId = $uId;
        // $this->message = $message;
        $this->reservation_id = $reservation_id;
        $this->message = $message;
        $this->sender_type = $sender_type;
        // $this->status = $status;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('reservation_chat'.(string)$this->reservation_id);
    }
     public function broadcastWith(){

         return [
             'reservation_id'=>$this->reservation_id,
             'message'=>$this->message,
             'sender_type'=>$this->sender_type,
            ];
         //dd(['name'=>'hamza123','id'=>'1']);
     }
     public function broadcastAs(){
         return 'reservation_chat_bind';
     }
}
