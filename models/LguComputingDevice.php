<?php

namespace app\models;

use Yii;
use thamtech\uuid\helpers\UuidHelper;
/**
 * This is the model class for table "lgu_computing_device".
 *
 * @property int $Id
 * @property int $LguProfileId
 * @property int $DesctopComputer
 * @property int $Laptop
 * @property int $ApplicationServer
 * @property int $WebServer
 * @property int $DBServer
 * @property int $FileServer
 * @property int $MailServer
 * @property int $Tablets
 * @property int $SmartPhones
 * @property string $Uuid
 *
 * @property LguProfile $lguProfile
 */
class LguComputingDevice extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lgu_computing_device';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['LguProfileId'], 'required'],
            [['LguProfileId', 'DesktopComputer', 'Laptop', 'ApplicationServer', 'WebServer', 'DBServer', 'FileServer', 'MailServer', 'Tablets', 'SmartPhones'], 'integer'],
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
            'DesktopComputer' => 'Desktop Computer',
            'Laptop' => 'Laptop',
            'ApplicationServer' => 'Application Server',
            'WebServer' => 'Web Server',
            'DBServer' => 'Dbserver',
            'FileServer' => 'File Server',
            'MailServer' => 'Mail Server',
            'Tablets' => 'Tablets',
            'SmartPhones' => 'Smart Phones',
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
