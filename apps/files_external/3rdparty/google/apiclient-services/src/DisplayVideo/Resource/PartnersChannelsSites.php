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

namespace Google\Service\DisplayVideo\Resource;

use Google\Service\DisplayVideo\BulkEditSitesRequest;
use Google\Service\DisplayVideo\BulkEditSitesResponse;
use Google\Service\DisplayVideo\DisplayvideoEmpty;
use Google\Service\DisplayVideo\ListSitesResponse;
use Google\Service\DisplayVideo\ReplaceSitesRequest;
use Google\Service\DisplayVideo\ReplaceSitesResponse;
use Google\Service\DisplayVideo\Site;

/**
 * The "sites" collection of methods.
 * Typical usage is:
 *  <code>
 *   $displayvideoService = new Google\Service\DisplayVideo(...);
 *   $sites = $displayvideoService->sites;
 *  </code>
 */
class PartnersChannelsSites extends \Google\Service\Resource
{
  /**
   * Bulk edits sites under a single channel. The operation will delete the sites
   * provided in BulkEditSitesRequest.deleted_sites and then create the sites
   * provided in BulkEditSitesRequest.created_sites. (sites.bulkEdit)
   *
   * @param string $partnerId The ID of the partner that owns the parent channel.
   * @param string $channelId Required. The ID of the parent channel to which the
   * sites belong.
   * @param BulkEditSitesRequest $postBody
   * @param array $optParams Optional parameters.
   * @return BulkEditSitesResponse
   */
  public function bulkEdit($partnerId, $channelId, BulkEditSitesRequest $postBody, $optParams = [])
  {
    $params = ['partnerId' => $partnerId, 'channelId' => $channelId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('bulkEdit', [$params], BulkEditSitesResponse::class);
  }
  /**
   * Creates a site in a channel. (sites.create)
   *
   * @param string $partnerId The ID of the partner that owns the parent channel.
   * @param string $channelId Required. The ID of the parent channel in which the
   * site will be created.
   * @param Site $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string advertiserId The ID of the advertiser that owns the parent
   * channel.
   * @return Site
   */
  public function create($partnerId, $channelId, Site $postBody, $optParams = [])
  {
    $params = ['partnerId' => $partnerId, 'channelId' => $channelId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Site::class);
  }
  /**
   * Deletes a site from a channel. (sites.delete)
   *
   * @param string $partnerId The ID of the partner that owns the parent channel.
   * @param string $channelId Required. The ID of the parent channel to which the
   * site belongs.
   * @param string $urlOrAppId Required. The URL or app ID of the site to delete.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string advertiserId The ID of the advertiser that owns the parent
   * channel.
   * @return DisplayvideoEmpty
   */
  public function delete($partnerId, $channelId, $urlOrAppId, $optParams = [])
  {
    $params = ['partnerId' => $partnerId, 'channelId' => $channelId, 'urlOrAppId' => $urlOrAppId];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], DisplayvideoEmpty::class);
  }
  /**
   * Lists sites in a channel. (sites.listPartnersChannelsSites)
   *
   * @param string $partnerId The ID of the partner that owns the parent channel.
   * @param string $channelId Required. The ID of the parent channel to which the
   * requested sites belong.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string advertiserId The ID of the advertiser that owns the parent
   * channel.
   * @opt_param string filter Allows filtering by site fields. Supported syntax: *
   * Filter expressions for site currently can only contain at most one *
   * restriction. * A restriction has the form of `{field} {operator} {value}`. *
   * The operator must be `CONTAINS (:)`. * Supported fields: - `urlOrAppId`
   * Examples: * All sites for which the URL or app ID contains "google":
   * `urlOrAppId : "google"`
   * @opt_param string orderBy Field by which to sort the list. Acceptable values
   * are: * `urlOrAppId` (default) The default sorting order is ascending. To
   * specify descending order for a field, a suffix " desc" should be added to the
   * field name. Example: `urlOrAppId desc`.
   * @opt_param int pageSize Requested page size. Must be between `1` and `10000`.
   * If unspecified will default to `100`. Returns error code `INVALID_ARGUMENT`
   * if an invalid value is specified.
   * @opt_param string pageToken A token identifying a page of results the server
   * should return. Typically, this is the value of next_page_token returned from
   * the previous call to `ListSites` method. If not specified, the first page of
   * results will be returned.
   * @return ListSitesResponse
   */
  public function listPartnersChannelsSites($partnerId, $channelId, $optParams = [])
  {
    $params = ['partnerId' => $partnerId, 'channelId' => $channelId];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListSitesResponse::class);
  }
  /**
   * Replaces all of the sites under a single channel. The operation will replace
   * the sites under a channel with the sites provided in
   * ReplaceSitesRequest.new_sites. (sites.replace)
   *
   * @param string $partnerId The ID of the partner that owns the parent channel.
   * @param string $channelId Required. The ID of the parent channel whose sites
   * will be replaced.
   * @param ReplaceSitesRequest $postBody
   * @param array $optParams Optional parameters.
   * @return ReplaceSitesResponse
   */
  public function replace($partnerId, $channelId, ReplaceSitesRequest $postBody, $optParams = [])
  {
    $params = ['partnerId' => $partnerId, 'channelId' => $channelId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('replace', [$params], ReplaceSitesResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PartnersChannelsSites::class, 'Google_Service_DisplayVideo_Resource_PartnersChannelsSites');
