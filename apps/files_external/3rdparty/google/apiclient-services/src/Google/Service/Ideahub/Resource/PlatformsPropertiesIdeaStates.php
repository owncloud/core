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

/**
 * The "ideaStates" collection of methods.
 * Typical usage is:
 *  <code>
 *   $ideahubService = new Google_Service_Ideahub(...);
 *   $ideaStates = $ideahubService->ideaStates;
 *  </code>
 */
class Google_Service_Ideahub_Resource_PlatformsPropertiesIdeaStates extends Google_Service_Resource
{
  /**
   * Update an idea state resource. (ideaStates.patch)
   *
   * @param string $name Unique identifier for the idea state. Format:
   * platforms/{platform}/properties/{property}/ideaStates/{idea_state}
   * @param Google_Service_Ideahub_GoogleSearchIdeahubV1alphaIdeaState $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask The list of fields to be updated.
   * @return Google_Service_Ideahub_GoogleSearchIdeahubV1alphaIdeaState
   */
  public function patch($name, Google_Service_Ideahub_GoogleSearchIdeahubV1alphaIdeaState $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_Ideahub_GoogleSearchIdeahubV1alphaIdeaState");
  }
}
