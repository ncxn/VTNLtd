<?php

namespace Vtnltd\Modules\User\Controllers;

class IndexController extends ControllerBase
{

    public function indexAction() {
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

}

