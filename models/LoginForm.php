<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * Login form
 */
class LoginForm extends Model
{
    public $username;
    public $password;

    private $_user;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password'], 'required'],
            // password is validated by validatePassword()
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
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();

            if (!$user) {
                $this->addError('username', 'Username/Email tidak ditemukan.');
            } else if (!$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Password salah.');
            }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     *
     * @return bool whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            $user = $this->getUser();

            $user->last_login = time();
            $user->generateAuthKey();
            $user->save(false);

            if (Yii::$app->user->login($user, 3600 * 24 * 30)) {
                Yii::$app->assign->setAssign();

                return $user;
            }
        }

        return false;
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    protected function getUser()
    {
        if ($this->_user === null) {
            $this->_user = User::findByUsername($this->username);
        }

        if ($this->_user === null) {
            $this->_user = User::findByEmail($this->username);
        }

        if ($this->_user !== null) {
            if (
                Yii::$app->id === "app-backend" &&
                !Yii::$app->assign->hasAssign(['Administrator', 'Dewa'], $this->_user->id)
            ) {
                $this->_user = null;
            }
        }

        return $this->_user;
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'username' => Yii::t('app', 'Username / Email'),
        ];
    }
}
