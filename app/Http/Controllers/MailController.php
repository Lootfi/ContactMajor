<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
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

    public function send_via_request(Request $request)
    {

        try {
            $message = new BulkMessage();

            $message->subject = $request->subject;
            $message->htmlBody = file_get_contents(__DIR__ . '\..\..\..\public\verify-email-template.html');
            $message->addGlobalMergeData("recipient", $request->name);
            $message->plainTextBody = $request->plainBody;

            $message->from = new EmailAddress("contact@contactmajor.com");
            $message->addToAddress($request->email, $request->name);
        } catch (\Throwable $th) {
            throw $th;
        }


        $response = $this->socketlabsClient->send($message);

        return response()->json($response);
    }
}
