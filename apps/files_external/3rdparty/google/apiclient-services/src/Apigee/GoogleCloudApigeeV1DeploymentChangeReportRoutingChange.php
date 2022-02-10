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

class GoogleCloudApigeeV1DeploymentChangeReportRoutingChange extends \Google\Model
{
  /**
   * @var string
   */
  public $description;
  /**
   * @var string
   */
  public $environmentGroup;
  protected $fromDeploymentType = GoogleCloudApigeeV1DeploymentChangeReportRoutingDeployment::class;
  protected $fromDeploymentDataType = '';
  /**
   * @var bool
   */
  public $shouldSequenceRollout;
  protected $toDeploymentType = GoogleCloudApigeeV1DeploymentChangeReportRoutingDeployment::class;
  protected $toDeploymentDataType = '';

  /**
   * @param string
   */
  public function setDescription($description)
  {
    $this->description = $description;
  }
  /**
   * @return string
   */
  public function getDescription()
  {
    return $this->description;
  }
  /**
   * @param string
   */
  public function setEnvironmentGroup($environmentGroup)
  {
    $this->environmentGroup = $environmentGroup;
  }
  /**
   * @return string
   */
  public function getEnvironmentGroup()
  {
    return $this->environmentGroup;
  }
  /**
   * @param GoogleCloudApigeeV1DeploymentChangeReportRoutingDeployment
   */
  public function setFromDeployment(GoogleCloudApigeeV1DeploymentChangeReportRoutingDeployment $fromDeployment)
  {
    $this->fromDeployment = $fromDeployment;
  }
  /**
   * @return GoogleCloudApigeeV1DeploymentChangeReportRoutingDeployment
   */
  public function getFromDeployment()
  {
    return $this->fromDeployment;
  }
  /**
   * @param bool
   */
  public function setShouldSequenceRollout($shouldSequenceRollout)
  {
    $this->shouldSequenceRollout = $shouldSequenceRollout;
  }
  /**
   * @return bool
   */
  public function getShouldSequenceRollout()
  {
    return $this->shouldSequenceRollout;
  }
  /**
   * @param GoogleCloudApigeeV1DeploymentChangeReportRoutingDeployment
   */
  public function setToDeployment(GoogleCloudApigeeV1DeploymentChangeReportRoutingDeployment $toDeployment)
  {
    $this->toDeployment = $toDeployment;
  }
  /**
   * @return GoogleCloudApigeeV1DeploymentChangeReportRoutingDeployment
   */
  public function getToDeployment()
  {
    return $this->toDeployment;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudApigeeV1DeploymentChangeReportRoutingChange::class, 'Google_Service_Apigee_GoogleCloudApigeeV1DeploymentChangeReportRoutingChange');
