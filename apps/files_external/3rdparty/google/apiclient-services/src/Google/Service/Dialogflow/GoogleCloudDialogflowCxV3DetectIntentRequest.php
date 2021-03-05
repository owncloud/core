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

class Google_Service_Dialogflow_GoogleCloudDialogflowCxV3DetectIntentRequest extends Google_Model
{
  protected $outputAudioConfigType = 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3OutputAudioConfig';
  protected $outputAudioConfigDataType = '';
  protected $queryInputType = 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3QueryInput';
  protected $queryInputDataType = '';
  protected $queryParamsType = 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3QueryParameters';
  protected $queryParamsDataType = '';

  /**
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowCxV3OutputAudioConfig
   */
  public function setOutputAudioConfig(Google_Service_Dialogflow_GoogleCloudDialogflowCxV3OutputAudioConfig $outputAudioConfig)
  {
    $this->outputAudioConfig = $outputAudioConfig;
  }
  /**
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowCxV3OutputAudioConfig
   */
  public function getOutputAudioConfig()
  {
    return $this->outputAudioConfig;
  }
  /**
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowCxV3QueryInput
   */
  public function setQueryInput(Google_Service_Dialogflow_GoogleCloudDialogflowCxV3QueryInput $queryInput)
  {
    $this->queryInput = $queryInput;
  }
  /**
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowCxV3QueryInput
   */
  public function getQueryInput()
  {
    return $this->queryInput;
  }
  /**
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowCxV3QueryParameters
   */
  public function setQueryParams(Google_Service_Dialogflow_GoogleCloudDialogflowCxV3QueryParameters $queryParams)
  {
    $this->queryParams = $queryParams;
  }
  /**
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowCxV3QueryParameters
   */
  public function getQueryParams()
  {
    return $this->queryParams;
  }
}
