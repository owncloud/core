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

class Google_Service_Dialogflow_GoogleCloudDialogflowCxV3TransitionCoverageTransition extends Google_Model
{
  public $covered;
  protected $eventHandlerType = 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3EventHandler';
  protected $eventHandlerDataType = '';
  public $index;
  protected $sourceType = 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3TransitionCoverageTransitionNode';
  protected $sourceDataType = '';
  protected $targetType = 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3TransitionCoverageTransitionNode';
  protected $targetDataType = '';
  protected $transitionRouteType = 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3TransitionRoute';
  protected $transitionRouteDataType = '';

  public function setCovered($covered)
  {
    $this->covered = $covered;
  }
  public function getCovered()
  {
    return $this->covered;
  }
  /**
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowCxV3EventHandler
   */
  public function setEventHandler(Google_Service_Dialogflow_GoogleCloudDialogflowCxV3EventHandler $eventHandler)
  {
    $this->eventHandler = $eventHandler;
  }
  /**
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowCxV3EventHandler
   */
  public function getEventHandler()
  {
    return $this->eventHandler;
  }
  public function setIndex($index)
  {
    $this->index = $index;
  }
  public function getIndex()
  {
    return $this->index;
  }
  /**
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowCxV3TransitionCoverageTransitionNode
   */
  public function setSource(Google_Service_Dialogflow_GoogleCloudDialogflowCxV3TransitionCoverageTransitionNode $source)
  {
    $this->source = $source;
  }
  /**
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowCxV3TransitionCoverageTransitionNode
   */
  public function getSource()
  {
    return $this->source;
  }
  /**
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowCxV3TransitionCoverageTransitionNode
   */
  public function setTarget(Google_Service_Dialogflow_GoogleCloudDialogflowCxV3TransitionCoverageTransitionNode $target)
  {
    $this->target = $target;
  }
  /**
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowCxV3TransitionCoverageTransitionNode
   */
  public function getTarget()
  {
    return $this->target;
  }
  /**
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowCxV3TransitionRoute
   */
  public function setTransitionRoute(Google_Service_Dialogflow_GoogleCloudDialogflowCxV3TransitionRoute $transitionRoute)
  {
    $this->transitionRoute = $transitionRoute;
  }
  /**
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowCxV3TransitionRoute
   */
  public function getTransitionRoute()
  {
    return $this->transitionRoute;
  }
}
