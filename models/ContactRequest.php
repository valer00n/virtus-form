<?php

namespace app\models;

use Yii;
use \yii\db\ActiveRecord;
use app\models\ContactAttachment;
// use yii\web\UploadedFile;

/**
 * LoginForm is the model behind the login form.
 */
class ContactRequest extends ActiveRecord
{

    public $sizesmore;
    public $attachments;
     /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['initiator', 'task_type', 'description', 'slogan', 'duedate', 'proofs', 'sizes', 'status', 'priority', 'comment'], 'safe'],
            // name, email, subject and body are required
            [['initiator', 'task_type', 'description', 'sizes'], 'required'],
            ['email', 'email'],
            [['attachments'], 'file', 'skipOnEmpty' => true, 'maxFiles' => 10],
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
            'sizesmore' => 'Размеры - прочее',
            'duedate' => 'Дата и время готовности',
            'proofs' => 'Пруфлинк и картинки',
            'attachments' => 'Дополнительные материалы',
            'verifyCode' => 'Проверочный код',
            'email' => 'Адрес электронной почты',
            'name' => 'Имя'
        ];
    }

    public function upload()
    {
        if ($this->validate()) { 
            foreach ($this->attachments as $file) {
                $fname =  $this->id. '-' . $file->baseName . '.' . $file->extension;
                $file->saveAs('uploads/' . $fname);

                $attachment = new ContactAttachment();
                $attachment->filename = $fname;
                $attachment->request_id = $this->id;
                $attachment->save();

            }
            return true;
        } else {
            return false;
        }
    }
}
