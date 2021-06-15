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
 *   $cloudassetService = new Google_Service_CloudAsset(...);
 *   $assets = $cloudassetService->assets;
 *  </code>
 */
class Google_Service_CloudAsset_Resource_Assets extends Google_Service_Resource
{
  /**
   * Lists assets with time and resource types and returns paged results in
   * response. (assets.listAssets)
   *
   * @param string $parent Required. Name of the organization or project the
   * assets belong to. Format: "organizations/[organization-number]" (such as
   * "organizations/123"), "projects/[project-id]" (such as "projects/my-project-
   * id"), or "projects/[project-number]" (such as "projects/12345").
   * @param array $optParams Optional parameters.
   *
   * @opt_param string assetTypes A list of asset types to take a snapshot for.
   * For example: "compute.googleapis.com/Disk". Regular expression is also
   * supported. For example: * "compute.googleapis.com.*" snapshots resources
   * whose asset type starts with "compute.googleapis.com". * ".*Instance"
   * snapshots resources whose asset type ends with "Instance". * ".*Instance.*"
   * snapshots resources whose asset type contains "Instance". See
   * [RE2](https://github.com/google/re2/wiki/Syntax) for all supported regular
   * expression syntax. If the regular expression does not match any supported
   * asset type, an INVALID_ARGUMENT error will be returned. If specified, only
   * matching assets will be returned, otherwise, it will snapshot all asset
   * types. See [Introduction to Cloud Asset Inventory](https://cloud.google.com
   * /asset-inventory/docs/overview) for all supported asset types.
   * @opt_param string contentType Asset content type. If not specified, no
   * content but the asset name will be returned.
   * @opt_param int pageSize The maximum number of assets to be returned in a
   * single response. Default is 100, minimum is 1, and maximum is 1000.
   * @opt_param string pageToken The `next_page_token` returned from the previous
   * `ListAssetsResponse`, or unspecified for the first `ListAssetsRequest`. It is
   * a continuation of a prior `ListAssets` call, and the API should return the
   * next page of assets.
   * @opt_param string readTime Timestamp to take an asset snapshot. This can only
   * be set to a timestamp between the current time and the current time minus 35
   * days (inclusive). If not specified, the current time will be used. Due to
   * delays in resource data collection and indexing, there is a volatile window
   * during which running the same query may get different results.
   * @return Google_Service_CloudAsset_ListAssetsResponse
   */
  public function listAssets($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_CloudAsset_ListAssetsResponse");
  }
}
