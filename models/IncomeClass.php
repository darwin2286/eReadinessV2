<?php

namespace app\models;

use Yii;
use thamtech\uuid\helpers\UuidHelper;
/**
 * This is the model class for table "income_class".
 *
 * @property int $Id
 * @property string $Name
 * @property int $Status
 * @property int $Uuid
 *
 * @property LguProfile[] $lguProfiles
 */
class IncomeClass extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'income_class';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Name'], 'required'],
            [['Status'], 'integer'],
            [['Name'], 'string', 'max' => 500],
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
            'Name' => 'Name',
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
    public function getLguProfiles()
    {
        return $this->hasMany(LguProfile::className(), ['IncomeClassId' => 'Id']);
    }
}
