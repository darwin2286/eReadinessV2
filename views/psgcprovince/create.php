<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Psgcprovince */

$this->title = 'Create Psgcprovince';
$this->params['breadcrumbs'][] = ['label' => 'Psgcprovinces', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="psgcprovince-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
