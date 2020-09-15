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
 * The "thirdPartyLinks" collection of methods.
 * Typical usage is:
 *  <code>
 *   $youtubeService = new Google_Service_YouTube(...);
 *   $thirdPartyLinks = $youtubeService->thirdPartyLinks;
 *  </code>
 */
class Google_Service_YouTube_Resource_ThirdPartyLinks extends Google_Service_Resource
{
  /**
   * Deletes a resource. (thirdPartyLinks.delete)
   *
   * @param string $linkingToken Delete the partner links with the given linking
   * token.
   * @param string $type Type of the link to be deleted.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string part Do not use. Required for compatibility.
   */
  public function delete($linkingToken, $type, $optParams = array())
  {
    $params = array('linkingToken' => $linkingToken, 'type' => $type);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
  /**
   * Inserts a new resource into this collection. (thirdPartyLinks.insert)
   *
   * @param string|array $part The *part* parameter specifies the thirdPartyLink
   * resource parts that the API request and response will include. Supported
   * values are linkingToken, status, and snippet.
   * @param Google_Service_YouTube_ThirdPartyLink $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_YouTube_ThirdPartyLink
   */
  public function insert($part, Google_Service_YouTube_ThirdPartyLink $postBody, $optParams = array())
  {
    $params = array('part' => $part, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "Google_Service_YouTube_ThirdPartyLink");
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
   * @opt_param string type Get a third party link of the given type.
   * @opt_param string linkingToken Get a third party link with the given linking
   * token.
   * @return Google_Service_YouTube_ThirdPartyLink
   */
  public function listThirdPartyLinks($part, $optParams = array())
  {
    $params = array('part' => $part);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_YouTube_ThirdPartyLink");
  }
  /**
   * Updates an existing resource. (thirdPartyLinks.update)
   *
   * @param string|array $part The *part* parameter specifies the thirdPartyLink
   * resource parts that the API request and response will include. Supported
   * values are linkingToken, status, and snippet.
   * @param Google_Service_YouTube_ThirdPartyLink $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_YouTube_ThirdPartyLink
   */
  public function update($part, Google_Service_YouTube_ThirdPartyLink $postBody, $optParams = array())
  {
    $params = array('part' => $part, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_YouTube_ThirdPartyLink");
  }
}
