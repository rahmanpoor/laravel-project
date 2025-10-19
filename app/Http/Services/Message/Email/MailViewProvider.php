<?php


namespace App\Http\Services\Message\Email;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Queue\SerializesModels;

class MailViewProvider extends Mailable
{

    use Queueable, SerializesModels;

    public $details;

    public function __construct($details, $subject, $from, $file = null)
    {
        $this->details = $details;
        $this->subject = $subject;
        $this->from = $from;
        $this->file = $file;
    }


    public function build()
    {
        return $this->subject($this->subject)->view('emails.send-otp');
    }

    public function attachments()
    {
        $publicFiles = [];
        if ($this->file) {
            foreach ($this->file as $file) {
                array_push($publicFiles, public_path($file));
            }
        }
        return $publicFiles;
    }
}
