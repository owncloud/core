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
 * The "userLinks" collection of methods.
 * Typical usage is:
 *  <code>
 *   $analyticsadminService = new Google_Service_GoogleAnalyticsAdmin(...);
 *   $userLinks = $analyticsadminService->userLinks;
 *  </code>
 */
class Google_Service_GoogleAnalyticsAdmin_Resource_AccountsUserLinks extends Google_Service_Resource
{
  /**
   * Lists all user links on an account or property, including implicit ones that
   * come from effective permissions granted by groups or organization admin
   * roles. If a returned user link does not have direct permissions, they cannot
   * be removed from the account or property directly with the DeleteUserLink
   * command. They have to be removed from the group/etc that gives them
   * permissions, which is currently only usable/discoverable in the GA or GMP
   * UIs. (userLinks.audit)
   *
   * @param string $parent Required. Example format: accounts/1234
   * @param Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaAuditUserLinksRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaAuditUserLinksResponse
   */
  public function audit($parent, Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaAuditUserLinksRequest $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('audit', array($params), "Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaAuditUserLinksResponse");
  }
  /**
   * Creates information about multiple users' links to an account or property.
   * This method is transactional. If any UserLink cannot be created, none of the
   * UserLinks will be created. (userLinks.batchCreate)
   *
   * @param string $parent Required. The account or property that all user links
   * in the request are for. This field is required. The parent field in the
   * CreateUserLinkRequest messages must either be empty or match this field.
   * Example format: accounts/1234
   * @param Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaBatchCreateUserLinksRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaBatchCreateUserLinksResponse
   */
  public function batchCreate($parent, Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaBatchCreateUserLinksRequest $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('batchCreate', array($params), "Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaBatchCreateUserLinksResponse");
  }
  /**
   * Deletes information about multiple users' links to an account or property.
   * (userLinks.batchDelete)
   *
   * @param string $parent Required. The account or property that all user links
   * in the request are for. The parent of all values for user link names to
   * delete must match this field. Example format: accounts/1234
   * @param Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaBatchDeleteUserLinksRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_GoogleAnalyticsAdmin_GoogleProtobufEmpty
   */
  public function batchDelete($parent, Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaBatchDeleteUserLinksRequest $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('batchDelete', array($params), "Google_Service_GoogleAnalyticsAdmin_GoogleProtobufEmpty");
  }
  /**
   * Gets information about multiple users' links to an account or property.
   * (userLinks.batchGet)
   *
   * @param string $parent Required. The account or property that all user links
   * in the request are for. The parent of all provided values for the 'names'
   * field must match this field. Example format: accounts/1234
   * @param array $optParams Optional parameters.
   *
   * @opt_param string names Required. The names of the user links to retrieve. A
   * maximum of 1000 user links can be retrieved in a batch. Format:
   * accounts/{accountId}/userLinks/{userLinkId}
   * @return Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaBatchGetUserLinksResponse
   */
  public function batchGet($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('batchGet', array($params), "Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaBatchGetUserLinksResponse");
  }
  /**
   * Updates information about multiple users' links to an account or property.
   * (userLinks.batchUpdate)
   *
   * @param string $parent Required. The account or property that all user links
   * in the request are for. The parent field in the UpdateUserLinkRequest
   * messages must either be empty or match this field. Example format:
   * accounts/1234
   * @param Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaBatchUpdateUserLinksRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaBatchUpdateUserLinksResponse
   */
  public function batchUpdate($parent, Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaBatchUpdateUserLinksRequest $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('batchUpdate', array($params), "Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaBatchUpdateUserLinksResponse");
  }
  /**
   * Creates a user link on an account or property. If the user with the specified
   * email already has permissions on the account or property, then the user's
   * existing permissions will be unioned with the permissions specified in the
   * new UserLink. (userLinks.create)
   *
   * @param string $parent Required. Example format: accounts/1234
   * @param Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaUserLink $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool notifyNewUser Optional. If notify_new_user is set, then email
   * new user that they've been given permissions on the resource.
   * @return Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaUserLink
   */
  public function create($parent, Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaUserLink $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaUserLink");
  }
  /**
   * Deletes a user link on an account or property. (userLinks.delete)
   *
   * @param string $name Required. Example format: accounts/1234/userLinks/5678
   * @param array $optParams Optional parameters.
   * @return Google_Service_GoogleAnalyticsAdmin_GoogleProtobufEmpty
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_GoogleAnalyticsAdmin_GoogleProtobufEmpty");
  }
  /**
   * Gets information about a user's link to an account or property.
   * (userLinks.get)
   *
   * @param string $name Required. Example format: accounts/1234/userLinks/5678
   * @param array $optParams Optional parameters.
   * @return Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaUserLink
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaUserLink");
  }
  /**
   * Lists all user links on an account or property.
   * (userLinks.listAccountsUserLinks)
   *
   * @param string $parent Required. Example format: accounts/1234
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken A page token, received from a previous
   * `ListUserLinks` call. Provide this to retrieve the subsequent page. When
   * paginating, all other parameters provided to `ListUserLinks` must match the
   * call that provided the page token.
   * @opt_param int pageSize The maximum number of user links to return. The
   * service may return fewer than this value. If unspecified, at most 200 user
   * links will be returned. The maximum value is 500; values above 500 will be
   * coerced to 500.
   * @return Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaListUserLinksResponse
   */
  public function listAccountsUserLinks($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaListUserLinksResponse");
  }
  /**
   * Updates a user link on an account or property. (userLinks.patch)
   *
   * @param string $name Example format: properties/1234/userLinks/5678
   * @param Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaUserLink $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaUserLink
   */
  public function patch($name, Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaUserLink $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaUserLink");
  }
}
