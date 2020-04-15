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

class Google_Service_ServiceUsage_GetServiceIdentityResponse extends Google_Model
{
  protected $identityType = 'Google_Service_ServiceUsage_ServiceIdentity';
  protected $identityDataType = '';
  public $state;

  /**
   * @param Google_Service_ServiceUsage_ServiceIdentity
   */
  public function setIdentity(Google_Service_ServiceUsage_ServiceIdentity $identity)
  {
    $this->identity = $identity;
  }
  /**
   * @return Google_Service_ServiceUsage_ServiceIdentity
   */
  public function getIdentity()
  {
    return $this->identity;
  }
  public function setState($state)
  {
    $this->state = $state;
  }
  public function getState()
  {
    return $this->state;
  }
}
