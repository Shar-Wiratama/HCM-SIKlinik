<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class Tindakan extends ActiveRecord
{
    public static function tableName()
    {
        return 'tindakan';
    }

    public function rules()
    {
        return [
            [['nama', 'biaya'], 'required'],
            [['biaya'], 'number'],
            [['nama'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Nama',
            'biaya' => 'Biaya',
        ];
    }
}
