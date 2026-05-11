<?php
declare(strict_types=1);

namespace App\Mailer;

use Cake\Mailer\Mailer;

class ResetPasswordMailer extends Mailer
{
    public function sendCode($user, $code, $verifyLink)
    {
        $this
            ->setEmailFormat('html')
            ->setTo($user->email)
            ->setSubject('Your Password Reset Code')
            ->setViewVars([
                'name' => $user->name ?? 'User',
                'code' => $code,
                'verifyLink' => $verifyLink
            ])
            ->viewBuilder()
            ->setTemplate('reset_code');
    }
}
