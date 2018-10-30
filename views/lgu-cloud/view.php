<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\LguCloud */

$this->title = $model->Id;
$this->params['breadcrumbs'][] = ['label' => 'Lgu Clouds', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lgu-cloud-view">

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
            'Provider1',
            'ContractValidity1',
            'Provider1Service1',
            'Provider1Service2',
            'Provider1Service3',
            'Provider1Service4',
            'Provider1Service5',
            'Provider1Service6',
            'Provider2',
            'ContractValidity2',
            'Provider2Service1',
            'Provider2Service2',
            'Provider2Service3',
            'Provider2Service4',
            'Provider2Service5',
            'Provider2Service6',
            'WebHost1',
            'WebHost2',
            'Uuid',
        ],
    ]) ?>

</div>
