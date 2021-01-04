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

class Google_Service_Apigee_GoogleCloudApigeeV1DeploymentChangeReport extends Google_Collection
{
  protected $collection_key = 'routingConflicts';
  protected $routingChangesType = 'Google_Service_Apigee_GoogleCloudApigeeV1DeploymentChangeReportRoutingChange';
  protected $routingChangesDataType = 'array';
  protected $routingConflictsType = 'Google_Service_Apigee_GoogleCloudApigeeV1DeploymentChangeReportRoutingConflict';
  protected $routingConflictsDataType = 'array';
  protected $validationErrorsType = 'Google_Service_Apigee_GoogleRpcPreconditionFailure';
  protected $validationErrorsDataType = '';

  /**
   * @param Google_Service_Apigee_GoogleCloudApigeeV1DeploymentChangeReportRoutingChange[]
   */
  public function setRoutingChanges($routingChanges)
  {
    $this->routingChanges = $routingChanges;
  }
  /**
   * @return Google_Service_Apigee_GoogleCloudApigeeV1DeploymentChangeReportRoutingChange[]
   */
  public function getRoutingChanges()
  {
    return $this->routingChanges;
  }
  /**
   * @param Google_Service_Apigee_GoogleCloudApigeeV1DeploymentChangeReportRoutingConflict[]
   */
  public function setRoutingConflicts($routingConflicts)
  {
    $this->routingConflicts = $routingConflicts;
  }
  /**
   * @return Google_Service_Apigee_GoogleCloudApigeeV1DeploymentChangeReportRoutingConflict[]
   */
  public function getRoutingConflicts()
  {
    return $this->routingConflicts;
  }
  /**
   * @param Google_Service_Apigee_GoogleRpcPreconditionFailure
   */
  public function setValidationErrors(Google_Service_Apigee_GoogleRpcPreconditionFailure $validationErrors)
  {
    $this->validationErrors = $validationErrors;
  }
  /**
   * @return Google_Service_Apigee_GoogleRpcPreconditionFailure
   */
  public function getValidationErrors()
  {
    return $this->validationErrors;
  }
}
