<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\LguOsOther */

$this->title = 'Create Lgu Os Other';
$this->params['breadcrumbs'][] = ['label' => 'Lgu Os Others', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lgu-os-other-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
