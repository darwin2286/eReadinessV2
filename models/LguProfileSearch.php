<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\LguProfile;
use app\models\Coachlgu;
use app\models\Psgcmunicipalitycity;

/**
 * LguProfileSearch represents the model behind the search form of `app\models\LguProfile`.
 */
class LguProfileSearch extends LguProfile
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Id',  'IncomeClassId', 'new_business_partnership', 'new_business_signle', 'renew_business_corporation', 'renew_business_cooperative', 'renew_business_partnership', 'renew_business_single', 'LceTermId'], 'integer'],
            [['lgu_website','new_business_corporation', 'MunicipalityCityId','lce_name', 'isFinalized' ,'DateComplete','new_business_cooperative'], 'safe'],
        ];
    }


    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */


    public function search($params)
    {
        $query = LguProfile::find();
        $Psgcmunicipalitycity = Psgcmunicipalitycity::find();
        $query->joinWith(['municipalityCity']);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                //'pageSize' => $this->pageSize,
                'route' => '/index.php/lgu-profile/monitoring-report',
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            //  'Id' => Yii::$app->user->identity->lguProfile->MunicipalityCityId,

            // // 'Id' => Yii::$app->user->identity->coachLgu->CoachId,
            // // 'MunicipalityCityId' => $this->MunicipalityCityId,
            'municipalityCity.MunicipalityCityName' => $this->Id,
            // 'new_business_corporation' => $this->new_business_corporation,
            // 'new_business_cooperative' => $this->new_business_cooperative,
            // 'new_business_partnership' => $this->new_business_partnership,
            // 'new_business_signle' => $this->new_business_signle,
            // 'renew_business_corporation' => $this->renew_business_corporation,
            // 'renew_business_cooperative' => $this->renew_business_cooperative,
            // 'renew_business_partnership' => $this->renew_business_partnership,
            // 'renew_business_single' => $this->renew_business_single,
            // 'LceTermId' => $this->LceTermId,
            //'isFinalized' => $this->isFinalized,

        ]);
        $query->joinWith('municipalityCity');
         $query->joinWith('municipalityCity.province');
         $query->joinWith('municipalityCity.province.region');
        //Yii::$app->user->identity->lguProfile->MunicipalityCityId

        $query->orFilterWhere(['like', 'lgu_website', $this->lgu_website])
                ->orFilterWhere(['like', 'psgcmunicipalitycity.MunicipalityCityName', $this->MunicipalityCityId])
                ->orFilterWhere(['like', 'psgcprovince.ProvinceName', $this->new_business_corporation])
                ->orFilterWhere(['like', 'Psgcregion.RegionName', $this->new_business_cooperative])
                ->orFilterWhere(['like', 'IncomeClassId', $this->IncomeClassId])
                ->orFilterWhere(['like', 'psgcmunicipalitycity.Level', $this->new_business_partnership])
                ->orFilterWhere(['like', 'isFinalized', $this->isFinalized])
                ->orFilterWhere(['like', 'DateComplete', $this->DateComplete])
                ->orFilterWhere(['like', 'lce_name', $this->lce_name]);

        return $dataProvider;
    }
}
