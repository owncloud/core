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
 *   $playablelocationsService = new Google_Service_PlayableLocations(...);
 *   $v3 = $playablelocationsService->v3;
 *  </code>
 */
class Google_Service_PlayableLocations_Resource_V3 extends Google_Service_Resource
{
  /**
   * Logs new events when playable locations are displayed, and when they are
   * interacted with.
   *
   * Impressions are not partially saved; either all impressions are saved and
   * this request succeeds, or no impressions are saved, and this request fails.
   * (v3.logImpressions)
   *
   * @param Google_Service_PlayableLocations_GoogleMapsPlayablelocationsV3LogImpressionsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_PlayableLocations_GoogleMapsPlayablelocationsV3LogImpressionsResponse
   */
  public function logImpressions(Google_Service_PlayableLocations_GoogleMapsPlayablelocationsV3LogImpressionsRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('logImpressions', array($params), "Google_Service_PlayableLocations_GoogleMapsPlayablelocationsV3LogImpressionsResponse");
  }
  /**
   * Logs bad playable location reports submitted by players.
   *
   * Reports are not partially saved; either all reports are saved and this
   * request succeeds, or no reports are saved, and this request fails.
   * (v3.logPlayerReports)
   *
   * @param Google_Service_PlayableLocations_GoogleMapsPlayablelocationsV3LogPlayerReportsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_PlayableLocations_GoogleMapsPlayablelocationsV3LogPlayerReportsResponse
   */
  public function logPlayerReports(Google_Service_PlayableLocations_GoogleMapsPlayablelocationsV3LogPlayerReportsRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('logPlayerReports', array($params), "Google_Service_PlayableLocations_GoogleMapsPlayablelocationsV3LogPlayerReportsResponse");
  }
  /**
   * Returns a set of playable locations that lie within a specified area, that
   * satisfy optional filter criteria.
   *
   * Note: Identical `SamplePlayableLocations` requests can return different
   * results as the state of the world changes over time.
   * (v3.samplePlayableLocations)
   *
   * @param Google_Service_PlayableLocations_GoogleMapsPlayablelocationsV3SamplePlayableLocationsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_PlayableLocations_GoogleMapsPlayablelocationsV3SamplePlayableLocationsResponse
   */
  public function samplePlayableLocations(Google_Service_PlayableLocations_GoogleMapsPlayablelocationsV3SamplePlayableLocationsRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('samplePlayableLocations', array($params), "Google_Service_PlayableLocations_GoogleMapsPlayablelocationsV3SamplePlayableLocationsResponse");
  }
}
