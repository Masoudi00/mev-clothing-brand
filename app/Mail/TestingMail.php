<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class TestingMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */

     public $data;
    public function __construct($data)
    {
        $this->data = $data;
    }

    public function build()
{
   
   return $this->view('admin.emailContent')
   ->subject($this->data['subject'])
   ->with(['msg' => $this->data['message']]);

}


    /**
     * Get the message envelope.
     */
  /*  public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Test Mail',
        );
    }

    /**
     * Get the message content definition.
     */
   /* public function content(): Content
    {
       return new Content(
         //   view: 'email',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
   /* public function attachments(): array
    {
        return [];
    }*/
}
