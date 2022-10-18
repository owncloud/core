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

class YoutubeCommentsSentimentSentiment extends \Google\Collection
{
  protected $collection_key = 'entitySentiment';
  protected $entitySentimentType = YoutubeCommentsSentimentSentimentEntitySentimentAnnotation::class;
  protected $entitySentimentDataType = 'array';
  /**
   * @var float
   */
  public $magnitude;
  /**
   * @var float
   */
  public $polarity;
  /**
   * @var float
   */
  public $score;

  /**
   * @param YoutubeCommentsSentimentSentimentEntitySentimentAnnotation[]
   */
  public function setEntitySentiment($entitySentiment)
  {
    $this->entitySentiment = $entitySentiment;
  }
  /**
   * @return YoutubeCommentsSentimentSentimentEntitySentimentAnnotation[]
   */
  public function getEntitySentiment()
  {
    return $this->entitySentiment;
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
class_alias(YoutubeCommentsSentimentSentiment::class, 'Google_Service_Contentwarehouse_YoutubeCommentsSentimentSentiment');
