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

class ChannelContentDetailsRelatedPlaylists extends \Google\Model
{
  /**
   * @var string
   */
  public $favorites;
  /**
   * @var string
   */
  public $likes;
  /**
   * @var string
   */
  public $uploads;
  /**
   * @var string
   */
  public $watchHistory;
  /**
   * @var string
   */
  public $watchLater;

  /**
   * @param string
   */
  public function setFavorites($favorites)
  {
    $this->favorites = $favorites;
  }
  /**
   * @return string
   */
  public function getFavorites()
  {
    return $this->favorites;
  }
  /**
   * @param string
   */
  public function setLikes($likes)
  {
    $this->likes = $likes;
  }
  /**
   * @return string
   */
  public function getLikes()
  {
    return $this->likes;
  }
  /**
   * @param string
   */
  public function setUploads($uploads)
  {
    $this->uploads = $uploads;
  }
  /**
   * @return string
   */
  public function getUploads()
  {
    return $this->uploads;
  }
  /**
   * @param string
   */
  public function setWatchHistory($watchHistory)
  {
    $this->watchHistory = $watchHistory;
  }
  /**
   * @return string
   */
  public function getWatchHistory()
  {
    return $this->watchHistory;
  }
  /**
   * @param string
   */
  public function setWatchLater($watchLater)
  {
    $this->watchLater = $watchLater;
  }
  /**
   * @return string
   */
  public function getWatchLater()
  {
    return $this->watchLater;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ChannelContentDetailsRelatedPlaylists::class, 'Google_Service_YouTube_ChannelContentDetailsRelatedPlaylists');
