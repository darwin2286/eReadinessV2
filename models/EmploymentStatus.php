<?php

namespace app\models;

use Yii;
use thamtech\uuid\helpers\UuidHelper;
/**
 * This is the model class for table "employment_status".
 *
 * @property int $Id
 * @property string $EmploymentStatusDescription
 * @property int $Status
 * @property int $Uuid
 *
 * @property LguEmployee[] $lguEmployees
 */
class EmploymentStatus extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'employment_status';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['EmploymentStatusDescription', 'Status'], 'required'],
            [['Status'], 'integer'],
            [['EmploymentStatusDescription'], 'string', 'max' => 500],
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
            'EmploymentStatusDescription' => 'Employment Status Description',
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
    public function getLguEmployees()
    {
        return $this->hasMany(LguEmployee::className(), ['EmployementStatusId' => 'Id']);
    }
}
