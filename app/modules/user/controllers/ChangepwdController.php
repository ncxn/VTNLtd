<?php
namespace Vtnltd\Modules\User\Controllers;

use Vtnltd\Model\User\UserPasswordChanges;
use Vtnltd\Forms\User\ChangePasswordForm;

class ChangePwdController extends ControllerBase    {
    /**
     * Users must use this action to change its password
     */
    public function indexAction()
    {
        $form = new ChangePasswordForm();
        $user = $this->auth->getUser();
        
        if(!$user){
            $this->metroFlash->error("Please login first!");
        }else{
            if ($this->request->isPost()) {
                if (!$form->isValid($this->request->getPost())) {
                    foreach ($form->getMessages() as $message) {
                        $this->metroFlash->error($message);
                    }
                } else {
                    $password = $this->request->getPost("currentPassword");
                    
                    if ($this->security->checkHash($password, $user->getPassword())) {    
                        $user->setPassword($this->security->hash($this->request->getPost('password')));
                        $user->setMustChangePassword(0);
                        $passwordChange = new UserPasswordChanges();
                        $passwordChange->user = $user;
                        $passwordChange->setIpAddress($this->request->getClientAddress());
                        $passwordChange->setUserAgent($this->request->getUserAgent());
                                            
                            if (!$passwordChange->save()) {
                                $this->metroFlash->error($passwordChange->getMessages());
                            } else {
                                $this->auth->remove();
                                return $this->response->redirect('/user/login');
                            }
                    }else{
                        $this->metroFlash->error("Wrong Current Password");
                    }
                }
            }
        }
        $this->view->form = $form;
    }
}