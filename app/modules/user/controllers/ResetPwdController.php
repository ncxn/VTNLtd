<?php
namespace Vtnltd\Modules\User\Controllers;

use Vtnltd\Model\User\User;
use Vtnltd\Model\User\UserResetPasswords;
use Vtnltd\Forms\User\ForgotPasswordForm;

use Vtnltd\Lib\Auth\Exception as AuthException;


class resetPwdController extends ControllerBase    {
  
     /**
     * Reset pasword
     */
    public function indexAction($code, $email)    {
        
        $resetPassword = UserResetPasswords::findFirstByCode($code);

        if (!$resetPassword) {
            return $this->response->redirect('/user/lostPwd');
        }else
        {
        if ($resetPassword->getReset() <> 0) {
            return $this->dispatcher->forward(array(
                'controller' => 'Login',
                'action' => 'login'
            ));
        }

        $resetPassword->setReset(1);
        
        /**
         * Change the confirmation to 'reset'
         */
        if (!$resetPassword->save()) {

            foreach ($resetPassword->getMessages() as $message) {
                $this->metroFlash->error($message);
            }

            return $this->dispatcher->forward(array(
                'controller' => 'lostPwd',
                'action' => 'lostPwd'
            ));
        }

        /**
         * Identity the user in the application
         */
        $this->auth->authUserById($resetPassword->getUserId());

        $this->metroFlash->success('Please change your password');
        return $this->response->redirect('/user/changePwd');
        
    }
   } 
}