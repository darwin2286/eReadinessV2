<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Psgcprovince;


/**
 * PsgcprovinceSearch represents the model behind the search form of `app\models\Psgcprovince`.
 */
class PsgcprovinceSearch extends Psgcprovince
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Id', 'RegionId', 'Status'], 'integer'],
            [['PsgCodeProvince', 'ProvinceName', 'Uuid'], 'safe'],
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
        $query = Psgcprovince::find();

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
            'RegionId' => $this->RegionId,
            'Status' => $this->Status,
        ]);

        $query->andFilterWhere(['like', 'PsgCodeProvince', $this->PsgCodeProvince])
            ->andFilterWhere(['like', 'ProvinceName', $this->ProvinceName])
            ->andFilterWhere(['like', 'Uuid', $this->Uuid]);

        return $dataProvider;
    }
}
