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

class Google_Service_Dialogflow_GoogleCloudDialogflowCxV3CalculateCoverageResponse extends Google_Model
{
  public $agent;
  protected $intentCoverageType = 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3IntentCoverage';
  protected $intentCoverageDataType = '';
  protected $routeGroupCoverageType = 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3TransitionRouteGroupCoverage';
  protected $routeGroupCoverageDataType = '';
  protected $transitionCoverageType = 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3TransitionCoverage';
  protected $transitionCoverageDataType = '';

  public function setAgent($agent)
  {
    $this->agent = $agent;
  }
  public function getAgent()
  {
    return $this->agent;
  }
  /**
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowCxV3IntentCoverage
   */
  public function setIntentCoverage(Google_Service_Dialogflow_GoogleCloudDialogflowCxV3IntentCoverage $intentCoverage)
  {
    $this->intentCoverage = $intentCoverage;
  }
  /**
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowCxV3IntentCoverage
   */
  public function getIntentCoverage()
  {
    return $this->intentCoverage;
  }
  /**
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowCxV3TransitionRouteGroupCoverage
   */
  public function setRouteGroupCoverage(Google_Service_Dialogflow_GoogleCloudDialogflowCxV3TransitionRouteGroupCoverage $routeGroupCoverage)
  {
    $this->routeGroupCoverage = $routeGroupCoverage;
  }
  /**
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowCxV3TransitionRouteGroupCoverage
   */
  public function getRouteGroupCoverage()
  {
    return $this->routeGroupCoverage;
  }
  /**
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowCxV3TransitionCoverage
   */
  public function setTransitionCoverage(Google_Service_Dialogflow_GoogleCloudDialogflowCxV3TransitionCoverage $transitionCoverage)
  {
    $this->transitionCoverage = $transitionCoverage;
  }
  /**
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowCxV3TransitionCoverage
   */
  public function getTransitionCoverage()
  {
    return $this->transitionCoverage;
  }
}
