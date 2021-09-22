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

namespace Google\Service\ManufacturerCenter\Resource;

use Google\Service\ManufacturerCenter\Attributes;
use Google\Service\ManufacturerCenter\ListProductsResponse;
use Google\Service\ManufacturerCenter\ManufacturersEmpty;
use Google\Service\ManufacturerCenter\Product;

/**
 * The "products" collection of methods.
 * Typical usage is:
 *  <code>
 *   $manufacturersService = new Google\Service\ManufacturerCenter(...);
 *   $products = $manufacturersService->products;
 *  </code>
 */
class AccountsProducts extends \Google\Service\Resource
{
  /**
   * Deletes the product from a Manufacturer Center account. (products.delete)
   *
   * @param string $parent Parent ID in the format `accounts/{account_id}`.
   * `account_id` - The ID of the Manufacturer Center account.
   * @param string $name Name in the format
   * `{target_country}:{content_language}:{product_id}`. `target_country` - The
   * target country of the product as a CLDR territory code (for example, US).
   * `content_language` - The content language of the product as a two-letter ISO
   * 639-1 language code (for example, en). `product_id` - The ID of the product.
   * For more information, see
   * https://support.google.com/manufacturers/answer/6124116#id.
   * @param array $optParams Optional parameters.
   * @return ManufacturersEmpty
   */
  public function delete($parent, $name, $optParams = [])
  {
    $params = ['parent' => $parent, 'name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], ManufacturersEmpty::class);
  }
  /**
   * Gets the product from a Manufacturer Center account, including product
   * issues. A recently updated product takes around 15 minutes to process.
   * Changes are only visible after it has been processed. While some issues may
   * be available once the product has been processed, other issues may take days
   * to appear. (products.get)
   *
   * @param string $parent Parent ID in the format `accounts/{account_id}`.
   * `account_id` - The ID of the Manufacturer Center account.
   * @param string $name Name in the format
   * `{target_country}:{content_language}:{product_id}`. `target_country` - The
   * target country of the product as a CLDR territory code (for example, US).
   * `content_language` - The content language of the product as a two-letter ISO
   * 639-1 language code (for example, en). `product_id` - The ID of the product.
   * For more information, see
   * https://support.google.com/manufacturers/answer/6124116#id.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string include The information to be included in the response.
   * Only sections listed here will be returned.
   * @return Product
   */
  public function get($parent, $name, $optParams = [])
  {
    $params = ['parent' => $parent, 'name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Product::class);
  }
  /**
   * Lists all the products in a Manufacturer Center account.
   * (products.listAccountsProducts)
   *
   * @param string $parent Parent ID in the format `accounts/{account_id}`.
   * `account_id` - The ID of the Manufacturer Center account.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string include The information to be included in the response.
   * Only sections listed here will be returned.
   * @opt_param int pageSize Maximum number of product statuses to return in the
   * response, used for paging.
   * @opt_param string pageToken The token returned by the previous request.
   * @return ListProductsResponse
   */
  public function listAccountsProducts($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListProductsResponse::class);
  }
  /**
   * Inserts or updates the attributes of the product in a Manufacturer Center
   * account. Creates a product with the provided attributes. If the product
   * already exists, then all attributes are replaced with the new ones. The
   * checks at upload time are minimal. All required attributes need to be present
   * for a product to be valid. Issues may show up later after the API has
   * accepted a new upload for a product and it is possible to overwrite an
   * existing valid product with an invalid product. To detect this, you should
   * retrieve the product and check it for issues once the new version is
   * available. Uploaded attributes first need to be processed before they can be
   * retrieved. Until then, new products will be unavailable, and retrieval of
   * previously uploaded products will return the original state of the product.
   * (products.update)
   *
   * @param string $parent Parent ID in the format `accounts/{account_id}`.
   * `account_id` - The ID of the Manufacturer Center account.
   * @param string $name Name in the format
   * `{target_country}:{content_language}:{product_id}`. `target_country` - The
   * target country of the product as a CLDR territory code (for example, US).
   * `content_language` - The content language of the product as a two-letter ISO
   * 639-1 language code (for example, en). `product_id` - The ID of the product.
   * For more information, see
   * https://support.google.com/manufacturers/answer/6124116#id.
   * @param Attributes $postBody
   * @param array $optParams Optional parameters.
   * @return ManufacturersEmpty
   */
  public function update($parent, $name, Attributes $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('update', [$params], ManufacturersEmpty::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AccountsProducts::class, 'Google_Service_ManufacturerCenter_Resource_AccountsProducts');
