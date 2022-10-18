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

class AssistantApiSettingsFeatureFilters extends \Google\Model
{
  protected $communicationsFilterType = AssistantApiSettingsCommunicationsFilter::class;
  protected $communicationsFilterDataType = '';
  protected $musicFilterType = AssistantApiSettingsMusicFilter::class;
  protected $musicFilterDataType = '';
  protected $newsFilterType = AssistantApiSettingsNewsFilter::class;
  protected $newsFilterDataType = '';
  protected $podcastFilterType = AssistantApiSettingsPodcastFilter::class;
  protected $podcastFilterDataType = '';
  protected $searchFilterType = AssistantApiSettingsSearchFilter::class;
  protected $searchFilterDataType = '';
  protected $thirdPartyAppsFilterType = AssistantApiSettingsThirdPartyAppsFilter::class;
  protected $thirdPartyAppsFilterDataType = '';
  protected $videoFilterType = AssistantApiSettingsVideoFilter::class;
  protected $videoFilterDataType = '';
  protected $webviewFilterType = AssistantApiSettingsWebviewFilter::class;
  protected $webviewFilterDataType = '';

  /**
   * @param AssistantApiSettingsCommunicationsFilter
   */
  public function setCommunicationsFilter(AssistantApiSettingsCommunicationsFilter $communicationsFilter)
  {
    $this->communicationsFilter = $communicationsFilter;
  }
  /**
   * @return AssistantApiSettingsCommunicationsFilter
   */
  public function getCommunicationsFilter()
  {
    return $this->communicationsFilter;
  }
  /**
   * @param AssistantApiSettingsMusicFilter
   */
  public function setMusicFilter(AssistantApiSettingsMusicFilter $musicFilter)
  {
    $this->musicFilter = $musicFilter;
  }
  /**
   * @return AssistantApiSettingsMusicFilter
   */
  public function getMusicFilter()
  {
    return $this->musicFilter;
  }
  /**
   * @param AssistantApiSettingsNewsFilter
   */
  public function setNewsFilter(AssistantApiSettingsNewsFilter $newsFilter)
  {
    $this->newsFilter = $newsFilter;
  }
  /**
   * @return AssistantApiSettingsNewsFilter
   */
  public function getNewsFilter()
  {
    return $this->newsFilter;
  }
  /**
   * @param AssistantApiSettingsPodcastFilter
   */
  public function setPodcastFilter(AssistantApiSettingsPodcastFilter $podcastFilter)
  {
    $this->podcastFilter = $podcastFilter;
  }
  /**
   * @return AssistantApiSettingsPodcastFilter
   */
  public function getPodcastFilter()
  {
    return $this->podcastFilter;
  }
  /**
   * @param AssistantApiSettingsSearchFilter
   */
  public function setSearchFilter(AssistantApiSettingsSearchFilter $searchFilter)
  {
    $this->searchFilter = $searchFilter;
  }
  /**
   * @return AssistantApiSettingsSearchFilter
   */
  public function getSearchFilter()
  {
    return $this->searchFilter;
  }
  /**
   * @param AssistantApiSettingsThirdPartyAppsFilter
   */
  public function setThirdPartyAppsFilter(AssistantApiSettingsThirdPartyAppsFilter $thirdPartyAppsFilter)
  {
    $this->thirdPartyAppsFilter = $thirdPartyAppsFilter;
  }
  /**
   * @return AssistantApiSettingsThirdPartyAppsFilter
   */
  public function getThirdPartyAppsFilter()
  {
    return $this->thirdPartyAppsFilter;
  }
  /**
   * @param AssistantApiSettingsVideoFilter
   */
  public function setVideoFilter(AssistantApiSettingsVideoFilter $videoFilter)
  {
    $this->videoFilter = $videoFilter;
  }
  /**
   * @return AssistantApiSettingsVideoFilter
   */
  public function getVideoFilter()
  {
    return $this->videoFilter;
  }
  /**
   * @param AssistantApiSettingsWebviewFilter
   */
  public function setWebviewFilter(AssistantApiSettingsWebviewFilter $webviewFilter)
  {
    $this->webviewFilter = $webviewFilter;
  }
  /**
   * @return AssistantApiSettingsWebviewFilter
   */
  public function getWebviewFilter()
  {
    return $this->webviewFilter;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AssistantApiSettingsFeatureFilters::class, 'Google_Service_Contentwarehouse_AssistantApiSettingsFeatureFilters');
