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
 * The "hashes" collection of methods.
 * Typical usage is:
 *  <code>
 *   $webriskService = new Google_Service_WebRisk(...);
 *   $hashes = $webriskService->hashes;
 *  </code>
 */
class Google_Service_WebRisk_Resource_Hashes extends Google_Service_Resource
{
  /**
   * Gets the full hashes that match the requested hash prefix. This is used after
   * a hash prefix is looked up in a threatList and there is a match. The client
   * side threatList only holds partial hashes so the client must query this
   * method to determine if there is a full hash match of a threat.
   * (hashes.search)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string hashPrefix A hash prefix, consisting of the most
   * significant 4-32 bytes of a SHA256 hash. For JSON requests, this field is
   * base64-encoded. Note that if this parameter is provided by a URI, it must be
   * encoded using the web safe base64 variant (RFC 4648).
   * @opt_param string threatTypes Required. The ThreatLists to search in.
   * Multiple ThreatLists may be specified.
   * @return Google_Service_WebRisk_GoogleCloudWebriskV1SearchHashesResponse
   */
  public function search($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('search', array($params), "Google_Service_WebRisk_GoogleCloudWebriskV1SearchHashesResponse");
  }
}
