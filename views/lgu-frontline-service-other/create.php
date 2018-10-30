<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\LguFrontlineServiceOther */

$this->title = 'Create Lgu Frontline Service Other';
$this->params['breadcrumbs'][] = ['label' => 'Lgu Frontline Service Others', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lgu-frontline-service-other-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
