<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\LguCloud;

/**
 * LguCloudSearch represents the model behind the search form of `app\models\LguCloud`.
 */
class LguCloudSearch extends LguCloud
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Id', 'LguProfileId', 'Uuid'], 'integer'],
            [['Provider1', 'ContractValidity1', 'Provider1Service1', 'Provider1Service2', 'Provider1Service3', 'Provider1Service4', 'Provider1Service5', 'Provider1Service6', 'Provider2', 'ContractValidity2', 'Provider2Service1', 'Provider2Service2', 'Provider2Service3', 'Provider2Service4', 'Provider2Service5', 'Provider2Service6', 'WebHost1', 'WebHost2'], 'safe'],
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
        $query = LguCloud::find();

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
            'Uuid' => $this->Uuid,
        ]);

        $query->andFilterWhere(['like', 'Provider1', $this->Provider1])
            ->andFilterWhere(['like', 'ContractValidity1', $this->ContractValidity1])
            ->andFilterWhere(['like', 'Provider1Service1', $this->Provider1Service1])
            ->andFilterWhere(['like', 'Provider1Service2', $this->Provider1Service2])
            ->andFilterWhere(['like', 'Provider1Service3', $this->Provider1Service3])
            ->andFilterWhere(['like', 'Provider1Service4', $this->Provider1Service4])
            ->andFilterWhere(['like', 'Provider1Service5', $this->Provider1Service5])
            ->andFilterWhere(['like', 'Provider1Service6', $this->Provider1Service6])
            ->andFilterWhere(['like', 'Provider2', $this->Provider2])
            ->andFilterWhere(['like', 'ContractValidity2', $this->ContractValidity2])
            ->andFilterWhere(['like', 'Provider2Service1', $this->Provider2Service1])
            ->andFilterWhere(['like', 'Provider2Service2', $this->Provider2Service2])
            ->andFilterWhere(['like', 'Provider2Service3', $this->Provider2Service3])
            ->andFilterWhere(['like', 'Provider2Service4', $this->Provider2Service4])
            ->andFilterWhere(['like', 'Provider2Service5', $this->Provider2Service5])
            ->andFilterWhere(['like', 'Provider2Service6', $this->Provider2Service6])
            ->andFilterWhere(['like', 'WebHost1', $this->WebHost1])
            ->andFilterWhere(['like', 'WebHost2', $this->WebHost2]);

        return $dataProvider;
    }
}
