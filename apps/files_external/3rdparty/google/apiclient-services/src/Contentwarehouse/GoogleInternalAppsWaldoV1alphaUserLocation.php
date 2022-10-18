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

class GoogleInternalAppsWaldoV1alphaUserLocation extends \Google\Model
{
  protected $customLocationType = GoogleInternalAppsWaldoV1alphaCustomLocation::class;
  protected $customLocationDataType = '';
  protected $homeLocationType = GoogleInternalAppsWaldoV1alphaHomeLocation::class;
  protected $homeLocationDataType = '';
  protected $officeLocationType = GoogleInternalAppsWaldoV1alphaOfficeLocation::class;
  protected $officeLocationDataType = '';

  /**
   * @param GoogleInternalAppsWaldoV1alphaCustomLocation
   */
  public function setCustomLocation(GoogleInternalAppsWaldoV1alphaCustomLocation $customLocation)
  {
    $this->customLocation = $customLocation;
  }
  /**
   * @return GoogleInternalAppsWaldoV1alphaCustomLocation
   */
  public function getCustomLocation()
  {
    return $this->customLocation;
  }
  /**
   * @param GoogleInternalAppsWaldoV1alphaHomeLocation
   */
  public function setHomeLocation(GoogleInternalAppsWaldoV1alphaHomeLocation $homeLocation)
  {
    $this->homeLocation = $homeLocation;
  }
  /**
   * @return GoogleInternalAppsWaldoV1alphaHomeLocation
   */
  public function getHomeLocation()
  {
    return $this->homeLocation;
  }
  /**
   * @param GoogleInternalAppsWaldoV1alphaOfficeLocation
   */
  public function setOfficeLocation(GoogleInternalAppsWaldoV1alphaOfficeLocation $officeLocation)
  {
    $this->officeLocation = $officeLocation;
  }
  /**
   * @return GoogleInternalAppsWaldoV1alphaOfficeLocation
   */
  public function getOfficeLocation()
  {
    return $this->officeLocation;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleInternalAppsWaldoV1alphaUserLocation::class, 'Google_Service_Contentwarehouse_GoogleInternalAppsWaldoV1alphaUserLocation');
