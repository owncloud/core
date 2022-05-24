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

class LiveChatBanSnippet extends \Google\Model
{
  /**
   * @var string
   */
  public $banDurationSeconds;
  protected $bannedUserDetailsType = ChannelProfileDetails::class;
  protected $bannedUserDetailsDataType = '';
  /**
   * @var string
   */
  public $liveChatId;
  /**
   * @var string
   */
  public $type;

  /**
   * @param string
   */
  public function setBanDurationSeconds($banDurationSeconds)
  {
    $this->banDurationSeconds = $banDurationSeconds;
  }
  /**
   * @return string
   */
  public function getBanDurationSeconds()
  {
    return $this->banDurationSeconds;
  }
  /**
   * @param ChannelProfileDetails
   */
  public function setBannedUserDetails(ChannelProfileDetails $bannedUserDetails)
  {
    $this->bannedUserDetails = $bannedUserDetails;
  }
  /**
   * @return ChannelProfileDetails
   */
  public function getBannedUserDetails()
  {
    return $this->bannedUserDetails;
  }
  /**
   * @param string
   */
  public function setLiveChatId($liveChatId)
  {
    $this->liveChatId = $liveChatId;
  }
  /**
   * @return string
   */
  public function getLiveChatId()
  {
    return $this->liveChatId;
  }
  /**
   * @param string
   */
  public function setType($type)
  {
    $this->type = $type;
  }
  /**
   * @return string
   */
  public function getType()
  {
    return $this->type;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(LiveChatBanSnippet::class, 'Google_Service_YouTube_LiveChatBanSnippet');
