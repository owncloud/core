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

namespace Google\Service\ShoppingContent\Resource;

use Google\Service\ShoppingContent\Css;
use Google\Service\ShoppingContent\LabelIds;
use Google\Service\ShoppingContent\ListCssesResponse;

/**
 * The "csses" collection of methods.
 * Typical usage is:
 *  <code>
 *   $contentService = new Google\Service\ShoppingContent(...);
 *   $csses = $contentService->csses;
 *  </code>
 */
class Csses extends \Google\Service\Resource
{
  /**
   * Retrieves a single CSS domain by ID. (csses.get)
   *
   * @param string $cssGroupId Required. The ID of the managing account. If this
   * parameter is not the same as [cssDomainId](#cssDomainId), then this ID must
   * be a CSS group ID and `cssDomainId` must be the ID of a CSS domain affiliated
   * with this group.
   * @param string $cssDomainId Required. The ID of the CSS domain to return.
   * @param array $optParams Optional parameters.
   * @return Css
   */
  public function get($cssGroupId, $cssDomainId, $optParams = [])
  {
    $params = ['cssGroupId' => $cssGroupId, 'cssDomainId' => $cssDomainId];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Css::class);
  }
  /**
   * Lists CSS domains affiliated with a CSS group. (csses.listCsses)
   *
   * @param string $cssGroupId Required. The CSS group ID of CSS domains to be
   * listed.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of CSS domains to return. The
   * service may return fewer than this value. If unspecified, at most 50 CSS
   * domains will be returned. The maximum value is 1000; values above 1000 will
   * be coerced to 1000.
   * @opt_param string pageToken A page token, received from a previous
   * `ListCsses` call. Provide this to retrieve the subsequent page. When
   * paginating, all other parameters provided to `ListCsses` must match the call
   * that provided the page token.
   * @return ListCssesResponse
   */
  public function listCsses($cssGroupId, $optParams = [])
  {
    $params = ['cssGroupId' => $cssGroupId];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListCssesResponse::class);
  }
  /**
   * Updates labels that are assigned to a CSS domain by its CSS group.
   * (csses.updatelabels)
   *
   * @param string $cssGroupId Required. The CSS group ID of the updated CSS
   * domain.
   * @param string $cssDomainId Required. The ID of the updated CSS domain.
   * @param LabelIds $postBody
   * @param array $optParams Optional parameters.
   * @return Css
   */
  public function updatelabels($cssGroupId, $cssDomainId, LabelIds $postBody, $optParams = [])
  {
    $params = ['cssGroupId' => $cssGroupId, 'cssDomainId' => $cssDomainId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('updatelabels', [$params], Css::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Csses::class, 'Google_Service_ShoppingContent_Resource_Csses');
