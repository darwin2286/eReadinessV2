<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ContactPerson */

$this->title = 'Create Contact Person';
$this->params['breadcrumbs'][] = ['label' => 'Contact People', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contact-person-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
