<?php

namespace app\models;

use Yii;
use thamtech\uuid\helpers\UuidHelper;
/**
 * This is the model class for table "lgu_network".
 *
 * @property int $Id
 * @property int $LguProfileId
 * @property int $Intranet
 * @property int $LAN
 * @property int $WAN
 * @property int $VPN
 * @property int $Intrenet
 * @property int $LeasedLine
 * @property int $DSL
 * @property int $MobileData
 * @property int $ISDN
 * @property int $Satellite
 * @property int $ISP
 * @property string $ISPProvider1
 * @property string $Bandwidth1
 * @property string $ISPProvider2
 * @property string $Bandwidth2
 * @property int $NoEmployeeInternet
 * @property int $NoEmployeeEmail
 * @property string $Uuid
 *
 * @property LguProfile $lguProfile
 */
class LguNetwork extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lgu_network';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['LguProfileId'], 'required'],
            [['LguProfileId', 'Intranet', 'LAN', 'WAN', 'VPN', 'Intrenet', 'LeasedLine', 'DSL', 'MobileData', 'ISDN', 'Satellite', 'ISP', 'NoEmployeeInternet', 'NoEmployeeEmail'], 'integer'],
            [['ISPProvider1', 'ISPProvider2'], 'string', 'max' => 500],
            [['Bandwidth1', 'Bandwidth2'], 'string', 'max' => 100],
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
            'Intranet' => 'Intranet',
            'LAN' => 'Lan',
            'WAN' => 'Wan',
            'VPN' => 'Vpn',
            'Intrenet' => 'Intrenet',
            'LeasedLine' => 'Leased Line',
            'DSL' => 'Dsl',
            'MobileData' => 'Mobile Data',
            'ISDN' => 'Isdn',
            'Satellite' => 'Satellite',
            'ISP' => 'Isp',
            'ISPProvider1' => 'Provider:',
            'Bandwidth1' => 'Bandwidth:',
            'ISPProvider2' => 'Provider:',
            'Bandwidth2' => 'Bandwidth:',
            'NoEmployeeInternet' => 'Number of Employees with access to the internet :',
            'NoEmployeeEmail' => 'Number of Employees with official e-mail address :',
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
