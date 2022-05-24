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

namespace Google\Service\AndroidEnterprise;

class NewDeviceEvent extends \Google\Model
{
  /**
   * @var string
   */
  public $deviceId;
  /**
   * @var string
   */
  public $dpcPackageName;
  /**
   * @var string
   */
  public $managementType;
  /**
   * @var string
   */
  public $userId;

  /**
   * @param string
   */
  public function setDeviceId($deviceId)
  {
    $this->deviceId = $deviceId;
  }
  /**
   * @return string
   */
  public function getDeviceId()
  {
    return $this->deviceId;
  }
  /**
   * @param string
   */
  public function setDpcPackageName($dpcPackageName)
  {
    $this->dpcPackageName = $dpcPackageName;
  }
  /**
   * @return string
   */
  public function getDpcPackageName()
  {
    return $this->dpcPackageName;
  }
  /**
   * @param string
   */
  public function setManagementType($managementType)
  {
    $this->managementType = $managementType;
  }
  /**
   * @return string
   */
  public function getManagementType()
  {
    return $this->managementType;
  }
  /**
   * @param string
   */
  public function setUserId($userId)
  {
    $this->userId = $userId;
  }
  /**
   * @return string
   */
  public function getUserId()
  {
    return $this->userId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NewDeviceEvent::class, 'Google_Service_AndroidEnterprise_NewDeviceEvent');
