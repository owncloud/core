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

namespace Google\Service\AndroidEnterprise;

class ProductsListResponse extends \Google\Collection
{
  protected $collection_key = 'product';
  protected $pageInfoType = PageInfo::class;
  protected $pageInfoDataType = '';
  protected $productType = Product::class;
  protected $productDataType = 'array';
  protected $tokenPaginationType = TokenPagination::class;
  protected $tokenPaginationDataType = '';

  /**
   * @param PageInfo
   */
  public function setPageInfo(PageInfo $pageInfo)
  {
    $this->pageInfo = $pageInfo;
  }
  /**
   * @return PageInfo
   */
  public function getPageInfo()
  {
    return $this->pageInfo;
  }
  /**
   * @param Product[]
   */
  public function setProduct($product)
  {
    $this->product = $product;
  }
  /**
   * @return Product[]
   */
  public function getProduct()
  {
    return $this->product;
  }
  /**
   * @param TokenPagination
   */
  public function setTokenPagination(TokenPagination $tokenPagination)
  {
    $this->tokenPagination = $tokenPagination;
  }
  /**
   * @return TokenPagination
   */
  public function getTokenPagination()
  {
    return $this->tokenPagination;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProductsListResponse::class, 'Google_Service_AndroidEnterprise_ProductsListResponse');
