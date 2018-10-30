<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\LguComputingDevice */

$this->title = 'Create Lgu Computing Device';
$this->params['breadcrumbs'][] = ['label' => 'Lgu Computing Devices', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lgu-computing-device-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
