<?php

namespace app\models;

use Yii;
use thamtech\uuid\helpers\UuidHelper;
/**
 * This is the model class for table "lgu_employee_position".
 *
 * @property int $Id
 * @property int $LguProfileId
 * @property int $EmployeePositionId
 * @property int $EmployeeStatusId
 * @property int $NoOfEmployee
 * @property string $Uuid
 *
 * @property EmployeePosition $employeePosition
 * @property LguProfile $lguProfile
 */
class LguEmployeePosition extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lgu_employee_position';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['LguProfileId', 'EmployeePositionId', 'EmployeeStatusId', 'NoOfEmployee'], 'required'],
            [['LguProfileId', 'EmployeePositionId', 'EmployeeStatusId', 'NoOfEmployee'], 'integer'],
            [['Uuid'], 'string', 'max' => 60],
            [['Uuid'], 'thamtech\uuid\validators\UuidValidator'],
            [['EmployeePositionId'], 'exist', 'skipOnError' => true, 'targetClass' => EmployeePosition::className(), 'targetAttribute' => ['EmployeePositionId' => 'Id']],
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
            'EmployeePositionId' => 'Employee Position ID',
            'EmployeeStatusId' => 'Employee Status ID',
            'NoOfEmployee' => 'No Of Employee',
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
    public function getEmployeePosition()
    {
        return $this->hasOne(EmployeePosition::className(), ['Id' => 'EmployeePositionId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLguProfile()
    {
        return $this->hasOne(LguProfile::className(), ['Id' => 'LguProfileId']);
    }
}
