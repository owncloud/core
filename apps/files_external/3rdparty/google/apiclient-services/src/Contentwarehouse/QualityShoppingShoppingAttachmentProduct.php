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

class QualityShoppingShoppingAttachmentProduct extends \Google\Collection
{
  protected $collection_key = 'relevanceEmbedding';
  protected $aggregateRatingType = ShoppingWebentityShoppingAnnotationProductRating::class;
  protected $aggregateRatingDataType = '';
  /**
   * @var string
   */
  public $brandEntityId;
  /**
   * @var string
   */
  public $catalogId;
  /**
   * @var string
   */
  public $encodedProductSalientTerms;
  /**
   * @var string
   */
  public $globalProductClusterId;
  protected $localeType = QualityShoppingShoppingAttachmentLocale::class;
  protected $localeDataType = '';
  protected $mokaFacetType = QualityShoppingShoppingAttachmentMokaFacetValue::class;
  protected $mokaFacetDataType = 'array';
  /**
   * @var string
   */
  public $nonDisplayableDescription;
  /**
   * @var string
   */
  public $nonDisplayableTitle;
  protected $offerType = QualityShoppingShoppingAttachmentOffer::class;
  protected $offerDataType = '';
  /**
   * @var string
   */
  public $outlinkDomainRelationship;
  protected $pblockType = QualityShoppingShoppingAttachmentPBlock::class;
  protected $pblockDataType = '';
  /**
   * @var string
   */
  public $productClusterMid;
  public $productPopularity;
  protected $relevanceEmbeddingType = QualityRankembedMustangMustangRankEmbedInfo::class;
  protected $relevanceEmbeddingDataType = 'array';

  /**
   * @param ShoppingWebentityShoppingAnnotationProductRating
   */
  public function setAggregateRating(ShoppingWebentityShoppingAnnotationProductRating $aggregateRating)
  {
    $this->aggregateRating = $aggregateRating;
  }
  /**
   * @return ShoppingWebentityShoppingAnnotationProductRating
   */
  public function getAggregateRating()
  {
    return $this->aggregateRating;
  }
  /**
   * @param string
   */
  public function setBrandEntityId($brandEntityId)
  {
    $this->brandEntityId = $brandEntityId;
  }
  /**
   * @return string
   */
  public function getBrandEntityId()
  {
    return $this->brandEntityId;
  }
  /**
   * @param string
   */
  public function setCatalogId($catalogId)
  {
    $this->catalogId = $catalogId;
  }
  /**
   * @return string
   */
  public function getCatalogId()
  {
    return $this->catalogId;
  }
  /**
   * @param string
   */
  public function setEncodedProductSalientTerms($encodedProductSalientTerms)
  {
    $this->encodedProductSalientTerms = $encodedProductSalientTerms;
  }
  /**
   * @return string
   */
  public function getEncodedProductSalientTerms()
  {
    return $this->encodedProductSalientTerms;
  }
  /**
   * @param string
   */
  public function setGlobalProductClusterId($globalProductClusterId)
  {
    $this->globalProductClusterId = $globalProductClusterId;
  }
  /**
   * @return string
   */
  public function getGlobalProductClusterId()
  {
    return $this->globalProductClusterId;
  }
  /**
   * @param QualityShoppingShoppingAttachmentLocale
   */
  public function setLocale(QualityShoppingShoppingAttachmentLocale $locale)
  {
    $this->locale = $locale;
  }
  /**
   * @return QualityShoppingShoppingAttachmentLocale
   */
  public function getLocale()
  {
    return $this->locale;
  }
  /**
   * @param QualityShoppingShoppingAttachmentMokaFacetValue[]
   */
  public function setMokaFacet($mokaFacet)
  {
    $this->mokaFacet = $mokaFacet;
  }
  /**
   * @return QualityShoppingShoppingAttachmentMokaFacetValue[]
   */
  public function getMokaFacet()
  {
    return $this->mokaFacet;
  }
  /**
   * @param string
   */
  public function setNonDisplayableDescription($nonDisplayableDescription)
  {
    $this->nonDisplayableDescription = $nonDisplayableDescription;
  }
  /**
   * @return string
   */
  public function getNonDisplayableDescription()
  {
    return $this->nonDisplayableDescription;
  }
  /**
   * @param string
   */
  public function setNonDisplayableTitle($nonDisplayableTitle)
  {
    $this->nonDisplayableTitle = $nonDisplayableTitle;
  }
  /**
   * @return string
   */
  public function getNonDisplayableTitle()
  {
    return $this->nonDisplayableTitle;
  }
  /**
   * @param QualityShoppingShoppingAttachmentOffer
   */
  public function setOffer(QualityShoppingShoppingAttachmentOffer $offer)
  {
    $this->offer = $offer;
  }
  /**
   * @return QualityShoppingShoppingAttachmentOffer
   */
  public function getOffer()
  {
    return $this->offer;
  }
  /**
   * @param string
   */
  public function setOutlinkDomainRelationship($outlinkDomainRelationship)
  {
    $this->outlinkDomainRelationship = $outlinkDomainRelationship;
  }
  /**
   * @return string
   */
  public function getOutlinkDomainRelationship()
  {
    return $this->outlinkDomainRelationship;
  }
  /**
   * @param QualityShoppingShoppingAttachmentPBlock
   */
  public function setPblock(QualityShoppingShoppingAttachmentPBlock $pblock)
  {
    $this->pblock = $pblock;
  }
  /**
   * @return QualityShoppingShoppingAttachmentPBlock
   */
  public function getPblock()
  {
    return $this->pblock;
  }
  /**
   * @param string
   */
  public function setProductClusterMid($productClusterMid)
  {
    $this->productClusterMid = $productClusterMid;
  }
  /**
   * @return string
   */
  public function getProductClusterMid()
  {
    return $this->productClusterMid;
  }
  public function setProductPopularity($productPopularity)
  {
    $this->productPopularity = $productPopularity;
  }
  public function getProductPopularity()
  {
    return $this->productPopularity;
  }
  /**
   * @param QualityRankembedMustangMustangRankEmbedInfo[]
   */
  public function setRelevanceEmbedding($relevanceEmbedding)
  {
    $this->relevanceEmbedding = $relevanceEmbedding;
  }
  /**
   * @return QualityRankembedMustangMustangRankEmbedInfo[]
   */
  public function getRelevanceEmbedding()
  {
    return $this->relevanceEmbedding;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(QualityShoppingShoppingAttachmentProduct::class, 'Google_Service_Contentwarehouse_QualityShoppingShoppingAttachmentProduct');
