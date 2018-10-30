<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\LguEmployeePosition;

/**
 * LguEmployeePositionSearch represents the model behind the search form of `app\models\LguEmployeePosition`.
 */
class LguEmployeePositionSearch extends LguEmployeePosition
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Id', 'LguProfileId', 'EmployeePositionId', 'EmployeeStatusId', 'NoOfEmployee'], 'integer'],
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
        $query = LguEmployeePosition::find();

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
            'EmployeePositionId' => $this->EmployeePositionId,
            'EmployeeStatusId' => $this->EmployeeStatusId,
            'NoOfEmployee' => $this->NoOfEmployee,
        ]);

        $query->andFilterWhere(['like', 'Uuid', $this->Uuid]);

        return $dataProvider;
    }
}
