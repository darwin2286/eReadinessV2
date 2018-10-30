<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\LguEmployeePosition */

$this->title = 'Create Lgu Employee Position';
$this->params['breadcrumbs'][] = ['label' => 'Lgu Employee Positions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lgu-employee-position-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
