<?php

namespace app\modules\v1\forms;

use yii\base\Model;
use app\modules\v1\models\Tasks;

class CreateTask extends Model
{
    public $name;
    
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string'],
        ];
    }

    public function save()
    {
        $model = new Tasks();
        
        $model->name = $this->name;
        
        $model->user_id = \Yii::$app->user->id;
        
        $model->is_deleted = Tasks::STATUS_ACTIVE;
        
        $model->save();
        
        return $model;
    }
}
