<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class Pasien extends ActiveRecord
{
    public static function tableName()
    {
        return 'pasien';
    }

    public function rules()
    {
        return [
            [['nama', 'alamat', 'tanggal_lahir'], 'required'],
            [['tanggal_lahir'], 'date', 'format' => 'php:Y-m-d'],
            [['nama', 'alamat'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Nama',
            'alamat' => 'Alamat',
            'tanggal_lahir' => 'Tanggal Lahir',
        ];
    }
}
