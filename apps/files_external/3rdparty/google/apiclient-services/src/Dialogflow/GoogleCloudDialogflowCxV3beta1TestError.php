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

namespace Google\Service\Dialogflow;

class GoogleCloudDialogflowCxV3beta1TestError extends \Google\Model
{
  protected $statusType = GoogleRpcStatus::class;
  protected $statusDataType = '';
  /**
   * @var string
   */
  public $testCase;
  /**
   * @var string
   */
  public $testTime;

  /**
   * @param GoogleRpcStatus
   */
  public function setStatus(GoogleRpcStatus $status)
  {
    $this->status = $status;
  }
  /**
   * @return GoogleRpcStatus
   */
  public function getStatus()
  {
    return $this->status;
  }
  /**
   * @param string
   */
  public function setTestCase($testCase)
  {
    $this->testCase = $testCase;
  }
  /**
   * @return string
   */
  public function getTestCase()
  {
    return $this->testCase;
  }
  /**
   * @param string
   */
  public function setTestTime($testTime)
  {
    $this->testTime = $testTime;
  }
  /**
   * @return string
   */
  public function getTestTime()
  {
    return $this->testTime;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDialogflowCxV3beta1TestError::class, 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3beta1TestError');
