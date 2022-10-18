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

class SocialGraphApiProtoPronunciation extends \Google\Model
{
  /**
   * @var string
   */
  public $learningSessionId;
  /**
   * @var string
   */
  public $learningSource;
  /**
   * @var string
   */
  public $locale;
  /**
   * @var string
   */
  public $phonemes;
  /**
   * @var string
   */
  public $phonologyType;
  /**
   * @var string
   */
  public $spellingHint;
  /**
   * @var string
   */
  public $token;

  /**
   * @param string
   */
  public function setLearningSessionId($learningSessionId)
  {
    $this->learningSessionId = $learningSessionId;
  }
  /**
   * @return string
   */
  public function getLearningSessionId()
  {
    return $this->learningSessionId;
  }
  /**
   * @param string
   */
  public function setLearningSource($learningSource)
  {
    $this->learningSource = $learningSource;
  }
  /**
   * @return string
   */
  public function getLearningSource()
  {
    return $this->learningSource;
  }
  /**
   * @param string
   */
  public function setLocale($locale)
  {
    $this->locale = $locale;
  }
  /**
   * @return string
   */
  public function getLocale()
  {
    return $this->locale;
  }
  /**
   * @param string
   */
  public function setPhonemes($phonemes)
  {
    $this->phonemes = $phonemes;
  }
  /**
   * @return string
   */
  public function getPhonemes()
  {
    return $this->phonemes;
  }
  /**
   * @param string
   */
  public function setPhonologyType($phonologyType)
  {
    $this->phonologyType = $phonologyType;
  }
  /**
   * @return string
   */
  public function getPhonologyType()
  {
    return $this->phonologyType;
  }
  /**
   * @param string
   */
  public function setSpellingHint($spellingHint)
  {
    $this->spellingHint = $spellingHint;
  }
  /**
   * @return string
   */
  public function getSpellingHint()
  {
    return $this->spellingHint;
  }
  /**
   * @param string
   */
  public function setToken($token)
  {
    $this->token = $token;
  }
  /**
   * @return string
   */
  public function getToken()
  {
    return $this->token;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SocialGraphApiProtoPronunciation::class, 'Google_Service_Contentwarehouse_SocialGraphApiProtoPronunciation');
