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

class Google_Service_Dialogflow_GoogleCloudDialogflowV2DetectIntentRequest extends Google_Model
{
  public $inputAudio;
  protected $outputAudioConfigType = 'Google_Service_Dialogflow_GoogleCloudDialogflowV2OutputAudioConfig';
  protected $outputAudioConfigDataType = '';
  public $outputAudioConfigMask;
  protected $queryInputType = 'Google_Service_Dialogflow_GoogleCloudDialogflowV2QueryInput';
  protected $queryInputDataType = '';
  protected $queryParamsType = 'Google_Service_Dialogflow_GoogleCloudDialogflowV2QueryParameters';
  protected $queryParamsDataType = '';

  public function setInputAudio($inputAudio)
  {
    $this->inputAudio = $inputAudio;
  }
  public function getInputAudio()
  {
    return $this->inputAudio;
  }
  /**
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowV2OutputAudioConfig
   */
  public function setOutputAudioConfig(Google_Service_Dialogflow_GoogleCloudDialogflowV2OutputAudioConfig $outputAudioConfig)
  {
    $this->outputAudioConfig = $outputAudioConfig;
  }
  /**
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowV2OutputAudioConfig
   */
  public function getOutputAudioConfig()
  {
    return $this->outputAudioConfig;
  }
  public function setOutputAudioConfigMask($outputAudioConfigMask)
  {
    $this->outputAudioConfigMask = $outputAudioConfigMask;
  }
  public function getOutputAudioConfigMask()
  {
    return $this->outputAudioConfigMask;
  }
  /**
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowV2QueryInput
   */
  public function setQueryInput(Google_Service_Dialogflow_GoogleCloudDialogflowV2QueryInput $queryInput)
  {
    $this->queryInput = $queryInput;
  }
  /**
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowV2QueryInput
   */
  public function getQueryInput()
  {
    return $this->queryInput;
  }
  /**
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowV2QueryParameters
   */
  public function setQueryParams(Google_Service_Dialogflow_GoogleCloudDialogflowV2QueryParameters $queryParams)
  {
    $this->queryParams = $queryParams;
  }
  /**
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowV2QueryParameters
   */
  public function getQueryParams()
  {
    return $this->queryParams;
  }
}
