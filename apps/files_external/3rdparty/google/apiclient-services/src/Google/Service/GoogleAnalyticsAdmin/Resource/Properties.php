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
 * The "properties" collection of methods.
 * Typical usage is:
 *  <code>
 *   $analyticsadminService = new Google_Service_GoogleAnalyticsAdmin(...);
 *   $properties = $analyticsadminService->properties;
 *  </code>
 */
class Google_Service_GoogleAnalyticsAdmin_Resource_Properties extends Google_Service_Resource
{
  /**
   * Creates an "GA4" property with the specified location and attributes.
   * (properties.create)
   *
   * @param Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaProperty $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaProperty
   */
  public function create(Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaProperty $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaProperty");
  }
  /**
   * Marks target Property as soft-deleted (ie: "trashed") and returns it. This
   * API does not have a method to restore soft-deleted properties. However, they
   * can be restored using the Trash Can UI. If the properties are not restored
   * before the expiration time, the Property and all child resources (eg:
   * GoogleAdsLinks, Streams, UserLinks) will be permanently purged.
   * https://support.google.com/analytics/answer/6154772 Returns an error if the
   * target is not found, or is not an GA4 Property. (properties.delete)
   *
   * @param string $name Required. The name of the Property to soft-delete.
   * Format: properties/{property_id} Example: "properties/1000"
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
   * Lookup for a single "GA4" Property. (properties.get)
   *
   * @param string $name Required. The name of the property to lookup. Format:
   * properties/{property_id} Example: "properties/1000"
   * @param array $optParams Optional parameters.
   * @return Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaProperty
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaProperty");
  }
  /**
   * Returns child Properties under the specified parent Account. Only "GA4"
   * properties will be returned. Properties will be excluded if the caller does
   * not have access. Soft-deleted (ie: "trashed") properties are excluded by
   * default. Returns an empty list if no relevant properties are found.
   * (properties.listProperties)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Required. An expression for filtering the results of
   * the request. Fields eligible for filtering are: `parent:`(The resource name
   * of the parent account) or `firebase_project:`(The id or number of the linked
   * firebase project). Some examples of filters: ``` | Filter | Description |
   * |-----------------------------|-------------------------------------------| |
   * parent:accounts/123 | The account with account id: 123. | | firebase_project
   * :project-id | The firebase project with id: project-id. | |
   * firebase_project:123 | The firebase project with number: 123. | ```
   * @opt_param int pageSize The maximum number of resources to return. The
   * service may return fewer than this value, even if there are additional pages.
   * If unspecified, at most 50 resources will be returned. The maximum value is
   * 200; (higher values will be coerced to the maximum)
   * @opt_param string pageToken A page token, received from a previous
   * `ListProperties` call. Provide this to retrieve the subsequent page. When
   * paginating, all other parameters provided to `ListProperties` must match the
   * call that provided the page token.
   * @opt_param bool showDeleted Whether to include soft-deleted (ie: "trashed")
   * Properties in the results. Properties can be inspected to determine whether
   * they are deleted or not.
   * @return Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaListPropertiesResponse
   */
  public function listProperties($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaListPropertiesResponse");
  }
  /**
   * Updates a property. (properties.patch)
   *
   * @param string $name Output only. Resource name of this property. Format:
   * properties/{property_id} Example: "properties/1000"
   * @param Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaProperty $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Required. The list of fields to be updated.
   * Field names must be in snake case (e.g., "field_to_update"). Omitted fields
   * will not be updated. To replace the entire entity, use one path with the
   * string "*" to match all fields.
   * @return Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaProperty
   */
  public function patch($name, Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaProperty $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaProperty");
  }
}
