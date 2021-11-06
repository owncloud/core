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

class GoogleCloudDialogflowCxV3FulfillIntentRequest extends \Google\Model
{
  protected $matchType = GoogleCloudDialogflowCxV3Match::class;
  protected $matchDataType = '';
  protected $matchIntentRequestType = GoogleCloudDialogflowCxV3MatchIntentRequest::class;
  protected $matchIntentRequestDataType = '';
  protected $outputAudioConfigType = GoogleCloudDialogflowCxV3OutputAudioConfig::class;
  protected $outputAudioConfigDataType = '';

  /**
   * @param GoogleCloudDialogflowCxV3Match
   */
  public function setMatch(GoogleCloudDialogflowCxV3Match $match)
  {
    $this->match = $match;
  }
  /**
   * @return GoogleCloudDialogflowCxV3Match
   */
  public function getMatch()
  {
    return $this->match;
  }
  /**
   * @param GoogleCloudDialogflowCxV3MatchIntentRequest
   */
  public function setMatchIntentRequest(GoogleCloudDialogflowCxV3MatchIntentRequest $matchIntentRequest)
  {
    $this->matchIntentRequest = $matchIntentRequest;
  }
  /**
   * @return GoogleCloudDialogflowCxV3MatchIntentRequest
   */
  public function getMatchIntentRequest()
  {
    return $this->matchIntentRequest;
  }
  /**
   * @param GoogleCloudDialogflowCxV3OutputAudioConfig
   */
  public function setOutputAudioConfig(GoogleCloudDialogflowCxV3OutputAudioConfig $outputAudioConfig)
  {
    $this->outputAudioConfig = $outputAudioConfig;
  }
  /**
   * @return GoogleCloudDialogflowCxV3OutputAudioConfig
   */
  public function getOutputAudioConfig()
  {
    return $this->outputAudioConfig;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDialogflowCxV3FulfillIntentRequest::class, 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3FulfillIntentRequest');
