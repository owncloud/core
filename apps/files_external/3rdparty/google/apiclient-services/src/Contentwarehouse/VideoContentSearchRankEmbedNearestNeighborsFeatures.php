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

class VideoContentSearchRankEmbedNearestNeighborsFeatures extends \Google\Model
{
  /**
   * @var float
   */
  public $anchorReSimilarity;
  /**
   * @var float
   */
  public $navQueryReSimilarity;
  /**
   * @var float
   */
  public $reSimilarity;

  /**
   * @param float
   */
  public function setAnchorReSimilarity($anchorReSimilarity)
  {
    $this->anchorReSimilarity = $anchorReSimilarity;
  }
  /**
   * @return float
   */
  public function getAnchorReSimilarity()
  {
    return $this->anchorReSimilarity;
  }
  /**
   * @param float
   */
  public function setNavQueryReSimilarity($navQueryReSimilarity)
  {
    $this->navQueryReSimilarity = $navQueryReSimilarity;
  }
  /**
   * @return float
   */
  public function getNavQueryReSimilarity()
  {
    return $this->navQueryReSimilarity;
  }
  /**
   * @param float
   */
  public function setReSimilarity($reSimilarity)
  {
    $this->reSimilarity = $reSimilarity;
  }
  /**
   * @return float
   */
  public function getReSimilarity()
  {
    return $this->reSimilarity;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VideoContentSearchRankEmbedNearestNeighborsFeatures::class, 'Google_Service_Contentwarehouse_VideoContentSearchRankEmbedNearestNeighborsFeatures');
