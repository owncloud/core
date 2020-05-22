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

class Google_Service_YouTube_SuperChatEventSnippet extends Google_Model
{
  public $amountMicros;
  public $channelId;
  public $commentText;
  public $createdAt;
  public $currency;
  public $displayString;
  public $isSuperChatForGood;
  public $isSuperStickerEvent;
  public $messageType;
  protected $nonprofitType = 'Google_Service_YouTube_Nonprofit';
  protected $nonprofitDataType = '';
  protected $superStickerMetadataType = 'Google_Service_YouTube_SuperStickerMetadata';
  protected $superStickerMetadataDataType = '';
  protected $supporterDetailsType = 'Google_Service_YouTube_ChannelProfileDetails';
  protected $supporterDetailsDataType = '';

  public function setAmountMicros($amountMicros)
  {
    $this->amountMicros = $amountMicros;
  }
  public function getAmountMicros()
  {
    return $this->amountMicros;
  }
  public function setChannelId($channelId)
  {
    $this->channelId = $channelId;
  }
  public function getChannelId()
  {
    return $this->channelId;
  }
  public function setCommentText($commentText)
  {
    $this->commentText = $commentText;
  }
  public function getCommentText()
  {
    return $this->commentText;
  }
  public function setCreatedAt($createdAt)
  {
    $this->createdAt = $createdAt;
  }
  public function getCreatedAt()
  {
    return $this->createdAt;
  }
  public function setCurrency($currency)
  {
    $this->currency = $currency;
  }
  public function getCurrency()
  {
    return $this->currency;
  }
  public function setDisplayString($displayString)
  {
    $this->displayString = $displayString;
  }
  public function getDisplayString()
  {
    return $this->displayString;
  }
  public function setIsSuperChatForGood($isSuperChatForGood)
  {
    $this->isSuperChatForGood = $isSuperChatForGood;
  }
  public function getIsSuperChatForGood()
  {
    return $this->isSuperChatForGood;
  }
  public function setIsSuperStickerEvent($isSuperStickerEvent)
  {
    $this->isSuperStickerEvent = $isSuperStickerEvent;
  }
  public function getIsSuperStickerEvent()
  {
    return $this->isSuperStickerEvent;
  }
  public function setMessageType($messageType)
  {
    $this->messageType = $messageType;
  }
  public function getMessageType()
  {
    return $this->messageType;
  }
  /**
   * @param Google_Service_YouTube_Nonprofit
   */
  public function setNonprofit(Google_Service_YouTube_Nonprofit $nonprofit)
  {
    $this->nonprofit = $nonprofit;
  }
  /**
   * @return Google_Service_YouTube_Nonprofit
   */
  public function getNonprofit()
  {
    return $this->nonprofit;
  }
  /**
   * @param Google_Service_YouTube_SuperStickerMetadata
   */
  public function setSuperStickerMetadata(Google_Service_YouTube_SuperStickerMetadata $superStickerMetadata)
  {
    $this->superStickerMetadata = $superStickerMetadata;
  }
  /**
   * @return Google_Service_YouTube_SuperStickerMetadata
   */
  public function getSuperStickerMetadata()
  {
    return $this->superStickerMetadata;
  }
  /**
   * @param Google_Service_YouTube_ChannelProfileDetails
   */
  public function setSupporterDetails(Google_Service_YouTube_ChannelProfileDetails $supporterDetails)
  {
    $this->supporterDetails = $supporterDetails;
  }
  /**
   * @return Google_Service_YouTube_ChannelProfileDetails
   */
  public function getSupporterDetails()
  {
    return $this->supporterDetails;
  }
}
