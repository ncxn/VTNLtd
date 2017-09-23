<?php
namespace Vtnltd\Modules\User\Controllers;

//use Vtnltd\Model\User\User;
//use Vtnltd\Model\User\UserPasswordChanges;

//use Vtnltd\Forms\User\ChangePasswordForm;

//use Vtnltd\Lib\Auth\Exception as AuthException;

class SignoutController extends ControllerBase    {

    /**
     * Logout user and clear the data from session
     *
     * @return \Phalcon\Http\ResponseInterface
     */
    public function indexAction()    {
        if ($this->auth->isUserSignedIn()) {   
            $this->auth->remove();
            return $this->response->redirect('', true);                
        }else{
            return $this->metroFlash->error("You not logged in this page!");
        }
    }
}