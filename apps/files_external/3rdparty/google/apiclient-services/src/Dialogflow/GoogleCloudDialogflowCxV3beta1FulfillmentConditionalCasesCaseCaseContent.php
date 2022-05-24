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

class GoogleCloudDialogflowCxV3beta1FulfillmentConditionalCasesCaseCaseContent extends \Google\Model
{
  protected $additionalCasesType = GoogleCloudDialogflowCxV3beta1FulfillmentConditionalCases::class;
  protected $additionalCasesDataType = '';
  protected $messageType = GoogleCloudDialogflowCxV3beta1ResponseMessage::class;
  protected $messageDataType = '';

  /**
   * @param GoogleCloudDialogflowCxV3beta1FulfillmentConditionalCases
   */
  public function setAdditionalCases(GoogleCloudDialogflowCxV3beta1FulfillmentConditionalCases $additionalCases)
  {
    $this->additionalCases = $additionalCases;
  }
  /**
   * @return GoogleCloudDialogflowCxV3beta1FulfillmentConditionalCases
   */
  public function getAdditionalCases()
  {
    return $this->additionalCases;
  }
  /**
   * @param GoogleCloudDialogflowCxV3beta1ResponseMessage
   */
  public function setMessage(GoogleCloudDialogflowCxV3beta1ResponseMessage $message)
  {
    $this->message = $message;
  }
  /**
   * @return GoogleCloudDialogflowCxV3beta1ResponseMessage
   */
  public function getMessage()
  {
    return $this->message;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDialogflowCxV3beta1FulfillmentConditionalCasesCaseCaseContent::class, 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3beta1FulfillmentConditionalCasesCaseCaseContent');
