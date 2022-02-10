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

namespace Google\Service\Dfareporting;

class CreativeCustomEvent extends \Google\Model
{
  /**
   * @var string
   */
  public $advertiserCustomEventId;
  /**
   * @var string
   */
  public $advertiserCustomEventName;
  /**
   * @var string
   */
  public $advertiserCustomEventType;
  /**
   * @var string
   */
  public $artworkLabel;
  /**
   * @var string
   */
  public $artworkType;
  protected $exitClickThroughUrlType = CreativeClickThroughUrl::class;
  protected $exitClickThroughUrlDataType = '';
  /**
   * @var string
   */
  public $id;
  protected $popupWindowPropertiesType = PopupWindowProperties::class;
  protected $popupWindowPropertiesDataType = '';
  /**
   * @var string
   */
  public $targetType;
  /**
   * @var string
   */
  public $videoReportingId;

  /**
   * @param string
   */
  public function setAdvertiserCustomEventId($advertiserCustomEventId)
  {
    $this->advertiserCustomEventId = $advertiserCustomEventId;
  }
  /**
   * @return string
   */
  public function getAdvertiserCustomEventId()
  {
    return $this->advertiserCustomEventId;
  }
  /**
   * @param string
   */
  public function setAdvertiserCustomEventName($advertiserCustomEventName)
  {
    $this->advertiserCustomEventName = $advertiserCustomEventName;
  }
  /**
   * @return string
   */
  public function getAdvertiserCustomEventName()
  {
    return $this->advertiserCustomEventName;
  }
  /**
   * @param string
   */
  public function setAdvertiserCustomEventType($advertiserCustomEventType)
  {
    $this->advertiserCustomEventType = $advertiserCustomEventType;
  }
  /**
   * @return string
   */
  public function getAdvertiserCustomEventType()
  {
    return $this->advertiserCustomEventType;
  }
  /**
   * @param string
   */
  public function setArtworkLabel($artworkLabel)
  {
    $this->artworkLabel = $artworkLabel;
  }
  /**
   * @return string
   */
  public function getArtworkLabel()
  {
    return $this->artworkLabel;
  }
  /**
   * @param string
   */
  public function setArtworkType($artworkType)
  {
    $this->artworkType = $artworkType;
  }
  /**
   * @return string
   */
  public function getArtworkType()
  {
    return $this->artworkType;
  }
  /**
   * @param CreativeClickThroughUrl
   */
  public function setExitClickThroughUrl(CreativeClickThroughUrl $exitClickThroughUrl)
  {
    $this->exitClickThroughUrl = $exitClickThroughUrl;
  }
  /**
   * @return CreativeClickThroughUrl
   */
  public function getExitClickThroughUrl()
  {
    return $this->exitClickThroughUrl;
  }
  /**
   * @param string
   */
  public function setId($id)
  {
    $this->id = $id;
  }
  /**
   * @return string
   */
  public function getId()
  {
    return $this->id;
  }
  /**
   * @param PopupWindowProperties
   */
  public function setPopupWindowProperties(PopupWindowProperties $popupWindowProperties)
  {
    $this->popupWindowProperties = $popupWindowProperties;
  }
  /**
   * @return PopupWindowProperties
   */
  public function getPopupWindowProperties()
  {
    return $this->popupWindowProperties;
  }
  /**
   * @param string
   */
  public function setTargetType($targetType)
  {
    $this->targetType = $targetType;
  }
  /**
   * @return string
   */
  public function getTargetType()
  {
    return $this->targetType;
  }
  /**
   * @param string
   */
  public function setVideoReportingId($videoReportingId)
  {
    $this->videoReportingId = $videoReportingId;
  }
  /**
   * @return string
   */
  public function getVideoReportingId()
  {
    return $this->videoReportingId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CreativeCustomEvent::class, 'Google_Service_Dfareporting_CreativeCustomEvent');
