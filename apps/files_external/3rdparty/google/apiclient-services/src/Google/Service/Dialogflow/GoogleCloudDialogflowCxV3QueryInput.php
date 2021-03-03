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

class Google_Service_Dialogflow_GoogleCloudDialogflowCxV3QueryInput extends Google_Model
{
  protected $audioType = 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3AudioInput';
  protected $audioDataType = '';
  protected $dtmfType = 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3DtmfInput';
  protected $dtmfDataType = '';
  protected $eventType = 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3EventInput';
  protected $eventDataType = '';
  protected $intentType = 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3IntentInput';
  protected $intentDataType = '';
  public $languageCode;
  protected $textType = 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3TextInput';
  protected $textDataType = '';

  /**
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowCxV3AudioInput
   */
  public function setAudio(Google_Service_Dialogflow_GoogleCloudDialogflowCxV3AudioInput $audio)
  {
    $this->audio = $audio;
  }
  /**
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowCxV3AudioInput
   */
  public function getAudio()
  {
    return $this->audio;
  }
  /**
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowCxV3DtmfInput
   */
  public function setDtmf(Google_Service_Dialogflow_GoogleCloudDialogflowCxV3DtmfInput $dtmf)
  {
    $this->dtmf = $dtmf;
  }
  /**
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowCxV3DtmfInput
   */
  public function getDtmf()
  {
    return $this->dtmf;
  }
  /**
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowCxV3EventInput
   */
  public function setEvent(Google_Service_Dialogflow_GoogleCloudDialogflowCxV3EventInput $event)
  {
    $this->event = $event;
  }
  /**
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowCxV3EventInput
   */
  public function getEvent()
  {
    return $this->event;
  }
  /**
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowCxV3IntentInput
   */
  public function setIntent(Google_Service_Dialogflow_GoogleCloudDialogflowCxV3IntentInput $intent)
  {
    $this->intent = $intent;
  }
  /**
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowCxV3IntentInput
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
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowCxV3TextInput
   */
  public function setText(Google_Service_Dialogflow_GoogleCloudDialogflowCxV3TextInput $text)
  {
    $this->text = $text;
  }
  /**
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowCxV3TextInput
   */
  public function getText()
  {
    return $this->text;
  }
}
