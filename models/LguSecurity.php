<?php

namespace app\models;

use Yii;
use thamtech\uuid\helpers\UuidHelper;
/**
 * This is the model class for table "lgu_security".
 *
 * @property int $Id
 * @property int $LguProfileId
 * @property int $ProtectionScheme
 * @property int $SecurityPolicy
 * @property int $DisasterRecoveryPlan
 * @property int $DigitalSecurity
 * @property int $Encryption
 * @property int $UPS
 * @property int $HardwareFirewall
 * @property int $SoftwareFirewall
 * @property int $SubSecuritySoft
 * @property int $EmailAuth
 * @property int $OffsiteBackup
 * @property int $SecuredServer
 * @property int $Storagebackup
 * @property int $ISSP
 * @property string $ISSPDesc
 * @property string $Uuid
 *
 * @property LguProfile $lguProfile
 */
class LguSecurity extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lgu_security';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['LguProfileId'], 'required'],
            [['LguProfileId', 'ProtectionScheme', 'SecurityPolicy', 'DisasterRecoveryPlan', 'DigitalSecurity', 'Encryption', 'UPS', 'HardwareFirewall', 'SoftwareFirewall', 'SubSecuritySoft', 'EmailAuth', 'OffsiteBackup', 'SecuredServer', 'Storagebackup', 'ISSP'], 'integer'],
            [['ISSPDesc', 'Uuid'], 'string', 'max' => 500],
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
            'ProtectionScheme' => 'Protection Scheme',
            'SecurityPolicy' => 'Security Policy',
            'DisasterRecoveryPlan' => 'Disaster Recovery Plan',
            'DigitalSecurity' => 'Digital Security',
            'Encryption' => 'Encryption',
            'UPS' => 'Ups',
            'HardwareFirewall' => 'Hardware Firewall',
            'SoftwareFirewall' => 'Software Firewall',
            'SubSecuritySoft' => 'Sub Security Soft',
            'EmailAuth' => 'Email Auth',
            'OffsiteBackup' => 'Offsite Backup',
            'SecuredServer' => 'Secured Server',
            'Storagebackup' => 'Storagebackup',
            'ISSP' => 'Issp',
            'ISSPDesc' => 'Date:',
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
