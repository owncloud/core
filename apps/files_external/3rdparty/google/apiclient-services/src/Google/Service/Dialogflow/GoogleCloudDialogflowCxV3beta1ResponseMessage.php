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

class Google_Service_Dialogflow_GoogleCloudDialogflowCxV3beta1ResponseMessage extends Google_Model
{
  protected $conversationSuccessType = 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3beta1ResponseMessageConversationSuccess';
  protected $conversationSuccessDataType = '';
  protected $humanAgentHandoffType = 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3beta1ResponseMessageHumanAgentHandoff';
  protected $humanAgentHandoffDataType = '';
  public $payload;
  protected $textType = 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3beta1ResponseMessageText';
  protected $textDataType = '';

  /**
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowCxV3beta1ResponseMessageConversationSuccess
   */
  public function setConversationSuccess(Google_Service_Dialogflow_GoogleCloudDialogflowCxV3beta1ResponseMessageConversationSuccess $conversationSuccess)
  {
    $this->conversationSuccess = $conversationSuccess;
  }
  /**
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowCxV3beta1ResponseMessageConversationSuccess
   */
  public function getConversationSuccess()
  {
    return $this->conversationSuccess;
  }
  /**
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowCxV3beta1ResponseMessageHumanAgentHandoff
   */
  public function setHumanAgentHandoff(Google_Service_Dialogflow_GoogleCloudDialogflowCxV3beta1ResponseMessageHumanAgentHandoff $humanAgentHandoff)
  {
    $this->humanAgentHandoff = $humanAgentHandoff;
  }
  /**
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowCxV3beta1ResponseMessageHumanAgentHandoff
   */
  public function getHumanAgentHandoff()
  {
    return $this->humanAgentHandoff;
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
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowCxV3beta1ResponseMessageText
   */
  public function setText(Google_Service_Dialogflow_GoogleCloudDialogflowCxV3beta1ResponseMessageText $text)
  {
    $this->text = $text;
  }
  /**
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowCxV3beta1ResponseMessageText
   */
  public function getText()
  {
    return $this->text;
  }
}
