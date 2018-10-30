<?php

namespace app\models;

use Yii;
use thamtech\uuid\helpers\UuidHelper;

/**
 * This is the model class for table "contact_person".
 *
 * @property int $Id
 * @property int $LguProfileId
 * @property string $ConatactName
 * @property string $ContactEmail
 * @property string $ContactDesignation
 * @property string $ContactNo
 * @property string $Uuid
 * @property int $PartNo
 *
 * @property LguProfile $lguProfile
 */
class ContactPerson extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'contact_person';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['LguProfileId', 'ConatactName', 'ContactEmail', 'ContactDesignation', 'ContactNo', 'PartNo'], 'required'],
            [['LguProfileId', 'PartNo'], 'integer'],
            [['ContactEmail'], 'email'],
            [['ConatactName', 'ContactEmail', 'ContactDesignation'], 'string', 'max' => 500],
            [['ContactNo'], 'string', 'max' => 100],
            [['Uuid'], 'string', 'max' => 60],
            [['Uuid'], 'thamtech\uuid\validators\UuidValidator'],
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
            'ConatactName' => 'Name*',
            'ContactEmail' => 'Email Address*',
            'ContactDesignation' => 'Designation*',
            'ContactNo' => 'Contact Number*',
            'Uuid' => 'Uuid',
            'PartNo' => 'Part No',
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
    public function getLguProfile()
    {
        return $this->hasOne(LguProfile::className(), ['Id' => 'LguProfileId']);
    }
}
