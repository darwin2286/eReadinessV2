<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\LguOsOther */

$this->title = 'Update Lgu Os Other: ' . $model->Id;
$this->params['breadcrumbs'][] = ['label' => 'Lgu Os Others', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Id, 'url' => ['view', 'id' => $model->Id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="lgu-os-other-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
