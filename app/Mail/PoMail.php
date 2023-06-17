<?php

namespace App\Mail;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PoMail extends Mailable
{
    use Queueable, SerializesModels;
    public $attachment;
    public $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($emailData)
    {
        $this->attachment = $emailData['attachment'];
        $this->data = $emailData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subjectEmail = "Purchase Order baru - ". $this->data['no_order'] . "/" . now()->format('d F Y');
        return $this->view('purchaseorder.excel.template_Email_PO')->with('data',$this->data)->subject($subjectEmail)->attach($this->attachment);
    }
}
