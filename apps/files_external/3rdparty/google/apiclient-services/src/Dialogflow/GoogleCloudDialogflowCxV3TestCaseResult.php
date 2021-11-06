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

class GoogleCloudDialogflowCxV3TestCaseResult extends \Google\Collection
{
  protected $collection_key = 'conversationTurns';
  protected $conversationTurnsType = GoogleCloudDialogflowCxV3ConversationTurn::class;
  protected $conversationTurnsDataType = 'array';
  public $environment;
  public $name;
  public $testResult;
  public $testTime;

  /**
   * @param GoogleCloudDialogflowCxV3ConversationTurn[]
   */
  public function setConversationTurns($conversationTurns)
  {
    $this->conversationTurns = $conversationTurns;
  }
  /**
   * @return GoogleCloudDialogflowCxV3ConversationTurn[]
   */
  public function getConversationTurns()
  {
    return $this->conversationTurns;
  }
  public function setEnvironment($environment)
  {
    $this->environment = $environment;
  }
  public function getEnvironment()
  {
    return $this->environment;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setTestResult($testResult)
  {
    $this->testResult = $testResult;
  }
  public function getTestResult()
  {
    return $this->testResult;
  }
  public function setTestTime($testTime)
  {
    $this->testTime = $testTime;
  }
  public function getTestTime()
  {
    return $this->testTime;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDialogflowCxV3TestCaseResult::class, 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3TestCaseResult');
