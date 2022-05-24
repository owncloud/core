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

namespace Google\Service\Analytics\Resource;

use Google\Service\Analytics\EntityAdWordsLink;
use Google\Service\Analytics\EntityAdWordsLinks;

/**
 * The "webPropertyAdWordsLinks" collection of methods.
 * Typical usage is:
 *  <code>
 *   $analyticsService = new Google\Service\Analytics(...);
 *   $webPropertyAdWordsLinks = $analyticsService->webPropertyAdWordsLinks;
 *  </code>
 */
class ManagementWebPropertyAdWordsLinks extends \Google\Service\Resource
{
  /**
   * Deletes a web property-Google Ads link. (webPropertyAdWordsLinks.delete)
   *
   * @param string $accountId ID of the account which the given web property
   * belongs to.
   * @param string $webPropertyId Web property ID to delete the Google Ads link
   * for.
   * @param string $webPropertyAdWordsLinkId Web property Google Ads link ID.
   * @param array $optParams Optional parameters.
   */
  public function delete($accountId, $webPropertyId, $webPropertyAdWordsLinkId, $optParams = [])
  {
    $params = ['accountId' => $accountId, 'webPropertyId' => $webPropertyId, 'webPropertyAdWordsLinkId' => $webPropertyAdWordsLinkId];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params]);
  }
  /**
   * Returns a web property-Google Ads link to which the user has access.
   * (webPropertyAdWordsLinks.get)
   *
   * @param string $accountId ID of the account which the given web property
   * belongs to.
   * @param string $webPropertyId Web property ID to retrieve the Google Ads link
   * for.
   * @param string $webPropertyAdWordsLinkId Web property-Google Ads link ID.
   * @param array $optParams Optional parameters.
   * @return EntityAdWordsLink
   */
  public function get($accountId, $webPropertyId, $webPropertyAdWordsLinkId, $optParams = [])
  {
    $params = ['accountId' => $accountId, 'webPropertyId' => $webPropertyId, 'webPropertyAdWordsLinkId' => $webPropertyAdWordsLinkId];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], EntityAdWordsLink::class);
  }
  /**
   * Creates a webProperty-Google Ads link. (webPropertyAdWordsLinks.insert)
   *
   * @param string $accountId ID of the Google Analytics account to create the
   * link for.
   * @param string $webPropertyId Web property ID to create the link for.
   * @param EntityAdWordsLink $postBody
   * @param array $optParams Optional parameters.
   * @return EntityAdWordsLink
   */
  public function insert($accountId, $webPropertyId, EntityAdWordsLink $postBody, $optParams = [])
  {
    $params = ['accountId' => $accountId, 'webPropertyId' => $webPropertyId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('insert', [$params], EntityAdWordsLink::class);
  }
  /**
   * Lists webProperty-Google Ads links for a given web property.
   * (webPropertyAdWordsLinks.listManagementWebPropertyAdWordsLinks)
   *
   * @param string $accountId ID of the account which the given web property
   * belongs to.
   * @param string $webPropertyId Web property ID to retrieve the Google Ads links
   * for.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int max-results The maximum number of webProperty-Google Ads links
   * to include in this response.
   * @opt_param int start-index An index of the first webProperty-Google Ads link
   * to retrieve. Use this parameter as a pagination mechanism along with the max-
   * results parameter.
   * @return EntityAdWordsLinks
   */
  public function listManagementWebPropertyAdWordsLinks($accountId, $webPropertyId, $optParams = [])
  {
    $params = ['accountId' => $accountId, 'webPropertyId' => $webPropertyId];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], EntityAdWordsLinks::class);
  }
  /**
   * Updates an existing webProperty-Google Ads link. This method supports patch
   * semantics. (webPropertyAdWordsLinks.patch)
   *
   * @param string $accountId ID of the account which the given web property
   * belongs to.
   * @param string $webPropertyId Web property ID to retrieve the Google Ads link
   * for.
   * @param string $webPropertyAdWordsLinkId Web property-Google Ads link ID.
   * @param EntityAdWordsLink $postBody
   * @param array $optParams Optional parameters.
   * @return EntityAdWordsLink
   */
  public function patch($accountId, $webPropertyId, $webPropertyAdWordsLinkId, EntityAdWordsLink $postBody, $optParams = [])
  {
    $params = ['accountId' => $accountId, 'webPropertyId' => $webPropertyId, 'webPropertyAdWordsLinkId' => $webPropertyAdWordsLinkId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], EntityAdWordsLink::class);
  }
  /**
   * Updates an existing webProperty-Google Ads link.
   * (webPropertyAdWordsLinks.update)
   *
   * @param string $accountId ID of the account which the given web property
   * belongs to.
   * @param string $webPropertyId Web property ID to retrieve the Google Ads link
   * for.
   * @param string $webPropertyAdWordsLinkId Web property-Google Ads link ID.
   * @param EntityAdWordsLink $postBody
   * @param array $optParams Optional parameters.
   * @return EntityAdWordsLink
   */
  public function update($accountId, $webPropertyId, $webPropertyAdWordsLinkId, EntityAdWordsLink $postBody, $optParams = [])
  {
    $params = ['accountId' => $accountId, 'webPropertyId' => $webPropertyId, 'webPropertyAdWordsLinkId' => $webPropertyAdWordsLinkId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('update', [$params], EntityAdWordsLink::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ManagementWebPropertyAdWordsLinks::class, 'Google_Service_Analytics_Resource_ManagementWebPropertyAdWordsLinks');
