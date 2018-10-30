<?php

namespace app\models;

use Yii;
use thamtech\uuid\helpers\UuidHelper;
/**
 * This is the model class for table "lgu_employee".
 *
 * @property int $Id
 * @property int $EmployementStatusId
 * @property int $LguProfileId
 * @property int $EmployeeMale
 * @property int $EmployeeFemale
 * @property string $Uuid
 *
 * @property EmploymentStatus $employementStatus
 * @property LguProfile $lguProfile
 */
class LguEmployee extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lgu_employee';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['EmployementStatusId', 'LguProfileId', 'EmployeeMale', 'EmployeeFemale'], 'required'],
            [['EmployementStatusId', 'LguProfileId', 'EmployeeMale', 'EmployeeFemale'], 'integer'],
            [['Uuid'], 'string', 'max' => 60],
            [['Uuid'], 'thamtech\uuid\validators\UuidValidator'],
            [['EmployementStatusId'], 'exist', 'skipOnError' => true, 'targetClass' => EmploymentStatus::className(), 'targetAttribute' => ['EmployementStatusId' => 'Id']],
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
            'EmployementStatusId' => 'Employement Status ID',
            'LguProfileId' => 'Lgu Profile ID',
            'EmployeeMale' => 'Employee Male',
            'EmployeeFemale' => 'Employee Female',
            'Uuid' => 'Uuid',
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
    public function getEmployementStatus()
    {
        return $this->hasOne(EmploymentStatus::className(), ['Id' => 'EmployementStatusId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLguProfile()
    {
        return $this->hasOne(LguProfile::className(), ['Id' => 'LguProfileId']);
    }
}
