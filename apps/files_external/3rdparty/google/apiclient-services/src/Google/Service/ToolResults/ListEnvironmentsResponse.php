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

class Google_Service_ToolResults_ListEnvironmentsResponse extends Google_Collection
{
  protected $collection_key = 'environments';
  protected $environmentsType = 'Google_Service_ToolResults_Environment';
  protected $environmentsDataType = 'array';
  public $executionId;
  public $historyId;
  public $nextPageToken;
  public $projectId;

  /**
   * @param Google_Service_ToolResults_Environment[]
   */
  public function setEnvironments($environments)
  {
    $this->environments = $environments;
  }
  /**
   * @return Google_Service_ToolResults_Environment[]
   */
  public function getEnvironments()
  {
    return $this->environments;
  }
  public function setExecutionId($executionId)
  {
    $this->executionId = $executionId;
  }
  public function getExecutionId()
  {
    return $this->executionId;
  }
  public function setHistoryId($historyId)
  {
    $this->historyId = $historyId;
  }
  public function getHistoryId()
  {
    return $this->historyId;
  }
  public function setNextPageToken($nextPageToken)
  {
    $this->nextPageToken = $nextPageToken;
  }
  public function getNextPageToken()
  {
    return $this->nextPageToken;
  }
  public function setProjectId($projectId)
  {
    $this->projectId = $projectId;
  }
  public function getProjectId()
  {
    return $this->projectId;
  }
}
