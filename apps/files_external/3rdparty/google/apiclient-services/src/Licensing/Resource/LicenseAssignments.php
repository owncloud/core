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

namespace Google\Service\Licensing\Resource;

use Google\Service\Licensing\LicenseAssignment;
use Google\Service\Licensing\LicenseAssignmentInsert;
use Google\Service\Licensing\LicenseAssignmentList;
use Google\Service\Licensing\LicensingEmpty;

/**
 * The "licenseAssignments" collection of methods.
 * Typical usage is:
 *  <code>
 *   $licensingService = new Google\Service\Licensing(...);
 *   $licenseAssignments = $licensingService->licenseAssignments;
 *  </code>
 */
class LicenseAssignments extends \Google\Service\Resource
{
  /**
   * Revoke a license. (licenseAssignments.delete)
   *
   * @param string $productId A product's unique identifier. For more information
   * about products in this version of the API, see Products and SKUs.
   * @param string $skuId A product SKU's unique identifier. For more information
   * about available SKUs in this version of the API, see Products and SKUs.
   * @param string $userId The user's current primary email address. If the user's
   * email address changes, use the new email address in your API requests. Since
   * a `userId` is subject to change, do not use a `userId` value as a key for
   * persistent data. This key could break if the current user's email address
   * changes. If the `userId` is suspended, the license status changes.
   * @param array $optParams Optional parameters.
   * @return LicensingEmpty
   */
  public function delete($productId, $skuId, $userId, $optParams = [])
  {
    $params = ['productId' => $productId, 'skuId' => $skuId, 'userId' => $userId];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], LicensingEmpty::class);
  }
  /**
   * Get a specific user's license by product SKU. (licenseAssignments.get)
   *
   * @param string $productId A product's unique identifier. For more information
   * about products in this version of the API, see Products and SKUs.
   * @param string $skuId A product SKU's unique identifier. For more information
   * about available SKUs in this version of the API, see Products and SKUs.
   * @param string $userId The user's current primary email address. If the user's
   * email address changes, use the new email address in your API requests. Since
   * a `userId` is subject to change, do not use a `userId` value as a key for
   * persistent data. This key could break if the current user's email address
   * changes. If the `userId` is suspended, the license status changes.
   * @param array $optParams Optional parameters.
   * @return LicenseAssignment
   */
  public function get($productId, $skuId, $userId, $optParams = [])
  {
    $params = ['productId' => $productId, 'skuId' => $skuId, 'userId' => $userId];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], LicenseAssignment::class);
  }
  /**
   * Assign a license. (licenseAssignments.insert)
   *
   * @param string $productId A product's unique identifier. For more information
   * about products in this version of the API, see Products and SKUs.
   * @param string $skuId A product SKU's unique identifier. For more information
   * about available SKUs in this version of the API, see Products and SKUs.
   * @param LicenseAssignmentInsert $postBody
   * @param array $optParams Optional parameters.
   * @return LicenseAssignment
   */
  public function insert($productId, $skuId, LicenseAssignmentInsert $postBody, $optParams = [])
  {
    $params = ['productId' => $productId, 'skuId' => $skuId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('insert', [$params], LicenseAssignment::class);
  }
  /**
   * List all users assigned licenses for a specific product SKU.
   * (licenseAssignments.listForProduct)
   *
   * @param string $productId A product's unique identifier. For more information
   * about products in this version of the API, see Products and SKUs.
   * @param string $customerId The customer's unique ID as defined in the Admin
   * console, such as `C00000000`. If the customer is suspended, the server
   * returns an error.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string maxResults The `maxResults` query string determines how
   * many entries are returned on each page of a large response. This is an
   * optional parameter. The value must be a positive number.
   * @opt_param string pageToken Token to fetch the next page of data. The
   * `maxResults` query string is related to the `pageToken` since `maxResults`
   * determines how many entries are returned on each page. This is an optional
   * query string. If not specified, the server returns the first page.
   * @return LicenseAssignmentList
   */
  public function listForProduct($productId, $customerId, $optParams = [])
  {
    $params = ['productId' => $productId, 'customerId' => $customerId];
    $params = array_merge($params, $optParams);
    return $this->call('listForProduct', [$params], LicenseAssignmentList::class);
  }
  /**
   * List all users assigned licenses for a specific product SKU.
   * (licenseAssignments.listForProductAndSku)
   *
   * @param string $productId A product's unique identifier. For more information
   * about products in this version of the API, see Products and SKUs.
   * @param string $skuId A product SKU's unique identifier. For more information
   * about available SKUs in this version of the API, see Products and SKUs.
   * @param string $customerId The customer's unique ID as defined in the Admin
   * console, such as `C00000000`. If the customer is suspended, the server
   * returns an error.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string maxResults The `maxResults` query string determines how
   * many entries are returned on each page of a large response. This is an
   * optional parameter. The value must be a positive number.
   * @opt_param string pageToken Token to fetch the next page of data. The
   * `maxResults` query string is related to the `pageToken` since `maxResults`
   * determines how many entries are returned on each page. This is an optional
   * query string. If not specified, the server returns the first page.
   * @return LicenseAssignmentList
   */
  public function listForProductAndSku($productId, $skuId, $customerId, $optParams = [])
  {
    $params = ['productId' => $productId, 'skuId' => $skuId, 'customerId' => $customerId];
    $params = array_merge($params, $optParams);
    return $this->call('listForProductAndSku', [$params], LicenseAssignmentList::class);
  }
  /**
   * Reassign a user's product SKU with a different SKU in the same product. This
   * method supports patch semantics. (licenseAssignments.patch)
   *
   * @param string $productId A product's unique identifier. For more information
   * about products in this version of the API, see Products and SKUs.
   * @param string $skuId A product SKU's unique identifier. For more information
   * about available SKUs in this version of the API, see Products and SKUs.
   * @param string $userId The user's current primary email address. If the user's
   * email address changes, use the new email address in your API requests. Since
   * a `userId` is subject to change, do not use a `userId` value as a key for
   * persistent data. This key could break if the current user's email address
   * changes. If the `userId` is suspended, the license status changes.
   * @param LicenseAssignment $postBody
   * @param array $optParams Optional parameters.
   * @return LicenseAssignment
   */
  public function patch($productId, $skuId, $userId, LicenseAssignment $postBody, $optParams = [])
  {
    $params = ['productId' => $productId, 'skuId' => $skuId, 'userId' => $userId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], LicenseAssignment::class);
  }
  /**
   * Reassign a user's product SKU with a different SKU in the same product.
   * (licenseAssignments.update)
   *
   * @param string $productId A product's unique identifier. For more information
   * about products in this version of the API, see Products and SKUs.
   * @param string $skuId A product SKU's unique identifier. For more information
   * about available SKUs in this version of the API, see Products and SKUs.
   * @param string $userId The user's current primary email address. If the user's
   * email address changes, use the new email address in your API requests. Since
   * a `userId` is subject to change, do not use a `userId` value as a key for
   * persistent data. This key could break if the current user's email address
   * changes. If the `userId` is suspended, the license status changes.
   * @param LicenseAssignment $postBody
   * @param array $optParams Optional parameters.
   * @return LicenseAssignment
   */
  public function update($productId, $skuId, $userId, LicenseAssignment $postBody, $optParams = [])
  {
    $params = ['productId' => $productId, 'skuId' => $skuId, 'userId' => $userId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('update', [$params], LicenseAssignment::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(LicenseAssignments::class, 'Google_Service_Licensing_Resource_LicenseAssignments');
