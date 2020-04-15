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
 *   $visionService = new Google_Service_Vision(...);
 *   $products = $visionService->products;
 *  </code>
 */
class Google_Service_Vision_Resource_ProjectsLocationsProductSetsProducts extends Google_Service_Resource
{
  /**
   * Lists the Products in a ProductSet, in an unspecified order. If the
   * ProductSet does not exist, the products field of the response will be empty.
   *
   * Possible errors:
   *
   * * Returns INVALID_ARGUMENT if page_size is greater than 100 or less than 1.
   * (products.listProjectsLocationsProductSetsProducts)
   *
   * @param string $name Required. The ProductSet resource for which to retrieve
   * Products.
   *
   * Format is: `projects/PROJECT_ID/locations/LOC_ID/productSets/PRODUCT_SET_ID`
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken The next_page_token returned from a previous List
   * request, if any.
   * @opt_param int pageSize The maximum number of items to return. Default 10,
   * maximum 100.
   * @return Google_Service_Vision_ListProductsInProductSetResponse
   */
  public function listProjectsLocationsProductSetsProducts($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Vision_ListProductsInProductSetResponse");
  }
}
