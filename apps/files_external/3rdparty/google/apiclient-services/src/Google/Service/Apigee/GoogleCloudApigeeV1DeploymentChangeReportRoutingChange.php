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

class Google_Service_Apigee_GoogleCloudApigeeV1DeploymentChangeReportRoutingChange extends Google_Model
{
  public $description;
  public $environmentGroup;
  protected $fromDeploymentType = 'Google_Service_Apigee_GoogleCloudApigeeV1DeploymentChangeReportRoutingDeployment';
  protected $fromDeploymentDataType = '';
  public $shouldSequenceRollout;
  protected $toDeploymentType = 'Google_Service_Apigee_GoogleCloudApigeeV1DeploymentChangeReportRoutingDeployment';
  protected $toDeploymentDataType = '';

  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setEnvironmentGroup($environmentGroup)
  {
    $this->environmentGroup = $environmentGroup;
  }
  public function getEnvironmentGroup()
  {
    return $this->environmentGroup;
  }
  /**
   * @param Google_Service_Apigee_GoogleCloudApigeeV1DeploymentChangeReportRoutingDeployment
   */
  public function setFromDeployment(Google_Service_Apigee_GoogleCloudApigeeV1DeploymentChangeReportRoutingDeployment $fromDeployment)
  {
    $this->fromDeployment = $fromDeployment;
  }
  /**
   * @return Google_Service_Apigee_GoogleCloudApigeeV1DeploymentChangeReportRoutingDeployment
   */
  public function getFromDeployment()
  {
    return $this->fromDeployment;
  }
  public function setShouldSequenceRollout($shouldSequenceRollout)
  {
    $this->shouldSequenceRollout = $shouldSequenceRollout;
  }
  public function getShouldSequenceRollout()
  {
    return $this->shouldSequenceRollout;
  }
  /**
   * @param Google_Service_Apigee_GoogleCloudApigeeV1DeploymentChangeReportRoutingDeployment
   */
  public function setToDeployment(Google_Service_Apigee_GoogleCloudApigeeV1DeploymentChangeReportRoutingDeployment $toDeployment)
  {
    $this->toDeployment = $toDeployment;
  }
  /**
   * @return Google_Service_Apigee_GoogleCloudApigeeV1DeploymentChangeReportRoutingDeployment
   */
  public function getToDeployment()
  {
    return $this->toDeployment;
  }
}
