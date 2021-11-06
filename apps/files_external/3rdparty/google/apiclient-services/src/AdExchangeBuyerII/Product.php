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

namespace Google\Service\AdExchangeBuyerII;

class Product extends \Google\Collection
{
  protected $collection_key = 'targetingCriterion';
  public $availableEndTime;
  public $availableStartTime;
  public $createTime;
  protected $creatorContactsType = ContactInformation::class;
  protected $creatorContactsDataType = 'array';
  public $displayName;
  public $hasCreatorSignedOff;
  public $productId;
  public $productRevision;
  public $publisherProfileId;
  protected $sellerType = Seller::class;
  protected $sellerDataType = '';
  public $syndicationProduct;
  protected $targetingCriterionType = TargetingCriteria::class;
  protected $targetingCriterionDataType = 'array';
  protected $termsType = DealTerms::class;
  protected $termsDataType = '';
  public $updateTime;
  public $webPropertyCode;

  public function setAvailableEndTime($availableEndTime)
  {
    $this->availableEndTime = $availableEndTime;
  }
  public function getAvailableEndTime()
  {
    return $this->availableEndTime;
  }
  public function setAvailableStartTime($availableStartTime)
  {
    $this->availableStartTime = $availableStartTime;
  }
  public function getAvailableStartTime()
  {
    return $this->availableStartTime;
  }
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  public function getCreateTime()
  {
    return $this->createTime;
  }
  /**
   * @param ContactInformation[]
   */
  public function setCreatorContacts($creatorContacts)
  {
    $this->creatorContacts = $creatorContacts;
  }
  /**
   * @return ContactInformation[]
   */
  public function getCreatorContacts()
  {
    return $this->creatorContacts;
  }
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
  }
  public function setHasCreatorSignedOff($hasCreatorSignedOff)
  {
    $this->hasCreatorSignedOff = $hasCreatorSignedOff;
  }
  public function getHasCreatorSignedOff()
  {
    return $this->hasCreatorSignedOff;
  }
  public function setProductId($productId)
  {
    $this->productId = $productId;
  }
  public function getProductId()
  {
    return $this->productId;
  }
  public function setProductRevision($productRevision)
  {
    $this->productRevision = $productRevision;
  }
  public function getProductRevision()
  {
    return $this->productRevision;
  }
  public function setPublisherProfileId($publisherProfileId)
  {
    $this->publisherProfileId = $publisherProfileId;
  }
  public function getPublisherProfileId()
  {
    return $this->publisherProfileId;
  }
  /**
   * @param Seller
   */
  public function setSeller(Seller $seller)
  {
    $this->seller = $seller;
  }
  /**
   * @return Seller
   */
  public function getSeller()
  {
    return $this->seller;
  }
  public function setSyndicationProduct($syndicationProduct)
  {
    $this->syndicationProduct = $syndicationProduct;
  }
  public function getSyndicationProduct()
  {
    return $this->syndicationProduct;
  }
  /**
   * @param TargetingCriteria[]
   */
  public function setTargetingCriterion($targetingCriterion)
  {
    $this->targetingCriterion = $targetingCriterion;
  }
  /**
   * @return TargetingCriteria[]
   */
  public function getTargetingCriterion()
  {
    return $this->targetingCriterion;
  }
  /**
   * @param DealTerms
   */
  public function setTerms(DealTerms $terms)
  {
    $this->terms = $terms;
  }
  /**
   * @return DealTerms
   */
  public function getTerms()
  {
    return $this->terms;
  }
  public function setUpdateTime($updateTime)
  {
    $this->updateTime = $updateTime;
  }
  public function getUpdateTime()
  {
    return $this->updateTime;
  }
  public function setWebPropertyCode($webPropertyCode)
  {
    $this->webPropertyCode = $webPropertyCode;
  }
  public function getWebPropertyCode()
  {
    return $this->webPropertyCode;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Product::class, 'Google_Service_AdExchangeBuyerII_Product');
