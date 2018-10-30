<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\LguFrontlineServiceOther */

$this->title = 'Update Lgu Frontline Service Other: ' . $model->Id;
$this->params['breadcrumbs'][] = ['label' => 'Lgu Frontline Service Others', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Id, 'url' => ['view', 'id' => $model->Id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="lgu-frontline-service-other-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
