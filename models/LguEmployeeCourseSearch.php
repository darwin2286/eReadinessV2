<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\LguEmployeeCourse;

/**
 * LguEmployeeCourseSearch represents the model behind the search form of `app\models\LguEmployeeCourse`.
 */
class LguEmployeeCourseSearch extends LguEmployeeCourse
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Id', 'LguProfileId', 'CourseId', 'NoOfEmployee', 'checkSubCourse'], 'integer'],
            [['OtherProgramming', 'OtherNoSql', 'OtherDatabase', 'Uuid'], 'safe'],
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
        $query = LguEmployeeCourse::find();

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
            'CourseId' => $this->CourseId,
            'NoOfEmployee' => $this->NoOfEmployee,
            'checkSubCourse' => $this->checkSubCourse,
        ]);

        $query->andFilterWhere(['like', 'OtherProgramming', $this->OtherProgramming])
            ->andFilterWhere(['like', 'OtherNoSql', $this->OtherNoSql])
            ->andFilterWhere(['like', 'OtherDatabase', $this->OtherDatabase])
            ->andFilterWhere(['like', 'Uuid', $this->Uuid]);

        return $dataProvider;
    }
}
