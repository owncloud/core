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

class GoogleCloudDialogflowV2WebhookResponse extends \Google\Collection
{
  protected $collection_key = 'sessionEntityTypes';
  protected $followupEventInputType = GoogleCloudDialogflowV2EventInput::class;
  protected $followupEventInputDataType = '';
  protected $fulfillmentMessagesType = GoogleCloudDialogflowV2IntentMessage::class;
  protected $fulfillmentMessagesDataType = 'array';
  /**
   * @var string
   */
  public $fulfillmentText;
  protected $outputContextsType = GoogleCloudDialogflowV2Context::class;
  protected $outputContextsDataType = 'array';
  /**
   * @var array[]
   */
  public $payload;
  protected $sessionEntityTypesType = GoogleCloudDialogflowV2SessionEntityType::class;
  protected $sessionEntityTypesDataType = 'array';
  /**
   * @var string
   */
  public $source;

  /**
   * @param GoogleCloudDialogflowV2EventInput
   */
  public function setFollowupEventInput(GoogleCloudDialogflowV2EventInput $followupEventInput)
  {
    $this->followupEventInput = $followupEventInput;
  }
  /**
   * @return GoogleCloudDialogflowV2EventInput
   */
  public function getFollowupEventInput()
  {
    return $this->followupEventInput;
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
   * @param GoogleCloudDialogflowV2SessionEntityType[]
   */
  public function setSessionEntityTypes($sessionEntityTypes)
  {
    $this->sessionEntityTypes = $sessionEntityTypes;
  }
  /**
   * @return GoogleCloudDialogflowV2SessionEntityType[]
   */
  public function getSessionEntityTypes()
  {
    return $this->sessionEntityTypes;
  }
  /**
   * @param string
   */
  public function setSource($source)
  {
    $this->source = $source;
  }
  /**
   * @return string
   */
  public function getSource()
  {
    return $this->source;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDialogflowV2WebhookResponse::class, 'Google_Service_Dialogflow_GoogleCloudDialogflowV2WebhookResponse');
