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

class UserInfo extends \Google\Model
{
  /**
   * @var string
   */
  public $driveNotificationAvatarUrl;
  /**
   * @var string
   */
  public $updaterCountDisplayType;
  /**
   * @var int
   */
  public $updaterCountToShow;
  /**
   * @var string
   */
  public $updaterToShowEmail;
  /**
   * @var string
   */
  public $updaterToShowGaiaId;
  /**
   * @var string
   */
  public $updaterToShowName;
  protected $updaterToShowUserIdType = UserId::class;
  protected $updaterToShowUserIdDataType = '';

  /**
   * @param string
   */
  public function setDriveNotificationAvatarUrl($driveNotificationAvatarUrl)
  {
    $this->driveNotificationAvatarUrl = $driveNotificationAvatarUrl;
  }
  /**
   * @return string
   */
  public function getDriveNotificationAvatarUrl()
  {
    return $this->driveNotificationAvatarUrl;
  }
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
   * @param string
   */
  public function setUpdaterToShowEmail($updaterToShowEmail)
  {
    $this->updaterToShowEmail = $updaterToShowEmail;
  }
  /**
   * @return string
   */
  public function getUpdaterToShowEmail()
  {
    return $this->updaterToShowEmail;
  }
  /**
   * @param string
   */
  public function setUpdaterToShowGaiaId($updaterToShowGaiaId)
  {
    $this->updaterToShowGaiaId = $updaterToShowGaiaId;
  }
  /**
   * @return string
   */
  public function getUpdaterToShowGaiaId()
  {
    return $this->updaterToShowGaiaId;
  }
  /**
   * @param string
   */
  public function setUpdaterToShowName($updaterToShowName)
  {
    $this->updaterToShowName = $updaterToShowName;
  }
  /**
   * @return string
   */
  public function getUpdaterToShowName()
  {
    return $this->updaterToShowName;
  }
  /**
   * @param UserId
   */
  public function setUpdaterToShowUserId(UserId $updaterToShowUserId)
  {
    $this->updaterToShowUserId = $updaterToShowUserId;
  }
  /**
   * @return UserId
   */
  public function getUpdaterToShowUserId()
  {
    return $this->updaterToShowUserId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(UserInfo::class, 'Google_Service_CloudSearch_UserInfo');
