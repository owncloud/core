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

class AppsDynamiteMessage extends \Google\Collection
{
  protected $collection_key = 'uploadMetadata';
  protected $annotationsType = AppsDynamiteAnnotation::class;
  protected $annotationsDataType = 'array';
  protected $appProfileType = AppsDynamiteSharedAppProfile::class;
  protected $appProfileDataType = '';
  protected $attachmentsType = AppsDynamiteAttachment::class;
  protected $attachmentsDataType = 'array';
  protected $attributesType = AppsDynamiteMessageAttributes::class;
  protected $attributesDataType = '';
  protected $botResponsesType = AppsDynamiteBotResponse::class;
  protected $botResponsesDataType = 'array';
  protected $communalLabelsType = AppsDynamiteBackendLabelsCommunalLabelTag::class;
  protected $communalLabelsDataType = 'array';
  protected $contentReportSummaryType = AppsDynamiteMessageContentReportSummary::class;
  protected $contentReportSummaryDataType = '';
  /**
   * @var string
   */
  public $createTime;
  protected $creatorIdType = AppsDynamiteUserId::class;
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
  protected $dlpScanSummaryType = AppsDynamiteBackendDlpScanSummary::class;
  protected $dlpScanSummaryDataType = '';
  /**
   * @var string
   */
  public $editableBy;
  /**
   * @var string
   */
  public $fallbackText;
  protected $idType = AppsDynamiteMessageId::class;
  protected $idDataType = '';
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
  protected $personalLabelsType = AppsDynamiteBackendLabelsPersonalLabelTag::class;
  protected $personalLabelsDataType = 'array';
  protected $privateMessageInfosType = AppsDynamitePrivateMessageInfo::class;
  protected $privateMessageInfosDataType = 'array';
  protected $privateMessageViewerType = AppsDynamiteUserId::class;
  protected $privateMessageViewerDataType = '';
  protected $propsType = AppsDynamiteMessageProps::class;
  protected $propsDataType = '';
  /**
   * @var string
   */
  public $quotedByState;
  protected $quotedMessageMetadataType = AppsDynamiteQuotedMessageMetadata::class;
  protected $quotedMessageMetadataDataType = '';
  protected $reactionsType = AppsDynamiteSharedReaction::class;
  protected $reactionsDataType = 'array';
  protected $reportsType = AppsDynamiteContentReport::class;
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
  protected $tombstoneMetadataType = AppsDynamiteTombstoneMetadata::class;
  protected $tombstoneMetadataDataType = '';
  protected $updaterIdType = AppsDynamiteUserId::class;
  protected $updaterIdDataType = '';
  protected $uploadMetadataType = AppsDynamiteUploadMetadata::class;
  protected $uploadMetadataDataType = 'array';

  /**
   * @param AppsDynamiteAnnotation[]
   */
  public function setAnnotations($annotations)
  {
    $this->annotations = $annotations;
  }
  /**
   * @return AppsDynamiteAnnotation[]
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
   * @param AppsDynamiteAttachment[]
   */
  public function setAttachments($attachments)
  {
    $this->attachments = $attachments;
  }
  /**
   * @return AppsDynamiteAttachment[]
   */
  public function getAttachments()
  {
    return $this->attachments;
  }
  /**
   * @param AppsDynamiteMessageAttributes
   */
  public function setAttributes(AppsDynamiteMessageAttributes $attributes)
  {
    $this->attributes = $attributes;
  }
  /**
   * @return AppsDynamiteMessageAttributes
   */
  public function getAttributes()
  {
    return $this->attributes;
  }
  /**
   * @param AppsDynamiteBotResponse[]
   */
  public function setBotResponses($botResponses)
  {
    $this->botResponses = $botResponses;
  }
  /**
   * @return AppsDynamiteBotResponse[]
   */
  public function getBotResponses()
  {
    return $this->botResponses;
  }
  /**
   * @param AppsDynamiteBackendLabelsCommunalLabelTag[]
   */
  public function setCommunalLabels($communalLabels)
  {
    $this->communalLabels = $communalLabels;
  }
  /**
   * @return AppsDynamiteBackendLabelsCommunalLabelTag[]
   */
  public function getCommunalLabels()
  {
    return $this->communalLabels;
  }
  /**
   * @param AppsDynamiteMessageContentReportSummary
   */
  public function setContentReportSummary(AppsDynamiteMessageContentReportSummary $contentReportSummary)
  {
    $this->contentReportSummary = $contentReportSummary;
  }
  /**
   * @return AppsDynamiteMessageContentReportSummary
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
   * @param AppsDynamiteUserId
   */
  public function setCreatorId(AppsDynamiteUserId $creatorId)
  {
    $this->creatorId = $creatorId;
  }
  /**
   * @return AppsDynamiteUserId
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
   * @param AppsDynamiteBackendDlpScanSummary
   */
  public function setDlpScanSummary(AppsDynamiteBackendDlpScanSummary $dlpScanSummary)
  {
    $this->dlpScanSummary = $dlpScanSummary;
  }
  /**
   * @return AppsDynamiteBackendDlpScanSummary
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
   * @param AppsDynamiteMessageId
   */
  public function setId(AppsDynamiteMessageId $id)
  {
    $this->id = $id;
  }
  /**
   * @return AppsDynamiteMessageId
   */
  public function getId()
  {
    return $this->id;
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
   * @param AppsDynamiteBackendLabelsPersonalLabelTag[]
   */
  public function setPersonalLabels($personalLabels)
  {
    $this->personalLabels = $personalLabels;
  }
  /**
   * @return AppsDynamiteBackendLabelsPersonalLabelTag[]
   */
  public function getPersonalLabels()
  {
    return $this->personalLabels;
  }
  /**
   * @param AppsDynamitePrivateMessageInfo[]
   */
  public function setPrivateMessageInfos($privateMessageInfos)
  {
    $this->privateMessageInfos = $privateMessageInfos;
  }
  /**
   * @return AppsDynamitePrivateMessageInfo[]
   */
  public function getPrivateMessageInfos()
  {
    return $this->privateMessageInfos;
  }
  /**
   * @param AppsDynamiteUserId
   */
  public function setPrivateMessageViewer(AppsDynamiteUserId $privateMessageViewer)
  {
    $this->privateMessageViewer = $privateMessageViewer;
  }
  /**
   * @return AppsDynamiteUserId
   */
  public function getPrivateMessageViewer()
  {
    return $this->privateMessageViewer;
  }
  /**
   * @param AppsDynamiteMessageProps
   */
  public function setProps(AppsDynamiteMessageProps $props)
  {
    $this->props = $props;
  }
  /**
   * @return AppsDynamiteMessageProps
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
   * @param AppsDynamiteQuotedMessageMetadata
   */
  public function setQuotedMessageMetadata(AppsDynamiteQuotedMessageMetadata $quotedMessageMetadata)
  {
    $this->quotedMessageMetadata = $quotedMessageMetadata;
  }
  /**
   * @return AppsDynamiteQuotedMessageMetadata
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
   * @param AppsDynamiteContentReport[]
   */
  public function setReports($reports)
  {
    $this->reports = $reports;
  }
  /**
   * @return AppsDynamiteContentReport[]
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
   * @param AppsDynamiteTombstoneMetadata
   */
  public function setTombstoneMetadata(AppsDynamiteTombstoneMetadata $tombstoneMetadata)
  {
    $this->tombstoneMetadata = $tombstoneMetadata;
  }
  /**
   * @return AppsDynamiteTombstoneMetadata
   */
  public function getTombstoneMetadata()
  {
    return $this->tombstoneMetadata;
  }
  /**
   * @param AppsDynamiteUserId
   */
  public function setUpdaterId(AppsDynamiteUserId $updaterId)
  {
    $this->updaterId = $updaterId;
  }
  /**
   * @return AppsDynamiteUserId
   */
  public function getUpdaterId()
  {
    return $this->updaterId;
  }
  /**
   * @param AppsDynamiteUploadMetadata[]
   */
  public function setUploadMetadata($uploadMetadata)
  {
    $this->uploadMetadata = $uploadMetadata;
  }
  /**
   * @return AppsDynamiteUploadMetadata[]
   */
  public function getUploadMetadata()
  {
    return $this->uploadMetadata;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AppsDynamiteMessage::class, 'Google_Service_CloudSearch_AppsDynamiteMessage');
