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

namespace Google\Service\CloudHealthcare;

class OperationMetadata extends \Google\Model
{
  /**
   * @var string
   */
  public $apiMethodName;
  /**
   * @var bool
   */
  public $cancelRequested;
  protected $counterType = ProgressCounter::class;
  protected $counterDataType = '';
  /**
   * @var string
   */
  public $createTime;
  /**
   * @var string
   */
  public $endTime;
  /**
   * @var string
   */
  public $logsUrl;

  /**
   * @param string
   */
  public function setApiMethodName($apiMethodName)
  {
    $this->apiMethodName = $apiMethodName;
  }
  /**
   * @return string
   */
  public function getApiMethodName()
  {
    return $this->apiMethodName;
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
   * @param ProgressCounter
   */
  public function setCounter(ProgressCounter $counter)
  {
    $this->counter = $counter;
  }
  /**
   * @return ProgressCounter
   */
  public function getCounter()
  {
    return $this->counter;
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
   * @param string
   */
  public function setLogsUrl($logsUrl)
  {
    $this->logsUrl = $logsUrl;
  }
  /**
   * @return string
   */
  public function getLogsUrl()
  {
    return $this->logsUrl;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(OperationMetadata::class, 'Google_Service_CloudHealthcare_OperationMetadata');
