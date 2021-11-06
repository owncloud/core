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

class GoogleCloudDialogflowCxV3WebhookResponse extends \Google\Model
{
  protected $fulfillmentResponseType = GoogleCloudDialogflowCxV3WebhookResponseFulfillmentResponse::class;
  protected $fulfillmentResponseDataType = '';
  protected $pageInfoType = GoogleCloudDialogflowCxV3PageInfo::class;
  protected $pageInfoDataType = '';
  public $payload;
  protected $sessionInfoType = GoogleCloudDialogflowCxV3SessionInfo::class;
  protected $sessionInfoDataType = '';
  public $targetFlow;
  public $targetPage;

  /**
   * @param GoogleCloudDialogflowCxV3WebhookResponseFulfillmentResponse
   */
  public function setFulfillmentResponse(GoogleCloudDialogflowCxV3WebhookResponseFulfillmentResponse $fulfillmentResponse)
  {
    $this->fulfillmentResponse = $fulfillmentResponse;
  }
  /**
   * @return GoogleCloudDialogflowCxV3WebhookResponseFulfillmentResponse
   */
  public function getFulfillmentResponse()
  {
    return $this->fulfillmentResponse;
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
  public function setPayload($payload)
  {
    $this->payload = $payload;
  }
  public function getPayload()
  {
    return $this->payload;
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

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDialogflowCxV3WebhookResponse::class, 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3WebhookResponse');
