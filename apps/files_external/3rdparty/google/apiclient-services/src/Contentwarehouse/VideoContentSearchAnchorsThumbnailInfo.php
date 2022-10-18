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

class VideoContentSearchAnchorsThumbnailInfo extends \Google\Model
{
  /**
   * @var bool
   */
  public $hasMissingStarburst;
  /**
   * @var bool
   */
  public $hasMissingThumbnails;
  /**
   * @var float
   */
  public $thumbnailDiversity;

  /**
   * @param bool
   */
  public function setHasMissingStarburst($hasMissingStarburst)
  {
    $this->hasMissingStarburst = $hasMissingStarburst;
  }
  /**
   * @return bool
   */
  public function getHasMissingStarburst()
  {
    return $this->hasMissingStarburst;
  }
  /**
   * @param bool
   */
  public function setHasMissingThumbnails($hasMissingThumbnails)
  {
    $this->hasMissingThumbnails = $hasMissingThumbnails;
  }
  /**
   * @return bool
   */
  public function getHasMissingThumbnails()
  {
    return $this->hasMissingThumbnails;
  }
  /**
   * @param float
   */
  public function setThumbnailDiversity($thumbnailDiversity)
  {
    $this->thumbnailDiversity = $thumbnailDiversity;
  }
  /**
   * @return float
   */
  public function getThumbnailDiversity()
  {
    return $this->thumbnailDiversity;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VideoContentSearchAnchorsThumbnailInfo::class, 'Google_Service_Contentwarehouse_VideoContentSearchAnchorsThumbnailInfo');
