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

class LiveChatGiftMembershipReceivedDetails extends \Google\Model
{
  /**
   * @var string
   */
  public $associatedMembershipGiftingMessageId;
  /**
   * @var string
   */
  public $gifterChannelId;
  /**
   * @var string
   */
  public $memberLevelName;

  /**
   * @param string
   */
  public function setAssociatedMembershipGiftingMessageId($associatedMembershipGiftingMessageId)
  {
    $this->associatedMembershipGiftingMessageId = $associatedMembershipGiftingMessageId;
  }
  /**
   * @return string
   */
  public function getAssociatedMembershipGiftingMessageId()
  {
    return $this->associatedMembershipGiftingMessageId;
  }
  /**
   * @param string
   */
  public function setGifterChannelId($gifterChannelId)
  {
    $this->gifterChannelId = $gifterChannelId;
  }
  /**
   * @return string
   */
  public function getGifterChannelId()
  {
    return $this->gifterChannelId;
  }
  /**
   * @param string
   */
  public function setMemberLevelName($memberLevelName)
  {
    $this->memberLevelName = $memberLevelName;
  }
  /**
   * @return string
   */
  public function getMemberLevelName()
  {
    return $this->memberLevelName;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(LiveChatGiftMembershipReceivedDetails::class, 'Google_Service_YouTube_LiveChatGiftMembershipReceivedDetails');
