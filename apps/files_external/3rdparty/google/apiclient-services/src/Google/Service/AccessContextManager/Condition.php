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

class Google_Service_AccessContextManager_Condition extends Google_Collection
{
  protected $collection_key = 'requiredAccessLevels';
  protected $devicePolicyType = 'Google_Service_AccessContextManager_DevicePolicy';
  protected $devicePolicyDataType = '';
  public $ipSubnetworks;
  public $members;
  public $negate;
  public $regions;
  public $requiredAccessLevels;

  /**
   * @param Google_Service_AccessContextManager_DevicePolicy
   */
  public function setDevicePolicy(Google_Service_AccessContextManager_DevicePolicy $devicePolicy)
  {
    $this->devicePolicy = $devicePolicy;
  }
  /**
   * @return Google_Service_AccessContextManager_DevicePolicy
   */
  public function getDevicePolicy()
  {
    return $this->devicePolicy;
  }
  public function setIpSubnetworks($ipSubnetworks)
  {
    $this->ipSubnetworks = $ipSubnetworks;
  }
  public function getIpSubnetworks()
  {
    return $this->ipSubnetworks;
  }
  public function setMembers($members)
  {
    $this->members = $members;
  }
  public function getMembers()
  {
    return $this->members;
  }
  public function setNegate($negate)
  {
    $this->negate = $negate;
  }
  public function getNegate()
  {
    return $this->negate;
  }
  public function setRegions($regions)
  {
    $this->regions = $regions;
  }
  public function getRegions()
  {
    return $this->regions;
  }
  public function setRequiredAccessLevels($requiredAccessLevels)
  {
    $this->requiredAccessLevels = $requiredAccessLevels;
  }
  public function getRequiredAccessLevels()
  {
    return $this->requiredAccessLevels;
  }
}
