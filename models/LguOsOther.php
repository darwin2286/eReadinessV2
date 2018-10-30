<?php

namespace app\models;

use Yii;
use thamtech\uuid\helpers\UuidHelper;
/**
 * This is the model class for table "lgu_os_other".
 *
 * @property int $Id
 * @property int $LguOSAdminId
 * @property string $OtherName
 * @property string $Uuid
 *
 * @property LguOsAdmin $lguOSAdmin
 */
class LguOsOther extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lgu_os_other';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['LguOSAdminId', 'OtherName'], 'required'],
            [['LguOSAdminId'], 'integer'],
            [['OtherName'], 'string', 'max' => 500],
            [['Uuid'], 'string', 'max' => 60],
            [['Uuid'], 'thamtech\uuid\validators\UuidValidator'],
            [['LguOSAdminId'], 'exist', 'skipOnError' => true, 'targetClass' => LguOsAdmin::className(), 'targetAttribute' => ['LguOSAdminId' => 'Id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Id' => 'ID',
            'LguOSAdminId' => 'Lgu Osadmin ID',
            'OtherName' => 'Other Name',
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
    public function getLguOSAdmin()
    {
        return $this->hasOne(LguOsAdmin::className(), ['Id' => 'LguOSAdminId']);
    }
}
