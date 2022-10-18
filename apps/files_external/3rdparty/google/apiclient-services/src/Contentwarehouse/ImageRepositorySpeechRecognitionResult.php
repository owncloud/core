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

class ImageRepositorySpeechRecognitionResult extends \Google\Collection
{
  protected $collection_key = 'alternatives';
  protected $alternativesType = ImageRepositorySpeechRecognitionAlternative::class;
  protected $alternativesDataType = 'array';
  /**
   * @var int
   */
  public $channelTag;
  /**
   * @var string
   */
  public $languageCode;
  /**
   * @var string
   */
  public $resultEndTime;

  /**
   * @param ImageRepositorySpeechRecognitionAlternative[]
   */
  public function setAlternatives($alternatives)
  {
    $this->alternatives = $alternatives;
  }
  /**
   * @return ImageRepositorySpeechRecognitionAlternative[]
   */
  public function getAlternatives()
  {
    return $this->alternatives;
  }
  /**
   * @param int
   */
  public function setChannelTag($channelTag)
  {
    $this->channelTag = $channelTag;
  }
  /**
   * @return int
   */
  public function getChannelTag()
  {
    return $this->channelTag;
  }
  /**
   * @param string
   */
  public function setLanguageCode($languageCode)
  {
    $this->languageCode = $languageCode;
  }
  /**
   * @return string
   */
  public function getLanguageCode()
  {
    return $this->languageCode;
  }
  /**
   * @param string
   */
  public function setResultEndTime($resultEndTime)
  {
    $this->resultEndTime = $resultEndTime;
  }
  /**
   * @return string
   */
  public function getResultEndTime()
  {
    return $this->resultEndTime;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ImageRepositorySpeechRecognitionResult::class, 'Google_Service_Contentwarehouse_ImageRepositorySpeechRecognitionResult');
