<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Coachlgu */

$this->title = 'Create Coachlgu';
$this->params['breadcrumbs'][] = ['label' => 'Coach LGU', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="coachlgu-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
