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

class AssistantApiCoreTypesMessageNotification extends \Google\Collection
{
  protected $collection_key = 'notificationEntries';
  /**
   * @var string
   */
  public $appName;
  /**
   * @var string
   */
  public $bundleId;
  /**
   * @var string
   */
  public $dataUri;
  /**
   * @var string
   */
  public $groupName;
  /**
   * @var string
   */
  public $groupingKey;
  /**
   * @var int
   */
  public $index;
  /**
   * @var bool
   */
  public $markAsReadActionAvailable;
  /**
   * @var int
   */
  public $messageLength;
  /**
   * @var string
   */
  public $messageRecipientType;
  /**
   * @var string
   */
  public $mimeType;
  protected $notificationEntriesType = AssistantApiCoreTypesMessageNotificationNotificationEntry::class;
  protected $notificationEntriesDataType = 'array';
  /**
   * @var string
   */
  public $notificationIconKey;
  /**
   * @var string
   */
  public $notificationKey;
  /**
   * @var string
   */
  public $opaqueToken;
  /**
   * @var string
   */
  public $packageName;
  /**
   * @var string
   */
  public $postTime;
  /**
   * @var bool
   */
  public $replyActionAvailable;
  protected $senderType = AssistantApiCoreTypesMessageNotificationPerson::class;
  protected $senderDataType = '';
  /**
   * @var string
   */
  public $senderName;

  /**
   * @param string
   */
  public function setAppName($appName)
  {
    $this->appName = $appName;
  }
  /**
   * @return string
   */
  public function getAppName()
  {
    return $this->appName;
  }
  /**
   * @param string
   */
  public function setBundleId($bundleId)
  {
    $this->bundleId = $bundleId;
  }
  /**
   * @return string
   */
  public function getBundleId()
  {
    return $this->bundleId;
  }
  /**
   * @param string
   */
  public function setDataUri($dataUri)
  {
    $this->dataUri = $dataUri;
  }
  /**
   * @return string
   */
  public function getDataUri()
  {
    return $this->dataUri;
  }
  /**
   * @param string
   */
  public function setGroupName($groupName)
  {
    $this->groupName = $groupName;
  }
  /**
   * @return string
   */
  public function getGroupName()
  {
    return $this->groupName;
  }
  /**
   * @param string
   */
  public function setGroupingKey($groupingKey)
  {
    $this->groupingKey = $groupingKey;
  }
  /**
   * @return string
   */
  public function getGroupingKey()
  {
    return $this->groupingKey;
  }
  /**
   * @param int
   */
  public function setIndex($index)
  {
    $this->index = $index;
  }
  /**
   * @return int
   */
  public function getIndex()
  {
    return $this->index;
  }
  /**
   * @param bool
   */
  public function setMarkAsReadActionAvailable($markAsReadActionAvailable)
  {
    $this->markAsReadActionAvailable = $markAsReadActionAvailable;
  }
  /**
   * @return bool
   */
  public function getMarkAsReadActionAvailable()
  {
    return $this->markAsReadActionAvailable;
  }
  /**
   * @param int
   */
  public function setMessageLength($messageLength)
  {
    $this->messageLength = $messageLength;
  }
  /**
   * @return int
   */
  public function getMessageLength()
  {
    return $this->messageLength;
  }
  /**
   * @param string
   */
  public function setMessageRecipientType($messageRecipientType)
  {
    $this->messageRecipientType = $messageRecipientType;
  }
  /**
   * @return string
   */
  public function getMessageRecipientType()
  {
    return $this->messageRecipientType;
  }
  /**
   * @param string
   */
  public function setMimeType($mimeType)
  {
    $this->mimeType = $mimeType;
  }
  /**
   * @return string
   */
  public function getMimeType()
  {
    return $this->mimeType;
  }
  /**
   * @param AssistantApiCoreTypesMessageNotificationNotificationEntry[]
   */
  public function setNotificationEntries($notificationEntries)
  {
    $this->notificationEntries = $notificationEntries;
  }
  /**
   * @return AssistantApiCoreTypesMessageNotificationNotificationEntry[]
   */
  public function getNotificationEntries()
  {
    return $this->notificationEntries;
  }
  /**
   * @param string
   */
  public function setNotificationIconKey($notificationIconKey)
  {
    $this->notificationIconKey = $notificationIconKey;
  }
  /**
   * @return string
   */
  public function getNotificationIconKey()
  {
    return $this->notificationIconKey;
  }
  /**
   * @param string
   */
  public function setNotificationKey($notificationKey)
  {
    $this->notificationKey = $notificationKey;
  }
  /**
   * @return string
   */
  public function getNotificationKey()
  {
    return $this->notificationKey;
  }
  /**
   * @param string
   */
  public function setOpaqueToken($opaqueToken)
  {
    $this->opaqueToken = $opaqueToken;
  }
  /**
   * @return string
   */
  public function getOpaqueToken()
  {
    return $this->opaqueToken;
  }
  /**
   * @param string
   */
  public function setPackageName($packageName)
  {
    $this->packageName = $packageName;
  }
  /**
   * @return string
   */
  public function getPackageName()
  {
    return $this->packageName;
  }
  /**
   * @param string
   */
  public function setPostTime($postTime)
  {
    $this->postTime = $postTime;
  }
  /**
   * @return string
   */
  public function getPostTime()
  {
    return $this->postTime;
  }
  /**
   * @param bool
   */
  public function setReplyActionAvailable($replyActionAvailable)
  {
    $this->replyActionAvailable = $replyActionAvailable;
  }
  /**
   * @return bool
   */
  public function getReplyActionAvailable()
  {
    return $this->replyActionAvailable;
  }
  /**
   * @param AssistantApiCoreTypesMessageNotificationPerson
   */
  public function setSender(AssistantApiCoreTypesMessageNotificationPerson $sender)
  {
    $this->sender = $sender;
  }
  /**
   * @return AssistantApiCoreTypesMessageNotificationPerson
   */
  public function getSender()
  {
    return $this->sender;
  }
  /**
   * @param string
   */
  public function setSenderName($senderName)
  {
    $this->senderName = $senderName;
  }
  /**
   * @return string
   */
  public function getSenderName()
  {
    return $this->senderName;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AssistantApiCoreTypesMessageNotification::class, 'Google_Service_Contentwarehouse_AssistantApiCoreTypesMessageNotification');
