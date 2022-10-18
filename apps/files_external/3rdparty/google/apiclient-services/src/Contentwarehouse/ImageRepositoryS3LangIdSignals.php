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

class ImageRepositoryS3LangIdSignals extends \Google\Model
{
  /**
   * @var bool
   */
  public $containsSpeech;
  /**
   * @var string
   */
  public $endSec;
  protected $langidResultType = SpeechS3LanguageIdentificationResult::class;
  protected $langidResultDataType = '';
  protected $languageIdentificationType = VideoTimedtextS4ALIResults::class;
  protected $languageIdentificationDataType = '';
  /**
   * @var string
   */
  public $modelVersion;
  /**
   * @var int
   */
  public $speechFrameCount;
  /**
   * @var string
   */
  public $startSec;
  /**
   * @var int
   */
  public $totalFrameCount;

  /**
   * @param bool
   */
  public function setContainsSpeech($containsSpeech)
  {
    $this->containsSpeech = $containsSpeech;
  }
  /**
   * @return bool
   */
  public function getContainsSpeech()
  {
    return $this->containsSpeech;
  }
  /**
   * @param string
   */
  public function setEndSec($endSec)
  {
    $this->endSec = $endSec;
  }
  /**
   * @return string
   */
  public function getEndSec()
  {
    return $this->endSec;
  }
  /**
   * @param SpeechS3LanguageIdentificationResult
   */
  public function setLangidResult(SpeechS3LanguageIdentificationResult $langidResult)
  {
    $this->langidResult = $langidResult;
  }
  /**
   * @return SpeechS3LanguageIdentificationResult
   */
  public function getLangidResult()
  {
    return $this->langidResult;
  }
  /**
   * @param VideoTimedtextS4ALIResults
   */
  public function setLanguageIdentification(VideoTimedtextS4ALIResults $languageIdentification)
  {
    $this->languageIdentification = $languageIdentification;
  }
  /**
   * @return VideoTimedtextS4ALIResults
   */
  public function getLanguageIdentification()
  {
    return $this->languageIdentification;
  }
  /**
   * @param string
   */
  public function setModelVersion($modelVersion)
  {
    $this->modelVersion = $modelVersion;
  }
  /**
   * @return string
   */
  public function getModelVersion()
  {
    return $this->modelVersion;
  }
  /**
   * @param int
   */
  public function setSpeechFrameCount($speechFrameCount)
  {
    $this->speechFrameCount = $speechFrameCount;
  }
  /**
   * @return int
   */
  public function getSpeechFrameCount()
  {
    return $this->speechFrameCount;
  }
  /**
   * @param string
   */
  public function setStartSec($startSec)
  {
    $this->startSec = $startSec;
  }
  /**
   * @return string
   */
  public function getStartSec()
  {
    return $this->startSec;
  }
  /**
   * @param int
   */
  public function setTotalFrameCount($totalFrameCount)
  {
    $this->totalFrameCount = $totalFrameCount;
  }
  /**
   * @return int
   */
  public function getTotalFrameCount()
  {
    return $this->totalFrameCount;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ImageRepositoryS3LangIdSignals::class, 'Google_Service_Contentwarehouse_ImageRepositoryS3LangIdSignals');
