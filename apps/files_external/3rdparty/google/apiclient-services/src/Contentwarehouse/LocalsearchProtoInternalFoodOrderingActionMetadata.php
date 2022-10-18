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

class LocalsearchProtoInternalFoodOrderingActionMetadata extends \Google\Collection
{
  protected $collection_key = 'serviceInfo';
  /**
   * @var string
   */
  public $actionType;
  /**
   * @var bool
   */
  public $hasPrimarilyFoodIntent;
  /**
   * @var bool
   */
  public $isOutOfOperationalHours;
  /**
   * @var bool
   */
  public $isWhitelistedExternalRestaurant;
  /**
   * @var string
   */
  public $nextOpeningTime;
  /**
   * @var bool
   */
  public $onlyOrderAheadServicesAvailable;
  protected $serviceInfoType = LocalsearchProtoInternalFoodOrderingActionMetadataServiceInfo::class;
  protected $serviceInfoDataType = 'array';
  /**
   * @var string
   */
  public $supportedServiceType;
  /**
   * @var string
   */
  public $unavailabilityReason;

  /**
   * @param string
   */
  public function setActionType($actionType)
  {
    $this->actionType = $actionType;
  }
  /**
   * @return string
   */
  public function getActionType()
  {
    return $this->actionType;
  }
  /**
   * @param bool
   */
  public function setHasPrimarilyFoodIntent($hasPrimarilyFoodIntent)
  {
    $this->hasPrimarilyFoodIntent = $hasPrimarilyFoodIntent;
  }
  /**
   * @return bool
   */
  public function getHasPrimarilyFoodIntent()
  {
    return $this->hasPrimarilyFoodIntent;
  }
  /**
   * @param bool
   */
  public function setIsOutOfOperationalHours($isOutOfOperationalHours)
  {
    $this->isOutOfOperationalHours = $isOutOfOperationalHours;
  }
  /**
   * @return bool
   */
  public function getIsOutOfOperationalHours()
  {
    return $this->isOutOfOperationalHours;
  }
  /**
   * @param bool
   */
  public function setIsWhitelistedExternalRestaurant($isWhitelistedExternalRestaurant)
  {
    $this->isWhitelistedExternalRestaurant = $isWhitelistedExternalRestaurant;
  }
  /**
   * @return bool
   */
  public function getIsWhitelistedExternalRestaurant()
  {
    return $this->isWhitelistedExternalRestaurant;
  }
  /**
   * @param string
   */
  public function setNextOpeningTime($nextOpeningTime)
  {
    $this->nextOpeningTime = $nextOpeningTime;
  }
  /**
   * @return string
   */
  public function getNextOpeningTime()
  {
    return $this->nextOpeningTime;
  }
  /**
   * @param bool
   */
  public function setOnlyOrderAheadServicesAvailable($onlyOrderAheadServicesAvailable)
  {
    $this->onlyOrderAheadServicesAvailable = $onlyOrderAheadServicesAvailable;
  }
  /**
   * @return bool
   */
  public function getOnlyOrderAheadServicesAvailable()
  {
    return $this->onlyOrderAheadServicesAvailable;
  }
  /**
   * @param LocalsearchProtoInternalFoodOrderingActionMetadataServiceInfo[]
   */
  public function setServiceInfo($serviceInfo)
  {
    $this->serviceInfo = $serviceInfo;
  }
  /**
   * @return LocalsearchProtoInternalFoodOrderingActionMetadataServiceInfo[]
   */
  public function getServiceInfo()
  {
    return $this->serviceInfo;
  }
  /**
   * @param string
   */
  public function setSupportedServiceType($supportedServiceType)
  {
    $this->supportedServiceType = $supportedServiceType;
  }
  /**
   * @return string
   */
  public function getSupportedServiceType()
  {
    return $this->supportedServiceType;
  }
  /**
   * @param string
   */
  public function setUnavailabilityReason($unavailabilityReason)
  {
    $this->unavailabilityReason = $unavailabilityReason;
  }
  /**
   * @return string
   */
  public function getUnavailabilityReason()
  {
    return $this->unavailabilityReason;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(LocalsearchProtoInternalFoodOrderingActionMetadata::class, 'Google_Service_Contentwarehouse_LocalsearchProtoInternalFoodOrderingActionMetadata');
