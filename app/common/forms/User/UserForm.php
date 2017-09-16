<?php

namespace Vtnltd\Forms\User;

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Hidden;
use Phalcon\Forms\Element\Select;
use Phalcon\Validation\Validator\Email;
use Vtnltd\Model\User\UserGroups;

/**
 * Vtnltd\Forms\User\UserForm.
 */
class UserForm extends Form
{
    public function initialize($entity = null, $options = null)
    {
        if (isset($options['edit']) && $options['edit']) {
            $id = new Hidden('id');
        } else {
            $id = new Text('id');
        }

        $this->add($id);
        $this->add(new Text('name'));
        $this->add(new Text('email'));
        $this->add(new Select('group_id', UserGroups::find('active = 1'), array(
            'using' => array('id', 'name'),
            'useEmpty' => true,
            'emptyText' => '...',
            'emptyValue' => '',
        )));
        $this->add(new Select('banned', array(
            1 => 'Yes',
            0 => 'No',
        )));
        $this->add(new Select('suspended', array(
            1 => 'Yes',
            0 => 'No',
        )));
        $this->add(new Select('active', array(
            1 => 'Yes',
            0 => 'No',
        )));
    }
}
