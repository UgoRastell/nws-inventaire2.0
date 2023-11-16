<?php

namespace App\Service;

use Symfony\Component\Mime\Email;
use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mailer\Transport\TransportInterface;

class MailService
{
    private $transport;

    public function __construct(TransportInterface $transport)
    {
        $this->transport = $transport;
    }

    public function sendMail($destinaire, $messageSubject, $messageBody): void
    {
        $mailer = new Mailer($this->transport);

        $email = (new Email())->from('urastell@normandiewebschool.fr')->to($destinaire)->subject($messageSubject)->html($messageBody);

        $mailer->send($email);
    }
}