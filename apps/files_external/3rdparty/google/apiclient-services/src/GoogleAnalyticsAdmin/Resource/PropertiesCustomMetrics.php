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

use Google\Service\GoogleAnalyticsAdmin\GoogleAnalyticsAdminV1alphaArchiveCustomMetricRequest;
use Google\Service\GoogleAnalyticsAdmin\GoogleAnalyticsAdminV1alphaCustomMetric;
use Google\Service\GoogleAnalyticsAdmin\GoogleAnalyticsAdminV1alphaListCustomMetricsResponse;
use Google\Service\GoogleAnalyticsAdmin\GoogleProtobufEmpty;

/**
 * The "customMetrics" collection of methods.
 * Typical usage is:
 *  <code>
 *   $analyticsadminService = new Google\Service\GoogleAnalyticsAdmin(...);
 *   $customMetrics = $analyticsadminService->customMetrics;
 *  </code>
 */
class PropertiesCustomMetrics extends \Google\Service\Resource
{
  /**
   * Archives a CustomMetric on a property. (customMetrics.archive)
   *
   * @param string $name Required. The name of the CustomMetric to archive.
   * Example format: properties/1234/customMetrics/5678
   * @param GoogleAnalyticsAdminV1alphaArchiveCustomMetricRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleProtobufEmpty
   */
  public function archive($name, GoogleAnalyticsAdminV1alphaArchiveCustomMetricRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('archive', [$params], GoogleProtobufEmpty::class);
  }
  /**
   * Creates a CustomMetric. (customMetrics.create)
   *
   * @param string $parent Required. Example format: properties/1234
   * @param GoogleAnalyticsAdminV1alphaCustomMetric $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleAnalyticsAdminV1alphaCustomMetric
   */
  public function create($parent, GoogleAnalyticsAdminV1alphaCustomMetric $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], GoogleAnalyticsAdminV1alphaCustomMetric::class);
  }
  /**
   * Lookup for a single CustomMetric. (customMetrics.get)
   *
   * @param string $name Required. The name of the CustomMetric to get. Example
   * format: properties/1234/customMetrics/5678
   * @param array $optParams Optional parameters.
   * @return GoogleAnalyticsAdminV1alphaCustomMetric
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], GoogleAnalyticsAdminV1alphaCustomMetric::class);
  }
  /**
   * Lists CustomMetrics on a property.
   * (customMetrics.listPropertiesCustomMetrics)
   *
   * @param string $parent Required. Example format: properties/1234
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of resources to return. If
   * unspecified, at most 50 resources will be returned. The maximum value is 200
   * (higher values will be coerced to the maximum).
   * @opt_param string pageToken A page token, received from a previous
   * `ListCustomMetrics` call. Provide this to retrieve the subsequent page. When
   * paginating, all other parameters provided to `ListCustomMetrics` must match
   * the call that provided the page token.
   * @return GoogleAnalyticsAdminV1alphaListCustomMetricsResponse
   */
  public function listPropertiesCustomMetrics($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], GoogleAnalyticsAdminV1alphaListCustomMetricsResponse::class);
  }
  /**
   * Updates a CustomMetric on a property. (customMetrics.patch)
   *
   * @param string $name Output only. Resource name for this CustomMetric
   * resource. Format: properties/{property}/customMetrics/{customMetric}
   * @param GoogleAnalyticsAdminV1alphaCustomMetric $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Required. The list of fields to be updated.
   * Omitted fields will not be updated. To replace the entire entity, use one
   * path with the string "*" to match all fields.
   * @return GoogleAnalyticsAdminV1alphaCustomMetric
   */
  public function patch($name, GoogleAnalyticsAdminV1alphaCustomMetric $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], GoogleAnalyticsAdminV1alphaCustomMetric::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PropertiesCustomMetrics::class, 'Google_Service_GoogleAnalyticsAdmin_Resource_PropertiesCustomMetrics');
