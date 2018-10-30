<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\LguEmployee */

$this->title = 'Create Lgu Employee';
$this->params['breadcrumbs'][] = ['label' => 'Lgu Employees', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lgu-employee-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
