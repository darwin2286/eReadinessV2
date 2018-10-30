<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\LguFrontlineService;

/**
 * LguFrontlineServiceSearch represents the model behind the search form of `app\models\LguFrontlineService`.
 */
class LguFrontlineServiceSearch extends LguFrontlineService
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Id', 'LguProfileId', 'FrontlineServiceId', 'OnPremise', 'Online', 'ePayment'], 'integer'],
            [['OnlineUrl', 'Uuid'], 'safe'],
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
        $query = LguFrontlineService::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
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
            'LguProfileId' => $this->LguProfileId,
            'FrontlineServiceId' => $this->FrontlineServiceId,
            'OnPremise' => $this->OnPremise,
            'Online' => $this->Online,
            'ePayment' => $this->ePayment,
        ]);

        $query->andFilterWhere(['like', 'OnlineUrl', $this->OnlineUrl])
            ->andFilterWhere(['like', 'Uuid', $this->Uuid]);

        return $dataProvider;
    }
}
