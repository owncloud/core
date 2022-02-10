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

class GoogleCloudDialogflowCxV3beta1WebhookResponse extends \Google\Model
{
  protected $fulfillmentResponseType = GoogleCloudDialogflowCxV3beta1WebhookResponseFulfillmentResponse::class;
  protected $fulfillmentResponseDataType = '';
  protected $pageInfoType = GoogleCloudDialogflowCxV3beta1PageInfo::class;
  protected $pageInfoDataType = '';
  /**
   * @var array[]
   */
  public $payload;
  protected $sessionInfoType = GoogleCloudDialogflowCxV3beta1SessionInfo::class;
  protected $sessionInfoDataType = '';
  /**
   * @var string
   */
  public $targetFlow;
  /**
   * @var string
   */
  public $targetPage;

  /**
   * @param GoogleCloudDialogflowCxV3beta1WebhookResponseFulfillmentResponse
   */
  public function setFulfillmentResponse(GoogleCloudDialogflowCxV3beta1WebhookResponseFulfillmentResponse $fulfillmentResponse)
  {
    $this->fulfillmentResponse = $fulfillmentResponse;
  }
  /**
   * @return GoogleCloudDialogflowCxV3beta1WebhookResponseFulfillmentResponse
   */
  public function getFulfillmentResponse()
  {
    return $this->fulfillmentResponse;
  }
  /**
   * @param GoogleCloudDialogflowCxV3beta1PageInfo
   */
  public function setPageInfo(GoogleCloudDialogflowCxV3beta1PageInfo $pageInfo)
  {
    $this->pageInfo = $pageInfo;
  }
  /**
   * @return GoogleCloudDialogflowCxV3beta1PageInfo
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
   * @param GoogleCloudDialogflowCxV3beta1SessionInfo
   */
  public function setSessionInfo(GoogleCloudDialogflowCxV3beta1SessionInfo $sessionInfo)
  {
    $this->sessionInfo = $sessionInfo;
  }
  /**
   * @return GoogleCloudDialogflowCxV3beta1SessionInfo
   */
  public function getSessionInfo()
  {
    return $this->sessionInfo;
  }
  /**
   * @param string
   */
  public function setTargetFlow($targetFlow)
  {
    $this->targetFlow = $targetFlow;
  }
  /**
   * @return string
   */
  public function getTargetFlow()
  {
    return $this->targetFlow;
  }
  /**
   * @param string
   */
  public function setTargetPage($targetPage)
  {
    $this->targetPage = $targetPage;
  }
  /**
   * @return string
   */
  public function getTargetPage()
  {
    return $this->targetPage;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDialogflowCxV3beta1WebhookResponse::class, 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3beta1WebhookResponse');
