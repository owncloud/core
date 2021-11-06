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

namespace Google\Service\RecommendationsAI;

class GoogleCloudRecommendationengineV1beta1ProductEventDetail extends \Google\Collection
{
  protected $collection_key = 'productDetails';
  public $cartId;
  public $listId;
  protected $pageCategoriesType = GoogleCloudRecommendationengineV1beta1CatalogItemCategoryHierarchy::class;
  protected $pageCategoriesDataType = 'array';
  protected $productDetailsType = GoogleCloudRecommendationengineV1beta1ProductDetail::class;
  protected $productDetailsDataType = 'array';
  protected $purchaseTransactionType = GoogleCloudRecommendationengineV1beta1PurchaseTransaction::class;
  protected $purchaseTransactionDataType = '';
  public $searchQuery;

  public function setCartId($cartId)
  {
    $this->cartId = $cartId;
  }
  public function getCartId()
  {
    return $this->cartId;
  }
  public function setListId($listId)
  {
    $this->listId = $listId;
  }
  public function getListId()
  {
    return $this->listId;
  }
  /**
   * @param GoogleCloudRecommendationengineV1beta1CatalogItemCategoryHierarchy[]
   */
  public function setPageCategories($pageCategories)
  {
    $this->pageCategories = $pageCategories;
  }
  /**
   * @return GoogleCloudRecommendationengineV1beta1CatalogItemCategoryHierarchy[]
   */
  public function getPageCategories()
  {
    return $this->pageCategories;
  }
  /**
   * @param GoogleCloudRecommendationengineV1beta1ProductDetail[]
   */
  public function setProductDetails($productDetails)
  {
    $this->productDetails = $productDetails;
  }
  /**
   * @return GoogleCloudRecommendationengineV1beta1ProductDetail[]
   */
  public function getProductDetails()
  {
    return $this->productDetails;
  }
  /**
   * @param GoogleCloudRecommendationengineV1beta1PurchaseTransaction
   */
  public function setPurchaseTransaction(GoogleCloudRecommendationengineV1beta1PurchaseTransaction $purchaseTransaction)
  {
    $this->purchaseTransaction = $purchaseTransaction;
  }
  /**
   * @return GoogleCloudRecommendationengineV1beta1PurchaseTransaction
   */
  public function getPurchaseTransaction()
  {
    return $this->purchaseTransaction;
  }
  public function setSearchQuery($searchQuery)
  {
    $this->searchQuery = $searchQuery;
  }
  public function getSearchQuery()
  {
    return $this->searchQuery;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudRecommendationengineV1beta1ProductEventDetail::class, 'Google_Service_RecommendationsAI_GoogleCloudRecommendationengineV1beta1ProductEventDetail');
