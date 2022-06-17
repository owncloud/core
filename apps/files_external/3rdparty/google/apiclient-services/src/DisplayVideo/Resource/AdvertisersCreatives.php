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

use Google\Service\DisplayVideo\Creative;
use Google\Service\DisplayVideo\DisplayvideoEmpty;
use Google\Service\DisplayVideo\ListCreativesResponse;

/**
 * The "creatives" collection of methods.
 * Typical usage is:
 *  <code>
 *   $displayvideoService = new Google\Service\DisplayVideo(...);
 *   $creatives = $displayvideoService->creatives;
 *  </code>
 */
class AdvertisersCreatives extends \Google\Service\Resource
{
  /**
   * Creates a new creative. Returns the newly created creative if successful.
   * (creatives.create)
   *
   * @param string $advertiserId Output only. The unique ID of the advertiser the
   * creative belongs to.
   * @param Creative $postBody
   * @param array $optParams Optional parameters.
   * @return Creative
   */
  public function create($advertiserId, Creative $postBody, $optParams = [])
  {
    $params = ['advertiserId' => $advertiserId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Creative::class);
  }
  /**
   * Deletes a creative. Returns error code `NOT_FOUND` if the creative does not
   * exist. The creative should be archived first, i.e. set entity_status to
   * `ENTITY_STATUS_ARCHIVED`, before it can be deleted. (creatives.delete)
   *
   * @param string $advertiserId The ID of the advertiser this creative belongs
   * to.
   * @param string $creativeId The ID of the creative to be deleted.
   * @param array $optParams Optional parameters.
   * @return DisplayvideoEmpty
   */
  public function delete($advertiserId, $creativeId, $optParams = [])
  {
    $params = ['advertiserId' => $advertiserId, 'creativeId' => $creativeId];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], DisplayvideoEmpty::class);
  }
  /**
   * Gets a creative. (creatives.get)
   *
   * @param string $advertiserId Required. The ID of the advertiser this creative
   * belongs to.
   * @param string $creativeId Required. The ID of the creative to fetch.
   * @param array $optParams Optional parameters.
   * @return Creative
   */
  public function get($advertiserId, $creativeId, $optParams = [])
  {
    $params = ['advertiserId' => $advertiserId, 'creativeId' => $creativeId];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Creative::class);
  }
  /**
   * Lists creatives in an advertiser. The order is defined by the order_by
   * parameter. If a filter by entity_status is not specified, creatives with
   * `ENTITY_STATUS_ARCHIVED` will not be included in the results.
   * (creatives.listAdvertisersCreatives)
   *
   * @param string $advertiserId Required. The ID of the advertiser to list
   * creatives for.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Allows filtering by creative properties. Supported
   * syntax: * Filter expressions are made up of one or more restrictions. *
   * Restriction for the same field must be combined by `OR`. * Restriction for
   * different fields must be combined by `AND`. * Between `(` and `)` there can
   * only be restrictions combined by `OR` for the same field. * A restriction has
   * the form of `{field} {operator} {value}`. * The operator must be `EQUALS (=)`
   * for the following fields: - `entityStatus` - `creativeType`. - `dimensions` -
   * `minDuration` - `maxDuration` - `approvalStatus` - `exchangeReviewStatus` -
   * `dynamic` - `creativeId` * The operator must be `HAS (:)` for the following
   * fields: - `lineItemIds` * The operator must be `GREATER THAN OR EQUAL TO
   * (>=)` or `LESS THAN OR EQUAL TO (<=)` for the following fields: -
   * `updateTime` (input in ISO 8601 format, or YYYY-MM-DDTHH:MM:SSZ) * For
   * `entityStatus`, `minDuration`, `maxDuration`, `updateTime`, and `dynamic`,
   * there may be at most one restriction. * For `dimensions`, the value is in the
   * form of `"{width}x{height}"`. * For `exchangeReviewStatus`, the value is in
   * the form of `{exchange}-{reviewStatus}`. * For `minDuration` and
   * `maxDuration`, the value is in the form of `"{duration}s"`. Only seconds are
   * supported with millisecond granularity. * For `updateTime`, a creative
   * resource's field value reflects the last time that a creative has been
   * updated, which includes updates made by the system (e.g. creative review
   * updates). * There may be multiple `lineItemIds` restrictions in order to
   * search against multiple possible line item IDs. * There may be multiple
   * `creativeId` restrictions in order to search against multiple possible
   * creative IDs. Examples: * All native creatives:
   * `creativeType="CREATIVE_TYPE_NATIVE"` * All active creatives with 300x400 or
   * 50x100 dimensions: `entityStatus="ENTITY_STATUS_ACTIVE" AND
   * (dimensions="300x400" OR dimensions="50x100")` * All dynamic creatives that
   * are approved by AdX or AppNexus, with a minimum duration of 5 seconds and
   * 200ms. `dynamic="true" AND minDuration="5.2s" AND (exchangeReviewStatus
   * ="EXCHANGE_GOOGLE_AD_MANAGER-REVIEW_STATUS_APPROVED" OR exchangeReviewStatus
   * ="EXCHANGE_APPNEXUS-REVIEW_STATUS_APPROVED")` * All video creatives that are
   * associated with line item ID 1 or 2: `creativeType="CREATIVE_TYPE_VIDEO" AND
   * (lineItemIds:1 OR lineItemIds:2)` * Find creatives by multiple creative IDs:
   * `creativeId=1 OR creativeId=2` * All creatives with an update time greater
   * than or equal to `2020-11-04T18:54:47Z (format of ISO 8601)`:
   * `updateTime>="2020-11-04T18:54:47Z"` The length of this field should be no
   * more than 500 characters.
   * @opt_param string orderBy Field by which to sort the list. Acceptable values
   * are: * `creativeId` (default) * `createTime` * `mediaDuration` * `dimensions`
   * (sorts by width first, then by height) The default sorting order is
   * ascending. To specify descending order for a field, a suffix "desc" should be
   * added to the field name. Example: `createTime desc`.
   * @opt_param int pageSize Requested page size. Must be between `1` and `100`.
   * If unspecified will default to `100`. Returns error code `INVALID_ARGUMENT`
   * if an invalid value is specified.
   * @opt_param string pageToken A token identifying a page of results the server
   * should return. Typically, this is the value of next_page_token returned from
   * the previous call to `ListCreatives` method. If not specified, the first page
   * of results will be returned.
   * @return ListCreativesResponse
   */
  public function listAdvertisersCreatives($advertiserId, $optParams = [])
  {
    $params = ['advertiserId' => $advertiserId];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListCreativesResponse::class);
  }
  /**
   * Updates an existing creative. Returns the updated creative if successful.
   * (creatives.patch)
   *
   * @param string $advertiserId Output only. The unique ID of the advertiser the
   * creative belongs to.
   * @param string $creativeId Output only. The unique ID of the creative.
   * Assigned by the system.
   * @param Creative $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Required. The mask to control which fields to
   * update.
   * @return Creative
   */
  public function patch($advertiserId, $creativeId, Creative $postBody, $optParams = [])
  {
    $params = ['advertiserId' => $advertiserId, 'creativeId' => $creativeId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], Creative::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AdvertisersCreatives::class, 'Google_Service_DisplayVideo_Resource_AdvertisersCreatives');
