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

class Google_Service_Dialogflow_GoogleCloudDialogflowV2WebhookResponse extends Google_Collection
{
  protected $collection_key = 'sessionEntityTypes';
  protected $followupEventInputType = 'Google_Service_Dialogflow_GoogleCloudDialogflowV2EventInput';
  protected $followupEventInputDataType = '';
  protected $fulfillmentMessagesType = 'Google_Service_Dialogflow_GoogleCloudDialogflowV2IntentMessage';
  protected $fulfillmentMessagesDataType = 'array';
  public $fulfillmentText;
  protected $outputContextsType = 'Google_Service_Dialogflow_GoogleCloudDialogflowV2Context';
  protected $outputContextsDataType = 'array';
  public $payload;
  protected $sessionEntityTypesType = 'Google_Service_Dialogflow_GoogleCloudDialogflowV2SessionEntityType';
  protected $sessionEntityTypesDataType = 'array';
  public $source;

  /**
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowV2EventInput
   */
  public function setFollowupEventInput(Google_Service_Dialogflow_GoogleCloudDialogflowV2EventInput $followupEventInput)
  {
    $this->followupEventInput = $followupEventInput;
  }
  /**
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowV2EventInput
   */
  public function getFollowupEventInput()
  {
    return $this->followupEventInput;
  }
  /**
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowV2IntentMessage[]
   */
  public function setFulfillmentMessages($fulfillmentMessages)
  {
    $this->fulfillmentMessages = $fulfillmentMessages;
  }
  /**
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowV2IntentMessage[]
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
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowV2Context[]
   */
  public function setOutputContexts($outputContexts)
  {
    $this->outputContexts = $outputContexts;
  }
  /**
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowV2Context[]
   */
  public function getOutputContexts()
  {
    return $this->outputContexts;
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
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowV2SessionEntityType[]
   */
  public function setSessionEntityTypes($sessionEntityTypes)
  {
    $this->sessionEntityTypes = $sessionEntityTypes;
  }
  /**
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowV2SessionEntityType[]
   */
  public function getSessionEntityTypes()
  {
    return $this->sessionEntityTypes;
  }
  public function setSource($source)
  {
    $this->source = $source;
  }
  public function getSource()
  {
    return $this->source;
  }
}
