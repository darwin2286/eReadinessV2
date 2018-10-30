<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\LguFrontlineService */

$this->title = 'Create Lgu Frontline Service';
$this->params['breadcrumbs'][] = ['label' => 'Lgu Frontline Services', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lgu-frontline-service-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
