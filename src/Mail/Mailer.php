<?php


namespace OsShareEmail\Mail;


use Swift_Image;
use Swift_Mailer;
use Swift_Message;
use Swift_SmtpTransport;

class Mailer
{
    /**
     * @var Swift_Mailer
     */
    private $swiftMailer;

    /**
     * @var
     */
    private $message;

    public function __construct()
    {
        $transport = (new Swift_SmtpTransport())
            ->setHost('<HOST_SMTP>')
            ->setEncryption('<TLS>')
            ->setPort(587)
            ->setUsername('<EMAIL>')
            ->setPassword('<PASSWORD>');

        $this->swiftMailer = new Swift_Mailer($transport);
        $this->createMessage();
    }


    public function send(string $message, string $subject, array $to, string $from, string $fromName)
    {
        $this->message
            ->setSubject($subject)
            ->setFrom([$from => $fromName])
            ->setTo($to)
            ->setBody($message);

        $this->swiftMailer->send($this->message);
    }

    /**
     *
     */
    private function createMessage()
    {
        $this->message = new Swift_Message();
        $type = $this->message->getHeaders()->get('Content-Type');
        $type->setValue('text/html');
        $type->setParameter('charset', 'utf-8');
	$header = $this->message->getHeaders();
    	$header->addTextHeader("Content-Language", "spa-ES");
    }

    /**
     * @param $image
     * @return Swift_Image
     */
    public static function createImage($image)
    {
       return Swift_Image::fromPath($image);
    }



}