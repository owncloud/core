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
 * The "versions" collection of methods.
 * Typical usage is:
 *  <code>
 *   $cloudprivatecatalogproducerService = new Google_Service_CloudPrivateCatalogProducer(...);
 *   $versions = $cloudprivatecatalogproducerService->versions;
 *  </code>
 */
class Google_Service_CloudPrivateCatalogProducer_Resource_CatalogsProductsVersions extends Google_Service_Resource
{
  /**
   * Creates a Version instance under a given Product. (versions.create)
   *
   * @param string $parent The product name of the new version's parent.
   * @param Google_Service_CloudPrivateCatalogProducer_GoogleCloudPrivatecatalogproducerV1beta1Version $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudPrivateCatalogProducer_GoogleLongrunningOperation
   */
  public function create($parent, Google_Service_CloudPrivateCatalogProducer_GoogleCloudPrivatecatalogproducerV1beta1Version $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_CloudPrivateCatalogProducer_GoogleLongrunningOperation");
  }
  /**
   * Hard deletes a Version. (versions.delete)
   *
   * @param string $name The resource name of the version.
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudPrivateCatalogProducer_GoogleProtobufEmpty
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_CloudPrivateCatalogProducer_GoogleProtobufEmpty");
  }
  /**
   * Returns the requested Version resource. (versions.get)
   *
   * @param string $name The resource name of the version.
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudPrivateCatalogProducer_GoogleCloudPrivatecatalogproducerV1beta1Version
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_CloudPrivateCatalogProducer_GoogleCloudPrivatecatalogproducerV1beta1Version");
  }
  /**
   * Lists Version resources that the producer has access to, within the scope of
   * the parent Product. (versions.listCatalogsProductsVersions)
   *
   * @param string $parent The resource name of the parent resource.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken A pagination token returned from a previous call
   * to ListVersions that indicates where this listing should continue from. This
   * field is optional.
   * @opt_param int pageSize The maximum number of versions to return.
   * @return Google_Service_CloudPrivateCatalogProducer_GoogleCloudPrivatecatalogproducerV1beta1ListVersionsResponse
   */
  public function listCatalogsProductsVersions($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_CloudPrivateCatalogProducer_GoogleCloudPrivatecatalogproducerV1beta1ListVersionsResponse");
  }
  /**
   * Updates a specific Version resource. (versions.patch)
   *
   * @param string $name Required. The resource name of the version, in the format
   * `catalogs/{catalog_id}/products/{product_id}/versions/a-z*[a-z0-9]'.
   *
   * A unique identifier for the version under a product, which can't be changed
   * after the version is created. The final segment of the name must between 1
   * and 63 characters in length.
   * @param Google_Service_CloudPrivateCatalogProducer_GoogleCloudPrivatecatalogproducerV1beta1Version $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Field mask that controls which fields of the
   * version should be updated.
   * @return Google_Service_CloudPrivateCatalogProducer_GoogleCloudPrivatecatalogproducerV1beta1Version
   */
  public function patch($name, Google_Service_CloudPrivateCatalogProducer_GoogleCloudPrivatecatalogproducerV1beta1Version $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_CloudPrivateCatalogProducer_GoogleCloudPrivatecatalogproducerV1beta1Version");
  }
}
