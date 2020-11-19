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

class Google_Service_Dialogflow_GoogleCloudDialogflowCxV3WebhookRequest extends Google_Collection
{
  protected $collection_key = 'messages';
  public $detectIntentResponseId;
  protected $fulfillmentInfoType = 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3WebhookRequestFulfillmentInfo';
  protected $fulfillmentInfoDataType = '';
  protected $intentInfoType = 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3WebhookRequestIntentInfo';
  protected $intentInfoDataType = '';
  protected $messagesType = 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3ResponseMessage';
  protected $messagesDataType = 'array';
  protected $pageInfoType = 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3PageInfo';
  protected $pageInfoDataType = '';
  public $payload;
  protected $sessionInfoType = 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3SessionInfo';
  protected $sessionInfoDataType = '';

  public function setDetectIntentResponseId($detectIntentResponseId)
  {
    $this->detectIntentResponseId = $detectIntentResponseId;
  }
  public function getDetectIntentResponseId()
  {
    return $this->detectIntentResponseId;
  }
  /**
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowCxV3WebhookRequestFulfillmentInfo
   */
  public function setFulfillmentInfo(Google_Service_Dialogflow_GoogleCloudDialogflowCxV3WebhookRequestFulfillmentInfo $fulfillmentInfo)
  {
    $this->fulfillmentInfo = $fulfillmentInfo;
  }
  /**
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowCxV3WebhookRequestFulfillmentInfo
   */
  public function getFulfillmentInfo()
  {
    return $this->fulfillmentInfo;
  }
  /**
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowCxV3WebhookRequestIntentInfo
   */
  public function setIntentInfo(Google_Service_Dialogflow_GoogleCloudDialogflowCxV3WebhookRequestIntentInfo $intentInfo)
  {
    $this->intentInfo = $intentInfo;
  }
  /**
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowCxV3WebhookRequestIntentInfo
   */
  public function getIntentInfo()
  {
    return $this->intentInfo;
  }
  /**
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowCxV3ResponseMessage
   */
  public function setMessages($messages)
  {
    $this->messages = $messages;
  }
  /**
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowCxV3ResponseMessage
   */
  public function getMessages()
  {
    return $this->messages;
  }
  /**
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowCxV3PageInfo
   */
  public function setPageInfo(Google_Service_Dialogflow_GoogleCloudDialogflowCxV3PageInfo $pageInfo)
  {
    $this->pageInfo = $pageInfo;
  }
  /**
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowCxV3PageInfo
   */
  public function getPageInfo()
  {
    return $this->pageInfo;
  }
  public function setPayload($payload)
  {
    $this->payload = $payload;
  }
  public function getPayload()
  {
    return $this->payload;
  }
  /**
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowCxV3SessionInfo
   */
  public function setSessionInfo(Google_Service_Dialogflow_GoogleCloudDialogflowCxV3SessionInfo $sessionInfo)
  {
    $this->sessionInfo = $sessionInfo;
  }
  /**
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowCxV3SessionInfo
   */
  public function getSessionInfo()
  {
    return $this->sessionInfo;
  }
}
