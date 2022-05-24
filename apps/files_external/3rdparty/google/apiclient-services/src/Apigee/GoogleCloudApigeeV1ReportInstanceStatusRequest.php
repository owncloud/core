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

class GoogleCloudApigeeV1ReportInstanceStatusRequest extends \Google\Collection
{
  protected $collection_key = 'resources';
  /**
   * @var string
   */
  public $instanceUid;
  /**
   * @var string
   */
  public $reportTime;
  protected $resourcesType = GoogleCloudApigeeV1ResourceStatus::class;
  protected $resourcesDataType = 'array';

  /**
   * @param string
   */
  public function setInstanceUid($instanceUid)
  {
    $this->instanceUid = $instanceUid;
  }
  /**
   * @return string
   */
  public function getInstanceUid()
  {
    return $this->instanceUid;
  }
  /**
   * @param string
   */
  public function setReportTime($reportTime)
  {
    $this->reportTime = $reportTime;
  }
  /**
   * @return string
   */
  public function getReportTime()
  {
    return $this->reportTime;
  }
  /**
   * @param GoogleCloudApigeeV1ResourceStatus[]
   */
  public function setResources($resources)
  {
    $this->resources = $resources;
  }
  /**
   * @return GoogleCloudApigeeV1ResourceStatus[]
   */
  public function getResources()
  {
    return $this->resources;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudApigeeV1ReportInstanceStatusRequest::class, 'Google_Service_Apigee_GoogleCloudApigeeV1ReportInstanceStatusRequest');
