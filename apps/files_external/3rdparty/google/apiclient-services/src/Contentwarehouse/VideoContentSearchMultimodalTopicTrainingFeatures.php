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

class VideoContentSearchMultimodalTopicTrainingFeatures extends \Google\Collection
{
  protected $collection_key = 'topicDenseVector';
  protected $maxFrameSimilarityIntervalType = VideoContentSearchFrameSimilarityInterval::class;
  protected $maxFrameSimilarityIntervalDataType = '';
  /**
   * @var string
   */
  public $normalizedTopic;
  protected $qbstTermsOverlapFeaturesType = VideoContentSearchQbstTermsOverlapFeatures::class;
  protected $qbstTermsOverlapFeaturesDataType = '';
  protected $rankembedNearestNeighborsFeaturesType = VideoContentSearchRankEmbedNearestNeighborsFeatures::class;
  protected $rankembedNearestNeighborsFeaturesDataType = '';
  protected $saftEntityInfoType = VideoContentSearchSaftEntityInfo::class;
  protected $saftEntityInfoDataType = '';
  /**
   * @var float[]
   */
  public $topicDenseVector;

  /**
   * @param VideoContentSearchFrameSimilarityInterval
   */
  public function setMaxFrameSimilarityInterval(VideoContentSearchFrameSimilarityInterval $maxFrameSimilarityInterval)
  {
    $this->maxFrameSimilarityInterval = $maxFrameSimilarityInterval;
  }
  /**
   * @return VideoContentSearchFrameSimilarityInterval
   */
  public function getMaxFrameSimilarityInterval()
  {
    return $this->maxFrameSimilarityInterval;
  }
  /**
   * @param string
   */
  public function setNormalizedTopic($normalizedTopic)
  {
    $this->normalizedTopic = $normalizedTopic;
  }
  /**
   * @return string
   */
  public function getNormalizedTopic()
  {
    return $this->normalizedTopic;
  }
  /**
   * @param VideoContentSearchQbstTermsOverlapFeatures
   */
  public function setQbstTermsOverlapFeatures(VideoContentSearchQbstTermsOverlapFeatures $qbstTermsOverlapFeatures)
  {
    $this->qbstTermsOverlapFeatures = $qbstTermsOverlapFeatures;
  }
  /**
   * @return VideoContentSearchQbstTermsOverlapFeatures
   */
  public function getQbstTermsOverlapFeatures()
  {
    return $this->qbstTermsOverlapFeatures;
  }
  /**
   * @param VideoContentSearchRankEmbedNearestNeighborsFeatures
   */
  public function setRankembedNearestNeighborsFeatures(VideoContentSearchRankEmbedNearestNeighborsFeatures $rankembedNearestNeighborsFeatures)
  {
    $this->rankembedNearestNeighborsFeatures = $rankembedNearestNeighborsFeatures;
  }
  /**
   * @return VideoContentSearchRankEmbedNearestNeighborsFeatures
   */
  public function getRankembedNearestNeighborsFeatures()
  {
    return $this->rankembedNearestNeighborsFeatures;
  }
  /**
   * @param VideoContentSearchSaftEntityInfo
   */
  public function setSaftEntityInfo(VideoContentSearchSaftEntityInfo $saftEntityInfo)
  {
    $this->saftEntityInfo = $saftEntityInfo;
  }
  /**
   * @return VideoContentSearchSaftEntityInfo
   */
  public function getSaftEntityInfo()
  {
    return $this->saftEntityInfo;
  }
  /**
   * @param float[]
   */
  public function setTopicDenseVector($topicDenseVector)
  {
    $this->topicDenseVector = $topicDenseVector;
  }
  /**
   * @return float[]
   */
  public function getTopicDenseVector()
  {
    return $this->topicDenseVector;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VideoContentSearchMultimodalTopicTrainingFeatures::class, 'Google_Service_Contentwarehouse_VideoContentSearchMultimodalTopicTrainingFeatures');
