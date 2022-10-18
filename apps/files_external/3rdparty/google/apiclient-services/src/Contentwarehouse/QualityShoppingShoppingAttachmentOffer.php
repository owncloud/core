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

namespace Google\Service\Contentwarehouse;

class QualityShoppingShoppingAttachmentOffer extends \Google\Collection
{
  protected $collection_key = 'inferredImages';
  /**
   * @var string
   */
  public $condition;
  /**
   * @var string
   */
  public $controlType;
  /**
   * @var string[]
   */
  public $fingerprintOfOfferUrls;
  /**
   * @var string[]
   */
  public $imageId;
  protected $inferredImagesType = ShoppingWebentityShoppingAnnotationInferredImage::class;
  protected $inferredImagesDataType = 'array';
  /**
   * @var string
   */
  public $matchingType;
  /**
   * @var string
   */
  public $merchantAccountId;
  /**
   * @var string
   */
  public $merchantItemId;
  /**
   * @var string
   */
  public $nonDisplayableBrandMerchantRelationship;
  /**
   * @var string
   */
  public $nonDisplayableCurrency;
  /**
   * @var float
   */
  public $nonDisplayableOrganicMscore;
  /**
   * @var string
   */
  public $offerDocid;
  /**
   * @var string
   */
  public $refType;
  protected $soriVersionIdType = ShoppingWebentityShoppingAnnotationSoriVersionId::class;
  protected $soriVersionIdDataType = '';

  /**
   * @param string
   */
  public function setCondition($condition)
  {
    $this->condition = $condition;
  }
  /**
   * @return string
   */
  public function getCondition()
  {
    return $this->condition;
  }
  /**
   * @param string
   */
  public function setControlType($controlType)
  {
    $this->controlType = $controlType;
  }
  /**
   * @return string
   */
  public function getControlType()
  {
    return $this->controlType;
  }
  /**
   * @param string[]
   */
  public function setFingerprintOfOfferUrls($fingerprintOfOfferUrls)
  {
    $this->fingerprintOfOfferUrls = $fingerprintOfOfferUrls;
  }
  /**
   * @return string[]
   */
  public function getFingerprintOfOfferUrls()
  {
    return $this->fingerprintOfOfferUrls;
  }
  /**
   * @param string[]
   */
  public function setImageId($imageId)
  {
    $this->imageId = $imageId;
  }
  /**
   * @return string[]
   */
  public function getImageId()
  {
    return $this->imageId;
  }
  /**
   * @param ShoppingWebentityShoppingAnnotationInferredImage[]
   */
  public function setInferredImages($inferredImages)
  {
    $this->inferredImages = $inferredImages;
  }
  /**
   * @return ShoppingWebentityShoppingAnnotationInferredImage[]
   */
  public function getInferredImages()
  {
    return $this->inferredImages;
  }
  /**
   * @param string
   */
  public function setMatchingType($matchingType)
  {
    $this->matchingType = $matchingType;
  }
  /**
   * @return string
   */
  public function getMatchingType()
  {
    return $this->matchingType;
  }
  /**
   * @param string
   */
  public function setMerchantAccountId($merchantAccountId)
  {
    $this->merchantAccountId = $merchantAccountId;
  }
  /**
   * @return string
   */
  public function getMerchantAccountId()
  {
    return $this->merchantAccountId;
  }
  /**
   * @param string
   */
  public function setMerchantItemId($merchantItemId)
  {
    $this->merchantItemId = $merchantItemId;
  }
  /**
   * @return string
   */
  public function getMerchantItemId()
  {
    return $this->merchantItemId;
  }
  /**
   * @param string
   */
  public function setNonDisplayableBrandMerchantRelationship($nonDisplayableBrandMerchantRelationship)
  {
    $this->nonDisplayableBrandMerchantRelationship = $nonDisplayableBrandMerchantRelationship;
  }
  /**
   * @return string
   */
  public function getNonDisplayableBrandMerchantRelationship()
  {
    return $this->nonDisplayableBrandMerchantRelationship;
  }
  /**
   * @param string
   */
  public function setNonDisplayableCurrency($nonDisplayableCurrency)
  {
    $this->nonDisplayableCurrency = $nonDisplayableCurrency;
  }
  /**
   * @return string
   */
  public function getNonDisplayableCurrency()
  {
    return $this->nonDisplayableCurrency;
  }
  /**
   * @param float
   */
  public function setNonDisplayableOrganicMscore($nonDisplayableOrganicMscore)
  {
    $this->nonDisplayableOrganicMscore = $nonDisplayableOrganicMscore;
  }
  /**
   * @return float
   */
  public function getNonDisplayableOrganicMscore()
  {
    return $this->nonDisplayableOrganicMscore;
  }
  /**
   * @param string
   */
  public function setOfferDocid($offerDocid)
  {
    $this->offerDocid = $offerDocid;
  }
  /**
   * @return string
   */
  public function getOfferDocid()
  {
    return $this->offerDocid;
  }
  /**
   * @param string
   */
  public function setRefType($refType)
  {
    $this->refType = $refType;
  }
  /**
   * @return string
   */
  public function getRefType()
  {
    return $this->refType;
  }
  /**
   * @param ShoppingWebentityShoppingAnnotationSoriVersionId
   */
  public function setSoriVersionId(ShoppingWebentityShoppingAnnotationSoriVersionId $soriVersionId)
  {
    $this->soriVersionId = $soriVersionId;
  }
  /**
   * @return ShoppingWebentityShoppingAnnotationSoriVersionId
   */
  public function getSoriVersionId()
  {
    return $this->soriVersionId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(QualityShoppingShoppingAttachmentOffer::class, 'Google_Service_Contentwarehouse_QualityShoppingShoppingAttachmentOffer');
