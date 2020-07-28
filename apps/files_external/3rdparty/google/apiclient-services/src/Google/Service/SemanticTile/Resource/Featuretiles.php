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
 * The "featuretiles" collection of methods.
 * Typical usage is:
 *  <code>
 *   $vectortileService = new Google_Service_SemanticTile(...);
 *   $featuretiles = $vectortileService->featuretiles;
 *  </code>
 */
class Google_Service_SemanticTile_Resource_Featuretiles extends Google_Service_Resource
{
  /**
   * Gets a feature tile by its tile resource name. (featuretiles.get)
   *
   * @param string $name Required. Resource name of the tile. The tile resource
   * name is prefixed by its collection ID `tiles/` followed by the resource ID,
   * which encodes the tile's global x and y coordinates and zoom level as `@,,z`.
   * For example, `tiles/@1,2,3z`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool enablePrivateRoads Flag indicating whether the returned tile
   * will contain road features that are marked private. Private roads are
   * indicated by the Feature.segment_info.road_info.is_private field.
   * @opt_param bool enableDetailedHighwayTypes Flag indicating whether detailed
   * highway types should be returned. If this is set, the
   * CONTROLLED_ACCESS_HIGHWAY type may be returned. If not, then these highways
   * will have the generic HIGHWAY type.
   *
   * This exists for backwards compatibility reasons.
   * @opt_param string clientInfo.applicationVersion Application version number,
   * such as "1.2.3". The exact format is application-dependent.
   * @opt_param string clientInfo.operatingSystem Operating system name and
   * version as reported by the OS. For example, "Mac OS X 10.10.4". The exact
   * format is platform-dependent.
   * @opt_param string clientInfo.applicationId Application ID, such as the
   * package name on Android and the bundle identifier on iOS platforms.
   * @opt_param string clientInfo.deviceModel Device model as reported by the
   * device. The exact format is platform-dependent.
   * @opt_param string clientTileVersionId Optional version id identifying the
   * tile that is already in the client's cache. This field should be populated
   * with the most recent version_id value returned by the API for the requested
   * tile.
   *
   * If the version id is empty the server always returns a newly rendered tile.
   * If it is provided the server checks if the tile contents would be identical
   * to one that's already on the client, and if so, returns a stripped-down
   * response tile with STATUS_OK_DATA_UNCHANGED instead.
   * @opt_param string clientInfo.platform Platform where the application is
   * running.
   * @opt_param bool enableFeatureNames Flag indicating whether human-readable
   * names should be returned for features. If this is set, the display_name field
   * on the feature will be filled out.
   * @opt_param bool enableUnclippedBuildings Flag indicating whether unclipped
   * buildings should be returned. If this is set, building render ops will extend
   * beyond the tile boundary. Buildings will only be returned on the tile that
   * contains their centroid.
   * @opt_param string clientInfo.userId A client-generated user ID. The ID should
   * be generated and persisted during the first user session or whenever a pre-
   * existing ID is not found. The exact format is up to the client. This must be
   * non-empty in a GetFeatureTileRequest (whether via the header or
   * GetFeatureTileRequest.client_info).
   * @opt_param string languageCode Required. The BCP-47 language code
   * corresponding to the language in which the name was requested, such as "en-
   * US" or "sr-Latn".
   *
   * For more information, see
   * http://www.unicode.org/reports/tr35/#Unicode_locale_identifier.
   * @opt_param bool enablePoliticalFeatures Flag indicating whether political
   * features should be returned.
   * @opt_param string clientInfo.apiClient API client name and version. For
   * example, the SDK calling the API. The exact format is up to the client.
   * @opt_param bool enableModeledVolumes Flag indicating whether 3D building
   * models should be enabled. If this is set structures will be returned as 3D
   * modeled volumes rather than 2.5D extruded areas where possible.
   * @opt_param string regionCode Required. The Unicode country/region code (CLDR)
   * of the location from which the request is coming from, such as "US" and
   * "419".
   *
   * For more information, see
   * http://www.unicode.org/reports/tr35/#unicode_region_subtag.
   * @return Google_Service_SemanticTile_FeatureTile
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_SemanticTile_FeatureTile");
  }
}
