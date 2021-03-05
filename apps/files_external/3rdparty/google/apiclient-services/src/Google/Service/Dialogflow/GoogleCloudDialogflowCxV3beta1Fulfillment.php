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

class Google_Service_Dialogflow_GoogleCloudDialogflowCxV3beta1Fulfillment extends Google_Collection
{
  protected $collection_key = 'setParameterActions';
  protected $conditionalCasesType = 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3beta1FulfillmentConditionalCases';
  protected $conditionalCasesDataType = 'array';
  protected $messagesType = 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3beta1ResponseMessage';
  protected $messagesDataType = 'array';
  protected $setParameterActionsType = 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3beta1FulfillmentSetParameterAction';
  protected $setParameterActionsDataType = 'array';
  public $tag;
  public $webhook;

  /**
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowCxV3beta1FulfillmentConditionalCases[]
   */
  public function setConditionalCases($conditionalCases)
  {
    $this->conditionalCases = $conditionalCases;
  }
  /**
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowCxV3beta1FulfillmentConditionalCases[]
   */
  public function getConditionalCases()
  {
    return $this->conditionalCases;
  }
  /**
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowCxV3beta1ResponseMessage[]
   */
  public function setMessages($messages)
  {
    $this->messages = $messages;
  }
  /**
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowCxV3beta1ResponseMessage[]
   */
  public function getMessages()
  {
    return $this->messages;
  }
  /**
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowCxV3beta1FulfillmentSetParameterAction[]
   */
  public function setSetParameterActions($setParameterActions)
  {
    $this->setParameterActions = $setParameterActions;
  }
  /**
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowCxV3beta1FulfillmentSetParameterAction[]
   */
  public function getSetParameterActions()
  {
    return $this->setParameterActions;
  }
  public function setTag($tag)
  {
    $this->tag = $tag;
  }
  public function getTag()
  {
    return $this->tag;
  }
  public function setWebhook($webhook)
  {
    $this->webhook = $webhook;
  }
  public function getWebhook()
  {
    return $this->webhook;
  }
}
