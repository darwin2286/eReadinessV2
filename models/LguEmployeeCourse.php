<?php

namespace app\models;

use Yii;
use thamtech\uuid\helpers\UuidHelper;
/**
 * This is the model class for table "lgu_employee_course".
 *
 * @property int $Id
 * @property int $LguProfileId
 * @property int $CourseId
 * @property int $NoOfEmployee
 * @property string $OtherProgramming
 * @property string $OtherNoSql
 * @property string $OtherDatabase
 * @property string $Uuid
 * @property int $checkSubCourse
 *
 * @property Course $course
 * @property LguProfile $lguProfile
 */
class LguEmployeeCourse extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lgu_employee_course';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['LguProfileId', 'CourseId'], 'required'],
            [['LguProfileId', 'CourseId', 'NoOfEmployee', 'checkSubCourse'], 'integer'],
            [['OtherProgramming', 'OtherNoSql', 'OtherDatabase'], 'string', 'max' => 500],
            [['Uuid'], 'string', 'max' => 60],
            [['Uuid'], 'thamtech\uuid\validators\UuidValidator'],
            [['CourseId'], 'exist', 'skipOnError' => true, 'targetClass' => Course::className(), 'targetAttribute' => ['CourseId' => 'Id']],
            [['LguProfileId'], 'exist', 'skipOnError' => true, 'targetClass' => LguProfile::className(), 'targetAttribute' => ['LguProfileId' => 'Id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Id' => 'ID',
            'LguProfileId' => 'Lgu Profile ID',
            'CourseId' => 'Course ID',
            'NoOfEmployee' => 'No Of Employee',
            'OtherProgramming' => 'Other Programming',
            'OtherNoSql' => 'Other No Sql',
            'OtherDatabase' => 'Other Database',
            'Uuid' => 'Uuid',
            'checkSubCourse' => 'Check Sub Course',
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
    public function getCourse()
    {
        return $this->hasOne(Course::className(), ['Id' => 'CourseId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLguProfile()
    {
        return $this->hasOne(LguProfile::className(), ['Id' => 'LguProfileId']);
    }
}
