<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Psgcregion */

$this->title = 'Create Psgcregion';
$this->params['breadcrumbs'][] = ['label' => 'Psgcregions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="psgcregion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
