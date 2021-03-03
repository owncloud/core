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

class Google_Service_Dialogflow_GoogleCloudDialogflowCxV3FulfillIntentRequest extends Google_Model
{
  protected $matchType = 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3Match';
  protected $matchDataType = '';
  protected $matchIntentRequestType = 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3MatchIntentRequest';
  protected $matchIntentRequestDataType = '';
  protected $outputAudioConfigType = 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3OutputAudioConfig';
  protected $outputAudioConfigDataType = '';

  /**
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowCxV3Match
   */
  public function setMatch(Google_Service_Dialogflow_GoogleCloudDialogflowCxV3Match $match)
  {
    $this->match = $match;
  }
  /**
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowCxV3Match
   */
  public function getMatch()
  {
    return $this->match;
  }
  /**
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowCxV3MatchIntentRequest
   */
  public function setMatchIntentRequest(Google_Service_Dialogflow_GoogleCloudDialogflowCxV3MatchIntentRequest $matchIntentRequest)
  {
    $this->matchIntentRequest = $matchIntentRequest;
  }
  /**
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowCxV3MatchIntentRequest
   */
  public function getMatchIntentRequest()
  {
    return $this->matchIntentRequest;
  }
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
}
