<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Coachlgu;

/**
 * CoachlguSearch represents the model behind the search form of `app\models\Coachlgu`.
 */
class CoachlguSearch extends Coachlgu
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Id', 'CoachId', 'PsgcMunicipalityCityId', 'Status'], 'integer'],
            [['Uuid'], 'safe'],
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
        $query = Coachlgu::find();

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
            'Id' => $this->Id,
            'CoachId' => Yii::$app->user->identity->CoachId,
            'PsgcMunicipalityCityId' => $this->PsgcMunicipalityCityId,
            'Status' => $this->Status,
        ]);


        //$query->andFilterWhere(['like', 'Uuid', $this->Uuid]);

        return $dataProvider;
    }
}
