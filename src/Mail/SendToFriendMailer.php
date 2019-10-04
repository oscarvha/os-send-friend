<?php
namespace OsShareEmail\Mail;

use OsShareEmail\Template\Template;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

class SendToFriendMailer
{

    const SUBJECT_MAIL = 'they have shared you ';

    /**
     * @var Mailer
     */
    private $mailer;

    /**
     * @var Template
     */
    private $template;

    public function __construct()
    {
        $this->template = new Template();
        $this->mailer = new Mailer();
    }

    /**
     * @param string $name
     * @param string $url
     * @param string $email
     * @param string $image
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function sendEmail(string $name, string $url, string $email, string $image)
    {
        $render = $this->template->renderToString('mail/send_post.twig',[
            'name_post' => $name,
            'url_post' =>$url,
            'image_post' => $image
        ]);

        $to = [
            $email
        ];

        $this->mailer->send($render,self::SUBJECT_MAIL.$name.'OF <PAGE_NAME>',$to, '<FROM_EMAIL>','<FROM_NAME>');

    }

}