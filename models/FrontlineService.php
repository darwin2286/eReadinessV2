<?php

namespace app\models;

use Yii;
use thamtech\uuid\helpers\UuidHelper;
/**
 * This is the model class for table "frontline_service".
 *
 * @property int $Id
 * @property string $Description
 * @property int $Status
 * @property string $Uuid
 *
 * @property LguFrontlineService[] $lguFrontlineServices
 */
class FrontlineService extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'frontline_service';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Description', 'Status'], 'required'],
            [['Status','ParentId'], 'integer'],
            [['Description'], 'string', 'max' => 500],
            [['Uuid'], 'string', 'max' => 60],
            [['Uuid'], 'thamtech\uuid\validators\UuidValidator'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Id' => 'ID',
            'Description' => 'Description',
            'Status' => 'Status',
            'Uuid' => 'Uuid',
            'ParentId'=>'Parent Id'
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
    public function getLguFrontlineServices()
    {
        return $this->hasMany(LguFrontlineService::className(), ['FrontlineServiceId' => 'Id']);
    }
}
