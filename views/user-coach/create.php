<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\UserCoach */

$this->title = 'Create User Coach';
$this->params['breadcrumbs'][] = ['label' => 'User Coaches', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-coach-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
