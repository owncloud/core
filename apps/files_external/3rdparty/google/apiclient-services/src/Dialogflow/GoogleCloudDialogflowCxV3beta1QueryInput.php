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

class GoogleCloudDialogflowCxV3beta1QueryInput extends \Google\Model
{
  protected $audioType = GoogleCloudDialogflowCxV3beta1AudioInput::class;
  protected $audioDataType = '';
  protected $dtmfType = GoogleCloudDialogflowCxV3beta1DtmfInput::class;
  protected $dtmfDataType = '';
  protected $eventType = GoogleCloudDialogflowCxV3beta1EventInput::class;
  protected $eventDataType = '';
  protected $intentType = GoogleCloudDialogflowCxV3beta1IntentInput::class;
  protected $intentDataType = '';
  public $languageCode;
  protected $textType = GoogleCloudDialogflowCxV3beta1TextInput::class;
  protected $textDataType = '';

  /**
   * @param GoogleCloudDialogflowCxV3beta1AudioInput
   */
  public function setAudio(GoogleCloudDialogflowCxV3beta1AudioInput $audio)
  {
    $this->audio = $audio;
  }
  /**
   * @return GoogleCloudDialogflowCxV3beta1AudioInput
   */
  public function getAudio()
  {
    return $this->audio;
  }
  /**
   * @param GoogleCloudDialogflowCxV3beta1DtmfInput
   */
  public function setDtmf(GoogleCloudDialogflowCxV3beta1DtmfInput $dtmf)
  {
    $this->dtmf = $dtmf;
  }
  /**
   * @return GoogleCloudDialogflowCxV3beta1DtmfInput
   */
  public function getDtmf()
  {
    return $this->dtmf;
  }
  /**
   * @param GoogleCloudDialogflowCxV3beta1EventInput
   */
  public function setEvent(GoogleCloudDialogflowCxV3beta1EventInput $event)
  {
    $this->event = $event;
  }
  /**
   * @return GoogleCloudDialogflowCxV3beta1EventInput
   */
  public function getEvent()
  {
    return $this->event;
  }
  /**
   * @param GoogleCloudDialogflowCxV3beta1IntentInput
   */
  public function setIntent(GoogleCloudDialogflowCxV3beta1IntentInput $intent)
  {
    $this->intent = $intent;
  }
  /**
   * @return GoogleCloudDialogflowCxV3beta1IntentInput
   */
  public function getIntent()
  {
    return $this->intent;
  }
  public function setLanguageCode($languageCode)
  {
    $this->languageCode = $languageCode;
  }
  public function getLanguageCode()
  {
    return $this->languageCode;
  }
  /**
   * @param GoogleCloudDialogflowCxV3beta1TextInput
   */
  public function setText(GoogleCloudDialogflowCxV3beta1TextInput $text)
  {
    $this->text = $text;
  }
  /**
   * @return GoogleCloudDialogflowCxV3beta1TextInput
   */
  public function getText()
  {
    return $this->text;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDialogflowCxV3beta1QueryInput::class, 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3beta1QueryInput');
