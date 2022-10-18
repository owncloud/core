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

class CompressedQualitySignals extends \Google\Collection
{
  protected $collection_key = 'topicEmbeddingsVersionedData';
  /**
   * @var string
   */
  public $anchorMismatchDemotion;
  /**
   * @var string
   */
  public $authorityPromotion;
  /**
   * @var string
   */
  public $babyPandaDemotion;
  /**
   * @var string
   */
  public $babyPandaV2Demotion;
  /**
   * @var string
   */
  public $crapsAbsoluteHostSignals;
  /**
   * @var string
   */
  public $crapsNewHostSignals;
  /**
   * @var string
   */
  public $crapsNewPatternSignals;
  /**
   * @var string
   */
  public $crapsNewUrlSignals;
  /**
   * @var string
   */
  public $crapsUnscaledIpPriorBadFraction;
  /**
   * @var string
   */
  public $exactMatchDomainDemotion;
  protected $experimentalNsrTeamDataType = QualityNsrExperimentalNsrTeamData::class;
  protected $experimentalNsrTeamDataDataType = '';
  protected $experimentalNsrTeamWsjDataType = QualityNsrExperimentalNsrTeamWSJData::class;
  protected $experimentalNsrTeamWsjDataDataType = 'array';
  /**
   * @var float
   */
  public $experimentalQstarDeltaSignal;
  /**
   * @var float
   */
  public $experimentalQstarSignal;
  /**
   * @var float
   */
  public $experimentalQstarSiteSignal;
  /**
   * @var string
   */
  public $lowQuality;
  /**
   * @var string
   */
  public $navDemotion;
  /**
   * @var string
   */
  public $nsrConfidence;
  /**
   * @var float
   */
  public $nsrOverrideBid;
  protected $nsrVersionedDataType = NSRVersionedItem::class;
  protected $nsrVersionedDataDataType = 'array';
  protected $pairwiseqScoringDataType = PairwiseQScoringData::class;
  protected $pairwiseqScoringDataDataType = '';
  protected $pairwiseqVersionedDataType = PairwiseQVersionedItem::class;
  protected $pairwiseqVersionedDataDataType = 'array';
  /**
   * @var string
   */
  public $pandaDemotion;
  /**
   * @var string
   */
  public $pqData;
  protected $pqDataProtoType = QualityNsrPQData::class;
  protected $pqDataProtoDataType = '';
  /**
   * @var string
   */
  public $productReviewPDemotePage;
  /**
   * @var string
   */
  public $productReviewPDemoteSite;
  /**
   * @var string
   */
  public $productReviewPPromotePage;
  /**
   * @var string
   */
  public $productReviewPPromoteSite;
  /**
   * @var string
   */
  public $scamness;
  /**
   * @var string
   */
  public $serpDemotion;
  /**
   * @var string
   */
  public $siteAuthority;
  protected $topicEmbeddingsVersionedDataType = QualityAuthorityTopicEmbeddingsVersionedItem::class;
  protected $topicEmbeddingsVersionedDataDataType = 'array';
  /**
   * @var string
   */
  public $unauthoritativeScore;
  /**
   * @var string
   */
  public $vlqNsr;

  /**
   * @param string
   */
  public function setAnchorMismatchDemotion($anchorMismatchDemotion)
  {
    $this->anchorMismatchDemotion = $anchorMismatchDemotion;
  }
  /**
   * @return string
   */
  public function getAnchorMismatchDemotion()
  {
    return $this->anchorMismatchDemotion;
  }
  /**
   * @param string
   */
  public function setAuthorityPromotion($authorityPromotion)
  {
    $this->authorityPromotion = $authorityPromotion;
  }
  /**
   * @return string
   */
  public function getAuthorityPromotion()
  {
    return $this->authorityPromotion;
  }
  /**
   * @param string
   */
  public function setBabyPandaDemotion($babyPandaDemotion)
  {
    $this->babyPandaDemotion = $babyPandaDemotion;
  }
  /**
   * @return string
   */
  public function getBabyPandaDemotion()
  {
    return $this->babyPandaDemotion;
  }
  /**
   * @param string
   */
  public function setBabyPandaV2Demotion($babyPandaV2Demotion)
  {
    $this->babyPandaV2Demotion = $babyPandaV2Demotion;
  }
  /**
   * @return string
   */
  public function getBabyPandaV2Demotion()
  {
    return $this->babyPandaV2Demotion;
  }
  /**
   * @param string
   */
  public function setCrapsAbsoluteHostSignals($crapsAbsoluteHostSignals)
  {
    $this->crapsAbsoluteHostSignals = $crapsAbsoluteHostSignals;
  }
  /**
   * @return string
   */
  public function getCrapsAbsoluteHostSignals()
  {
    return $this->crapsAbsoluteHostSignals;
  }
  /**
   * @param string
   */
  public function setCrapsNewHostSignals($crapsNewHostSignals)
  {
    $this->crapsNewHostSignals = $crapsNewHostSignals;
  }
  /**
   * @return string
   */
  public function getCrapsNewHostSignals()
  {
    return $this->crapsNewHostSignals;
  }
  /**
   * @param string
   */
  public function setCrapsNewPatternSignals($crapsNewPatternSignals)
  {
    $this->crapsNewPatternSignals = $crapsNewPatternSignals;
  }
  /**
   * @return string
   */
  public function getCrapsNewPatternSignals()
  {
    return $this->crapsNewPatternSignals;
  }
  /**
   * @param string
   */
  public function setCrapsNewUrlSignals($crapsNewUrlSignals)
  {
    $this->crapsNewUrlSignals = $crapsNewUrlSignals;
  }
  /**
   * @return string
   */
  public function getCrapsNewUrlSignals()
  {
    return $this->crapsNewUrlSignals;
  }
  /**
   * @param string
   */
  public function setCrapsUnscaledIpPriorBadFraction($crapsUnscaledIpPriorBadFraction)
  {
    $this->crapsUnscaledIpPriorBadFraction = $crapsUnscaledIpPriorBadFraction;
  }
  /**
   * @return string
   */
  public function getCrapsUnscaledIpPriorBadFraction()
  {
    return $this->crapsUnscaledIpPriorBadFraction;
  }
  /**
   * @param string
   */
  public function setExactMatchDomainDemotion($exactMatchDomainDemotion)
  {
    $this->exactMatchDomainDemotion = $exactMatchDomainDemotion;
  }
  /**
   * @return string
   */
  public function getExactMatchDomainDemotion()
  {
    return $this->exactMatchDomainDemotion;
  }
  /**
   * @param QualityNsrExperimentalNsrTeamData
   */
  public function setExperimentalNsrTeamData(QualityNsrExperimentalNsrTeamData $experimentalNsrTeamData)
  {
    $this->experimentalNsrTeamData = $experimentalNsrTeamData;
  }
  /**
   * @return QualityNsrExperimentalNsrTeamData
   */
  public function getExperimentalNsrTeamData()
  {
    return $this->experimentalNsrTeamData;
  }
  /**
   * @param QualityNsrExperimentalNsrTeamWSJData[]
   */
  public function setExperimentalNsrTeamWsjData($experimentalNsrTeamWsjData)
  {
    $this->experimentalNsrTeamWsjData = $experimentalNsrTeamWsjData;
  }
  /**
   * @return QualityNsrExperimentalNsrTeamWSJData[]
   */
  public function getExperimentalNsrTeamWsjData()
  {
    return $this->experimentalNsrTeamWsjData;
  }
  /**
   * @param float
   */
  public function setExperimentalQstarDeltaSignal($experimentalQstarDeltaSignal)
  {
    $this->experimentalQstarDeltaSignal = $experimentalQstarDeltaSignal;
  }
  /**
   * @return float
   */
  public function getExperimentalQstarDeltaSignal()
  {
    return $this->experimentalQstarDeltaSignal;
  }
  /**
   * @param float
   */
  public function setExperimentalQstarSignal($experimentalQstarSignal)
  {
    $this->experimentalQstarSignal = $experimentalQstarSignal;
  }
  /**
   * @return float
   */
  public function getExperimentalQstarSignal()
  {
    return $this->experimentalQstarSignal;
  }
  /**
   * @param float
   */
  public function setExperimentalQstarSiteSignal($experimentalQstarSiteSignal)
  {
    $this->experimentalQstarSiteSignal = $experimentalQstarSiteSignal;
  }
  /**
   * @return float
   */
  public function getExperimentalQstarSiteSignal()
  {
    return $this->experimentalQstarSiteSignal;
  }
  /**
   * @param string
   */
  public function setLowQuality($lowQuality)
  {
    $this->lowQuality = $lowQuality;
  }
  /**
   * @return string
   */
  public function getLowQuality()
  {
    return $this->lowQuality;
  }
  /**
   * @param string
   */
  public function setNavDemotion($navDemotion)
  {
    $this->navDemotion = $navDemotion;
  }
  /**
   * @return string
   */
  public function getNavDemotion()
  {
    return $this->navDemotion;
  }
  /**
   * @param string
   */
  public function setNsrConfidence($nsrConfidence)
  {
    $this->nsrConfidence = $nsrConfidence;
  }
  /**
   * @return string
   */
  public function getNsrConfidence()
  {
    return $this->nsrConfidence;
  }
  /**
   * @param float
   */
  public function setNsrOverrideBid($nsrOverrideBid)
  {
    $this->nsrOverrideBid = $nsrOverrideBid;
  }
  /**
   * @return float
   */
  public function getNsrOverrideBid()
  {
    return $this->nsrOverrideBid;
  }
  /**
   * @param NSRVersionedItem[]
   */
  public function setNsrVersionedData($nsrVersionedData)
  {
    $this->nsrVersionedData = $nsrVersionedData;
  }
  /**
   * @return NSRVersionedItem[]
   */
  public function getNsrVersionedData()
  {
    return $this->nsrVersionedData;
  }
  /**
   * @param PairwiseQScoringData
   */
  public function setPairwiseqScoringData(PairwiseQScoringData $pairwiseqScoringData)
  {
    $this->pairwiseqScoringData = $pairwiseqScoringData;
  }
  /**
   * @return PairwiseQScoringData
   */
  public function getPairwiseqScoringData()
  {
    return $this->pairwiseqScoringData;
  }
  /**
   * @param PairwiseQVersionedItem[]
   */
  public function setPairwiseqVersionedData($pairwiseqVersionedData)
  {
    $this->pairwiseqVersionedData = $pairwiseqVersionedData;
  }
  /**
   * @return PairwiseQVersionedItem[]
   */
  public function getPairwiseqVersionedData()
  {
    return $this->pairwiseqVersionedData;
  }
  /**
   * @param string
   */
  public function setPandaDemotion($pandaDemotion)
  {
    $this->pandaDemotion = $pandaDemotion;
  }
  /**
   * @return string
   */
  public function getPandaDemotion()
  {
    return $this->pandaDemotion;
  }
  /**
   * @param string
   */
  public function setPqData($pqData)
  {
    $this->pqData = $pqData;
  }
  /**
   * @return string
   */
  public function getPqData()
  {
    return $this->pqData;
  }
  /**
   * @param QualityNsrPQData
   */
  public function setPqDataProto(QualityNsrPQData $pqDataProto)
  {
    $this->pqDataProto = $pqDataProto;
  }
  /**
   * @return QualityNsrPQData
   */
  public function getPqDataProto()
  {
    return $this->pqDataProto;
  }
  /**
   * @param string
   */
  public function setProductReviewPDemotePage($productReviewPDemotePage)
  {
    $this->productReviewPDemotePage = $productReviewPDemotePage;
  }
  /**
   * @return string
   */
  public function getProductReviewPDemotePage()
  {
    return $this->productReviewPDemotePage;
  }
  /**
   * @param string
   */
  public function setProductReviewPDemoteSite($productReviewPDemoteSite)
  {
    $this->productReviewPDemoteSite = $productReviewPDemoteSite;
  }
  /**
   * @return string
   */
  public function getProductReviewPDemoteSite()
  {
    return $this->productReviewPDemoteSite;
  }
  /**
   * @param string
   */
  public function setProductReviewPPromotePage($productReviewPPromotePage)
  {
    $this->productReviewPPromotePage = $productReviewPPromotePage;
  }
  /**
   * @return string
   */
  public function getProductReviewPPromotePage()
  {
    return $this->productReviewPPromotePage;
  }
  /**
   * @param string
   */
  public function setProductReviewPPromoteSite($productReviewPPromoteSite)
  {
    $this->productReviewPPromoteSite = $productReviewPPromoteSite;
  }
  /**
   * @return string
   */
  public function getProductReviewPPromoteSite()
  {
    return $this->productReviewPPromoteSite;
  }
  /**
   * @param string
   */
  public function setScamness($scamness)
  {
    $this->scamness = $scamness;
  }
  /**
   * @return string
   */
  public function getScamness()
  {
    return $this->scamness;
  }
  /**
   * @param string
   */
  public function setSerpDemotion($serpDemotion)
  {
    $this->serpDemotion = $serpDemotion;
  }
  /**
   * @return string
   */
  public function getSerpDemotion()
  {
    return $this->serpDemotion;
  }
  /**
   * @param string
   */
  public function setSiteAuthority($siteAuthority)
  {
    $this->siteAuthority = $siteAuthority;
  }
  /**
   * @return string
   */
  public function getSiteAuthority()
  {
    return $this->siteAuthority;
  }
  /**
   * @param QualityAuthorityTopicEmbeddingsVersionedItem[]
   */
  public function setTopicEmbeddingsVersionedData($topicEmbeddingsVersionedData)
  {
    $this->topicEmbeddingsVersionedData = $topicEmbeddingsVersionedData;
  }
  /**
   * @return QualityAuthorityTopicEmbeddingsVersionedItem[]
   */
  public function getTopicEmbeddingsVersionedData()
  {
    return $this->topicEmbeddingsVersionedData;
  }
  /**
   * @param string
   */
  public function setUnauthoritativeScore($unauthoritativeScore)
  {
    $this->unauthoritativeScore = $unauthoritativeScore;
  }
  /**
   * @return string
   */
  public function getUnauthoritativeScore()
  {
    return $this->unauthoritativeScore;
  }
  /**
   * @param string
   */
  public function setVlqNsr($vlqNsr)
  {
    $this->vlqNsr = $vlqNsr;
  }
  /**
   * @return string
   */
  public function getVlqNsr()
  {
    return $this->vlqNsr;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CompressedQualitySignals::class, 'Google_Service_Contentwarehouse_CompressedQualitySignals');
