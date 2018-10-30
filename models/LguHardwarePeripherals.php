<?php

namespace app\models;

use Yii;
use thamtech\uuid\helpers\UuidHelper;
/**
 * This is the model class for table "lgu_hardware_peripherals".
 *
 * @property int $Id
 * @property int $LguProfileId
 * @property int $MultiPrinter
 * @property int $Printer
 * @property int $DocScanner
 * @property int $UPS
 * @property int $GenSet
 * @property int $Biometric
 * @property int $AccessCard
 * @property string $Uuid
 *
 * @property LguProfile $lguProfile
 */
class LguHardwarePeripherals extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lgu_hardware_peripherals';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['LguProfileId'], 'required'],
            [['LguProfileId', 'MultiPrinter', 'Printer', 'DocScanner', 'UPS', 'GenSet', 'Biometric', 'AccessCard'], 'integer'],
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
            'MultiPrinter' => 'Multi Printer',
            'Printer' => 'Printer',
            'DocScanner' => 'Doc Scanner',
            'UPS' => 'Ups',
            'GenSet' => 'Gen Set',
            'Biometric' => 'Biometric',
            'AccessCard' => 'Access Card',
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
    public function getLguProfile()
    {
        return $this->hasOne(LguProfile::className(), ['Id' => 'LguProfileId']);
    }
}
