<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\LguServer */

$this->title = 'Create Lgu Server';
$this->params['breadcrumbs'][] = ['label' => 'Lgu Servers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lgu-server-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
