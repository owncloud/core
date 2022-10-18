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

class VideoContentSearchVideoCommonFeatures extends \Google\Collection
{
  protected $collection_key = 'unifiedScoringBertModels';
  /**
   * @var int
   */
  public $anchorCount;
  protected $captionInfoType = VideoContentSearchCaptionInfo::class;
  protected $captionInfoDataType = '';
  /**
   * @var string
   */
  public $labelPhraseEmbeddingModel;
  /**
   * @var string[]
   */
  public $unifiedScoringBertModels;

  /**
   * @param int
   */
  public function setAnchorCount($anchorCount)
  {
    $this->anchorCount = $anchorCount;
  }
  /**
   * @return int
   */
  public function getAnchorCount()
  {
    return $this->anchorCount;
  }
  /**
   * @param VideoContentSearchCaptionInfo
   */
  public function setCaptionInfo(VideoContentSearchCaptionInfo $captionInfo)
  {
    $this->captionInfo = $captionInfo;
  }
  /**
   * @return VideoContentSearchCaptionInfo
   */
  public function getCaptionInfo()
  {
    return $this->captionInfo;
  }
  /**
   * @param string
   */
  public function setLabelPhraseEmbeddingModel($labelPhraseEmbeddingModel)
  {
    $this->labelPhraseEmbeddingModel = $labelPhraseEmbeddingModel;
  }
  /**
   * @return string
   */
  public function getLabelPhraseEmbeddingModel()
  {
    return $this->labelPhraseEmbeddingModel;
  }
  /**
   * @param string[]
   */
  public function setUnifiedScoringBertModels($unifiedScoringBertModels)
  {
    $this->unifiedScoringBertModels = $unifiedScoringBertModels;
  }
  /**
   * @return string[]
   */
  public function getUnifiedScoringBertModels()
  {
    return $this->unifiedScoringBertModels;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VideoContentSearchVideoCommonFeatures::class, 'Google_Service_Contentwarehouse_VideoContentSearchVideoCommonFeatures');
