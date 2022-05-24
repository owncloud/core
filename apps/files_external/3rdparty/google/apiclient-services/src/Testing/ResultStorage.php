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

namespace Google\Service\Testing;

class ResultStorage extends \Google\Model
{
  protected $googleCloudStorageType = GoogleCloudStorage::class;
  protected $googleCloudStorageDataType = '';
  /**
   * @var string
   */
  public $resultsUrl;
  protected $toolResultsExecutionType = ToolResultsExecution::class;
  protected $toolResultsExecutionDataType = '';
  protected $toolResultsHistoryType = ToolResultsHistory::class;
  protected $toolResultsHistoryDataType = '';

  /**
   * @param GoogleCloudStorage
   */
  public function setGoogleCloudStorage(GoogleCloudStorage $googleCloudStorage)
  {
    $this->googleCloudStorage = $googleCloudStorage;
  }
  /**
   * @return GoogleCloudStorage
   */
  public function getGoogleCloudStorage()
  {
    return $this->googleCloudStorage;
  }
  /**
   * @param string
   */
  public function setResultsUrl($resultsUrl)
  {
    $this->resultsUrl = $resultsUrl;
  }
  /**
   * @return string
   */
  public function getResultsUrl()
  {
    return $this->resultsUrl;
  }
  /**
   * @param ToolResultsExecution
   */
  public function setToolResultsExecution(ToolResultsExecution $toolResultsExecution)
  {
    $this->toolResultsExecution = $toolResultsExecution;
  }
  /**
   * @return ToolResultsExecution
   */
  public function getToolResultsExecution()
  {
    return $this->toolResultsExecution;
  }
  /**
   * @param ToolResultsHistory
   */
  public function setToolResultsHistory(ToolResultsHistory $toolResultsHistory)
  {
    $this->toolResultsHistory = $toolResultsHistory;
  }
  /**
   * @return ToolResultsHistory
   */
  public function getToolResultsHistory()
  {
    return $this->toolResultsHistory;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ResultStorage::class, 'Google_Service_Testing_ResultStorage');
