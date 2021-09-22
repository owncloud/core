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

class CreateClusterMetadata extends \Google\Model
{
  public $finishTime;
  protected $originalRequestType = CreateClusterRequest::class;
  protected $originalRequestDataType = '';
  public $requestTime;
  protected $tablesType = TableProgress::class;
  protected $tablesDataType = 'map';

  public function setFinishTime($finishTime)
  {
    $this->finishTime = $finishTime;
  }
  public function getFinishTime()
  {
    return $this->finishTime;
  }
  /**
   * @param CreateClusterRequest
   */
  public function setOriginalRequest(CreateClusterRequest $originalRequest)
  {
    $this->originalRequest = $originalRequest;
  }
  /**
   * @return CreateClusterRequest
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
  /**
   * @param TableProgress[]
   */
  public function setTables($tables)
  {
    $this->tables = $tables;
  }
  /**
   * @return TableProgress[]
   */
  public function getTables()
  {
    return $this->tables;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CreateClusterMetadata::class, 'Google_Service_BigtableAdmin_CreateClusterMetadata');
