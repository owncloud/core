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

use Google\Service\GoogleAnalyticsAdmin\GoogleAnalyticsAdminV1alphaFirebaseLink;
use Google\Service\GoogleAnalyticsAdmin\GoogleAnalyticsAdminV1alphaListFirebaseLinksResponse;
use Google\Service\GoogleAnalyticsAdmin\GoogleProtobufEmpty;

/**
 * The "firebaseLinks" collection of methods.
 * Typical usage is:
 *  <code>
 *   $analyticsadminService = new Google\Service\GoogleAnalyticsAdmin(...);
 *   $firebaseLinks = $analyticsadminService->firebaseLinks;
 *  </code>
 */
class PropertiesFirebaseLinks extends \Google\Service\Resource
{
  /**
   * Creates a FirebaseLink. Properties can have at most one FirebaseLink.
   * (firebaseLinks.create)
   *
   * @param string $parent Required. Format: properties/{property_id} Example:
   * properties/1234
   * @param GoogleAnalyticsAdminV1alphaFirebaseLink $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleAnalyticsAdminV1alphaFirebaseLink
   */
  public function create($parent, GoogleAnalyticsAdminV1alphaFirebaseLink $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], GoogleAnalyticsAdminV1alphaFirebaseLink::class);
  }
  /**
   * Deletes a FirebaseLink on a property (firebaseLinks.delete)
   *
   * @param string $name Required. Format:
   * properties/{property_id}/firebaseLinks/{firebase_link_id} Example:
   * properties/1234/firebaseLinks/5678
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
   * Lists FirebaseLinks on a property. Properties can have at most one
   * FirebaseLink. (firebaseLinks.listPropertiesFirebaseLinks)
   *
   * @param string $parent Required. Format: properties/{property_id} Example:
   * properties/1234
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of resources to return. The
   * service may return fewer than this value, even if there are additional pages.
   * If unspecified, at most 50 resources will be returned. The maximum value is
   * 200; (higher values will be coerced to the maximum)
   * @opt_param string pageToken A page token, received from a previous
   * `ListFirebaseLinks` call. Provide this to retrieve the subsequent page. When
   * paginating, all other parameters provided to `ListProperties` must match the
   * call that provided the page token.
   * @return GoogleAnalyticsAdminV1alphaListFirebaseLinksResponse
   */
  public function listPropertiesFirebaseLinks($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], GoogleAnalyticsAdminV1alphaListFirebaseLinksResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PropertiesFirebaseLinks::class, 'Google_Service_GoogleAnalyticsAdmin_Resource_PropertiesFirebaseLinks');
