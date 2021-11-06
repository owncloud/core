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

namespace Google\Service\Assuredworkloads;

class GoogleCloudAssuredworkloadsV1ListWorkloadsResponse extends \Google\Collection
{
  protected $collection_key = 'workloads';
  public $nextPageToken;
  protected $workloadsType = GoogleCloudAssuredworkloadsV1Workload::class;
  protected $workloadsDataType = 'array';

  public function setNextPageToken($nextPageToken)
  {
    $this->nextPageToken = $nextPageToken;
  }
  public function getNextPageToken()
  {
    return $this->nextPageToken;
  }
  /**
   * @param GoogleCloudAssuredworkloadsV1Workload[]
   */
  public function setWorkloads($workloads)
  {
    $this->workloads = $workloads;
  }
  /**
   * @return GoogleCloudAssuredworkloadsV1Workload[]
   */
  public function getWorkloads()
  {
    return $this->workloads;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudAssuredworkloadsV1ListWorkloadsResponse::class, 'Google_Service_Assuredworkloads_GoogleCloudAssuredworkloadsV1ListWorkloadsResponse');
