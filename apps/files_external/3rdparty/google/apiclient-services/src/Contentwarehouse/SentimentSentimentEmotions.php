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

class SentimentSentimentEmotions extends \Google\Model
{
  /**
   * @var string
   */
  public $anger;
  /**
   * @var string
   */
  public $disgust;
  /**
   * @var string
   */
  public $fear;
  /**
   * @var string
   */
  public $happiness;
  /**
   * @var string
   */
  public $sadness;
  /**
   * @var string
   */
  public $surprise;

  /**
   * @param string
   */
  public function setAnger($anger)
  {
    $this->anger = $anger;
  }
  /**
   * @return string
   */
  public function getAnger()
  {
    return $this->anger;
  }
  /**
   * @param string
   */
  public function setDisgust($disgust)
  {
    $this->disgust = $disgust;
  }
  /**
   * @return string
   */
  public function getDisgust()
  {
    return $this->disgust;
  }
  /**
   * @param string
   */
  public function setFear($fear)
  {
    $this->fear = $fear;
  }
  /**
   * @return string
   */
  public function getFear()
  {
    return $this->fear;
  }
  /**
   * @param string
   */
  public function setHappiness($happiness)
  {
    $this->happiness = $happiness;
  }
  /**
   * @return string
   */
  public function getHappiness()
  {
    return $this->happiness;
  }
  /**
   * @param string
   */
  public function setSadness($sadness)
  {
    $this->sadness = $sadness;
  }
  /**
   * @return string
   */
  public function getSadness()
  {
    return $this->sadness;
  }
  /**
   * @param string
   */
  public function setSurprise($surprise)
  {
    $this->surprise = $surprise;
  }
  /**
   * @return string
   */
  public function getSurprise()
  {
    return $this->surprise;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SentimentSentimentEmotions::class, 'Google_Service_Contentwarehouse_SentimentSentimentEmotions');
