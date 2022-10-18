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

class AppsDynamiteSharedActivityFeedAnnotationData extends \Google\Model
{
  /**
   * @var string
   */
  public $activityFeedMessageCreateTime;
  protected $activityFeedMessageIdType = MessageId::class;
  protected $activityFeedMessageIdDataType = '';
  protected $chatItemType = AppsDynamiteSharedChatItem::class;
  protected $chatItemDataType = '';
  protected $sharedUserInfoType = UserInfo::class;
  protected $sharedUserInfoDataType = '';
  protected $userInfoType = AppsDynamiteSharedActivityFeedAnnotationDataUserInfo::class;
  protected $userInfoDataType = '';

  /**
   * @param string
   */
  public function setActivityFeedMessageCreateTime($activityFeedMessageCreateTime)
  {
    $this->activityFeedMessageCreateTime = $activityFeedMessageCreateTime;
  }
  /**
   * @return string
   */
  public function getActivityFeedMessageCreateTime()
  {
    return $this->activityFeedMessageCreateTime;
  }
  /**
   * @param MessageId
   */
  public function setActivityFeedMessageId(MessageId $activityFeedMessageId)
  {
    $this->activityFeedMessageId = $activityFeedMessageId;
  }
  /**
   * @return MessageId
   */
  public function getActivityFeedMessageId()
  {
    return $this->activityFeedMessageId;
  }
  /**
   * @param AppsDynamiteSharedChatItem
   */
  public function setChatItem(AppsDynamiteSharedChatItem $chatItem)
  {
    $this->chatItem = $chatItem;
  }
  /**
   * @return AppsDynamiteSharedChatItem
   */
  public function getChatItem()
  {
    return $this->chatItem;
  }
  /**
   * @param UserInfo
   */
  public function setSharedUserInfo(UserInfo $sharedUserInfo)
  {
    $this->sharedUserInfo = $sharedUserInfo;
  }
  /**
   * @return UserInfo
   */
  public function getSharedUserInfo()
  {
    return $this->sharedUserInfo;
  }
  /**
   * @param AppsDynamiteSharedActivityFeedAnnotationDataUserInfo
   */
  public function setUserInfo(AppsDynamiteSharedActivityFeedAnnotationDataUserInfo $userInfo)
  {
    $this->userInfo = $userInfo;
  }
  /**
   * @return AppsDynamiteSharedActivityFeedAnnotationDataUserInfo
   */
  public function getUserInfo()
  {
    return $this->userInfo;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AppsDynamiteSharedActivityFeedAnnotationData::class, 'Google_Service_CloudSearch_AppsDynamiteSharedActivityFeedAnnotationData');
