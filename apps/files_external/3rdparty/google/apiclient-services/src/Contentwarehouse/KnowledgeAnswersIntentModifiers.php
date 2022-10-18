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

class KnowledgeAnswersIntentModifiers extends \Google\Model
{
  /**
   * @var string
   */
  public $alternateLanguage;
  /**
   * @var string
   */
  public $definiteness;
  /**
   * @var string
   */
  public $language;
  /**
   * @var string
   */
  public $mood;
  /**
   * @var string
   */
  public $plurality;
  /**
   * @var bool
   */
  public $polarQuestion;
  protected $sentimentType = SentimentSentiment::class;
  protected $sentimentDataType = '';
  /**
   * @var string
   */
  public $tense;

  /**
   * @param string
   */
  public function setAlternateLanguage($alternateLanguage)
  {
    $this->alternateLanguage = $alternateLanguage;
  }
  /**
   * @return string
   */
  public function getAlternateLanguage()
  {
    return $this->alternateLanguage;
  }
  /**
   * @param string
   */
  public function setDefiniteness($definiteness)
  {
    $this->definiteness = $definiteness;
  }
  /**
   * @return string
   */
  public function getDefiniteness()
  {
    return $this->definiteness;
  }
  /**
   * @param string
   */
  public function setLanguage($language)
  {
    $this->language = $language;
  }
  /**
   * @return string
   */
  public function getLanguage()
  {
    return $this->language;
  }
  /**
   * @param string
   */
  public function setMood($mood)
  {
    $this->mood = $mood;
  }
  /**
   * @return string
   */
  public function getMood()
  {
    return $this->mood;
  }
  /**
   * @param string
   */
  public function setPlurality($plurality)
  {
    $this->plurality = $plurality;
  }
  /**
   * @return string
   */
  public function getPlurality()
  {
    return $this->plurality;
  }
  /**
   * @param bool
   */
  public function setPolarQuestion($polarQuestion)
  {
    $this->polarQuestion = $polarQuestion;
  }
  /**
   * @return bool
   */
  public function getPolarQuestion()
  {
    return $this->polarQuestion;
  }
  /**
   * @param SentimentSentiment
   */
  public function setSentiment(SentimentSentiment $sentiment)
  {
    $this->sentiment = $sentiment;
  }
  /**
   * @return SentimentSentiment
   */
  public function getSentiment()
  {
    return $this->sentiment;
  }
  /**
   * @param string
   */
  public function setTense($tense)
  {
    $this->tense = $tense;
  }
  /**
   * @return string
   */
  public function getTense()
  {
    return $this->tense;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(KnowledgeAnswersIntentModifiers::class, 'Google_Service_Contentwarehouse_KnowledgeAnswersIntentModifiers');
