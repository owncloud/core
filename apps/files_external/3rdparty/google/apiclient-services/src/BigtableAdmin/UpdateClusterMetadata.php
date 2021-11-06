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

class UpdateClusterMetadata extends \Google\Model
{
  public $finishTime;
  protected $originalRequestType = Cluster::class;
  protected $originalRequestDataType = '';
  public $requestTime;

  public function setFinishTime($finishTime)
  {
    $this->finishTime = $finishTime;
  }
  public function getFinishTime()
  {
    return $this->finishTime;
  }
  /**
   * @param Cluster
   */
  public function setOriginalRequest(Cluster $originalRequest)
  {
    $this->originalRequest = $originalRequest;
  }
  /**
   * @return Cluster
   */
  public function getOriginalRequest()
  {
    return $this->originalRequest;
  }
  public function setRequestTime($requestTime)
  {
    $this->requestTime = $requestTime;
  }
  public function getRequestTime()
  {
    return $this->requestTime;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(UpdateClusterMetadata::class, 'Google_Service_BigtableAdmin_UpdateClusterMetadata');
