<!-- WIZARD !-->
<div class="container-fluid site-index">
	<div class="wizard__section">
		<?php
			$wizard_config = [
				'id' => 'wizard__ereadiness-survey-steps',
				'steps' => [
					1 => [
						'title' => 'LGU Profile',
						'icon' => 'fa fa-info',
						'content' => Yii::$app->controller->renderPartial('/lgu-profile/update', ['model' => $model,'id'=>$id,'municipalityCity'=>$municipalityCity,'modelContactPartOne'=>$modelContactPartOne]),
                        'buttons' => [
                            'next' => [
                                'title' => 'Next',
                                'html' => '<button type="submit" form="lgu-profile-form" value="Submit" id="nextbutton" class="btn btn-primary next-step" disabled style="padding-right:30px; padding-left:30px;">Next&nbsp;&nbsp;<i class="glyphicon glyphicon-menu-right"></i></button>',
                                'options' => [
                                    'class' => 'btn btn-primary'
                                ],
                            ],
                        ],
                    ],
                    //STEP 2: HR 
                    2 => [
                        'title' => 'Human Resource Capacity',
                        'icon' => 'fa fa-users',
                        'content' => Yii::$app->controller->renderPartial('/lgu-profile/_hrcapacity',['isFinalized'=>$model['isFinalized'],'modelLguEmployee'=>$modelLguEmployee,'id'=>$id,'modelLguCourse'=>$modelLguCourse,'modelContactParttwo'=>$modelContactParttwo,'modelLguOffice'=>$modelLguOffice,'modelLguPosition'=>$modelLguPosition]),
                        'buttons' => [
                            'next' => [
                                'title' => 'Next',
                                'html' => '<button type="submit" name = "Submit" form="hr-capacity-form" value="nextBtn2" class="btn btn-primary next-step" id="nextbutton2" disabled style="padding-right:30px; padding-left:30px;">Next&nbsp;&nbsp;<i class="glyphicon glyphicon-menu-right"></i></button>',
                                'options' => [],
                            ],
                        ],
                    ],
                    3 => [
                        'title' => 'ICT Environment',
                        'icon' => 'fa fa-sitemap',
                        'content' =>Yii::$app->controller->renderPartial('/lgu-profile/_ictenvironment',['isFinalized'=>$model['isFinalized'],'id'=>$id,'modelContactPartthree'=>$modelContactPartthree,'modelCloud'=>$modelCloud,'modelSecurity'=>$modelSecurity,'modelNetwork'=>$modelNetwork,'modelFrontline'=>$modelFrontline,'modelOs'=>$modelOs,'modelLguServer'=>$modelLguServer,'modelComputingDevice'=>$modelComputingDevice,'modelHardwarePeripherals'=>$modelHardwarePeripherals]),
                        'buttons' => [
                            'next' => [
                                'title' => 'Submit',
                                'html' => '<button type="submit" form ="ict-environment-form" value="Submit" class="btn btn-success next-step" id="last" disabled style="padding-right:30px; padding-left:30px;">Submit</button>',
                                'options' => [ ],
                             ],
                         ],
                    ],
                    4 => [
                        'title' => 'Summary of Survey',
                        'icon' => 'fa fa-list-alt',
                        'content' =>Yii::$app->controller->renderPartial('/lgu-profile/_complete',['id'=>$id,'modelProfile'=>$modelProfile]),
                        'buttons' => [
                          'save' => [
                                    'title' => 'Submit',
                                    'html' => '<button type="submit" style = "display:none" form ="ict-environment-form" value="Submit" class="btn btn-success next-step" disabled style="padding-right:30px; padding-left:30px;">Submit</button>',
                                    'options' => [
                                          //'class' => 'disabled'
                                    ],
                                   ],
                
                               ],
                      ],
                    ],
                    'start_step' => $step
			];
		?>
	</div>
</div>
<?= \drsdre\wizardwidget\WizardWidget::widget($wizard_config); ?>
