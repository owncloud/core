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

class Google_Service_Dialogflow_GoogleCloudDialogflowV2QueryInput extends Google_Model
{
  protected $audioConfigType = 'Google_Service_Dialogflow_GoogleCloudDialogflowV2InputAudioConfig';
  protected $audioConfigDataType = '';
  protected $eventType = 'Google_Service_Dialogflow_GoogleCloudDialogflowV2EventInput';
  protected $eventDataType = '';
  protected $textType = 'Google_Service_Dialogflow_GoogleCloudDialogflowV2TextInput';
  protected $textDataType = '';

  /**
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowV2InputAudioConfig
   */
  public function setAudioConfig(Google_Service_Dialogflow_GoogleCloudDialogflowV2InputAudioConfig $audioConfig)
  {
    $this->audioConfig = $audioConfig;
  }
  /**
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowV2InputAudioConfig
   */
  public function getAudioConfig()
  {
    return $this->audioConfig;
  }
  /**
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowV2EventInput
   */
  public function setEvent(Google_Service_Dialogflow_GoogleCloudDialogflowV2EventInput $event)
  {
    $this->event = $event;
  }
  /**
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowV2EventInput
   */
  public function getEvent()
  {
    return $this->event;
  }
  /**
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowV2TextInput
   */
  public function setText(Google_Service_Dialogflow_GoogleCloudDialogflowV2TextInput $text)
  {
    $this->text = $text;
  }
  /**
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowV2TextInput
   */
  public function getText()
  {
    return $this->text;
  }
}
