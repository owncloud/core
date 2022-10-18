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

class Attachment extends \Google\Model
{
  protected $addOnDataType = GoogleChatV1ContextualAddOnMarkup::class;
  protected $addOnDataDataType = '';
  protected $appIdType = UserId::class;
  protected $appIdDataType = '';
  /**
   * @var string
   */
  public $attachmentId;
  protected $cardAddOnDataType = AppsDynamiteSharedCard::class;
  protected $cardAddOnDataDataType = '';
  protected $deprecatedAddOnDataType = ContextualAddOnMarkup::class;
  protected $deprecatedAddOnDataDataType = '';
  protected $slackDataType = AppsDynamiteV1ApiCompatV1Attachment::class;
  protected $slackDataDataType = '';
  /**
   * @var int
   */
  public $slackDataImageUrlHeight;

  /**
   * @param GoogleChatV1ContextualAddOnMarkup
   */
  public function setAddOnData(GoogleChatV1ContextualAddOnMarkup $addOnData)
  {
    $this->addOnData = $addOnData;
  }
  /**
   * @return GoogleChatV1ContextualAddOnMarkup
   */
  public function getAddOnData()
  {
    return $this->addOnData;
  }
  /**
   * @param UserId
   */
  public function setAppId(UserId $appId)
  {
    $this->appId = $appId;
  }
  /**
   * @return UserId
   */
  public function getAppId()
  {
    return $this->appId;
  }
  /**
   * @param string
   */
  public function setAttachmentId($attachmentId)
  {
    $this->attachmentId = $attachmentId;
  }
  /**
   * @return string
   */
  public function getAttachmentId()
  {
    return $this->attachmentId;
  }
  /**
   * @param AppsDynamiteSharedCard
   */
  public function setCardAddOnData(AppsDynamiteSharedCard $cardAddOnData)
  {
    $this->cardAddOnData = $cardAddOnData;
  }
  /**
   * @return AppsDynamiteSharedCard
   */
  public function getCardAddOnData()
  {
    return $this->cardAddOnData;
  }
  /**
   * @param ContextualAddOnMarkup
   */
  public function setDeprecatedAddOnData(ContextualAddOnMarkup $deprecatedAddOnData)
  {
    $this->deprecatedAddOnData = $deprecatedAddOnData;
  }
  /**
   * @return ContextualAddOnMarkup
   */
  public function getDeprecatedAddOnData()
  {
    return $this->deprecatedAddOnData;
  }
  /**
   * @param AppsDynamiteV1ApiCompatV1Attachment
   */
  public function setSlackData(AppsDynamiteV1ApiCompatV1Attachment $slackData)
  {
    $this->slackData = $slackData;
  }
  /**
   * @return AppsDynamiteV1ApiCompatV1Attachment
   */
  public function getSlackData()
  {
    return $this->slackData;
  }
  /**
   * @param int
   */
  public function setSlackDataImageUrlHeight($slackDataImageUrlHeight)
  {
    $this->slackDataImageUrlHeight = $slackDataImageUrlHeight;
  }
  /**
   * @return int
   */
  public function getSlackDataImageUrlHeight()
  {
    return $this->slackDataImageUrlHeight;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Attachment::class, 'Google_Service_CloudSearch_Attachment');
