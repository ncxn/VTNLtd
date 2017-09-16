<?php
namespace Vtnltd\Modules\User\Controllers;


use Vtnltd\Model\User\User;

use Vtnltd\Forms\User\LoginForm;

use Vtnltd\Lib\Auth\Exception as AuthException;
use Vtnltd\Lib\Connectors\FacebookConnector;

//use Phalcon\Mvc\View;
//use Phalcon\Tag;

class LoginController extends ControllerBase
{
    public function indexAction()    {
        if($this->auth->isUserSignedIn()==true){
        $this->response->redirect('user/profile');
        }else{
            $this->dispatcher->forward(
            [
                "controller" => "Login",
                "action"     => "Login",
            ]
        );
        
        }
    }
    
    public function loginAction()    {
        $form = new LoginForm();
        try {
            if (!$this->request->isPost()) {
                if ($this->auth->hasRememberMe()) {
                    return $this->auth->loginWithRememberMe();
                }
            } else {
                if ($form->isValid($this->request->getPost()) == false) {
                    foreach ($form->getMessages() as $message) {
                        $this->metroFlash->error($message);
                    }
                } else {
                    $this->auth->check([
                        'email' => $this->request->getPost('email'),
                        'password' => $this->request->getPost('password'),
                        'remember' => $this->request->getPost('remember')
                    ]);
                    return $this->response->redirect('user/profile');
                }
            }
           } catch (AuthException $e) {
            $this->metroFlash->error($e->getMessage());
        }
        $this->view->form = $form;
        $this->view->pick('/login');
    }
}