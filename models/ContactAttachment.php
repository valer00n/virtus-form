<?php

namespace app\models;

use Yii;
use \yii\db\ActiveRecord;

/**
 * ContactAttachment is the model behind the login form.
 */
class ContactAttachment extends ActiveRecord
{

     /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            
        ];
    }

    public static function tableName()
    {
        return 'contact_attachment';
    }  

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [

        ];
    }
}
