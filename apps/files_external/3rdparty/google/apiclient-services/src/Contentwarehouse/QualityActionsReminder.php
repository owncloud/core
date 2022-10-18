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

class QualityActionsReminder extends \Google\Collection
{
  protected $collection_key = 'customizedNotificationCard';
  /**
   * @var bool
   */
  public $archived;
  protected $archivedTimeType = AssistantApiDateTime::class;
  protected $archivedTimeDataType = '';
  /**
   * @var string
   */
  public $archivedTimestamp;
  /**
   * @var string
   */
  public $asyncInteractionType;
  protected $attachmentType = AssistantRemindersAttachment::class;
  protected $attachmentDataType = 'array';
  /**
   * @var string
   */
  public $bareTitle;
  /**
   * @var string
   */
  public $clientId;
  protected $clientTypeType = QualityDialogManagerReminderClientType::class;
  protected $clientTypeDataType = '';
  protected $createTimeType = AssistantApiDateTime::class;
  protected $createTimeDataType = '';
  /**
   * @var string
   */
  public $createTimestamp;
  protected $creatorType = QualityActionsReminderPerson::class;
  protected $creatorDataType = '';
  protected $customizedNotificationCardType = QualityActionsCustomizedNotification::class;
  protected $customizedNotificationCardDataType = 'array';
  protected $datetimeType = AssistantApiDateTime::class;
  protected $datetimeDataType = '';
  /**
   * @var string
   */
  public $description;
  /**
   * @var string
   */
  public $id;
  protected $locationType = QualityActionsReminderLocation::class;
  protected $locationDataType = '';
  protected $logType = AssistantLogsReminderLog::class;
  protected $logDataType = '';
  protected $memoryPayloadType = AssistantRemindersMemoryPayload::class;
  protected $memoryPayloadDataType = '';
  /**
   * @var bool
   */
  public $notifying;
  protected $personalReferenceMetadataType = CopleySourceTypeList::class;
  protected $personalReferenceMetadataDataType = '';
  protected $recipientType = QualityActionsReminderPerson::class;
  protected $recipientDataType = '';
  protected $recurrenceType = QualityActionsReminderRecurrenceInfo::class;
  protected $recurrenceDataType = '';
  /**
   * @var string
   */
  public $serverId;
  /**
   * @var string
   */
  public $symbolicTime;
  /**
   * @var string
   */
  public $title;
  /**
   * @var string
   */
  public $updateTimestamp;

  /**
   * @param bool
   */
  public function setArchived($archived)
  {
    $this->archived = $archived;
  }
  /**
   * @return bool
   */
  public function getArchived()
  {
    return $this->archived;
  }
  /**
   * @param AssistantApiDateTime
   */
  public function setArchivedTime(AssistantApiDateTime $archivedTime)
  {
    $this->archivedTime = $archivedTime;
  }
  /**
   * @return AssistantApiDateTime
   */
  public function getArchivedTime()
  {
    return $this->archivedTime;
  }
  /**
   * @param string
   */
  public function setArchivedTimestamp($archivedTimestamp)
  {
    $this->archivedTimestamp = $archivedTimestamp;
  }
  /**
   * @return string
   */
  public function getArchivedTimestamp()
  {
    return $this->archivedTimestamp;
  }
  /**
   * @param string
   */
  public function setAsyncInteractionType($asyncInteractionType)
  {
    $this->asyncInteractionType = $asyncInteractionType;
  }
  /**
   * @return string
   */
  public function getAsyncInteractionType()
  {
    return $this->asyncInteractionType;
  }
  /**
   * @param AssistantRemindersAttachment[]
   */
  public function setAttachment($attachment)
  {
    $this->attachment = $attachment;
  }
  /**
   * @return AssistantRemindersAttachment[]
   */
  public function getAttachment()
  {
    return $this->attachment;
  }
  /**
   * @param string
   */
  public function setBareTitle($bareTitle)
  {
    $this->bareTitle = $bareTitle;
  }
  /**
   * @return string
   */
  public function getBareTitle()
  {
    return $this->bareTitle;
  }
  /**
   * @param string
   */
  public function setClientId($clientId)
  {
    $this->clientId = $clientId;
  }
  /**
   * @return string
   */
  public function getClientId()
  {
    return $this->clientId;
  }
  /**
   * @param QualityDialogManagerReminderClientType
   */
  public function setClientType(QualityDialogManagerReminderClientType $clientType)
  {
    $this->clientType = $clientType;
  }
  /**
   * @return QualityDialogManagerReminderClientType
   */
  public function getClientType()
  {
    return $this->clientType;
  }
  /**
   * @param AssistantApiDateTime
   */
  public function setCreateTime(AssistantApiDateTime $createTime)
  {
    $this->createTime = $createTime;
  }
  /**
   * @return AssistantApiDateTime
   */
  public function getCreateTime()
  {
    return $this->createTime;
  }
  /**
   * @param string
   */
  public function setCreateTimestamp($createTimestamp)
  {
    $this->createTimestamp = $createTimestamp;
  }
  /**
   * @return string
   */
  public function getCreateTimestamp()
  {
    return $this->createTimestamp;
  }
  /**
   * @param QualityActionsReminderPerson
   */
  public function setCreator(QualityActionsReminderPerson $creator)
  {
    $this->creator = $creator;
  }
  /**
   * @return QualityActionsReminderPerson
   */
  public function getCreator()
  {
    return $this->creator;
  }
  /**
   * @param QualityActionsCustomizedNotification[]
   */
  public function setCustomizedNotificationCard($customizedNotificationCard)
  {
    $this->customizedNotificationCard = $customizedNotificationCard;
  }
  /**
   * @return QualityActionsCustomizedNotification[]
   */
  public function getCustomizedNotificationCard()
  {
    return $this->customizedNotificationCard;
  }
  /**
   * @param AssistantApiDateTime
   */
  public function setDatetime(AssistantApiDateTime $datetime)
  {
    $this->datetime = $datetime;
  }
  /**
   * @return AssistantApiDateTime
   */
  public function getDatetime()
  {
    return $this->datetime;
  }
  /**
   * @param string
   */
  public function setDescription($description)
  {
    $this->description = $description;
  }
  /**
   * @return string
   */
  public function getDescription()
  {
    return $this->description;
  }
  /**
   * @param string
   */
  public function setId($id)
  {
    $this->id = $id;
  }
  /**
   * @return string
   */
  public function getId()
  {
    return $this->id;
  }
  /**
   * @param QualityActionsReminderLocation
   */
  public function setLocation(QualityActionsReminderLocation $location)
  {
    $this->location = $location;
  }
  /**
   * @return QualityActionsReminderLocation
   */
  public function getLocation()
  {
    return $this->location;
  }
  /**
   * @param AssistantLogsReminderLog
   */
  public function setLog(AssistantLogsReminderLog $log)
  {
    $this->log = $log;
  }
  /**
   * @return AssistantLogsReminderLog
   */
  public function getLog()
  {
    return $this->log;
  }
  /**
   * @param AssistantRemindersMemoryPayload
   */
  public function setMemoryPayload(AssistantRemindersMemoryPayload $memoryPayload)
  {
    $this->memoryPayload = $memoryPayload;
  }
  /**
   * @return AssistantRemindersMemoryPayload
   */
  public function getMemoryPayload()
  {
    return $this->memoryPayload;
  }
  /**
   * @param bool
   */
  public function setNotifying($notifying)
  {
    $this->notifying = $notifying;
  }
  /**
   * @return bool
   */
  public function getNotifying()
  {
    return $this->notifying;
  }
  /**
   * @param CopleySourceTypeList
   */
  public function setPersonalReferenceMetadata(CopleySourceTypeList $personalReferenceMetadata)
  {
    $this->personalReferenceMetadata = $personalReferenceMetadata;
  }
  /**
   * @return CopleySourceTypeList
   */
  public function getPersonalReferenceMetadata()
  {
    return $this->personalReferenceMetadata;
  }
  /**
   * @param QualityActionsReminderPerson
   */
  public function setRecipient(QualityActionsReminderPerson $recipient)
  {
    $this->recipient = $recipient;
  }
  /**
   * @return QualityActionsReminderPerson
   */
  public function getRecipient()
  {
    return $this->recipient;
  }
  /**
   * @param QualityActionsReminderRecurrenceInfo
   */
  public function setRecurrence(QualityActionsReminderRecurrenceInfo $recurrence)
  {
    $this->recurrence = $recurrence;
  }
  /**
   * @return QualityActionsReminderRecurrenceInfo
   */
  public function getRecurrence()
  {
    return $this->recurrence;
  }
  /**
   * @param string
   */
  public function setServerId($serverId)
  {
    $this->serverId = $serverId;
  }
  /**
   * @return string
   */
  public function getServerId()
  {
    return $this->serverId;
  }
  /**
   * @param string
   */
  public function setSymbolicTime($symbolicTime)
  {
    $this->symbolicTime = $symbolicTime;
  }
  /**
   * @return string
   */
  public function getSymbolicTime()
  {
    return $this->symbolicTime;
  }
  /**
   * @param string
   */
  public function setTitle($title)
  {
    $this->title = $title;
  }
  /**
   * @return string
   */
  public function getTitle()
  {
    return $this->title;
  }
  /**
   * @param string
   */
  public function setUpdateTimestamp($updateTimestamp)
  {
    $this->updateTimestamp = $updateTimestamp;
  }
  /**
   * @return string
   */
  public function getUpdateTimestamp()
  {
    return $this->updateTimestamp;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(QualityActionsReminder::class, 'Google_Service_Contentwarehouse_QualityActionsReminder');
