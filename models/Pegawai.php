<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class Pegawai extends ActiveRecord
{
    public static function tableName()
    {
        return 'pegawai';
    }

    public function rules()
    {
        return [
            [['nama', 'jabatan'], 'required'],
            [['nama', 'jabatan'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Nama',
            'jabatan' => 'Jabatan',
        ];
    }
}
