<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class RegisterForm extends Model
{
    public $username;
    public $password;
    public $confirm_password;

    private $_user = false;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password', 'confirm_password'], 'required'],
            [['username'], 'email'],
            // username is validated by validatePassword()
            ['username', 'validateUsernameUnique', 'skipOnEmpty' => false],
            // rememberMe must be a boolean value
            ['confirm_password', 'compare', 'compareAttribute' => 'password'],
            //['rememberMe', 'boolean'],
        ];
    }

    public function validateUsernameUnique($attribute, $params)
    {
        $user = $this->getUser();
        if ($user) {
            $this->addError($attribute, 'Username must be unique');
        }
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

            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Incorrect username or password.');
            }
        }
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = User::findByEmail($this->username);
        }

        return $this->_user;
    }
}
