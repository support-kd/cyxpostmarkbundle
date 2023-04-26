<?php


namespace SupportKd\CyxPostMarkBundle\Model;

use SupportKd\CyxPostMarkBundle\Lib\PostmarkClient;
use SupportKd\CyxPostMarkBundle\Lib\PostmarkException;
use Symfony\Component\Config\Definition\Exception\Exception;

/**
 * Created by PhpStorm.
 * User: cyx-Rizwan
 * Date: 4/7/2017
 * Time: 10:30 AM
 */
class PostMarkModel extends BaseModel
{
    /**
     * Send an email.
     *
     * @param  string $from The sender of the email. (Your account must have an associated Sender Signature for the address used.)
     * @param  string $to  The recipient of the email.
     * @param  string $subject  The subject of the email.
     * @param  string $htmlBody  The HTML content of the message, optional if Text Body is specified.
     * @param  string $textBody  The text content of the message, optional if HTML Body is specified.
     * @param  string $tag  A tag associated with this message, useful for classifying sent messages.
     * @param  boolean $trackOpens  True if you want Postmark to track opens of HTML emails.
     * @param  string $replyTo  Reply to email address.
     * @param  string $cc  Carbon Copy recipients, comma-separated
     * @param  string $bcc  Blind Carbon Copy recipients, comma-separated.
     * @param  array $headers  Headers to be included with the sent email message.
     * @param  array $attachments  An array of PostmarkAttachment objects.
     * @param  string $trackLinks  Can be any of "None", "HtmlAndText", "HtmlOnly", "TextOnly" to enable link tracking.
     * @return array response
     */
    public function sendEmail($toEmail,$subject, $htmlBody = NULL, $textBody = NULL,
                              $tag = NULL, $trackOpens = true, $replyTo = NULL, $cc = NULL, $bcc = NULL,
                              $headers = NULL, $attachments = NULL, $trackLinks = NULL){
        $response = '';

        try{
            $client = new PostmarkClient($this->account_api_token);
            $client::$VERIFY_SSL = $this->verify_ssl;

            //Check SandBox Mode
            if($this->sandbox_mode === TRUE){
                $toEmail = $this->sandbox_email;
            }

            $sendResult = $client->sendEmail(
                $this->sender_signature,
                $toEmail,
                $subject,
                $htmlBody,
                $textBody,
                $tag,
                $trackOpens,
                $replyTo,
                $cc,
                $bcc,
                $headers,
                $attachments,
                $trackLinks
            );

            return $response = $sendResult;

        }catch(PostmarkException $ex){
            // If client is able to communicate with the API in a timely fashion,
            // but the message data is invalid, or there's a server error,
            // a PostmarkException can be thrown.

            $response = $ex;
            return $response;

        }catch(Exception $generalException){
            // A general exception is thrown if the API
            // was unreachable or times out.
            return $response = $generalException;
        }
    }


    /**
     * Send an email using a template.
     *
     * @param  string $from The sender of the email. (Your account must have an associated Sender Signature for the address used.)
     * @param  string $to The recipient of the email.
     * @param  integer $templateId  The ID of the template to use to generate the content of this message.
     * @param  object $templateModel  The values to combine with the Templated content.
     * @param  boolean $inlineCss  If the template contains an HTMLBody, CSS is automatically inlined, you may opt-out of this by passing 'false' for this parameter.
     * @param  string $tag  A tag associated with this message, useful for classifying sent messages.
     * @param  boolean $trackOpens  True if you want Postmark to track opens of HTML emails.
     * @param  string $replyTo  Reply to email address.
     * @param  string $cc  Carbon Copy recipients, comma-separated
     * @param  string $bcc  Blind Carbon Copy recipients, comma-separated.
     * @param  array $headers  Headers to be included with the sent email message.
     * @param  array $attachments  An array of PostmarkAttachment objects.
     * @param  string $trackLinks  Can be any of "None", "HtmlAndText", "HtmlOnly", "TextOnly" to enable link tracking.
     * @return array response
     */
    function sendEmailWithTemplate($toEmail, $templateId, $templateModel, $inlineCss = true,
                                   $tag = NULL, $trackOpens = true, $replyTo = NULL,
                                   $cc = NULL, $bcc = NULL,
                                   $headers = NULL, $attachments = NULL, $trackLinks = NULL) {
        $response = '';

        try{
            $client = new PostmarkClient($this->account_api_token);
            $client::$VERIFY_SSL = $this->verify_ssl;

            //Check SandBox Mode
            if($this->sandbox_mode === TRUE){
                $toEmail = $this->sandbox_email;
            }

            $sendResult = $client->sendEmailWithTemplate(
                $this->sender_signature,
                $toEmail,
                $templateId,
                $templateModel,
                $inlineCss,
                $tag,
                $trackOpens,
                $replyTo,
                $cc,
                $bcc,
                $headers,
                $attachments,
                $trackLinks
            );

            return $response = $sendResult;

        }catch(PostmarkException $ex){
            // If client is able to communicate with the API in a timely fashion,
            // but the message data is invalid, or there's a server error,
            // a PostmarkException can be thrown.

            $response = $ex;
            return $response;

        }catch(Exception $generalException){
            // A general exception is thrown if the API
            // was unreachable or times out.
            return $response = $generalException;
        }
    }
   
}