<?php

namespace app\models;

use Yii;
use thamtech\uuid\helpers\UuidHelper;
/**
 * This is the model class for table "lgu_frontline_service_other".
 *
 * @property int $Id
 * @property int $LguProfileId
 * @property string $OtherName
 * @property int $OnPremise
 * @property int $Online
 * @property int $ePayment
 * @property int $OnlineUrl
 * @property string $Uuid
 *
 * @property LguProfile $lguProfile
 */
class LguFrontlineServiceOther extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lgu_frontline_service_other';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['LguProfileId' ], 'required'],
            [['LguProfileId', 'OnPremise', 'Online', 'ePayment', 'OnlineUrl'], 'integer'],
            [['OtherName'], 'string', 'max' => 500],
            [['Uuid'], 'string', 'max' => 60],
            [['Uuid'], 'thamtech\uuid\validators\UuidValidator'],
            [['LguProfileId'], 'exist', 'skipOnError' => true, 'targetClass' => LguProfile::className(), 'targetAttribute' => ['LguProfileId' => 'Id']],
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
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Id' => 'ID',
            'LguProfileId' => 'Lgu Profile ID',
            'OtherName' => 'Other Name',
            'OnPremise' => 'On Premise',
            'Online' => 'Online',
            'ePayment' => 'E Payment',
            'OnlineUrl' => 'Online Url',
            'Uuid' => 'Uuid',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLguProfile()
    {
        return $this->hasOne(LguProfile::className(), ['Id' => 'LguProfileId']);
    }
}
