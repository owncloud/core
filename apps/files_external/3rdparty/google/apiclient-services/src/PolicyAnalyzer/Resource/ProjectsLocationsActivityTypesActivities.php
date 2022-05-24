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

namespace Google\Service\PolicyAnalyzer\Resource;

use Google\Service\PolicyAnalyzer\GoogleCloudPolicyanalyzerV1QueryActivityResponse;

/**
 * The "activities" collection of methods.
 * Typical usage is:
 *  <code>
 *   $policyanalyzerService = new Google\Service\PolicyAnalyzer(...);
 *   $activities = $policyanalyzerService->activities;
 *  </code>
 */
class ProjectsLocationsActivityTypesActivities extends \Google\Service\Resource
{
  /**
   * Queries policy activities on Google Cloud resources. (activities.query)
   *
   * @param string $parent Required. The container resource on which to execute
   * the request. Acceptable formats: `projects/[PROJECT_ID|PROJECT_NUMBER]/locati
   * ons/[LOCATION]/activityTypes/[ACTIVITY_TYPE]` LOCATION here refers to Google
   * Cloud Locations: https://cloud.google.com/about/locations/
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Optional. Filter expression to restrict the
   * activities returned. For serviceAccountLastAuthentication activities,
   * supported filters are: - `activities.full_resource_name {=} [STRING]` -
   * `activities.fullResourceName {=} [STRING]` where `[STRING]` is the full
   * resource name of the service account. For serviceAccountKeyLastAuthentication
   * activities, supported filters are: - `activities.full_resource_name {=}
   * [STRING]` - `activities.fullResourceName {=} [STRING]` where `[STRING]` is
   * the full resource name of the service account key.
   * @opt_param int pageSize Optional. The maximum number of results to return
   * from this request. Max limit is 1000. Non-positive values are ignored. The
   * presence of `nextPageToken` in the response indicates that more results might
   * be available.
   * @opt_param string pageToken Optional. If present, then retrieve the next
   * batch of results from the preceding call to this method. `pageToken` must be
   * the value of `nextPageToken` from the previous response. The values of other
   * method parameters should be identical to those in the previous call.
   * @return GoogleCloudPolicyanalyzerV1QueryActivityResponse
   */
  public function query($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('query', [$params], GoogleCloudPolicyanalyzerV1QueryActivityResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsActivityTypesActivities::class, 'Google_Service_PolicyAnalyzer_Resource_ProjectsLocationsActivityTypesActivities');
