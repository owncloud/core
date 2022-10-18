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

class VideoContentSearchVideoAnchor extends \Google\Collection
{
  protected $collection_key = 'tokenTimingInfo';
  /**
   * @var float
   */
  public $anchorScore;
  /**
   * @var string
   */
  public $anchorType;
  /**
   * @var string
   */
  public $destinationUrl;
  /**
   * @var string
   */
  public $duration;
  /**
   * @var float
   */
  public $entityScore;
  /**
   * @var string[]
   */
  public $filterReason;
  /**
   * @var bool
   */
  public $isFiltered;
  /**
   * @var bool
   */
  public $isSafe;
  /**
   * @var bool
   */
  public $isScutiBad;
  /**
   * @var string
   */
  public $label;
  /**
   * @var float
   */
  public $labelScore;
  /**
   * @var string
   */
  public $mid;
  protected $namedEntityType = VideoContentSearchNamedEntity::class;
  protected $namedEntityDataType = 'array';
  /**
   * @var float
   */
  public $precisionScore;
  protected $scoreInfoType = VideoContentSearchVideoAnchorScoreInfo::class;
  protected $scoreInfoDataType = '';
  protected $starburstFeaturesType = VideoContentSearchVisualFeatures::class;
  protected $starburstFeaturesDataType = '';
  protected $thumbnailType = VideoContentSearchAnchorThumbnail::class;
  protected $thumbnailDataType = '';
  /**
   * @var string
   */
  public $thumbnailUrl;
  /**
   * @var string
   */
  public $time;
  protected $tokenTimingInfoType = VideoContentSearchTokenTimingInfo::class;
  protected $tokenTimingInfoDataType = 'array';

  /**
   * @param float
   */
  public function setAnchorScore($anchorScore)
  {
    $this->anchorScore = $anchorScore;
  }
  /**
   * @return float
   */
  public function getAnchorScore()
  {
    return $this->anchorScore;
  }
  /**
   * @param string
   */
  public function setAnchorType($anchorType)
  {
    $this->anchorType = $anchorType;
  }
  /**
   * @return string
   */
  public function getAnchorType()
  {
    return $this->anchorType;
  }
  /**
   * @param string
   */
  public function setDestinationUrl($destinationUrl)
  {
    $this->destinationUrl = $destinationUrl;
  }
  /**
   * @return string
   */
  public function getDestinationUrl()
  {
    return $this->destinationUrl;
  }
  /**
   * @param string
   */
  public function setDuration($duration)
  {
    $this->duration = $duration;
  }
  /**
   * @return string
   */
  public function getDuration()
  {
    return $this->duration;
  }
  /**
   * @param float
   */
  public function setEntityScore($entityScore)
  {
    $this->entityScore = $entityScore;
  }
  /**
   * @return float
   */
  public function getEntityScore()
  {
    return $this->entityScore;
  }
  /**
   * @param string[]
   */
  public function setFilterReason($filterReason)
  {
    $this->filterReason = $filterReason;
  }
  /**
   * @return string[]
   */
  public function getFilterReason()
  {
    return $this->filterReason;
  }
  /**
   * @param bool
   */
  public function setIsFiltered($isFiltered)
  {
    $this->isFiltered = $isFiltered;
  }
  /**
   * @return bool
   */
  public function getIsFiltered()
  {
    return $this->isFiltered;
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
  public function setIsScutiBad($isScutiBad)
  {
    $this->isScutiBad = $isScutiBad;
  }
  /**
   * @return bool
   */
  public function getIsScutiBad()
  {
    return $this->isScutiBad;
  }
  /**
   * @param string
   */
  public function setLabel($label)
  {
    $this->label = $label;
  }
  /**
   * @return string
   */
  public function getLabel()
  {
    return $this->label;
  }
  /**
   * @param float
   */
  public function setLabelScore($labelScore)
  {
    $this->labelScore = $labelScore;
  }
  /**
   * @return float
   */
  public function getLabelScore()
  {
    return $this->labelScore;
  }
  /**
   * @param string
   */
  public function setMid($mid)
  {
    $this->mid = $mid;
  }
  /**
   * @return string
   */
  public function getMid()
  {
    return $this->mid;
  }
  /**
   * @param VideoContentSearchNamedEntity[]
   */
  public function setNamedEntity($namedEntity)
  {
    $this->namedEntity = $namedEntity;
  }
  /**
   * @return VideoContentSearchNamedEntity[]
   */
  public function getNamedEntity()
  {
    return $this->namedEntity;
  }
  /**
   * @param float
   */
  public function setPrecisionScore($precisionScore)
  {
    $this->precisionScore = $precisionScore;
  }
  /**
   * @return float
   */
  public function getPrecisionScore()
  {
    return $this->precisionScore;
  }
  /**
   * @param VideoContentSearchVideoAnchorScoreInfo
   */
  public function setScoreInfo(VideoContentSearchVideoAnchorScoreInfo $scoreInfo)
  {
    $this->scoreInfo = $scoreInfo;
  }
  /**
   * @return VideoContentSearchVideoAnchorScoreInfo
   */
  public function getScoreInfo()
  {
    return $this->scoreInfo;
  }
  /**
   * @param VideoContentSearchVisualFeatures
   */
  public function setStarburstFeatures(VideoContentSearchVisualFeatures $starburstFeatures)
  {
    $this->starburstFeatures = $starburstFeatures;
  }
  /**
   * @return VideoContentSearchVisualFeatures
   */
  public function getStarburstFeatures()
  {
    return $this->starburstFeatures;
  }
  /**
   * @param VideoContentSearchAnchorThumbnail
   */
  public function setThumbnail(VideoContentSearchAnchorThumbnail $thumbnail)
  {
    $this->thumbnail = $thumbnail;
  }
  /**
   * @return VideoContentSearchAnchorThumbnail
   */
  public function getThumbnail()
  {
    return $this->thumbnail;
  }
  /**
   * @param string
   */
  public function setThumbnailUrl($thumbnailUrl)
  {
    $this->thumbnailUrl = $thumbnailUrl;
  }
  /**
   * @return string
   */
  public function getThumbnailUrl()
  {
    return $this->thumbnailUrl;
  }
  /**
   * @param string
   */
  public function setTime($time)
  {
    $this->time = $time;
  }
  /**
   * @return string
   */
  public function getTime()
  {
    return $this->time;
  }
  /**
   * @param VideoContentSearchTokenTimingInfo[]
   */
  public function setTokenTimingInfo($tokenTimingInfo)
  {
    $this->tokenTimingInfo = $tokenTimingInfo;
  }
  /**
   * @return VideoContentSearchTokenTimingInfo[]
   */
  public function getTokenTimingInfo()
  {
    return $this->tokenTimingInfo;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VideoContentSearchVideoAnchor::class, 'Google_Service_Contentwarehouse_VideoContentSearchVideoAnchor');
