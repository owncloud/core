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

class GoogleCloudDialogflowCxV3ResponseMessage extends \Google\Model
{
  protected $conversationSuccessType = GoogleCloudDialogflowCxV3ResponseMessageConversationSuccess::class;
  protected $conversationSuccessDataType = '';
  protected $endInteractionType = GoogleCloudDialogflowCxV3ResponseMessageEndInteraction::class;
  protected $endInteractionDataType = '';
  protected $liveAgentHandoffType = GoogleCloudDialogflowCxV3ResponseMessageLiveAgentHandoff::class;
  protected $liveAgentHandoffDataType = '';
  protected $mixedAudioType = GoogleCloudDialogflowCxV3ResponseMessageMixedAudio::class;
  protected $mixedAudioDataType = '';
  protected $outputAudioTextType = GoogleCloudDialogflowCxV3ResponseMessageOutputAudioText::class;
  protected $outputAudioTextDataType = '';
  /**
   * @var array[]
   */
  public $payload;
  protected $playAudioType = GoogleCloudDialogflowCxV3ResponseMessagePlayAudio::class;
  protected $playAudioDataType = '';
  protected $telephonyTransferCallType = GoogleCloudDialogflowCxV3ResponseMessageTelephonyTransferCall::class;
  protected $telephonyTransferCallDataType = '';
  protected $textType = GoogleCloudDialogflowCxV3ResponseMessageText::class;
  protected $textDataType = '';

  /**
   * @param GoogleCloudDialogflowCxV3ResponseMessageConversationSuccess
   */
  public function setConversationSuccess(GoogleCloudDialogflowCxV3ResponseMessageConversationSuccess $conversationSuccess)
  {
    $this->conversationSuccess = $conversationSuccess;
  }
  /**
   * @return GoogleCloudDialogflowCxV3ResponseMessageConversationSuccess
   */
  public function getConversationSuccess()
  {
    return $this->conversationSuccess;
  }
  /**
   * @param GoogleCloudDialogflowCxV3ResponseMessageEndInteraction
   */
  public function setEndInteraction(GoogleCloudDialogflowCxV3ResponseMessageEndInteraction $endInteraction)
  {
    $this->endInteraction = $endInteraction;
  }
  /**
   * @return GoogleCloudDialogflowCxV3ResponseMessageEndInteraction
   */
  public function getEndInteraction()
  {
    return $this->endInteraction;
  }
  /**
   * @param GoogleCloudDialogflowCxV3ResponseMessageLiveAgentHandoff
   */
  public function setLiveAgentHandoff(GoogleCloudDialogflowCxV3ResponseMessageLiveAgentHandoff $liveAgentHandoff)
  {
    $this->liveAgentHandoff = $liveAgentHandoff;
  }
  /**
   * @return GoogleCloudDialogflowCxV3ResponseMessageLiveAgentHandoff
   */
  public function getLiveAgentHandoff()
  {
    return $this->liveAgentHandoff;
  }
  /**
   * @param GoogleCloudDialogflowCxV3ResponseMessageMixedAudio
   */
  public function setMixedAudio(GoogleCloudDialogflowCxV3ResponseMessageMixedAudio $mixedAudio)
  {
    $this->mixedAudio = $mixedAudio;
  }
  /**
   * @return GoogleCloudDialogflowCxV3ResponseMessageMixedAudio
   */
  public function getMixedAudio()
  {
    return $this->mixedAudio;
  }
  /**
   * @param GoogleCloudDialogflowCxV3ResponseMessageOutputAudioText
   */
  public function setOutputAudioText(GoogleCloudDialogflowCxV3ResponseMessageOutputAudioText $outputAudioText)
  {
    $this->outputAudioText = $outputAudioText;
  }
  /**
   * @return GoogleCloudDialogflowCxV3ResponseMessageOutputAudioText
   */
  public function getOutputAudioText()
  {
    return $this->outputAudioText;
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
   * @param GoogleCloudDialogflowCxV3ResponseMessagePlayAudio
   */
  public function setPlayAudio(GoogleCloudDialogflowCxV3ResponseMessagePlayAudio $playAudio)
  {
    $this->playAudio = $playAudio;
  }
  /**
   * @return GoogleCloudDialogflowCxV3ResponseMessagePlayAudio
   */
  public function getPlayAudio()
  {
    return $this->playAudio;
  }
  /**
   * @param GoogleCloudDialogflowCxV3ResponseMessageTelephonyTransferCall
   */
  public function setTelephonyTransferCall(GoogleCloudDialogflowCxV3ResponseMessageTelephonyTransferCall $telephonyTransferCall)
  {
    $this->telephonyTransferCall = $telephonyTransferCall;
  }
  /**
   * @return GoogleCloudDialogflowCxV3ResponseMessageTelephonyTransferCall
   */
  public function getTelephonyTransferCall()
  {
    return $this->telephonyTransferCall;
  }
  /**
   * @param GoogleCloudDialogflowCxV3ResponseMessageText
   */
  public function setText(GoogleCloudDialogflowCxV3ResponseMessageText $text)
  {
    $this->text = $text;
  }
  /**
   * @return GoogleCloudDialogflowCxV3ResponseMessageText
   */
  public function getText()
  {
    return $this->text;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDialogflowCxV3ResponseMessage::class, 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3ResponseMessage');
