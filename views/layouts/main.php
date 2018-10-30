<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\helpers\Url;
use app\models\Psgcprovince;
use app\models\Psgcregion;
use app\models\Coaches;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\web\YiiAsset;

raoul2000\bootswatch\BootswatchAsset::$theme = 'flatly';
AppAsset::register($this);
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<style>
    div.tab-content > .tab-pane.active {
        padding-top:0px !important;
    }
    .navbar-blue_trans{
        background-color: rgba(24, 45, 84, 0.4) !imporant;
    }
    .demo-ribbon {
        width: 100%;
        height: 30vh;
        margin-top:38px;
        background-color: #182d54;
    }
    .background-image{
        background-image: url("<?php echo Url::to('@web/img/bluebanner.jpg') ?>");
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }
</style>
<body>
<?php $this->beginBody() ?>
>
<!--RIBBON BANNER !-->
<div class="demo-ribbon background-image">
    <div class="container"></div>
</div>

<div class="wrap">
    <?php
        $coachid = Yii::$app->user->identity->CoachId;
        $coach = Coaches::find()->where(['Id' => $coachid])->all();
        if(Url::current()=='/library/index'){
        NavBar::begin([
            'brandLabel' =>'<img src="'.Url::to('@web/img/eReadinessSurveyLogo.png').'" class="pull-left" style="margin-top:-2px; height:28px" data-original-title="e-Readiness Survey 2018 for Cities and Municipalities" data-toggle="tooltip" title data-placement="bottom"/>',
            'brandUrl' => Yii::$app->homeUrl,
            'options' => [
                'class' => 'navbar navbar-blue navbar-fixed-top',
            ],
        ]);
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => [
                    ['label' => 'Library', 'linkOptions'=>['class'=>'navlink'], 'url' => ['/index.php/library'],'visible' => Yii::$app->user->identity->UserType == 2? true : false],
                    ['label' => 'Hi!, '.$coach[0]->CoachesName, 'linkOptions'=>['class'=>'navlink'],'visible' => Yii::$app->user->identity->UserType == 3? true : false],
                    ['label' => 'Contact Person', 'linkOptions'=>['class'=>'navlink'], 'url' => ['/index.php/site/contact'],'visible' => Yii::$app->user->identity->UserType == 1? true : false],
                    [
                        'label' => 'Reports',
                        'linkOptions'=>['class'=>'navlink'],
                        'items' => [
                            ['label' => 'Monitoring Reports', 'url' => ['/index.php/lgu-profile/monitoring-report']],
                            ['label' => 'Statistics Reports', 'url' => '#'],
                        ],
                        'visible' => Yii::$app->user->identity->UserType != 1? true : false
                    ],
                    [
                        'label' => 'References',
                        'linkOptions'=>['class'=>'navlink'],
                        'items' => [
                            '<li class="dropdown-header">Survey</li>',
                            ['label' => 'Questionnaire', 'url' => '#'],
                            ['label' => 'Process Flow', 'url' => '#'],
                            ['label' => 'Guide', 'url' => '#'],
                            '<li class="divider"></li>',
                            '<li class="dropdown-header">My Score Sheets</li>',
                            ['label' => '2014', 'url' => '#'],
                            ['label' => '2016', 'url' => '#'],
                            '<li class="divider"></li>',
                            ['label' => 'DILG Memorandum Circular No. 2016-161', 'url' => '#'],
                        ],
                        'visible' => true
                    ],
                    ['label' => 'Token Finder', 'linkOptions'=>['class'=>'navlink'], 'url' => ['#'],'visible' => Yii::$app->user->identity->UserType == 2? true : false],

                    ['label' => 'Logout', 'linkOptions'=>['data' => ['method' => 'post'],'class'=>'navlink'], 'url' => ['/index.php/site/logout'],'visible' =>true]
                    // [
                    //     'label' => 'Settings',
                    //     'linkOptions'=>['class'=>'navlink'],
                    //     'items' => [
                    //         '<li class="dropdown-header">Token</li>',
                    //         ['label' => 'Token Finder', 'url' => '#','visible' => Yii::$app->user->identity->UserType != 1? true : false],
                    //         '<li class="divider"></li>',

                    //         ['label' => 'Logout', 'url' => 'site\logout', 'linkOptions' => ['data' => ['method' => 'post']]],
                    //     ],
                    // ],

                ],
            ]);
        NavBar::end();
    }
    elseif(Url::current()=='/site/index'){
        NavBar::begin([
            'brandLabel' => '<img src="'.Url::to('@web/img/eReadinessSurveyLogo.png').'" class="pull-left" style="margin-top:-2px; height:28px" data-original-title="e-Readiness Survey 2018 for Cities and Municipalities" data-toggle="tooltip" title data-placement="bottom"/>',
            'brandUrl' => Yii::$app->homeUrl,
            'options' => [
                'class' => 'navbar navbar-blue navbar-fixed-top',
            ],
        ]);

            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => [
                    ['label' => 'Library', 'linkOptions'=>['class'=>'navlink'], 'url' => ['/index.php/library'],'visible' => Yii::$app->user->identity->UserType == 2? true : false],
                    ['label' => 'Hi!, '.$coach[0]->CoachesName, 'linkOptions'=>['class'=>'navlink'],'visible' => Yii::$app->user->identity->UserType == 3? true : false],
                    ['label' => 'Contact Person', 'linkOptions'=>['class'=>'navlink'], 'url' => ['/index.php/site/contact'],'visible' => Yii::$app->user->identity->UserType == 1? true : false],
                    [
                        'label' => 'Reports',
                        'linkOptions'=>['class'=>'navlink'],
                        'items' => [
                            ['label' => 'Monitoring Reports', 'url' => ['/index.php/lgu-profile/monitoring-report']],
                            ['label' => 'Statistics Reports', 'url' => '#'],
                        ],
                        'visible' => Yii::$app->user->identity->UserType != 1? true : false
                    ],
                    [
                        'label' => 'References',
                        'linkOptions'=>['class'=>'navlink'],
                        'items' => [
                            '<li class="dropdown-header">Survey</li>',
                            ['label' => 'Questionnaire', 'url' => '#'],
                            ['label' => 'Process Flow', 'url' => '#'],
                            ['label' => 'Guide', 'url' => '#'],
                            '<li class="divider"></li>',
                            '<li class="dropdown-header">My Score Sheets</li>',
                            ['label' => '2014', 'url' => '#'],
                            ['label' => '2016', 'url' => '#'],
                            '<li class="divider"></li>',
                            ['label' => 'DILG Memorandum Circular No. 2016-161', 'url' => '#'],
                        ],
                        'visible' => true
                    ],
                    ['label' => 'Token Finder', 'linkOptions'=>['class'=>'navlink'], 'url' => ['#'],'visible' => Yii::$app->user->identity->UserType == 2? true : false],

                    ['label' => 'Logout', 'linkOptions'=>['data' => ['method' => 'post'],'class'=>'navlink'], 'url' => ['/index.php/site/logout'],'visible' =>true]

                ],
            ]);
        NavBar::end();
    }
    else{
        NavBar::begin([
            'brandLabel' => '<img src="'.Url::to('@web/img/eReadinessSurveyLogo.png').'" class="pull-left" style="margin-top:-2px; height:28px" data-original-title="e-Readiness Survey 2018 for Cities and Municipalities" data-toggle="tooltip" title data-placement="bottom"/>',
            'brandUrl' => Yii::$app->homeUrl,
            'options' => [
                'class' => 'navbar navbar-blue navbar-fixed-top',
            ],
        ]);

            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => [
                    ['label' => 'Library', 'linkOptions'=>['class'=>'navlink'], 'url' => ['/index.php/library'],'visible' => Yii::$app->user->identity->UserType == 2? true : false],
                    ['label' => 'Hi!, '.$coach[0]->CoachesName, 'linkOptions'=>['class'=>'navlink'],'visible' => Yii::$app->user->identity->UserType == 3? true : false],
                    ['label' => 'Contact Person', 'linkOptions'=>['class'=>'navlink'], 'url' => ['/index.php/site/contact'],'visible' => Yii::$app->user->identity->UserType == 1? true : false],
                    [
                        'label' => 'Reports',
                        'linkOptions'=>['class'=>'navlink'],
                        'items' => [
                            ['label' => 'Monitoring Reports', 'url' => ['/index.php/lgu-profile/monitoring-report']],
                            ['label' => 'Statistics Reports', 'url' => '#'],
                        ],
                        'visible' => Yii::$app->user->identity->UserType != 1? true : false
                    ],
                    [
                        'label' => 'References',
                        'linkOptions'=>['class'=>'navlink'],
                        'items' => [
                            '<li class="dropdown-header">Survey</li>',
                            ['label' => 'Questionnaire', 'url' => '#'],
                            ['label' => 'Process Flow', 'url' => '#'],
                            ['label' => 'Guide', 'url' => '#'],
                            '<li class="divider"></li>',
                            '<li class="dropdown-header">My Score Sheets</li>',
                            ['label' => '2014', 'url' => '#'],
                            ['label' => '2016', 'url' => '#'],
                            '<li class="divider"></li>',
                            ['label' => 'DILG Memorandum Circular No. 2016-161', 'url' => '#'],
                        ],
                        'visible' => true
                    ],
                    ['label' => 'Token Finder', 'linkOptions'=>['class'=>'navlink'], 'url' => ['#'],'visible' => Yii::$app->user->identity->UserType == 2? true : false],

                    ['label' => 'Logout', 'linkOptions'=>['data' => ['method' => 'post'],'class'=>'navlink'], 'url' => ['/index.php/site/logout'],'visible' =>true]

                ],
            ]);
        NavBar::end();
    }
        ?>
    <div class="container" id="content">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>


<div class="navbar navbar-blue navbar-fixed-bottom" style="height:60px;">
    <div class="container">
        <div class="navbar-text">
            <!-- <img src="<?php //echo Url::to('@web/img/dict_dark_bg.png');?>" class="pull-left" style="width:auto; height:50px;" data-original-title="e-Readiness Survey 2018 for Cities and Municipalities" data-toggle="tooltip" title data-placement="bottom"/> -->
            <p class="header-no-margin">Department of Information and Communication Technology</p>
        </div>
    </div>
</div>



<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
