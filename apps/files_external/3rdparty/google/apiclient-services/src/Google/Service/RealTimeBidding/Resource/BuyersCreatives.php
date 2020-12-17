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
 * The "creatives" collection of methods.
 * Typical usage is:
 *  <code>
 *   $realtimebiddingService = new Google_Service_RealTimeBidding(...);
 *   $creatives = $realtimebiddingService->creatives;
 *  </code>
 */
class Google_Service_RealTimeBidding_Resource_BuyersCreatives extends Google_Service_Resource
{
  /**
   * Creates a creative. (creatives.create)
   *
   * @param string $parent Required. The name of the parent buyer that the new
   * creative belongs to that must follow the pattern `buyers/{buyerAccountId}`,
   * where `{buyerAccountId}` represents the account ID of the buyer who owns a
   * creative. For a bidder accessing creatives on behalf of a child seat buyer,
   * `{buyerAccountId}` should represent the account ID of the child seat buyer.
   * @param Google_Service_RealTimeBidding_Creative $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_RealTimeBidding_Creative
   */
  public function create($parent, Google_Service_RealTimeBidding_Creative $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_RealTimeBidding_Creative");
  }
  /**
   * Gets a creative. (creatives.get)
   *
   * @param string $name Required. Name of the creative to retrieve. See
   * creative.name.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string view Controls the amount of information included in the
   * response. By default only creativeServingDecision is included. To retrieve
   * the entire creative resource (including the declared fields and the creative
   * content) specify the view as "FULL".
   * @return Google_Service_RealTimeBidding_Creative
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_RealTimeBidding_Creative");
  }
  /**
   * Lists creatives. (creatives.listBuyersCreatives)
   *
   * @param string $parent Required. Name of the parent buyer that owns the
   * creatives. The pattern for this resource is either `buyers/{buyerAccountId}`
   * or `bidders/{bidderAccountId}`. For `buyers/{buyerAccountId}`, the
   * `buyerAccountId` can be one of the following: 1. The ID of the buyer that is
   * accessing their own creatives. 2. The ID of the child seat buyer under a
   * bidder account. So for listing creatives pertaining to the child seat buyer
   * (`456`) under bidder account (`123`), you would use the pattern:
   * `buyers/456`. 3. The ID of the bidder itself. So for listing creatives
   * pertaining to bidder (`123`), you would use `buyers/123`. If you want to
   * access all creatives pertaining to both the bidder and all of its child seat
   * accounts, you would use `bidders/{bidderAccountId}`, e.g., for all creatives
   * pertaining to bidder (`123`), use `bidders/123`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Query string to filter creatives. If no filter is
   * specified, all active creatives will be returned. Example: 'accountId=12345
   * AND (dealsStatus:DISAPPROVED AND disapprovalReason:UNACCEPTABLE_CONTENT) OR
   * declaredAttributes:IS_COOKIE_TARGETED'
   * @opt_param int pageSize Requested page size. The server may return fewer
   * creatives than requested (due to timeout constraint) even if more are
   * available via another call. If unspecified, server will pick an appropriate
   * default. Acceptable values are 1 to 1000, inclusive.
   * @opt_param string pageToken A token identifying a page of results the server
   * should return. Typically, this is the value of
   * ListCreativesResponse.nextPageToken returned from the previous call to the
   * 'ListCreatives' method.
   * @opt_param string view Controls the amount of information included in the
   * response. By default only creativeServingDecision is included. To retrieve
   * the entire creative resource (including the declared fields and the creative
   * content) specify the view as "FULL".
   * @return Google_Service_RealTimeBidding_ListCreativesResponse
   */
  public function listBuyersCreatives($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_RealTimeBidding_ListCreativesResponse");
  }
  /**
   * Updates a creative. (creatives.patch)
   *
   * @param string $name Output only. Name of the creative. Follows the pattern
   * `buyers/{buyer}/creatives/{creative}`, where `{buyer}` represents the account
   * ID of the buyer who owns the creative, and `{creative}` is the buyer-specific
   * creative ID that references this creative in the bid response.
   * @param Google_Service_RealTimeBidding_Creative $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Field mask to use for partial in-place updates.
   * @return Google_Service_RealTimeBidding_Creative
   */
  public function patch($name, Google_Service_RealTimeBidding_Creative $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_RealTimeBidding_Creative");
  }
}
