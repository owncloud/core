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

class SentimentSentiment extends \Google\Model
{
  /**
   * @var string
   */
  public $polarity;
  protected $userBehaviorsType = SentimentSentimentBehaviors::class;
  protected $userBehaviorsDataType = '';
  protected $userEmotionsType = SentimentSentimentEmotions::class;
  protected $userEmotionsDataType = '';

  /**
   * @param string
   */
  public function setPolarity($polarity)
  {
    $this->polarity = $polarity;
  }
  /**
   * @return string
   */
  public function getPolarity()
  {
    return $this->polarity;
  }
  /**
   * @param SentimentSentimentBehaviors
   */
  public function setUserBehaviors(SentimentSentimentBehaviors $userBehaviors)
  {
    $this->userBehaviors = $userBehaviors;
  }
  /**
   * @return SentimentSentimentBehaviors
   */
  public function getUserBehaviors()
  {
    return $this->userBehaviors;
  }
  /**
   * @param SentimentSentimentEmotions
   */
  public function setUserEmotions(SentimentSentimentEmotions $userEmotions)
  {
    $this->userEmotions = $userEmotions;
  }
  /**
   * @return SentimentSentimentEmotions
   */
  public function getUserEmotions()
  {
    return $this->userEmotions;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SentimentSentiment::class, 'Google_Service_Contentwarehouse_SentimentSentiment');
