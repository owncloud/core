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

class Google_Service_Dialogflow_GoogleCloudDialogflowCxV3ResponseMessage extends Google_Model
{
  protected $conversationSuccessType = 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3ResponseMessageConversationSuccess';
  protected $conversationSuccessDataType = '';
  protected $endInteractionType = 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3ResponseMessageEndInteraction';
  protected $endInteractionDataType = '';
  protected $liveAgentHandoffType = 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3ResponseMessageLiveAgentHandoff';
  protected $liveAgentHandoffDataType = '';
  protected $mixedAudioType = 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3ResponseMessageMixedAudio';
  protected $mixedAudioDataType = '';
  protected $outputAudioTextType = 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3ResponseMessageOutputAudioText';
  protected $outputAudioTextDataType = '';
  public $payload;
  protected $playAudioType = 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3ResponseMessagePlayAudio';
  protected $playAudioDataType = '';
  protected $textType = 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3ResponseMessageText';
  protected $textDataType = '';

  /**
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowCxV3ResponseMessageConversationSuccess
   */
  public function setConversationSuccess(Google_Service_Dialogflow_GoogleCloudDialogflowCxV3ResponseMessageConversationSuccess $conversationSuccess)
  {
    $this->conversationSuccess = $conversationSuccess;
  }
  /**
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowCxV3ResponseMessageConversationSuccess
   */
  public function getConversationSuccess()
  {
    return $this->conversationSuccess;
  }
  /**
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowCxV3ResponseMessageEndInteraction
   */
  public function setEndInteraction(Google_Service_Dialogflow_GoogleCloudDialogflowCxV3ResponseMessageEndInteraction $endInteraction)
  {
    $this->endInteraction = $endInteraction;
  }
  /**
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowCxV3ResponseMessageEndInteraction
   */
  public function getEndInteraction()
  {
    return $this->endInteraction;
  }
  /**
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowCxV3ResponseMessageLiveAgentHandoff
   */
  public function setLiveAgentHandoff(Google_Service_Dialogflow_GoogleCloudDialogflowCxV3ResponseMessageLiveAgentHandoff $liveAgentHandoff)
  {
    $this->liveAgentHandoff = $liveAgentHandoff;
  }
  /**
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowCxV3ResponseMessageLiveAgentHandoff
   */
  public function getLiveAgentHandoff()
  {
    return $this->liveAgentHandoff;
  }
  /**
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowCxV3ResponseMessageMixedAudio
   */
  public function setMixedAudio(Google_Service_Dialogflow_GoogleCloudDialogflowCxV3ResponseMessageMixedAudio $mixedAudio)
  {
    $this->mixedAudio = $mixedAudio;
  }
  /**
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowCxV3ResponseMessageMixedAudio
   */
  public function getMixedAudio()
  {
    return $this->mixedAudio;
  }
  /**
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowCxV3ResponseMessageOutputAudioText
   */
  public function setOutputAudioText(Google_Service_Dialogflow_GoogleCloudDialogflowCxV3ResponseMessageOutputAudioText $outputAudioText)
  {
    $this->outputAudioText = $outputAudioText;
  }
  /**
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowCxV3ResponseMessageOutputAudioText
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
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowCxV3ResponseMessagePlayAudio
   */
  public function setPlayAudio(Google_Service_Dialogflow_GoogleCloudDialogflowCxV3ResponseMessagePlayAudio $playAudio)
  {
    $this->playAudio = $playAudio;
  }
  /**
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowCxV3ResponseMessagePlayAudio
   */
  public function getPlayAudio()
  {
    return $this->playAudio;
  }
  /**
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowCxV3ResponseMessageText
   */
  public function setText(Google_Service_Dialogflow_GoogleCloudDialogflowCxV3ResponseMessageText $text)
  {
    $this->text = $text;
  }
  /**
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowCxV3ResponseMessageText
   */
  public function getText()
  {
    return $this->text;
  }
}
