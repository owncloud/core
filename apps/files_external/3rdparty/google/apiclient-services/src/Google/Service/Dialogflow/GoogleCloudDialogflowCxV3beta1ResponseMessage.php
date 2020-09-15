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
  protected $endInteractionType = 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3beta1ResponseMessageEndInteraction';
  protected $endInteractionDataType = '';
  protected $liveAgentHandoffType = 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3beta1ResponseMessageLiveAgentHandoff';
  protected $liveAgentHandoffDataType = '';
  protected $mixedAudioType = 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3beta1ResponseMessageMixedAudio';
  protected $mixedAudioDataType = '';
  protected $outputAudioTextType = 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3beta1ResponseMessageOutputAudioText';
  protected $outputAudioTextDataType = '';
  public $payload;
  protected $playAudioType = 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3beta1ResponseMessagePlayAudio';
  protected $playAudioDataType = '';
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
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowCxV3beta1ResponseMessageEndInteraction
   */
  public function setEndInteraction(Google_Service_Dialogflow_GoogleCloudDialogflowCxV3beta1ResponseMessageEndInteraction $endInteraction)
  {
    $this->endInteraction = $endInteraction;
  }
  /**
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowCxV3beta1ResponseMessageEndInteraction
   */
  public function getEndInteraction()
  {
    return $this->endInteraction;
  }
  /**
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowCxV3beta1ResponseMessageLiveAgentHandoff
   */
  public function setLiveAgentHandoff(Google_Service_Dialogflow_GoogleCloudDialogflowCxV3beta1ResponseMessageLiveAgentHandoff $liveAgentHandoff)
  {
    $this->liveAgentHandoff = $liveAgentHandoff;
  }
  /**
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowCxV3beta1ResponseMessageLiveAgentHandoff
   */
  public function getLiveAgentHandoff()
  {
    return $this->liveAgentHandoff;
  }
  /**
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowCxV3beta1ResponseMessageMixedAudio
   */
  public function setMixedAudio(Google_Service_Dialogflow_GoogleCloudDialogflowCxV3beta1ResponseMessageMixedAudio $mixedAudio)
  {
    $this->mixedAudio = $mixedAudio;
  }
  /**
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowCxV3beta1ResponseMessageMixedAudio
   */
  public function getMixedAudio()
  {
    return $this->mixedAudio;
  }
  /**
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowCxV3beta1ResponseMessageOutputAudioText
   */
  public function setOutputAudioText(Google_Service_Dialogflow_GoogleCloudDialogflowCxV3beta1ResponseMessageOutputAudioText $outputAudioText)
  {
    $this->outputAudioText = $outputAudioText;
  }
  /**
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowCxV3beta1ResponseMessageOutputAudioText
   */
  public function getOutputAudioText()
  {
    return $this->outputAudioText;
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
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowCxV3beta1ResponseMessagePlayAudio
   */
  public function setPlayAudio(Google_Service_Dialogflow_GoogleCloudDialogflowCxV3beta1ResponseMessagePlayAudio $playAudio)
  {
    $this->playAudio = $playAudio;
  }
  /**
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowCxV3beta1ResponseMessagePlayAudio
   */
  public function getPlayAudio()
  {
    return $this->playAudio;
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
