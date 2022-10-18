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

class QuotedMessageMetadata extends \Google\Collection
{
  protected $collection_key = 'uploadMetadata';
  protected $annotationsType = Annotation::class;
  protected $annotationsDataType = 'array';
  protected $appProfileType = AppsDynamiteSharedAppProfile::class;
  protected $appProfileDataType = '';
  /**
   * @var string
   */
  public $botAttachmentState;
  /**
   * @var string
   */
  public $createTimeMicros;
  protected $creatorIdType = UserId::class;
  protected $creatorIdDataType = '';
  /**
   * @var string
   */
  public $lastEditTimeMicros;
  /**
   * @var string
   */
  public $lastUpdateTimeWhenQuotedMicros;
  protected $messageIdType = MessageId::class;
  protected $messageIdDataType = '';
  /**
   * @var string
   */
  public $messageState;
  protected $retentionSettingsType = AppsDynamiteSharedRetentionSettings::class;
  protected $retentionSettingsDataType = '';
  /**
   * @var string
   */
  public $textBody;
  protected $updaterIdType = UserId::class;
  protected $updaterIdDataType = '';
  protected $uploadMetadataType = UploadMetadata::class;
  protected $uploadMetadataDataType = 'array';

  /**
   * @param Annotation[]
   */
  public function setAnnotations($annotations)
  {
    $this->annotations = $annotations;
  }
  /**
   * @return Annotation[]
   */
  public function getAnnotations()
  {
    return $this->annotations;
  }
  /**
   * @param AppsDynamiteSharedAppProfile
   */
  public function setAppProfile(AppsDynamiteSharedAppProfile $appProfile)
  {
    $this->appProfile = $appProfile;
  }
  /**
   * @return AppsDynamiteSharedAppProfile
   */
  public function getAppProfile()
  {
    return $this->appProfile;
  }
  /**
   * @param string
   */
  public function setBotAttachmentState($botAttachmentState)
  {
    $this->botAttachmentState = $botAttachmentState;
  }
  /**
   * @return string
   */
  public function getBotAttachmentState()
  {
    return $this->botAttachmentState;
  }
  /**
   * @param string
   */
  public function setCreateTimeMicros($createTimeMicros)
  {
    $this->createTimeMicros = $createTimeMicros;
  }
  /**
   * @return string
   */
  public function getCreateTimeMicros()
  {
    return $this->createTimeMicros;
  }
  /**
   * @param UserId
   */
  public function setCreatorId(UserId $creatorId)
  {
    $this->creatorId = $creatorId;
  }
  /**
   * @return UserId
   */
  public function getCreatorId()
  {
    return $this->creatorId;
  }
  /**
   * @param string
   */
  public function setLastEditTimeMicros($lastEditTimeMicros)
  {
    $this->lastEditTimeMicros = $lastEditTimeMicros;
  }
  /**
   * @return string
   */
  public function getLastEditTimeMicros()
  {
    return $this->lastEditTimeMicros;
  }
  /**
   * @param string
   */
  public function setLastUpdateTimeWhenQuotedMicros($lastUpdateTimeWhenQuotedMicros)
  {
    $this->lastUpdateTimeWhenQuotedMicros = $lastUpdateTimeWhenQuotedMicros;
  }
  /**
   * @return string
   */
  public function getLastUpdateTimeWhenQuotedMicros()
  {
    return $this->lastUpdateTimeWhenQuotedMicros;
  }
  /**
   * @param MessageId
   */
  public function setMessageId(MessageId $messageId)
  {
    $this->messageId = $messageId;
  }
  /**
   * @return MessageId
   */
  public function getMessageId()
  {
    return $this->messageId;
  }
  /**
   * @param string
   */
  public function setMessageState($messageState)
  {
    $this->messageState = $messageState;
  }
  /**
   * @return string
   */
  public function getMessageState()
  {
    return $this->messageState;
  }
  /**
   * @param AppsDynamiteSharedRetentionSettings
   */
  public function setRetentionSettings(AppsDynamiteSharedRetentionSettings $retentionSettings)
  {
    $this->retentionSettings = $retentionSettings;
  }
  /**
   * @return AppsDynamiteSharedRetentionSettings
   */
  public function getRetentionSettings()
  {
    return $this->retentionSettings;
  }
  /**
   * @param string
   */
  public function setTextBody($textBody)
  {
    $this->textBody = $textBody;
  }
  /**
   * @return string
   */
  public function getTextBody()
  {
    return $this->textBody;
  }
  /**
   * @param UserId
   */
  public function setUpdaterId(UserId $updaterId)
  {
    $this->updaterId = $updaterId;
  }
  /**
   * @return UserId
   */
  public function getUpdaterId()
  {
    return $this->updaterId;
  }
  /**
   * @param UploadMetadata[]
   */
  public function setUploadMetadata($uploadMetadata)
  {
    $this->uploadMetadata = $uploadMetadata;
  }
  /**
   * @return UploadMetadata[]
   */
  public function getUploadMetadata()
  {
    return $this->uploadMetadata;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(QuotedMessageMetadata::class, 'Google_Service_CloudSearch_QuotedMessageMetadata');
