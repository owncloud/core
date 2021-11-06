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

class GoogleCloudDialogflowCxV3TestCase extends \Google\Collection
{
  protected $collection_key = 'testCaseConversationTurns';
  public $creationTime;
  public $displayName;
  protected $lastTestResultType = GoogleCloudDialogflowCxV3TestCaseResult::class;
  protected $lastTestResultDataType = '';
  public $name;
  public $notes;
  public $tags;
  protected $testCaseConversationTurnsType = GoogleCloudDialogflowCxV3ConversationTurn::class;
  protected $testCaseConversationTurnsDataType = 'array';
  protected $testConfigType = GoogleCloudDialogflowCxV3TestConfig::class;
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
   * @param GoogleCloudDialogflowCxV3TestCaseResult
   */
  public function setLastTestResult(GoogleCloudDialogflowCxV3TestCaseResult $lastTestResult)
  {
    $this->lastTestResult = $lastTestResult;
  }
  /**
   * @return GoogleCloudDialogflowCxV3TestCaseResult
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
   * @param GoogleCloudDialogflowCxV3ConversationTurn[]
   */
  public function setTestCaseConversationTurns($testCaseConversationTurns)
  {
    $this->testCaseConversationTurns = $testCaseConversationTurns;
  }
  /**
   * @return GoogleCloudDialogflowCxV3ConversationTurn[]
   */
  public function getTestCaseConversationTurns()
  {
    return $this->testCaseConversationTurns;
  }
  /**
   * @param GoogleCloudDialogflowCxV3TestConfig
   */
  public function setTestConfig(GoogleCloudDialogflowCxV3TestConfig $testConfig)
  {
    $this->testConfig = $testConfig;
  }
  /**
   * @return GoogleCloudDialogflowCxV3TestConfig
   */
  public function getTestConfig()
  {
    return $this->testConfig;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDialogflowCxV3TestCase::class, 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3TestCase');
