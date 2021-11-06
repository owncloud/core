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

namespace Google\Service\GoogleAnalyticsAdmin\Resource;

use Google\Service\GoogleAnalyticsAdmin\GoogleAnalyticsAdminV1alphaAuditUserLinksRequest;
use Google\Service\GoogleAnalyticsAdmin\GoogleAnalyticsAdminV1alphaAuditUserLinksResponse;
use Google\Service\GoogleAnalyticsAdmin\GoogleAnalyticsAdminV1alphaBatchCreateUserLinksRequest;
use Google\Service\GoogleAnalyticsAdmin\GoogleAnalyticsAdminV1alphaBatchCreateUserLinksResponse;
use Google\Service\GoogleAnalyticsAdmin\GoogleAnalyticsAdminV1alphaBatchDeleteUserLinksRequest;
use Google\Service\GoogleAnalyticsAdmin\GoogleAnalyticsAdminV1alphaBatchGetUserLinksResponse;
use Google\Service\GoogleAnalyticsAdmin\GoogleAnalyticsAdminV1alphaBatchUpdateUserLinksRequest;
use Google\Service\GoogleAnalyticsAdmin\GoogleAnalyticsAdminV1alphaBatchUpdateUserLinksResponse;
use Google\Service\GoogleAnalyticsAdmin\GoogleAnalyticsAdminV1alphaListUserLinksResponse;
use Google\Service\GoogleAnalyticsAdmin\GoogleAnalyticsAdminV1alphaUserLink;
use Google\Service\GoogleAnalyticsAdmin\GoogleProtobufEmpty;

/**
 * The "userLinks" collection of methods.
 * Typical usage is:
 *  <code>
 *   $analyticsadminService = new Google\Service\GoogleAnalyticsAdmin(...);
 *   $userLinks = $analyticsadminService->userLinks;
 *  </code>
 */
class PropertiesUserLinks extends \Google\Service\Resource
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
   * @param GoogleAnalyticsAdminV1alphaAuditUserLinksRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleAnalyticsAdminV1alphaAuditUserLinksResponse
   */
  public function audit($parent, GoogleAnalyticsAdminV1alphaAuditUserLinksRequest $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('audit', [$params], GoogleAnalyticsAdminV1alphaAuditUserLinksResponse::class);
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
   * @param GoogleAnalyticsAdminV1alphaBatchCreateUserLinksRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleAnalyticsAdminV1alphaBatchCreateUserLinksResponse
   */
  public function batchCreate($parent, GoogleAnalyticsAdminV1alphaBatchCreateUserLinksRequest $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('batchCreate', [$params], GoogleAnalyticsAdminV1alphaBatchCreateUserLinksResponse::class);
  }
  /**
   * Deletes information about multiple users' links to an account or property.
   * (userLinks.batchDelete)
   *
   * @param string $parent Required. The account or property that all user links
   * in the request are for. The parent of all values for user link names to
   * delete must match this field. Example format: accounts/1234
   * @param GoogleAnalyticsAdminV1alphaBatchDeleteUserLinksRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleProtobufEmpty
   */
  public function batchDelete($parent, GoogleAnalyticsAdminV1alphaBatchDeleteUserLinksRequest $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('batchDelete', [$params], GoogleProtobufEmpty::class);
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
   * @return GoogleAnalyticsAdminV1alphaBatchGetUserLinksResponse
   */
  public function batchGet($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('batchGet', [$params], GoogleAnalyticsAdminV1alphaBatchGetUserLinksResponse::class);
  }
  /**
   * Updates information about multiple users' links to an account or property.
   * (userLinks.batchUpdate)
   *
   * @param string $parent Required. The account or property that all user links
   * in the request are for. The parent field in the UpdateUserLinkRequest
   * messages must either be empty or match this field. Example format:
   * accounts/1234
   * @param GoogleAnalyticsAdminV1alphaBatchUpdateUserLinksRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleAnalyticsAdminV1alphaBatchUpdateUserLinksResponse
   */
  public function batchUpdate($parent, GoogleAnalyticsAdminV1alphaBatchUpdateUserLinksRequest $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('batchUpdate', [$params], GoogleAnalyticsAdminV1alphaBatchUpdateUserLinksResponse::class);
  }
  /**
   * Creates a user link on an account or property. If the user with the specified
   * email already has permissions on the account or property, then the user's
   * existing permissions will be unioned with the permissions specified in the
   * new UserLink. (userLinks.create)
   *
   * @param string $parent Required. Example format: accounts/1234
   * @param GoogleAnalyticsAdminV1alphaUserLink $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool notifyNewUser Optional. If set, then email the new user
   * notifying them that they've been granted permissions to the resource.
   * @return GoogleAnalyticsAdminV1alphaUserLink
   */
  public function create($parent, GoogleAnalyticsAdminV1alphaUserLink $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], GoogleAnalyticsAdminV1alphaUserLink::class);
  }
  /**
   * Deletes a user link on an account or property. (userLinks.delete)
   *
   * @param string $name Required. Example format: accounts/1234/userLinks/5678
   * @param array $optParams Optional parameters.
   * @return GoogleProtobufEmpty
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], GoogleProtobufEmpty::class);
  }
  /**
   * Gets information about a user's link to an account or property.
   * (userLinks.get)
   *
   * @param string $name Required. Example format: accounts/1234/userLinks/5678
   * @param array $optParams Optional parameters.
   * @return GoogleAnalyticsAdminV1alphaUserLink
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], GoogleAnalyticsAdminV1alphaUserLink::class);
  }
  /**
   * Lists all user links on an account or property.
   * (userLinks.listPropertiesUserLinks)
   *
   * @param string $parent Required. Example format: accounts/1234
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of user links to return. The
   * service may return fewer than this value. If unspecified, at most 200 user
   * links will be returned. The maximum value is 500; values above 500 will be
   * coerced to 500.
   * @opt_param string pageToken A page token, received from a previous
   * `ListUserLinks` call. Provide this to retrieve the subsequent page. When
   * paginating, all other parameters provided to `ListUserLinks` must match the
   * call that provided the page token.
   * @return GoogleAnalyticsAdminV1alphaListUserLinksResponse
   */
  public function listPropertiesUserLinks($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], GoogleAnalyticsAdminV1alphaListUserLinksResponse::class);
  }
  /**
   * Updates a user link on an account or property. (userLinks.patch)
   *
   * @param string $name Output only. Example format:
   * properties/1234/userLinks/5678
   * @param GoogleAnalyticsAdminV1alphaUserLink $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleAnalyticsAdminV1alphaUserLink
   */
  public function patch($name, GoogleAnalyticsAdminV1alphaUserLink $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], GoogleAnalyticsAdminV1alphaUserLink::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PropertiesUserLinks::class, 'Google_Service_GoogleAnalyticsAdmin_Resource_PropertiesUserLinks');
