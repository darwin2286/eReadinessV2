<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\LguOsOther;

/**
 * LguOsOtherSearch represents the model behind the search form of `app\models\LguOsOther`.
 */
class LguOsOtherSearch extends LguOsOther
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Id', 'LguOSAdminId'], 'integer'],
            [['OtherName', 'Uuid'], 'safe'],
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
        $query = LguOsOther::find();

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
            'LguOSAdminId' => $this->LguOSAdminId,
        ]);

        $query->andFilterWhere(['like', 'OtherName', $this->OtherName])
            ->andFilterWhere(['like', 'Uuid', $this->Uuid]);

        return $dataProvider;
    }
}
