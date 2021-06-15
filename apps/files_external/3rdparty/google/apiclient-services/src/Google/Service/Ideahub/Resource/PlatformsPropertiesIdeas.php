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
 * The "ideas" collection of methods.
 * Typical usage is:
 *  <code>
 *   $ideahubService = new Google_Service_Ideahub(...);
 *   $ideas = $ideahubService->ideas;
 *  </code>
 */
class Google_Service_Ideahub_Resource_PlatformsPropertiesIdeas extends Google_Service_Resource
{
  /**
   * List ideas for a given Creator and filter and sort options.
   * (ideas.listPlatformsPropertiesIdeas)
   *
   * @param string $parent If defined, specifies the creator for which to filter
   * by. Format: publishers/{publisher}/properties/{property}
   * @param array $optParams Optional parameters.
   *
   * @opt_param string creator.platform Identifies the platform from which this
   * user is accessing Idea Hub.
   * @opt_param string creator.platformId Identifies the platform account
   * (blog/site/etc.) for which to fetch Ideas.
   * @opt_param string filter Filter semantics described below.
   * @opt_param string orderBy Order semantics described below.
   * @opt_param int pageSize The maximum number of ideas per page. If unspecified,
   * at most 10 ideas will be returned. The maximum value is 2000; values above
   * 2000 will be coerced to 2000.
   * @opt_param string pageToken Used to fetch next page.
   * @return Google_Service_Ideahub_GoogleSearchIdeahubV1alphaListIdeasResponse
   */
  public function listPlatformsPropertiesIdeas($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Ideahub_GoogleSearchIdeahubV1alphaListIdeasResponse");
  }
}
