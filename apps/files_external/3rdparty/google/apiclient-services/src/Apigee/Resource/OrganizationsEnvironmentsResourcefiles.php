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
use Google\Service\Apigee\GoogleCloudApigeeV1ListEnvironmentResourcesResponse;
use Google\Service\Apigee\GoogleCloudApigeeV1ResourceFile;

/**
 * The "resourcefiles" collection of methods.
 * Typical usage is:
 *  <code>
 *   $apigeeService = new Google\Service\Apigee(...);
 *   $resourcefiles = $apigeeService->resourcefiles;
 *  </code>
 */
class OrganizationsEnvironmentsResourcefiles extends \Google\Service\Resource
{
  /**
   * Creates a resource file. Specify the `Content-Type` as `application/octet-
   * stream` or `multipart/form-data`. For more information about resource files,
   * see [Resource files](https://cloud.google.com/apigee/docs/api-
   * platform/develop/resource-files). (resourcefiles.create)
   *
   * @param string $parent Required. Name of the environment in which to create
   * the resource file in the following format:
   * `organizations/{org}/environments/{env}`.
   * @param GoogleApiHttpBody $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string name Required. Name of the resource file. Must match the
   * regular expression: [a-zA-Z0-9:/\\!@#$%^&{}\[\]()+\-=,.~'` ]{1,255}
   * @opt_param string type Required. Resource file type. {{ resource_file_type }}
   * @return GoogleCloudApigeeV1ResourceFile
   */
  public function create($parent, GoogleApiHttpBody $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], GoogleCloudApigeeV1ResourceFile::class);
  }
  /**
   * Deletes a resource file. For more information about resource files, see
   * [Resource files](https://cloud.google.com/apigee/docs/api-platform/develop
   * /resource-files). (resourcefiles.delete)
   *
   * @param string $parent Required. Name of the environment in the following
   * format: `organizations/{org}/environments/{env}`.
   * @param string $type Required. Resource file type. {{ resource_file_type }}
   * @param string $name Required. ID of the resource file to delete. Must match
   * the regular expression: [a-zA-Z0-9:/\\!@#$%^&{}\[\]()+\-=,.~'` ]{1,255}
   * @param array $optParams Optional parameters.
   * @return GoogleCloudApigeeV1ResourceFile
   */
  public function delete($parent, $type, $name, $optParams = [])
  {
    $params = ['parent' => $parent, 'type' => $type, 'name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], GoogleCloudApigeeV1ResourceFile::class);
  }
  /**
   * Gets the contents of a resource file. For more information about resource
   * files, see [Resource files](https://cloud.google.com/apigee/docs/api-
   * platform/develop/resource-files). (resourcefiles.get)
   *
   * @param string $parent Required. Name of the environment in the following
   * format: `organizations/{org}/environments/{env}`.
   * @param string $type Required. Resource file type. {{ resource_file_type }}
   * @param string $name Required. ID of the resource file. Must match the regular
   * expression: [a-zA-Z0-9:/\\!@#$%^&{}\[\]()+\-=,.~'` ]{1,255}
   * @param array $optParams Optional parameters.
   * @return GoogleApiHttpBody
   */
  public function get($parent, $type, $name, $optParams = [])
  {
    $params = ['parent' => $parent, 'type' => $type, 'name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], GoogleApiHttpBody::class);
  }
  /**
   * Lists all resource files, optionally filtering by type. For more information
   * about resource files, see [Resource
   * files](https://cloud.google.com/apigee/docs/api-platform/develop/resource-
   * files). (resourcefiles.listOrganizationsEnvironmentsResourcefiles)
   *
   * @param string $parent Required. Name of the environment in which to list
   * resource files in the following format:
   * `organizations/{org}/environments/{env}`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string type Optional. Type of resource files to list. {{
   * resource_file_type }}
   * @return GoogleCloudApigeeV1ListEnvironmentResourcesResponse
   */
  public function listOrganizationsEnvironmentsResourcefiles($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], GoogleCloudApigeeV1ListEnvironmentResourcesResponse::class);
  }
  /**
   * Lists all resource files, optionally filtering by type. For more information
   * about resource files, see [Resource
   * files](https://cloud.google.com/apigee/docs/api-platform/develop/resource-
   * files). (resourcefiles.listEnvironmentResources)
   *
   * @param string $parent Required. Name of the environment in which to list
   * resource files in the following format:
   * `organizations/{org}/environments/{env}`.
   * @param string $type Optional. Type of resource files to list. {{
   * resource_file_type }}
   * @param array $optParams Optional parameters.
   * @return GoogleCloudApigeeV1ListEnvironmentResourcesResponse
   */
  public function listEnvironmentResources($parent, $type, $optParams = [])
  {
    $params = ['parent' => $parent, 'type' => $type];
    $params = array_merge($params, $optParams);
    return $this->call('listEnvironmentResources', [$params], GoogleCloudApigeeV1ListEnvironmentResourcesResponse::class);
  }
  /**
   * Updates a resource file. Specify the `Content-Type` as `application/octet-
   * stream` or `multipart/form-data`. For more information about resource files,
   * see [Resource files](https://cloud.google.com/apigee/docs/api-
   * platform/develop/resource-files). (resourcefiles.update)
   *
   * @param string $parent Required. Name of the environment in the following
   * format: `organizations/{org}/environments/{env}`.
   * @param string $type Required. Resource file type. {{ resource_file_type }}
   * @param string $name Required. ID of the resource file to update. Must match
   * the regular expression: [a-zA-Z0-9:/\\!@#$%^&{}\[\]()+\-=,.~'` ]{1,255}
   * @param GoogleApiHttpBody $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleCloudApigeeV1ResourceFile
   */
  public function update($parent, $type, $name, GoogleApiHttpBody $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'type' => $type, 'name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('update', [$params], GoogleCloudApigeeV1ResourceFile::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(OrganizationsEnvironmentsResourcefiles::class, 'Google_Service_Apigee_Resource_OrganizationsEnvironmentsResourcefiles');
