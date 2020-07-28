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

class Google_Service_Apigee_GoogleCloudApigeeV1ReportInstanceStatusRequest extends Google_Collection
{
  protected $collection_key = 'resources';
  public $instanceUid;
  public $reportTime;
  protected $resourcesType = 'Google_Service_Apigee_GoogleCloudApigeeV1ResourceStatus';
  protected $resourcesDataType = 'array';

  public function setInstanceUid($instanceUid)
  {
    $this->instanceUid = $instanceUid;
  }
  public function getInstanceUid()
  {
    return $this->instanceUid;
  }
  public function setReportTime($reportTime)
  {
    $this->reportTime = $reportTime;
  }
  public function getReportTime()
  {
    return $this->reportTime;
  }
  /**
   * @param Google_Service_Apigee_GoogleCloudApigeeV1ResourceStatus
   */
  public function setResources($resources)
  {
    $this->resources = $resources;
  }
  /**
   * @return Google_Service_Apigee_GoogleCloudApigeeV1ResourceStatus
   */
  public function getResources()
  {
    return $this->resources;
  }
}
