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

namespace Google\Service\TagManager\Resource;

use Google\Service\TagManager\ContainerVersionHeader;
use Google\Service\TagManager\ListContainerVersionsResponse;

/**
 * The "version_headers" collection of methods.
 * Typical usage is:
 *  <code>
 *   $tagmanagerService = new Google\Service\TagManager(...);
 *   $version_headers = $tagmanagerService->version_headers;
 *  </code>
 */
class AccountsContainersVersionHeaders extends \Google\Service\Resource
{
  /**
   * Gets the latest container version header (version_headers.latest)
   *
   * @param string $parent GTM Container's API relative path. Example:
   * accounts/{account_id}/containers/{container_id}
   * @param array $optParams Optional parameters.
   * @return ContainerVersionHeader
   */
  public function latest($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('latest', [$params], ContainerVersionHeader::class);
  }
  /**
   * Lists all Container Versions of a GTM Container.
   * (version_headers.listAccountsContainersVersionHeaders)
   *
   * @param string $parent GTM Container's API relative path. Example:
   * accounts/{account_id}/containers/{container_id}
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool includeDeleted Also retrieve deleted (archived) versions when
   * true.
   * @opt_param string pageToken Continuation token for fetching the next page of
   * results.
   * @return ListContainerVersionsResponse
   */
  public function listAccountsContainersVersionHeaders($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListContainerVersionsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AccountsContainersVersionHeaders::class, 'Google_Service_TagManager_Resource_AccountsContainersVersionHeaders');
