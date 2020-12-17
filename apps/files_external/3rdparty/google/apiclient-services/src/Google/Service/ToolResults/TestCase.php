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

class Google_Service_ToolResults_TestCase extends Google_Collection
{
  protected $collection_key = 'toolOutputs';
  protected $elapsedTimeType = 'Google_Service_ToolResults_Duration';
  protected $elapsedTimeDataType = '';
  protected $endTimeType = 'Google_Service_ToolResults_Timestamp';
  protected $endTimeDataType = '';
  public $skippedMessage;
  protected $stackTracesType = 'Google_Service_ToolResults_StackTrace';
  protected $stackTracesDataType = 'array';
  protected $startTimeType = 'Google_Service_ToolResults_Timestamp';
  protected $startTimeDataType = '';
  public $status;
  public $testCaseId;
  protected $testCaseReferenceType = 'Google_Service_ToolResults_TestCaseReference';
  protected $testCaseReferenceDataType = '';
  protected $toolOutputsType = 'Google_Service_ToolResults_ToolOutputReference';
  protected $toolOutputsDataType = 'array';

  /**
   * @param Google_Service_ToolResults_Duration
   */
  public function setElapsedTime(Google_Service_ToolResults_Duration $elapsedTime)
  {
    $this->elapsedTime = $elapsedTime;
  }
  /**
   * @return Google_Service_ToolResults_Duration
   */
  public function getElapsedTime()
  {
    return $this->elapsedTime;
  }
  /**
   * @param Google_Service_ToolResults_Timestamp
   */
  public function setEndTime(Google_Service_ToolResults_Timestamp $endTime)
  {
    $this->endTime = $endTime;
  }
  /**
   * @return Google_Service_ToolResults_Timestamp
   */
  public function getEndTime()
  {
    return $this->endTime;
  }
  public function setSkippedMessage($skippedMessage)
  {
    $this->skippedMessage = $skippedMessage;
  }
  public function getSkippedMessage()
  {
    return $this->skippedMessage;
  }
  /**
   * @param Google_Service_ToolResults_StackTrace[]
   */
  public function setStackTraces($stackTraces)
  {
    $this->stackTraces = $stackTraces;
  }
  /**
   * @return Google_Service_ToolResults_StackTrace[]
   */
  public function getStackTraces()
  {
    return $this->stackTraces;
  }
  /**
   * @param Google_Service_ToolResults_Timestamp
   */
  public function setStartTime(Google_Service_ToolResults_Timestamp $startTime)
  {
    $this->startTime = $startTime;
  }
  /**
   * @return Google_Service_ToolResults_Timestamp
   */
  public function getStartTime()
  {
    return $this->startTime;
  }
  public function setStatus($status)
  {
    $this->status = $status;
  }
  public function getStatus()
  {
    return $this->status;
  }
  public function setTestCaseId($testCaseId)
  {
    $this->testCaseId = $testCaseId;
  }
  public function getTestCaseId()
  {
    return $this->testCaseId;
  }
  /**
   * @param Google_Service_ToolResults_TestCaseReference
   */
  public function setTestCaseReference(Google_Service_ToolResults_TestCaseReference $testCaseReference)
  {
    $this->testCaseReference = $testCaseReference;
  }
  /**
   * @return Google_Service_ToolResults_TestCaseReference
   */
  public function getTestCaseReference()
  {
    return $this->testCaseReference;
  }
  /**
   * @param Google_Service_ToolResults_ToolOutputReference[]
   */
  public function setToolOutputs($toolOutputs)
  {
    $this->toolOutputs = $toolOutputs;
  }
  /**
   * @return Google_Service_ToolResults_ToolOutputReference[]
   */
  public function getToolOutputs()
  {
    return $this->toolOutputs;
  }
}
