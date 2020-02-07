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
 * Description of PasswordForm
 *
 * @author akram
 */
class PasswordForm extends Model 
{

    public $oldPass;
    public $newPass;
    public $repeatNewPass;

    public function rules() {
        return [
            [['oldPass', 'newPass', 'repeatNewPass'], 'required'],
            ['oldPass', 'findPasswords'],
            [['newPass'], 'string', 'min' => 6],
            ['repeatNewPass', 'compare', 'compareAttribute' => 'newPass', 'message' => 'Confirm password must match new password.'],
        ];
    }

    public function attributeLabels() {
        return [
            'oldPass' => 'Old Password',
            'newPass' => 'New Password',
            'repeatNewPass' => 'Confirm New Password'
        ];
    }

    public function findPasswords($attribute, $params) {
        $user = ClientUser::findByUsername(Yii::$app->session['_1clickLpCustomerData']['email']);
        $password = $user->password;
        if (!$user->validatePassword($this->oldPass))
            $this->addError($attribute, 'Incorrect old password');
    }

}
