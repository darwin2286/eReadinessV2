<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\LguNetwork */

$this->title = 'Create Lgu Network';
$this->params['breadcrumbs'][] = ['label' => 'Lgu Networks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lgu-network-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
