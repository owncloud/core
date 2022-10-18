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

class QualityShoppingShoppingAttachment extends \Google\Collection
{
  protected $collection_key = 'product';
  /**
   * @var int
   */
  public $datasetModelBuyingGuideScore;
  /**
   * @var int
   */
  public $datasetModelForumListScore;
  /**
   * @var int
   */
  public $datasetModelForumSingleScore;
  /**
   * @var int
   */
  public $datasetModelInStoreOnlyScore;
  /**
   * @var int
   */
  public $datasetModelIndirectAvailabilityScore;
  /**
   * @var int
   */
  public $datasetModelMultiProductScore;
  /**
   * @var int
   */
  public $datasetModelProductComparisonScore;
  /**
   * @var int
   */
  public $datasetModelProductReviewScore;
  /**
   * @var int
   */
  public $datasetModelProductTopnScore;
  /**
   * @var int
   */
  public $datasetModelQnaListScore;
  /**
   * @var int
   */
  public $datasetModelQnaSingleScore;
  /**
   * @var int
   */
  public $datasetModelSingleProductScore;
  /**
   * @var int
   */
  public $datasetModelSoldOutScore;
  /**
   * @var int
   */
  public $expiredShoppingPageScore;
  /**
   * @var int
   */
  public $multiProductScore;
  protected $productType = QualityShoppingShoppingAttachmentProduct::class;
  protected $productDataType = 'array';
  /**
   * @var int
   */
  public $shoppingSiteScore;
  /**
   * @var int
   */
  public $shoppingSiteScoreShopfab;
  /**
   * @var int
   */
  public $singleProductScore;

  /**
   * @param int
   */
  public function setDatasetModelBuyingGuideScore($datasetModelBuyingGuideScore)
  {
    $this->datasetModelBuyingGuideScore = $datasetModelBuyingGuideScore;
  }
  /**
   * @return int
   */
  public function getDatasetModelBuyingGuideScore()
  {
    return $this->datasetModelBuyingGuideScore;
  }
  /**
   * @param int
   */
  public function setDatasetModelForumListScore($datasetModelForumListScore)
  {
    $this->datasetModelForumListScore = $datasetModelForumListScore;
  }
  /**
   * @return int
   */
  public function getDatasetModelForumListScore()
  {
    return $this->datasetModelForumListScore;
  }
  /**
   * @param int
   */
  public function setDatasetModelForumSingleScore($datasetModelForumSingleScore)
  {
    $this->datasetModelForumSingleScore = $datasetModelForumSingleScore;
  }
  /**
   * @return int
   */
  public function getDatasetModelForumSingleScore()
  {
    return $this->datasetModelForumSingleScore;
  }
  /**
   * @param int
   */
  public function setDatasetModelInStoreOnlyScore($datasetModelInStoreOnlyScore)
  {
    $this->datasetModelInStoreOnlyScore = $datasetModelInStoreOnlyScore;
  }
  /**
   * @return int
   */
  public function getDatasetModelInStoreOnlyScore()
  {
    return $this->datasetModelInStoreOnlyScore;
  }
  /**
   * @param int
   */
  public function setDatasetModelIndirectAvailabilityScore($datasetModelIndirectAvailabilityScore)
  {
    $this->datasetModelIndirectAvailabilityScore = $datasetModelIndirectAvailabilityScore;
  }
  /**
   * @return int
   */
  public function getDatasetModelIndirectAvailabilityScore()
  {
    return $this->datasetModelIndirectAvailabilityScore;
  }
  /**
   * @param int
   */
  public function setDatasetModelMultiProductScore($datasetModelMultiProductScore)
  {
    $this->datasetModelMultiProductScore = $datasetModelMultiProductScore;
  }
  /**
   * @return int
   */
  public function getDatasetModelMultiProductScore()
  {
    return $this->datasetModelMultiProductScore;
  }
  /**
   * @param int
   */
  public function setDatasetModelProductComparisonScore($datasetModelProductComparisonScore)
  {
    $this->datasetModelProductComparisonScore = $datasetModelProductComparisonScore;
  }
  /**
   * @return int
   */
  public function getDatasetModelProductComparisonScore()
  {
    return $this->datasetModelProductComparisonScore;
  }
  /**
   * @param int
   */
  public function setDatasetModelProductReviewScore($datasetModelProductReviewScore)
  {
    $this->datasetModelProductReviewScore = $datasetModelProductReviewScore;
  }
  /**
   * @return int
   */
  public function getDatasetModelProductReviewScore()
  {
    return $this->datasetModelProductReviewScore;
  }
  /**
   * @param int
   */
  public function setDatasetModelProductTopnScore($datasetModelProductTopnScore)
  {
    $this->datasetModelProductTopnScore = $datasetModelProductTopnScore;
  }
  /**
   * @return int
   */
  public function getDatasetModelProductTopnScore()
  {
    return $this->datasetModelProductTopnScore;
  }
  /**
   * @param int
   */
  public function setDatasetModelQnaListScore($datasetModelQnaListScore)
  {
    $this->datasetModelQnaListScore = $datasetModelQnaListScore;
  }
  /**
   * @return int
   */
  public function getDatasetModelQnaListScore()
  {
    return $this->datasetModelQnaListScore;
  }
  /**
   * @param int
   */
  public function setDatasetModelQnaSingleScore($datasetModelQnaSingleScore)
  {
    $this->datasetModelQnaSingleScore = $datasetModelQnaSingleScore;
  }
  /**
   * @return int
   */
  public function getDatasetModelQnaSingleScore()
  {
    return $this->datasetModelQnaSingleScore;
  }
  /**
   * @param int
   */
  public function setDatasetModelSingleProductScore($datasetModelSingleProductScore)
  {
    $this->datasetModelSingleProductScore = $datasetModelSingleProductScore;
  }
  /**
   * @return int
   */
  public function getDatasetModelSingleProductScore()
  {
    return $this->datasetModelSingleProductScore;
  }
  /**
   * @param int
   */
  public function setDatasetModelSoldOutScore($datasetModelSoldOutScore)
  {
    $this->datasetModelSoldOutScore = $datasetModelSoldOutScore;
  }
  /**
   * @return int
   */
  public function getDatasetModelSoldOutScore()
  {
    return $this->datasetModelSoldOutScore;
  }
  /**
   * @param int
   */
  public function setExpiredShoppingPageScore($expiredShoppingPageScore)
  {
    $this->expiredShoppingPageScore = $expiredShoppingPageScore;
  }
  /**
   * @return int
   */
  public function getExpiredShoppingPageScore()
  {
    return $this->expiredShoppingPageScore;
  }
  /**
   * @param int
   */
  public function setMultiProductScore($multiProductScore)
  {
    $this->multiProductScore = $multiProductScore;
  }
  /**
   * @return int
   */
  public function getMultiProductScore()
  {
    return $this->multiProductScore;
  }
  /**
   * @param QualityShoppingShoppingAttachmentProduct[]
   */
  public function setProduct($product)
  {
    $this->product = $product;
  }
  /**
   * @return QualityShoppingShoppingAttachmentProduct[]
   */
  public function getProduct()
  {
    return $this->product;
  }
  /**
   * @param int
   */
  public function setShoppingSiteScore($shoppingSiteScore)
  {
    $this->shoppingSiteScore = $shoppingSiteScore;
  }
  /**
   * @return int
   */
  public function getShoppingSiteScore()
  {
    return $this->shoppingSiteScore;
  }
  /**
   * @param int
   */
  public function setShoppingSiteScoreShopfab($shoppingSiteScoreShopfab)
  {
    $this->shoppingSiteScoreShopfab = $shoppingSiteScoreShopfab;
  }
  /**
   * @return int
   */
  public function getShoppingSiteScoreShopfab()
  {
    return $this->shoppingSiteScoreShopfab;
  }
  /**
   * @param int
   */
  public function setSingleProductScore($singleProductScore)
  {
    $this->singleProductScore = $singleProductScore;
  }
  /**
   * @return int
   */
  public function getSingleProductScore()
  {
    return $this->singleProductScore;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(QualityShoppingShoppingAttachment::class, 'Google_Service_Contentwarehouse_QualityShoppingShoppingAttachment');
