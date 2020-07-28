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
 * The "v3" collection of methods.
 * Typical usage is:
 *  <code>
 *   $youtubeService = new Google_Service_YouTube(...);
 *   $v3 = $youtubeService->v3;
 *  </code>
 */
class Google_Service_YouTube_Resource_YoutubeV3 extends Google_Service_Resource
{
  /**
   * Updates infocards for a given video. Note: * If the card id is not provided,
   * a new card will be created. * If the card id is provided, that card will be
   * updated. * Existing cards will be discarded if they're not included in the
   * request. (v3.infocards)
   *
   * @param string|array $part The properties to update.
   * @param Google_Service_YouTube_InfoCards $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string onBehalfOfContentOwner Content owner of the video.
   * @opt_param string videoId Encrypted id of the video.
   * @return Google_Service_YouTube_InfoCards
   */
  public function infocards($part, Google_Service_YouTube_InfoCards $postBody, $optParams = array())
  {
    $params = array('part' => $part, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('infocards', array($params), "Google_Service_YouTube_InfoCards");
  }
}
