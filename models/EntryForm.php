<?php
/**
 * Created by PhpStorm.
 * User: tomjamescn
 * Date: 15/10/24
 * Time: 下午3:03
 */

namespace app\models;

use yii\base\Model;


class EntryForm extends Model
{
    public $name;
    public $email;

    public function rules()
    {
        return [
            [['name', 'email'], 'required'],
            ['email', 'email'],
        ];
    }
}