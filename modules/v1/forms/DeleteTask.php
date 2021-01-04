<?php

namespace app\modules\v1\forms;

use yii\base\Model;
use app\modules\v1\models\Tasks;

class DeleteTask extends Model
{
    public $id;
    
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id'], 'integer'],
        ];
    }
    
    public function delete()
    {
        $model = Tasks::findOne($this->id);
        
        $model->is_deleted = Tasks::STATUS_DELETED;
        
        $model->save();
        
        return $model;
    }
}
