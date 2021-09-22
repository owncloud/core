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

use Google\Service\GoogleAnalyticsAdmin\GoogleAnalyticsAdminV1alphaArchiveCustomDimensionRequest;
use Google\Service\GoogleAnalyticsAdmin\GoogleAnalyticsAdminV1alphaCustomDimension;
use Google\Service\GoogleAnalyticsAdmin\GoogleAnalyticsAdminV1alphaListCustomDimensionsResponse;
use Google\Service\GoogleAnalyticsAdmin\GoogleProtobufEmpty;

/**
 * The "customDimensions" collection of methods.
 * Typical usage is:
 *  <code>
 *   $analyticsadminService = new Google\Service\GoogleAnalyticsAdmin(...);
 *   $customDimensions = $analyticsadminService->customDimensions;
 *  </code>
 */
class PropertiesCustomDimensions extends \Google\Service\Resource
{
  /**
   * Archives a CustomDimension on a property. (customDimensions.archive)
   *
   * @param string $name Required. The name of the CustomDimension to archive.
   * Example format: properties/1234/customDimensions/5678
   * @param GoogleAnalyticsAdminV1alphaArchiveCustomDimensionRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleProtobufEmpty
   */
  public function archive($name, GoogleAnalyticsAdminV1alphaArchiveCustomDimensionRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('archive', [$params], GoogleProtobufEmpty::class);
  }
  /**
   * Creates a CustomDimension. (customDimensions.create)
   *
   * @param string $parent Required. Example format: properties/1234
   * @param GoogleAnalyticsAdminV1alphaCustomDimension $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleAnalyticsAdminV1alphaCustomDimension
   */
  public function create($parent, GoogleAnalyticsAdminV1alphaCustomDimension $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], GoogleAnalyticsAdminV1alphaCustomDimension::class);
  }
  /**
   * Lookup for a single CustomDimension. (customDimensions.get)
   *
   * @param string $name Required. The name of the CustomDimension to get. Example
   * format: properties/1234/customDimensions/5678
   * @param array $optParams Optional parameters.
   * @return GoogleAnalyticsAdminV1alphaCustomDimension
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], GoogleAnalyticsAdminV1alphaCustomDimension::class);
  }
  /**
   * Lists CustomDimensions on a property.
   * (customDimensions.listPropertiesCustomDimensions)
   *
   * @param string $parent Required. Example format: properties/1234
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of resources to return. If
   * unspecified, at most 50 resources will be returned. The maximum value is 200
   * (higher values will be coerced to the maximum).
   * @opt_param string pageToken A page token, received from a previous
   * `ListCustomDimensions` call. Provide this to retrieve the subsequent page.
   * When paginating, all other parameters provided to `ListCustomDimensions` must
   * match the call that provided the page token.
   * @return GoogleAnalyticsAdminV1alphaListCustomDimensionsResponse
   */
  public function listPropertiesCustomDimensions($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], GoogleAnalyticsAdminV1alphaListCustomDimensionsResponse::class);
  }
  /**
   * Updates a CustomDimension on a property. (customDimensions.patch)
   *
   * @param string $name Output only. Resource name for this CustomDimension
   * resource. Format: properties/{property}/customDimensions/{customDimension}
   * @param GoogleAnalyticsAdminV1alphaCustomDimension $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Required. The list of fields to be updated.
   * Omitted fields will not be updated. To replace the entire entity, use one
   * path with the string "*" to match all fields.
   * @return GoogleAnalyticsAdminV1alphaCustomDimension
   */
  public function patch($name, GoogleAnalyticsAdminV1alphaCustomDimension $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], GoogleAnalyticsAdminV1alphaCustomDimension::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PropertiesCustomDimensions::class, 'Google_Service_GoogleAnalyticsAdmin_Resource_PropertiesCustomDimensions');
