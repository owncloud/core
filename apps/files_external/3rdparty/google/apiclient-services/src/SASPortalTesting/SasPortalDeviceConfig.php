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

namespace Google\Service\SASPortalTesting;

class SasPortalDeviceConfig extends \Google\Collection
{
  protected $collection_key = 'measurementCapabilities';
  protected $airInterfaceType = SasPortalDeviceAirInterface::class;
  protected $airInterfaceDataType = '';
  public $callSign;
  public $category;
  protected $installationParamsType = SasPortalInstallationParams::class;
  protected $installationParamsDataType = '';
  public $isSigned;
  public $measurementCapabilities;
  protected $modelType = SasPortalDeviceModel::class;
  protected $modelDataType = '';
  public $state;
  public $updateTime;
  public $userId;

  /**
   * @param SasPortalDeviceAirInterface
   */
  public function setAirInterface(SasPortalDeviceAirInterface $airInterface)
  {
    $this->airInterface = $airInterface;
  }
  /**
   * @return SasPortalDeviceAirInterface
   */
  public function getAirInterface()
  {
    return $this->airInterface;
  }
  public function setCallSign($callSign)
  {
    $this->callSign = $callSign;
  }
  public function getCallSign()
  {
    return $this->callSign;
  }
  public function setCategory($category)
  {
    $this->category = $category;
  }
  public function getCategory()
  {
    return $this->category;
  }
  /**
   * @param SasPortalInstallationParams
   */
  public function setInstallationParams(SasPortalInstallationParams $installationParams)
  {
    $this->installationParams = $installationParams;
  }
  /**
   * @return SasPortalInstallationParams
   */
  public function getInstallationParams()
  {
    return $this->installationParams;
  }
  public function setIsSigned($isSigned)
  {
    $this->isSigned = $isSigned;
  }
  public function getIsSigned()
  {
    return $this->isSigned;
  }
  public function setMeasurementCapabilities($measurementCapabilities)
  {
    $this->measurementCapabilities = $measurementCapabilities;
  }
  public function getMeasurementCapabilities()
  {
    return $this->measurementCapabilities;
  }
  /**
   * @param SasPortalDeviceModel
   */
  public function setModel(SasPortalDeviceModel $model)
  {
    $this->model = $model;
  }
  /**
   * @return SasPortalDeviceModel
   */
  public function getModel()
  {
    return $this->model;
  }
  public function setState($state)
  {
    $this->state = $state;
  }
  public function getState()
  {
    return $this->state;
  }
  public function setUpdateTime($updateTime)
  {
    $this->updateTime = $updateTime;
  }
  public function getUpdateTime()
  {
    return $this->updateTime;
  }
  public function setUserId($userId)
  {
    $this->userId = $userId;
  }
  public function getUserId()
  {
    return $this->userId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SasPortalDeviceConfig::class, 'Google_Service_SASPortalTesting_SasPortalDeviceConfig');
