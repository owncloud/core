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

namespace Google\Service\Ideahub\Resource;

use Google\Service\Ideahub\GoogleSearchIdeahubV1betaIdeaActivity;

/**
 * The "ideaActivities" collection of methods.
 * Typical usage is:
 *  <code>
 *   $ideahubService = new Google\Service\Ideahub(...);
 *   $ideaActivities = $ideahubService->ideaActivities;
 *  </code>
 */
class PlatformsPropertiesIdeaActivities extends \Google\Service\Resource
{
  /**
   * Creates an idea activity entry. (ideaActivities.create)
   *
   * @param string $parent Required. The parent resource where this idea activity
   * will be created. Format: platforms/{platform}/property/{property}
   * @param GoogleSearchIdeahubV1betaIdeaActivity $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleSearchIdeahubV1betaIdeaActivity
   */
  public function create($parent, GoogleSearchIdeahubV1betaIdeaActivity $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], GoogleSearchIdeahubV1betaIdeaActivity::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PlatformsPropertiesIdeaActivities::class, 'Google_Service_Ideahub_Resource_PlatformsPropertiesIdeaActivities');
