<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\LguNetwork */

$this->title = $model->Id;
$this->params['breadcrumbs'][] = ['label' => 'Lgu Networks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lgu-network-view">

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
            'LguProfileId',
            'Intranet',
            'LAN',
            'WAN',
            'VPN',
            'Intrenet',
            'LeasedLine',
            'DSL',
            'MobileData',
            'ISDN',
            'Satellite',
            'ISP',
            'ISPProvider1',
            'Bandwidth1',
            'ISPProvider2',
            'Bandwidth2',
            'NoEmployeeInternet',
            'NoEmployeeEmail:email',
            'Uuid',
        ],
    ]) ?>

</div>
