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

namespace Google\Service\AuthorizedBuyersMarketplace\Resource;

use Google\Service\AuthorizedBuyersMarketplace\ListPublisherProfilesResponse;
use Google\Service\AuthorizedBuyersMarketplace\PublisherProfile;

/**
 * The "publisherProfiles" collection of methods.
 * Typical usage is:
 *  <code>
 *   $authorizedbuyersmarketplaceService = new Google\Service\AuthorizedBuyersMarketplace(...);
 *   $publisherProfiles = $authorizedbuyersmarketplaceService->publisherProfiles;
 *  </code>
 */
class BuyersPublisherProfiles extends \Google\Service\Resource
{
  /**
   * Gets the requested publisher profile by name. (publisherProfiles.get)
   *
   * @param string $name Required. Name of the publisher profile. Format:
   * `buyers/{buyerId}/publisherProfiles/{publisherProfileId}`
   * @param array $optParams Optional parameters.
   * @return PublisherProfile
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], PublisherProfile::class);
  }
  /**
   * Lists publisher profiles (publisherProfiles.listBuyersPublisherProfiles)
   *
   * @param string $parent Required. Parent that owns the collection of publisher
   * profiles Format: `buyers/{buyerId}`
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Optional query string using the [Cloud API list
   * filtering] (https://developers.google.com/authorized-buyers/apis/guides/v2
   * /list-filters) syntax.
   * @opt_param int pageSize Requested page size. The server may return fewer
   * results than requested. If requested more than 500, the server will return
   * 500 results per page. If unspecified, the server will pick a default page
   * size of 100.
   * @opt_param string pageToken The page token as returned from a previous
   * ListPublisherProfilesResponse.
   * @return ListPublisherProfilesResponse
   */
  public function listBuyersPublisherProfiles($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListPublisherProfilesResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(BuyersPublisherProfiles::class, 'Google_Service_AuthorizedBuyersMarketplace_Resource_BuyersPublisherProfiles');
