<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\URL;
use Socketlabs\SocketLabsClient;
use Socketlabs\Message\BasicMessage;
use Socketlabs\Message\BulkMessage;
use Socketlabs\Message\EmailAddress;


class MailController extends Controller
{

    private $socketlabsClient;

    function __construct()
    {
        $this->socketlabsClient = new SocketLabsClient(env('SOCKETLABS_SERVER_ID'), env('SOCKETLABS_API_KEY'));
    }

    public function send_email_verification(string $subject, string $htmlBody = null, string $plainBody = null, User $recipient)
    {
        try {
            $message = new BulkMessage();

            $message->subject = $subject;
            $message->htmlBody = file_get_contents(__DIR__ . '\..\..\..\public\verify-email-template.html');
            $message->addGlobalMergeData("recipient", $recipient->name);
            $message->addGlobalMergeData('verificationURL', URL::temporarySignedRoute(
                'verification.verify',
                Carbon::now()->addMinutes(Config::get('auth.verification.expire', 60)),
                [
                    'id' => $recipient->getKey(),
                    'hash' => sha1($recipient->getEmailForVerification()),
                ]
            ));
            $message->plainTextBody = $plainBody;

            $message->from = new EmailAddress("contact@contactmajor.com");
            $message->addToAddress($recipient->email, $recipient->name);
        } catch (\Throwable $th) {
            throw $th;
        }


        $response = $this->socketlabsClient->send($message);
    }
}
