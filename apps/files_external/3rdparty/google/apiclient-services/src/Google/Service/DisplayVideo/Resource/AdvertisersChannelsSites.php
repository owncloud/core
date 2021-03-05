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
 * The "sites" collection of methods.
 * Typical usage is:
 *  <code>
 *   $displayvideoService = new Google_Service_DisplayVideo(...);
 *   $sites = $displayvideoService->sites;
 *  </code>
 */
class Google_Service_DisplayVideo_Resource_AdvertisersChannelsSites extends Google_Service_Resource
{
  /**
   * Bulk edits sites under a single channel. The operation will delete the sites
   * provided in BulkEditSitesRequest.deleted_sites and then create the sites
   * provided in BulkEditSitesRequest.created_sites. (sites.bulkEdit)
   *
   * @param string $advertiserId The ID of the advertiser that owns the parent
   * channel.
   * @param string $channelId Required. The ID of the parent channel to which the
   * sites belong.
   * @param Google_Service_DisplayVideo_BulkEditSitesRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_DisplayVideo_BulkEditSitesResponse
   */
  public function bulkEdit($advertiserId, $channelId, Google_Service_DisplayVideo_BulkEditSitesRequest $postBody, $optParams = array())
  {
    $params = array('advertiserId' => $advertiserId, 'channelId' => $channelId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('bulkEdit', array($params), "Google_Service_DisplayVideo_BulkEditSitesResponse");
  }
  /**
   * Creates a site in a channel. (sites.create)
   *
   * @param string $advertiserId The ID of the advertiser that owns the parent
   * channel.
   * @param string $channelId Required. The ID of the parent channel in which the
   * site will be created.
   * @param Google_Service_DisplayVideo_Site $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string partnerId The ID of the partner that owns the parent
   * channel.
   * @return Google_Service_DisplayVideo_Site
   */
  public function create($advertiserId, $channelId, Google_Service_DisplayVideo_Site $postBody, $optParams = array())
  {
    $params = array('advertiserId' => $advertiserId, 'channelId' => $channelId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_DisplayVideo_Site");
  }
  /**
   * Deletes a site from a channel. (sites.delete)
   *
   * @param string $advertiserId The ID of the advertiser that owns the parent
   * channel.
   * @param string $channelId Required. The ID of the parent channel to which the
   * site belongs.
   * @param string $urlOrAppId Required. The URL or app ID of the site to delete.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string partnerId The ID of the partner that owns the parent
   * channel.
   * @return Google_Service_DisplayVideo_DisplayvideoEmpty
   */
  public function delete($advertiserId, $channelId, $urlOrAppId, $optParams = array())
  {
    $params = array('advertiserId' => $advertiserId, 'channelId' => $channelId, 'urlOrAppId' => $urlOrAppId);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_DisplayVideo_DisplayvideoEmpty");
  }
  /**
   * Lists sites in a channel. (sites.listAdvertisersChannelsSites)
   *
   * @param string $advertiserId The ID of the advertiser that owns the parent
   * channel.
   * @param string $channelId Required. The ID of the parent channel to which the
   * requested sites belong.
   * @param array $optParams Optional parameters.
   *
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
   * @opt_param int pageSize Requested page size. Must be between `1` and `100`.
   * If unspecified will default to `100`. Returns error code `INVALID_ARGUMENT`
   * if an invalid value is specified.
   * @opt_param string pageToken A token identifying a page of results the server
   * should return. Typically, this is the value of next_page_token returned from
   * the previous call to `ListSites` method. If not specified, the first page of
   * results will be returned.
   * @opt_param string partnerId The ID of the partner that owns the parent
   * channel.
   * @return Google_Service_DisplayVideo_ListSitesResponse
   */
  public function listAdvertisersChannelsSites($advertiserId, $channelId, $optParams = array())
  {
    $params = array('advertiserId' => $advertiserId, 'channelId' => $channelId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_DisplayVideo_ListSitesResponse");
  }
}
