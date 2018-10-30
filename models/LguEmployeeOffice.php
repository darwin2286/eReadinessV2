<?php

namespace app\models;

use Yii;
use thamtech\uuid\helpers\UuidHelper;
/**
 * This is the model class for table "lgu_employee_office".
 *
 * @property int $Id
 * @property int $LguProfileId
 * @property int $ICTOffice
 * @property int $BPLOffice
 * @property int $TreasurtOffice
 * @property int $OBOffice
 * @property int $HealthOffice
 * @property int $PDOffice
 * @property int $ZonningOffice
 * @property string $Uuid
 *
 * @property LguProfile $lguProfile
 */
class LguEmployeeOffice extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lgu_employee_office';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['LguProfileId' ], 'required'],
            [['LguProfileId', 'ICTOffice', 'BPLOffice', 'TreasurtOffice', 'OBOffice', 'HealthOffice', 'PDOffice', 'ZonningOffice','EngineeringOffice'], 'integer'],
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
            'ICTOffice' => 'Ictoffice',
            'BPLOffice' => 'Bploffice',
            'TreasurtOffice' => 'Treasurt Office',
            'OBOffice' => 'Oboffice',
            'HealthOffice' => 'Health Office',
            'PDOffice' => 'Pdoffice',
            'ZonningOffice' => 'Zonning Office',
            'EngineeringOffice' => 'Enginering Office',
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
