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

namespace Google\Service\CloudRetail;

class GoogleCloudRetailV2UserEvent extends \Google\Collection
{
  protected $collection_key = 'productDetails';
  protected $attributesType = GoogleCloudRetailV2CustomAttribute::class;
  protected $attributesDataType = 'map';
  public $attributionToken;
  public $cartId;
  protected $completionDetailType = GoogleCloudRetailV2CompletionDetail::class;
  protected $completionDetailDataType = '';
  public $eventTime;
  public $eventType;
  public $experimentIds;
  public $filter;
  public $offset;
  public $orderBy;
  public $pageCategories;
  public $pageViewId;
  protected $productDetailsType = GoogleCloudRetailV2ProductDetail::class;
  protected $productDetailsDataType = 'array';
  protected $purchaseTransactionType = GoogleCloudRetailV2PurchaseTransaction::class;
  protected $purchaseTransactionDataType = '';
  public $referrerUri;
  public $searchQuery;
  public $sessionId;
  public $uri;
  protected $userInfoType = GoogleCloudRetailV2UserInfo::class;
  protected $userInfoDataType = '';
  public $visitorId;

  /**
   * @param GoogleCloudRetailV2CustomAttribute[]
   */
  public function setAttributes($attributes)
  {
    $this->attributes = $attributes;
  }
  /**
   * @return GoogleCloudRetailV2CustomAttribute[]
   */
  public function getAttributes()
  {
    return $this->attributes;
  }
  public function setAttributionToken($attributionToken)
  {
    $this->attributionToken = $attributionToken;
  }
  public function getAttributionToken()
  {
    return $this->attributionToken;
  }
  public function setCartId($cartId)
  {
    $this->cartId = $cartId;
  }
  public function getCartId()
  {
    return $this->cartId;
  }
  /**
   * @param GoogleCloudRetailV2CompletionDetail
   */
  public function setCompletionDetail(GoogleCloudRetailV2CompletionDetail $completionDetail)
  {
    $this->completionDetail = $completionDetail;
  }
  /**
   * @return GoogleCloudRetailV2CompletionDetail
   */
  public function getCompletionDetail()
  {
    return $this->completionDetail;
  }
  public function setEventTime($eventTime)
  {
    $this->eventTime = $eventTime;
  }
  public function getEventTime()
  {
    return $this->eventTime;
  }
  public function setEventType($eventType)
  {
    $this->eventType = $eventType;
  }
  public function getEventType()
  {
    return $this->eventType;
  }
  public function setExperimentIds($experimentIds)
  {
    $this->experimentIds = $experimentIds;
  }
  public function getExperimentIds()
  {
    return $this->experimentIds;
  }
  public function setFilter($filter)
  {
    $this->filter = $filter;
  }
  public function getFilter()
  {
    return $this->filter;
  }
  public function setOffset($offset)
  {
    $this->offset = $offset;
  }
  public function getOffset()
  {
    return $this->offset;
  }
  public function setOrderBy($orderBy)
  {
    $this->orderBy = $orderBy;
  }
  public function getOrderBy()
  {
    return $this->orderBy;
  }
  public function setPageCategories($pageCategories)
  {
    $this->pageCategories = $pageCategories;
  }
  public function getPageCategories()
  {
    return $this->pageCategories;
  }
  public function setPageViewId($pageViewId)
  {
    $this->pageViewId = $pageViewId;
  }
  public function getPageViewId()
  {
    return $this->pageViewId;
  }
  /**
   * @param GoogleCloudRetailV2ProductDetail[]
   */
  public function setProductDetails($productDetails)
  {
    $this->productDetails = $productDetails;
  }
  /**
   * @return GoogleCloudRetailV2ProductDetail[]
   */
  public function getProductDetails()
  {
    return $this->productDetails;
  }
  /**
   * @param GoogleCloudRetailV2PurchaseTransaction
   */
  public function setPurchaseTransaction(GoogleCloudRetailV2PurchaseTransaction $purchaseTransaction)
  {
    $this->purchaseTransaction = $purchaseTransaction;
  }
  /**
   * @return GoogleCloudRetailV2PurchaseTransaction
   */
  public function getPurchaseTransaction()
  {
    return $this->purchaseTransaction;
  }
  public function setReferrerUri($referrerUri)
  {
    $this->referrerUri = $referrerUri;
  }
  public function getReferrerUri()
  {
    return $this->referrerUri;
  }
  public function setSearchQuery($searchQuery)
  {
    $this->searchQuery = $searchQuery;
  }
  public function getSearchQuery()
  {
    return $this->searchQuery;
  }
  public function setSessionId($sessionId)
  {
    $this->sessionId = $sessionId;
  }
  public function getSessionId()
  {
    return $this->sessionId;
  }
  public function setUri($uri)
  {
    $this->uri = $uri;
  }
  public function getUri()
  {
    return $this->uri;
  }
  /**
   * @param GoogleCloudRetailV2UserInfo
   */
  public function setUserInfo(GoogleCloudRetailV2UserInfo $userInfo)
  {
    $this->userInfo = $userInfo;
  }
  /**
   * @return GoogleCloudRetailV2UserInfo
   */
  public function getUserInfo()
  {
    return $this->userInfo;
  }
  public function setVisitorId($visitorId)
  {
    $this->visitorId = $visitorId;
  }
  public function getVisitorId()
  {
    return $this->visitorId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudRetailV2UserEvent::class, 'Google_Service_CloudRetail_GoogleCloudRetailV2UserEvent');
