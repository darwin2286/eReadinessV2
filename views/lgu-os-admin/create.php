<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\LguOsAdmin */

$this->title = 'Create Lgu Os Admin';
$this->params['breadcrumbs'][] = ['label' => 'Lgu Os Admins', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lgu-os-admin-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
