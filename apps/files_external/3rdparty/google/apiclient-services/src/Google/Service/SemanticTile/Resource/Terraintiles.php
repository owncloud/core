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
 * The "terraintiles" collection of methods.
 * Typical usage is:
 *  <code>
 *   $vectortileService = new Google_Service_SemanticTile(...);
 *   $terraintiles = $vectortileService->terraintiles;
 *  </code>
 */
class Google_Service_SemanticTile_Resource_Terraintiles extends Google_Service_Resource
{
  /**
   * Gets a terrain tile by its tile resource name. (terraintiles.get)
   *
   * @param string $name Required. Resource name of the tile. The tile resource
   * name is prefixed by its collection ID `terraintiles/` followed by the
   * resource ID, which encodes the tile's global x and y coordinates and zoom
   * level as `@,,z`. For example, `terraintiles/@1,2,3z`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string clientInfo.applicationVersion Application version number,
   * such as "1.2.3". The exact format is application-dependent.
   * @opt_param int minElevationResolutionCells The minimum allowed resolution for
   * the returned elevation heightmap. Possible values: between 0 and 1024 (and
   * not more than max_elevation_resolution_cells). Zero is supported for backward
   * compatibility. Under-sized heightmaps will be non-uniformly up-sampled such
   * that each edge is no shorter than this value. Non-uniformity is chosen to
   * maximise the amount of preserved data. For example: Original resolution: 30px
   * (width) * 10px (height) min_elevation_resolution: 30 New resolution: 30px
   * (width) * 30px (height)
   * @opt_param string clientInfo.platform Platform where the application is
   * running.
   * @opt_param string clientInfo.deviceModel Device model as reported by the
   * device. The exact format is platform-dependent.
   * @opt_param string clientInfo.applicationId Application ID, such as the
   * package name on Android and the bundle identifier on iOS platforms.
   * @opt_param string terrainFormats Terrain formats that the client understands.
   * @opt_param string clientInfo.operatingSystem Operating system name and
   * version as reported by the OS. For example, "Mac OS X 10.10.4". The exact
   * format is platform-dependent.
   * @opt_param string clientInfo.apiClient API client name and version. For
   * example, the SDK calling the API. The exact format is up to the client.
   * @opt_param string clientInfo.userId Required. A client-generated user ID. The
   * ID should be generated and persisted during the first user session or
   * whenever a pre-existing ID is not found. The exact format is up to the
   * client. This must be non-empty in a GetFeatureTileRequest (whether via the
   * header or GetFeatureTileRequest.client_info).
   * @opt_param int maxElevationResolutionCells The maximum allowed resolution for
   * the returned elevation heightmap. Possible values: between 1 and 1024 (and
   * not less than min_elevation_resolution_cells). Over-sized heightmaps will be
   * non-uniformly down-sampled such that each edge is no longer than this value.
   * Non-uniformity is chosen to maximise the amount of preserved data. For
   * example: Original resolution: 100px (width) * 30px (height)
   * max_elevation_resolution: 30 New resolution: 30px (width) * 30px (height)
   * @opt_param int altitudePrecisionCentimeters The precision of terrain
   * altitudes in centimeters. Possible values: between 1 (cm level precision) and
   * 1,000,000 (10-kilometer level precision).
   * @return Google_Service_SemanticTile_TerrainTile
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_SemanticTile_TerrainTile");
  }
}
