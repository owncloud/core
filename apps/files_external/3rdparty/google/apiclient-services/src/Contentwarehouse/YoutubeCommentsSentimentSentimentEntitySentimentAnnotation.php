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

class YoutubeCommentsSentimentSentimentEntitySentimentAnnotation extends \Google\Collection
{
  protected $collection_key = 'mentionSentiment';
  /**
   * @var string
   */
  public $entityName;
  /**
   * @var float
   */
  public $magnitude;
  protected $mentionSentimentType = YoutubeCommentsSentimentSentimentEntitySentimentAnnotationMentionSentimentAnnotation::class;
  protected $mentionSentimentDataType = 'array';
  /**
   * @var string
   */
  public $mid;
  /**
   * @var float
   */
  public $polarity;
  /**
   * @var float
   */
  public $score;

  /**
   * @param string
   */
  public function setEntityName($entityName)
  {
    $this->entityName = $entityName;
  }
  /**
   * @return string
   */
  public function getEntityName()
  {
    return $this->entityName;
  }
  /**
   * @param float
   */
  public function setMagnitude($magnitude)
  {
    $this->magnitude = $magnitude;
  }
  /**
   * @return float
   */
  public function getMagnitude()
  {
    return $this->magnitude;
  }
  /**
   * @param YoutubeCommentsSentimentSentimentEntitySentimentAnnotationMentionSentimentAnnotation[]
   */
  public function setMentionSentiment($mentionSentiment)
  {
    $this->mentionSentiment = $mentionSentiment;
  }
  /**
   * @return YoutubeCommentsSentimentSentimentEntitySentimentAnnotationMentionSentimentAnnotation[]
   */
  public function getMentionSentiment()
  {
    return $this->mentionSentiment;
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
   * @param float
   */
  public function setPolarity($polarity)
  {
    $this->polarity = $polarity;
  }
  /**
   * @return float
   */
  public function getPolarity()
  {
    return $this->polarity;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(YoutubeCommentsSentimentSentimentEntitySentimentAnnotation::class, 'Google_Service_Contentwarehouse_YoutubeCommentsSentimentSentimentEntitySentimentAnnotation');
