<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SoftwareOs */

$this->title = 'Create Software Operating System';
$this->params['breadcrumbs'][] = ['label' => 'Software Os', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="software-os-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
