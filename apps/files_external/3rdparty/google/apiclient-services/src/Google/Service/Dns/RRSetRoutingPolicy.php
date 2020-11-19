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

class Google_Service_Dns_RRSetRoutingPolicy extends Google_Model
{
  protected $geoPolicyType = 'Google_Service_Dns_RRSetRoutingPolicyGeoPolicy';
  protected $geoPolicyDataType = '';
  public $kind;
  protected $wrrPolicyType = 'Google_Service_Dns_RRSetRoutingPolicyWrrPolicy';
  protected $wrrPolicyDataType = '';

  /**
   * @param Google_Service_Dns_RRSetRoutingPolicyGeoPolicy
   */
  public function setGeoPolicy(Google_Service_Dns_RRSetRoutingPolicyGeoPolicy $geoPolicy)
  {
    $this->geoPolicy = $geoPolicy;
  }
  /**
   * @return Google_Service_Dns_RRSetRoutingPolicyGeoPolicy
   */
  public function getGeoPolicy()
  {
    return $this->geoPolicy;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  /**
   * @param Google_Service_Dns_RRSetRoutingPolicyWrrPolicy
   */
  public function setWrrPolicy(Google_Service_Dns_RRSetRoutingPolicyWrrPolicy $wrrPolicy)
  {
    $this->wrrPolicy = $wrrPolicy;
  }
  /**
   * @return Google_Service_Dns_RRSetRoutingPolicyWrrPolicy
   */
  public function getWrrPolicy()
  {
    return $this->wrrPolicy;
  }
}
