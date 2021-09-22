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

namespace Google\Service\FirebaseManagement\Resource;

use Google\Service\FirebaseManagement\ListAvailableLocationsResponse;

/**
 * The "availableLocations" collection of methods.
 * Typical usage is:
 *  <code>
 *   $firebaseService = new Google\Service\FirebaseManagement(...);
 *   $availableLocations = $firebaseService->availableLocations;
 *  </code>
 */
class ProjectsAvailableLocations extends \Google\Service\Resource
{
  /**
   * Lists the valid Google Cloud Platform (GCP) resource locations for the
   * specified Project (including a FirebaseProject). One of these locations can
   * be selected as the Project's [_default_ GCP resource
   * location](https://firebase.google.com/docs/projects/locations), which is the
   * geographical location where the Project's resources, such as Cloud Firestore,
   * will be provisioned by default. However, if the default GCP resource location
   * has already been set for the Project, then this setting cannot be changed.
   * This call checks for any possible [location
   * restrictions](https://cloud.google.com/resource-manager/docs/organization-
   * policy/defining-locations) for the specified Project and, thus, might return
   * a subset of all possible GCP resource locations. To list all GCP resource
   * locations (regardless of any restrictions), call the endpoint without
   * specifying a unique project identifier (that is,
   * `/v1beta1/{parent=projects/-}/listAvailableLocations`). To call
   * `ListAvailableLocations` with a specified project, a member must be at
   * minimum a Viewer of the Project. Calls without a specified project do not
   * require any specific project permissions.
   * (availableLocations.listProjectsAvailableLocations)
   *
   * @param string $parent The FirebaseProject for which to list GCP resource
   * locations, in the format: projects/PROJECT_IDENTIFIER Refer to the
   * `FirebaseProject` [`name`](../projects#FirebaseProject.FIELDS.name) field for
   * details about PROJECT_IDENTIFIER values. If no unique project identifier is
   * specified (that is, `projects/-`), the returned list does not take into
   * account org-specific or project-specific location restrictions.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of locations to return in the
   * response. The server may return fewer than this value at its discretion. If
   * no value is specified (or too large a value is specified), then the server
   * will impose its own limit. This value cannot be negative.
   * @opt_param string pageToken Token returned from a previous call to
   * `ListAvailableLocations` indicating where in the list of locations to resume
   * listing.
   * @return ListAvailableLocationsResponse
   */
  public function listProjectsAvailableLocations($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListAvailableLocationsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsAvailableLocations::class, 'Google_Service_FirebaseManagement_Resource_ProjectsAvailableLocations');
