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

namespace Google\Service\Apigee\Resource;

use Google\Service\Apigee\GoogleApiHttpBody;
use Google\Service\Apigee\GoogleCloudApigeeV1ApiProxy;
use Google\Service\Apigee\GoogleCloudApigeeV1ApiProxyRevision;
use Google\Service\Apigee\GoogleCloudApigeeV1ListApiProxiesResponse;

/**
 * The "apis" collection of methods.
 * Typical usage is:
 *  <code>
 *   $apigeeService = new Google\Service\Apigee(...);
 *   $apis = $apigeeService->apis;
 *  </code>
 */
class OrganizationsApis extends \Google\Service\Resource
{
  /**
   * Creates an API proxy. The API proxy created will not be accessible at runtime
   * until it is deployed to an environment. Create a new API proxy by setting the
   * `name` query parameter to the name of the API proxy. Import an API proxy
   * configuration bundle stored in zip format on your local machine to your
   * organization by doing the following: * Set the `name` query parameter to the
   * name of the API proxy. * Set the `action` query parameter to `import`. * Set
   * the `Content-Type` header to `multipart/form-data`. * Pass as a file the name
   * of API proxy configuration bundle stored in zip format on your local machine
   * using the `file` form field. **Note**: To validate the API proxy
   * configuration bundle only without importing it, set the `action` query
   * parameter to `validate`. When importing an API proxy configuration bundle, if
   * the API proxy does not exist, it will be created. If the API proxy exists,
   * then a new revision is created. Invalid API proxy configurations are
   * rejected, and a list of validation errors is returned to the client.
   * (apis.create)
   *
   * @param string $parent Required. Name of the organization in the following
   * format: `organizations/{org}`
   * @param GoogleApiHttpBody $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string action Action to perform when importing an API proxy
   * configuration bundle. Set this parameter to one of the following values: *
   * `import` to import the API proxy configuration bundle. * `validate` to
   * validate the API proxy configuration bundle without importing it.
   * @opt_param string name Name of the API proxy. Restrict the characters used
   * to: A-Za-z0-9._-
   * @opt_param bool validate Ignored. All uploads are validated regardless of the
   * value of this field. Maintained for compatibility with Apigee Edge API.
   * @return GoogleCloudApigeeV1ApiProxyRevision
   */
  public function create($parent, GoogleApiHttpBody $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], GoogleCloudApigeeV1ApiProxyRevision::class);
  }
  /**
   * Deletes an API proxy and all associated endpoints, policies, resources, and
   * revisions. The API proxy must be undeployed before you can delete it.
   * (apis.delete)
   *
   * @param string $name Required. Name of the API proxy in the following format:
   * `organizations/{org}/apis/{api}`
   * @param array $optParams Optional parameters.
   * @return GoogleCloudApigeeV1ApiProxy
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], GoogleCloudApigeeV1ApiProxy::class);
  }
  /**
   * Gets an API proxy including a list of existing revisions. (apis.get)
   *
   * @param string $name Required. Name of the API proxy in the following format:
   * `organizations/{org}/apis/{api}`
   * @param array $optParams Optional parameters.
   * @return GoogleCloudApigeeV1ApiProxy
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], GoogleCloudApigeeV1ApiProxy::class);
  }
  /**
   * Lists the names of all API proxies in an organization. The names returned
   * correspond to the names defined in the configuration files for each API
   * proxy. (apis.listOrganizationsApis)
   *
   * @param string $parent Required. Name of the organization in the following
   * format: `organizations/{org}`
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool includeMetaData Flag that specifies whether to include API
   * proxy metadata in the response.
   * @opt_param bool includeRevisions Flag that specifies whether to include a
   * list of revisions in the response.
   * @return GoogleCloudApigeeV1ListApiProxiesResponse
   */
  public function listOrganizationsApis($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], GoogleCloudApigeeV1ListApiProxiesResponse::class);
  }
  /**
   * Updates an existing API proxy. (apis.patch)
   *
   * @param string $name Required. API proxy to update in the following format:
   * `organizations/{org}/apis/{api}`
   * @param GoogleCloudApigeeV1ApiProxy $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Required. The list of fields to update.
   * @return GoogleCloudApigeeV1ApiProxy
   */
  public function patch($name, GoogleCloudApigeeV1ApiProxy $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], GoogleCloudApigeeV1ApiProxy::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(OrganizationsApis::class, 'Google_Service_Apigee_Resource_OrganizationsApis');
