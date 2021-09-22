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

class GoogleCloudDialogflowCxV3beta1ResponseMessage extends \Google\Model
{
  protected $conversationSuccessType = GoogleCloudDialogflowCxV3beta1ResponseMessageConversationSuccess::class;
  protected $conversationSuccessDataType = '';
  protected $endInteractionType = GoogleCloudDialogflowCxV3beta1ResponseMessageEndInteraction::class;
  protected $endInteractionDataType = '';
  protected $liveAgentHandoffType = GoogleCloudDialogflowCxV3beta1ResponseMessageLiveAgentHandoff::class;
  protected $liveAgentHandoffDataType = '';
  protected $mixedAudioType = GoogleCloudDialogflowCxV3beta1ResponseMessageMixedAudio::class;
  protected $mixedAudioDataType = '';
  protected $outputAudioTextType = GoogleCloudDialogflowCxV3beta1ResponseMessageOutputAudioText::class;
  protected $outputAudioTextDataType = '';
  public $payload;
  protected $playAudioType = GoogleCloudDialogflowCxV3beta1ResponseMessagePlayAudio::class;
  protected $playAudioDataType = '';
  protected $textType = GoogleCloudDialogflowCxV3beta1ResponseMessageText::class;
  protected $textDataType = '';

  /**
   * @param GoogleCloudDialogflowCxV3beta1ResponseMessageConversationSuccess
   */
  public function setConversationSuccess(GoogleCloudDialogflowCxV3beta1ResponseMessageConversationSuccess $conversationSuccess)
  {
    $this->conversationSuccess = $conversationSuccess;
  }
  /**
   * @return GoogleCloudDialogflowCxV3beta1ResponseMessageConversationSuccess
   */
  public function getConversationSuccess()
  {
    return $this->conversationSuccess;
  }
  /**
   * @param GoogleCloudDialogflowCxV3beta1ResponseMessageEndInteraction
   */
  public function setEndInteraction(GoogleCloudDialogflowCxV3beta1ResponseMessageEndInteraction $endInteraction)
  {
    $this->endInteraction = $endInteraction;
  }
  /**
   * @return GoogleCloudDialogflowCxV3beta1ResponseMessageEndInteraction
   */
  public function getEndInteraction()
  {
    return $this->endInteraction;
  }
  /**
   * @param GoogleCloudDialogflowCxV3beta1ResponseMessageLiveAgentHandoff
   */
  public function setLiveAgentHandoff(GoogleCloudDialogflowCxV3beta1ResponseMessageLiveAgentHandoff $liveAgentHandoff)
  {
    $this->liveAgentHandoff = $liveAgentHandoff;
  }
  /**
   * @return GoogleCloudDialogflowCxV3beta1ResponseMessageLiveAgentHandoff
   */
  public function getLiveAgentHandoff()
  {
    return $this->liveAgentHandoff;
  }
  /**
   * @param GoogleCloudDialogflowCxV3beta1ResponseMessageMixedAudio
   */
  public function setMixedAudio(GoogleCloudDialogflowCxV3beta1ResponseMessageMixedAudio $mixedAudio)
  {
    $this->mixedAudio = $mixedAudio;
  }
  /**
   * @return GoogleCloudDialogflowCxV3beta1ResponseMessageMixedAudio
   */
  public function getMixedAudio()
  {
    return $this->mixedAudio;
  }
  /**
   * @param GoogleCloudDialogflowCxV3beta1ResponseMessageOutputAudioText
   */
  public function setOutputAudioText(GoogleCloudDialogflowCxV3beta1ResponseMessageOutputAudioText $outputAudioText)
  {
    $this->outputAudioText = $outputAudioText;
  }
  /**
   * @return GoogleCloudDialogflowCxV3beta1ResponseMessageOutputAudioText
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
   * @param GoogleCloudDialogflowCxV3beta1ResponseMessagePlayAudio
   */
  public function setPlayAudio(GoogleCloudDialogflowCxV3beta1ResponseMessagePlayAudio $playAudio)
  {
    $this->playAudio = $playAudio;
  }
  /**
   * @return GoogleCloudDialogflowCxV3beta1ResponseMessagePlayAudio
   */
  public function getPlayAudio()
  {
    return $this->playAudio;
  }
  /**
   * @param GoogleCloudDialogflowCxV3beta1ResponseMessageText
   */
  public function setText(GoogleCloudDialogflowCxV3beta1ResponseMessageText $text)
  {
    $this->text = $text;
  }
  /**
   * @return GoogleCloudDialogflowCxV3beta1ResponseMessageText
   */
  public function getText()
  {
    return $this->text;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDialogflowCxV3beta1ResponseMessage::class, 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3beta1ResponseMessage');
