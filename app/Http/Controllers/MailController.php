<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Socketlabs\SocketLabsClient;
use Socketlabs\Message\BasicMessage;
use Socketlabs\Message\EmailAddress;


class MailController extends Controller
{

    private $socketlabsClient;

    function __construct()
    {
        $this->socketlabsClient = new SocketLabsClient(env('SOCKETLABS_SERVER_ID'), env('SOCKETLABS_API_KEY'));
    }

    public function send_email_verification(string $subject, string $htmlBody, string $plainBody = null, User $recipient)
    {
        $message = new BasicMessage();

        $message->subject = $subject;
        $message->htmlBody = $htmlBody;
        $message->plainTextBody = $plainBody;

        $message->from = new EmailAddress("contact@contactmajor.com");
        $message->addBccAddress($recipient->email, $recipient->name);

        $response = $this->socketlabsClient->send($message);
    }
}
