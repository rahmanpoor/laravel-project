<?php


namespace App\Http\Services\Message\Email;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Queue\SerializesModels;

class MailViewProvider extends Mailable {

    use Queueable, SerializesModels;

    public $details;

    public function __construct($details, $subject, $from, $attachments = null) {
       $this->details = $details;
       $this->subject = $subject;
       $this->from = $from;
    }


    public function build() {
        return $this->subject($this->subject)->view('emails.send-otp');
    }

    public function attachments() {
        return [
            Attachment::fromPath(public_path('attachments/1.png'))->as('attach1.png')->withMime('image/png')
        ];
    }

}
