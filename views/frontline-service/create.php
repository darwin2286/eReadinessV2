<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\FrontlineService */

$this->title = 'Create Frontline Service';
$this->params['breadcrumbs'][] = ['label' => 'Frontline Services', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="frontline-service-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
