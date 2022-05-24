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

namespace Google\Service\YouTube\Resource;

use Google\Service\YouTube\ThirdPartyLink;

/**
 * The "thirdPartyLinks" collection of methods.
 * Typical usage is:
 *  <code>
 *   $youtubeService = new Google\Service\YouTube(...);
 *   $thirdPartyLinks = $youtubeService->thirdPartyLinks;
 *  </code>
 */
class ThirdPartyLinks extends \Google\Service\Resource
{
  /**
   * Deletes a resource. (thirdPartyLinks.delete)
   *
   * @param string $linkingToken Delete the partner links with the given linking
   * token.
   * @param string $type Type of the link to be deleted.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string externalChannelId Channel ID to which changes should be
   * applied, for delegation.
   * @opt_param string part Do not use. Required for compatibility.
   */
  public function delete($linkingToken, $type, $optParams = [])
  {
    $params = ['linkingToken' => $linkingToken, 'type' => $type];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params]);
  }
  /**
   * Inserts a new resource into this collection. (thirdPartyLinks.insert)
   *
   * @param string|array $part The *part* parameter specifies the thirdPartyLink
   * resource parts that the API request and response will include. Supported
   * values are linkingToken, status, and snippet.
   * @param ThirdPartyLink $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string externalChannelId Channel ID to which changes should be
   * applied, for delegation.
   * @return ThirdPartyLink
   */
  public function insert($part, ThirdPartyLink $postBody, $optParams = [])
  {
    $params = ['part' => $part, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('insert', [$params], ThirdPartyLink::class);
  }
  /**
   * Retrieves a list of resources, possibly filtered.
   * (thirdPartyLinks.listThirdPartyLinks)
   *
   * @param string|array $part The *part* parameter specifies the thirdPartyLink
   * resource parts that the API response will include. Supported values are
   * linkingToken, status, and snippet.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string externalChannelId Channel ID to which changes should be
   * applied, for delegation.
   * @opt_param string linkingToken Get a third party link with the given linking
   * token.
   * @opt_param string type Get a third party link of the given type.
   * @return ThirdPartyLink
   */
  public function listThirdPartyLinks($part, $optParams = [])
  {
    $params = ['part' => $part];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ThirdPartyLink::class);
  }
  /**
   * Updates an existing resource. (thirdPartyLinks.update)
   *
   * @param string|array $part The *part* parameter specifies the thirdPartyLink
   * resource parts that the API request and response will include. Supported
   * values are linkingToken, status, and snippet.
   * @param ThirdPartyLink $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string externalChannelId Channel ID to which changes should be
   * applied, for delegation.
   * @return ThirdPartyLink
   */
  public function update($part, ThirdPartyLink $postBody, $optParams = [])
  {
    $params = ['part' => $part, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('update', [$params], ThirdPartyLink::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ThirdPartyLinks::class, 'Google_Service_YouTube_Resource_ThirdPartyLinks');
