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
 *   $retailService = new Google_Service_CloudRetail(...);
 *   $products = $retailService->products;
 *  </code>
 */
class Google_Service_CloudRetail_Resource_ProjectsLocationsCatalogsBranchesProducts extends Google_Service_Resource
{
  /**
   * Creates a Product. (products.create)
   *
   * @param string $parent Required. The parent catalog resource name, such as
   * `projects/locations/global/catalogs/default_catalog/branches/default_branch`.
   * @param Google_Service_CloudRetail_GoogleCloudRetailV2Product $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string productId Required. The ID to use for the Product, which
   * will become the final component of the Product.name. If the caller does not
   * have permission to create the Product, regardless of whether or not it
   * exists, a PERMISSION_DENIED error is returned. This field must be unique
   * among all Products with the same parent. Otherwise, an ALREADY_EXISTS error
   * is returned. This field must be a UTF-8 encoded string with a length limit of
   * 128 characters. Otherwise, an INVALID_ARGUMENT error is returned.
   * @return Google_Service_CloudRetail_GoogleCloudRetailV2Product
   */
  public function create($parent, Google_Service_CloudRetail_GoogleCloudRetailV2Product $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_CloudRetail_GoogleCloudRetailV2Product");
  }
  /**
   * Deletes a Product. (products.delete)
   *
   * @param string $name Required. Full resource name of Product, such as `project
   * s/locations/global/catalogs/default_catalog/branches/default_branch/products/
   * some_product_id`. If the caller does not have permission to delete the
   * Product, regardless of whether or not it exists, a PERMISSION_DENIED error is
   * returned. If the Product to delete does not exist, a NOT_FOUND error is
   * returned. The Product to delete can neither be a Product.Type.COLLECTION
   * Product member nor a Product.Type.PRIMARY Product with more than one
   * variants. Otherwise, an INVALID_ARGUMENT error is returned. All inventory
   * information for the named Product will be deleted.
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudRetail_GoogleProtobufEmpty
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_CloudRetail_GoogleProtobufEmpty");
  }
  /**
   * Gets a Product. (products.get)
   *
   * @param string $name Required. Full resource name of Product, such as `project
   * s/locations/global/catalogs/default_catalog/branches/default_branch/products/
   * some_product_id`. If the caller does not have permission to access the
   * Product, regardless of whether or not it exists, a PERMISSION_DENIED error is
   * returned. If the requested Product does not exist, a NOT_FOUND error is
   * returned.
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudRetail_GoogleCloudRetailV2Product
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_CloudRetail_GoogleCloudRetailV2Product");
  }
  /**
   * Bulk import of multiple Products. Request processing may be synchronous. No
   * partial updating is supported. Non-existing items are created. Note that it
   * is possible for a subset of the Products to be successfully updated.
   * (products.import)
   *
   * @param string $parent Required. `projects/1234/locations/global/catalogs/defa
   * ult_catalog/branches/default_branch` If no updateMask is specified, requires
   * products.create permission. If updateMask is specified, requires
   * products.update permission.
   * @param Google_Service_CloudRetail_GoogleCloudRetailV2ImportProductsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudRetail_GoogleLongrunningOperation
   */
  public function import($parent, Google_Service_CloudRetail_GoogleCloudRetailV2ImportProductsRequest $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('import', array($params), "Google_Service_CloudRetail_GoogleLongrunningOperation");
  }
  /**
   * Updates a Product. (products.patch)
   *
   * @param string $name Immutable. Full resource name of the product, such as `pr
   * ojects/locations/global/catalogs/default_catalog/branches/default_branch/prod
   * ucts/product_id`. The branch ID must be "default_branch".
   * @param Google_Service_CloudRetail_GoogleCloudRetailV2Product $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool allowMissing If set to true, and the Product is not found, a
   * new Product will be created. In this situation, `update_mask` is ignored.
   * @opt_param string updateMask Indicates which fields in the provided Product
   * to update. The immutable and output only fields are NOT supported. If not
   * set, all supported fields (the fields that are neither immutable nor output
   * only) are updated. If an unsupported or unknown field is provided, an
   * INVALID_ARGUMENT error is returned.
   * @return Google_Service_CloudRetail_GoogleCloudRetailV2Product
   */
  public function patch($name, Google_Service_CloudRetail_GoogleCloudRetailV2Product $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_CloudRetail_GoogleCloudRetailV2Product");
  }
}
