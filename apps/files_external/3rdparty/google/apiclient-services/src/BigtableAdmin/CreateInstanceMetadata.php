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

namespace Google\Service\BigtableAdmin;

class CreateInstanceMetadata extends \Google\Model
{
  /**
   * @var string
   */
  public $finishTime;
  protected $originalRequestType = CreateInstanceRequest::class;
  protected $originalRequestDataType = '';
  /**
   * @var string
   */
  public $requestTime;

  /**
   * @param string
   */
  public function setFinishTime($finishTime)
  {
    $this->finishTime = $finishTime;
  }
  /**
   * @return string
   */
  public function getFinishTime()
  {
    return $this->finishTime;
  }
  /**
   * @param CreateInstanceRequest
   */
  public function setOriginalRequest(CreateInstanceRequest $originalRequest)
  {
    $this->originalRequest = $originalRequest;
  }
  /**
   * @return CreateInstanceRequest
   */
  public function getOriginalRequest()
  {
    return $this->originalRequest;
  }
  /**
   * @param string
   */
  public function setRequestTime($requestTime)
  {
    $this->requestTime = $requestTime;
  }
  /**
   * @return string
   */
  public function getRequestTime()
  {
    return $this->requestTime;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CreateInstanceMetadata::class, 'Google_Service_BigtableAdmin_CreateInstanceMetadata');
