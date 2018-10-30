<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Psgcmunicipalitycity */

$this->title = 'Create Psgcmunicipalitycity';
$this->params['breadcrumbs'][] = ['label' => 'Psgcmunicipalitycities', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="psgcmunicipalitycity-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
