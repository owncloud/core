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

class GoogleCloudDialogflowCxV3Fulfillment extends \Google\Collection
{
  protected $collection_key = 'setParameterActions';
  protected $conditionalCasesType = GoogleCloudDialogflowCxV3FulfillmentConditionalCases::class;
  protected $conditionalCasesDataType = 'array';
  protected $messagesType = GoogleCloudDialogflowCxV3ResponseMessage::class;
  protected $messagesDataType = 'array';
  public $returnPartialResponses;
  protected $setParameterActionsType = GoogleCloudDialogflowCxV3FulfillmentSetParameterAction::class;
  protected $setParameterActionsDataType = 'array';
  public $tag;
  public $webhook;

  /**
   * @param GoogleCloudDialogflowCxV3FulfillmentConditionalCases[]
   */
  public function setConditionalCases($conditionalCases)
  {
    $this->conditionalCases = $conditionalCases;
  }
  /**
   * @return GoogleCloudDialogflowCxV3FulfillmentConditionalCases[]
   */
  public function getConditionalCases()
  {
    return $this->conditionalCases;
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
  public function setReturnPartialResponses($returnPartialResponses)
  {
    $this->returnPartialResponses = $returnPartialResponses;
  }
  public function getReturnPartialResponses()
  {
    return $this->returnPartialResponses;
  }
  /**
   * @param GoogleCloudDialogflowCxV3FulfillmentSetParameterAction[]
   */
  public function setSetParameterActions($setParameterActions)
  {
    $this->setParameterActions = $setParameterActions;
  }
  /**
   * @return GoogleCloudDialogflowCxV3FulfillmentSetParameterAction[]
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

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDialogflowCxV3Fulfillment::class, 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3Fulfillment');
