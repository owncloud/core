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

class QualitySitemapTarget extends \Google\Collection
{
  protected $collection_key = 'sectionTexts';
  protected $internal_gapi_mappings = [
        "dEPRECATEDSnippet" => "DEPRECATEDSnippet",
  ];
  /**
   * @var string[]
   */
  public $dEPRECATEDSnippet;
  /**
   * @var bool
   */
  public $isGoodForMobile;
  /**
   * @var bool
   */
  public $isMobileN1dup;
  /**
   * @var int[]
   */
  public $languages;
  protected $salientImageType = WWWResultInfoSubImageDocInfo::class;
  protected $salientImageDataType = '';
  /**
   * @var float
   */
  public $score;
  protected $scoringSignalsType = QualitySitemapScoringSignals::class;
  protected $scoringSignalsDataType = '';
  /**
   * @var string[]
   */
  public $sectionTexts;
  protected $snippetResponseType = GenericSnippetResponse::class;
  protected $snippetResponseDataType = '';
  /**
   * @var bool
   */
  public $sourceAnchor;
  /**
   * @var string
   */
  public $title;
  /**
   * @var float
   */
  public $twoLevelScore;
  /**
   * @var string
   */
  public $url;

  /**
   * @param string[]
   */
  public function setDEPRECATEDSnippet($dEPRECATEDSnippet)
  {
    $this->dEPRECATEDSnippet = $dEPRECATEDSnippet;
  }
  /**
   * @return string[]
   */
  public function getDEPRECATEDSnippet()
  {
    return $this->dEPRECATEDSnippet;
  }
  /**
   * @param bool
   */
  public function setIsGoodForMobile($isGoodForMobile)
  {
    $this->isGoodForMobile = $isGoodForMobile;
  }
  /**
   * @return bool
   */
  public function getIsGoodForMobile()
  {
    return $this->isGoodForMobile;
  }
  /**
   * @param bool
   */
  public function setIsMobileN1dup($isMobileN1dup)
  {
    $this->isMobileN1dup = $isMobileN1dup;
  }
  /**
   * @return bool
   */
  public function getIsMobileN1dup()
  {
    return $this->isMobileN1dup;
  }
  /**
   * @param int[]
   */
  public function setLanguages($languages)
  {
    $this->languages = $languages;
  }
  /**
   * @return int[]
   */
  public function getLanguages()
  {
    return $this->languages;
  }
  /**
   * @param WWWResultInfoSubImageDocInfo
   */
  public function setSalientImage(WWWResultInfoSubImageDocInfo $salientImage)
  {
    $this->salientImage = $salientImage;
  }
  /**
   * @return WWWResultInfoSubImageDocInfo
   */
  public function getSalientImage()
  {
    return $this->salientImage;
  }
  /**
   * @param float
   */
  public function setScore($score)
  {
    $this->score = $score;
  }
  /**
   * @return float
   */
  public function getScore()
  {
    return $this->score;
  }
  /**
   * @param QualitySitemapScoringSignals
   */
  public function setScoringSignals(QualitySitemapScoringSignals $scoringSignals)
  {
    $this->scoringSignals = $scoringSignals;
  }
  /**
   * @return QualitySitemapScoringSignals
   */
  public function getScoringSignals()
  {
    return $this->scoringSignals;
  }
  /**
   * @param string[]
   */
  public function setSectionTexts($sectionTexts)
  {
    $this->sectionTexts = $sectionTexts;
  }
  /**
   * @return string[]
   */
  public function getSectionTexts()
  {
    return $this->sectionTexts;
  }
  /**
   * @param GenericSnippetResponse
   */
  public function setSnippetResponse(GenericSnippetResponse $snippetResponse)
  {
    $this->snippetResponse = $snippetResponse;
  }
  /**
   * @return GenericSnippetResponse
   */
  public function getSnippetResponse()
  {
    return $this->snippetResponse;
  }
  /**
   * @param bool
   */
  public function setSourceAnchor($sourceAnchor)
  {
    $this->sourceAnchor = $sourceAnchor;
  }
  /**
   * @return bool
   */
  public function getSourceAnchor()
  {
    return $this->sourceAnchor;
  }
  /**
   * @param string
   */
  public function setTitle($title)
  {
    $this->title = $title;
  }
  /**
   * @return string
   */
  public function getTitle()
  {
    return $this->title;
  }
  /**
   * @param float
   */
  public function setTwoLevelScore($twoLevelScore)
  {
    $this->twoLevelScore = $twoLevelScore;
  }
  /**
   * @return float
   */
  public function getTwoLevelScore()
  {
    return $this->twoLevelScore;
  }
  /**
   * @param string
   */
  public function setUrl($url)
  {
    $this->url = $url;
  }
  /**
   * @return string
   */
  public function getUrl()
  {
    return $this->url;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(QualitySitemapTarget::class, 'Google_Service_Contentwarehouse_QualitySitemapTarget');
