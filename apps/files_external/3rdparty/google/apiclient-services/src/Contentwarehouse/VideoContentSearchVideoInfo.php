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

class VideoContentSearchVideoInfo extends \Google\Collection
{
  protected $collection_key = 'verticalItem';
  /**
   * @var string
   */
  public $amarnaDocid;
  /**
   * @var string
   */
  public $asrLanguage;
  protected $crapsDataType = QualityNavboostCrapsCrapsData::class;
  protected $crapsDataDataType = '';
  /**
   * @var string
   */
  public $description;
  /**
   * @var string
   */
  public $docLanguage;
  /**
   * @var float
   */
  public $durationMs;
  /**
   * @var bool
   */
  public $hasAsr;
  /**
   * @var bool
   */
  public $hasDescriptionAnchors;
  /**
   * @var bool
   */
  public $isSafe;
  /**
   * @var bool
   */
  public $isWatchpage;
  /**
   * @var string[]
   */
  public $navqueries;
  /**
   * @var float
   */
  public $nsr;
  /**
   * @var string
   */
  public $numViews;
  protected $pseudoVideoDataType = PseudoVideoData::class;
  protected $pseudoVideoDataDataType = '';
  protected $saftDocType = NlpSaftDocument::class;
  protected $saftDocDataType = '';
  /**
   * @var string
   */
  public $saftTranscript;
  protected $salientTermSetType = QualitySalientTermsSalientTermSet::class;
  protected $salientTermSetDataType = '';
  /**
   * @var int[]
   */
  public $subindexid;
  /**
   * @var string
   */
  public $title;
  /**
   * @var string
   */
  public $titleLanguage;
  protected $transcriptAnnotationsType = QualityWebanswersTranscriptAnnotations::class;
  protected $transcriptAnnotationsDataType = '';
  /**
   * @var int
   */
  public $uniqueChromeViews;
  /**
   * @var string
   */
  public $url;
  protected $verticalItemType = IndexingMlVerticalVerticalItem::class;
  protected $verticalItemDataType = 'array';
  /**
   * @var string
   */
  public $videoGenre;
  /**
   * @var string
   */
  public $videoType;
  /**
   * @var string
   */
  public $videoUrl;
  protected $webrefEntitiesType = RepositoryWebrefWebrefEntities::class;
  protected $webrefEntitiesDataType = '';

  /**
   * @param string
   */
  public function setAmarnaDocid($amarnaDocid)
  {
    $this->amarnaDocid = $amarnaDocid;
  }
  /**
   * @return string
   */
  public function getAmarnaDocid()
  {
    return $this->amarnaDocid;
  }
  /**
   * @param string
   */
  public function setAsrLanguage($asrLanguage)
  {
    $this->asrLanguage = $asrLanguage;
  }
  /**
   * @return string
   */
  public function getAsrLanguage()
  {
    return $this->asrLanguage;
  }
  /**
   * @param QualityNavboostCrapsCrapsData
   */
  public function setCrapsData(QualityNavboostCrapsCrapsData $crapsData)
  {
    $this->crapsData = $crapsData;
  }
  /**
   * @return QualityNavboostCrapsCrapsData
   */
  public function getCrapsData()
  {
    return $this->crapsData;
  }
  /**
   * @param string
   */
  public function setDescription($description)
  {
    $this->description = $description;
  }
  /**
   * @return string
   */
  public function getDescription()
  {
    return $this->description;
  }
  /**
   * @param string
   */
  public function setDocLanguage($docLanguage)
  {
    $this->docLanguage = $docLanguage;
  }
  /**
   * @return string
   */
  public function getDocLanguage()
  {
    return $this->docLanguage;
  }
  /**
   * @param float
   */
  public function setDurationMs($durationMs)
  {
    $this->durationMs = $durationMs;
  }
  /**
   * @return float
   */
  public function getDurationMs()
  {
    return $this->durationMs;
  }
  /**
   * @param bool
   */
  public function setHasAsr($hasAsr)
  {
    $this->hasAsr = $hasAsr;
  }
  /**
   * @return bool
   */
  public function getHasAsr()
  {
    return $this->hasAsr;
  }
  /**
   * @param bool
   */
  public function setHasDescriptionAnchors($hasDescriptionAnchors)
  {
    $this->hasDescriptionAnchors = $hasDescriptionAnchors;
  }
  /**
   * @return bool
   */
  public function getHasDescriptionAnchors()
  {
    return $this->hasDescriptionAnchors;
  }
  /**
   * @param bool
   */
  public function setIsSafe($isSafe)
  {
    $this->isSafe = $isSafe;
  }
  /**
   * @return bool
   */
  public function getIsSafe()
  {
    return $this->isSafe;
  }
  /**
   * @param bool
   */
  public function setIsWatchpage($isWatchpage)
  {
    $this->isWatchpage = $isWatchpage;
  }
  /**
   * @return bool
   */
  public function getIsWatchpage()
  {
    return $this->isWatchpage;
  }
  /**
   * @param string[]
   */
  public function setNavqueries($navqueries)
  {
    $this->navqueries = $navqueries;
  }
  /**
   * @return string[]
   */
  public function getNavqueries()
  {
    return $this->navqueries;
  }
  /**
   * @param float
   */
  public function setNsr($nsr)
  {
    $this->nsr = $nsr;
  }
  /**
   * @return float
   */
  public function getNsr()
  {
    return $this->nsr;
  }
  /**
   * @param string
   */
  public function setNumViews($numViews)
  {
    $this->numViews = $numViews;
  }
  /**
   * @return string
   */
  public function getNumViews()
  {
    return $this->numViews;
  }
  /**
   * @param PseudoVideoData
   */
  public function setPseudoVideoData(PseudoVideoData $pseudoVideoData)
  {
    $this->pseudoVideoData = $pseudoVideoData;
  }
  /**
   * @return PseudoVideoData
   */
  public function getPseudoVideoData()
  {
    return $this->pseudoVideoData;
  }
  /**
   * @param NlpSaftDocument
   */
  public function setSaftDoc(NlpSaftDocument $saftDoc)
  {
    $this->saftDoc = $saftDoc;
  }
  /**
   * @return NlpSaftDocument
   */
  public function getSaftDoc()
  {
    return $this->saftDoc;
  }
  /**
   * @param string
   */
  public function setSaftTranscript($saftTranscript)
  {
    $this->saftTranscript = $saftTranscript;
  }
  /**
   * @return string
   */
  public function getSaftTranscript()
  {
    return $this->saftTranscript;
  }
  /**
   * @param QualitySalientTermsSalientTermSet
   */
  public function setSalientTermSet(QualitySalientTermsSalientTermSet $salientTermSet)
  {
    $this->salientTermSet = $salientTermSet;
  }
  /**
   * @return QualitySalientTermsSalientTermSet
   */
  public function getSalientTermSet()
  {
    return $this->salientTermSet;
  }
  /**
   * @param int[]
   */
  public function setSubindexid($subindexid)
  {
    $this->subindexid = $subindexid;
  }
  /**
   * @return int[]
   */
  public function getSubindexid()
  {
    return $this->subindexid;
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
   * @param string
   */
  public function setTitleLanguage($titleLanguage)
  {
    $this->titleLanguage = $titleLanguage;
  }
  /**
   * @return string
   */
  public function getTitleLanguage()
  {
    return $this->titleLanguage;
  }
  /**
   * @param QualityWebanswersTranscriptAnnotations
   */
  public function setTranscriptAnnotations(QualityWebanswersTranscriptAnnotations $transcriptAnnotations)
  {
    $this->transcriptAnnotations = $transcriptAnnotations;
  }
  /**
   * @return QualityWebanswersTranscriptAnnotations
   */
  public function getTranscriptAnnotations()
  {
    return $this->transcriptAnnotations;
  }
  /**
   * @param int
   */
  public function setUniqueChromeViews($uniqueChromeViews)
  {
    $this->uniqueChromeViews = $uniqueChromeViews;
  }
  /**
   * @return int
   */
  public function getUniqueChromeViews()
  {
    return $this->uniqueChromeViews;
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
  /**
   * @param IndexingMlVerticalVerticalItem[]
   */
  public function setVerticalItem($verticalItem)
  {
    $this->verticalItem = $verticalItem;
  }
  /**
   * @return IndexingMlVerticalVerticalItem[]
   */
  public function getVerticalItem()
  {
    return $this->verticalItem;
  }
  /**
   * @param string
   */
  public function setVideoGenre($videoGenre)
  {
    $this->videoGenre = $videoGenre;
  }
  /**
   * @return string
   */
  public function getVideoGenre()
  {
    return $this->videoGenre;
  }
  /**
   * @param string
   */
  public function setVideoType($videoType)
  {
    $this->videoType = $videoType;
  }
  /**
   * @return string
   */
  public function getVideoType()
  {
    return $this->videoType;
  }
  /**
   * @param string
   */
  public function setVideoUrl($videoUrl)
  {
    $this->videoUrl = $videoUrl;
  }
  /**
   * @return string
   */
  public function getVideoUrl()
  {
    return $this->videoUrl;
  }
  /**
   * @param RepositoryWebrefWebrefEntities
   */
  public function setWebrefEntities(RepositoryWebrefWebrefEntities $webrefEntities)
  {
    $this->webrefEntities = $webrefEntities;
  }
  /**
   * @return RepositoryWebrefWebrefEntities
   */
  public function getWebrefEntities()
  {
    return $this->webrefEntities;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VideoContentSearchVideoInfo::class, 'Google_Service_Contentwarehouse_VideoContentSearchVideoInfo');
