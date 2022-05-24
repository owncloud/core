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

class GoogleCloudDialogflowCxV3beta1TestCaseResult extends \Google\Collection
{
  protected $collection_key = 'conversationTurns';
  protected $conversationTurnsType = GoogleCloudDialogflowCxV3beta1ConversationTurn::class;
  protected $conversationTurnsDataType = 'array';
  /**
   * @var string
   */
  public $environment;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $testResult;
  /**
   * @var string
   */
  public $testTime;

  /**
   * @param GoogleCloudDialogflowCxV3beta1ConversationTurn[]
   */
  public function setConversationTurns($conversationTurns)
  {
    $this->conversationTurns = $conversationTurns;
  }
  /**
   * @return GoogleCloudDialogflowCxV3beta1ConversationTurn[]
   */
  public function getConversationTurns()
  {
    return $this->conversationTurns;
  }
  /**
   * @param string
   */
  public function setEnvironment($environment)
  {
    $this->environment = $environment;
  }
  /**
   * @return string
   */
  public function getEnvironment()
  {
    return $this->environment;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param string
   */
  public function setTestResult($testResult)
  {
    $this->testResult = $testResult;
  }
  /**
   * @return string
   */
  public function getTestResult()
  {
    return $this->testResult;
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
class_alias(GoogleCloudDialogflowCxV3beta1TestCaseResult::class, 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3beta1TestCaseResult');
