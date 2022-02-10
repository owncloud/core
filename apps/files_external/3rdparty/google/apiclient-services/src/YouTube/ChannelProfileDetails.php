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

class ChannelProfileDetails extends \Google\Model
{
  /**
   * @var string
   */
  public $channelId;
  /**
   * @var string
   */
  public $channelUrl;
  /**
   * @var string
   */
  public $displayName;
  /**
   * @var string
   */
  public $profileImageUrl;

  /**
   * @param string
   */
  public function setChannelId($channelId)
  {
    $this->channelId = $channelId;
  }
  /**
   * @return string
   */
  public function getChannelId()
  {
    return $this->channelId;
  }
  /**
   * @param string
   */
  public function setChannelUrl($channelUrl)
  {
    $this->channelUrl = $channelUrl;
  }
  /**
   * @return string
   */
  public function getChannelUrl()
  {
    return $this->channelUrl;
  }
  /**
   * @param string
   */
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  /**
   * @return string
   */
  public function getDisplayName()
  {
    return $this->displayName;
  }
  /**
   * @param string
   */
  public function setProfileImageUrl($profileImageUrl)
  {
    $this->profileImageUrl = $profileImageUrl;
  }
  /**
   * @return string
   */
  public function getProfileImageUrl()
  {
    return $this->profileImageUrl;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ChannelProfileDetails::class, 'Google_Service_YouTube_ChannelProfileDetails');
