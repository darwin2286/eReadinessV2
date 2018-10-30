<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\LguEmployeeCourse */

$this->title = 'Create Lgu Employee Course';
$this->params['breadcrumbs'][] = ['label' => 'Lgu Employee Courses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lgu-employee-course-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
