<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\LguNetwork;

/**
 * LguNetworkSearch represents the model behind the search form of `app\models\LguNetwork`.
 */
class LguNetworkSearch extends LguNetwork
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Id', 'LguProfileId', 'Intranet', 'LAN', 'WAN', 'VPN', 'Intrenet', 'LeasedLine', 'DSL', 'MobileData', 'ISDN', 'Satellite', 'ISP', 'NoEmployeeInternet', 'NoEmployeeEmail'], 'integer'],
            [['ISPProvider1', 'Bandwidth1', 'ISPProvider2', 'Bandwidth2', 'Uuid'], 'safe'],
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
        $query = LguNetwork::find();

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
            'Intranet' => $this->Intranet,
            'LAN' => $this->LAN,
            'WAN' => $this->WAN,
            'VPN' => $this->VPN,
            'Intrenet' => $this->Intrenet,
            'LeasedLine' => $this->LeasedLine,
            'DSL' => $this->DSL,
            'MobileData' => $this->MobileData,
            'ISDN' => $this->ISDN,
            'Satellite' => $this->Satellite,
            'ISP' => $this->ISP,
            'NoEmployeeInternet' => $this->NoEmployeeInternet,
            'NoEmployeeEmail' => $this->NoEmployeeEmail,
        ]);

        $query->andFilterWhere(['like', 'ISPProvider1', $this->ISPProvider1])
            ->andFilterWhere(['like', 'Bandwidth1', $this->Bandwidth1])
            ->andFilterWhere(['like', 'ISPProvider2', $this->ISPProvider2])
            ->andFilterWhere(['like', 'Bandwidth2', $this->Bandwidth2])
            ->andFilterWhere(['like', 'Uuid', $this->Uuid]);

        return $dataProvider;
    }
}
