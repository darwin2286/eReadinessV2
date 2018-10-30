<?php

namespace app\models;

use Yii;
use thamtech\uuid\helpers\UuidHelper;
/**
 * This is the model class for table "lgu_server".
 *
 * @property int $Id
 * @property int $LguProfileId
 * @property string $CapicityStorage
 * @property int $InHouse
 * @property int $CoLocated
 * @property string $Uuid
 *
 * @property LguProfile $lguProfile
 */
class LguServer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lgu_server';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['LguProfileId'], 'required'],
            [['LguProfileId', 'InHouse', 'CoLocated'], 'integer'],
            [['CapicityStorage'], 'string', 'max' => 500],
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
            'CapicityStorage' => 'Capicity Storage',
            'InHouse' => 'In House',
            'CoLocated' => 'Co Located',
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
