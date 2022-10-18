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

class SpeechS3LanguageIdentificationResult extends \Google\Collection
{
  protected $collection_key = 'rankedTopSupportedLanguages';
  /**
   * @var string
   */
  public $endTimeUsec;
  protected $rankedTopSupportedLanguagesType = SpeechS3Locale::class;
  protected $rankedTopSupportedLanguagesDataType = 'array';
  /**
   * @var string
   */
  public $startTimeUsec;
  /**
   * @var string
   */
  public $topLanguageConfidence;
  /**
   * @var bool
   */
  public $voicedUtterance;

  /**
   * @param string
   */
  public function setEndTimeUsec($endTimeUsec)
  {
    $this->endTimeUsec = $endTimeUsec;
  }
  /**
   * @return string
   */
  public function getEndTimeUsec()
  {
    return $this->endTimeUsec;
  }
  /**
   * @param SpeechS3Locale[]
   */
  public function setRankedTopSupportedLanguages($rankedTopSupportedLanguages)
  {
    $this->rankedTopSupportedLanguages = $rankedTopSupportedLanguages;
  }
  /**
   * @return SpeechS3Locale[]
   */
  public function getRankedTopSupportedLanguages()
  {
    return $this->rankedTopSupportedLanguages;
  }
  /**
   * @param string
   */
  public function setStartTimeUsec($startTimeUsec)
  {
    $this->startTimeUsec = $startTimeUsec;
  }
  /**
   * @return string
   */
  public function getStartTimeUsec()
  {
    return $this->startTimeUsec;
  }
  /**
   * @param string
   */
  public function setTopLanguageConfidence($topLanguageConfidence)
  {
    $this->topLanguageConfidence = $topLanguageConfidence;
  }
  /**
   * @return string
   */
  public function getTopLanguageConfidence()
  {
    return $this->topLanguageConfidence;
  }
  /**
   * @param bool
   */
  public function setVoicedUtterance($voicedUtterance)
  {
    $this->voicedUtterance = $voicedUtterance;
  }
  /**
   * @return bool
   */
  public function getVoicedUtterance()
  {
    return $this->voicedUtterance;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SpeechS3LanguageIdentificationResult::class, 'Google_Service_Contentwarehouse_SpeechS3LanguageIdentificationResult');
