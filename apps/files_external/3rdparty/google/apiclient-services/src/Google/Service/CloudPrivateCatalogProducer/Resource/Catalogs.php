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
 * The "catalogs" collection of methods.
 * Typical usage is:
 *  <code>
 *   $cloudprivatecatalogproducerService = new Google_Service_CloudPrivateCatalogProducer(...);
 *   $catalogs = $cloudprivatecatalogproducerService->catalogs;
 *  </code>
 */
class Google_Service_CloudPrivateCatalogProducer_Resource_Catalogs extends Google_Service_Resource
{
  /**
   * Creates a new Catalog resource. (catalogs.create)
   *
   * @param Google_Service_CloudPrivateCatalogProducer_GoogleCloudPrivatecatalogproducerV1beta1Catalog $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudPrivateCatalogProducer_GoogleLongrunningOperation
   */
  public function create(Google_Service_CloudPrivateCatalogProducer_GoogleCloudPrivatecatalogproducerV1beta1Catalog $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_CloudPrivateCatalogProducer_GoogleLongrunningOperation");
  }
  /**
   * Soft deletes an existing Catalog and all resources under it. The catalog can
   * only be deleted if there is no associations under it or
   * DeleteCatalogRequest.force is true. The delete operation can be recovered by
   * the PrivateCatalogProducer.UndeleteCatalog method. (catalogs.delete)
   *
   * @param string $name The resource name of the catalog.
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool force Forces deletion of the `Catalog` and its `Association`
   * resources. If the `Catalog` is still associated with other resources and
   * force is not set to true, then the operation fails.
   * @return Google_Service_CloudPrivateCatalogProducer_GoogleCloudPrivatecatalogproducerV1beta1Catalog
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_CloudPrivateCatalogProducer_GoogleCloudPrivatecatalogproducerV1beta1Catalog");
  }
  /**
   * Returns the requested Catalog resource. (catalogs.get)
   *
   * @param string $name The resource name of the catalog.
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudPrivateCatalogProducer_GoogleCloudPrivatecatalogproducerV1beta1Catalog
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_CloudPrivateCatalogProducer_GoogleCloudPrivatecatalogproducerV1beta1Catalog");
  }
  /**
   * Gets IAM policy for the specified Catalog. (catalogs.getIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which the policy is being
   * requested. See the operation documentation for the appropriate value for this
   * field.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int options.requestedPolicyVersion Optional. The policy format
   * version to be returned.
   *
   * Valid values are 0, 1, and 3. Requests specifying an invalid value will be
   * rejected.
   *
   * Requests for policies with any conditional bindings must specify version 3.
   * Policies without any conditional bindings may specify any valid value or
   * leave the field unset.
   * @return Google_Service_CloudPrivateCatalogProducer_GoogleIamV1Policy
   */
  public function getIamPolicy($resource, $optParams = array())
  {
    $params = array('resource' => $resource);
    $params = array_merge($params, $optParams);
    return $this->call('getIamPolicy', array($params), "Google_Service_CloudPrivateCatalogProducer_GoogleIamV1Policy");
  }
  /**
   * Lists Catalog resources that the producer has access to, within the scope of
   * the parent resource. (catalogs.listCatalogs)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken A pagination token returned from a previous call
   * to ListCatalogs that indicates where this listing should continue from. This
   * field is optional.
   * @opt_param int pageSize The maximum number of catalogs to return.
   * @opt_param string parent The resource name of the parent resource.
   * @return Google_Service_CloudPrivateCatalogProducer_GoogleCloudPrivatecatalogproducerV1beta1ListCatalogsResponse
   */
  public function listCatalogs($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_CloudPrivateCatalogProducer_GoogleCloudPrivatecatalogproducerV1beta1ListCatalogsResponse");
  }
  /**
   * Updates a specific Catalog resource. (catalogs.patch)
   *
   * @param string $name Output only. The resource name of the catalog, in the
   * format `catalogs/{catalog_id}'.
   *
   * A unique identifier for the catalog, which is generated by catalog service.
   * @param Google_Service_CloudPrivateCatalogProducer_GoogleCloudPrivatecatalogproducerV1beta1Catalog $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Field mask that controls which fields of the
   * catalog should be updated.
   * @return Google_Service_CloudPrivateCatalogProducer_GoogleCloudPrivatecatalogproducerV1beta1Catalog
   */
  public function patch($name, Google_Service_CloudPrivateCatalogProducer_GoogleCloudPrivatecatalogproducerV1beta1Catalog $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_CloudPrivateCatalogProducer_GoogleCloudPrivatecatalogproducerV1beta1Catalog");
  }
  /**
   * Sets the IAM policy for the specified Catalog. (catalogs.setIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which the policy is being
   * specified. See the operation documentation for the appropriate value for this
   * field.
   * @param Google_Service_CloudPrivateCatalogProducer_GoogleIamV1SetIamPolicyRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudPrivateCatalogProducer_GoogleIamV1Policy
   */
  public function setIamPolicy($resource, Google_Service_CloudPrivateCatalogProducer_GoogleIamV1SetIamPolicyRequest $postBody, $optParams = array())
  {
    $params = array('resource' => $resource, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('setIamPolicy', array($params), "Google_Service_CloudPrivateCatalogProducer_GoogleIamV1Policy");
  }
  /**
   * Tests the IAM permissions for the specified Catalog.
   * (catalogs.testIamPermissions)
   *
   * @param string $resource REQUIRED: The resource for which the policy detail is
   * being requested. See the operation documentation for the appropriate value
   * for this field.
   * @param Google_Service_CloudPrivateCatalogProducer_GoogleIamV1TestIamPermissionsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudPrivateCatalogProducer_GoogleIamV1TestIamPermissionsResponse
   */
  public function testIamPermissions($resource, Google_Service_CloudPrivateCatalogProducer_GoogleIamV1TestIamPermissionsRequest $postBody, $optParams = array())
  {
    $params = array('resource' => $resource, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('testIamPermissions', array($params), "Google_Service_CloudPrivateCatalogProducer_GoogleIamV1TestIamPermissionsResponse");
  }
  /**
   * Undeletes a deleted Catalog and all resources under it. (catalogs.undelete)
   *
   * @param string $name The resource name of the catalog.
   * @param Google_Service_CloudPrivateCatalogProducer_GoogleCloudPrivatecatalogproducerV1beta1UndeleteCatalogRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudPrivateCatalogProducer_GoogleCloudPrivatecatalogproducerV1beta1Catalog
   */
  public function undelete($name, Google_Service_CloudPrivateCatalogProducer_GoogleCloudPrivatecatalogproducerV1beta1UndeleteCatalogRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('undelete', array($params), "Google_Service_CloudPrivateCatalogProducer_GoogleCloudPrivatecatalogproducerV1beta1Catalog");
  }
}
