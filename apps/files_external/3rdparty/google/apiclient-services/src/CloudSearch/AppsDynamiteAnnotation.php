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

class AppsDynamiteAnnotation extends \Google\Model
{
  protected $babelPlaceholderMetadataType = AppsDynamiteBabelPlaceholderMetadata::class;
  protected $babelPlaceholderMetadataDataType = '';
  protected $cardCapabilityMetadataType = AppsDynamiteCardCapabilityMetadata::class;
  protected $cardCapabilityMetadataDataType = '';
  /**
   * @var string
   */
  public $chipRenderType;
  protected $consentedAppUnfurlMetadataType = AppsDynamiteConsentedAppUnfurlMetadata::class;
  protected $consentedAppUnfurlMetadataDataType = '';
  protected $customEmojiMetadataType = AppsDynamiteCustomEmojiMetadata::class;
  protected $customEmojiMetadataDataType = '';
  protected $dataLossPreventionMetadataType = AppsDynamiteDataLossPreventionMetadata::class;
  protected $dataLossPreventionMetadataDataType = '';
  protected $driveMetadataType = AppsDynamiteDriveMetadata::class;
  protected $driveMetadataDataType = '';
  protected $formatMetadataType = AppsDynamiteFormatMetadata::class;
  protected $formatMetadataDataType = '';
  protected $groupRetentionSettingsUpdatedType = AppsDynamiteGroupRetentionSettingsUpdatedMetaData::class;
  protected $groupRetentionSettingsUpdatedDataType = '';
  protected $gsuiteIntegrationMetadataType = AppsDynamiteGsuiteIntegrationMetadata::class;
  protected $gsuiteIntegrationMetadataDataType = '';
  protected $incomingWebhookChangedMetadataType = AppsDynamiteIncomingWebhookChangedMetadata::class;
  protected $incomingWebhookChangedMetadataDataType = '';
  protected $integrationConfigUpdatedType = AppsDynamiteIntegrationConfigUpdatedMetadata::class;
  protected $integrationConfigUpdatedDataType = '';
  /**
   * @var int
   */
  public $length;
  /**
   * @var string
   */
  public $localId;
  protected $membershipChangedType = AppsDynamiteMembershipChangedMetadata::class;
  protected $membershipChangedDataType = '';
  protected $readReceiptsSettingsMetadataType = AppsDynamiteReadReceiptsSettingsUpdatedMetadata::class;
  protected $readReceiptsSettingsMetadataDataType = '';
  protected $requiredMessageFeaturesMetadataType = AppsDynamiteRequiredMessageFeaturesMetadata::class;
  protected $requiredMessageFeaturesMetadataDataType = '';
  protected $roomUpdatedType = AppsDynamiteRoomUpdatedMetadata::class;
  protected $roomUpdatedDataType = '';
  /**
   * @var bool
   */
  public $serverInvalidated;
  protected $slashCommandMetadataType = AppsDynamiteSlashCommandMetadata::class;
  protected $slashCommandMetadataDataType = '';
  /**
   * @var int
   */
  public $startIndex;
  /**
   * @var string
   */
  public $type;
  /**
   * @var string
   */
  public $uniqueId;
  protected $uploadMetadataType = AppsDynamiteUploadMetadata::class;
  protected $uploadMetadataDataType = '';
  protected $urlMetadataType = AppsDynamiteUrlMetadata::class;
  protected $urlMetadataDataType = '';
  protected $userMentionMetadataType = AppsDynamiteUserMentionMetadata::class;
  protected $userMentionMetadataDataType = '';
  protected $videoCallMetadataType = AppsDynamiteVideoCallMetadata::class;
  protected $videoCallMetadataDataType = '';
  protected $youtubeMetadataType = AppsDynamiteYoutubeMetadata::class;
  protected $youtubeMetadataDataType = '';

  /**
   * @param AppsDynamiteBabelPlaceholderMetadata
   */
  public function setBabelPlaceholderMetadata(AppsDynamiteBabelPlaceholderMetadata $babelPlaceholderMetadata)
  {
    $this->babelPlaceholderMetadata = $babelPlaceholderMetadata;
  }
  /**
   * @return AppsDynamiteBabelPlaceholderMetadata
   */
  public function getBabelPlaceholderMetadata()
  {
    return $this->babelPlaceholderMetadata;
  }
  /**
   * @param AppsDynamiteCardCapabilityMetadata
   */
  public function setCardCapabilityMetadata(AppsDynamiteCardCapabilityMetadata $cardCapabilityMetadata)
  {
    $this->cardCapabilityMetadata = $cardCapabilityMetadata;
  }
  /**
   * @return AppsDynamiteCardCapabilityMetadata
   */
  public function getCardCapabilityMetadata()
  {
    return $this->cardCapabilityMetadata;
  }
  /**
   * @param string
   */
  public function setChipRenderType($chipRenderType)
  {
    $this->chipRenderType = $chipRenderType;
  }
  /**
   * @return string
   */
  public function getChipRenderType()
  {
    return $this->chipRenderType;
  }
  /**
   * @param AppsDynamiteConsentedAppUnfurlMetadata
   */
  public function setConsentedAppUnfurlMetadata(AppsDynamiteConsentedAppUnfurlMetadata $consentedAppUnfurlMetadata)
  {
    $this->consentedAppUnfurlMetadata = $consentedAppUnfurlMetadata;
  }
  /**
   * @return AppsDynamiteConsentedAppUnfurlMetadata
   */
  public function getConsentedAppUnfurlMetadata()
  {
    return $this->consentedAppUnfurlMetadata;
  }
  /**
   * @param AppsDynamiteCustomEmojiMetadata
   */
  public function setCustomEmojiMetadata(AppsDynamiteCustomEmojiMetadata $customEmojiMetadata)
  {
    $this->customEmojiMetadata = $customEmojiMetadata;
  }
  /**
   * @return AppsDynamiteCustomEmojiMetadata
   */
  public function getCustomEmojiMetadata()
  {
    return $this->customEmojiMetadata;
  }
  /**
   * @param AppsDynamiteDataLossPreventionMetadata
   */
  public function setDataLossPreventionMetadata(AppsDynamiteDataLossPreventionMetadata $dataLossPreventionMetadata)
  {
    $this->dataLossPreventionMetadata = $dataLossPreventionMetadata;
  }
  /**
   * @return AppsDynamiteDataLossPreventionMetadata
   */
  public function getDataLossPreventionMetadata()
  {
    return $this->dataLossPreventionMetadata;
  }
  /**
   * @param AppsDynamiteDriveMetadata
   */
  public function setDriveMetadata(AppsDynamiteDriveMetadata $driveMetadata)
  {
    $this->driveMetadata = $driveMetadata;
  }
  /**
   * @return AppsDynamiteDriveMetadata
   */
  public function getDriveMetadata()
  {
    return $this->driveMetadata;
  }
  /**
   * @param AppsDynamiteFormatMetadata
   */
  public function setFormatMetadata(AppsDynamiteFormatMetadata $formatMetadata)
  {
    $this->formatMetadata = $formatMetadata;
  }
  /**
   * @return AppsDynamiteFormatMetadata
   */
  public function getFormatMetadata()
  {
    return $this->formatMetadata;
  }
  /**
   * @param AppsDynamiteGroupRetentionSettingsUpdatedMetaData
   */
  public function setGroupRetentionSettingsUpdated(AppsDynamiteGroupRetentionSettingsUpdatedMetaData $groupRetentionSettingsUpdated)
  {
    $this->groupRetentionSettingsUpdated = $groupRetentionSettingsUpdated;
  }
  /**
   * @return AppsDynamiteGroupRetentionSettingsUpdatedMetaData
   */
  public function getGroupRetentionSettingsUpdated()
  {
    return $this->groupRetentionSettingsUpdated;
  }
  /**
   * @param AppsDynamiteGsuiteIntegrationMetadata
   */
  public function setGsuiteIntegrationMetadata(AppsDynamiteGsuiteIntegrationMetadata $gsuiteIntegrationMetadata)
  {
    $this->gsuiteIntegrationMetadata = $gsuiteIntegrationMetadata;
  }
  /**
   * @return AppsDynamiteGsuiteIntegrationMetadata
   */
  public function getGsuiteIntegrationMetadata()
  {
    return $this->gsuiteIntegrationMetadata;
  }
  /**
   * @param AppsDynamiteIncomingWebhookChangedMetadata
   */
  public function setIncomingWebhookChangedMetadata(AppsDynamiteIncomingWebhookChangedMetadata $incomingWebhookChangedMetadata)
  {
    $this->incomingWebhookChangedMetadata = $incomingWebhookChangedMetadata;
  }
  /**
   * @return AppsDynamiteIncomingWebhookChangedMetadata
   */
  public function getIncomingWebhookChangedMetadata()
  {
    return $this->incomingWebhookChangedMetadata;
  }
  /**
   * @param AppsDynamiteIntegrationConfigUpdatedMetadata
   */
  public function setIntegrationConfigUpdated(AppsDynamiteIntegrationConfigUpdatedMetadata $integrationConfigUpdated)
  {
    $this->integrationConfigUpdated = $integrationConfigUpdated;
  }
  /**
   * @return AppsDynamiteIntegrationConfigUpdatedMetadata
   */
  public function getIntegrationConfigUpdated()
  {
    return $this->integrationConfigUpdated;
  }
  /**
   * @param int
   */
  public function setLength($length)
  {
    $this->length = $length;
  }
  /**
   * @return int
   */
  public function getLength()
  {
    return $this->length;
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
   * @param AppsDynamiteMembershipChangedMetadata
   */
  public function setMembershipChanged(AppsDynamiteMembershipChangedMetadata $membershipChanged)
  {
    $this->membershipChanged = $membershipChanged;
  }
  /**
   * @return AppsDynamiteMembershipChangedMetadata
   */
  public function getMembershipChanged()
  {
    return $this->membershipChanged;
  }
  /**
   * @param AppsDynamiteReadReceiptsSettingsUpdatedMetadata
   */
  public function setReadReceiptsSettingsMetadata(AppsDynamiteReadReceiptsSettingsUpdatedMetadata $readReceiptsSettingsMetadata)
  {
    $this->readReceiptsSettingsMetadata = $readReceiptsSettingsMetadata;
  }
  /**
   * @return AppsDynamiteReadReceiptsSettingsUpdatedMetadata
   */
  public function getReadReceiptsSettingsMetadata()
  {
    return $this->readReceiptsSettingsMetadata;
  }
  /**
   * @param AppsDynamiteRequiredMessageFeaturesMetadata
   */
  public function setRequiredMessageFeaturesMetadata(AppsDynamiteRequiredMessageFeaturesMetadata $requiredMessageFeaturesMetadata)
  {
    $this->requiredMessageFeaturesMetadata = $requiredMessageFeaturesMetadata;
  }
  /**
   * @return AppsDynamiteRequiredMessageFeaturesMetadata
   */
  public function getRequiredMessageFeaturesMetadata()
  {
    return $this->requiredMessageFeaturesMetadata;
  }
  /**
   * @param AppsDynamiteRoomUpdatedMetadata
   */
  public function setRoomUpdated(AppsDynamiteRoomUpdatedMetadata $roomUpdated)
  {
    $this->roomUpdated = $roomUpdated;
  }
  /**
   * @return AppsDynamiteRoomUpdatedMetadata
   */
  public function getRoomUpdated()
  {
    return $this->roomUpdated;
  }
  /**
   * @param bool
   */
  public function setServerInvalidated($serverInvalidated)
  {
    $this->serverInvalidated = $serverInvalidated;
  }
  /**
   * @return bool
   */
  public function getServerInvalidated()
  {
    return $this->serverInvalidated;
  }
  /**
   * @param AppsDynamiteSlashCommandMetadata
   */
  public function setSlashCommandMetadata(AppsDynamiteSlashCommandMetadata $slashCommandMetadata)
  {
    $this->slashCommandMetadata = $slashCommandMetadata;
  }
  /**
   * @return AppsDynamiteSlashCommandMetadata
   */
  public function getSlashCommandMetadata()
  {
    return $this->slashCommandMetadata;
  }
  /**
   * @param int
   */
  public function setStartIndex($startIndex)
  {
    $this->startIndex = $startIndex;
  }
  /**
   * @return int
   */
  public function getStartIndex()
  {
    return $this->startIndex;
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
   * @param string
   */
  public function setUniqueId($uniqueId)
  {
    $this->uniqueId = $uniqueId;
  }
  /**
   * @return string
   */
  public function getUniqueId()
  {
    return $this->uniqueId;
  }
  /**
   * @param AppsDynamiteUploadMetadata
   */
  public function setUploadMetadata(AppsDynamiteUploadMetadata $uploadMetadata)
  {
    $this->uploadMetadata = $uploadMetadata;
  }
  /**
   * @return AppsDynamiteUploadMetadata
   */
  public function getUploadMetadata()
  {
    return $this->uploadMetadata;
  }
  /**
   * @param AppsDynamiteUrlMetadata
   */
  public function setUrlMetadata(AppsDynamiteUrlMetadata $urlMetadata)
  {
    $this->urlMetadata = $urlMetadata;
  }
  /**
   * @return AppsDynamiteUrlMetadata
   */
  public function getUrlMetadata()
  {
    return $this->urlMetadata;
  }
  /**
   * @param AppsDynamiteUserMentionMetadata
   */
  public function setUserMentionMetadata(AppsDynamiteUserMentionMetadata $userMentionMetadata)
  {
    $this->userMentionMetadata = $userMentionMetadata;
  }
  /**
   * @return AppsDynamiteUserMentionMetadata
   */
  public function getUserMentionMetadata()
  {
    return $this->userMentionMetadata;
  }
  /**
   * @param AppsDynamiteVideoCallMetadata
   */
  public function setVideoCallMetadata(AppsDynamiteVideoCallMetadata $videoCallMetadata)
  {
    $this->videoCallMetadata = $videoCallMetadata;
  }
  /**
   * @return AppsDynamiteVideoCallMetadata
   */
  public function getVideoCallMetadata()
  {
    return $this->videoCallMetadata;
  }
  /**
   * @param AppsDynamiteYoutubeMetadata
   */
  public function setYoutubeMetadata(AppsDynamiteYoutubeMetadata $youtubeMetadata)
  {
    $this->youtubeMetadata = $youtubeMetadata;
  }
  /**
   * @return AppsDynamiteYoutubeMetadata
   */
  public function getYoutubeMetadata()
  {
    return $this->youtubeMetadata;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AppsDynamiteAnnotation::class, 'Google_Service_CloudSearch_AppsDynamiteAnnotation');
