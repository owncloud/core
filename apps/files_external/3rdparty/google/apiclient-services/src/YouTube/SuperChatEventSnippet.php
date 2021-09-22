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

class SuperChatEventSnippet extends \Google\Model
{
  public $amountMicros;
  public $channelId;
  public $commentText;
  public $createdAt;
  public $currency;
  public $displayString;
  public $isSuperStickerEvent;
  public $messageType;
  protected $superStickerMetadataType = SuperStickerMetadata::class;
  protected $superStickerMetadataDataType = '';
  protected $supporterDetailsType = ChannelProfileDetails::class;
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
   * @param SuperStickerMetadata
   */
  public function setSuperStickerMetadata(SuperStickerMetadata $superStickerMetadata)
  {
    $this->superStickerMetadata = $superStickerMetadata;
  }
  /**
   * @return SuperStickerMetadata
   */
  public function getSuperStickerMetadata()
  {
    return $this->superStickerMetadata;
  }
  /**
   * @param ChannelProfileDetails
   */
  public function setSupporterDetails(ChannelProfileDetails $supporterDetails)
  {
    $this->supporterDetails = $supporterDetails;
  }
  /**
   * @return ChannelProfileDetails
   */
  public function getSupporterDetails()
  {
    return $this->supporterDetails;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SuperChatEventSnippet::class, 'Google_Service_YouTube_SuperChatEventSnippet');
