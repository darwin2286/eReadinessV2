<?php

namespace app\models;

use Yii;
use thamtech\uuid\helpers\UuidHelper;
/**
 * This is the model class for table "lgu_frontline_service".
 *
 * @property int $Id
 * @property int $LguProfileId
 * @property int $FrontlineServiceId
 * @property int $OnPremise
 * @property int $Online
 * @property int $ePayment
 * @property string $OnlineUrl
 * @property string $Uuid
 *
 * @property FrontlineService $frontlineService
 * @property LguProfile $lguProfile
 * @property LguFrontlineServiceOther[] $lguFrontlineServiceOthers
 */
class LguFrontlineService extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lgu_frontline_service';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['LguProfileId','FrontlineServiceId'], 'required'],
            [['LguProfileId', 'FrontlineServiceId', 'OnPremise', 'Online', 'ePayment'], 'integer'],
            [['OnlineUrl'], 'string', 'max' => 500],
            [['Uuid'], 'string', 'max' => 60],
            [['Uuid'], 'thamtech\uuid\validators\UuidValidator'],
            [['FrontlineServiceId'], 'exist', 'skipOnError' => true, 'targetClass' => FrontlineService::className(), 'targetAttribute' => ['FrontlineServiceId' => 'Id']],
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
            'FrontlineServiceId' => 'Frontline Service ID',
            'OnPremise' => 'On Premise',
            'Online' => 'Online',
            'ePayment' => 'E Payment',
            'OnlineUrl' => 'Online Url',
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
    public function getFrontlineService()
    {
        return $this->hasOne(FrontlineService::className(), ['Id' => 'FrontlineServiceId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLguProfile()
    {
        return $this->hasOne(LguProfile::className(), ['Id' => 'LguProfileId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLguFrontlineServiceOthers()
    {
        return $this->hasMany(LguFrontlineServiceOther::className(), ['FrontlineServiceId' => 'Id']);
    }
}
