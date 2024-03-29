<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Psgcregion;

/**
 * PsgcregionSearch represents the model behind the search form of `app\models\Psgcregion`.
 */
class PsgcregionSearch extends Psgcregion
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Id', 'Status'], 'integer'],
            [['PsgCodeRegion', 'RegionCode', 'RegionName', 'Uuid'], 'safe'],
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
        $query = Psgcregion::find();

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
            'Status' => $this->Status,
        ]);

        $query->andFilterWhere(['like', 'PsgCodeRegion', $this->PsgCodeRegion])
            ->andFilterWhere(['like', 'RegionCode', $this->RegionCode])
            ->andFilterWhere(['like', 'RegionName', $this->RegionName])
            ->andFilterWhere(['like', 'Uuid', $this->Uuid]);

        return $dataProvider;
    }
}
