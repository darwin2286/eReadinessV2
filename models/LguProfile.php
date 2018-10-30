<?php

namespace app\models;

use Yii;
use thamtech\uuid\helpers\UuidHelper;
/**
 * This is the model class for table "lgu_profile".
 *
 * @property int $Id
 * @property int $MunicipalityCityId
 * @property int $IncomeClassId
 * @property string $lgu_website
 * @property int $new_business_corporation
 * @property int $new_business_cooperative
 * @property int $new_business_partnership
 * @property int $new_business_signle
 * @property int $renew_business_corporation
 * @property int $renew_business_cooperative
 * @property int $renew_business_partnership
 * @property int $renew_business_single
 * @property string $lce_name
 * @property int $LceTermId
 * @property int $CoachId
 *
 * @property ContactPerson[] $contactPeople
 * @property LguComputingDevice[] $lguComputingDevices
 * @property LguEmployee[] $lguEmployees
 * @property LguEmployeeCourse[] $lguEmployeeCourses
 * @property LguEmployeeOffice[] $lguEmployeeOffices
 * @property LguEmployeePosition[] $lguEmployeePositions
 * @property LguFrontlineService[] $lguFrontlineServices
 * @property LguHardwarePeripherals[] $lguHardwarePeripherals
 * @property LguNetwork[] $lguNetworks
 * @property LguOsAdmin[] $lguOsAdmins
 * @property IncomeClass $incomeClass
 * @property LceTerm $lceTerm
 * @property Psgcmunicipalitycity $municipalityCity
 * @property LguSecurity[] $lguSecurities
 * @property LguServer[] $lguServers
 */
class LguProfile extends \yii\db\ActiveRecord
{
    public $totalNew; 
    public $totalRenew;
    private $_level;
   // public $grandTotal;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lgu_profile';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['MunicipalityCityId', 'IncomeClassId', 'lce_name', 'LceTermId','NoBarangay'], 'required'],
            [['MunicipalityCityId', 'IncomeClassId', 'new_business_corporation', 'new_business_cooperative', 'new_business_partnership', 'new_business_signle', 'renew_business_corporation', 'renew_business_cooperative', 'renew_business_partnership', 'renew_business_single','NoBarangay', 'LceTermId'], 'integer'],
            [['lgu_website', 'lce_name','OtherClass','LrcUrl'], 'string', 'max' => 500],
            [['IncomeClassId'], 'exist', 'skipOnError' => true, 'targetClass' => IncomeClass::className(), 'targetAttribute' => ['IncomeClassId' => 'Id']],
            [['LceTermId'], 'exist', 'skipOnError' => true, 'targetClass' => LceTerm::className(), 'targetAttribute' => ['LceTermId' => 'Id']],
            [['MunicipalityCityId'], 'exist', 'skipOnError' => true, 'targetClass' => Psgcmunicipalitycity::className(), 'targetAttribute' => ['MunicipalityCityId' => 'Id']],
            [['Uuid'], 'string', 'max' => 60],
            [['EffectivityDateLRC'], 'safe'],
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
            'CoachId' => 'Coach ID',
            'MunicipalityCityId' => 'LGU Name',
            'IncomeClassId' => 'Income Class',
            'NoBarangay' => 'Number of Barangays',
            'lgu_website' => 'LGU Website',
            'totalNew' => 'Sub-total:',
            'totalRenew' => 'Sub-total:',
           // 'grandTotal' => 'Grand Total(New and Renewed):',
            'new_business_corporation' => 'Corporation',
            'new_business_cooperative' => 'Cooperative',
            'new_business_partnership' => 'Partnership',
            'new_business_signle' => 'Single Proprietorship',
            'renew_business_corporation' => 'Corporation',
            'renew_business_cooperative' => 'Cooperative',
            'renew_business_partnership' => 'Partnership',
            'renew_business_single' => 'Single Proprietorship',
            'lce_name' => '*Full Name',
            'LrcUrl' => 'LRC URL',
            'LceTermId' => 'Term of Office',
            'isFinalized' => 'Status of Survey',
            'EffectivityDateLRC'=>'Effectivity Date of LRC',
            'Uuid'=>'Uuid',
            
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
    public function getContactPeople()
    {
        return $this->hasMany(ContactPerson::className(), ['LguProfileId' => 'Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLguComputingDevices()
    {
        return $this->hasMany(LguComputingDevice::className(), ['LguProfileId' => 'Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLguEmployees()
    {
        return $this->hasMany(LguEmployee::className(), ['LguProfileId' => 'Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLguEmployeeCourses()
    {
        return $this->hasMany(LguEmployeeCourse::className(), ['LguProfileId' => 'Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLguEmployeeOffices()
    {
        return $this->hasMany(LguEmployeeOffice::className(), ['LguProfileId' => 'Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLguEmployeePositions()
    {
        return $this->hasMany(LguEmployeePosition::className(), ['LguProfileId' => 'Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLguFrontlineServices()
    {
        return $this->hasMany(LguFrontlineService::className(), ['LguProfileId' => 'Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLguHardwarePeripherals()
    {
        return $this->hasMany(LguHardwarePeripherals::className(), ['LguProfileId' => 'Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLguNetworks()
    {
        return $this->hasMany(LguNetwork::className(), ['LguProfileId' => 'Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLguOsAdmins()
    {
        return $this->hasMany(LguOsAdmin::className(), ['LguProfileId' => 'Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIncomeClass()
    {
        return $this->hasOne(IncomeClass::className(), ['Id' => 'IncomeClassId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLceTerm()
    {
        return $this->hasOne(LceTerm::className(), ['Id' => 'LceTermId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMunicipalityCity()
    {
        return $this->hasOne(Psgcmunicipalitycity::className(), ['Id' => 'MunicipalityCityId']);
    }
 

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLguSecurities()
    {
        return $this->hasMany(LguSecurity::className(), ['LguProfileId' => 'Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLguServers()
    {
        return $this->hasMany(LguServer::className(), ['LguProfileId' => 'Id']);
    }
    
  
    
   public function getLevel($level)
   {
     if($level == 1)
     {
       $this->_level = "City";
     }else{
       $this->_level = "Municipality";
     }
     return $this->_level;
   }

   public function getIncome($income)
   {
     $classIncome = IncomeClass::findOne(['Id'=>$income]);
     return $classIncome['Name'];
   }

   public function getFinish($isFinish)
    {
      if($isFinish == 0)
      {
        return 'No';
      }else{
        return 'Yes';
      }
    }
    // public function getProvince()
    // {
    //     return $this->hasOne(Psgcmunicipalitycity::className(), ['Id' => 'PsgcMunicipalityCity.ProvinceId']);
    // }
    // public function getProvince()
    // {
    //     return $this->Psgcmunicipalitycity ? $this->Psgcmunicipalitycity->ProvinceId : 'Id';
    // }
}
 
