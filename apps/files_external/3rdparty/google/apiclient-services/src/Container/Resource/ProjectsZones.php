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

namespace Google\Service\Container\Resource;

use Google\Service\Container\ServerConfig;

/**
 * The "zones" collection of methods.
 * Typical usage is:
 *  <code>
 *   $containerService = new Google\Service\Container(...);
 *   $zones = $containerService->zones;
 *  </code>
 */
class ProjectsZones extends \Google\Service\Resource
{
  /**
   * Returns configuration info about the Google Kubernetes Engine service.
   * (zones.getServerconfig)
   *
   * @param string $projectId Deprecated. The Google Developers Console [project
   * ID or project number](https://cloud.google.com/resource-manager/docs
   * /creating-managing-projects). This field has been deprecated and replaced by
   * the name field.
   * @param string $zone Deprecated. The name of the Google Compute Engine
   * [zone](https://cloud.google.com/compute/docs/zones#available) to return
   * operations for. This field has been deprecated and replaced by the name
   * field.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string name The name (project and location) of the server config
   * to get, specified in the format `projects/locations`.
   * @return ServerConfig
   */
  public function getServerconfig($projectId, $zone, $optParams = [])
  {
    $params = ['projectId' => $projectId, 'zone' => $zone];
    $params = array_merge($params, $optParams);
    return $this->call('getServerconfig', [$params], ServerConfig::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsZones::class, 'Google_Service_Container_Resource_ProjectsZones');
