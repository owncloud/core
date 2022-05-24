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

namespace Google\Service\Speech;

class RecognitionConfig extends \Google\Collection
{
  protected $collection_key = 'speechContexts';
  protected $adaptationType = SpeechAdaptation::class;
  protected $adaptationDataType = '';
  /**
   * @var string[]
   */
  public $alternativeLanguageCodes;
  /**
   * @var int
   */
  public $audioChannelCount;
  protected $diarizationConfigType = SpeakerDiarizationConfig::class;
  protected $diarizationConfigDataType = '';
  /**
   * @var bool
   */
  public $enableAutomaticPunctuation;
  /**
   * @var bool
   */
  public $enableSeparateRecognitionPerChannel;
  /**
   * @var bool
   */
  public $enableSpokenEmojis;
  /**
   * @var bool
   */
  public $enableSpokenPunctuation;
  /**
   * @var bool
   */
  public $enableWordConfidence;
  /**
   * @var bool
   */
  public $enableWordTimeOffsets;
  /**
   * @var string
   */
  public $encoding;
  /**
   * @var string
   */
  public $languageCode;
  /**
   * @var int
   */
  public $maxAlternatives;
  protected $metadataType = RecognitionMetadata::class;
  protected $metadataDataType = '';
  /**
   * @var string
   */
  public $model;
  /**
   * @var bool
   */
  public $profanityFilter;
  /**
   * @var int
   */
  public $sampleRateHertz;
  protected $speechContextsType = SpeechContext::class;
  protected $speechContextsDataType = 'array';
  /**
   * @var bool
   */
  public $useEnhanced;

  /**
   * @param SpeechAdaptation
   */
  public function setAdaptation(SpeechAdaptation $adaptation)
  {
    $this->adaptation = $adaptation;
  }
  /**
   * @return SpeechAdaptation
   */
  public function getAdaptation()
  {
    return $this->adaptation;
  }
  /**
   * @param string[]
   */
  public function setAlternativeLanguageCodes($alternativeLanguageCodes)
  {
    $this->alternativeLanguageCodes = $alternativeLanguageCodes;
  }
  /**
   * @return string[]
   */
  public function getAlternativeLanguageCodes()
  {
    return $this->alternativeLanguageCodes;
  }
  /**
   * @param int
   */
  public function setAudioChannelCount($audioChannelCount)
  {
    $this->audioChannelCount = $audioChannelCount;
  }
  /**
   * @return int
   */
  public function getAudioChannelCount()
  {
    return $this->audioChannelCount;
  }
  /**
   * @param SpeakerDiarizationConfig
   */
  public function setDiarizationConfig(SpeakerDiarizationConfig $diarizationConfig)
  {
    $this->diarizationConfig = $diarizationConfig;
  }
  /**
   * @return SpeakerDiarizationConfig
   */
  public function getDiarizationConfig()
  {
    return $this->diarizationConfig;
  }
  /**
   * @param bool
   */
  public function setEnableAutomaticPunctuation($enableAutomaticPunctuation)
  {
    $this->enableAutomaticPunctuation = $enableAutomaticPunctuation;
  }
  /**
   * @return bool
   */
  public function getEnableAutomaticPunctuation()
  {
    return $this->enableAutomaticPunctuation;
  }
  /**
   * @param bool
   */
  public function setEnableSeparateRecognitionPerChannel($enableSeparateRecognitionPerChannel)
  {
    $this->enableSeparateRecognitionPerChannel = $enableSeparateRecognitionPerChannel;
  }
  /**
   * @return bool
   */
  public function getEnableSeparateRecognitionPerChannel()
  {
    return $this->enableSeparateRecognitionPerChannel;
  }
  /**
   * @param bool
   */
  public function setEnableSpokenEmojis($enableSpokenEmojis)
  {
    $this->enableSpokenEmojis = $enableSpokenEmojis;
  }
  /**
   * @return bool
   */
  public function getEnableSpokenEmojis()
  {
    return $this->enableSpokenEmojis;
  }
  /**
   * @param bool
   */
  public function setEnableSpokenPunctuation($enableSpokenPunctuation)
  {
    $this->enableSpokenPunctuation = $enableSpokenPunctuation;
  }
  /**
   * @return bool
   */
  public function getEnableSpokenPunctuation()
  {
    return $this->enableSpokenPunctuation;
  }
  /**
   * @param bool
   */
  public function setEnableWordConfidence($enableWordConfidence)
  {
    $this->enableWordConfidence = $enableWordConfidence;
  }
  /**
   * @return bool
   */
  public function getEnableWordConfidence()
  {
    return $this->enableWordConfidence;
  }
  /**
   * @param bool
   */
  public function setEnableWordTimeOffsets($enableWordTimeOffsets)
  {
    $this->enableWordTimeOffsets = $enableWordTimeOffsets;
  }
  /**
   * @return bool
   */
  public function getEnableWordTimeOffsets()
  {
    return $this->enableWordTimeOffsets;
  }
  /**
   * @param string
   */
  public function setEncoding($encoding)
  {
    $this->encoding = $encoding;
  }
  /**
   * @return string
   */
  public function getEncoding()
  {
    return $this->encoding;
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
   * @param int
   */
  public function setMaxAlternatives($maxAlternatives)
  {
    $this->maxAlternatives = $maxAlternatives;
  }
  /**
   * @return int
   */
  public function getMaxAlternatives()
  {
    return $this->maxAlternatives;
  }
  /**
   * @param RecognitionMetadata
   */
  public function setMetadata(RecognitionMetadata $metadata)
  {
    $this->metadata = $metadata;
  }
  /**
   * @return RecognitionMetadata
   */
  public function getMetadata()
  {
    return $this->metadata;
  }
  /**
   * @param string
   */
  public function setModel($model)
  {
    $this->model = $model;
  }
  /**
   * @return string
   */
  public function getModel()
  {
    return $this->model;
  }
  /**
   * @param bool
   */
  public function setProfanityFilter($profanityFilter)
  {
    $this->profanityFilter = $profanityFilter;
  }
  /**
   * @return bool
   */
  public function getProfanityFilter()
  {
    return $this->profanityFilter;
  }
  /**
   * @param int
   */
  public function setSampleRateHertz($sampleRateHertz)
  {
    $this->sampleRateHertz = $sampleRateHertz;
  }
  /**
   * @return int
   */
  public function getSampleRateHertz()
  {
    return $this->sampleRateHertz;
  }
  /**
   * @param SpeechContext[]
   */
  public function setSpeechContexts($speechContexts)
  {
    $this->speechContexts = $speechContexts;
  }
  /**
   * @return SpeechContext[]
   */
  public function getSpeechContexts()
  {
    return $this->speechContexts;
  }
  /**
   * @param bool
   */
  public function setUseEnhanced($useEnhanced)
  {
    $this->useEnhanced = $useEnhanced;
  }
  /**
   * @return bool
   */
  public function getUseEnhanced()
  {
    return $this->useEnhanced;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RecognitionConfig::class, 'Google_Service_Speech_RecognitionConfig');
