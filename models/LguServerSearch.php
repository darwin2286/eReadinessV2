<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\LguServer;

/**
 * LguServerSearch represents the model behind the search form of `app\models\LguServer`.
 */
class LguServerSearch extends LguServer
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Id', 'LguProfileId', 'InHouse', 'CoLocated'], 'integer'],
            [['CapicityStorage', 'Uuid'], 'safe'],
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
        $query = LguServer::find();

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
            'InHouse' => $this->InHouse,
            'CoLocated' => $this->CoLocated,
        ]);

        $query->andFilterWhere(['like', 'CapicityStorage', $this->CapicityStorage])
            ->andFilterWhere(['like', 'Uuid', $this->Uuid]);

        return $dataProvider;
    }
}
