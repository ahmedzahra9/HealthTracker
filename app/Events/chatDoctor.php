<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;

class chatDoctor implements ShouldBroadcastNow
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
    public function __construct($reservation_id,$doctor_id,$user_name,$message)
    {
        $this->reservation_id = $reservation_id;
        $this->doctor_id = $doctor_id;
        $this->user_name = $user_name;
        $this->message = $message;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('doctor_chat'.(string)$this->doctor_id);
    }
    public function broadcastWith(){

        return [
            'reservation_id'=>$this->reservation_id,
            'message'=>$this->message,
            'user_name'=>$this->user_name,
            'doctor_id'=>$this->doctor_id,
        ];
        //dd(['name'=>'hamza123','id'=>'1']);
    }
    public function broadcastAs(){
        return 'doctor_chat_bind';
    }
}
