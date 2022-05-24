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

class GoogleCloudDialogflowCxV3TransitionRouteGroupCoverageCoverage extends \Google\Collection
{
  protected $collection_key = 'transitions';
  /**
   * @var float
   */
  public $coverageScore;
  protected $routeGroupType = GoogleCloudDialogflowCxV3TransitionRouteGroup::class;
  protected $routeGroupDataType = '';
  protected $transitionsType = GoogleCloudDialogflowCxV3TransitionRouteGroupCoverageCoverageTransition::class;
  protected $transitionsDataType = 'array';

  /**
   * @param float
   */
  public function setCoverageScore($coverageScore)
  {
    $this->coverageScore = $coverageScore;
  }
  /**
   * @return float
   */
  public function getCoverageScore()
  {
    return $this->coverageScore;
  }
  /**
   * @param GoogleCloudDialogflowCxV3TransitionRouteGroup
   */
  public function setRouteGroup(GoogleCloudDialogflowCxV3TransitionRouteGroup $routeGroup)
  {
    $this->routeGroup = $routeGroup;
  }
  /**
   * @return GoogleCloudDialogflowCxV3TransitionRouteGroup
   */
  public function getRouteGroup()
  {
    return $this->routeGroup;
  }
  /**
   * @param GoogleCloudDialogflowCxV3TransitionRouteGroupCoverageCoverageTransition[]
   */
  public function setTransitions($transitions)
  {
    $this->transitions = $transitions;
  }
  /**
   * @return GoogleCloudDialogflowCxV3TransitionRouteGroupCoverageCoverageTransition[]
   */
  public function getTransitions()
  {
    return $this->transitions;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDialogflowCxV3TransitionRouteGroupCoverageCoverage::class, 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3TransitionRouteGroupCoverageCoverage');
