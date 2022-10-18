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

class AppsPeopleOzExternalMergedpeopleapiHangoutsExtendedData extends \Google\Model
{
  /**
   * @var string
   */
  public $hadPastHangoutState;
  /**
   * @var string
   */
  public $invitationStatus;
  /**
   * @var bool
   */
  public $isBot;
  /**
   * @var bool
   */
  public $isDismissed;
  /**
   * @var bool
   */
  public $isFavorite;
  /**
   * @var bool
   */
  public $isPinned;
  /**
   * @var string
   */
  public $userType;

  /**
   * @param string
   */
  public function setHadPastHangoutState($hadPastHangoutState)
  {
    $this->hadPastHangoutState = $hadPastHangoutState;
  }
  /**
   * @return string
   */
  public function getHadPastHangoutState()
  {
    return $this->hadPastHangoutState;
  }
  /**
   * @param string
   */
  public function setInvitationStatus($invitationStatus)
  {
    $this->invitationStatus = $invitationStatus;
  }
  /**
   * @return string
   */
  public function getInvitationStatus()
  {
    return $this->invitationStatus;
  }
  /**
   * @param bool
   */
  public function setIsBot($isBot)
  {
    $this->isBot = $isBot;
  }
  /**
   * @return bool
   */
  public function getIsBot()
  {
    return $this->isBot;
  }
  /**
   * @param bool
   */
  public function setIsDismissed($isDismissed)
  {
    $this->isDismissed = $isDismissed;
  }
  /**
   * @return bool
   */
  public function getIsDismissed()
  {
    return $this->isDismissed;
  }
  /**
   * @param bool
   */
  public function setIsFavorite($isFavorite)
  {
    $this->isFavorite = $isFavorite;
  }
  /**
   * @return bool
   */
  public function getIsFavorite()
  {
    return $this->isFavorite;
  }
  /**
   * @param bool
   */
  public function setIsPinned($isPinned)
  {
    $this->isPinned = $isPinned;
  }
  /**
   * @return bool
   */
  public function getIsPinned()
  {
    return $this->isPinned;
  }
  /**
   * @param string
   */
  public function setUserType($userType)
  {
    $this->userType = $userType;
  }
  /**
   * @return string
   */
  public function getUserType()
  {
    return $this->userType;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AppsPeopleOzExternalMergedpeopleapiHangoutsExtendedData::class, 'Google_Service_Contentwarehouse_AppsPeopleOzExternalMergedpeopleapiHangoutsExtendedData');
