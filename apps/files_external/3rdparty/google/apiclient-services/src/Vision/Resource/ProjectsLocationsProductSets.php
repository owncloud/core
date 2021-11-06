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

namespace Google\Service\Vision\Resource;

use Google\Service\Vision\AddProductToProductSetRequest;
use Google\Service\Vision\ImportProductSetsRequest;
use Google\Service\Vision\ListProductSetsResponse;
use Google\Service\Vision\Operation;
use Google\Service\Vision\ProductSet;
use Google\Service\Vision\RemoveProductFromProductSetRequest;
use Google\Service\Vision\VisionEmpty;

/**
 * The "productSets" collection of methods.
 * Typical usage is:
 *  <code>
 *   $visionService = new Google\Service\Vision(...);
 *   $productSets = $visionService->productSets;
 *  </code>
 */
class ProjectsLocationsProductSets extends \Google\Service\Resource
{
  /**
   * Adds a Product to the specified ProductSet. If the Product is already
   * present, no change is made. One Product can be added to at most 100
   * ProductSets. Possible errors: * Returns NOT_FOUND if the Product or the
   * ProductSet doesn't exist. (productSets.addProduct)
   *
   * @param string $name Required. The resource name for the ProductSet to modify.
   * Format is: `projects/PROJECT_ID/locations/LOC_ID/productSets/PRODUCT_SET_ID`
   * @param AddProductToProductSetRequest $postBody
   * @param array $optParams Optional parameters.
   * @return VisionEmpty
   */
  public function addProduct($name, AddProductToProductSetRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('addProduct', [$params], VisionEmpty::class);
  }
  /**
   * Creates and returns a new ProductSet resource. Possible errors: * Returns
   * INVALID_ARGUMENT if display_name is missing, or is longer than 4096
   * characters. (productSets.create)
   *
   * @param string $parent Required. The project in which the ProductSet should be
   * created. Format is `projects/PROJECT_ID/locations/LOC_ID`.
   * @param ProductSet $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string productSetId A user-supplied resource id for this
   * ProductSet. If set, the server will attempt to use this value as the resource
   * id. If it is already in use, an error is returned with code ALREADY_EXISTS.
   * Must be at most 128 characters long. It cannot contain the character `/`.
   * @return ProductSet
   */
  public function create($parent, ProductSet $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], ProductSet::class);
  }
  /**
   * Permanently deletes a ProductSet. Products and ReferenceImages in the
   * ProductSet are not deleted. The actual image files are not deleted from
   * Google Cloud Storage. (productSets.delete)
   *
   * @param string $name Required. Resource name of the ProductSet to delete.
   * Format is: `projects/PROJECT_ID/locations/LOC_ID/productSets/PRODUCT_SET_ID`
   * @param array $optParams Optional parameters.
   * @return VisionEmpty
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], VisionEmpty::class);
  }
  /**
   * Gets information associated with a ProductSet. Possible errors: * Returns
   * NOT_FOUND if the ProductSet does not exist. (productSets.get)
   *
   * @param string $name Required. Resource name of the ProductSet to get. Format
   * is: `projects/PROJECT_ID/locations/LOC_ID/productSets/PRODUCT_SET_ID`
   * @param array $optParams Optional parameters.
   * @return ProductSet
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], ProductSet::class);
  }
  /**
   * Asynchronous API that imports a list of reference images to specified product
   * sets based on a list of image information. The google.longrunning.Operation
   * API can be used to keep track of the progress and results of the request.
   * `Operation.metadata` contains `BatchOperationMetadata`. (progress)
   * `Operation.response` contains `ImportProductSetsResponse`. (results) The
   * input source of this method is a csv file on Google Cloud Storage. For the
   * format of the csv file please see ImportProductSetsGcsSource.csv_file_uri.
   * (productSets.import)
   *
   * @param string $parent Required. The project in which the ProductSets should
   * be imported. Format is `projects/PROJECT_ID/locations/LOC_ID`.
   * @param ImportProductSetsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function import($parent, ImportProductSetsRequest $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('import', [$params], Operation::class);
  }
  /**
   * Lists ProductSets in an unspecified order. Possible errors: * Returns
   * INVALID_ARGUMENT if page_size is greater than 100, or less than 1.
   * (productSets.listProjectsLocationsProductSets)
   *
   * @param string $parent Required. The project from which ProductSets should be
   * listed. Format is `projects/PROJECT_ID/locations/LOC_ID`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of items to return. Default 10,
   * maximum 100.
   * @opt_param string pageToken The next_page_token returned from a previous List
   * request, if any.
   * @return ListProductSetsResponse
   */
  public function listProjectsLocationsProductSets($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListProductSetsResponse::class);
  }
  /**
   * Makes changes to a ProductSet resource. Only display_name can be updated
   * currently. Possible errors: * Returns NOT_FOUND if the ProductSet does not
   * exist. * Returns INVALID_ARGUMENT if display_name is present in update_mask
   * but missing from the request or longer than 4096 characters.
   * (productSets.patch)
   *
   * @param string $name The resource name of the ProductSet. Format is:
   * `projects/PROJECT_ID/locations/LOC_ID/productSets/PRODUCT_SET_ID`. This field
   * is ignored when creating a ProductSet.
   * @param ProductSet $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask The FieldMask that specifies which fields to
   * update. If update_mask isn't specified, all mutable fields are to be updated.
   * Valid mask path is `display_name`.
   * @return ProductSet
   */
  public function patch($name, ProductSet $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], ProductSet::class);
  }
  /**
   * Removes a Product from the specified ProductSet. (productSets.removeProduct)
   *
   * @param string $name Required. The resource name for the ProductSet to modify.
   * Format is: `projects/PROJECT_ID/locations/LOC_ID/productSets/PRODUCT_SET_ID`
   * @param RemoveProductFromProductSetRequest $postBody
   * @param array $optParams Optional parameters.
   * @return VisionEmpty
   */
  public function removeProduct($name, RemoveProductFromProductSetRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('removeProduct', [$params], VisionEmpty::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsProductSets::class, 'Google_Service_Vision_Resource_ProjectsLocationsProductSets');
