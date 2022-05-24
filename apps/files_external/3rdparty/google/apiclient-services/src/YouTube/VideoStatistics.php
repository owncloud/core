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

class VideoStatistics extends \Google\Model
{
  /**
   * @var string
   */
  public $commentCount;
  /**
   * @var string
   */
  public $dislikeCount;
  /**
   * @var string
   */
  public $favoriteCount;
  /**
   * @var string
   */
  public $likeCount;
  /**
   * @var string
   */
  public $viewCount;

  /**
   * @param string
   */
  public function setCommentCount($commentCount)
  {
    $this->commentCount = $commentCount;
  }
  /**
   * @return string
   */
  public function getCommentCount()
  {
    return $this->commentCount;
  }
  /**
   * @param string
   */
  public function setDislikeCount($dislikeCount)
  {
    $this->dislikeCount = $dislikeCount;
  }
  /**
   * @return string
   */
  public function getDislikeCount()
  {
    return $this->dislikeCount;
  }
  /**
   * @param string
   */
  public function setFavoriteCount($favoriteCount)
  {
    $this->favoriteCount = $favoriteCount;
  }
  /**
   * @return string
   */
  public function getFavoriteCount()
  {
    return $this->favoriteCount;
  }
  /**
   * @param string
   */
  public function setLikeCount($likeCount)
  {
    $this->likeCount = $likeCount;
  }
  /**
   * @return string
   */
  public function getLikeCount()
  {
    return $this->likeCount;
  }
  /**
   * @param string
   */
  public function setViewCount($viewCount)
  {
    $this->viewCount = $viewCount;
  }
  /**
   * @return string
   */
  public function getViewCount()
  {
    return $this->viewCount;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VideoStatistics::class, 'Google_Service_YouTube_VideoStatistics');
