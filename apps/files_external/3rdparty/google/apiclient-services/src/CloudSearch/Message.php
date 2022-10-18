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

class Message extends \Google\Collection
{
  protected $collection_key = 'uploadMetadata';
  protected $annotationsType = Annotation::class;
  protected $annotationsDataType = 'array';
  protected $appProfileType = AppsDynamiteSharedAppProfile::class;
  protected $appProfileDataType = '';
  protected $attachmentsType = Attachment::class;
  protected $attachmentsDataType = 'array';
  protected $attributesType = MessageAttributes::class;
  protected $attributesDataType = '';
  protected $botResponsesType = BotResponse::class;
  protected $botResponsesDataType = 'array';
  protected $communalLabelsType = CommunalLabelTag::class;
  protected $communalLabelsDataType = 'array';
  protected $contentReportSummaryType = ContentReportSummary::class;
  protected $contentReportSummaryDataType = '';
  /**
   * @var string
   */
  public $createTime;
  protected $creatorIdType = UserId::class;
  protected $creatorIdDataType = '';
  /**
   * @var string
   */
  public $deletableBy;
  /**
   * @var string
   */
  public $deleteTime;
  /**
   * @var string
   */
  public $deleteTimeForRequester;
  /**
   * @var bool
   */
  public $deletedByVault;
  /**
   * @var string
   */
  public $dlpScanOutcome;
  protected $dlpScanSummaryType = DlpScanSummary::class;
  protected $dlpScanSummaryDataType = '';
  /**
   * @var string
   */
  public $editableBy;
  /**
   * @var string
   */
  public $fallbackText;
  protected $idType = MessageId::class;
  protected $idDataType = '';
  /**
   * @var bool
   */
  public $isContentPurged;
  /**
   * @var bool
   */
  public $isInlineReply;
  /**
   * @var string
   */
  public $lastEditTime;
  /**
   * @var string
   */
  public $lastUpdateTime;
  /**
   * @var string
   */
  public $localId;
  protected $messageIntegrationPayloadType = AppsDynamiteSharedMessageIntegrationPayload::class;
  protected $messageIntegrationPayloadDataType = '';
  /**
   * @var string
   */
  public $messageOrigin;
  /**
   * @var string
   */
  public $messageState;
  protected $originAppSuggestionsType = AppsDynamiteSharedOriginAppSuggestion::class;
  protected $originAppSuggestionsDataType = 'array';
  protected $personalLabelsType = PersonalLabelTag::class;
  protected $personalLabelsDataType = 'array';
  protected $privateMessageInfosType = PrivateMessageInfo::class;
  protected $privateMessageInfosDataType = 'array';
  protected $privateMessageViewerType = UserId::class;
  protected $privateMessageViewerDataType = '';
  protected $propsType = MessageProps::class;
  protected $propsDataType = '';
  /**
   * @var string
   */
  public $quotedByState;
  protected $quotedMessageMetadataType = QuotedMessageMetadata::class;
  protected $quotedMessageMetadataDataType = '';
  protected $reactionsType = AppsDynamiteSharedReaction::class;
  protected $reactionsDataType = 'array';
  protected $reportsType = ContentReport::class;
  protected $reportsDataType = 'array';
  protected $retentionSettingsType = AppsDynamiteSharedRetentionSettings::class;
  protected $retentionSettingsDataType = '';
  /**
   * @var string
   */
  public $secondaryMessageKey;
  /**
   * @var string
   */
  public $textBody;
  protected $tombstoneMetadataType = TombstoneMetadata::class;
  protected $tombstoneMetadataDataType = '';
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
   * @param Attachment[]
   */
  public function setAttachments($attachments)
  {
    $this->attachments = $attachments;
  }
  /**
   * @return Attachment[]
   */
  public function getAttachments()
  {
    return $this->attachments;
  }
  /**
   * @param MessageAttributes
   */
  public function setAttributes(MessageAttributes $attributes)
  {
    $this->attributes = $attributes;
  }
  /**
   * @return MessageAttributes
   */
  public function getAttributes()
  {
    return $this->attributes;
  }
  /**
   * @param BotResponse[]
   */
  public function setBotResponses($botResponses)
  {
    $this->botResponses = $botResponses;
  }
  /**
   * @return BotResponse[]
   */
  public function getBotResponses()
  {
    return $this->botResponses;
  }
  /**
   * @param CommunalLabelTag[]
   */
  public function setCommunalLabels($communalLabels)
  {
    $this->communalLabels = $communalLabels;
  }
  /**
   * @return CommunalLabelTag[]
   */
  public function getCommunalLabels()
  {
    return $this->communalLabels;
  }
  /**
   * @param ContentReportSummary
   */
  public function setContentReportSummary(ContentReportSummary $contentReportSummary)
  {
    $this->contentReportSummary = $contentReportSummary;
  }
  /**
   * @return ContentReportSummary
   */
  public function getContentReportSummary()
  {
    return $this->contentReportSummary;
  }
  /**
   * @param string
   */
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  /**
   * @return string
   */
  public function getCreateTime()
  {
    return $this->createTime;
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
  public function setDeletableBy($deletableBy)
  {
    $this->deletableBy = $deletableBy;
  }
  /**
   * @return string
   */
  public function getDeletableBy()
  {
    return $this->deletableBy;
  }
  /**
   * @param string
   */
  public function setDeleteTime($deleteTime)
  {
    $this->deleteTime = $deleteTime;
  }
  /**
   * @return string
   */
  public function getDeleteTime()
  {
    return $this->deleteTime;
  }
  /**
   * @param string
   */
  public function setDeleteTimeForRequester($deleteTimeForRequester)
  {
    $this->deleteTimeForRequester = $deleteTimeForRequester;
  }
  /**
   * @return string
   */
  public function getDeleteTimeForRequester()
  {
    return $this->deleteTimeForRequester;
  }
  /**
   * @param bool
   */
  public function setDeletedByVault($deletedByVault)
  {
    $this->deletedByVault = $deletedByVault;
  }
  /**
   * @return bool
   */
  public function getDeletedByVault()
  {
    return $this->deletedByVault;
  }
  /**
   * @param string
   */
  public function setDlpScanOutcome($dlpScanOutcome)
  {
    $this->dlpScanOutcome = $dlpScanOutcome;
  }
  /**
   * @return string
   */
  public function getDlpScanOutcome()
  {
    return $this->dlpScanOutcome;
  }
  /**
   * @param DlpScanSummary
   */
  public function setDlpScanSummary(DlpScanSummary $dlpScanSummary)
  {
    $this->dlpScanSummary = $dlpScanSummary;
  }
  /**
   * @return DlpScanSummary
   */
  public function getDlpScanSummary()
  {
    return $this->dlpScanSummary;
  }
  /**
   * @param string
   */
  public function setEditableBy($editableBy)
  {
    $this->editableBy = $editableBy;
  }
  /**
   * @return string
   */
  public function getEditableBy()
  {
    return $this->editableBy;
  }
  /**
   * @param string
   */
  public function setFallbackText($fallbackText)
  {
    $this->fallbackText = $fallbackText;
  }
  /**
   * @return string
   */
  public function getFallbackText()
  {
    return $this->fallbackText;
  }
  /**
   * @param MessageId
   */
  public function setId(MessageId $id)
  {
    $this->id = $id;
  }
  /**
   * @return MessageId
   */
  public function getId()
  {
    return $this->id;
  }
  /**
   * @param bool
   */
  public function setIsContentPurged($isContentPurged)
  {
    $this->isContentPurged = $isContentPurged;
  }
  /**
   * @return bool
   */
  public function getIsContentPurged()
  {
    return $this->isContentPurged;
  }
  /**
   * @param bool
   */
  public function setIsInlineReply($isInlineReply)
  {
    $this->isInlineReply = $isInlineReply;
  }
  /**
   * @return bool
   */
  public function getIsInlineReply()
  {
    return $this->isInlineReply;
  }
  /**
   * @param string
   */
  public function setLastEditTime($lastEditTime)
  {
    $this->lastEditTime = $lastEditTime;
  }
  /**
   * @return string
   */
  public function getLastEditTime()
  {
    return $this->lastEditTime;
  }
  /**
   * @param string
   */
  public function setLastUpdateTime($lastUpdateTime)
  {
    $this->lastUpdateTime = $lastUpdateTime;
  }
  /**
   * @return string
   */
  public function getLastUpdateTime()
  {
    return $this->lastUpdateTime;
  }
  /**
   * @param string
   */
  public function setLocalId($localId)
  {
    $this->localId = $localId;
  }
  /**
   * @return string
   */
  public function getLocalId()
  {
    return $this->localId;
  }
  /**
   * @param AppsDynamiteSharedMessageIntegrationPayload
   */
  public function setMessageIntegrationPayload(AppsDynamiteSharedMessageIntegrationPayload $messageIntegrationPayload)
  {
    $this->messageIntegrationPayload = $messageIntegrationPayload;
  }
  /**
   * @return AppsDynamiteSharedMessageIntegrationPayload
   */
  public function getMessageIntegrationPayload()
  {
    return $this->messageIntegrationPayload;
  }
  /**
   * @param string
   */
  public function setMessageOrigin($messageOrigin)
  {
    $this->messageOrigin = $messageOrigin;
  }
  /**
   * @return string
   */
  public function getMessageOrigin()
  {
    return $this->messageOrigin;
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
   * @param AppsDynamiteSharedOriginAppSuggestion[]
   */
  public function setOriginAppSuggestions($originAppSuggestions)
  {
    $this->originAppSuggestions = $originAppSuggestions;
  }
  /**
   * @return AppsDynamiteSharedOriginAppSuggestion[]
   */
  public function getOriginAppSuggestions()
  {
    return $this->originAppSuggestions;
  }
  /**
   * @param PersonalLabelTag[]
   */
  public function setPersonalLabels($personalLabels)
  {
    $this->personalLabels = $personalLabels;
  }
  /**
   * @return PersonalLabelTag[]
   */
  public function getPersonalLabels()
  {
    return $this->personalLabels;
  }
  /**
   * @param PrivateMessageInfo[]
   */
  public function setPrivateMessageInfos($privateMessageInfos)
  {
    $this->privateMessageInfos = $privateMessageInfos;
  }
  /**
   * @return PrivateMessageInfo[]
   */
  public function getPrivateMessageInfos()
  {
    return $this->privateMessageInfos;
  }
  /**
   * @param UserId
   */
  public function setPrivateMessageViewer(UserId $privateMessageViewer)
  {
    $this->privateMessageViewer = $privateMessageViewer;
  }
  /**
   * @return UserId
   */
  public function getPrivateMessageViewer()
  {
    return $this->privateMessageViewer;
  }
  /**
   * @param MessageProps
   */
  public function setProps(MessageProps $props)
  {
    $this->props = $props;
  }
  /**
   * @return MessageProps
   */
  public function getProps()
  {
    return $this->props;
  }
  /**
   * @param string
   */
  public function setQuotedByState($quotedByState)
  {
    $this->quotedByState = $quotedByState;
  }
  /**
   * @return string
   */
  public function getQuotedByState()
  {
    return $this->quotedByState;
  }
  /**
   * @param QuotedMessageMetadata
   */
  public function setQuotedMessageMetadata(QuotedMessageMetadata $quotedMessageMetadata)
  {
    $this->quotedMessageMetadata = $quotedMessageMetadata;
  }
  /**
   * @return QuotedMessageMetadata
   */
  public function getQuotedMessageMetadata()
  {
    return $this->quotedMessageMetadata;
  }
  /**
   * @param AppsDynamiteSharedReaction[]
   */
  public function setReactions($reactions)
  {
    $this->reactions = $reactions;
  }
  /**
   * @return AppsDynamiteSharedReaction[]
   */
  public function getReactions()
  {
    return $this->reactions;
  }
  /**
   * @param ContentReport[]
   */
  public function setReports($reports)
  {
    $this->reports = $reports;
  }
  /**
   * @return ContentReport[]
   */
  public function getReports()
  {
    return $this->reports;
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
  public function setSecondaryMessageKey($secondaryMessageKey)
  {
    $this->secondaryMessageKey = $secondaryMessageKey;
  }
  /**
   * @return string
   */
  public function getSecondaryMessageKey()
  {
    return $this->secondaryMessageKey;
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
   * @param TombstoneMetadata
   */
  public function setTombstoneMetadata(TombstoneMetadata $tombstoneMetadata)
  {
    $this->tombstoneMetadata = $tombstoneMetadata;
  }
  /**
   * @return TombstoneMetadata
   */
  public function getTombstoneMetadata()
  {
    return $this->tombstoneMetadata;
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
class_alias(Message::class, 'Google_Service_CloudSearch_Message');
