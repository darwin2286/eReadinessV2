<?php

namespace app\models;

use Yii;
use thamtech\uuid\helpers\UuidHelper;

/**
 * This is the model class for table "lgu_cloud".
 *
 * @property int $Id
 * @property int $LguProfileId
 * @property string $Provider1
 * @property string $ContractValidity1
 * @property string $Provider1Service1
 * @property string $Provider1Service2
 * @property string $Provider1Service3
 * @property string $Provider1Service4
 * @property string $Provider1Service5
 * @property string $Provider1Service6
 * @property string $Provider2
 * @property string $ContractValidity2
 * @property string $Provider2Service1
 * @property string $Provider2Service2
 * @property string $Provider2Service3
 * @property string $Provider2Service4
 * @property string $Provider2Service5
 * @property string $Provider2Service6
 * @property string $WebHost1
 * @property string $WebHost2
 * @property int $Uuid
 *
 * @property LguProfile $lguProfile
 */
class LguCloud extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lgu_cloud';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['LguProfileId'], 'required'],
            [['LguProfileId'], 'integer'],
            [['Uuid'], 'string', 'max' => 60],
            [['Uuid'], 'thamtech\uuid\validators\UuidValidator'],
            [['Provider1', 'ContractValidity1', 'Provider1Service1', 'Provider1Service2', 'Provider1Service3', 'Provider1Service4', 'Provider1Service5', 'Provider1Service6', 'Provider2', 'ContractValidity2', 'Provider2Service1', 'Provider2Service2', 'Provider2Service3', 'Provider2Service4', 'Provider2Service5', 'Provider2Service6', 'WebHost1', 'WebHost2'], 'string', 'max' => 500],
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
            'Provider1' => 'Name of provider:',
            'ContractValidity1' => 'Contract Validity:',
            'Provider1Service1' => '1.',
            'Provider1Service2' => '2.',
            'Provider1Service3' => '3.',
            'Provider1Service4' => '4.',
            'Provider1Service5' => '5.',
            'Provider1Service6' => '6.',
            'Provider2' => 'Name of provider:',
            'ContractValidity2' => 'Contract Validity:',
            'Provider2Service1' => '1.',
            'Provider2Service2' => '2.',
            'Provider2Service3' => '3.',
            'Provider2Service4' => '4.',
            'Provider2Service5' => '5.',
            'Provider2Service6' => '6.',
            'WebHost1' => '1.',
            'WebHost2' => '2.',
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
