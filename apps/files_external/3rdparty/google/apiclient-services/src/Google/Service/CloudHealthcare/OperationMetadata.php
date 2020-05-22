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

class Google_Service_CloudHealthcare_OperationMetadata extends Google_Model
{
  public $apiMethodName;
  public $cancelRequested;
  protected $counterType = 'Google_Service_CloudHealthcare_ProgressCounter';
  protected $counterDataType = '';
  public $createTime;
  public $endTime;
  public $logsUrl;

  public function setApiMethodName($apiMethodName)
  {
    $this->apiMethodName = $apiMethodName;
  }
  public function getApiMethodName()
  {
    return $this->apiMethodName;
  }
  public function setCancelRequested($cancelRequested)
  {
    $this->cancelRequested = $cancelRequested;
  }
  public function getCancelRequested()
  {
    return $this->cancelRequested;
  }
  /**
   * @param Google_Service_CloudHealthcare_ProgressCounter
   */
  public function setCounter(Google_Service_CloudHealthcare_ProgressCounter $counter)
  {
    $this->counter = $counter;
  }
  /**
   * @return Google_Service_CloudHealthcare_ProgressCounter
   */
  public function getCounter()
  {
    return $this->counter;
  }
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
  public function setLogsUrl($logsUrl)
  {
    $this->logsUrl = $logsUrl;
  }
  public function getLogsUrl()
  {
    return $this->logsUrl;
  }
}
