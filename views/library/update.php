<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\LceTerm */

$this->title = 'Update Lce Term: ' . $model->Id;
$this->params['breadcrumbs'][] = ['label' => 'Lce Terms', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Id, 'url' => ['view', 'id' => $model->Id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="lce-term-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
