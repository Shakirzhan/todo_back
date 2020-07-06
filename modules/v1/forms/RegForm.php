<?php

namespace app\modules\v1\forms;

use app\modules\v1\models\Token;
use app\modules\v1\models\User;
use yii\base\Model;

/**
 * Login form
 */
class RegForm extends Model
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
            [['username', 'password'], 'required']
        ];
    }



    /**
     * @return Token|null
     */
    public function reg()
    {
        if ($this->validate()) {
            $user = new User();
            $user->username = $this->username;
            $user->setPassword($this->password);
            return $user->save() ? $user : null;
        } else {
            return null;
        }
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

        return $this->_user;
    }
}
