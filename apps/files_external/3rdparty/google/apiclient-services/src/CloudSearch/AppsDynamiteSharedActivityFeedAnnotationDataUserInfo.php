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

namespace Google\Service\CloudSearch;

class AppsDynamiteSharedActivityFeedAnnotationDataUserInfo extends \Google\Model
{
  /**
   * @var string
   */
  public $updaterCountDisplayType;
  /**
   * @var int
   */
  public $updaterCountToShow;
  protected $updaterToShowType = UserId::class;
  protected $updaterToShowDataType = '';

  /**
   * @param string
   */
  public function setUpdaterCountDisplayType($updaterCountDisplayType)
  {
    $this->updaterCountDisplayType = $updaterCountDisplayType;
  }
  /**
   * @return string
   */
  public function getUpdaterCountDisplayType()
  {
    return $this->updaterCountDisplayType;
  }
  /**
   * @param int
   */
  public function setUpdaterCountToShow($updaterCountToShow)
  {
    $this->updaterCountToShow = $updaterCountToShow;
  }
  /**
   * @return int
   */
  public function getUpdaterCountToShow()
  {
    return $this->updaterCountToShow;
  }
  /**
   * @param UserId
   */
  public function setUpdaterToShow(UserId $updaterToShow)
  {
    $this->updaterToShow = $updaterToShow;
  }
  /**
   * @return UserId
   */
  public function getUpdaterToShow()
  {
    return $this->updaterToShow;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AppsDynamiteSharedActivityFeedAnnotationDataUserInfo::class, 'Google_Service_CloudSearch_AppsDynamiteSharedActivityFeedAnnotationDataUserInfo');
