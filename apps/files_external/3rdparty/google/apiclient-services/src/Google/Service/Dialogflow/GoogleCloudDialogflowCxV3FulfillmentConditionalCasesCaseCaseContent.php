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

class Google_Service_Dialogflow_GoogleCloudDialogflowCxV3FulfillmentConditionalCasesCaseCaseContent extends Google_Model
{
  protected $additionalCasesType = 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3FulfillmentConditionalCases';
  protected $additionalCasesDataType = '';
  protected $messageType = 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3ResponseMessage';
  protected $messageDataType = '';

  /**
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowCxV3FulfillmentConditionalCases
   */
  public function setAdditionalCases(Google_Service_Dialogflow_GoogleCloudDialogflowCxV3FulfillmentConditionalCases $additionalCases)
  {
    $this->additionalCases = $additionalCases;
  }
  /**
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowCxV3FulfillmentConditionalCases
   */
  public function getAdditionalCases()
  {
    return $this->additionalCases;
  }
  /**
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowCxV3ResponseMessage
   */
  public function setMessage(Google_Service_Dialogflow_GoogleCloudDialogflowCxV3ResponseMessage $message)
  {
    $this->message = $message;
  }
  /**
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowCxV3ResponseMessage
   */
  public function getMessage()
  {
    return $this->message;
  }
}
