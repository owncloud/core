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

class Google_Service_Dialogflow_GoogleCloudDialogflowCxV3ConversationTurnUserInput extends Google_Model
{
  public $injectedParameters;
  protected $inputType = 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3QueryInput';
  protected $inputDataType = '';
  public $isWebhookEnabled;

  public function setInjectedParameters($injectedParameters)
  {
    $this->injectedParameters = $injectedParameters;
  }
  public function getInjectedParameters()
  {
    return $this->injectedParameters;
  }
  /**
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowCxV3QueryInput
   */
  public function setInput(Google_Service_Dialogflow_GoogleCloudDialogflowCxV3QueryInput $input)
  {
    $this->input = $input;
  }
  /**
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowCxV3QueryInput
   */
  public function getInput()
  {
    return $this->input;
  }
  public function setIsWebhookEnabled($isWebhookEnabled)
  {
    $this->isWebhookEnabled = $isWebhookEnabled;
  }
  public function getIsWebhookEnabled()
  {
    return $this->isWebhookEnabled;
  }
}
