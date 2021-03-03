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

class Google_Service_Dialogflow_GoogleCloudDialogflowCxV3TestCaseError extends Google_Model
{
  protected $statusType = 'Google_Service_Dialogflow_GoogleRpcStatus';
  protected $statusDataType = '';
  protected $testCaseType = 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3TestCase';
  protected $testCaseDataType = '';

  /**
   * @param Google_Service_Dialogflow_GoogleRpcStatus
   */
  public function setStatus(Google_Service_Dialogflow_GoogleRpcStatus $status)
  {
    $this->status = $status;
  }
  /**
   * @return Google_Service_Dialogflow_GoogleRpcStatus
   */
  public function getStatus()
  {
    return $this->status;
  }
  /**
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowCxV3TestCase
   */
  public function setTestCase(Google_Service_Dialogflow_GoogleCloudDialogflowCxV3TestCase $testCase)
  {
    $this->testCase = $testCase;
  }
  /**
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowCxV3TestCase
   */
  public function getTestCase()
  {
    return $this->testCase;
  }
}
