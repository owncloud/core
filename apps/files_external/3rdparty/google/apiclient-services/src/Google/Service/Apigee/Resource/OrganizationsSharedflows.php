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
 * The "sharedflows" collection of methods.
 * Typical usage is:
 *  <code>
 *   $apigeeService = new Google_Service_Apigee(...);
 *   $sharedflows = $apigeeService->sharedflows;
 *  </code>
 */
class Google_Service_Apigee_Resource_OrganizationsSharedflows extends Google_Service_Resource
{
  /**
   * Uploads a ZIP-formatted shared flow configuration bundle to an organization.
   * If the shared flow already exists, this creates a new revision of it. If the
   * shared flow does not exist, this creates it.
   *
   * Once imported, the shared flow revision must be deployed before it can be
   * accessed at runtime.
   *
   * The size limit of a shared flow bundle is 15 MB. (sharedflows.create)
   *
   * @param string $parent Required. The name of the parent organization under
   * which to create the shared flow. Must be of the form:
   * `organizations/{organization_id}`
   * @param Google_Service_Apigee_GoogleApiHttpBody $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string action Required. Must be set to either `import` or
   * `validate`.
   * @opt_param string name Required. The name to give the shared flow
   * @return Google_Service_Apigee_GoogleCloudApigeeV1SharedFlowRevision
   */
  public function create($parent, Google_Service_Apigee_GoogleApiHttpBody $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1SharedFlowRevision");
  }
  /**
   * Deletes a shared flow and all it's revisions. The shared flow must be
   * undeployed before you can delete it. (sharedflows.delete)
   *
   * @param string $name Required. shared flow name of the form:
   * `organizations/{organization_id}/sharedflows/{shared_flow_id}`
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1SharedFlow
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1SharedFlow");
  }
  /**
   * Gets a shared flow by name, including a list of its revisions.
   * (sharedflows.get)
   *
   * @param string $name Required. The name of the shared flow to get. Must be of
   * the form:   `organizations/{organization_id}/sharedflows/{shared_flow_id}`
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1SharedFlow
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1SharedFlow");
  }
  /**
   * Lists all shared flows in the organization.
   * (sharedflows.listOrganizationsSharedflows)
   *
   * @param string $parent Required. The name of the parent organization under
   * which to get shared flows. Must be of the form:
   * `organizations/{organization_id}`
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool includeRevisions Indicates whether to include a list of
   * revisions in the response.
   * @opt_param bool includeMetaData Indicates whether to include shared flow
   * metadata in the response.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1ListSharedFlowsResponse
   */
  public function listOrganizationsSharedflows($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1ListSharedFlowsResponse");
  }
}
