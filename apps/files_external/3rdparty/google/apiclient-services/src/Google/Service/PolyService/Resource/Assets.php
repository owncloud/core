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
 * The "assets" collection of methods.
 * Typical usage is:
 *  <code>
 *   $polyService = new Google_Service_PolyService(...);
 *   $assets = $polyService->assets;
 *  </code>
 */
class Google_Service_PolyService_Resource_Assets extends Google_Service_Resource
{
  /**
   * Returns detailed information about an asset given its name. PRIVATE assets
   * are returned only if  the currently authenticated user (via OAuth token) is
   * the author of the  asset. (assets.get)
   *
   * @param string $name Required. An asset's name in the form
   * `assets/{ASSET_ID}`.
   * @param array $optParams Optional parameters.
   * @return Google_Service_PolyService_Asset
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_PolyService_Asset");
  }
  /**
   * Lists all public, remixable assets. These are assets with an access level of
   * PUBLIC and published under the CC-By license. (assets.listAssets)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string maxComplexity Returns assets that are of the specified
   * complexity or less. Defaults to COMPLEX. For example, a request for MEDIUM
   * assets also includes SIMPLE assets.
   * @opt_param string pageToken Specifies a continuation token from a previous
   * search whose results were split into multiple pages. To get the next page,
   * submit the same request specifying the value from next_page_token.
   * @opt_param int pageSize The maximum number of assets to be returned. This
   * value must be between `1` and `100`. Defaults to `20`.
   * @opt_param string keywords One or more search terms to be matched against all
   * text that Poly has indexed for assets, which includes display_name,
   * description, and tags. Multiple keywords should be separated by spaces.
   * @opt_param string orderBy Specifies an ordering for assets. Acceptable values
   * are: `BEST`, `NEWEST`, `OLDEST`. Defaults to `BEST`, which ranks assets based
   * on a combination of popularity and other features.
   * @opt_param string format Return only assets with the matching format.
   * Acceptable values are: `BLOCKS`, `FBX`, `GLTF`, `GLTF2`, `OBJ`, `TILT`.
   * @opt_param bool curated Return only assets that have been curated by the Poly
   * team.
   * @opt_param string category Filter assets based on the specified category.
   * Supported values are: `animals`, `architecture`, `art`, `food`, `nature`,
   * `objects`, `people`, `scenes`, `technology`, and `transport`.
   * @return Google_Service_PolyService_ListAssetsResponse
   */
  public function listAssets($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_PolyService_ListAssetsResponse");
  }
}
