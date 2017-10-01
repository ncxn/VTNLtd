<?php
namespace Vtnltd\Modules\User\Controllers;

use Vtnltd\Model\User\User;
use Vtnltd\Model\User\UserResetPasswords;
use Vtnltd\Forms\User\ForgotPasswordForm;

use Vtnltd\Lib\Auth\Exception as AuthException;


class lostPwdController extends ControllerBase    {
    
    public function indexAction()    {
        $this->dispatcher->forward(
            [
                "controller" => "lostPwd",
                "action"     => "forgotPassword",
            ]
        );
    }
    
    /**
     * Shows the forgot password form
     */
    public function forgotPasswordAction()
    {
        $form = new ForgotPasswordForm();
        if ($this->request->isPost()) {
            // Send emails only is config value is set to true
            if ($this->getDI()->get('config')->useMail) {
                if ($form->isValid($this->request->getPost()) == false) {
                    foreach ($form->getMessages() as $message) {
                        $this->metroFlash->error($message);
                    }
                } else {
                    $user = User::findFirstByEmail($this->request->getPost('email'));
                    if (!$user) {
                        $this->metroFlash->warning('There is no account associated to this email');
                    } else {
                        $resetPassword = new UserResetPasswords();
                        $resetPassword->setUserId($user->getId());
                        if ($resetPassword->save()) {
                            $this->metroFlash->success('Success! Please check your messages for an email reset password');
                        } else {
                            foreach ($resetPassword->getMessages() as $message) {
                                $this->metroFlash->error($message);
                            }
                        }
                    }
                }
            } else {
                $this->metroFlash->warning('Emails are currently disabled. Change config key "useMail" to true to enable emails.');
            }
        }
        $this->view->form = $form;
    }

}