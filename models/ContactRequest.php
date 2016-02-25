<?php

namespace app\models;

use Yii;
use \yii\db\ActiveRecord;

/**
 * LoginForm is the model behind the login form.
 */
class ContactRequest extends ActiveRecord
{

     /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['initiator', 'task_type', 'description', 'slogan', 'duedate', 'proofs'], 'safe']
            // name, email, subject and body are required
            // [['name', 'email', 'subject', 'body'], 'required'],
            // email has to be a valid email address
            // ['email', 'email'],
        ];
    }

    public static function tableName()
    {
        return 'contact_request';
    }  

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [

            'initiator' => 'Заказчик',
            'task_type' => 'Тип задачи',
            'description' => 'Описание',
            'slogan' => 'Текст заголовка',
            'sizes' => 'Размеры',
            'duedate' => 'Дата и время готовности',
            'proofs' => 'Пруфлинк и картинки',
            'verifyCode' => 'Проверочный код',
        ];
    }
}
