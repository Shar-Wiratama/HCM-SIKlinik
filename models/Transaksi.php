<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class Transaksi extends ActiveRecord
{
    public static function tableName()
    {
        return 'transaksi';
    }

    public function rules()
    {
        return [
            [['pasien_id', 'tanggal', 'total'], 'required'],
            [['pasien_id'], 'integer'],
            [['tanggal'], 'date', 'format' => 'php:Y-m-d'],
            [['total'], 'number'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'pasien_id' => 'Pasien ID',
            'tanggal' => 'Tanggal',
            'total' => 'Total',
        ];
    }

    public function getPasien()
    {
        return $this->hasOne(Pasien::className(), ['id' => 'pasien_id']);
    }

    public function getDetails()
    {
        return $this->hasMany(TransaksiDetail::className(), ['transaksi_id' => 'id']);
    }
}
