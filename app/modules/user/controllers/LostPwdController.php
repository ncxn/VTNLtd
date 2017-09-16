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

        if ($this->request->isPost())
        {
            if (!$form->isValid($this->request->getPost()))
            {
                foreach ($form->getMessages() as $message)
                {
                    $this->metroFlash->error($message);
                }
            }
            else
            {
                $email = trim(strtolower($this->request->getPost('email')));
                $user  = User::findFirstByEmail($email);
                if (!$user)
                {
                    $this->metroFlash->error('There is no account associated to this email');
                }
                else
                {
                    $resetPassword = new UserResetPasswords();
                    $resetPassword->setUserId($user->getId());
                    if ($resetPassword->save())
                    {
                        $this->metroFlash->success('Success! Please check your messages for an email reset password');
                        $this->view->disable();
                        return $this->response->redirect($this->_activeLanguage.'/user/forgotPassword');
                    }
                    else
                    {
                        foreach ($resetPassword->getMessages() as $message)
                        {
                            $this->flash->error($message);
                        }
                    }
                }
            }
        }

        $this->view->form = $form;
        $this->view->pick('/lostPwd');
    }

}