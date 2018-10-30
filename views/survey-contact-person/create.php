<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SurveyContactPerson */

$this->title = 'Create Survey Contact Person';
$this->params['breadcrumbs'][] = ['label' => 'Survey Contact People', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="survey-contact-person-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
