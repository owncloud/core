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

class Google_Service_Dialogflow_GoogleCloudDialogflowCxV3QueryResult extends Google_Collection
{
  protected $collection_key = 'webhookStatuses';
  protected $currentPageType = 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3Page';
  protected $currentPageDataType = '';
  public $diagnosticInfo;
  protected $intentType = 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3Intent';
  protected $intentDataType = '';
  public $intentDetectionConfidence;
  public $languageCode;
  protected $matchType = 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3Match';
  protected $matchDataType = '';
  public $parameters;
  protected $responseMessagesType = 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3ResponseMessage';
  protected $responseMessagesDataType = 'array';
  protected $sentimentAnalysisResultType = 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3SentimentAnalysisResult';
  protected $sentimentAnalysisResultDataType = '';
  public $text;
  public $transcript;
  public $triggerEvent;
  public $triggerIntent;
  public $webhookPayloads;
  protected $webhookStatusesType = 'Google_Service_Dialogflow_GoogleRpcStatus';
  protected $webhookStatusesDataType = 'array';

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
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowCxV3Intent
   */
  public function setIntent(Google_Service_Dialogflow_GoogleCloudDialogflowCxV3Intent $intent)
  {
    $this->intent = $intent;
  }
  /**
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowCxV3Intent
   */
  public function getIntent()
  {
    return $this->intent;
  }
  public function setIntentDetectionConfidence($intentDetectionConfidence)
  {
    $this->intentDetectionConfidence = $intentDetectionConfidence;
  }
  public function getIntentDetectionConfidence()
  {
    return $this->intentDetectionConfidence;
  }
  public function setLanguageCode($languageCode)
  {
    $this->languageCode = $languageCode;
  }
  public function getLanguageCode()
  {
    return $this->languageCode;
  }
  /**
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowCxV3Match
   */
  public function setMatch(Google_Service_Dialogflow_GoogleCloudDialogflowCxV3Match $match)
  {
    $this->match = $match;
  }
  /**
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowCxV3Match
   */
  public function getMatch()
  {
    return $this->match;
  }
  public function setParameters($parameters)
  {
    $this->parameters = $parameters;
  }
  public function getParameters()
  {
    return $this->parameters;
  }
  /**
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowCxV3ResponseMessage[]
   */
  public function setResponseMessages($responseMessages)
  {
    $this->responseMessages = $responseMessages;
  }
  /**
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowCxV3ResponseMessage[]
   */
  public function getResponseMessages()
  {
    return $this->responseMessages;
  }
  /**
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowCxV3SentimentAnalysisResult
   */
  public function setSentimentAnalysisResult(Google_Service_Dialogflow_GoogleCloudDialogflowCxV3SentimentAnalysisResult $sentimentAnalysisResult)
  {
    $this->sentimentAnalysisResult = $sentimentAnalysisResult;
  }
  /**
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowCxV3SentimentAnalysisResult
   */
  public function getSentimentAnalysisResult()
  {
    return $this->sentimentAnalysisResult;
  }
  public function setText($text)
  {
    $this->text = $text;
  }
  public function getText()
  {
    return $this->text;
  }
  public function setTranscript($transcript)
  {
    $this->transcript = $transcript;
  }
  public function getTranscript()
  {
    return $this->transcript;
  }
  public function setTriggerEvent($triggerEvent)
  {
    $this->triggerEvent = $triggerEvent;
  }
  public function getTriggerEvent()
  {
    return $this->triggerEvent;
  }
  public function setTriggerIntent($triggerIntent)
  {
    $this->triggerIntent = $triggerIntent;
  }
  public function getTriggerIntent()
  {
    return $this->triggerIntent;
  }
  public function setWebhookPayloads($webhookPayloads)
  {
    $this->webhookPayloads = $webhookPayloads;
  }
  public function getWebhookPayloads()
  {
    return $this->webhookPayloads;
  }
  /**
   * @param Google_Service_Dialogflow_GoogleRpcStatus[]
   */
  public function setWebhookStatuses($webhookStatuses)
  {
    $this->webhookStatuses = $webhookStatuses;
  }
  /**
   * @return Google_Service_Dialogflow_GoogleRpcStatus[]
   */
  public function getWebhookStatuses()
  {
    return $this->webhookStatuses;
  }
}
