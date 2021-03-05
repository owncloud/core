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

class Google_Service_Dialogflow_GoogleCloudDialogflowCxV3Match extends Google_Model
{
  public $confidence;
  public $event;
  protected $intentType = 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3Intent';
  protected $intentDataType = '';
  public $matchType;
  public $parameters;
  public $resolvedInput;

  public function setConfidence($confidence)
  {
    $this->confidence = $confidence;
  }
  public function getConfidence()
  {
    return $this->confidence;
  }
  public function setEvent($event)
  {
    $this->event = $event;
  }
  public function getEvent()
  {
    return $this->event;
  }
  /**
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowCxV3Intent
   */
  public function setIntent(Google_Service_Dialogflow_GoogleCloudDialogflowCxV3Intent $intent)
  {
    $this->intent = $intent;
  }
  /**
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowCxV3Intent
   */
  public function getIntent()
  {
    return $this->intent;
  }
  public function setMatchType($matchType)
  {
    $this->matchType = $matchType;
  }
  public function getMatchType()
  {
    return $this->matchType;
  }
  public function setParameters($parameters)
  {
    $this->parameters = $parameters;
  }
  public function getParameters()
  {
    return $this->parameters;
  }
  public function setResolvedInput($resolvedInput)
  {
    $this->resolvedInput = $resolvedInput;
  }
  public function getResolvedInput()
  {
    return $this->resolvedInput;
  }
}
