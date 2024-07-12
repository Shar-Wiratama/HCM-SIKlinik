<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use app\models\Transaksi;
use app\models\TransaksiDetail;
use app\models\Pasien;

class TransaksiController extends Controller
{
    public function actionCreate()
    {
        $model = new Transaksi();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            // Simpan detail transaksi
            foreach (Yii::$app->request->post('TransaksiDetail', []) as $detailData) {
                $detail = new TransaksiDetail();
                $detail->transaksi_id = $model->id;
                $detail->attributes = $detailData;
                $detail->save();
            }
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionView($id)
    {
        $model = $this->findModel($id);
        return $this->render('view', ['model' => $model]);
    }

    protected function findModel($id)
    {
        if (($model = Transaksi::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
