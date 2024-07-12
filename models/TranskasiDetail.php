<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class TransaksiDetail extends ActiveRecord
{
    public static function tableName()
    {
        return 'transaksi_detail';
    }

    public function rules()
    {
        return [
            [['transaksi_id', 'jumlah', 'harga'], 'required'],
            [['transaksi_id', 'tindakan_id', 'obat_id', 'jumlah'], 'integer'],
            [['harga'], 'number'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'transaksi_id' => 'Transaksi ID',
            'tindakan_id' => 'Tindakan ID',
            'obat_id' => 'Obat ID',
            'jumlah' => 'Jumlah',
            'harga' => 'Harga',
        ];
    }

    public function getTransaksi()
    {
        return $this->hasOne(Transaksi::className(), ['id' => 'transaksi_id']);
    }

    public function getTindakan()
    {
        return $this->hasOne(Tindakan::className(), ['id' => 'tindakan_id']);
    }

    public function getObat()
    {
        return $this->hasOne(Obat::className(), ['id' => 'obat_id']);
    }
}
