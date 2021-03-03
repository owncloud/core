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
 * The "services" collection of methods.
 * Typical usage is:
 *  <code>
 *   $metastoreService = new Google_Service_DataprocMetastore(...);
 *   $services = $metastoreService->services;
 *  </code>
 */
class Google_Service_DataprocMetastore_Resource_ProjectsLocationsServices extends Google_Service_Resource
{
  /**
   * Creates a metastore service in a project and location. (services.create)
   *
   * @param string $parent Required. The relative resource name of the location in
   * which to create a metastore service, in the following
   * form:"projects/{project_number}/locations/{location_id}".
   * @param Google_Service_DataprocMetastore_Service $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string requestId Optional. A request ID. Specify a unique request
   * ID to allow the server to ignore the request if it has completed. The server
   * will ignore subsequent requests that provide a duplicate request ID for at
   * least 60 minutes after the first request.For example, if an initial request
   * times out, followed by another request with the same request ID, the server
   * ignores the second request to prevent the creation of duplicate
   * commitments.The request ID must be a valid UUID
   * (https://en.wikipedia.org/wiki/Universally_unique_identifier#Format) A zero
   * UUID (00000000-0000-0000-0000-000000000000) is not supported.
   * @opt_param string serviceId Required. The ID of the metastore service, which
   * is used as the final component of the metastore service's name.This value
   * must be between 2 and 63 characters long inclusive, begin with a letter, end
   * with a letter or number, and consist of alpha-numeric ASCII characters or
   * hyphens.
   * @return Google_Service_DataprocMetastore_Operation
   */
  public function create($parent, Google_Service_DataprocMetastore_Service $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_DataprocMetastore_Operation");
  }
  /**
   * Deletes a single service. (services.delete)
   *
   * @param string $name Required. The relative resource name of the metastore
   * service to delete, in the following form:"projects/{project_number}/locations
   * /{location_id}/services/{service_id}".
   * @param array $optParams Optional parameters.
   *
   * @opt_param string requestId Optional. A request ID. Specify a unique request
   * ID to allow the server to ignore the request if it has completed. The server
   * will ignore subsequent requests that provide a duplicate request ID for at
   * least 60 minutes after the first request.For example, if an initial request
   * times out, followed by another request with the same request ID, the server
   * ignores the second request to prevent the creation of duplicate
   * commitments.The request ID must be a valid UUID
   * (https://en.wikipedia.org/wiki/Universally_unique_identifier#Format) A zero
   * UUID (00000000-0000-0000-0000-000000000000) is not supported.
   * @return Google_Service_DataprocMetastore_Operation
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_DataprocMetastore_Operation");
  }
  /**
   * Exports metadata from a service. (services.exportMetadata)
   *
   * @param string $service Required. The relative resource name of the metastore
   * service to run export, in the following
   * form:"projects/{project_id}/locations/{location_id}/services/{service_id}
   * @param Google_Service_DataprocMetastore_ExportMetadataRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_DataprocMetastore_Operation
   */
  public function exportMetadata($service, Google_Service_DataprocMetastore_ExportMetadataRequest $postBody, $optParams = array())
  {
    $params = array('service' => $service, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('exportMetadata', array($params), "Google_Service_DataprocMetastore_Operation");
  }
  /**
   * Gets the details of a single service. (services.get)
   *
   * @param string $name Required. The relative resource name of the metastore
   * service to retrieve, in the following form:"projects/{project_number}/locatio
   * ns/{location_id}/services/{service_id}".
   * @param array $optParams Optional parameters.
   * @return Google_Service_DataprocMetastore_Service
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_DataprocMetastore_Service");
  }
  /**
   * Gets the access control policy for a resource. Returns an empty policy if the
   * resource exists and does not have a policy set. (services.getIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which the policy is being
   * requested. See the operation documentation for the appropriate value for this
   * field.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int options.requestedPolicyVersion Optional. The policy format
   * version to be returned.Valid values are 0, 1, and 3. Requests specifying an
   * invalid value will be rejected.Requests for policies with any conditional
   * bindings must specify version 3. Policies without any conditional bindings
   * may specify any valid value or leave the field unset.To learn which resources
   * support conditions in their IAM policies, see the IAM documentation
   * (https://cloud.google.com/iam/help/conditions/resource-policies).
   * @return Google_Service_DataprocMetastore_Policy
   */
  public function getIamPolicy($resource, $optParams = array())
  {
    $params = array('resource' => $resource);
    $params = array_merge($params, $optParams);
    return $this->call('getIamPolicy', array($params), "Google_Service_DataprocMetastore_Policy");
  }
  /**
   * Lists services in a project and location.
   * (services.listProjectsLocationsServices)
   *
   * @param string $parent Required. The relative resource name of the location of
   * metastore services to list, in the following
   * form:"projects/{project_number}/locations/{location_id}".
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Optional. The filter to apply to list results.
   * @opt_param string orderBy Optional. Specify the ordering of results as
   * described in Sorting Order. If not specified, the results will be sorted in
   * the default order.
   * @opt_param int pageSize Optional. The maximum number of services to return.
   * The response may contain less than the maximum number. If unspecified, no
   * more than 500 services are returned. The maximum value is 1000; values above
   * 1000 are changed to 1000.
   * @opt_param string pageToken Optional. A page token, received from a previous
   * DataprocMetastore.ListServices call. Provide this token to retrieve the
   * subsequent page.To retrieve the first page, supply an empty page token.When
   * paginating, other parameters provided to DataprocMetastore.ListServices must
   * match the call that provided the page token.
   * @return Google_Service_DataprocMetastore_ListServicesResponse
   */
  public function listProjectsLocationsServices($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_DataprocMetastore_ListServicesResponse");
  }
  /**
   * Updates the parameters of a single service. (services.patch)
   *
   * @param string $name Immutable. The relative resource name of the metastore
   * service, of the form:"projects/{project_number}/locations/{location_id}/servi
   * ces/{service_id}".
   * @param Google_Service_DataprocMetastore_Service $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string requestId Optional. A request ID. Specify a unique request
   * ID to allow the server to ignore the request if it has completed. The server
   * will ignore subsequent requests that provide a duplicate request ID for at
   * least 60 minutes after the first request.For example, if an initial request
   * times out, followed by another request with the same request ID, the server
   * ignores the second request to prevent the creation of duplicate
   * commitments.The request ID must be a valid UUID
   * (https://en.wikipedia.org/wiki/Universally_unique_identifier#Format) A zero
   * UUID (00000000-0000-0000-0000-000000000000) is not supported.
   * @opt_param string updateMask Required. A field mask used to specify the
   * fields to be overwritten in the metastore service resource by the update.
   * Fields specified in the update_mask are relative to the resource (not to the
   * full request). A field is overwritten if it is in the mask.
   * @return Google_Service_DataprocMetastore_Operation
   */
  public function patch($name, Google_Service_DataprocMetastore_Service $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_DataprocMetastore_Operation");
  }
  /**
   * Sets the access control policy on the specified resource. Replaces any
   * existing policy.Can return NOT_FOUND, INVALID_ARGUMENT, and PERMISSION_DENIED
   * errors. (services.setIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which the policy is being
   * specified. See the operation documentation for the appropriate value for this
   * field.
   * @param Google_Service_DataprocMetastore_SetIamPolicyRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_DataprocMetastore_Policy
   */
  public function setIamPolicy($resource, Google_Service_DataprocMetastore_SetIamPolicyRequest $postBody, $optParams = array())
  {
    $params = array('resource' => $resource, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('setIamPolicy', array($params), "Google_Service_DataprocMetastore_Policy");
  }
  /**
   * Returns permissions that a caller has on the specified resource. If the
   * resource does not exist, this will return an empty set of permissions, not a
   * NOT_FOUND error.Note: This operation is designed to be used for building
   * permission-aware UIs and command-line tools, not for authorization checking.
   * This operation may "fail open" without warning. (services.testIamPermissions)
   *
   * @param string $resource REQUIRED: The resource for which the policy detail is
   * being requested. See the operation documentation for the appropriate value
   * for this field.
   * @param Google_Service_DataprocMetastore_TestIamPermissionsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_DataprocMetastore_TestIamPermissionsResponse
   */
  public function testIamPermissions($resource, Google_Service_DataprocMetastore_TestIamPermissionsRequest $postBody, $optParams = array())
  {
    $params = array('resource' => $resource, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('testIamPermissions', array($params), "Google_Service_DataprocMetastore_TestIamPermissionsResponse");
  }
}
