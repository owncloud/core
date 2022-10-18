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

class QualityPreviewRanklabTitle extends \Google\Model
{
  /**
   * @var float
   */
  public $baseGoldmineFinalScore;
  /**
   * @var int
   */
  public $baseRank;
  /**
   * @var string
   */
  public $dataSourceType;
  /**
   * @var string
   */
  public $docLang;
  /**
   * @var float
   */
  public $docRelevance;
  /**
   * @var int
   */
  public $dupTokens;
  /**
   * @var int
   */
  public $forcedExperimentScore;
  /**
   * @var float
   */
  public $goldmineAdjustedScore;
  /**
   * @var float
   */
  public $goldmineAnchorFactor;
  /**
   * @var float
   */
  public $goldmineAnchorSupportOnly;
  /**
   * @var float
   */
  public $goldmineBlockbertFactor;
  /**
   * @var float
   */
  public $goldmineBodyFactor;
  /**
   * @var float
   */
  public $goldmineFinalScore;
  /**
   * @var float
   */
  public $goldmineForeign;
  /**
   * @var float
   */
  public $goldmineGeometryFactor;
  /**
   * @var float
   */
  public $goldmineHasBoilerplateInTitle;
  /**
   * @var float
   */
  public $goldmineHasTitleNgram;
  /**
   * @var float
   */
  public $goldmineHeaderIsH1;
  /**
   * @var float
   */
  public $goldmineHeadingFactor;
  /**
   * @var float
   */
  public $goldmineIsBadTitle;
  /**
   * @var float
   */
  public $goldmineIsHeadingTag;
  /**
   * @var float
   */
  public $goldmineIsTitleTag;
  /**
   * @var float
   */
  public $goldmineIsTruncated;
  /**
   * @var float
   */
  public $goldmineLocalTitleFactor;
  /**
   * @var float
   */
  public $goldmineLocationFactor;
  /**
   * @var float
   */
  public $goldmineNavboostFactor;
  /**
   * @var float
   */
  public $goldmineOgTitleFactor;
  /**
   * @var float
   */
  public $goldmineOnPageDemotionFactor;
  /**
   * @var int
   */
  public $goldmineOtherBoostFeatureCount;
  /**
   * @var float
   */
  public $goldminePageScore;
  /**
   * @var float
   */
  public $goldmineReadabilityScore;
  /**
   * @var float
   */
  public $goldmineSalientTermFactor;
  /**
   * @var float
   */
  public $goldmineSitenameFactor;
  /**
   * @var float
   */
  public $goldmineSubHeading;
  /**
   * @var float
   */
  public $goldmineTitleTagFactor;
  /**
   * @var float
   */
  public $goldmineTrustFactor;
  /**
   * @var float
   */
  public $goldmineUrlMatchFactor;
  /**
   * @var bool
   */
  public $hasSiteInfo;
  /**
   * @var bool
   */
  public $isTruncated;
  /**
   * @var bool
   */
  public $isValid;
  /**
   * @var string
   */
  public $perTypeQuality;
  /**
   * @var int
   */
  public $perTypeRank;
  /**
   * @var float
   */
  public $percentBodyTitleTokensCovered;
  /**
   * @var float
   */
  public $percentTokensCoveredByBodyTitle;
  /**
   * @var int
   */
  public $queryMatch;
  /**
   * @var float
   */
  public $queryMatchFraction;
  /**
   * @var float
   */
  public $queryRelevance;
  /**
   * @var bool
   */
  public $sourceGeometry;
  /**
   * @var bool
   */
  public $sourceHeadingTag;
  /**
   * @var bool
   */
  public $sourceLocalTitle;
  /**
   * @var bool
   */
  public $sourceOffdomainAnchor;
  /**
   * @var bool
   */
  public $sourceOndomainAnchor;
  /**
   * @var bool
   */
  public $sourceOnsiteAnchor;
  /**
   * @var bool
   */
  public $sourceTitleTag;
  /**
   * @var bool
   */
  public $sourceTransliteratedTitle;
  /**
   * @var float
   */
  public $testGoldmineFinalScore;
  /**
   * @var int
   */
  public $testRank;
  /**
   * @var string
   */
  public $text;
  /**
   * @var float
   */
  public $widthFraction;

  /**
   * @param float
   */
  public function setBaseGoldmineFinalScore($baseGoldmineFinalScore)
  {
    $this->baseGoldmineFinalScore = $baseGoldmineFinalScore;
  }
  /**
   * @return float
   */
  public function getBaseGoldmineFinalScore()
  {
    return $this->baseGoldmineFinalScore;
  }
  /**
   * @param int
   */
  public function setBaseRank($baseRank)
  {
    $this->baseRank = $baseRank;
  }
  /**
   * @return int
   */
  public function getBaseRank()
  {
    return $this->baseRank;
  }
  /**
   * @param string
   */
  public function setDataSourceType($dataSourceType)
  {
    $this->dataSourceType = $dataSourceType;
  }
  /**
   * @return string
   */
  public function getDataSourceType()
  {
    return $this->dataSourceType;
  }
  /**
   * @param string
   */
  public function setDocLang($docLang)
  {
    $this->docLang = $docLang;
  }
  /**
   * @return string
   */
  public function getDocLang()
  {
    return $this->docLang;
  }
  /**
   * @param float
   */
  public function setDocRelevance($docRelevance)
  {
    $this->docRelevance = $docRelevance;
  }
  /**
   * @return float
   */
  public function getDocRelevance()
  {
    return $this->docRelevance;
  }
  /**
   * @param int
   */
  public function setDupTokens($dupTokens)
  {
    $this->dupTokens = $dupTokens;
  }
  /**
   * @return int
   */
  public function getDupTokens()
  {
    return $this->dupTokens;
  }
  /**
   * @param int
   */
  public function setForcedExperimentScore($forcedExperimentScore)
  {
    $this->forcedExperimentScore = $forcedExperimentScore;
  }
  /**
   * @return int
   */
  public function getForcedExperimentScore()
  {
    return $this->forcedExperimentScore;
  }
  /**
   * @param float
   */
  public function setGoldmineAdjustedScore($goldmineAdjustedScore)
  {
    $this->goldmineAdjustedScore = $goldmineAdjustedScore;
  }
  /**
   * @return float
   */
  public function getGoldmineAdjustedScore()
  {
    return $this->goldmineAdjustedScore;
  }
  /**
   * @param float
   */
  public function setGoldmineAnchorFactor($goldmineAnchorFactor)
  {
    $this->goldmineAnchorFactor = $goldmineAnchorFactor;
  }
  /**
   * @return float
   */
  public function getGoldmineAnchorFactor()
  {
    return $this->goldmineAnchorFactor;
  }
  /**
   * @param float
   */
  public function setGoldmineAnchorSupportOnly($goldmineAnchorSupportOnly)
  {
    $this->goldmineAnchorSupportOnly = $goldmineAnchorSupportOnly;
  }
  /**
   * @return float
   */
  public function getGoldmineAnchorSupportOnly()
  {
    return $this->goldmineAnchorSupportOnly;
  }
  /**
   * @param float
   */
  public function setGoldmineBlockbertFactor($goldmineBlockbertFactor)
  {
    $this->goldmineBlockbertFactor = $goldmineBlockbertFactor;
  }
  /**
   * @return float
   */
  public function getGoldmineBlockbertFactor()
  {
    return $this->goldmineBlockbertFactor;
  }
  /**
   * @param float
   */
  public function setGoldmineBodyFactor($goldmineBodyFactor)
  {
    $this->goldmineBodyFactor = $goldmineBodyFactor;
  }
  /**
   * @return float
   */
  public function getGoldmineBodyFactor()
  {
    return $this->goldmineBodyFactor;
  }
  /**
   * @param float
   */
  public function setGoldmineFinalScore($goldmineFinalScore)
  {
    $this->goldmineFinalScore = $goldmineFinalScore;
  }
  /**
   * @return float
   */
  public function getGoldmineFinalScore()
  {
    return $this->goldmineFinalScore;
  }
  /**
   * @param float
   */
  public function setGoldmineForeign($goldmineForeign)
  {
    $this->goldmineForeign = $goldmineForeign;
  }
  /**
   * @return float
   */
  public function getGoldmineForeign()
  {
    return $this->goldmineForeign;
  }
  /**
   * @param float
   */
  public function setGoldmineGeometryFactor($goldmineGeometryFactor)
  {
    $this->goldmineGeometryFactor = $goldmineGeometryFactor;
  }
  /**
   * @return float
   */
  public function getGoldmineGeometryFactor()
  {
    return $this->goldmineGeometryFactor;
  }
  /**
   * @param float
   */
  public function setGoldmineHasBoilerplateInTitle($goldmineHasBoilerplateInTitle)
  {
    $this->goldmineHasBoilerplateInTitle = $goldmineHasBoilerplateInTitle;
  }
  /**
   * @return float
   */
  public function getGoldmineHasBoilerplateInTitle()
  {
    return $this->goldmineHasBoilerplateInTitle;
  }
  /**
   * @param float
   */
  public function setGoldmineHasTitleNgram($goldmineHasTitleNgram)
  {
    $this->goldmineHasTitleNgram = $goldmineHasTitleNgram;
  }
  /**
   * @return float
   */
  public function getGoldmineHasTitleNgram()
  {
    return $this->goldmineHasTitleNgram;
  }
  /**
   * @param float
   */
  public function setGoldmineHeaderIsH1($goldmineHeaderIsH1)
  {
    $this->goldmineHeaderIsH1 = $goldmineHeaderIsH1;
  }
  /**
   * @return float
   */
  public function getGoldmineHeaderIsH1()
  {
    return $this->goldmineHeaderIsH1;
  }
  /**
   * @param float
   */
  public function setGoldmineHeadingFactor($goldmineHeadingFactor)
  {
    $this->goldmineHeadingFactor = $goldmineHeadingFactor;
  }
  /**
   * @return float
   */
  public function getGoldmineHeadingFactor()
  {
    return $this->goldmineHeadingFactor;
  }
  /**
   * @param float
   */
  public function setGoldmineIsBadTitle($goldmineIsBadTitle)
  {
    $this->goldmineIsBadTitle = $goldmineIsBadTitle;
  }
  /**
   * @return float
   */
  public function getGoldmineIsBadTitle()
  {
    return $this->goldmineIsBadTitle;
  }
  /**
   * @param float
   */
  public function setGoldmineIsHeadingTag($goldmineIsHeadingTag)
  {
    $this->goldmineIsHeadingTag = $goldmineIsHeadingTag;
  }
  /**
   * @return float
   */
  public function getGoldmineIsHeadingTag()
  {
    return $this->goldmineIsHeadingTag;
  }
  /**
   * @param float
   */
  public function setGoldmineIsTitleTag($goldmineIsTitleTag)
  {
    $this->goldmineIsTitleTag = $goldmineIsTitleTag;
  }
  /**
   * @return float
   */
  public function getGoldmineIsTitleTag()
  {
    return $this->goldmineIsTitleTag;
  }
  /**
   * @param float
   */
  public function setGoldmineIsTruncated($goldmineIsTruncated)
  {
    $this->goldmineIsTruncated = $goldmineIsTruncated;
  }
  /**
   * @return float
   */
  public function getGoldmineIsTruncated()
  {
    return $this->goldmineIsTruncated;
  }
  /**
   * @param float
   */
  public function setGoldmineLocalTitleFactor($goldmineLocalTitleFactor)
  {
    $this->goldmineLocalTitleFactor = $goldmineLocalTitleFactor;
  }
  /**
   * @return float
   */
  public function getGoldmineLocalTitleFactor()
  {
    return $this->goldmineLocalTitleFactor;
  }
  /**
   * @param float
   */
  public function setGoldmineLocationFactor($goldmineLocationFactor)
  {
    $this->goldmineLocationFactor = $goldmineLocationFactor;
  }
  /**
   * @return float
   */
  public function getGoldmineLocationFactor()
  {
    return $this->goldmineLocationFactor;
  }
  /**
   * @param float
   */
  public function setGoldmineNavboostFactor($goldmineNavboostFactor)
  {
    $this->goldmineNavboostFactor = $goldmineNavboostFactor;
  }
  /**
   * @return float
   */
  public function getGoldmineNavboostFactor()
  {
    return $this->goldmineNavboostFactor;
  }
  /**
   * @param float
   */
  public function setGoldmineOgTitleFactor($goldmineOgTitleFactor)
  {
    $this->goldmineOgTitleFactor = $goldmineOgTitleFactor;
  }
  /**
   * @return float
   */
  public function getGoldmineOgTitleFactor()
  {
    return $this->goldmineOgTitleFactor;
  }
  /**
   * @param float
   */
  public function setGoldmineOnPageDemotionFactor($goldmineOnPageDemotionFactor)
  {
    $this->goldmineOnPageDemotionFactor = $goldmineOnPageDemotionFactor;
  }
  /**
   * @return float
   */
  public function getGoldmineOnPageDemotionFactor()
  {
    return $this->goldmineOnPageDemotionFactor;
  }
  /**
   * @param int
   */
  public function setGoldmineOtherBoostFeatureCount($goldmineOtherBoostFeatureCount)
  {
    $this->goldmineOtherBoostFeatureCount = $goldmineOtherBoostFeatureCount;
  }
  /**
   * @return int
   */
  public function getGoldmineOtherBoostFeatureCount()
  {
    return $this->goldmineOtherBoostFeatureCount;
  }
  /**
   * @param float
   */
  public function setGoldminePageScore($goldminePageScore)
  {
    $this->goldminePageScore = $goldminePageScore;
  }
  /**
   * @return float
   */
  public function getGoldminePageScore()
  {
    return $this->goldminePageScore;
  }
  /**
   * @param float
   */
  public function setGoldmineReadabilityScore($goldmineReadabilityScore)
  {
    $this->goldmineReadabilityScore = $goldmineReadabilityScore;
  }
  /**
   * @return float
   */
  public function getGoldmineReadabilityScore()
  {
    return $this->goldmineReadabilityScore;
  }
  /**
   * @param float
   */
  public function setGoldmineSalientTermFactor($goldmineSalientTermFactor)
  {
    $this->goldmineSalientTermFactor = $goldmineSalientTermFactor;
  }
  /**
   * @return float
   */
  public function getGoldmineSalientTermFactor()
  {
    return $this->goldmineSalientTermFactor;
  }
  /**
   * @param float
   */
  public function setGoldmineSitenameFactor($goldmineSitenameFactor)
  {
    $this->goldmineSitenameFactor = $goldmineSitenameFactor;
  }
  /**
   * @return float
   */
  public function getGoldmineSitenameFactor()
  {
    return $this->goldmineSitenameFactor;
  }
  /**
   * @param float
   */
  public function setGoldmineSubHeading($goldmineSubHeading)
  {
    $this->goldmineSubHeading = $goldmineSubHeading;
  }
  /**
   * @return float
   */
  public function getGoldmineSubHeading()
  {
    return $this->goldmineSubHeading;
  }
  /**
   * @param float
   */
  public function setGoldmineTitleTagFactor($goldmineTitleTagFactor)
  {
    $this->goldmineTitleTagFactor = $goldmineTitleTagFactor;
  }
  /**
   * @return float
   */
  public function getGoldmineTitleTagFactor()
  {
    return $this->goldmineTitleTagFactor;
  }
  /**
   * @param float
   */
  public function setGoldmineTrustFactor($goldmineTrustFactor)
  {
    $this->goldmineTrustFactor = $goldmineTrustFactor;
  }
  /**
   * @return float
   */
  public function getGoldmineTrustFactor()
  {
    return $this->goldmineTrustFactor;
  }
  /**
   * @param float
   */
  public function setGoldmineUrlMatchFactor($goldmineUrlMatchFactor)
  {
    $this->goldmineUrlMatchFactor = $goldmineUrlMatchFactor;
  }
  /**
   * @return float
   */
  public function getGoldmineUrlMatchFactor()
  {
    return $this->goldmineUrlMatchFactor;
  }
  /**
   * @param bool
   */
  public function setHasSiteInfo($hasSiteInfo)
  {
    $this->hasSiteInfo = $hasSiteInfo;
  }
  /**
   * @return bool
   */
  public function getHasSiteInfo()
  {
    return $this->hasSiteInfo;
  }
  /**
   * @param bool
   */
  public function setIsTruncated($isTruncated)
  {
    $this->isTruncated = $isTruncated;
  }
  /**
   * @return bool
   */
  public function getIsTruncated()
  {
    return $this->isTruncated;
  }
  /**
   * @param bool
   */
  public function setIsValid($isValid)
  {
    $this->isValid = $isValid;
  }
  /**
   * @return bool
   */
  public function getIsValid()
  {
    return $this->isValid;
  }
  /**
   * @param string
   */
  public function setPerTypeQuality($perTypeQuality)
  {
    $this->perTypeQuality = $perTypeQuality;
  }
  /**
   * @return string
   */
  public function getPerTypeQuality()
  {
    return $this->perTypeQuality;
  }
  /**
   * @param int
   */
  public function setPerTypeRank($perTypeRank)
  {
    $this->perTypeRank = $perTypeRank;
  }
  /**
   * @return int
   */
  public function getPerTypeRank()
  {
    return $this->perTypeRank;
  }
  /**
   * @param float
   */
  public function setPercentBodyTitleTokensCovered($percentBodyTitleTokensCovered)
  {
    $this->percentBodyTitleTokensCovered = $percentBodyTitleTokensCovered;
  }
  /**
   * @return float
   */
  public function getPercentBodyTitleTokensCovered()
  {
    return $this->percentBodyTitleTokensCovered;
  }
  /**
   * @param float
   */
  public function setPercentTokensCoveredByBodyTitle($percentTokensCoveredByBodyTitle)
  {
    $this->percentTokensCoveredByBodyTitle = $percentTokensCoveredByBodyTitle;
  }
  /**
   * @return float
   */
  public function getPercentTokensCoveredByBodyTitle()
  {
    return $this->percentTokensCoveredByBodyTitle;
  }
  /**
   * @param int
   */
  public function setQueryMatch($queryMatch)
  {
    $this->queryMatch = $queryMatch;
  }
  /**
   * @return int
   */
  public function getQueryMatch()
  {
    return $this->queryMatch;
  }
  /**
   * @param float
   */
  public function setQueryMatchFraction($queryMatchFraction)
  {
    $this->queryMatchFraction = $queryMatchFraction;
  }
  /**
   * @return float
   */
  public function getQueryMatchFraction()
  {
    return $this->queryMatchFraction;
  }
  /**
   * @param float
   */
  public function setQueryRelevance($queryRelevance)
  {
    $this->queryRelevance = $queryRelevance;
  }
  /**
   * @return float
   */
  public function getQueryRelevance()
  {
    return $this->queryRelevance;
  }
  /**
   * @param bool
   */
  public function setSourceGeometry($sourceGeometry)
  {
    $this->sourceGeometry = $sourceGeometry;
  }
  /**
   * @return bool
   */
  public function getSourceGeometry()
  {
    return $this->sourceGeometry;
  }
  /**
   * @param bool
   */
  public function setSourceHeadingTag($sourceHeadingTag)
  {
    $this->sourceHeadingTag = $sourceHeadingTag;
  }
  /**
   * @return bool
   */
  public function getSourceHeadingTag()
  {
    return $this->sourceHeadingTag;
  }
  /**
   * @param bool
   */
  public function setSourceLocalTitle($sourceLocalTitle)
  {
    $this->sourceLocalTitle = $sourceLocalTitle;
  }
  /**
   * @return bool
   */
  public function getSourceLocalTitle()
  {
    return $this->sourceLocalTitle;
  }
  /**
   * @param bool
   */
  public function setSourceOffdomainAnchor($sourceOffdomainAnchor)
  {
    $this->sourceOffdomainAnchor = $sourceOffdomainAnchor;
  }
  /**
   * @return bool
   */
  public function getSourceOffdomainAnchor()
  {
    return $this->sourceOffdomainAnchor;
  }
  /**
   * @param bool
   */
  public function setSourceOndomainAnchor($sourceOndomainAnchor)
  {
    $this->sourceOndomainAnchor = $sourceOndomainAnchor;
  }
  /**
   * @return bool
   */
  public function getSourceOndomainAnchor()
  {
    return $this->sourceOndomainAnchor;
  }
  /**
   * @param bool
   */
  public function setSourceOnsiteAnchor($sourceOnsiteAnchor)
  {
    $this->sourceOnsiteAnchor = $sourceOnsiteAnchor;
  }
  /**
   * @return bool
   */
  public function getSourceOnsiteAnchor()
  {
    return $this->sourceOnsiteAnchor;
  }
  /**
   * @param bool
   */
  public function setSourceTitleTag($sourceTitleTag)
  {
    $this->sourceTitleTag = $sourceTitleTag;
  }
  /**
   * @return bool
   */
  public function getSourceTitleTag()
  {
    return $this->sourceTitleTag;
  }
  /**
   * @param bool
   */
  public function setSourceTransliteratedTitle($sourceTransliteratedTitle)
  {
    $this->sourceTransliteratedTitle = $sourceTransliteratedTitle;
  }
  /**
   * @return bool
   */
  public function getSourceTransliteratedTitle()
  {
    return $this->sourceTransliteratedTitle;
  }
  /**
   * @param float
   */
  public function setTestGoldmineFinalScore($testGoldmineFinalScore)
  {
    $this->testGoldmineFinalScore = $testGoldmineFinalScore;
  }
  /**
   * @return float
   */
  public function getTestGoldmineFinalScore()
  {
    return $this->testGoldmineFinalScore;
  }
  /**
   * @param int
   */
  public function setTestRank($testRank)
  {
    $this->testRank = $testRank;
  }
  /**
   * @return int
   */
  public function getTestRank()
  {
    return $this->testRank;
  }
  /**
   * @param string
   */
  public function setText($text)
  {
    $this->text = $text;
  }
  /**
   * @return string
   */
  public function getText()
  {
    return $this->text;
  }
  /**
   * @param float
   */
  public function setWidthFraction($widthFraction)
  {
    $this->widthFraction = $widthFraction;
  }
  /**
   * @return float
   */
  public function getWidthFraction()
  {
    return $this->widthFraction;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(QualityPreviewRanklabTitle::class, 'Google_Service_Contentwarehouse_QualityPreviewRanklabTitle');
