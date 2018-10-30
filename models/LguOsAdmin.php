<?php

namespace app\models;

use Yii;
use thamtech\uuid\helpers\UuidHelper;
/**
 * This is the model class for table "lgu_os_admin".
 *
 * @property int $Id
 * @property int $LguProfileId
 * @property string $OSWorkstation
 * @property string $OSServer
 * @property int $CBMS
 * @property int $HRMIS
 * @property int $LGPMS
 * @property int $PayrollSystem
 * @property int $PIS
 * @property int $ProcurementSystem
 * @property int $ProjectMonitoringSystem
 * @property int $RecordsManagementSystem
 * @property int $DocumentTrackingSystem
 * @property string $Uuid
 *
 * @property LguProfile $lguProfile
 * @property LguOsOther[] $lguOsOthers
 */
class LguOsAdmin extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lgu_os_admin';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['LguProfileId'], 'required'],
            [['LguProfileId', 'CBMS', 'HRMIS', 'LGPMS', 'PayrollSystem', 'PIS', 'ProcurementSystem', 'ProjectMonitoringSystem', 'RecordsManagementSystem', 'DocumentTrackingSystem'], 'integer'],
            [['OSWorkstation', 'OSServer'], 'string', 'max' => 500],
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
            'OSWorkstation' => 'Osworkstation',
            'OSServer' => 'Osserver',
            'CBMS' => 'Cbms',
            'HRMIS' => 'Hrmis',
            'LGPMS' => 'Lgpms',
            'PayrollSystem' => 'Payroll System',
            'PIS' => 'Pis',
            'ProcurementSystem' => 'Procurement System',
            'ProjectMonitoringSystem' => 'Project Monitoring System',
            'RecordsManagementSystem' => 'Records Management System',
            'DocumentTrackingSystem' => 'Document Tracking System',
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLguOsOthers()
    {
        return $this->hasMany(LguOsOther::className(), ['LguOSAdminId' => 'Id']);
    }
}
