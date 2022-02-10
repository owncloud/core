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

class GoogleCloudDialogflowCxV3QueryResult extends \Google\Collection
{
  protected $collection_key = 'webhookStatuses';
  protected $currentPageType = GoogleCloudDialogflowCxV3Page::class;
  protected $currentPageDataType = '';
  /**
   * @var array[]
   */
  public $diagnosticInfo;
  protected $dtmfType = GoogleCloudDialogflowCxV3DtmfInput::class;
  protected $dtmfDataType = '';
  protected $intentType = GoogleCloudDialogflowCxV3Intent::class;
  protected $intentDataType = '';
  /**
   * @var float
   */
  public $intentDetectionConfidence;
  /**
   * @var string
   */
  public $languageCode;
  protected $matchType = GoogleCloudDialogflowCxV3Match::class;
  protected $matchDataType = '';
  /**
   * @var array[]
   */
  public $parameters;
  protected $responseMessagesType = GoogleCloudDialogflowCxV3ResponseMessage::class;
  protected $responseMessagesDataType = 'array';
  protected $sentimentAnalysisResultType = GoogleCloudDialogflowCxV3SentimentAnalysisResult::class;
  protected $sentimentAnalysisResultDataType = '';
  /**
   * @var string
   */
  public $text;
  /**
   * @var string
   */
  public $transcript;
  /**
   * @var string
   */
  public $triggerEvent;
  /**
   * @var string
   */
  public $triggerIntent;
  /**
   * @var array[]
   */
  public $webhookPayloads;
  protected $webhookStatusesType = GoogleRpcStatus::class;
  protected $webhookStatusesDataType = 'array';

  /**
   * @param GoogleCloudDialogflowCxV3Page
   */
  public function setCurrentPage(GoogleCloudDialogflowCxV3Page $currentPage)
  {
    $this->currentPage = $currentPage;
  }
  /**
   * @return GoogleCloudDialogflowCxV3Page
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
   * @param GoogleCloudDialogflowCxV3DtmfInput
   */
  public function setDtmf(GoogleCloudDialogflowCxV3DtmfInput $dtmf)
  {
    $this->dtmf = $dtmf;
  }
  /**
   * @return GoogleCloudDialogflowCxV3DtmfInput
   */
  public function getDtmf()
  {
    return $this->dtmf;
  }
  /**
   * @param GoogleCloudDialogflowCxV3Intent
   */
  public function setIntent(GoogleCloudDialogflowCxV3Intent $intent)
  {
    $this->intent = $intent;
  }
  /**
   * @return GoogleCloudDialogflowCxV3Intent
   */
  public function getIntent()
  {
    return $this->intent;
  }
  /**
   * @param float
   */
  public function setIntentDetectionConfidence($intentDetectionConfidence)
  {
    $this->intentDetectionConfidence = $intentDetectionConfidence;
  }
  /**
   * @return float
   */
  public function getIntentDetectionConfidence()
  {
    return $this->intentDetectionConfidence;
  }
  /**
   * @param string
   */
  public function setLanguageCode($languageCode)
  {
    $this->languageCode = $languageCode;
  }
  /**
   * @return string
   */
  public function getLanguageCode()
  {
    return $this->languageCode;
  }
  /**
   * @param GoogleCloudDialogflowCxV3Match
   */
  public function setMatch(GoogleCloudDialogflowCxV3Match $match)
  {
    $this->match = $match;
  }
  /**
   * @return GoogleCloudDialogflowCxV3Match
   */
  public function getMatch()
  {
    return $this->match;
  }
  /**
   * @param array[]
   */
  public function setParameters($parameters)
  {
    $this->parameters = $parameters;
  }
  /**
   * @return array[]
   */
  public function getParameters()
  {
    return $this->parameters;
  }
  /**
   * @param GoogleCloudDialogflowCxV3ResponseMessage[]
   */
  public function setResponseMessages($responseMessages)
  {
    $this->responseMessages = $responseMessages;
  }
  /**
   * @return GoogleCloudDialogflowCxV3ResponseMessage[]
   */
  public function getResponseMessages()
  {
    return $this->responseMessages;
  }
  /**
   * @param GoogleCloudDialogflowCxV3SentimentAnalysisResult
   */
  public function setSentimentAnalysisResult(GoogleCloudDialogflowCxV3SentimentAnalysisResult $sentimentAnalysisResult)
  {
    $this->sentimentAnalysisResult = $sentimentAnalysisResult;
  }
  /**
   * @return GoogleCloudDialogflowCxV3SentimentAnalysisResult
   */
  public function getSentimentAnalysisResult()
  {
    return $this->sentimentAnalysisResult;
  }
  /**
   * @param string
   */
  public function setText($text)
  {
    $this->text = $text;
  }
  /**
   * @return string
   */
  public function getText()
  {
    return $this->text;
  }
  /**
   * @param string
   */
  public function setTranscript($transcript)
  {
    $this->transcript = $transcript;
  }
  /**
   * @return string
   */
  public function getTranscript()
  {
    return $this->transcript;
  }
  /**
   * @param string
   */
  public function setTriggerEvent($triggerEvent)
  {
    $this->triggerEvent = $triggerEvent;
  }
  /**
   * @return string
   */
  public function getTriggerEvent()
  {
    return $this->triggerEvent;
  }
  /**
   * @param string
   */
  public function setTriggerIntent($triggerIntent)
  {
    $this->triggerIntent = $triggerIntent;
  }
  /**
   * @return string
   */
  public function getTriggerIntent()
  {
    return $this->triggerIntent;
  }
  /**
   * @param array[]
   */
  public function setWebhookPayloads($webhookPayloads)
  {
    $this->webhookPayloads = $webhookPayloads;
  }
  /**
   * @return array[]
   */
  public function getWebhookPayloads()
  {
    return $this->webhookPayloads;
  }
  /**
   * @param GoogleRpcStatus[]
   */
  public function setWebhookStatuses($webhookStatuses)
  {
    $this->webhookStatuses = $webhookStatuses;
  }
  /**
   * @return GoogleRpcStatus[]
   */
  public function getWebhookStatuses()
  {
    return $this->webhookStatuses;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDialogflowCxV3QueryResult::class, 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3QueryResult');
