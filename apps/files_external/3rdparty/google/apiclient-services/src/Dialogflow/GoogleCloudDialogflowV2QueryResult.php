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
  public $action;
  public $allRequiredParamsPresent;
  public $cancelsSlotFilling;
  public $diagnosticInfo;
  protected $fulfillmentMessagesType = GoogleCloudDialogflowV2IntentMessage::class;
  protected $fulfillmentMessagesDataType = 'array';
  public $fulfillmentText;
  protected $intentType = GoogleCloudDialogflowV2Intent::class;
  protected $intentDataType = '';
  public $intentDetectionConfidence;
  public $languageCode;
  protected $outputContextsType = GoogleCloudDialogflowV2Context::class;
  protected $outputContextsDataType = 'array';
  public $parameters;
  public $queryText;
  protected $sentimentAnalysisResultType = GoogleCloudDialogflowV2SentimentAnalysisResult::class;
  protected $sentimentAnalysisResultDataType = '';
  public $speechRecognitionConfidence;
  public $webhookPayload;
  public $webhookSource;

  public function setAction($action)
  {
    $this->action = $action;
  }
  public function getAction()
  {
    return $this->action;
  }
  public function setAllRequiredParamsPresent($allRequiredParamsPresent)
  {
    $this->allRequiredParamsPresent = $allRequiredParamsPresent;
  }
  public function getAllRequiredParamsPresent()
  {
    return $this->allRequiredParamsPresent;
  }
  public function setCancelsSlotFilling($cancelsSlotFilling)
  {
    $this->cancelsSlotFilling = $cancelsSlotFilling;
  }
  public function getCancelsSlotFilling()
  {
    return $this->cancelsSlotFilling;
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
  public function setFulfillmentText($fulfillmentText)
  {
    $this->fulfillmentText = $fulfillmentText;
  }
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
  public function setParameters($parameters)
  {
    $this->parameters = $parameters;
  }
  public function getParameters()
  {
    return $this->parameters;
  }
  public function setQueryText($queryText)
  {
    $this->queryText = $queryText;
  }
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
  public function setSpeechRecognitionConfidence($speechRecognitionConfidence)
  {
    $this->speechRecognitionConfidence = $speechRecognitionConfidence;
  }
  public function getSpeechRecognitionConfidence()
  {
    return $this->speechRecognitionConfidence;
  }
  public function setWebhookPayload($webhookPayload)
  {
    $this->webhookPayload = $webhookPayload;
  }
  public function getWebhookPayload()
  {
    return $this->webhookPayload;
  }
  public function setWebhookSource($webhookSource)
  {
    $this->webhookSource = $webhookSource;
  }
  public function getWebhookSource()
  {
    return $this->webhookSource;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDialogflowV2QueryResult::class, 'Google_Service_Dialogflow_GoogleCloudDialogflowV2QueryResult');
