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
  /**
   * @var string
   */
  public $attributionToken;
  /**
   * @var string
   */
  public $cartId;
  protected $completionDetailType = GoogleCloudRetailV2CompletionDetail::class;
  protected $completionDetailDataType = '';
  /**
   * @var string
   */
  public $eventTime;
  /**
   * @var string
   */
  public $eventType;
  /**
   * @var string[]
   */
  public $experimentIds;
  /**
   * @var string
   */
  public $filter;
  /**
   * @var int
   */
  public $offset;
  /**
   * @var string
   */
  public $orderBy;
  /**
   * @var string[]
   */
  public $pageCategories;
  /**
   * @var string
   */
  public $pageViewId;
  protected $productDetailsType = GoogleCloudRetailV2ProductDetail::class;
  protected $productDetailsDataType = 'array';
  protected $purchaseTransactionType = GoogleCloudRetailV2PurchaseTransaction::class;
  protected $purchaseTransactionDataType = '';
  /**
   * @var string
   */
  public $referrerUri;
  /**
   * @var string
   */
  public $searchQuery;
  /**
   * @var string
   */
  public $sessionId;
  /**
   * @var string
   */
  public $uri;
  protected $userInfoType = GoogleCloudRetailV2UserInfo::class;
  protected $userInfoDataType = '';
  /**
   * @var string
   */
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
  /**
   * @param string
   */
  public function setAttributionToken($attributionToken)
  {
    $this->attributionToken = $attributionToken;
  }
  /**
   * @return string
   */
  public function getAttributionToken()
  {
    return $this->attributionToken;
  }
  /**
   * @param string
   */
  public function setCartId($cartId)
  {
    $this->cartId = $cartId;
  }
  /**
   * @return string
   */
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
  /**
   * @param string
   */
  public function setEventTime($eventTime)
  {
    $this->eventTime = $eventTime;
  }
  /**
   * @return string
   */
  public function getEventTime()
  {
    return $this->eventTime;
  }
  /**
   * @param string
   */
  public function setEventType($eventType)
  {
    $this->eventType = $eventType;
  }
  /**
   * @return string
   */
  public function getEventType()
  {
    return $this->eventType;
  }
  /**
   * @param string[]
   */
  public function setExperimentIds($experimentIds)
  {
    $this->experimentIds = $experimentIds;
  }
  /**
   * @return string[]
   */
  public function getExperimentIds()
  {
    return $this->experimentIds;
  }
  /**
   * @param string
   */
  public function setFilter($filter)
  {
    $this->filter = $filter;
  }
  /**
   * @return string
   */
  public function getFilter()
  {
    return $this->filter;
  }
  /**
   * @param int
   */
  public function setOffset($offset)
  {
    $this->offset = $offset;
  }
  /**
   * @return int
   */
  public function getOffset()
  {
    return $this->offset;
  }
  /**
   * @param string
   */
  public function setOrderBy($orderBy)
  {
    $this->orderBy = $orderBy;
  }
  /**
   * @return string
   */
  public function getOrderBy()
  {
    return $this->orderBy;
  }
  /**
   * @param string[]
   */
  public function setPageCategories($pageCategories)
  {
    $this->pageCategories = $pageCategories;
  }
  /**
   * @return string[]
   */
  public function getPageCategories()
  {
    return $this->pageCategories;
  }
  /**
   * @param string
   */
  public function setPageViewId($pageViewId)
  {
    $this->pageViewId = $pageViewId;
  }
  /**
   * @return string
   */
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
  /**
   * @param string
   */
  public function setReferrerUri($referrerUri)
  {
    $this->referrerUri = $referrerUri;
  }
  /**
   * @return string
   */
  public function getReferrerUri()
  {
    return $this->referrerUri;
  }
  /**
   * @param string
   */
  public function setSearchQuery($searchQuery)
  {
    $this->searchQuery = $searchQuery;
  }
  /**
   * @return string
   */
  public function getSearchQuery()
  {
    return $this->searchQuery;
  }
  /**
   * @param string
   */
  public function setSessionId($sessionId)
  {
    $this->sessionId = $sessionId;
  }
  /**
   * @return string
   */
  public function getSessionId()
  {
    return $this->sessionId;
  }
  /**
   * @param string
   */
  public function setUri($uri)
  {
    $this->uri = $uri;
  }
  /**
   * @return string
   */
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
  /**
   * @param string
   */
  public function setVisitorId($visitorId)
  {
    $this->visitorId = $visitorId;
  }
  /**
   * @return string
   */
  public function getVisitorId()
  {
    return $this->visitorId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudRetailV2UserEvent::class, 'Google_Service_CloudRetail_GoogleCloudRetailV2UserEvent');
