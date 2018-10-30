<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\LguEmployeeOffice */

$this->title = 'Create Lgu Employee Office';
$this->params['breadcrumbs'][] = ['label' => 'Lgu Employee Offices', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lgu-employee-office-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
