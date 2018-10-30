<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ContactPerson;

/**
 * ContactPersonSearch represents the model behind the search form of `app\models\ContactPerson`.
 */
class ContactPersonSearch extends ContactPerson
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ConatactName', 'ContactEmail', 'ContactDesignation', 'ContactNo',], 'required'],
            [['Id', 'LguProfileId', 'PartNo'], 'integer'],
            [['ConatactName', 'ContactEmail', 'ContactDesignation', 'ContactNo', 'Uuid'], 'safe'],
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
        $query = ContactPerson::find();

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
            'PartNo' => $this->PartNo,
        ]);

        $query->andFilterWhere(['like', 'ConatactName', $this->ConatactName])
            ->andFilterWhere(['like', 'ContactEmail', $this->ContactEmail])
            ->andFilterWhere(['like', 'ContactDesignation', $this->ContactDesignation])
            ->andFilterWhere(['like', 'ContactNo', $this->ContactNo])
            ->andFilterWhere(['like', 'Uuid', $this->Uuid]);

        return $dataProvider;
    }
}
