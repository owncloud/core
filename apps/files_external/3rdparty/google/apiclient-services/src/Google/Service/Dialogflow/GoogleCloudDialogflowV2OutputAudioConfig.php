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

class Google_Service_Dialogflow_GoogleCloudDialogflowV2OutputAudioConfig extends Google_Model
{
  public $audioEncoding;
  public $sampleRateHertz;
  protected $synthesizeSpeechConfigType = 'Google_Service_Dialogflow_GoogleCloudDialogflowV2SynthesizeSpeechConfig';
  protected $synthesizeSpeechConfigDataType = '';

  public function setAudioEncoding($audioEncoding)
  {
    $this->audioEncoding = $audioEncoding;
  }
  public function getAudioEncoding()
  {
    return $this->audioEncoding;
  }
  public function setSampleRateHertz($sampleRateHertz)
  {
    $this->sampleRateHertz = $sampleRateHertz;
  }
  public function getSampleRateHertz()
  {
    return $this->sampleRateHertz;
  }
  /**
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowV2SynthesizeSpeechConfig
   */
  public function setSynthesizeSpeechConfig(Google_Service_Dialogflow_GoogleCloudDialogflowV2SynthesizeSpeechConfig $synthesizeSpeechConfig)
  {
    $this->synthesizeSpeechConfig = $synthesizeSpeechConfig;
  }
  /**
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowV2SynthesizeSpeechConfig
   */
  public function getSynthesizeSpeechConfig()
  {
    return $this->synthesizeSpeechConfig;
  }
}
