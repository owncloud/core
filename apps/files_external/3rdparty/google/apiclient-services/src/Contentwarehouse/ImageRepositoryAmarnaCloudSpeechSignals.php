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

class ImageRepositoryAmarnaCloudSpeechSignals extends \Google\Collection
{
  protected $collection_key = 'results';
  /**
   * @var string
   */
  public $langWithoutLocale;
  /**
   * @var string
   */
  public $modelIdentifier;
  protected $resultsType = ImageRepositorySpeechRecognitionResult::class;
  protected $resultsDataType = 'array';
  protected $transcriptAsrType = PseudoVideoData::class;
  protected $transcriptAsrDataType = '';

  /**
   * @param string
   */
  public function setLangWithoutLocale($langWithoutLocale)
  {
    $this->langWithoutLocale = $langWithoutLocale;
  }
  /**
   * @return string
   */
  public function getLangWithoutLocale()
  {
    return $this->langWithoutLocale;
  }
  /**
   * @param string
   */
  public function setModelIdentifier($modelIdentifier)
  {
    $this->modelIdentifier = $modelIdentifier;
  }
  /**
   * @return string
   */
  public function getModelIdentifier()
  {
    return $this->modelIdentifier;
  }
  /**
   * @param ImageRepositorySpeechRecognitionResult[]
   */
  public function setResults($results)
  {
    $this->results = $results;
  }
  /**
   * @return ImageRepositorySpeechRecognitionResult[]
   */
  public function getResults()
  {
    return $this->results;
  }
  /**
   * @param PseudoVideoData
   */
  public function setTranscriptAsr(PseudoVideoData $transcriptAsr)
  {
    $this->transcriptAsr = $transcriptAsr;
  }
  /**
   * @return PseudoVideoData
   */
  public function getTranscriptAsr()
  {
    return $this->transcriptAsr;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ImageRepositoryAmarnaCloudSpeechSignals::class, 'Google_Service_Contentwarehouse_ImageRepositoryAmarnaCloudSpeechSignals');
