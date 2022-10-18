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

class VideoContentSearchMultimodalTopicFeatures extends \Google\Collection
{
  protected $collection_key = 'generativeTopicPredictionFeatures';
  protected $frameSimilarityIntervalType = VideoContentSearchFrameSimilarityInterval::class;
  protected $frameSimilarityIntervalDataType = 'array';
  protected $generativeTopicPredictionFeaturesType = VideoContentSearchGenerativeTopicPredictionFeatures::class;
  protected $generativeTopicPredictionFeaturesDataType = 'array';
  protected $navboostAnchorFeaturesType = VideoContentSearchNavboostAnchorFeatures::class;
  protected $navboostAnchorFeaturesDataType = '';
  /**
   * @var string
   */
  public $topic;
  /**
   * @var string
   */
  public $topicEndMs;
  /**
   * @var string
   */
  public $topicStartMs;
  /**
   * @var string
   */
  public $videoQuerySource;

  /**
   * @param VideoContentSearchFrameSimilarityInterval[]
   */
  public function setFrameSimilarityInterval($frameSimilarityInterval)
  {
    $this->frameSimilarityInterval = $frameSimilarityInterval;
  }
  /**
   * @return VideoContentSearchFrameSimilarityInterval[]
   */
  public function getFrameSimilarityInterval()
  {
    return $this->frameSimilarityInterval;
  }
  /**
   * @param VideoContentSearchGenerativeTopicPredictionFeatures[]
   */
  public function setGenerativeTopicPredictionFeatures($generativeTopicPredictionFeatures)
  {
    $this->generativeTopicPredictionFeatures = $generativeTopicPredictionFeatures;
  }
  /**
   * @return VideoContentSearchGenerativeTopicPredictionFeatures[]
   */
  public function getGenerativeTopicPredictionFeatures()
  {
    return $this->generativeTopicPredictionFeatures;
  }
  /**
   * @param VideoContentSearchNavboostAnchorFeatures
   */
  public function setNavboostAnchorFeatures(VideoContentSearchNavboostAnchorFeatures $navboostAnchorFeatures)
  {
    $this->navboostAnchorFeatures = $navboostAnchorFeatures;
  }
  /**
   * @return VideoContentSearchNavboostAnchorFeatures
   */
  public function getNavboostAnchorFeatures()
  {
    return $this->navboostAnchorFeatures;
  }
  /**
   * @param string
   */
  public function setTopic($topic)
  {
    $this->topic = $topic;
  }
  /**
   * @return string
   */
  public function getTopic()
  {
    return $this->topic;
  }
  /**
   * @param string
   */
  public function setTopicEndMs($topicEndMs)
  {
    $this->topicEndMs = $topicEndMs;
  }
  /**
   * @return string
   */
  public function getTopicEndMs()
  {
    return $this->topicEndMs;
  }
  /**
   * @param string
   */
  public function setTopicStartMs($topicStartMs)
  {
    $this->topicStartMs = $topicStartMs;
  }
  /**
   * @return string
   */
  public function getTopicStartMs()
  {
    return $this->topicStartMs;
  }
  /**
   * @param string
   */
  public function setVideoQuerySource($videoQuerySource)
  {
    $this->videoQuerySource = $videoQuerySource;
  }
  /**
   * @return string
   */
  public function getVideoQuerySource()
  {
    return $this->videoQuerySource;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VideoContentSearchMultimodalTopicFeatures::class, 'Google_Service_Contentwarehouse_VideoContentSearchMultimodalTopicFeatures');
