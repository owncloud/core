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

use Google\Service\GoogleAnalyticsAdmin\GoogleAnalyticsAdminV1alphaArchiveAudienceRequest;
use Google\Service\GoogleAnalyticsAdmin\GoogleAnalyticsAdminV1alphaAudience;
use Google\Service\GoogleAnalyticsAdmin\GoogleAnalyticsAdminV1alphaListAudiencesResponse;
use Google\Service\GoogleAnalyticsAdmin\GoogleProtobufEmpty;

/**
 * The "audiences" collection of methods.
 * Typical usage is:
 *  <code>
 *   $analyticsadminService = new Google\Service\GoogleAnalyticsAdmin(...);
 *   $audiences = $analyticsadminService->audiences;
 *  </code>
 */
class PropertiesAudiences extends \Google\Service\Resource
{
  /**
   * Archives an Audience on a property. (audiences.archive)
   *
   * @param string $name Required. Example format: properties/1234/audiences/5678
   * @param GoogleAnalyticsAdminV1alphaArchiveAudienceRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleProtobufEmpty
   */
  public function archive($name, GoogleAnalyticsAdminV1alphaArchiveAudienceRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('archive', [$params], GoogleProtobufEmpty::class);
  }
  /**
   * Creates an Audience. (audiences.create)
   *
   * @param string $parent Required. Example format: properties/1234
   * @param GoogleAnalyticsAdminV1alphaAudience $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleAnalyticsAdminV1alphaAudience
   */
  public function create($parent, GoogleAnalyticsAdminV1alphaAudience $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], GoogleAnalyticsAdminV1alphaAudience::class);
  }
  /**
   * Lookup for a single Audience. Audiences created before 2020 may not be
   * supported. Default audiences will not show filter definitions.
   * (audiences.get)
   *
   * @param string $name Required. The name of the Audience to get. Example
   * format: properties/1234/audiences/5678
   * @param array $optParams Optional parameters.
   * @return GoogleAnalyticsAdminV1alphaAudience
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], GoogleAnalyticsAdminV1alphaAudience::class);
  }
  /**
   * Lists Audiences on a property. Audiences created before 2020 may not be
   * supported. Default audiences will not show filter definitions.
   * (audiences.listPropertiesAudiences)
   *
   * @param string $parent Required. Example format: properties/1234
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of resources to return. If
   * unspecified, at most 50 resources will be returned. The maximum value is 200
   * (higher values will be coerced to the maximum).
   * @opt_param string pageToken A page token, received from a previous
   * `ListAudiences` call. Provide this to retrieve the subsequent page. When
   * paginating, all other parameters provided to `ListAudiences` must match the
   * call that provided the page token.
   * @return GoogleAnalyticsAdminV1alphaListAudiencesResponse
   */
  public function listPropertiesAudiences($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], GoogleAnalyticsAdminV1alphaListAudiencesResponse::class);
  }
  /**
   * Updates an Audience on a property. (audiences.patch)
   *
   * @param string $name Output only. The resource name for this Audience
   * resource. Format: properties/{propertyId}/audiences/{audienceId}
   * @param GoogleAnalyticsAdminV1alphaAudience $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Required. The list of fields to be updated.
   * Field names must be in snake case (e.g., "field_to_update"). Omitted fields
   * will not be updated. To replace the entire entity, use one path with the
   * string "*" to match all fields.
   * @return GoogleAnalyticsAdminV1alphaAudience
   */
  public function patch($name, GoogleAnalyticsAdminV1alphaAudience $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], GoogleAnalyticsAdminV1alphaAudience::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PropertiesAudiences::class, 'Google_Service_GoogleAnalyticsAdmin_Resource_PropertiesAudiences');
