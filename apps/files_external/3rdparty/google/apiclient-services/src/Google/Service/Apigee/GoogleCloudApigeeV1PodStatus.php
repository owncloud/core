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

class Google_Service_Apigee_GoogleCloudApigeeV1PodStatus extends Google_Model
{
  public $appVersion;
  public $deploymentStatus;
  public $deploymentStatusTime;
  public $deploymentTime;
  public $podName;
  public $podStatus;
  public $podStatusTime;
  public $statusCode;
  public $statusCodeDetails;

  public function setAppVersion($appVersion)
  {
    $this->appVersion = $appVersion;
  }
  public function getAppVersion()
  {
    return $this->appVersion;
  }
  public function setDeploymentStatus($deploymentStatus)
  {
    $this->deploymentStatus = $deploymentStatus;
  }
  public function getDeploymentStatus()
  {
    return $this->deploymentStatus;
  }
  public function setDeploymentStatusTime($deploymentStatusTime)
  {
    $this->deploymentStatusTime = $deploymentStatusTime;
  }
  public function getDeploymentStatusTime()
  {
    return $this->deploymentStatusTime;
  }
  public function setDeploymentTime($deploymentTime)
  {
    $this->deploymentTime = $deploymentTime;
  }
  public function getDeploymentTime()
  {
    return $this->deploymentTime;
  }
  public function setPodName($podName)
  {
    $this->podName = $podName;
  }
  public function getPodName()
  {
    return $this->podName;
  }
  public function setPodStatus($podStatus)
  {
    $this->podStatus = $podStatus;
  }
  public function getPodStatus()
  {
    return $this->podStatus;
  }
  public function setPodStatusTime($podStatusTime)
  {
    $this->podStatusTime = $podStatusTime;
  }
  public function getPodStatusTime()
  {
    return $this->podStatusTime;
  }
  public function setStatusCode($statusCode)
  {
    $this->statusCode = $statusCode;
  }
  public function getStatusCode()
  {
    return $this->statusCode;
  }
  public function setStatusCodeDetails($statusCodeDetails)
  {
    $this->statusCodeDetails = $statusCodeDetails;
  }
  public function getStatusCodeDetails()
  {
    return $this->statusCodeDetails;
  }
}
