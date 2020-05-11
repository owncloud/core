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

class Google_Service_RemoteBuildExecution_GoogleDevtoolsRemotebuildexecutionAdminV1alphaListWorkerPoolsResponse extends Google_Collection
{
  protected $collection_key = 'workerPools';
  protected $workerPoolsType = 'Google_Service_RemoteBuildExecution_GoogleDevtoolsRemotebuildexecutionAdminV1alphaWorkerPool';
  protected $workerPoolsDataType = 'array';

  /**
   * @param Google_Service_RemoteBuildExecution_GoogleDevtoolsRemotebuildexecutionAdminV1alphaWorkerPool
   */
  public function setWorkerPools($workerPools)
  {
    $this->workerPools = $workerPools;
  }
  /**
   * @return Google_Service_RemoteBuildExecution_GoogleDevtoolsRemotebuildexecutionAdminV1alphaWorkerPool
   */
  public function getWorkerPools()
  {
    return $this->workerPools;
  }
}
