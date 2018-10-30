<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\LguCloud */

$this->title = 'Create Lgu Cloud';
$this->params['breadcrumbs'][] = ['label' => 'Lgu Clouds', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lgu-cloud-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
