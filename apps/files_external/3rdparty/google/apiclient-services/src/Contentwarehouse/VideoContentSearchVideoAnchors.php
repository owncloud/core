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

class VideoContentSearchVideoAnchors extends \Google\Collection
{
  protected $collection_key = 'videoAnchor';
  /**
   * @var string
   */
  public $anchorType;
  protected $entityGroupInfoType = VideoContentSearchEntityGroupInfo::class;
  protected $entityGroupInfoDataType = '';
  /**
   * @var float
   */
  public $experimentalPredictedQuerylessTocUsefulness;
  /**
   * @var string[]
   */
  public $filterReason;
  /**
   * @var bool
   */
  public $isFiltered;
  /**
   * @var string[]
   */
  public $mergedAnchorsSources;
  /**
   * @var float
   */
  public $predictedQuerylessTocUsefulness;
  /**
   * @var float
   */
  public $score;
  protected $scoreInfoType = VideoContentSearchVideoAnchorsScoreInfo::class;
  protected $scoreInfoDataType = '';
  /**
   * @var bool
   */
  public $shouldServeThumbnails;
  /**
   * @var bool
   */
  public $thumbnailForced;
  protected $thumbnailSetInfoType = VideoContentSearchAnchorsThumbnailInfo::class;
  protected $thumbnailSetInfoDataType = '';
  protected $videoAnchorType = VideoContentSearchVideoAnchor::class;
  protected $videoAnchorDataType = 'array';
  protected $videoIntroductionType = VideoContentSearchVideoIntroduction::class;
  protected $videoIntroductionDataType = '';

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
   * @param VideoContentSearchEntityGroupInfo
   */
  public function setEntityGroupInfo(VideoContentSearchEntityGroupInfo $entityGroupInfo)
  {
    $this->entityGroupInfo = $entityGroupInfo;
  }
  /**
   * @return VideoContentSearchEntityGroupInfo
   */
  public function getEntityGroupInfo()
  {
    return $this->entityGroupInfo;
  }
  /**
   * @param float
   */
  public function setExperimentalPredictedQuerylessTocUsefulness($experimentalPredictedQuerylessTocUsefulness)
  {
    $this->experimentalPredictedQuerylessTocUsefulness = $experimentalPredictedQuerylessTocUsefulness;
  }
  /**
   * @return float
   */
  public function getExperimentalPredictedQuerylessTocUsefulness()
  {
    return $this->experimentalPredictedQuerylessTocUsefulness;
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
   * @param string[]
   */
  public function setMergedAnchorsSources($mergedAnchorsSources)
  {
    $this->mergedAnchorsSources = $mergedAnchorsSources;
  }
  /**
   * @return string[]
   */
  public function getMergedAnchorsSources()
  {
    return $this->mergedAnchorsSources;
  }
  /**
   * @param float
   */
  public function setPredictedQuerylessTocUsefulness($predictedQuerylessTocUsefulness)
  {
    $this->predictedQuerylessTocUsefulness = $predictedQuerylessTocUsefulness;
  }
  /**
   * @return float
   */
  public function getPredictedQuerylessTocUsefulness()
  {
    return $this->predictedQuerylessTocUsefulness;
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
   * @param VideoContentSearchVideoAnchorsScoreInfo
   */
  public function setScoreInfo(VideoContentSearchVideoAnchorsScoreInfo $scoreInfo)
  {
    $this->scoreInfo = $scoreInfo;
  }
  /**
   * @return VideoContentSearchVideoAnchorsScoreInfo
   */
  public function getScoreInfo()
  {
    return $this->scoreInfo;
  }
  /**
   * @param bool
   */
  public function setShouldServeThumbnails($shouldServeThumbnails)
  {
    $this->shouldServeThumbnails = $shouldServeThumbnails;
  }
  /**
   * @return bool
   */
  public function getShouldServeThumbnails()
  {
    return $this->shouldServeThumbnails;
  }
  /**
   * @param bool
   */
  public function setThumbnailForced($thumbnailForced)
  {
    $this->thumbnailForced = $thumbnailForced;
  }
  /**
   * @return bool
   */
  public function getThumbnailForced()
  {
    return $this->thumbnailForced;
  }
  /**
   * @param VideoContentSearchAnchorsThumbnailInfo
   */
  public function setThumbnailSetInfo(VideoContentSearchAnchorsThumbnailInfo $thumbnailSetInfo)
  {
    $this->thumbnailSetInfo = $thumbnailSetInfo;
  }
  /**
   * @return VideoContentSearchAnchorsThumbnailInfo
   */
  public function getThumbnailSetInfo()
  {
    return $this->thumbnailSetInfo;
  }
  /**
   * @param VideoContentSearchVideoAnchor[]
   */
  public function setVideoAnchor($videoAnchor)
  {
    $this->videoAnchor = $videoAnchor;
  }
  /**
   * @return VideoContentSearchVideoAnchor[]
   */
  public function getVideoAnchor()
  {
    return $this->videoAnchor;
  }
  /**
   * @param VideoContentSearchVideoIntroduction
   */
  public function setVideoIntroduction(VideoContentSearchVideoIntroduction $videoIntroduction)
  {
    $this->videoIntroduction = $videoIntroduction;
  }
  /**
   * @return VideoContentSearchVideoIntroduction
   */
  public function getVideoIntroduction()
  {
    return $this->videoIntroduction;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VideoContentSearchVideoAnchors::class, 'Google_Service_Contentwarehouse_VideoContentSearchVideoAnchors');
