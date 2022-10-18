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

class YoutubeCommentsSentimentSentimentEntitySentimentAnnotationMentionSentimentAnnotation extends \Google\Model
{
  /**
   * @var string
   */
  public $endToken;
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
   * @var string
   */
  public $startToken;

  /**
   * @param string
   */
  public function setEndToken($endToken)
  {
    $this->endToken = $endToken;
  }
  /**
   * @return string
   */
  public function getEndToken()
  {
    return $this->endToken;
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
  /**
   * @param string
   */
  public function setStartToken($startToken)
  {
    $this->startToken = $startToken;
  }
  /**
   * @return string
   */
  public function getStartToken()
  {
    return $this->startToken;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(YoutubeCommentsSentimentSentimentEntitySentimentAnnotationMentionSentimentAnnotation::class, 'Google_Service_Contentwarehouse_YoutubeCommentsSentimentSentimentEntitySentimentAnnotationMentionSentimentAnnotation');
