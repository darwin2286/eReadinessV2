<?php

namespace app\models;

use Yii;
use thamtech\uuid\helpers\UuidHelper;
/**
 * This is the model class for table "cluster".
 *
 * @property string $Id
 * @property string $ClusterName
 * @property string $ClusterCode
 * @property string $Uuid
 * @property int $Status
 *
 * @property Coaches[] $coaches
 */
class Cluster extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cluster';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ClusterName','ClusterCode', 'Status'], 'required'],
            [['Status'], 'integer'],
            [['ClusterName'], 'string', 'max' => 500],
            [['ClusterCode'], 'string', 'max' => 20],
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
            'ClusterName' => 'Cluster Name',
            'ClusterCode' => 'Cluster Code',
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
    public function getCoaches()
    {
        return $this->hasMany(Coaches::className(), ['ClusterId' => 'Id']);
    }
}
