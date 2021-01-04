<?php

namespace app\modules\v1\forms;

use yii\base\Model;
use app\modules\v1\models\Tasks;

class DeleteTaskSome extends Model
{
    public $arrayTaskIds;
    
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['arrayTaskIds'], 'required']
        ];
    }
    
    public function delete()
    {
        foreach ($this->arrayTaskIds as $id) {
            $model = Tasks::findOne($id);
            
            $model->is_deleted = Tasks::STATUS_DELETED;
            
            $model->save();
        }
        
        return;
    }
}
