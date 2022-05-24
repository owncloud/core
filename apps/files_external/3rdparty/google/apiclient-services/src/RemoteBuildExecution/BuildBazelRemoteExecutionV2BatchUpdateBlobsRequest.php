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

namespace Google\Service\RemoteBuildExecution;

class BuildBazelRemoteExecutionV2BatchUpdateBlobsRequest extends \Google\Collection
{
  protected $collection_key = 'requests';
  protected $requestsType = BuildBazelRemoteExecutionV2BatchUpdateBlobsRequestRequest::class;
  protected $requestsDataType = 'array';

  /**
   * @param BuildBazelRemoteExecutionV2BatchUpdateBlobsRequestRequest[]
   */
  public function setRequests($requests)
  {
    $this->requests = $requests;
  }
  /**
   * @return BuildBazelRemoteExecutionV2BatchUpdateBlobsRequestRequest[]
   */
  public function getRequests()
  {
    return $this->requests;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(BuildBazelRemoteExecutionV2BatchUpdateBlobsRequest::class, 'Google_Service_RemoteBuildExecution_BuildBazelRemoteExecutionV2BatchUpdateBlobsRequest');
