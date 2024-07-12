<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class Obat extends ActiveRecord
{
    public static function tableName()
    {
        return 'obat';
    }

    public function rules()
    {
        return [
            [['nama', 'harga'], 'required'],
            [['harga'], 'number'],
            [['nama'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Nama',
            'harga' => 'Harga',
        ];
    }
}
