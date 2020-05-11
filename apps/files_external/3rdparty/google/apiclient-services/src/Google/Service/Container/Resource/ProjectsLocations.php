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
 * The "locations" collection of methods.
 * Typical usage is:
 *  <code>
 *   $containerService = new Google_Service_Container(...);
 *   $locations = $containerService->locations;
 *  </code>
 */
class Google_Service_Container_Resource_ProjectsLocations extends Google_Service_Resource
{
  /**
   * Returns configuration info about the Google Kubernetes Engine service.
   * (locations.getServerConfig)
   *
   * @param string $name The name (project and location) of the server config to
   * get, specified in the format 'projects/locations'.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string projectId Deprecated. The Google Developers Console
   * [project ID or project
   * number](https://support.google.com/cloud/answer/6158840). This field has been
   * deprecated and replaced by the name field.
   * @opt_param string zone Deprecated. The name of the Google Compute Engine
   * [zone](/compute/docs/zones#available) to return operations for. This field
   * has been deprecated and replaced by the name field.
   * @return Google_Service_Container_ServerConfig
   */
  public function getServerConfig($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('getServerConfig', array($params), "Google_Service_Container_ServerConfig");
  }
}
