<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Psgcmunicipalitycity */

$this->title = $model->Id;
$this->params['breadcrumbs'][] = ['label' => 'Psgcmunicipalitycities', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="psgcmunicipalitycity-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->Id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->Id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'Id',
            'ProvinceId',
            'PsgCodeMunicipalityCity',
            'MunicipalityCityName',
            'Level',
            'Status',
            'Uuid',
        ],
    ]) ?>

</div>
