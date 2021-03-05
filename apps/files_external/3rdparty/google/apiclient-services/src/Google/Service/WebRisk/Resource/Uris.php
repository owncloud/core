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
 * The "uris" collection of methods.
 * Typical usage is:
 *  <code>
 *   $webriskService = new Google_Service_WebRisk(...);
 *   $uris = $webriskService->uris;
 *  </code>
 */
class Google_Service_WebRisk_Resource_Uris extends Google_Service_Resource
{
  /**
   * This method is used to check whether a URI is on a given threatList. Multiple
   * threatLists may be searched in a single query. The response will list all
   * requested threatLists the URI was found to match. If the URI is not found on
   * any of the requested ThreatList an empty response will be returned.
   * (uris.search)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string threatTypes Required. The ThreatLists to search in.
   * Multiple ThreatLists may be specified.
   * @opt_param string uri Required. The URI to be checked for matches.
   * @return Google_Service_WebRisk_GoogleCloudWebriskV1SearchUrisResponse
   */
  public function search($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('search', array($params), "Google_Service_WebRisk_GoogleCloudWebriskV1SearchUrisResponse");
  }
}
