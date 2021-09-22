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

class GoogleCloudDialogflowCxV3TransitionCoverageTransition extends \Google\Model
{
  public $covered;
  protected $eventHandlerType = GoogleCloudDialogflowCxV3EventHandler::class;
  protected $eventHandlerDataType = '';
  public $index;
  protected $sourceType = GoogleCloudDialogflowCxV3TransitionCoverageTransitionNode::class;
  protected $sourceDataType = '';
  protected $targetType = GoogleCloudDialogflowCxV3TransitionCoverageTransitionNode::class;
  protected $targetDataType = '';
  protected $transitionRouteType = GoogleCloudDialogflowCxV3TransitionRoute::class;
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
   * @param GoogleCloudDialogflowCxV3EventHandler
   */
  public function setEventHandler(GoogleCloudDialogflowCxV3EventHandler $eventHandler)
  {
    $this->eventHandler = $eventHandler;
  }
  /**
   * @return GoogleCloudDialogflowCxV3EventHandler
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
   * @param GoogleCloudDialogflowCxV3TransitionCoverageTransitionNode
   */
  public function setSource(GoogleCloudDialogflowCxV3TransitionCoverageTransitionNode $source)
  {
    $this->source = $source;
  }
  /**
   * @return GoogleCloudDialogflowCxV3TransitionCoverageTransitionNode
   */
  public function getSource()
  {
    return $this->source;
  }
  /**
   * @param GoogleCloudDialogflowCxV3TransitionCoverageTransitionNode
   */
  public function setTarget(GoogleCloudDialogflowCxV3TransitionCoverageTransitionNode $target)
  {
    $this->target = $target;
  }
  /**
   * @return GoogleCloudDialogflowCxV3TransitionCoverageTransitionNode
   */
  public function getTarget()
  {
    return $this->target;
  }
  /**
   * @param GoogleCloudDialogflowCxV3TransitionRoute
   */
  public function setTransitionRoute(GoogleCloudDialogflowCxV3TransitionRoute $transitionRoute)
  {
    $this->transitionRoute = $transitionRoute;
  }
  /**
   * @return GoogleCloudDialogflowCxV3TransitionRoute
   */
  public function getTransitionRoute()
  {
    return $this->transitionRoute;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDialogflowCxV3TransitionCoverageTransition::class, 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3TransitionCoverageTransition');
