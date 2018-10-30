<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\LguOsAdmin;

/**
 * LguOsAdminSearch represents the model behind the search form of `app\models\LguOsAdmin`.
 */
class LguOsAdminSearch extends LguOsAdmin
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Id', 'LguProfileId', 'CBMS', 'HRMIS', 'LGPMS', 'PayrollSystem', 'PIS', 'ProcurementSystem', 'ProjectMonitoringSystem', 'RecordsManagementSystem', 'DocumentTrackingSystem'], 'integer'],
            [['OSWorkstation', 'OSServer', 'Uuid'], 'safe'],
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
        $query = LguOsAdmin::find();

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
            'CBMS' => $this->CBMS,
            'HRMIS' => $this->HRMIS,
            'LGPMS' => $this->LGPMS,
            'PayrollSystem' => $this->PayrollSystem,
            'PIS' => $this->PIS,
            'ProcurementSystem' => $this->ProcurementSystem,
            'ProjectMonitoringSystem' => $this->ProjectMonitoringSystem,
            'RecordsManagementSystem' => $this->RecordsManagementSystem,
            'DocumentTrackingSystem' => $this->DocumentTrackingSystem,
        ]);

        $query->andFilterWhere(['like', 'OSWorkstation', $this->OSWorkstation])
            ->andFilterWhere(['like', 'OSServer', $this->OSServer])
            ->andFilterWhere(['like', 'Uuid', $this->Uuid]);

        return $dataProvider;
    }
}
