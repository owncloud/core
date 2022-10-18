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

class VideoContentSearchVideoAnchorSets extends \Google\Collection
{
  protected $collection_key = 'videoAnchors';
  protected $videoActionsType = VideoContentSearchVideoActions::class;
  protected $videoActionsDataType = '';
  protected $videoAnchorsType = VideoContentSearchVideoAnchors::class;
  protected $videoAnchorsDataType = 'array';
  protected $videoInfoType = VideoContentSearchVideoInfo::class;
  protected $videoInfoDataType = '';
  protected $videoScoreInfoType = VideoContentSearchVideoScoreInfo::class;
  protected $videoScoreInfoDataType = '';

  /**
   * @param VideoContentSearchVideoActions
   */
  public function setVideoActions(VideoContentSearchVideoActions $videoActions)
  {
    $this->videoActions = $videoActions;
  }
  /**
   * @return VideoContentSearchVideoActions
   */
  public function getVideoActions()
  {
    return $this->videoActions;
  }
  /**
   * @param VideoContentSearchVideoAnchors[]
   */
  public function setVideoAnchors($videoAnchors)
  {
    $this->videoAnchors = $videoAnchors;
  }
  /**
   * @return VideoContentSearchVideoAnchors[]
   */
  public function getVideoAnchors()
  {
    return $this->videoAnchors;
  }
  /**
   * @param VideoContentSearchVideoInfo
   */
  public function setVideoInfo(VideoContentSearchVideoInfo $videoInfo)
  {
    $this->videoInfo = $videoInfo;
  }
  /**
   * @return VideoContentSearchVideoInfo
   */
  public function getVideoInfo()
  {
    return $this->videoInfo;
  }
  /**
   * @param VideoContentSearchVideoScoreInfo
   */
  public function setVideoScoreInfo(VideoContentSearchVideoScoreInfo $videoScoreInfo)
  {
    $this->videoScoreInfo = $videoScoreInfo;
  }
  /**
   * @return VideoContentSearchVideoScoreInfo
   */
  public function getVideoScoreInfo()
  {
    return $this->videoScoreInfo;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VideoContentSearchVideoAnchorSets::class, 'Google_Service_Contentwarehouse_VideoContentSearchVideoAnchorSets');
