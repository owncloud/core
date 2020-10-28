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

class Google_Service_Apigee_GoogleCloudApigeeV1ProvisionOrganizationRequest extends Google_Model
{
  public $analyticsRegion;
  public $authorizedNetwork;
  public $runtimeLocation;

  public function setAnalyticsRegion($analyticsRegion)
  {
    $this->analyticsRegion = $analyticsRegion;
  }
  public function getAnalyticsRegion()
  {
    return $this->analyticsRegion;
  }
  public function setAuthorizedNetwork($authorizedNetwork)
  {
    $this->authorizedNetwork = $authorizedNetwork;
  }
  public function getAuthorizedNetwork()
  {
    return $this->authorizedNetwork;
  }
  public function setRuntimeLocation($runtimeLocation)
  {
    $this->runtimeLocation = $runtimeLocation;
  }
  public function getRuntimeLocation()
  {
    return $this->runtimeLocation;
  }
}
