<?php

namespace app\models;

use Yii;
use thamtech\uuid\helpers\UuidHelper;
/**
 * This is the model class for table "coaches".
 *
 * @property int $Id
 * @property string $CoachesName
 * @property string $ClusterId
 * @property string $Uuid
 * @property int $Status
 *
 * @property Cluster $cluster
 */
class Coaches extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'coaches';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['CoachesName', 'ClusterId', 'Status'], 'required'],
            [['ClusterId', 'Status'], 'integer'],
            [['CoachesName'], 'string', 'max' => 500],
            [['Uuid'], 'string', 'max' => 60],
            [['Uuid'], 'thamtech\uuid\validators\UuidValidator'],
            [['ClusterId'], 'exist', 'skipOnError' => true, 'targetClass' => Cluster::className(), 'targetAttribute' => ['ClusterId' => 'Id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Id' => 'ID',
            'CoachesName' => 'Coaches Name',
            'ClusterId' => 'Cluster ID',
            'Uuid' => 'Uuid',
            'Status' => 'Status',
        ];
    }

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
    public function getCluster()
    {
        return $this->hasOne(Cluster::className(), ['Id' => 'ClusterId']);
    }
}
