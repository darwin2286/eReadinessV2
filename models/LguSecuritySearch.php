<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\LguSecurity;

/**
 * LguSecuritySearch represents the model behind the search form of `app\models\LguSecurity`.
 */
class LguSecuritySearch extends LguSecurity
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Id', 'LguProfileId', 'ProtectionScheme', 'SecurityPolicy', 'DisasterRecoveryPlan', 'DigitalSecurity', 'Encryption', 'UPS', 'HardwareFirewall', 'SoftwareFirewall', 'SubSecuritySoft', 'EmailAuth', 'OffsiteBackup', 'SecuredServer', 'Storagebackup', 'ISSP'], 'integer'],
            [['ISSPDesc', 'Uuid'], 'safe'],
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
        $query = LguSecurity::find();

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
            'ProtectionScheme' => $this->ProtectionScheme,
            'SecurityPolicy' => $this->SecurityPolicy,
            'DisasterRecoveryPlan' => $this->DisasterRecoveryPlan,
            'DigitalSecurity' => $this->DigitalSecurity,
            'Encryption' => $this->Encryption,
            'UPS' => $this->UPS,
            'HardwareFirewall' => $this->HardwareFirewall,
            'SoftwareFirewall' => $this->SoftwareFirewall,
            'SubSecuritySoft' => $this->SubSecuritySoft,
            'EmailAuth' => $this->EmailAuth,
            'OffsiteBackup' => $this->OffsiteBackup,
            'SecuredServer' => $this->SecuredServer,
            'Storagebackup' => $this->Storagebackup,
            'ISSP' => $this->ISSP,
        ]);

        $query->andFilterWhere(['like', 'ISSPDesc', $this->ISSPDesc])
            ->andFilterWhere(['like', 'Uuid', $this->Uuid]);

        return $dataProvider;
    }
}
