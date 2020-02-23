<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * Description of UserLoginForm
 *
 * @author akram
 */
class UserLoginForm extends Model
{

    public $email;
    public $password;
    private $_user = false;

    /**
     * @return array the validation rules.
     */
    public function rules() {
        return [
            [['email', 'password'], 'required'],
            ['password', 'validatePassword'],
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params) {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Incorrect username or password.');
            }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     * @return bool whether the user is logged in successfully
     */
    public function login() {
        if ($this->validate()) {
            $user = $this->getUser();
            \Yii::$app->session->set('_1clickLpCustomerLogin', 1);
            \Yii::$app->session->set('_1clickLpCustomerAuth', 1);
            \Yii::$app->session->set('_1clickLpCustomerData', $user);
            return true;
        }
        return false;
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    public function getUser() {
        if ($this->_user === false) {
            $user = ClientUser::findByUsername($this->email);
            if (!empty($user)) {
                $this->_user = $user;
            }
        }

        return $this->_user;
    }

}
