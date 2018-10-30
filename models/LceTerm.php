<?php

namespace app\models;

use Yii;
use thamtech\uuid\helpers\UuidHelper;

/**
 * This is the model class for table "lce_term".
 *
 * @property int $Id
 * @property string $description
 * @property int $Status
 * @property string $Uuid
 *
 * @property LguProfile[] $lguProfiles
 */
class LceTerm extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lce_term';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description', 'Status'], 'required'],
            [['Status'], 'integer'],
            [['description'], 'string', 'max' => 100],
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
            'description' => 'Description',
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
        return $this->hasMany(LguProfile::className(), ['LceTermId' => 'Id']);
    }
}
