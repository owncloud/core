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
 * The "firebaseLinks" collection of methods.
 * Typical usage is:
 *  <code>
 *   $analyticsadminService = new Google_Service_GoogleAnalyticsAdmin(...);
 *   $firebaseLinks = $analyticsadminService->firebaseLinks;
 *  </code>
 */
class Google_Service_GoogleAnalyticsAdmin_Resource_PropertiesFirebaseLinks extends Google_Service_Resource
{
  /**
   * Creates a FirebaseLink. Properties can have at most one FirebaseLink.
   * (firebaseLinks.create)
   *
   * @param string $parent Required. Format: properties/{property_id} Example:
   * properties/1234
   * @param Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaFirebaseLink $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaFirebaseLink
   */
  public function create($parent, Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaFirebaseLink $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaFirebaseLink");
  }
  /**
   * Deletes a FirebaseLink on a property (firebaseLinks.delete)
   *
   * @param string $name Required. Format:
   * properties/{property_id}/firebaseLinks/{firebase_link_id} Example:
   * properties/1234/firebaseLinks/5678
   * @param array $optParams Optional parameters.
   * @return Google_Service_GoogleAnalyticsAdmin_GoogleProtobufEmpty
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_GoogleAnalyticsAdmin_GoogleProtobufEmpty");
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
   * @return Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaListFirebaseLinksResponse
   */
  public function listPropertiesFirebaseLinks($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaListFirebaseLinksResponse");
  }
  /**
   * Updates a FirebaseLink on a property (firebaseLinks.patch)
   *
   * @param string $name Output only. Example format:
   * properties/1234/firebaseLinks/5678
   * @param Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaFirebaseLink $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Required. The list of fields to be updated.
   * Field names must be in snake case (e.g., "field_to_update"). Omitted fields
   * will not be updated. To replace the entire entity, use one path with the
   * string "*" to match all fields.
   * @return Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaFirebaseLink
   */
  public function patch($name, Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaFirebaseLink $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaFirebaseLink");
  }
}
