<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\LceTerm */

$this->title = 'Create Lce Term';
$this->params['breadcrumbs'][] = ['label' => 'Lce Terms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lce-term-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
