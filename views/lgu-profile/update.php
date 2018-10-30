<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\LguProfile */

$this->title = 'PART I.A LGU PROFILE';
// $this->params['breadcrumbs'][] = ['label' => 'Lgu Profiles', 'url' => ['index']];
// $this->params['breadcrumbs'][] = ['label' => $model->Id, 'url' => ['view', 'id' => $model->Id]];
// $this->params['breadcrumbs'][] = 'Update';
?>

<div class="lgu-profile-update">
    <?= $this->render('_form', [
        'model' => $model,'municipalityCity'=>$municipalityCity,'id'=>$id,'modelContactPartOne'=>$modelContactPartOne
    ]) ?>

</div>
