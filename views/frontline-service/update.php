<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\FrontlineService */

$this->title = 'Update Frontline Service: ' . $model->Id;
$this->params['breadcrumbs'][] = ['label' => 'Frontline Services', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Id, 'url' => ['view', 'id' => $model->Id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="frontline-service-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
