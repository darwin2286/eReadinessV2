<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\User;

/**
 * UserSearch represents the model behind the search form of `app\models\User`.
 */
class UserSearch extends User
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Id', 'LguProfileId', 'IsDeleted'], 'integer'],
            [['Username', 'AuthKey', 'Password', 'PasswordResetToken', 'Email', 'Uuid'], 'safe'],
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
        $query = User::find();

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
            'IsDeleted' => $this->IsDeleted,
        ]);

        $query->andFilterWhere(['like', 'Username', $this->Username])
            ->andFilterWhere(['like', 'AuthKey', $this->AuthKey])
            ->andFilterWhere(['like', 'Password', $this->Password])
            ->andFilterWhere(['like', 'PasswordResetToken', $this->PasswordResetToken])
            ->andFilterWhere(['like', 'Email', $this->Email])
            ->andFilterWhere(['like', 'Uuid', $this->Uuid]);

        return $dataProvider;
    }
}
