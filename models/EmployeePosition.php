<?php

namespace app\models;

use Yii;
use thamtech\uuid\helpers\UuidHelper;
/**
 * This is the model class for table "employee_position".
 *
 * @property int $Id
 * @property string $PositionDescription
 * @property int $Status
 * @property string $Uuid
 *
 * @property LguEmployeePosition[] $lguEmployeePositions
 */
class EmployeePosition extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'employee_position';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['PositionDescription', 'Status'], 'required'],
            [['Status'], 'integer'],
            [['PositionDescription'], 'string', 'max' => 500],
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
            'PositionDescription' => 'Position Description',
            'Status' => 'Status',
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
    public function getLguEmployeePositions()
    {
        return $this->hasMany(LguEmployeePosition::className(), ['EmployeePositionId' => 'Id']);
    }
}
