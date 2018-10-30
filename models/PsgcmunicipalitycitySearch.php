<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Psgcmunicipalitycity;

/**
 * PsgcmunicipalitycitySearch represents the model behind the search form of `app\models\Psgcmunicipalitycity`.
 */
class PsgcmunicipalitycitySearch extends Psgcmunicipalitycity
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Id', 'ProvinceId', 'Level', 'Status'], 'integer'],
            [['PsgCodeMunicipalityCity', 'MunicipalityCityName', 'Uuid'], 'safe'],
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
        $query = Psgcmunicipalitycity::find();
        $query->joinWith('province');
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
            'ProvinceId' => $this->ProvinceId,
            'Level' => $this->Level,
            'Status' => $this->Status,
        ]);

        $query->andFilterWhere(['like', 'PsgCodeMunicipalityCity', $this->PsgCodeMunicipalityCity])
            ->andFilterWhere(['like', 'MunicipalityCityName', $this->MunicipalityCityName])
            ->andFilterWhere(['like', 'Uuid', $this->Uuid]);

        return $dataProvider;
    }
}
