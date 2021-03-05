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

class Google_Service_Dialogflow_GoogleCloudDialogflowCxV3ConversationTurnVirtualAgentOutput extends Google_Collection
{
  protected $collection_key = 'textResponses';
  protected $currentPageType = 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3Page';
  protected $currentPageDataType = '';
  public $diagnosticInfo;
  protected $differencesType = 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3TestRunDifference';
  protected $differencesDataType = 'array';
  public $sessionParameters;
  protected $statusType = 'Google_Service_Dialogflow_GoogleRpcStatus';
  protected $statusDataType = '';
  protected $textResponsesType = 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3ResponseMessageText';
  protected $textResponsesDataType = 'array';
  protected $triggeredIntentType = 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3Intent';
  protected $triggeredIntentDataType = '';

  /**
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowCxV3Page
   */
  public function setCurrentPage(Google_Service_Dialogflow_GoogleCloudDialogflowCxV3Page $currentPage)
  {
    $this->currentPage = $currentPage;
  }
  /**
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowCxV3Page
   */
  public function getCurrentPage()
  {
    return $this->currentPage;
  }
  public function setDiagnosticInfo($diagnosticInfo)
  {
    $this->diagnosticInfo = $diagnosticInfo;
  }
  public function getDiagnosticInfo()
  {
    return $this->diagnosticInfo;
  }
  /**
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowCxV3TestRunDifference[]
   */
  public function setDifferences($differences)
  {
    $this->differences = $differences;
  }
  /**
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowCxV3TestRunDifference[]
   */
  public function getDifferences()
  {
    return $this->differences;
  }
  public function setSessionParameters($sessionParameters)
  {
    $this->sessionParameters = $sessionParameters;
  }
  public function getSessionParameters()
  {
    return $this->sessionParameters;
  }
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
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowCxV3ResponseMessageText[]
   */
  public function setTextResponses($textResponses)
  {
    $this->textResponses = $textResponses;
  }
  /**
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowCxV3ResponseMessageText[]
   */
  public function getTextResponses()
  {
    return $this->textResponses;
  }
  /**
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowCxV3Intent
   */
  public function setTriggeredIntent(Google_Service_Dialogflow_GoogleCloudDialogflowCxV3Intent $triggeredIntent)
  {
    $this->triggeredIntent = $triggeredIntent;
  }
  /**
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowCxV3Intent
   */
  public function getTriggeredIntent()
  {
    return $this->triggeredIntent;
  }
}
