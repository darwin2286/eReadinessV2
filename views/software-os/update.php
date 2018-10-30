<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SoftwareOs */

$this->title = 'Update Software Operating System: ' . $model->Id;
$this->params['breadcrumbs'][] = ['label' => 'Software Os', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Id, 'url' => ['view', 'id' => $model->Id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="software-os-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
