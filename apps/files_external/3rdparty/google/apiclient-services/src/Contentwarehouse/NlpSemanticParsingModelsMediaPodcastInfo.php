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

class NlpSemanticParsingModelsMediaPodcastInfo extends \Google\Model
{
  /**
   * @var string
   */
  public $clusterId;
  /**
   * @var string
   */
  public $episodeGuid;
  /**
   * @var string
   */
  public $feedUrl;
  protected $podcastRecsFeaturesType = SuperrootPodcastsRecommendationsPodcastRecsFeatures::class;
  protected $podcastRecsFeaturesDataType = '';
  /**
   * @var string
   */
  public $title;

  /**
   * @param string
   */
  public function setClusterId($clusterId)
  {
    $this->clusterId = $clusterId;
  }
  /**
   * @return string
   */
  public function getClusterId()
  {
    return $this->clusterId;
  }
  /**
   * @param string
   */
  public function setEpisodeGuid($episodeGuid)
  {
    $this->episodeGuid = $episodeGuid;
  }
  /**
   * @return string
   */
  public function getEpisodeGuid()
  {
    return $this->episodeGuid;
  }
  /**
   * @param string
   */
  public function setFeedUrl($feedUrl)
  {
    $this->feedUrl = $feedUrl;
  }
  /**
   * @return string
   */
  public function getFeedUrl()
  {
    return $this->feedUrl;
  }
  /**
   * @param SuperrootPodcastsRecommendationsPodcastRecsFeatures
   */
  public function setPodcastRecsFeatures(SuperrootPodcastsRecommendationsPodcastRecsFeatures $podcastRecsFeatures)
  {
    $this->podcastRecsFeatures = $podcastRecsFeatures;
  }
  /**
   * @return SuperrootPodcastsRecommendationsPodcastRecsFeatures
   */
  public function getPodcastRecsFeatures()
  {
    return $this->podcastRecsFeatures;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NlpSemanticParsingModelsMediaPodcastInfo::class, 'Google_Service_Contentwarehouse_NlpSemanticParsingModelsMediaPodcastInfo');
