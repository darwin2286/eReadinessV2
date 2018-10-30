<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\LguProfile */

$this->title = 'Create Lgu Profile';
$this->params['breadcrumbs'][] = ['label' => 'Lgu Profiles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lgu-profile-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
