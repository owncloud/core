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

namespace Google\Service\Apigee;

class GoogleCloudApigeeV1PodStatus extends \Google\Model
{
  /**
   * @var string
   */
  public $appVersion;
  /**
   * @var string
   */
  public $deploymentStatus;
  /**
   * @var string
   */
  public $deploymentStatusTime;
  /**
   * @var string
   */
  public $deploymentTime;
  /**
   * @var string
   */
  public $podName;
  /**
   * @var string
   */
  public $podStatus;
  /**
   * @var string
   */
  public $podStatusTime;
  /**
   * @var string
   */
  public $statusCode;
  /**
   * @var string
   */
  public $statusCodeDetails;

  /**
   * @param string
   */
  public function setAppVersion($appVersion)
  {
    $this->appVersion = $appVersion;
  }
  /**
   * @return string
   */
  public function getAppVersion()
  {
    return $this->appVersion;
  }
  /**
   * @param string
   */
  public function setDeploymentStatus($deploymentStatus)
  {
    $this->deploymentStatus = $deploymentStatus;
  }
  /**
   * @return string
   */
  public function getDeploymentStatus()
  {
    return $this->deploymentStatus;
  }
  /**
   * @param string
   */
  public function setDeploymentStatusTime($deploymentStatusTime)
  {
    $this->deploymentStatusTime = $deploymentStatusTime;
  }
  /**
   * @return string
   */
  public function getDeploymentStatusTime()
  {
    return $this->deploymentStatusTime;
  }
  /**
   * @param string
   */
  public function setDeploymentTime($deploymentTime)
  {
    $this->deploymentTime = $deploymentTime;
  }
  /**
   * @return string
   */
  public function getDeploymentTime()
  {
    return $this->deploymentTime;
  }
  /**
   * @param string
   */
  public function setPodName($podName)
  {
    $this->podName = $podName;
  }
  /**
   * @return string
   */
  public function getPodName()
  {
    return $this->podName;
  }
  /**
   * @param string
   */
  public function setPodStatus($podStatus)
  {
    $this->podStatus = $podStatus;
  }
  /**
   * @return string
   */
  public function getPodStatus()
  {
    return $this->podStatus;
  }
  /**
   * @param string
   */
  public function setPodStatusTime($podStatusTime)
  {
    $this->podStatusTime = $podStatusTime;
  }
  /**
   * @return string
   */
  public function getPodStatusTime()
  {
    return $this->podStatusTime;
  }
  /**
   * @param string
   */
  public function setStatusCode($statusCode)
  {
    $this->statusCode = $statusCode;
  }
  /**
   * @return string
   */
  public function getStatusCode()
  {
    return $this->statusCode;
  }
  /**
   * @param string
   */
  public function setStatusCodeDetails($statusCodeDetails)
  {
    $this->statusCodeDetails = $statusCodeDetails;
  }
  /**
   * @return string
   */
  public function getStatusCodeDetails()
  {
    return $this->statusCodeDetails;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudApigeeV1PodStatus::class, 'Google_Service_Apigee_GoogleCloudApigeeV1PodStatus');
