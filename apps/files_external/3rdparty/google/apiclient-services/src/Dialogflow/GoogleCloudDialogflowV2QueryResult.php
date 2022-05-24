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

class GoogleCloudDialogflowV2QueryResult extends \Google\Collection
{
  protected $collection_key = 'outputContexts';
  /**
   * @var string
   */
  public $action;
  /**
   * @var bool
   */
  public $allRequiredParamsPresent;
  /**
   * @var bool
   */
  public $cancelsSlotFilling;
  /**
   * @var array[]
   */
  public $diagnosticInfo;
  protected $fulfillmentMessagesType = GoogleCloudDialogflowV2IntentMessage::class;
  protected $fulfillmentMessagesDataType = 'array';
  /**
   * @var string
   */
  public $fulfillmentText;
  protected $intentType = GoogleCloudDialogflowV2Intent::class;
  protected $intentDataType = '';
  /**
   * @var float
   */
  public $intentDetectionConfidence;
  /**
   * @var string
   */
  public $languageCode;
  protected $outputContextsType = GoogleCloudDialogflowV2Context::class;
  protected $outputContextsDataType = 'array';
  /**
   * @var array[]
   */
  public $parameters;
  /**
   * @var string
   */
  public $queryText;
  protected $sentimentAnalysisResultType = GoogleCloudDialogflowV2SentimentAnalysisResult::class;
  protected $sentimentAnalysisResultDataType = '';
  /**
   * @var float
   */
  public $speechRecognitionConfidence;
  /**
   * @var array[]
   */
  public $webhookPayload;
  /**
   * @var string
   */
  public $webhookSource;

  /**
   * @param string
   */
  public function setAction($action)
  {
    $this->action = $action;
  }
  /**
   * @return string
   */
  public function getAction()
  {
    return $this->action;
  }
  /**
   * @param bool
   */
  public function setAllRequiredParamsPresent($allRequiredParamsPresent)
  {
    $this->allRequiredParamsPresent = $allRequiredParamsPresent;
  }
  /**
   * @return bool
   */
  public function getAllRequiredParamsPresent()
  {
    return $this->allRequiredParamsPresent;
  }
  /**
   * @param bool
   */
  public function setCancelsSlotFilling($cancelsSlotFilling)
  {
    $this->cancelsSlotFilling = $cancelsSlotFilling;
  }
  /**
   * @return bool
   */
  public function getCancelsSlotFilling()
  {
    return $this->cancelsSlotFilling;
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
   * @param GoogleCloudDialogflowV2IntentMessage[]
   */
  public function setFulfillmentMessages($fulfillmentMessages)
  {
    $this->fulfillmentMessages = $fulfillmentMessages;
  }
  /**
   * @return GoogleCloudDialogflowV2IntentMessage[]
   */
  public function getFulfillmentMessages()
  {
    return $this->fulfillmentMessages;
  }
  /**
   * @param string
   */
  public function setFulfillmentText($fulfillmentText)
  {
    $this->fulfillmentText = $fulfillmentText;
  }
  /**
   * @return string
   */
  public function getFulfillmentText()
  {
    return $this->fulfillmentText;
  }
  /**
   * @param GoogleCloudDialogflowV2Intent
   */
  public function setIntent(GoogleCloudDialogflowV2Intent $intent)
  {
    $this->intent = $intent;
  }
  /**
   * @return GoogleCloudDialogflowV2Intent
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
   * @param GoogleCloudDialogflowV2Context[]
   */
  public function setOutputContexts($outputContexts)
  {
    $this->outputContexts = $outputContexts;
  }
  /**
   * @return GoogleCloudDialogflowV2Context[]
   */
  public function getOutputContexts()
  {
    return $this->outputContexts;
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
   * @param string
   */
  public function setQueryText($queryText)
  {
    $this->queryText = $queryText;
  }
  /**
   * @return string
   */
  public function getQueryText()
  {
    return $this->queryText;
  }
  /**
   * @param GoogleCloudDialogflowV2SentimentAnalysisResult
   */
  public function setSentimentAnalysisResult(GoogleCloudDialogflowV2SentimentAnalysisResult $sentimentAnalysisResult)
  {
    $this->sentimentAnalysisResult = $sentimentAnalysisResult;
  }
  /**
   * @return GoogleCloudDialogflowV2SentimentAnalysisResult
   */
  public function getSentimentAnalysisResult()
  {
    return $this->sentimentAnalysisResult;
  }
  /**
   * @param float
   */
  public function setSpeechRecognitionConfidence($speechRecognitionConfidence)
  {
    $this->speechRecognitionConfidence = $speechRecognitionConfidence;
  }
  /**
   * @return float
   */
  public function getSpeechRecognitionConfidence()
  {
    return $this->speechRecognitionConfidence;
  }
  /**
   * @param array[]
   */
  public function setWebhookPayload($webhookPayload)
  {
    $this->webhookPayload = $webhookPayload;
  }
  /**
   * @return array[]
   */
  public function getWebhookPayload()
  {
    return $this->webhookPayload;
  }
  /**
   * @param string
   */
  public function setWebhookSource($webhookSource)
  {
    $this->webhookSource = $webhookSource;
  }
  /**
   * @return string
   */
  public function getWebhookSource()
  {
    return $this->webhookSource;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDialogflowV2QueryResult::class, 'Google_Service_Dialogflow_GoogleCloudDialogflowV2QueryResult');
