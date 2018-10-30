<?php

namespace app\models;

use Yii;
use thamtech\uuid\helpers\UuidHelper;
/**
 * This is the model class for table "software_os".
 *
 * @property int $Id
 * @property int $OSDescription
 * @property int $Status
 * @property int $WorkstationServer
 * @property string $Uuid
 */
class SoftwareOs extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'software_os';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['OSDescription', 'Status', 'WorkstationServer'], 'required'],
            [[ 'Status', 'WorkstationServer'], 'integer'],
            [['Uuid'], 'string', 'max' => 60],
            [['OSDescription'], 'string', 'max' => 500],
            [['Uuid'], 'thamtech\uuid\validators\UuidValidator'],
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
            'OSDescription' => 'Osdescription',
            'Status' => 'Status',
            'WorkstationServer' => 'Workstation Server',
            'Uuid' => 'Uuid',
        ];
    }
}
