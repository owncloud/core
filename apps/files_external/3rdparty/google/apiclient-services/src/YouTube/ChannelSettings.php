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

class ChannelSettings extends \Google\Collection
{
  protected $collection_key = 'featuredChannelsUrls';
  /**
   * @var string
   */
  public $country;
  /**
   * @var string
   */
  public $defaultLanguage;
  /**
   * @var string
   */
  public $defaultTab;
  /**
   * @var string
   */
  public $description;
  /**
   * @var string
   */
  public $featuredChannelsTitle;
  /**
   * @var string[]
   */
  public $featuredChannelsUrls;
  /**
   * @var string
   */
  public $keywords;
  /**
   * @var bool
   */
  public $moderateComments;
  /**
   * @var string
   */
  public $profileColor;
  /**
   * @var bool
   */
  public $showBrowseView;
  /**
   * @var bool
   */
  public $showRelatedChannels;
  /**
   * @var string
   */
  public $title;
  /**
   * @var string
   */
  public $trackingAnalyticsAccountId;
  /**
   * @var string
   */
  public $unsubscribedTrailer;

  /**
   * @param string
   */
  public function setCountry($country)
  {
    $this->country = $country;
  }
  /**
   * @return string
   */
  public function getCountry()
  {
    return $this->country;
  }
  /**
   * @param string
   */
  public function setDefaultLanguage($defaultLanguage)
  {
    $this->defaultLanguage = $defaultLanguage;
  }
  /**
   * @return string
   */
  public function getDefaultLanguage()
  {
    return $this->defaultLanguage;
  }
  /**
   * @param string
   */
  public function setDefaultTab($defaultTab)
  {
    $this->defaultTab = $defaultTab;
  }
  /**
   * @return string
   */
  public function getDefaultTab()
  {
    return $this->defaultTab;
  }
  /**
   * @param string
   */
  public function setDescription($description)
  {
    $this->description = $description;
  }
  /**
   * @return string
   */
  public function getDescription()
  {
    return $this->description;
  }
  /**
   * @param string
   */
  public function setFeaturedChannelsTitle($featuredChannelsTitle)
  {
    $this->featuredChannelsTitle = $featuredChannelsTitle;
  }
  /**
   * @return string
   */
  public function getFeaturedChannelsTitle()
  {
    return $this->featuredChannelsTitle;
  }
  /**
   * @param string[]
   */
  public function setFeaturedChannelsUrls($featuredChannelsUrls)
  {
    $this->featuredChannelsUrls = $featuredChannelsUrls;
  }
  /**
   * @return string[]
   */
  public function getFeaturedChannelsUrls()
  {
    return $this->featuredChannelsUrls;
  }
  /**
   * @param string
   */
  public function setKeywords($keywords)
  {
    $this->keywords = $keywords;
  }
  /**
   * @return string
   */
  public function getKeywords()
  {
    return $this->keywords;
  }
  /**
   * @param bool
   */
  public function setModerateComments($moderateComments)
  {
    $this->moderateComments = $moderateComments;
  }
  /**
   * @return bool
   */
  public function getModerateComments()
  {
    return $this->moderateComments;
  }
  /**
   * @param string
   */
  public function setProfileColor($profileColor)
  {
    $this->profileColor = $profileColor;
  }
  /**
   * @return string
   */
  public function getProfileColor()
  {
    return $this->profileColor;
  }
  /**
   * @param bool
   */
  public function setShowBrowseView($showBrowseView)
  {
    $this->showBrowseView = $showBrowseView;
  }
  /**
   * @return bool
   */
  public function getShowBrowseView()
  {
    return $this->showBrowseView;
  }
  /**
   * @param bool
   */
  public function setShowRelatedChannels($showRelatedChannels)
  {
    $this->showRelatedChannels = $showRelatedChannels;
  }
  /**
   * @return bool
   */
  public function getShowRelatedChannels()
  {
    return $this->showRelatedChannels;
  }
  /**
   * @param string
   */
  public function setTitle($title)
  {
    $this->title = $title;
  }
  /**
   * @return string
   */
  public function getTitle()
  {
    return $this->title;
  }
  /**
   * @param string
   */
  public function setTrackingAnalyticsAccountId($trackingAnalyticsAccountId)
  {
    $this->trackingAnalyticsAccountId = $trackingAnalyticsAccountId;
  }
  /**
   * @return string
   */
  public function getTrackingAnalyticsAccountId()
  {
    return $this->trackingAnalyticsAccountId;
  }
  /**
   * @param string
   */
  public function setUnsubscribedTrailer($unsubscribedTrailer)
  {
    $this->unsubscribedTrailer = $unsubscribedTrailer;
  }
  /**
   * @return string
   */
  public function getUnsubscribedTrailer()
  {
    return $this->unsubscribedTrailer;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ChannelSettings::class, 'Google_Service_YouTube_ChannelSettings');
