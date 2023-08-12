<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;

class following implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $reservation_id;
    public $doctor_id;
    public $user_name;
    public $message;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($reservation_id,$message,$doctor_id,$user_name)
    {
        $this->reservation_id = $reservation_id;
        $this->message = $message;
        $this->doctor_id = $doctor_id;
        $this->user_name = $user_name;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('following'.(string)$this->doctor_id);
    }
     public function broadcastWith(){

         return [
             'reservation_id'=>$this->reservation_id,
             'message'=>$this->message,
             'doctor_id'=>$this->doctor_id,
             'user_name'=>$this->user_name,
            ];
         //dd(['name'=>'hamza123','id'=>'1']);
     }
     public function broadcastAs(){
         return 'following_bind';
     }
}
