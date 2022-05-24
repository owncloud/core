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

namespace Google\Service\YouTube;

class CaptionSnippet extends \Google\Model
{
  /**
   * @var string
   */
  public $audioTrackType;
  /**
   * @var string
   */
  public $failureReason;
  /**
   * @var bool
   */
  public $isAutoSynced;
  /**
   * @var bool
   */
  public $isCC;
  /**
   * @var bool
   */
  public $isDraft;
  /**
   * @var bool
   */
  public $isEasyReader;
  /**
   * @var bool
   */
  public $isLarge;
  /**
   * @var string
   */
  public $language;
  /**
   * @var string
   */
  public $lastUpdated;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $status;
  /**
   * @var string
   */
  public $trackKind;
  /**
   * @var string
   */
  public $videoId;

  /**
   * @param string
   */
  public function setAudioTrackType($audioTrackType)
  {
    $this->audioTrackType = $audioTrackType;
  }
  /**
   * @return string
   */
  public function getAudioTrackType()
  {
    return $this->audioTrackType;
  }
  /**
   * @param string
   */
  public function setFailureReason($failureReason)
  {
    $this->failureReason = $failureReason;
  }
  /**
   * @return string
   */
  public function getFailureReason()
  {
    return $this->failureReason;
  }
  /**
   * @param bool
   */
  public function setIsAutoSynced($isAutoSynced)
  {
    $this->isAutoSynced = $isAutoSynced;
  }
  /**
   * @return bool
   */
  public function getIsAutoSynced()
  {
    return $this->isAutoSynced;
  }
  /**
   * @param bool
   */
  public function setIsCC($isCC)
  {
    $this->isCC = $isCC;
  }
  /**
   * @return bool
   */
  public function getIsCC()
  {
    return $this->isCC;
  }
  /**
   * @param bool
   */
  public function setIsDraft($isDraft)
  {
    $this->isDraft = $isDraft;
  }
  /**
   * @return bool
   */
  public function getIsDraft()
  {
    return $this->isDraft;
  }
  /**
   * @param bool
   */
  public function setIsEasyReader($isEasyReader)
  {
    $this->isEasyReader = $isEasyReader;
  }
  /**
   * @return bool
   */
  public function getIsEasyReader()
  {
    return $this->isEasyReader;
  }
  /**
   * @param bool
   */
  public function setIsLarge($isLarge)
  {
    $this->isLarge = $isLarge;
  }
  /**
   * @return bool
   */
  public function getIsLarge()
  {
    return $this->isLarge;
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
  public function setLastUpdated($lastUpdated)
  {
    $this->lastUpdated = $lastUpdated;
  }
  /**
   * @return string
   */
  public function getLastUpdated()
  {
    return $this->lastUpdated;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param string
   */
  public function setStatus($status)
  {
    $this->status = $status;
  }
  /**
   * @return string
   */
  public function getStatus()
  {
    return $this->status;
  }
  /**
   * @param string
   */
  public function setTrackKind($trackKind)
  {
    $this->trackKind = $trackKind;
  }
  /**
   * @return string
   */
  public function getTrackKind()
  {
    return $this->trackKind;
  }
  /**
   * @param string
   */
  public function setVideoId($videoId)
  {
    $this->videoId = $videoId;
  }
  /**
   * @return string
   */
  public function getVideoId()
  {
    return $this->videoId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CaptionSnippet::class, 'Google_Service_YouTube_CaptionSnippet');
