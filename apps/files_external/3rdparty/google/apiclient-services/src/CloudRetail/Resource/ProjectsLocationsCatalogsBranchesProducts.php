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

namespace Google\Service\CloudRetail\Resource;

use Google\Service\CloudRetail\GoogleCloudRetailV2AddFulfillmentPlacesRequest;
use Google\Service\CloudRetail\GoogleCloudRetailV2AddLocalInventoriesRequest;
use Google\Service\CloudRetail\GoogleCloudRetailV2ImportProductsRequest;
use Google\Service\CloudRetail\GoogleCloudRetailV2ListProductsResponse;
use Google\Service\CloudRetail\GoogleCloudRetailV2Product;
use Google\Service\CloudRetail\GoogleCloudRetailV2RemoveFulfillmentPlacesRequest;
use Google\Service\CloudRetail\GoogleCloudRetailV2RemoveLocalInventoriesRequest;
use Google\Service\CloudRetail\GoogleCloudRetailV2SetInventoryRequest;
use Google\Service\CloudRetail\GoogleLongrunningOperation;
use Google\Service\CloudRetail\GoogleProtobufEmpty;

/**
 * The "products" collection of methods.
 * Typical usage is:
 *  <code>
 *   $retailService = new Google\Service\CloudRetail(...);
 *   $products = $retailService->products;
 *  </code>
 */
class ProjectsLocationsCatalogsBranchesProducts extends \Google\Service\Resource
{
  /**
   * Incrementally adds place IDs to Product.fulfillment_info.place_ids. This
   * process is asynchronous and does not require the Product to exist before
   * updating fulfillment information. If the request is valid, the update will be
   * enqueued and processed downstream. As a consequence, when a response is
   * returned, the added place IDs are not immediately manifested in the Product
   * queried by ProductService.GetProduct or ProductService.ListProducts. The
   * returned Operations will be obsolete after 1 day, and GetOperation API will
   * return NOT_FOUND afterwards. If conflicting updates are issued, the
   * Operations associated with the stale updates will not be marked as done until
   * being obsolete. This feature is only available for users who have Retail
   * Search enabled. Enable Retail Search on Cloud Console before using this
   * feature. (products.addFulfillmentPlaces)
   *
   * @param string $product Required. Full resource name of Product, such as `proj
   * ects/locations/global/catalogs/default_catalog/branches/default_branch/produc
   * ts/some_product_id`. If the caller does not have permission to access the
   * Product, regardless of whether or not it exists, a PERMISSION_DENIED error is
   * returned.
   * @param GoogleCloudRetailV2AddFulfillmentPlacesRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleLongrunningOperation
   */
  public function addFulfillmentPlaces($product, GoogleCloudRetailV2AddFulfillmentPlacesRequest $postBody, $optParams = [])
  {
    $params = ['product' => $product, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('addFulfillmentPlaces', [$params], GoogleLongrunningOperation::class);
  }
  /**
   * Updates local inventory information for a Product at a list of places, while
   * respecting the last update timestamps of each inventory field. This process
   * is asynchronous and does not require the Product to exist before updating
   * inventory information. If the request is valid, the update will be enqueued
   * and processed downstream. As a consequence, when a response is returned,
   * updates are not immediately manifested in the Product queried by
   * ProductService.GetProduct or ProductService.ListProducts. Local inventory
   * information can only be modified using this method.
   * ProductService.CreateProduct and ProductService.UpdateProduct has no effect
   * on local inventories. The returned Operations will be obsolete after 1 day,
   * and GetOperation API will return NOT_FOUND afterwards. If conflicting updates
   * are issued, the Operations associated with the stale updates will not be
   * marked as done until being obsolete. This feature is only available for users
   * who have Retail Search enabled. Enable Retail Search on Cloud Console before
   * using this feature. (products.addLocalInventories)
   *
   * @param string $product Required. Full resource name of Product, such as `proj
   * ects/locations/global/catalogs/default_catalog/branches/default_branch/produc
   * ts/some_product_id`. If the caller does not have permission to access the
   * Product, regardless of whether or not it exists, a PERMISSION_DENIED error is
   * returned.
   * @param GoogleCloudRetailV2AddLocalInventoriesRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleLongrunningOperation
   */
  public function addLocalInventories($product, GoogleCloudRetailV2AddLocalInventoriesRequest $postBody, $optParams = [])
  {
    $params = ['product' => $product, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('addLocalInventories', [$params], GoogleLongrunningOperation::class);
  }
  /**
   * Creates a Product. (products.create)
   *
   * @param string $parent Required. The parent catalog resource name, such as
   * `projects/locations/global/catalogs/default_catalog/branches/default_branch`.
   * @param GoogleCloudRetailV2Product $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string productId Required. The ID to use for the Product, which
   * will become the final component of the Product.name. If the caller does not
   * have permission to create the Product, regardless of whether or not it
   * exists, a PERMISSION_DENIED error is returned. This field must be unique
   * among all Products with the same parent. Otherwise, an ALREADY_EXISTS error
   * is returned. This field must be a UTF-8 encoded string with a length limit of
   * 128 characters. Otherwise, an INVALID_ARGUMENT error is returned.
   * @return GoogleCloudRetailV2Product
   */
  public function create($parent, GoogleCloudRetailV2Product $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], GoogleCloudRetailV2Product::class);
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
   * @return GoogleProtobufEmpty
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], GoogleProtobufEmpty::class);
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
   * @return GoogleCloudRetailV2Product
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], GoogleCloudRetailV2Product::class);
  }
  /**
   * Bulk import of multiple Products. Request processing may be synchronous. Non-
   * existing items are created. Note that it is possible for a subset of the
   * Products to be successfully updated. (products.import)
   *
   * @param string $parent Required. `projects/1234/locations/global/catalogs/defa
   * ult_catalog/branches/default_branch` If no updateMask is specified, requires
   * products.create permission. If updateMask is specified, requires
   * products.update permission.
   * @param GoogleCloudRetailV2ImportProductsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleLongrunningOperation
   */
  public function import($parent, GoogleCloudRetailV2ImportProductsRequest $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('import', [$params], GoogleLongrunningOperation::class);
  }
  /**
   * Gets a list of Products.
   * (products.listProjectsLocationsCatalogsBranchesProducts)
   *
   * @param string $parent Required. The parent branch resource name, such as
   * `projects/locations/global/catalogs/default_catalog/branches/0`. Use
   * `default_branch` as the branch ID, to list products under the default branch.
   * If the caller does not have permission to list Products under this branch,
   * regardless of whether or not this branch exists, a PERMISSION_DENIED error is
   * returned.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter A filter to apply on the list results. Supported
   * features: * List all the products under the parent branch if filter is unset.
   * * List Product.Type.VARIANT Products sharing the same Product.Type.PRIMARY
   * Product. For example: `primary_product_id = "some_product_id"` * List
   * Products bundled in a Product.Type.COLLECTION Product. For example:
   * `collection_product_id = "some_product_id"` * List Products with a partibular
   * type. For example: `type = "PRIMARY"` `type = "VARIANT"` `type =
   * "COLLECTION"` If the field is unrecognizable, an INVALID_ARGUMENT error is
   * returned. If the specified Product.Type.PRIMARY Product or
   * Product.Type.COLLECTION Product does not exist, a NOT_FOUND error is
   * returned.
   * @opt_param int pageSize Maximum number of Products to return. If unspecified,
   * defaults to 100. The maximum allowed value is 1000. Values above 1000 will be
   * coerced to 1000. If this field is negative, an INVALID_ARGUMENT error is
   * returned.
   * @opt_param string pageToken A page token
   * ListProductsResponse.next_page_token, received from a previous
   * ProductService.ListProducts call. Provide this to retrieve the subsequent
   * page. When paginating, all other parameters provided to
   * ProductService.ListProducts must match the call that provided the page token.
   * Otherwise, an INVALID_ARGUMENT error is returned.
   * @opt_param string readMask The fields of Product to return in the responses.
   * If not set or empty, the following fields are returned: * Product.name *
   * Product.id * Product.title * Product.uri * Product.images *
   * Product.price_info * Product.brands If "*" is provided, all fields are
   * returned. Product.name is always returned no matter what mask is set. If an
   * unsupported or unknown field is provided, an INVALID_ARGUMENT error is
   * returned.
   * @return GoogleCloudRetailV2ListProductsResponse
   */
  public function listProjectsLocationsCatalogsBranchesProducts($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], GoogleCloudRetailV2ListProductsResponse::class);
  }
  /**
   * Updates a Product. (products.patch)
   *
   * @param string $name Immutable. Full resource name of the product, such as `pr
   * ojects/locations/global/catalogs/default_catalog/branches/default_branch/prod
   * ucts/product_id`.
   * @param GoogleCloudRetailV2Product $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool allowMissing If set to true, and the Product is not found, a
   * new Product will be created. In this situation, `update_mask` is ignored.
   * @opt_param string updateMask Indicates which fields in the provided Product
   * to update. The immutable and output only fields are NOT supported. If not
   * set, all supported fields (the fields that are neither immutable nor output
   * only) are updated. If an unsupported or unknown field is provided, an
   * INVALID_ARGUMENT error is returned. The attribute key can be updated by
   * setting the mask path as "attributes.${key_name}". If a key name is present
   * in the mask but not in the patching product from the request, this key will
   * be deleted after the update.
   * @return GoogleCloudRetailV2Product
   */
  public function patch($name, GoogleCloudRetailV2Product $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], GoogleCloudRetailV2Product::class);
  }
  /**
   * Incrementally removes place IDs from a Product.fulfillment_info.place_ids.
   * This process is asynchronous and does not require the Product to exist before
   * updating fulfillment information. If the request is valid, the update will be
   * enqueued and processed downstream. As a consequence, when a response is
   * returned, the removed place IDs are not immediately manifested in the Product
   * queried by ProductService.GetProduct or ProductService.ListProducts. The
   * returned Operations will be obsolete after 1 day, and GetOperation API will
   * return NOT_FOUND afterwards. If conflicting updates are issued, the
   * Operations associated with the stale updates will not be marked as done until
   * being obsolete. This feature is only available for users who have Retail
   * Search enabled. Enable Retail Search on Cloud Console before using this
   * feature. (products.removeFulfillmentPlaces)
   *
   * @param string $product Required. Full resource name of Product, such as `proj
   * ects/locations/global/catalogs/default_catalog/branches/default_branch/produc
   * ts/some_product_id`. If the caller does not have permission to access the
   * Product, regardless of whether or not it exists, a PERMISSION_DENIED error is
   * returned.
   * @param GoogleCloudRetailV2RemoveFulfillmentPlacesRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleLongrunningOperation
   */
  public function removeFulfillmentPlaces($product, GoogleCloudRetailV2RemoveFulfillmentPlacesRequest $postBody, $optParams = [])
  {
    $params = ['product' => $product, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('removeFulfillmentPlaces', [$params], GoogleLongrunningOperation::class);
  }
  /**
   * Remove local inventory information for a Product at a list of places at a
   * removal timestamp. This process is asynchronous. If the request is valid, the
   * removal will be enqueued and processed downstream. As a consequence, when a
   * response is returned, removals are not immediately manifested in the Product
   * queried by ProductService.GetProduct or ProductService.ListProducts. Local
   * inventory information can only be removed using this method.
   * ProductService.CreateProduct and ProductService.UpdateProduct has no effect
   * on local inventories. The returned Operations will be obsolete after 1 day,
   * and GetOperation API will return NOT_FOUND afterwards. If conflicting updates
   * are issued, the Operations associated with the stale updates will not be
   * marked as done until being obsolete. This feature is only available for users
   * who have Retail Search enabled. Enable Retail Search on Cloud Console before
   * using this feature. (products.removeLocalInventories)
   *
   * @param string $product Required. Full resource name of Product, such as `proj
   * ects/locations/global/catalogs/default_catalog/branches/default_branch/produc
   * ts/some_product_id`. If the caller does not have permission to access the
   * Product, regardless of whether or not it exists, a PERMISSION_DENIED error is
   * returned.
   * @param GoogleCloudRetailV2RemoveLocalInventoriesRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleLongrunningOperation
   */
  public function removeLocalInventories($product, GoogleCloudRetailV2RemoveLocalInventoriesRequest $postBody, $optParams = [])
  {
    $params = ['product' => $product, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('removeLocalInventories', [$params], GoogleLongrunningOperation::class);
  }
  /**
   * Updates inventory information for a Product while respecting the last update
   * timestamps of each inventory field. This process is asynchronous and does not
   * require the Product to exist before updating fulfillment information. If the
   * request is valid, the update is enqueued and processed downstream. As a
   * consequence, when a response is returned, updates are not immediately
   * manifested in the Product queried by ProductService.GetProduct or
   * ProductService.ListProducts. When inventory is updated with
   * ProductService.CreateProduct and ProductService.UpdateProduct, the specified
   * inventory field value(s) overwrite any existing value(s) while ignoring the
   * last update time for this field. Furthermore, the last update times for the
   * specified inventory fields are overwritten by the times of the
   * ProductService.CreateProduct or ProductService.UpdateProduct request. If no
   * inventory fields are set in CreateProductRequest.product, then any pre-
   * existing inventory information for this product is used. If no inventory
   * fields are set in SetInventoryRequest.set_mask, then any existing inventory
   * information is preserved. Pre-existing inventory information can only be
   * updated with ProductService.SetInventory,
   * ProductService.AddFulfillmentPlaces, and
   * ProductService.RemoveFulfillmentPlaces. The returned Operations is obsolete
   * after one day, and the GetOperation API returns `NOT_FOUND` afterwards. If
   * conflicting updates are issued, the Operations associated with the stale
   * updates are not marked as done until they are obsolete. This feature is only
   * available for users who have Retail Search enabled. Enable Retail Search on
   * Cloud Console before using this feature. (products.setInventory)
   *
   * @param string $name Immutable. Full resource name of the product, such as `pr
   * ojects/locations/global/catalogs/default_catalog/branches/default_branch/prod
   * ucts/product_id`.
   * @param GoogleCloudRetailV2SetInventoryRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleLongrunningOperation
   */
  public function setInventory($name, GoogleCloudRetailV2SetInventoryRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('setInventory', [$params], GoogleLongrunningOperation::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsCatalogsBranchesProducts::class, 'Google_Service_CloudRetail_Resource_ProjectsLocationsCatalogsBranchesProducts');
