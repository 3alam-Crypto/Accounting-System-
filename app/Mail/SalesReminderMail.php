<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SalesReminderMail extends Mailable
{
    use Queueable, SerializesModels;

    public $salesToRemind;

    /**
     * Create a new message instance.
     *
     * @param array $salesToRemind
     */
    public function __construct($salesToRemind)
    {
        $this->salesToRemind = $salesToRemind;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('admin.email.sales-reminder')
                    ->subject('Sales Reminder Mail');
    }
}
