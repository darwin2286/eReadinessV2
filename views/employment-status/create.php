<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\EmploymentStatus */

$this->title = 'Create Employment Status';
$this->params['breadcrumbs'][] = ['label' => 'Employment Statuses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employment-status-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
