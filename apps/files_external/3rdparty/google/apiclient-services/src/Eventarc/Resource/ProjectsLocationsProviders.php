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

namespace Google\Service\Eventarc\Resource;

use Google\Service\Eventarc\ListProvidersResponse;
use Google\Service\Eventarc\Provider;

/**
 * The "providers" collection of methods.
 * Typical usage is:
 *  <code>
 *   $eventarcService = new Google\Service\Eventarc(...);
 *   $providers = $eventarcService->providers;
 *  </code>
 */
class ProjectsLocationsProviders extends \Google\Service\Resource
{
  /**
   * Get a single Provider. (providers.get)
   *
   * @param string $name Required. The name of the provider to get.
   * @param array $optParams Optional parameters.
   * @return Provider
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Provider::class);
  }
  /**
   * List providers. (providers.listProjectsLocationsProviders)
   *
   * @param string $parent Required. The parent of the provider to get.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter The filter field that the list request will filter
   * on.
   * @opt_param string orderBy The sorting order of the resources returned. Value
   * should be a comma-separated list of fields. The default sorting oder is
   * ascending. To specify descending order for a field, append a `desc` suffix;
   * for example: `name desc, _id`.
   * @opt_param int pageSize The maximum number of providers to return on each
   * page.
   * @opt_param string pageToken The page token; provide the value from the
   * `next_page_token` field in a previous `ListProviders` call to retrieve the
   * subsequent page. When paginating, all other parameters provided to
   * `ListProviders` must match the call that provided the page token.
   * @return ListProvidersResponse
   */
  public function listProjectsLocationsProviders($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListProvidersResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsProviders::class, 'Google_Service_Eventarc_Resource_ProjectsLocationsProviders');
