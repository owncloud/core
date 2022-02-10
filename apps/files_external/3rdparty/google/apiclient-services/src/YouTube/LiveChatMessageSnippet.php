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

class LiveChatMessageSnippet extends \Google\Model
{
  /**
   * @var string
   */
  public $authorChannelId;
  /**
   * @var string
   */
  public $displayMessage;
  protected $fanFundingEventDetailsType = LiveChatFanFundingEventDetails::class;
  protected $fanFundingEventDetailsDataType = '';
  /**
   * @var bool
   */
  public $hasDisplayContent;
  /**
   * @var string
   */
  public $liveChatId;
  protected $memberMilestoneChatDetailsType = LiveChatMemberMilestoneChatDetails::class;
  protected $memberMilestoneChatDetailsDataType = '';
  protected $messageDeletedDetailsType = LiveChatMessageDeletedDetails::class;
  protected $messageDeletedDetailsDataType = '';
  protected $messageRetractedDetailsType = LiveChatMessageRetractedDetails::class;
  protected $messageRetractedDetailsDataType = '';
  protected $newSponsorDetailsType = LiveChatNewSponsorDetails::class;
  protected $newSponsorDetailsDataType = '';
  /**
   * @var string
   */
  public $publishedAt;
  protected $superChatDetailsType = LiveChatSuperChatDetails::class;
  protected $superChatDetailsDataType = '';
  protected $superStickerDetailsType = LiveChatSuperStickerDetails::class;
  protected $superStickerDetailsDataType = '';
  protected $textMessageDetailsType = LiveChatTextMessageDetails::class;
  protected $textMessageDetailsDataType = '';
  /**
   * @var string
   */
  public $type;
  protected $userBannedDetailsType = LiveChatUserBannedMessageDetails::class;
  protected $userBannedDetailsDataType = '';

  /**
   * @param string
   */
  public function setAuthorChannelId($authorChannelId)
  {
    $this->authorChannelId = $authorChannelId;
  }
  /**
   * @return string
   */
  public function getAuthorChannelId()
  {
    return $this->authorChannelId;
  }
  /**
   * @param string
   */
  public function setDisplayMessage($displayMessage)
  {
    $this->displayMessage = $displayMessage;
  }
  /**
   * @return string
   */
  public function getDisplayMessage()
  {
    return $this->displayMessage;
  }
  /**
   * @param LiveChatFanFundingEventDetails
   */
  public function setFanFundingEventDetails(LiveChatFanFundingEventDetails $fanFundingEventDetails)
  {
    $this->fanFundingEventDetails = $fanFundingEventDetails;
  }
  /**
   * @return LiveChatFanFundingEventDetails
   */
  public function getFanFundingEventDetails()
  {
    return $this->fanFundingEventDetails;
  }
  /**
   * @param bool
   */
  public function setHasDisplayContent($hasDisplayContent)
  {
    $this->hasDisplayContent = $hasDisplayContent;
  }
  /**
   * @return bool
   */
  public function getHasDisplayContent()
  {
    return $this->hasDisplayContent;
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
   * @param LiveChatMemberMilestoneChatDetails
   */
  public function setMemberMilestoneChatDetails(LiveChatMemberMilestoneChatDetails $memberMilestoneChatDetails)
  {
    $this->memberMilestoneChatDetails = $memberMilestoneChatDetails;
  }
  /**
   * @return LiveChatMemberMilestoneChatDetails
   */
  public function getMemberMilestoneChatDetails()
  {
    return $this->memberMilestoneChatDetails;
  }
  /**
   * @param LiveChatMessageDeletedDetails
   */
  public function setMessageDeletedDetails(LiveChatMessageDeletedDetails $messageDeletedDetails)
  {
    $this->messageDeletedDetails = $messageDeletedDetails;
  }
  /**
   * @return LiveChatMessageDeletedDetails
   */
  public function getMessageDeletedDetails()
  {
    return $this->messageDeletedDetails;
  }
  /**
   * @param LiveChatMessageRetractedDetails
   */
  public function setMessageRetractedDetails(LiveChatMessageRetractedDetails $messageRetractedDetails)
  {
    $this->messageRetractedDetails = $messageRetractedDetails;
  }
  /**
   * @return LiveChatMessageRetractedDetails
   */
  public function getMessageRetractedDetails()
  {
    return $this->messageRetractedDetails;
  }
  /**
   * @param LiveChatNewSponsorDetails
   */
  public function setNewSponsorDetails(LiveChatNewSponsorDetails $newSponsorDetails)
  {
    $this->newSponsorDetails = $newSponsorDetails;
  }
  /**
   * @return LiveChatNewSponsorDetails
   */
  public function getNewSponsorDetails()
  {
    return $this->newSponsorDetails;
  }
  /**
   * @param string
   */
  public function setPublishedAt($publishedAt)
  {
    $this->publishedAt = $publishedAt;
  }
  /**
   * @return string
   */
  public function getPublishedAt()
  {
    return $this->publishedAt;
  }
  /**
   * @param LiveChatSuperChatDetails
   */
  public function setSuperChatDetails(LiveChatSuperChatDetails $superChatDetails)
  {
    $this->superChatDetails = $superChatDetails;
  }
  /**
   * @return LiveChatSuperChatDetails
   */
  public function getSuperChatDetails()
  {
    return $this->superChatDetails;
  }
  /**
   * @param LiveChatSuperStickerDetails
   */
  public function setSuperStickerDetails(LiveChatSuperStickerDetails $superStickerDetails)
  {
    $this->superStickerDetails = $superStickerDetails;
  }
  /**
   * @return LiveChatSuperStickerDetails
   */
  public function getSuperStickerDetails()
  {
    return $this->superStickerDetails;
  }
  /**
   * @param LiveChatTextMessageDetails
   */
  public function setTextMessageDetails(LiveChatTextMessageDetails $textMessageDetails)
  {
    $this->textMessageDetails = $textMessageDetails;
  }
  /**
   * @return LiveChatTextMessageDetails
   */
  public function getTextMessageDetails()
  {
    return $this->textMessageDetails;
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
  /**
   * @param LiveChatUserBannedMessageDetails
   */
  public function setUserBannedDetails(LiveChatUserBannedMessageDetails $userBannedDetails)
  {
    $this->userBannedDetails = $userBannedDetails;
  }
  /**
   * @return LiveChatUserBannedMessageDetails
   */
  public function getUserBannedDetails()
  {
    return $this->userBannedDetails;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(LiveChatMessageSnippet::class, 'Google_Service_YouTube_LiveChatMessageSnippet');
