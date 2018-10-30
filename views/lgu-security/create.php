<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\LguSecurity */

$this->title = 'Create Lgu Security';
$this->params['breadcrumbs'][] = ['label' => 'Lgu Securities', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lgu-security-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
