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

class Google_Service_CloudRetail_GoogleCloudRetailV2UserEvent extends Google_Collection
{
  protected $collection_key = 'productDetails';
  protected $attributesType = 'Google_Service_CloudRetail_GoogleCloudRetailV2CustomAttribute';
  protected $attributesDataType = 'map';
  public $attributionToken;
  public $cartId;
  public $eventTime;
  public $eventType;
  public $experimentIds;
  public $pageCategories;
  public $pageViewId;
  protected $productDetailsType = 'Google_Service_CloudRetail_GoogleCloudRetailV2ProductDetail';
  protected $productDetailsDataType = 'array';
  protected $purchaseTransactionType = 'Google_Service_CloudRetail_GoogleCloudRetailV2PurchaseTransaction';
  protected $purchaseTransactionDataType = '';
  public $referrerUri;
  public $searchQuery;
  public $uri;
  protected $userInfoType = 'Google_Service_CloudRetail_GoogleCloudRetailV2UserInfo';
  protected $userInfoDataType = '';
  public $visitorId;

  /**
   * @param Google_Service_CloudRetail_GoogleCloudRetailV2CustomAttribute[]
   */
  public function setAttributes($attributes)
  {
    $this->attributes = $attributes;
  }
  /**
   * @return Google_Service_CloudRetail_GoogleCloudRetailV2CustomAttribute[]
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
   * @param Google_Service_CloudRetail_GoogleCloudRetailV2ProductDetail[]
   */
  public function setProductDetails($productDetails)
  {
    $this->productDetails = $productDetails;
  }
  /**
   * @return Google_Service_CloudRetail_GoogleCloudRetailV2ProductDetail[]
   */
  public function getProductDetails()
  {
    return $this->productDetails;
  }
  /**
   * @param Google_Service_CloudRetail_GoogleCloudRetailV2PurchaseTransaction
   */
  public function setPurchaseTransaction(Google_Service_CloudRetail_GoogleCloudRetailV2PurchaseTransaction $purchaseTransaction)
  {
    $this->purchaseTransaction = $purchaseTransaction;
  }
  /**
   * @return Google_Service_CloudRetail_GoogleCloudRetailV2PurchaseTransaction
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
  public function setUri($uri)
  {
    $this->uri = $uri;
  }
  public function getUri()
  {
    return $this->uri;
  }
  /**
   * @param Google_Service_CloudRetail_GoogleCloudRetailV2UserInfo
   */
  public function setUserInfo(Google_Service_CloudRetail_GoogleCloudRetailV2UserInfo $userInfo)
  {
    $this->userInfo = $userInfo;
  }
  /**
   * @return Google_Service_CloudRetail_GoogleCloudRetailV2UserInfo
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
