<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\LguEmployee */

$this->title = 'Update Lgu Employee: ' . $model->Id;
$this->params['breadcrumbs'][] = ['label' => 'Lgu Employees', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Id, 'url' => ['view', 'id' => $model->Id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="lgu-employee-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
