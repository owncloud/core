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

class Annotation extends \Google\Model
{
  protected $babelPlaceholderMetadataType = BabelPlaceholderMetadata::class;
  protected $babelPlaceholderMetadataDataType = '';
  protected $cardCapabilityMetadataType = CardCapabilityMetadata::class;
  protected $cardCapabilityMetadataDataType = '';
  /**
   * @var string
   */
  public $chipRenderType;
  protected $consentedAppUnfurlMetadataType = ConsentedAppUnfurlMetadata::class;
  protected $consentedAppUnfurlMetadataDataType = '';
  protected $customEmojiMetadataType = CustomEmojiMetadata::class;
  protected $customEmojiMetadataDataType = '';
  protected $dataLossPreventionMetadataType = DataLossPreventionMetadata::class;
  protected $dataLossPreventionMetadataDataType = '';
  protected $driveMetadataType = DriveMetadata::class;
  protected $driveMetadataDataType = '';
  protected $formatMetadataType = FormatMetadata::class;
  protected $formatMetadataDataType = '';
  protected $groupRetentionSettingsUpdatedType = GroupRetentionSettingsUpdatedMetaData::class;
  protected $groupRetentionSettingsUpdatedDataType = '';
  protected $gsuiteIntegrationMetadataType = GsuiteIntegrationMetadata::class;
  protected $gsuiteIntegrationMetadataDataType = '';
  protected $incomingWebhookChangedMetadataType = IncomingWebhookChangedMetadata::class;
  protected $incomingWebhookChangedMetadataDataType = '';
  protected $integrationConfigUpdatedType = IntegrationConfigUpdatedMetadata::class;
  protected $integrationConfigUpdatedDataType = '';
  /**
   * @var int
   */
  public $length;
  /**
   * @var string
   */
  public $localId;
  protected $membershipChangedType = MembershipChangedMetadata::class;
  protected $membershipChangedDataType = '';
  protected $readReceiptsSettingsMetadataType = ReadReceiptsSettingsUpdatedMetadata::class;
  protected $readReceiptsSettingsMetadataDataType = '';
  protected $requiredMessageFeaturesMetadataType = RequiredMessageFeaturesMetadata::class;
  protected $requiredMessageFeaturesMetadataDataType = '';
  protected $roomUpdatedType = RoomUpdatedMetadata::class;
  protected $roomUpdatedDataType = '';
  /**
   * @var bool
   */
  public $serverInvalidated;
  protected $slashCommandMetadataType = SlashCommandMetadata::class;
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
  protected $uploadMetadataType = UploadMetadata::class;
  protected $uploadMetadataDataType = '';
  protected $urlMetadataType = UrlMetadata::class;
  protected $urlMetadataDataType = '';
  protected $userMentionMetadataType = UserMentionMetadata::class;
  protected $userMentionMetadataDataType = '';
  protected $videoCallMetadataType = VideoCallMetadata::class;
  protected $videoCallMetadataDataType = '';
  protected $youtubeMetadataType = YoutubeMetadata::class;
  protected $youtubeMetadataDataType = '';

  /**
   * @param BabelPlaceholderMetadata
   */
  public function setBabelPlaceholderMetadata(BabelPlaceholderMetadata $babelPlaceholderMetadata)
  {
    $this->babelPlaceholderMetadata = $babelPlaceholderMetadata;
  }
  /**
   * @return BabelPlaceholderMetadata
   */
  public function getBabelPlaceholderMetadata()
  {
    return $this->babelPlaceholderMetadata;
  }
  /**
   * @param CardCapabilityMetadata
   */
  public function setCardCapabilityMetadata(CardCapabilityMetadata $cardCapabilityMetadata)
  {
    $this->cardCapabilityMetadata = $cardCapabilityMetadata;
  }
  /**
   * @return CardCapabilityMetadata
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
   * @param ConsentedAppUnfurlMetadata
   */
  public function setConsentedAppUnfurlMetadata(ConsentedAppUnfurlMetadata $consentedAppUnfurlMetadata)
  {
    $this->consentedAppUnfurlMetadata = $consentedAppUnfurlMetadata;
  }
  /**
   * @return ConsentedAppUnfurlMetadata
   */
  public function getConsentedAppUnfurlMetadata()
  {
    return $this->consentedAppUnfurlMetadata;
  }
  /**
   * @param CustomEmojiMetadata
   */
  public function setCustomEmojiMetadata(CustomEmojiMetadata $customEmojiMetadata)
  {
    $this->customEmojiMetadata = $customEmojiMetadata;
  }
  /**
   * @return CustomEmojiMetadata
   */
  public function getCustomEmojiMetadata()
  {
    return $this->customEmojiMetadata;
  }
  /**
   * @param DataLossPreventionMetadata
   */
  public function setDataLossPreventionMetadata(DataLossPreventionMetadata $dataLossPreventionMetadata)
  {
    $this->dataLossPreventionMetadata = $dataLossPreventionMetadata;
  }
  /**
   * @return DataLossPreventionMetadata
   */
  public function getDataLossPreventionMetadata()
  {
    return $this->dataLossPreventionMetadata;
  }
  /**
   * @param DriveMetadata
   */
  public function setDriveMetadata(DriveMetadata $driveMetadata)
  {
    $this->driveMetadata = $driveMetadata;
  }
  /**
   * @return DriveMetadata
   */
  public function getDriveMetadata()
  {
    return $this->driveMetadata;
  }
  /**
   * @param FormatMetadata
   */
  public function setFormatMetadata(FormatMetadata $formatMetadata)
  {
    $this->formatMetadata = $formatMetadata;
  }
  /**
   * @return FormatMetadata
   */
  public function getFormatMetadata()
  {
    return $this->formatMetadata;
  }
  /**
   * @param GroupRetentionSettingsUpdatedMetaData
   */
  public function setGroupRetentionSettingsUpdated(GroupRetentionSettingsUpdatedMetaData $groupRetentionSettingsUpdated)
  {
    $this->groupRetentionSettingsUpdated = $groupRetentionSettingsUpdated;
  }
  /**
   * @return GroupRetentionSettingsUpdatedMetaData
   */
  public function getGroupRetentionSettingsUpdated()
  {
    return $this->groupRetentionSettingsUpdated;
  }
  /**
   * @param GsuiteIntegrationMetadata
   */
  public function setGsuiteIntegrationMetadata(GsuiteIntegrationMetadata $gsuiteIntegrationMetadata)
  {
    $this->gsuiteIntegrationMetadata = $gsuiteIntegrationMetadata;
  }
  /**
   * @return GsuiteIntegrationMetadata
   */
  public function getGsuiteIntegrationMetadata()
  {
    return $this->gsuiteIntegrationMetadata;
  }
  /**
   * @param IncomingWebhookChangedMetadata
   */
  public function setIncomingWebhookChangedMetadata(IncomingWebhookChangedMetadata $incomingWebhookChangedMetadata)
  {
    $this->incomingWebhookChangedMetadata = $incomingWebhookChangedMetadata;
  }
  /**
   * @return IncomingWebhookChangedMetadata
   */
  public function getIncomingWebhookChangedMetadata()
  {
    return $this->incomingWebhookChangedMetadata;
  }
  /**
   * @param IntegrationConfigUpdatedMetadata
   */
  public function setIntegrationConfigUpdated(IntegrationConfigUpdatedMetadata $integrationConfigUpdated)
  {
    $this->integrationConfigUpdated = $integrationConfigUpdated;
  }
  /**
   * @return IntegrationConfigUpdatedMetadata
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
   * @param MembershipChangedMetadata
   */
  public function setMembershipChanged(MembershipChangedMetadata $membershipChanged)
  {
    $this->membershipChanged = $membershipChanged;
  }
  /**
   * @return MembershipChangedMetadata
   */
  public function getMembershipChanged()
  {
    return $this->membershipChanged;
  }
  /**
   * @param ReadReceiptsSettingsUpdatedMetadata
   */
  public function setReadReceiptsSettingsMetadata(ReadReceiptsSettingsUpdatedMetadata $readReceiptsSettingsMetadata)
  {
    $this->readReceiptsSettingsMetadata = $readReceiptsSettingsMetadata;
  }
  /**
   * @return ReadReceiptsSettingsUpdatedMetadata
   */
  public function getReadReceiptsSettingsMetadata()
  {
    return $this->readReceiptsSettingsMetadata;
  }
  /**
   * @param RequiredMessageFeaturesMetadata
   */
  public function setRequiredMessageFeaturesMetadata(RequiredMessageFeaturesMetadata $requiredMessageFeaturesMetadata)
  {
    $this->requiredMessageFeaturesMetadata = $requiredMessageFeaturesMetadata;
  }
  /**
   * @return RequiredMessageFeaturesMetadata
   */
  public function getRequiredMessageFeaturesMetadata()
  {
    return $this->requiredMessageFeaturesMetadata;
  }
  /**
   * @param RoomUpdatedMetadata
   */
  public function setRoomUpdated(RoomUpdatedMetadata $roomUpdated)
  {
    $this->roomUpdated = $roomUpdated;
  }
  /**
   * @return RoomUpdatedMetadata
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
   * @param SlashCommandMetadata
   */
  public function setSlashCommandMetadata(SlashCommandMetadata $slashCommandMetadata)
  {
    $this->slashCommandMetadata = $slashCommandMetadata;
  }
  /**
   * @return SlashCommandMetadata
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
   * @param UploadMetadata
   */
  public function setUploadMetadata(UploadMetadata $uploadMetadata)
  {
    $this->uploadMetadata = $uploadMetadata;
  }
  /**
   * @return UploadMetadata
   */
  public function getUploadMetadata()
  {
    return $this->uploadMetadata;
  }
  /**
   * @param UrlMetadata
   */
  public function setUrlMetadata(UrlMetadata $urlMetadata)
  {
    $this->urlMetadata = $urlMetadata;
  }
  /**
   * @return UrlMetadata
   */
  public function getUrlMetadata()
  {
    return $this->urlMetadata;
  }
  /**
   * @param UserMentionMetadata
   */
  public function setUserMentionMetadata(UserMentionMetadata $userMentionMetadata)
  {
    $this->userMentionMetadata = $userMentionMetadata;
  }
  /**
   * @return UserMentionMetadata
   */
  public function getUserMentionMetadata()
  {
    return $this->userMentionMetadata;
  }
  /**
   * @param VideoCallMetadata
   */
  public function setVideoCallMetadata(VideoCallMetadata $videoCallMetadata)
  {
    $this->videoCallMetadata = $videoCallMetadata;
  }
  /**
   * @return VideoCallMetadata
   */
  public function getVideoCallMetadata()
  {
    return $this->videoCallMetadata;
  }
  /**
   * @param YoutubeMetadata
   */
  public function setYoutubeMetadata(YoutubeMetadata $youtubeMetadata)
  {
    $this->youtubeMetadata = $youtubeMetadata;
  }
  /**
   * @return YoutubeMetadata
   */
  public function getYoutubeMetadata()
  {
    return $this->youtubeMetadata;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Annotation::class, 'Google_Service_CloudSearch_Annotation');
