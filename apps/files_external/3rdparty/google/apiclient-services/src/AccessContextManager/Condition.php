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

namespace Google\Service\AccessContextManager;

class Condition extends \Google\Collection
{
  protected $collection_key = 'requiredAccessLevels';
  protected $devicePolicyType = DevicePolicy::class;
  protected $devicePolicyDataType = '';
  /**
   * @var string[]
   */
  public $ipSubnetworks;
  /**
   * @var string[]
   */
  public $members;
  /**
   * @var bool
   */
  public $negate;
  /**
   * @var string[]
   */
  public $regions;
  /**
   * @var string[]
   */
  public $requiredAccessLevels;

  /**
   * @param DevicePolicy
   */
  public function setDevicePolicy(DevicePolicy $devicePolicy)
  {
    $this->devicePolicy = $devicePolicy;
  }
  /**
   * @return DevicePolicy
   */
  public function getDevicePolicy()
  {
    return $this->devicePolicy;
  }
  /**
   * @param string[]
   */
  public function setIpSubnetworks($ipSubnetworks)
  {
    $this->ipSubnetworks = $ipSubnetworks;
  }
  /**
   * @return string[]
   */
  public function getIpSubnetworks()
  {
    return $this->ipSubnetworks;
  }
  /**
   * @param string[]
   */
  public function setMembers($members)
  {
    $this->members = $members;
  }
  /**
   * @return string[]
   */
  public function getMembers()
  {
    return $this->members;
  }
  /**
   * @param bool
   */
  public function setNegate($negate)
  {
    $this->negate = $negate;
  }
  /**
   * @return bool
   */
  public function getNegate()
  {
    return $this->negate;
  }
  /**
   * @param string[]
   */
  public function setRegions($regions)
  {
    $this->regions = $regions;
  }
  /**
   * @return string[]
   */
  public function getRegions()
  {
    return $this->regions;
  }
  /**
   * @param string[]
   */
  public function setRequiredAccessLevels($requiredAccessLevels)
  {
    $this->requiredAccessLevels = $requiredAccessLevels;
  }
  /**
   * @return string[]
   */
  public function getRequiredAccessLevels()
  {
    return $this->requiredAccessLevels;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Condition::class, 'Google_Service_AccessContextManager_Condition');
