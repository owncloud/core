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
 * The "apps" collection of methods.
 * Typical usage is:
 *  <code>
 *   $apigeeService = new Google_Service_Apigee(...);
 *   $apps = $apigeeService->apps;
 *  </code>
 */
class Google_Service_Apigee_Resource_OrganizationsDevelopersApps extends Google_Service_Resource
{
  /**
   * Updates attributes for a developer app. This API replaces the current
   * attributes with those specified in the request. (apps.attributes)
   *
   * @param string $name Required. Name of the developer app. Use the following
   * structure in your request:
   * `organizations/{org}/developers/{developer_email}/apps/{app}`
   * @param Google_Service_Apigee_GoogleCloudApigeeV1Attributes $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1Attributes
   */
  public function attributes($name, Google_Service_Apigee_GoogleCloudApigeeV1Attributes $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('attributes', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1Attributes");
  }
  /**
   * Creates an app associated with a developer. This API associates the developer
   * app with the specified API product and auto-generates an API key for the app
   * to use in calls to API proxies inside that API product. The `name` is the
   * unique ID of the app that you can use in API calls. The `DisplayName` (set as
   * an attribute) appears in the UI. If you don't set the `DisplayName`
   * attribute, the `name` appears in the UI. (apps.create)
   *
   * @param string $parent Required. Name of the developer. Use the following
   * structure in your request: `organizations/{org}/developers/{developer_email}`
   * @param Google_Service_Apigee_GoogleCloudApigeeV1DeveloperApp $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1DeveloperApp
   */
  public function create($parent, Google_Service_Apigee_GoogleCloudApigeeV1DeveloperApp $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1DeveloperApp");
  }
  /**
   * Deletes a developer app. **Note**: The delete operation is asynchronous. The
   * developer app is deleted immediately, but its associated resources, such as
   * app keys or access tokens, may take anywhere from a few seconds to a few
   * minutes to be deleted. (apps.delete)
   *
   * @param string $name Required. Name of the developer app. Use the following
   * structure in your request:
   * `organizations/{org}/developers/{developer_email}/apps/{app}`
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1DeveloperApp
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1DeveloperApp");
  }
  /**
   * Manages access to a developer app by enabling you to: * Approve or revoke a
   * developer app * Generate a new consumer key and secret for a developer app To
   * approve or revoke a developer app, set the `action` query parameter to
   * `approved` or `revoked`, respectively, and the `Content-Type` header to
   * `application/octet-stream`. If a developer app is revoked, none of its API
   * keys are valid for API calls even though the keys are still `approved`. If
   * successful, the API call returns the following HTTP status code: `204 No
   * Content` To generate a new consumer key and secret for a developer app, pass
   * the new key/secret details. Rather than replace an existing key, this API
   * generates a new key. In this case, multiple key pairs may be associated with
   * a single developer app. Each key pair has an independent status (`approved`
   * or `revoked`) and expiration time. Any approved, non-expired key can be used
   * in an API call. For example, if you're using API key rotation, you can
   * generate new keys with expiration times that overlap keys that are going to
   * expire. You might also generate a new consumer key/secret if the security of
   * the original key/secret is compromised. The `keyExpiresIn` property defines
   * the expiration time for the API key in milliseconds. If you don't set this
   * property or set it to `-1`, the API key never expires. **Notes**: * When
   * generating a new key/secret, this API replaces the existing attributes,
   * notes, and callback URLs with those specified in the request. Include or
   * exclude any existing information that you want to retain or delete,
   * respectively. * To migrate existing consumer keys and secrets to hybrid from
   * another system, see the CreateDeveloperAppKey API.
   * (apps.generateKeyPairOrUpdateDeveloperAppStatus)
   *
   * @param string $name Required. Name of the developer app. Use the following
   * structure in your request:
   * `organizations/{org}/developers/{developer_email}/apps/{app}`
   * @param Google_Service_Apigee_GoogleCloudApigeeV1DeveloperApp $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string action Action. Valid values are `approve` or `revoke`.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1DeveloperApp
   */
  public function generateKeyPairOrUpdateDeveloperAppStatus($name, Google_Service_Apigee_GoogleCloudApigeeV1DeveloperApp $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('generateKeyPairOrUpdateDeveloperAppStatus', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1DeveloperApp");
  }
  /**
   * Returns the details for a developer app. (apps.get)
   *
   * @param string $name Required. Name of the developer app. Use the following
   * structure in your request:
   * `organizations/{org}/developers/{developer_email}/apps/{app}`
   * @param array $optParams Optional parameters.
   *
   * @opt_param string query **Note**: Must be used in conjunction with the
   * `entity` parameter. Set to `count` to return the number of API resources that
   * have been approved for access by a developer app in the specified Apigee
   * organization.
   * @opt_param string entity **Note**: Must be used in conjunction with the
   * `query` parameter. Set to `apiresources` to return the number of API
   * resources that have been approved for access by a developer app in the
   * specified Apigee organization.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1DeveloperApp
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1DeveloperApp");
  }
  /**
   * Lists all apps created by a developer in an Apigee organization. Optionally,
   * you can request an expanded view of the developer apps. A maximum of 100
   * developer apps are returned per API call. You can paginate the list of
   * deveoper apps returned using the `startKey` and `count` query parameters.
   * (apps.listOrganizationsDevelopersApps)
   *
   * @param string $parent Required. Name of the developer. Use the following
   * structure in your request: `organizations/{org}/developers/{developer_email}`
   * @param array $optParams Optional parameters.
   *
   * @opt_param string startKey **Note**: Must be used in conjunction with the
   * `count` parameter. Name of the developer app from which to start displaying
   * the list of developer apps. For example, if you're returning 50 developer
   * apps at a time (using the `count` query parameter), you can view developer
   * apps 50-99 by entering the name of the 50th developer app. The developer app
   * name is case sensitive.
   * @opt_param bool shallowExpand Optional. Specifies whether to expand the
   * results in shallow mode. Set to `true` to expand the results in shallow mode.
   * @opt_param string count Number of developer apps to return in the API call.
   * Use with the `startKey` parameter to provide more targeted filtering. The
   * limit is 1000.
   * @opt_param bool expand Optional. Specifies whether to expand the results. Set
   * to `true` to expand the results. This query parameter is not valid if you use
   * the `count` or `startKey` query parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1ListDeveloperAppsResponse
   */
  public function listOrganizationsDevelopersApps($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1ListDeveloperAppsResponse");
  }
  /**
   * Updates the details for a developer app. In addition, you can add an API
   * product to a developer app and automatically generate an API key for the app
   * to use when calling APIs in the API product. If you want to use an existing
   * API key for the API product, add the API product to the API key using the
   * UpdateDeveloperAppKey API. Using this API, you cannot update the following: *
   * App name as it is the primary key used to identify the app and cannot be
   * changed. * Scopes associated with the app. Instead, use the
   * ReplaceDeveloperAppKey API. This API replaces the existing attributes with
   * those specified in the request. Include or exclude any existing attributes
   * that you want to retain or delete, respectively. (apps.update)
   *
   * @param string $name Required. Name of the developer app. Use the following
   * structure in your request:
   * `organizations/{org}/developers/{developer_email}/apps/{app}`
   * @param Google_Service_Apigee_GoogleCloudApigeeV1DeveloperApp $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1DeveloperApp
   */
  public function update($name, Google_Service_Apigee_GoogleCloudApigeeV1DeveloperApp $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1DeveloperApp");
  }
}
