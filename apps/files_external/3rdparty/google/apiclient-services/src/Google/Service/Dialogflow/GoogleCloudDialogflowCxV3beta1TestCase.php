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

class Google_Service_Dialogflow_GoogleCloudDialogflowCxV3beta1TestCase extends Google_Collection
{
  protected $collection_key = 'testCaseConversationTurns';
  public $creationTime;
  public $displayName;
  protected $lastTestResultType = 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3beta1TestCaseResult';
  protected $lastTestResultDataType = '';
  public $name;
  public $notes;
  public $tags;
  protected $testCaseConversationTurnsType = 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3beta1ConversationTurn';
  protected $testCaseConversationTurnsDataType = 'array';
  protected $testConfigType = 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3beta1TestConfig';
  protected $testConfigDataType = '';

  public function setCreationTime($creationTime)
  {
    $this->creationTime = $creationTime;
  }
  public function getCreationTime()
  {
    return $this->creationTime;
  }
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
  }
  /**
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowCxV3beta1TestCaseResult
   */
  public function setLastTestResult(Google_Service_Dialogflow_GoogleCloudDialogflowCxV3beta1TestCaseResult $lastTestResult)
  {
    $this->lastTestResult = $lastTestResult;
  }
  /**
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowCxV3beta1TestCaseResult
   */
  public function getLastTestResult()
  {
    return $this->lastTestResult;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setNotes($notes)
  {
    $this->notes = $notes;
  }
  public function getNotes()
  {
    return $this->notes;
  }
  public function setTags($tags)
  {
    $this->tags = $tags;
  }
  public function getTags()
  {
    return $this->tags;
  }
  /**
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowCxV3beta1ConversationTurn[]
   */
  public function setTestCaseConversationTurns($testCaseConversationTurns)
  {
    $this->testCaseConversationTurns = $testCaseConversationTurns;
  }
  /**
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowCxV3beta1ConversationTurn[]
   */
  public function getTestCaseConversationTurns()
  {
    return $this->testCaseConversationTurns;
  }
  /**
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowCxV3beta1TestConfig
   */
  public function setTestConfig(Google_Service_Dialogflow_GoogleCloudDialogflowCxV3beta1TestConfig $testConfig)
  {
    $this->testConfig = $testConfig;
  }
  /**
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowCxV3beta1TestConfig
   */
  public function getTestConfig()
  {
    return $this->testConfig;
  }
}
