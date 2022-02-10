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

class GoogleCloudDialogflowCxV3WebhookRequest extends \Google\Collection
{
  protected $collection_key = 'messages';
  /**
   * @var string
   */
  public $detectIntentResponseId;
  protected $fulfillmentInfoType = GoogleCloudDialogflowCxV3WebhookRequestFulfillmentInfo::class;
  protected $fulfillmentInfoDataType = '';
  protected $intentInfoType = GoogleCloudDialogflowCxV3WebhookRequestIntentInfo::class;
  protected $intentInfoDataType = '';
  /**
   * @var string
   */
  public $languageCode;
  protected $messagesType = GoogleCloudDialogflowCxV3ResponseMessage::class;
  protected $messagesDataType = 'array';
  protected $pageInfoType = GoogleCloudDialogflowCxV3PageInfo::class;
  protected $pageInfoDataType = '';
  /**
   * @var array[]
   */
  public $payload;
  protected $sentimentAnalysisResultType = GoogleCloudDialogflowCxV3WebhookRequestSentimentAnalysisResult::class;
  protected $sentimentAnalysisResultDataType = '';
  protected $sessionInfoType = GoogleCloudDialogflowCxV3SessionInfo::class;
  protected $sessionInfoDataType = '';
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
   * @param string
   */
  public function setDetectIntentResponseId($detectIntentResponseId)
  {
    $this->detectIntentResponseId = $detectIntentResponseId;
  }
  /**
   * @return string
   */
  public function getDetectIntentResponseId()
  {
    return $this->detectIntentResponseId;
  }
  /**
   * @param GoogleCloudDialogflowCxV3WebhookRequestFulfillmentInfo
   */
  public function setFulfillmentInfo(GoogleCloudDialogflowCxV3WebhookRequestFulfillmentInfo $fulfillmentInfo)
  {
    $this->fulfillmentInfo = $fulfillmentInfo;
  }
  /**
   * @return GoogleCloudDialogflowCxV3WebhookRequestFulfillmentInfo
   */
  public function getFulfillmentInfo()
  {
    return $this->fulfillmentInfo;
  }
  /**
   * @param GoogleCloudDialogflowCxV3WebhookRequestIntentInfo
   */
  public function setIntentInfo(GoogleCloudDialogflowCxV3WebhookRequestIntentInfo $intentInfo)
  {
    $this->intentInfo = $intentInfo;
  }
  /**
   * @return GoogleCloudDialogflowCxV3WebhookRequestIntentInfo
   */
  public function getIntentInfo()
  {
    return $this->intentInfo;
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
   * @param GoogleCloudDialogflowCxV3ResponseMessage[]
   */
  public function setMessages($messages)
  {
    $this->messages = $messages;
  }
  /**
   * @return GoogleCloudDialogflowCxV3ResponseMessage[]
   */
  public function getMessages()
  {
    return $this->messages;
  }
  /**
   * @param GoogleCloudDialogflowCxV3PageInfo
   */
  public function setPageInfo(GoogleCloudDialogflowCxV3PageInfo $pageInfo)
  {
    $this->pageInfo = $pageInfo;
  }
  /**
   * @return GoogleCloudDialogflowCxV3PageInfo
   */
  public function getPageInfo()
  {
    return $this->pageInfo;
  }
  /**
   * @param array[]
   */
  public function setPayload($payload)
  {
    $this->payload = $payload;
  }
  /**
   * @return array[]
   */
  public function getPayload()
  {
    return $this->payload;
  }
  /**
   * @param GoogleCloudDialogflowCxV3WebhookRequestSentimentAnalysisResult
   */
  public function setSentimentAnalysisResult(GoogleCloudDialogflowCxV3WebhookRequestSentimentAnalysisResult $sentimentAnalysisResult)
  {
    $this->sentimentAnalysisResult = $sentimentAnalysisResult;
  }
  /**
   * @return GoogleCloudDialogflowCxV3WebhookRequestSentimentAnalysisResult
   */
  public function getSentimentAnalysisResult()
  {
    return $this->sentimentAnalysisResult;
  }
  /**
   * @param GoogleCloudDialogflowCxV3SessionInfo
   */
  public function setSessionInfo(GoogleCloudDialogflowCxV3SessionInfo $sessionInfo)
  {
    $this->sessionInfo = $sessionInfo;
  }
  /**
   * @return GoogleCloudDialogflowCxV3SessionInfo
   */
  public function getSessionInfo()
  {
    return $this->sessionInfo;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDialogflowCxV3WebhookRequest::class, 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3WebhookRequest');
