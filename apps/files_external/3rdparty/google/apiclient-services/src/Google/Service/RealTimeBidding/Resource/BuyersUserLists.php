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
 * The "userLists" collection of methods.
 * Typical usage is:
 *  <code>
 *   $realtimebiddingService = new Google_Service_RealTimeBidding(...);
 *   $userLists = $realtimebiddingService->userLists;
 *  </code>
 */
class Google_Service_RealTimeBidding_Resource_BuyersUserLists extends Google_Service_Resource
{
  /**
   * Change the status of a user list to CLOSED. This prevents new users from
   * being added to the user list. (userLists.close)
   *
   * @param string $name Required. The name of the user list to close. See
   * UserList.name
   * @param Google_Service_RealTimeBidding_CloseUserListRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_RealTimeBidding_UserList
   */
  public function close($name, Google_Service_RealTimeBidding_CloseUserListRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('close', array($params), "Google_Service_RealTimeBidding_UserList");
  }
  /**
   * Create a new user list. (userLists.create)
   *
   * @param string $parent Required. The name of the parent buyer of the user list
   * to be retrieved that must follow the pattern `buyers/{buyerAccountId}`, where
   * `{buyerAccountId}` represents the account ID of the buyer who owns user
   * lists. For a bidder accessing user lists on behalf of a child seat buyer ,
   * `{buyerAccountId}` should represent the account ID of the child seat buyer.
   * @param Google_Service_RealTimeBidding_UserList $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_RealTimeBidding_UserList
   */
  public function create($parent, Google_Service_RealTimeBidding_UserList $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_RealTimeBidding_UserList");
  }
  /**
   * Gets a user list by its name. (userLists.get)
   *
   * @param string $name Required. The name of the user list to be retrieved. See
   * UserList.name.
   * @param array $optParams Optional parameters.
   * @return Google_Service_RealTimeBidding_UserList
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_RealTimeBidding_UserList");
  }
  /**
   * Gets remarketing tag for a buyer. A remarketing tag is a piece of JavaScript
   * code that can be placed on a web page. When a user visits a page containing a
   * remarketing tag, Google adds the user to a user list.
   * (userLists.getRemarketingTag)
   *
   * @param string $name Required. To fetch remarketing tag for an account, name
   * must follow the pattern `buyers/{accountId}` where `{accountId}` represents
   * ID of a buyer that owns the remarketing tag. For a bidder accessing
   * remarketing tag on behalf of a child seat buyer, `{accountId}` should
   * represent the ID of the child seat buyer. To fetch remarketing tag for a
   * specific user list, name must follow the pattern
   * `buyers/{accountId}/userLists/{userListId}`. See UserList.name.
   * @param array $optParams Optional parameters.
   * @return Google_Service_RealTimeBidding_GetRemarketingTagResponse
   */
  public function getRemarketingTag($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('getRemarketingTag', array($params), "Google_Service_RealTimeBidding_GetRemarketingTagResponse");
  }
  /**
   * Lists the user lists visible to the current user.
   * (userLists.listBuyersUserLists)
   *
   * @param string $parent Required. The name of the parent buyer for the user
   * lists to be returned that must follow the pattern `buyers/{buyerAccountId}`,
   * where `{buyerAccountId}` represents the account ID of the buyer who owns user
   * lists. For a bidder accessing user lists on behalf of a child seat buyer ,
   * `{buyerAccountId}` should represent the account ID of the child seat buyer.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The number of results to return per page.
   * @opt_param string pageToken Continuation page token (as received from a
   * previous response).
   * @return Google_Service_RealTimeBidding_ListUserListsResponse
   */
  public function listBuyersUserLists($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_RealTimeBidding_ListUserListsResponse");
  }
  /**
   * Change the status of a user list to OPEN. This allows new users to be added
   * to the user list. (userLists.open)
   *
   * @param string $name Required. The name of the user list to open. See
   * UserList.name
   * @param Google_Service_RealTimeBidding_OpenUserListRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_RealTimeBidding_UserList
   */
  public function open($name, Google_Service_RealTimeBidding_OpenUserListRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('open', array($params), "Google_Service_RealTimeBidding_UserList");
  }
  /**
   * Update the given user list. Only user lists with URLRestrictions can be
   * updated. (userLists.update)
   *
   * @param string $name Output only. Name of the user list that must follow the
   * pattern `buyers/{buyer}/userLists/{user_list}`, where `{buyer}` represents
   * the account ID of the buyer who owns the user list. For a bidder accessing
   * user lists on behalf of a child seat buyer, `{buyer}` represents the account
   * ID of the child seat buyer. `{user_list}` is an int64 identifier assigned by
   * Google to uniquely identify a user list.
   * @param Google_Service_RealTimeBidding_UserList $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_RealTimeBidding_UserList
   */
  public function update($name, Google_Service_RealTimeBidding_UserList $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_RealTimeBidding_UserList");
  }
}
