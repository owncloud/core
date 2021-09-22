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

class GoogleCloudDialogflowCxV3beta1TestCaseError extends \Google\Model
{
  protected $statusType = GoogleRpcStatus::class;
  protected $statusDataType = '';
  protected $testCaseType = GoogleCloudDialogflowCxV3beta1TestCase::class;
  protected $testCaseDataType = '';

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
   * @param GoogleCloudDialogflowCxV3beta1TestCase
   */
  public function setTestCase(GoogleCloudDialogflowCxV3beta1TestCase $testCase)
  {
    $this->testCase = $testCase;
  }
  /**
   * @return GoogleCloudDialogflowCxV3beta1TestCase
   */
  public function getTestCase()
  {
    return $this->testCase;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDialogflowCxV3beta1TestCaseError::class, 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3beta1TestCaseError');
