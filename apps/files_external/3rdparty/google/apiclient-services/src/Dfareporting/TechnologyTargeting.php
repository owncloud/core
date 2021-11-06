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

namespace Google\Service\Dfareporting;

class TechnologyTargeting extends \Google\Collection
{
  protected $collection_key = 'platformTypes';
  protected $browsersType = Browser::class;
  protected $browsersDataType = 'array';
  protected $connectionTypesType = ConnectionType::class;
  protected $connectionTypesDataType = 'array';
  protected $mobileCarriersType = MobileCarrier::class;
  protected $mobileCarriersDataType = 'array';
  protected $operatingSystemVersionsType = OperatingSystemVersion::class;
  protected $operatingSystemVersionsDataType = 'array';
  protected $operatingSystemsType = OperatingSystem::class;
  protected $operatingSystemsDataType = 'array';
  protected $platformTypesType = PlatformType::class;
  protected $platformTypesDataType = 'array';

  /**
   * @param Browser[]
   */
  public function setBrowsers($browsers)
  {
    $this->browsers = $browsers;
  }
  /**
   * @return Browser[]
   */
  public function getBrowsers()
  {
    return $this->browsers;
  }
  /**
   * @param ConnectionType[]
   */
  public function setConnectionTypes($connectionTypes)
  {
    $this->connectionTypes = $connectionTypes;
  }
  /**
   * @return ConnectionType[]
   */
  public function getConnectionTypes()
  {
    return $this->connectionTypes;
  }
  /**
   * @param MobileCarrier[]
   */
  public function setMobileCarriers($mobileCarriers)
  {
    $this->mobileCarriers = $mobileCarriers;
  }
  /**
   * @return MobileCarrier[]
   */
  public function getMobileCarriers()
  {
    return $this->mobileCarriers;
  }
  /**
   * @param OperatingSystemVersion[]
   */
  public function setOperatingSystemVersions($operatingSystemVersions)
  {
    $this->operatingSystemVersions = $operatingSystemVersions;
  }
  /**
   * @return OperatingSystemVersion[]
   */
  public function getOperatingSystemVersions()
  {
    return $this->operatingSystemVersions;
  }
  /**
   * @param OperatingSystem[]
   */
  public function setOperatingSystems($operatingSystems)
  {
    $this->operatingSystems = $operatingSystems;
  }
  /**
   * @return OperatingSystem[]
   */
  public function getOperatingSystems()
  {
    return $this->operatingSystems;
  }
  /**
   * @param PlatformType[]
   */
  public function setPlatformTypes($platformTypes)
  {
    $this->platformTypes = $platformTypes;
  }
  /**
   * @return PlatformType[]
   */
  public function getPlatformTypes()
  {
    return $this->platformTypes;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(TechnologyTargeting::class, 'Google_Service_Dfareporting_TechnologyTargeting');
