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
 * The "endscreens" collection of methods.
 * Typical usage is:
 *  <code>
 *   $youtubeService = new Google_Service_YouTube(...);
 *   $endscreens = $youtubeService->endscreens;
 *  </code>
 */
class Google_Service_YouTube_Resource_Endscreens extends Google_Service_Resource
{
  /**
   * Retrieves endscreen for a given video. (endscreens.get)
   *
   * @param string $videoId Encrypted id of the video.
   * @param string|array $part The properties to return.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string onBehalfOfContentOwner Content owner of the video.
   * @return Google_Service_YouTube_EndscreenGetResponse
   */
  public function get($videoId, $part, $optParams = array())
  {
    $params = array('videoId' => $videoId, 'part' => $part);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_YouTube_EndscreenGetResponse");
  }
  /**
   * Updates endscreen for a given video. Note: * If the element id is not
   * provided, a new element will be created. * If the element id is provided,
   * that element will be updated. * Existing elements will be discarded if
   * they're not included in the request. (endscreens.update)
   *
   * @param string $videoId Encrypted id of the video this endscreen corresponds
   * to.
   * @param string|array $part The properties to return.
   * @param Google_Service_YouTube_Endscreen $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string onBehalfOfContentOwner Content owner of the video.
   * @return Google_Service_YouTube_Endscreen
   */
  public function update($videoId, $part, Google_Service_YouTube_Endscreen $postBody, $optParams = array())
  {
    $params = array('videoId' => $videoId, 'part' => $part, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_YouTube_Endscreen");
  }
}
