<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
class InvoiceNotification extends Notification
{
    use Queueable;
 

    protected  $invoice_id;
    public function __construct($invoice_id)
    {
        $this->invoice_id =$invoice_id;
    }

   
    public function via($notifiable)
    {
        return ['database'];
    }

    
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    
    public function toDatabase($notifiable)
    {
        return [
            'ID'=>$this->invoice_id,
                'title'=>'تم اضافه فاتوره جديده',
                'user'=>auth()->user()->name,
        ];
    }
    
}
