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
 * The "resourcefiles" collection of methods.
 * Typical usage is:
 *  <code>
 *   $apigeeService = new Google_Service_Apigee(...);
 *   $resourcefiles = $apigeeService->resourcefiles;
 *  </code>
 */
class Google_Service_Apigee_Resource_OrganizationsEnvironmentsResourcefiles extends Google_Service_Resource
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
   * @param Google_Service_Apigee_GoogleApiHttpBody $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string type Required. Resource file type. {{ resource_file_type }}
   * @opt_param string name Required. Name of the resource file. Must match the
   * regular expression: [a-zA-Z0-9:/\\!@#$%^&{}\[\]()+\-=,.~'` ]{1,255}
   * @return Google_Service_Apigee_GoogleCloudApigeeV1ResourceFile
   */
  public function create($parent, Google_Service_Apigee_GoogleApiHttpBody $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1ResourceFile");
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
   * @return Google_Service_Apigee_GoogleCloudApigeeV1ResourceFile
   */
  public function delete($parent, $type, $name, $optParams = array())
  {
    $params = array('parent' => $parent, 'type' => $type, 'name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1ResourceFile");
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
   * @return Google_Service_Apigee_GoogleApiHttpBody
   */
  public function get($parent, $type, $name, $optParams = array())
  {
    $params = array('parent' => $parent, 'type' => $type, 'name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Apigee_GoogleApiHttpBody");
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
   * @return Google_Service_Apigee_GoogleCloudApigeeV1ListEnvironmentResourcesResponse
   */
  public function listOrganizationsEnvironmentsResourcefiles($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1ListEnvironmentResourcesResponse");
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
   * @return Google_Service_Apigee_GoogleCloudApigeeV1ListEnvironmentResourcesResponse
   */
  public function listEnvironmentResources($parent, $type, $optParams = array())
  {
    $params = array('parent' => $parent, 'type' => $type);
    $params = array_merge($params, $optParams);
    return $this->call('listEnvironmentResources', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1ListEnvironmentResourcesResponse");
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
   * @param Google_Service_Apigee_GoogleApiHttpBody $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1ResourceFile
   */
  public function update($parent, $type, $name, Google_Service_Apigee_GoogleApiHttpBody $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'type' => $type, 'name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1ResourceFile");
  }
}
