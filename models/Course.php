<?php

namespace app\models;

use Yii;
use thamtech\uuid\helpers\UuidHelper;
/**
 * This is the model class for table "course".
 *
 * @property int $Id
 * @property string $CourseDescription
 * @property int $Status
 * @property string $Uuid
 *
 * @property LguEmployeeCourse[] $lguEmployeeCourses
 */
class Course extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'course';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['CourseDescription', 'Status'], 'required'],
            [['Status','Subtopic','ParentId'], 'integer'],
            [['CourseDescription'], 'string', 'max' => 500],
            [['Uuid'], 'string', 'max' => 60],
            [['Uuid'], 'thamtech\uuid\validators\UuidValidator'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Id' => 'ID',
            'CourseDescription' => 'Course Description',
            'Status' => 'Status',
            'Uuid' => 'Uuid',
            'Subtopic' => 'Subtopic',
            'ParentId'=>'Parent'
        ];
    }

    /**
    * Generates Uuid before saving
    *
    * @param scenario $insert
    *
    * @return bool if form is valid
    */
   public function beforeSave($insert)
   {
       if (parent::beforeSave($insert))
       {
           if ($this->isNewRecord)
           {
               $this->Uuid = UuidHelper::uuid();
           }
           return true;
       }
       return false;
   }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLguEmployeeCourses()
    {
        return $this->hasMany(LguEmployeeCourse::className(), ['CourseId' => 'Id']);
    }
}
