<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Twilio;
use \App\Models\Message;

class MessageNotification extends Notification /*implements ShouldQueue*/
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */ 
    public $message;
    public function __construct(Message $message)
    {
        $this->message=$message;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {   
        try{
            Twilio::message('+'.$this->message->phone, $this->message->content);    
        }catch(\Exception $e){
            return $this->update_record(['status'=>'FAILED','response'=>$e]); 
        } 
        return $this->update_record(['status'=>'DONE','sent_at'=>now()]); 
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        
    }
    public function update_record($array){
        /*dd($this->message->id);*/
        //$message=\App\Models\Message::where('id',$this->message->id)->firstOrFail();
        $this->message->update($array);
        return 1;
    }
}
