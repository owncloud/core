<?php
/*
 * Copyright 2014 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */

namespace Google\Service\Contentwarehouse;

class GeostoreParkingAllowanceProto extends \Google\Collection
{
  protected $collection_key = 'timeBasedRate';
  /**
   * @var string
   */
  public $allowanceType;
  /**
   * @var bool
   */
  public $isDiscount;
  protected $minPurchaseForValidationType = FreebaseTopic::class;
  protected $minPurchaseForValidationDataType = 'array';
  protected $permitTypeType = GeostoreLanguageTaggedTextProto::class;
  protected $permitTypeDataType = 'array';
  /**
   * @var string[]
   */
  public $serviceType;
  protected $timeBasedRateType = GeostoreTimeBasedRateProto::class;
  protected $timeBasedRateDataType = 'array';
  /**
   * @var string
   */
  public $vehicleType;

  /**
   * @param string
   */
  public function setAllowanceType($allowanceType)
  {
    $this->allowanceType = $allowanceType;
  }
  /**
   * @return string
   */
  public function getAllowanceType()
  {
    return $this->allowanceType;
  }
  /**
   * @param bool
   */
  public function setIsDiscount($isDiscount)
  {
    $this->isDiscount = $isDiscount;
  }
  /**
   * @return bool
   */
  public function getIsDiscount()
  {
    return $this->isDiscount;
  }
  /**
   * @param FreebaseTopic[]
   */
  public function setMinPurchaseForValidation($minPurchaseForValidation)
  {
    $this->minPurchaseForValidation = $minPurchaseForValidation;
  }
  /**
   * @return FreebaseTopic[]
   */
  public function getMinPurchaseForValidation()
  {
    return $this->minPurchaseForValidation;
  }
  /**
   * @param GeostoreLanguageTaggedTextProto[]
   */
  public function setPermitType($permitType)
  {
    $this->permitType = $permitType;
  }
  /**
   * @return GeostoreLanguageTaggedTextProto[]
   */
  public function getPermitType()
  {
    return $this->permitType;
  }
  /**
   * @param string[]
   */
  public function setServiceType($serviceType)
  {
    $this->serviceType = $serviceType;
  }
  /**
   * @return string[]
   */
  public function getServiceType()
  {
    return $this->serviceType;
  }
  /**
   * @param GeostoreTimeBasedRateProto[]
   */
  public function setTimeBasedRate($timeBasedRate)
  {
    $this->timeBasedRate = $timeBasedRate;
  }
  /**
   * @return GeostoreTimeBasedRateProto[]
   */
  public function getTimeBasedRate()
  {
    return $this->timeBasedRate;
  }
  /**
   * @param string
   */
  public function setVehicleType($vehicleType)
  {
    $this->vehicleType = $vehicleType;
  }
  /**
   * @return string
   */
  public function getVehicleType()
  {
    return $this->vehicleType;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GeostoreParkingAllowanceProto::class, 'Google_Service_Contentwarehouse_GeostoreParkingAllowanceProto');
