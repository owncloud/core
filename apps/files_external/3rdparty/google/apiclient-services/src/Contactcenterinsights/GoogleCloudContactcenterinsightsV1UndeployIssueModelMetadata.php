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

namespace Google\Service\Contactcenterinsights;

class GoogleCloudContactcenterinsightsV1UndeployIssueModelMetadata extends \Google\Model
{
  public $createTime;
  public $endTime;
  protected $requestType = GoogleCloudContactcenterinsightsV1UndeployIssueModelRequest::class;
  protected $requestDataType = '';

  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  public function getCreateTime()
  {
    return $this->createTime;
  }
  public function setEndTime($endTime)
  {
    $this->endTime = $endTime;
  }
  public function getEndTime()
  {
    return $this->endTime;
  }
  /**
   * @param GoogleCloudContactcenterinsightsV1UndeployIssueModelRequest
   */
  public function setRequest(GoogleCloudContactcenterinsightsV1UndeployIssueModelRequest $request)
  {
    $this->request = $request;
  }
  /**
   * @return GoogleCloudContactcenterinsightsV1UndeployIssueModelRequest
   */
  public function getRequest()
  {
    return $this->request;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudContactcenterinsightsV1UndeployIssueModelMetadata::class, 'Google_Service_Contactcenterinsights_GoogleCloudContactcenterinsightsV1UndeployIssueModelMetadata');
