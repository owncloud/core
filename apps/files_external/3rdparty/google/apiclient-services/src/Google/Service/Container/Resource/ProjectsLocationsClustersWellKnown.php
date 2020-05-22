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
 * The "well-known" collection of methods.
 * Typical usage is:
 *  <code>
 *   $containerService = new Google_Service_Container(...);
 *   $well_known = $containerService->well_known;
 *  </code>
 */
class Google_Service_Container_Resource_ProjectsLocationsClustersWellKnown extends Google_Service_Resource
{
  /**
   * Gets the OIDC discovery document for the cluster. See the [OpenID Connect
   * Discovery 1.0 specification](https://openid.net/specs/openid-connect-
   * discovery-1_0.html) for details. This API is not yet intended for general
   * use, and is not available for all clusters. (well-
   * known.getOpenidConfiguration)
   *
   * @param string $parent The cluster (project, location, cluster id) to get the
   * discovery document for. Specified in the format
   * 'projects/locations/clusters'.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Container_GetOpenIDConfigResponse
   */
  public function getOpenidConfiguration($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('getOpenid-configuration', array($params), "Google_Service_Container_GetOpenIDConfigResponse");
  }
}
