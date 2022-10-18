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

namespace Google\Service\DisplayVideo;

class YoutubeAndPartnersInventorySourceConfig extends \Google\Model
{
  /**
   * @var bool
   */
  public $includeYoutubeSearch;
  /**
   * @var bool
   */
  public $includeYoutubeVideoPartners;
  /**
   * @var bool
   */
  public $includeYoutubeVideos;

  /**
   * @param bool
   */
  public function setIncludeYoutubeSearch($includeYoutubeSearch)
  {
    $this->includeYoutubeSearch = $includeYoutubeSearch;
  }
  /**
   * @return bool
   */
  public function getIncludeYoutubeSearch()
  {
    return $this->includeYoutubeSearch;
  }
  /**
   * @param bool
   */
  public function setIncludeYoutubeVideoPartners($includeYoutubeVideoPartners)
  {
    $this->includeYoutubeVideoPartners = $includeYoutubeVideoPartners;
  }
  /**
   * @return bool
   */
  public function getIncludeYoutubeVideoPartners()
  {
    return $this->includeYoutubeVideoPartners;
  }
  /**
   * @param bool
   */
  public function setIncludeYoutubeVideos($includeYoutubeVideos)
  {
    $this->includeYoutubeVideos = $includeYoutubeVideos;
  }
  /**
   * @return bool
   */
  public function getIncludeYoutubeVideos()
  {
    return $this->includeYoutubeVideos;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(YoutubeAndPartnersInventorySourceConfig::class, 'Google_Service_DisplayVideo_YoutubeAndPartnersInventorySourceConfig');
