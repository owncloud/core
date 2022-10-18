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

class VideoYoutubeCommentsRankingCTRMetrics extends \Google\Model
{
  /**
   * @var string
   */
  public $downvotes;
  /**
   * @var string
   */
  public $impressions;
  /**
   * @var string
   */
  public $measureWindow;
  /**
   * @var string
   */
  public $teaserClicks;
  /**
   * @var string
   */
  public $teaserImpressions;
  /**
   * @var string
   */
  public $upvotes;

  /**
   * @param string
   */
  public function setDownvotes($downvotes)
  {
    $this->downvotes = $downvotes;
  }
  /**
   * @return string
   */
  public function getDownvotes()
  {
    return $this->downvotes;
  }
  /**
   * @param string
   */
  public function setImpressions($impressions)
  {
    $this->impressions = $impressions;
  }
  /**
   * @return string
   */
  public function getImpressions()
  {
    return $this->impressions;
  }
  /**
   * @param string
   */
  public function setMeasureWindow($measureWindow)
  {
    $this->measureWindow = $measureWindow;
  }
  /**
   * @return string
   */
  public function getMeasureWindow()
  {
    return $this->measureWindow;
  }
  /**
   * @param string
   */
  public function setTeaserClicks($teaserClicks)
  {
    $this->teaserClicks = $teaserClicks;
  }
  /**
   * @return string
   */
  public function getTeaserClicks()
  {
    return $this->teaserClicks;
  }
  /**
   * @param string
   */
  public function setTeaserImpressions($teaserImpressions)
  {
    $this->teaserImpressions = $teaserImpressions;
  }
  /**
   * @return string
   */
  public function getTeaserImpressions()
  {
    return $this->teaserImpressions;
  }
  /**
   * @param string
   */
  public function setUpvotes($upvotes)
  {
    $this->upvotes = $upvotes;
  }
  /**
   * @return string
   */
  public function getUpvotes()
  {
    return $this->upvotes;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VideoYoutubeCommentsRankingCTRMetrics::class, 'Google_Service_Contentwarehouse_VideoYoutubeCommentsRankingCTRMetrics');
