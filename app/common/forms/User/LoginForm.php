<?php

namespace Vtnltd\Forms\User;

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Password;
use Phalcon\Forms\Element\Submit;
use Phalcon\Forms\Element\Check;
use Phalcon\Forms\Element\Hidden;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\Email;
use Phalcon\Validation\Validator\Identical;

/**
 * Phalcon\UserPlugin\Forms\User\LoginForm.
 */
class LoginForm extends Form
{
    public function initialize()
    {
        //Email
        $email = new Text('email', array(
            //'placeholder' => 'Email',
            'autocomplete' => "off",
        ));

        $email->addValidators(array(
            new PresenceOf(array(
                'message' => 'The e-mail is required',
            )),
            new Email(array(
                'message' => 'The e-mail is not valid',
            )),
        ));

        $this->add($email);

        //Password
        $password = new Password('password', array(
            //'placeholder' => 'Password',
        ));

        $password->addValidator(
            new PresenceOf(array(
                'message' => 'The password is required',
            ))
        );

        $this->add($password);

        //Remember
        $remember = new Check('remember', array(
            'value' => 'yes',
        ));

        $remember->setLabel('Remember me');

        $this->add($remember);

        // CSRF
        $csrf = new Hidden('csrf');
        $csrf->addValidator(new Identical([
            'value' => $this->security->getSessionToken(),
            'message' => 'CSRF validation failed'
        ]));
        $csrf->clear();
        $this->add($csrf);

        $this->add(new Submit('go', array(
            //'class' => 'btn btn-success',
        )));
    }
}
