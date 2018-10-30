<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Coaches */

$this->title = 'Update Coaches: ' . $model->Id;
$this->params['breadcrumbs'][] = ['label' => 'Coaches', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Id, 'url' => ['view', 'id' => $model->Id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="coaches-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,'item'=>$item
    ]) ?>

</div>
