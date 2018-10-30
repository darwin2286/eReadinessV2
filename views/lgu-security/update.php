<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\LguSecurity */

$this->title = 'Update Lgu Security: ' . $model->Id;
$this->params['breadcrumbs'][] = ['label' => 'Lgu Securities', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Id, 'url' => ['view', 'id' => $model->Id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="lgu-security-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
