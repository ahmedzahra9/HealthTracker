<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;

class chatUser implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $reservation_id;
    public $user_id;
    public $doctor_name;
    public $message;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($reservation_id,$user_id,$doctor_name,$message)
    {
        $this->reservation_id = $reservation_id;
        $this->user_id = $user_id;
        $this->doctor_name = $doctor_name;
        $this->message = $message;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('user_chat'.(string)$this->user_id);
    }
     public function broadcastWith(){

         return [
             'reservation_id'=>$this->reservation_id,
             'message'=>$this->message,
             'doctor_name'=>$this->doctor_name,
             'user_id'=>$this->user_id,
            ];
         //dd(['name'=>'hamza123','id'=>'1']);
     }
     public function broadcastAs(){
         return 'user_chat_bind';
     }
}
