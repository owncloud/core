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

namespace Google\Service\CloudFunctions;

class GoogleCloudFunctionsV2OperationMetadata extends \Google\Collection
{
  protected $collection_key = 'stages';
  /**
   * @var string
   */
  public $apiVersion;
  /**
   * @var bool
   */
  public $cancelRequested;
  /**
   * @var string
   */
  public $createTime;
  /**
   * @var string
   */
  public $endTime;
  /**
   * @var array[]
   */
  public $requestResource;
  protected $stagesType = GoogleCloudFunctionsV2Stage::class;
  protected $stagesDataType = 'array';
  /**
   * @var string
   */
  public $statusDetail;
  /**
   * @var string
   */
  public $target;
  /**
   * @var string
   */
  public $verb;

  /**
   * @param string
   */
  public function setApiVersion($apiVersion)
  {
    $this->apiVersion = $apiVersion;
  }
  /**
   * @return string
   */
  public function getApiVersion()
  {
    return $this->apiVersion;
  }
  /**
   * @param bool
   */
  public function setCancelRequested($cancelRequested)
  {
    $this->cancelRequested = $cancelRequested;
  }
  /**
   * @return bool
   */
  public function getCancelRequested()
  {
    return $this->cancelRequested;
  }
  /**
   * @param string
   */
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  /**
   * @return string
   */
  public function getCreateTime()
  {
    return $this->createTime;
  }
  /**
   * @param string
   */
  public function setEndTime($endTime)
  {
    $this->endTime = $endTime;
  }
  /**
   * @return string
   */
  public function getEndTime()
  {
    return $this->endTime;
  }
  /**
   * @param array[]
   */
  public function setRequestResource($requestResource)
  {
    $this->requestResource = $requestResource;
  }
  /**
   * @return array[]
   */
  public function getRequestResource()
  {
    return $this->requestResource;
  }
  /**
   * @param GoogleCloudFunctionsV2Stage[]
   */
  public function setStages($stages)
  {
    $this->stages = $stages;
  }
  /**
   * @return GoogleCloudFunctionsV2Stage[]
   */
  public function getStages()
  {
    return $this->stages;
  }
  /**
   * @param string
   */
  public function setStatusDetail($statusDetail)
  {
    $this->statusDetail = $statusDetail;
  }
  /**
   * @return string
   */
  public function getStatusDetail()
  {
    return $this->statusDetail;
  }
  /**
   * @param string
   */
  public function setTarget($target)
  {
    $this->target = $target;
  }
  /**
   * @return string
   */
  public function getTarget()
  {
    return $this->target;
  }
  /**
   * @param string
   */
  public function setVerb($verb)
  {
    $this->verb = $verb;
  }
  /**
   * @return string
   */
  public function getVerb()
  {
    return $this->verb;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudFunctionsV2OperationMetadata::class, 'Google_Service_CloudFunctions_GoogleCloudFunctionsV2OperationMetadata');
