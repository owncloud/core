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

class GoogleCloudDialogflowCxV3beta1ConversationTurnVirtualAgentOutput extends \Google\Collection
{
  protected $collection_key = 'textResponses';
  protected $currentPageType = GoogleCloudDialogflowCxV3beta1Page::class;
  protected $currentPageDataType = '';
  /**
   * @var array[]
   */
  public $diagnosticInfo;
  protected $differencesType = GoogleCloudDialogflowCxV3beta1TestRunDifference::class;
  protected $differencesDataType = 'array';
  /**
   * @var array[]
   */
  public $sessionParameters;
  protected $statusType = GoogleRpcStatus::class;
  protected $statusDataType = '';
  protected $textResponsesType = GoogleCloudDialogflowCxV3beta1ResponseMessageText::class;
  protected $textResponsesDataType = 'array';
  protected $triggeredIntentType = GoogleCloudDialogflowCxV3beta1Intent::class;
  protected $triggeredIntentDataType = '';

  /**
   * @param GoogleCloudDialogflowCxV3beta1Page
   */
  public function setCurrentPage(GoogleCloudDialogflowCxV3beta1Page $currentPage)
  {
    $this->currentPage = $currentPage;
  }
  /**
   * @return GoogleCloudDialogflowCxV3beta1Page
   */
  public function getCurrentPage()
  {
    return $this->currentPage;
  }
  /**
   * @param array[]
   */
  public function setDiagnosticInfo($diagnosticInfo)
  {
    $this->diagnosticInfo = $diagnosticInfo;
  }
  /**
   * @return array[]
   */
  public function getDiagnosticInfo()
  {
    return $this->diagnosticInfo;
  }
  /**
   * @param GoogleCloudDialogflowCxV3beta1TestRunDifference[]
   */
  public function setDifferences($differences)
  {
    $this->differences = $differences;
  }
  /**
   * @return GoogleCloudDialogflowCxV3beta1TestRunDifference[]
   */
  public function getDifferences()
  {
    return $this->differences;
  }
  /**
   * @param array[]
   */
  public function setSessionParameters($sessionParameters)
  {
    $this->sessionParameters = $sessionParameters;
  }
  /**
   * @return array[]
   */
  public function getSessionParameters()
  {
    return $this->sessionParameters;
  }
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
   * @param GoogleCloudDialogflowCxV3beta1ResponseMessageText[]
   */
  public function setTextResponses($textResponses)
  {
    $this->textResponses = $textResponses;
  }
  /**
   * @return GoogleCloudDialogflowCxV3beta1ResponseMessageText[]
   */
  public function getTextResponses()
  {
    return $this->textResponses;
  }
  /**
   * @param GoogleCloudDialogflowCxV3beta1Intent
   */
  public function setTriggeredIntent(GoogleCloudDialogflowCxV3beta1Intent $triggeredIntent)
  {
    $this->triggeredIntent = $triggeredIntent;
  }
  /**
   * @return GoogleCloudDialogflowCxV3beta1Intent
   */
  public function getTriggeredIntent()
  {
    return $this->triggeredIntent;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDialogflowCxV3beta1ConversationTurnVirtualAgentOutput::class, 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3beta1ConversationTurnVirtualAgentOutput');
