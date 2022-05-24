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

namespace Google\Service\AndroidPublisher;

class UserComment extends \Google\Model
{
  /**
   * @var int
   */
  public $androidOsVersion;
  /**
   * @var int
   */
  public $appVersionCode;
  /**
   * @var string
   */
  public $appVersionName;
  /**
   * @var string
   */
  public $device;
  protected $deviceMetadataType = DeviceMetadata::class;
  protected $deviceMetadataDataType = '';
  protected $lastModifiedType = Timestamp::class;
  protected $lastModifiedDataType = '';
  /**
   * @var string
   */
  public $originalText;
  /**
   * @var string
   */
  public $reviewerLanguage;
  /**
   * @var int
   */
  public $starRating;
  /**
   * @var string
   */
  public $text;
  /**
   * @var int
   */
  public $thumbsDownCount;
  /**
   * @var int
   */
  public $thumbsUpCount;

  /**
   * @param int
   */
  public function setAndroidOsVersion($androidOsVersion)
  {
    $this->androidOsVersion = $androidOsVersion;
  }
  /**
   * @return int
   */
  public function getAndroidOsVersion()
  {
    return $this->androidOsVersion;
  }
  /**
   * @param int
   */
  public function setAppVersionCode($appVersionCode)
  {
    $this->appVersionCode = $appVersionCode;
  }
  /**
   * @return int
   */
  public function getAppVersionCode()
  {
    return $this->appVersionCode;
  }
  /**
   * @param string
   */
  public function setAppVersionName($appVersionName)
  {
    $this->appVersionName = $appVersionName;
  }
  /**
   * @return string
   */
  public function getAppVersionName()
  {
    return $this->appVersionName;
  }
  /**
   * @param string
   */
  public function setDevice($device)
  {
    $this->device = $device;
  }
  /**
   * @return string
   */
  public function getDevice()
  {
    return $this->device;
  }
  /**
   * @param DeviceMetadata
   */
  public function setDeviceMetadata(DeviceMetadata $deviceMetadata)
  {
    $this->deviceMetadata = $deviceMetadata;
  }
  /**
   * @return DeviceMetadata
   */
  public function getDeviceMetadata()
  {
    return $this->deviceMetadata;
  }
  /**
   * @param Timestamp
   */
  public function setLastModified(Timestamp $lastModified)
  {
    $this->lastModified = $lastModified;
  }
  /**
   * @return Timestamp
   */
  public function getLastModified()
  {
    return $this->lastModified;
  }
  /**
   * @param string
   */
  public function setOriginalText($originalText)
  {
    $this->originalText = $originalText;
  }
  /**
   * @return string
   */
  public function getOriginalText()
  {
    return $this->originalText;
  }
  /**
   * @param string
   */
  public function setReviewerLanguage($reviewerLanguage)
  {
    $this->reviewerLanguage = $reviewerLanguage;
  }
  /**
   * @return string
   */
  public function getReviewerLanguage()
  {
    return $this->reviewerLanguage;
  }
  /**
   * @param int
   */
  public function setStarRating($starRating)
  {
    $this->starRating = $starRating;
  }
  /**
   * @return int
   */
  public function getStarRating()
  {
    return $this->starRating;
  }
  /**
   * @param string
   */
  public function setText($text)
  {
    $this->text = $text;
  }
  /**
   * @return string
   */
  public function getText()
  {
    return $this->text;
  }
  /**
   * @param int
   */
  public function setThumbsDownCount($thumbsDownCount)
  {
    $this->thumbsDownCount = $thumbsDownCount;
  }
  /**
   * @return int
   */
  public function getThumbsDownCount()
  {
    return $this->thumbsDownCount;
  }
  /**
   * @param int
   */
  public function setThumbsUpCount($thumbsUpCount)
  {
    $this->thumbsUpCount = $thumbsUpCount;
  }
  /**
   * @return int
   */
  public function getThumbsUpCount()
  {
    return $this->thumbsUpCount;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(UserComment::class, 'Google_Service_AndroidPublisher_UserComment');
