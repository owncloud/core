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
 * The "products" collection of methods.
 * Typical usage is:
 *  <code>
 *   $cloudprivatecatalogproducerService = new Google_Service_CloudPrivateCatalogProducer(...);
 *   $products = $cloudprivatecatalogproducerService->products;
 *  </code>
 */
class Google_Service_CloudPrivateCatalogProducer_Resource_CatalogsProducts extends Google_Service_Resource
{
  /**
   * Copies a Product under another Catalog. (products.copy)
   *
   * @param string $name The resource name of the current product that is copied
   * from.
   * @param Google_Service_CloudPrivateCatalogProducer_GoogleCloudPrivatecatalogproducerV1beta1CopyProductRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudPrivateCatalogProducer_GoogleLongrunningOperation
   */
  public function copy($name, Google_Service_CloudPrivateCatalogProducer_GoogleCloudPrivatecatalogproducerV1beta1CopyProductRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('copy', array($params), "Google_Service_CloudPrivateCatalogProducer_GoogleLongrunningOperation");
  }
  /**
   * Creates a Product instance under a given Catalog. (products.create)
   *
   * @param string $parent The catalog name of the new product's parent.
   * @param Google_Service_CloudPrivateCatalogProducer_GoogleCloudPrivatecatalogproducerV1beta1Product $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudPrivateCatalogProducer_GoogleCloudPrivatecatalogproducerV1beta1Product
   */
  public function create($parent, Google_Service_CloudPrivateCatalogProducer_GoogleCloudPrivatecatalogproducerV1beta1Product $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_CloudPrivateCatalogProducer_GoogleCloudPrivatecatalogproducerV1beta1Product");
  }
  /**
   * Hard deletes a Product. (products.delete)
   *
   * @param string $name The resource name of the product.
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
   * Returns the requested Product resource. (products.get)
   *
   * @param string $name The resource name of the product.
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudPrivateCatalogProducer_GoogleCloudPrivatecatalogproducerV1beta1Product
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_CloudPrivateCatalogProducer_GoogleCloudPrivatecatalogproducerV1beta1Product");
  }
  /**
   * Lists Product resources that the producer has access to, within the scope of
   * the parent catalog. (products.listCatalogsProducts)
   *
   * @param string $parent The resource name of the parent resource.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter A filter expression used to restrict the returned
   * results based upon properties of the product.
   * @opt_param string pageToken A pagination token returned from a previous call
   * to ListProducts that indicates where this listing should continue from. This
   * field is optional.
   * @opt_param int pageSize The maximum number of products to return.
   * @return Google_Service_CloudPrivateCatalogProducer_GoogleCloudPrivatecatalogproducerV1beta1ListProductsResponse
   */
  public function listCatalogsProducts($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_CloudPrivateCatalogProducer_GoogleCloudPrivatecatalogproducerV1beta1ListProductsResponse");
  }
  /**
   * Updates a specific Product resource. (products.patch)
   *
   * @param string $name Required. The resource name of the product in the format
   * `catalogs/{catalog_id}/products/a-z*[a-z0-9]'.
   *
   * A unique identifier for the product under a catalog, which cannot be changed
   * after the product is created. The final segment of the name must between 1
   * and 256 characters in length.
   * @param Google_Service_CloudPrivateCatalogProducer_GoogleCloudPrivatecatalogproducerV1beta1Product $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Field mask that controls which fields of the
   * product should be updated.
   * @return Google_Service_CloudPrivateCatalogProducer_GoogleCloudPrivatecatalogproducerV1beta1Product
   */
  public function patch($name, Google_Service_CloudPrivateCatalogProducer_GoogleCloudPrivatecatalogproducerV1beta1Product $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_CloudPrivateCatalogProducer_GoogleCloudPrivatecatalogproducerV1beta1Product");
  }
}
