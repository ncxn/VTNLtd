<?php
namespace Vtnltd\Modules\User\Controllers;

use Vtnltd\Model\User\User;

use Vtnltd\Forms\User\RegisterForm;

use Vtnltd\Lib\Auth\Exception as AuthException;


class RegisterController extends ControllerBase    {
    
    public function indexAction()    {
        if($this->auth->isUserSignedIn()==true){
            $this->response->redirect('user/profile');
        }else{
            $this->dispatcher->forward(
                [
                "controller" => "Register",
                "action"     => "Register",
                ]
            );
        }
    }
    
    public function registerAction()
    {
        $form = new RegisterForm();
  
        if ($this->request->isPost()) {
            if (!$form->isValid($this->request->getPost())) {
                foreach($form->getMessages() as $message) {
                    $this->metroFlash->error($message->getMessage());
                }
            } else {
                $user = new User();
                $user->assign(array(
                    'name' => $this->request->getPost('name', 'striptags'),
                    'email' => $this->request->getPost('email'),
                    'password' => $this->security->hash($this->request->getPost('password')),
                    'group_id' => 2,
                    'banned' => 0,
                    'suspended' => 0,
                ));

                if (!$user->save()) {
                    foreach($user->getMessages() as $message) {
                        $this->metroFlash->error($message->getMessage());
                    }
                } else {
                    $this->view->disable();
                    return $this->response->redirect($this->_activeLanguage.'/user/register');
                }
            }
          } 
  
        $this->view->form = $form;
        $this->view->pick('/register');
    }
}