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

class GoogleCloudDialogflowV2beta1QueryResult extends \Google\Collection
{
  protected $collection_key = 'outputContexts';
  public $action;
  public $allRequiredParamsPresent;
  public $cancelsSlotFilling;
  public $diagnosticInfo;
  protected $fulfillmentMessagesType = GoogleCloudDialogflowV2beta1IntentMessage::class;
  protected $fulfillmentMessagesDataType = 'array';
  public $fulfillmentText;
  protected $intentType = GoogleCloudDialogflowV2beta1Intent::class;
  protected $intentDataType = '';
  public $intentDetectionConfidence;
  protected $knowledgeAnswersType = GoogleCloudDialogflowV2beta1KnowledgeAnswers::class;
  protected $knowledgeAnswersDataType = '';
  public $languageCode;
  protected $outputContextsType = GoogleCloudDialogflowV2beta1Context::class;
  protected $outputContextsDataType = 'array';
  public $parameters;
  public $queryText;
  protected $sentimentAnalysisResultType = GoogleCloudDialogflowV2beta1SentimentAnalysisResult::class;
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
   * @param GoogleCloudDialogflowV2beta1IntentMessage[]
   */
  public function setFulfillmentMessages($fulfillmentMessages)
  {
    $this->fulfillmentMessages = $fulfillmentMessages;
  }
  /**
   * @return GoogleCloudDialogflowV2beta1IntentMessage[]
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
   * @param GoogleCloudDialogflowV2beta1Intent
   */
  public function setIntent(GoogleCloudDialogflowV2beta1Intent $intent)
  {
    $this->intent = $intent;
  }
  /**
   * @return GoogleCloudDialogflowV2beta1Intent
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
  /**
   * @param GoogleCloudDialogflowV2beta1KnowledgeAnswers
   */
  public function setKnowledgeAnswers(GoogleCloudDialogflowV2beta1KnowledgeAnswers $knowledgeAnswers)
  {
    $this->knowledgeAnswers = $knowledgeAnswers;
  }
  /**
   * @return GoogleCloudDialogflowV2beta1KnowledgeAnswers
   */
  public function getKnowledgeAnswers()
  {
    return $this->knowledgeAnswers;
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
   * @param GoogleCloudDialogflowV2beta1Context[]
   */
  public function setOutputContexts($outputContexts)
  {
    $this->outputContexts = $outputContexts;
  }
  /**
   * @return GoogleCloudDialogflowV2beta1Context[]
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
   * @param GoogleCloudDialogflowV2beta1SentimentAnalysisResult
   */
  public function setSentimentAnalysisResult(GoogleCloudDialogflowV2beta1SentimentAnalysisResult $sentimentAnalysisResult)
  {
    $this->sentimentAnalysisResult = $sentimentAnalysisResult;
  }
  /**
   * @return GoogleCloudDialogflowV2beta1SentimentAnalysisResult
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
class_alias(GoogleCloudDialogflowV2beta1QueryResult::class, 'Google_Service_Dialogflow_GoogleCloudDialogflowV2beta1QueryResult');
