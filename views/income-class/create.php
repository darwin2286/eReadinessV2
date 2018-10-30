<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\IncomeClass */

$this->title = 'Create Income Class';
$this->params['breadcrumbs'][] = ['label' => 'Income Classes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="income-class-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
