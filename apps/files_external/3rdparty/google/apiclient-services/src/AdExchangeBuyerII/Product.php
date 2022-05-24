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
  /**
   * @var string
   */
  public $availableEndTime;
  /**
   * @var string
   */
  public $availableStartTime;
  /**
   * @var string
   */
  public $createTime;
  protected $creatorContactsType = ContactInformation::class;
  protected $creatorContactsDataType = 'array';
  /**
   * @var string
   */
  public $displayName;
  /**
   * @var bool
   */
  public $hasCreatorSignedOff;
  /**
   * @var string
   */
  public $productId;
  /**
   * @var string
   */
  public $productRevision;
  /**
   * @var string
   */
  public $publisherProfileId;
  protected $sellerType = Seller::class;
  protected $sellerDataType = '';
  /**
   * @var string
   */
  public $syndicationProduct;
  protected $targetingCriterionType = TargetingCriteria::class;
  protected $targetingCriterionDataType = 'array';
  protected $termsType = DealTerms::class;
  protected $termsDataType = '';
  /**
   * @var string
   */
  public $updateTime;
  /**
   * @var string
   */
  public $webPropertyCode;

  /**
   * @param string
   */
  public function setAvailableEndTime($availableEndTime)
  {
    $this->availableEndTime = $availableEndTime;
  }
  /**
   * @return string
   */
  public function getAvailableEndTime()
  {
    return $this->availableEndTime;
  }
  /**
   * @param string
   */
  public function setAvailableStartTime($availableStartTime)
  {
    $this->availableStartTime = $availableStartTime;
  }
  /**
   * @return string
   */
  public function getAvailableStartTime()
  {
    return $this->availableStartTime;
  }
  /**
   * @param string
   */
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  /**
   * @return string
   */
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
  /**
   * @param string
   */
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  /**
   * @return string
   */
  public function getDisplayName()
  {
    return $this->displayName;
  }
  /**
   * @param bool
   */
  public function setHasCreatorSignedOff($hasCreatorSignedOff)
  {
    $this->hasCreatorSignedOff = $hasCreatorSignedOff;
  }
  /**
   * @return bool
   */
  public function getHasCreatorSignedOff()
  {
    return $this->hasCreatorSignedOff;
  }
  /**
   * @param string
   */
  public function setProductId($productId)
  {
    $this->productId = $productId;
  }
  /**
   * @return string
   */
  public function getProductId()
  {
    return $this->productId;
  }
  /**
   * @param string
   */
  public function setProductRevision($productRevision)
  {
    $this->productRevision = $productRevision;
  }
  /**
   * @return string
   */
  public function getProductRevision()
  {
    return $this->productRevision;
  }
  /**
   * @param string
   */
  public function setPublisherProfileId($publisherProfileId)
  {
    $this->publisherProfileId = $publisherProfileId;
  }
  /**
   * @return string
   */
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
  /**
   * @param string
   */
  public function setSyndicationProduct($syndicationProduct)
  {
    $this->syndicationProduct = $syndicationProduct;
  }
  /**
   * @return string
   */
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
  /**
   * @param string
   */
  public function setUpdateTime($updateTime)
  {
    $this->updateTime = $updateTime;
  }
  /**
   * @return string
   */
  public function getUpdateTime()
  {
    return $this->updateTime;
  }
  /**
   * @param string
   */
  public function setWebPropertyCode($webPropertyCode)
  {
    $this->webPropertyCode = $webPropertyCode;
  }
  /**
   * @return string
   */
  public function getWebPropertyCode()
  {
    return $this->webPropertyCode;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Product::class, 'Google_Service_AdExchangeBuyerII_Product');
