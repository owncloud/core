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

class Google_Service_Dialogflow_GoogleCloudDialogflowCxV3WebhookResponse extends Google_Model
{
  protected $fulfillmentResponseType = 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3WebhookResponseFulfillmentResponse';
  protected $fulfillmentResponseDataType = '';
  protected $pageInfoType = 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3PageInfo';
  protected $pageInfoDataType = '';
  public $payload;
  protected $sessionInfoType = 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3SessionInfo';
  protected $sessionInfoDataType = '';
  public $targetFlow;
  public $targetPage;

  /**
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowCxV3WebhookResponseFulfillmentResponse
   */
  public function setFulfillmentResponse(Google_Service_Dialogflow_GoogleCloudDialogflowCxV3WebhookResponseFulfillmentResponse $fulfillmentResponse)
  {
    $this->fulfillmentResponse = $fulfillmentResponse;
  }
  /**
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowCxV3WebhookResponseFulfillmentResponse
   */
  public function getFulfillmentResponse()
  {
    return $this->fulfillmentResponse;
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
  public function setTargetFlow($targetFlow)
  {
    $this->targetFlow = $targetFlow;
  }
  public function getTargetFlow()
  {
    return $this->targetFlow;
  }
  public function setTargetPage($targetPage)
  {
    $this->targetPage = $targetPage;
  }
  public function getTargetPage()
  {
    return $this->targetPage;
  }
}
