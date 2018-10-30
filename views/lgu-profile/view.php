<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\LguProfile */

$this->title = $model->Id;
$this->params['breadcrumbs'][] = ['label' => 'Lgu Profiles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lgu-profile-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->Id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->Id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'Id',
            'MunicipalityCityId',
            'IncomeClassId',
            'lgu_website',
            'new_business_corporation',
            'new_business_cooperative',
            'new_business_partnership',
            'new_business_signle',
            'renew_business_corporation',
            'renew_business_cooperative',
            'renew_business_partnership',
            'renew_business_single',
            'lce_name',
            'LceTermId',
        ],
    ]) ?>

</div>
