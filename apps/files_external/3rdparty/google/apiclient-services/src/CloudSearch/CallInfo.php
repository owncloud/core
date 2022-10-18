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

class CallInfo extends \Google\Collection
{
  protected $collection_key = 'youTubeBroadcastSessionInfos';
  protected $abuseReportingConfigType = AbuseReportingConfig::class;
  protected $abuseReportingConfigDataType = '';
  protected $artifactOwnerType = UserDisplayInfo::class;
  protected $artifactOwnerDataType = '';
  protected $attachedDocumentsType = DocumentInfo::class;
  protected $attachedDocumentsDataType = 'array';
  protected $availableReactionsType = ReactionInfo::class;
  protected $availableReactionsDataType = 'array';
  protected $broadcastSessionInfoType = BroadcastSessionInfo::class;
  protected $broadcastSessionInfoDataType = '';
  /**
   * @var string
   */
  public $calendarEventId;
  protected $chatConfigType = ChatConfig::class;
  protected $chatConfigDataType = '';
  protected $coActivityType = CoActivity::class;
  protected $coActivityDataType = '';
  protected $collaborationType = Collaboration::class;
  protected $collaborationDataType = '';
  protected $cseInfoType = CseInfo::class;
  protected $cseInfoDataType = '';
  /**
   * @var int
   */
  public $maxJoinedDevices;
  /**
   * @var string
   */
  public $mediaBackendInfo;
  /**
   * @var string
   */
  public $organizationName;
  protected $paygateInfoType = PaygateInfo::class;
  protected $paygateInfoDataType = '';
  protected $presenterType = Presenter::class;
  protected $presenterDataType = '';
  protected $recordingInfoType = RecordingInfo::class;
  protected $recordingInfoDataType = '';
  protected $recordingSessionInfoType = RecordingSessionInfo::class;
  protected $recordingSessionInfoDataType = '';
  protected $settingsType = CallSettings::class;
  protected $settingsDataType = '';
  protected $streamingSessionsType = StreamingSessionInfo::class;
  protected $streamingSessionsDataType = 'array';
  protected $transcriptionSessionInfoType = TranscriptionSessionInfo::class;
  protected $transcriptionSessionInfoDataType = '';
  /**
   * @var int
   */
  public $viewerCount;
  protected $youTubeBroadcastSessionInfosType = YouTubeBroadcastSessionInfo::class;
  protected $youTubeBroadcastSessionInfosDataType = 'array';

  /**
   * @param AbuseReportingConfig
   */
  public function setAbuseReportingConfig(AbuseReportingConfig $abuseReportingConfig)
  {
    $this->abuseReportingConfig = $abuseReportingConfig;
  }
  /**
   * @return AbuseReportingConfig
   */
  public function getAbuseReportingConfig()
  {
    return $this->abuseReportingConfig;
  }
  /**
   * @param UserDisplayInfo
   */
  public function setArtifactOwner(UserDisplayInfo $artifactOwner)
  {
    $this->artifactOwner = $artifactOwner;
  }
  /**
   * @return UserDisplayInfo
   */
  public function getArtifactOwner()
  {
    return $this->artifactOwner;
  }
  /**
   * @param DocumentInfo[]
   */
  public function setAttachedDocuments($attachedDocuments)
  {
    $this->attachedDocuments = $attachedDocuments;
  }
  /**
   * @return DocumentInfo[]
   */
  public function getAttachedDocuments()
  {
    return $this->attachedDocuments;
  }
  /**
   * @param ReactionInfo[]
   */
  public function setAvailableReactions($availableReactions)
  {
    $this->availableReactions = $availableReactions;
  }
  /**
   * @return ReactionInfo[]
   */
  public function getAvailableReactions()
  {
    return $this->availableReactions;
  }
  /**
   * @param BroadcastSessionInfo
   */
  public function setBroadcastSessionInfo(BroadcastSessionInfo $broadcastSessionInfo)
  {
    $this->broadcastSessionInfo = $broadcastSessionInfo;
  }
  /**
   * @return BroadcastSessionInfo
   */
  public function getBroadcastSessionInfo()
  {
    return $this->broadcastSessionInfo;
  }
  /**
   * @param string
   */
  public function setCalendarEventId($calendarEventId)
  {
    $this->calendarEventId = $calendarEventId;
  }
  /**
   * @return string
   */
  public function getCalendarEventId()
  {
    return $this->calendarEventId;
  }
  /**
   * @param ChatConfig
   */
  public function setChatConfig(ChatConfig $chatConfig)
  {
    $this->chatConfig = $chatConfig;
  }
  /**
   * @return ChatConfig
   */
  public function getChatConfig()
  {
    return $this->chatConfig;
  }
  /**
   * @param CoActivity
   */
  public function setCoActivity(CoActivity $coActivity)
  {
    $this->coActivity = $coActivity;
  }
  /**
   * @return CoActivity
   */
  public function getCoActivity()
  {
    return $this->coActivity;
  }
  /**
   * @param Collaboration
   */
  public function setCollaboration(Collaboration $collaboration)
  {
    $this->collaboration = $collaboration;
  }
  /**
   * @return Collaboration
   */
  public function getCollaboration()
  {
    return $this->collaboration;
  }
  /**
   * @param CseInfo
   */
  public function setCseInfo(CseInfo $cseInfo)
  {
    $this->cseInfo = $cseInfo;
  }
  /**
   * @return CseInfo
   */
  public function getCseInfo()
  {
    return $this->cseInfo;
  }
  /**
   * @param int
   */
  public function setMaxJoinedDevices($maxJoinedDevices)
  {
    $this->maxJoinedDevices = $maxJoinedDevices;
  }
  /**
   * @return int
   */
  public function getMaxJoinedDevices()
  {
    return $this->maxJoinedDevices;
  }
  /**
   * @param string
   */
  public function setMediaBackendInfo($mediaBackendInfo)
  {
    $this->mediaBackendInfo = $mediaBackendInfo;
  }
  /**
   * @return string
   */
  public function getMediaBackendInfo()
  {
    return $this->mediaBackendInfo;
  }
  /**
   * @param string
   */
  public function setOrganizationName($organizationName)
  {
    $this->organizationName = $organizationName;
  }
  /**
   * @return string
   */
  public function getOrganizationName()
  {
    return $this->organizationName;
  }
  /**
   * @param PaygateInfo
   */
  public function setPaygateInfo(PaygateInfo $paygateInfo)
  {
    $this->paygateInfo = $paygateInfo;
  }
  /**
   * @return PaygateInfo
   */
  public function getPaygateInfo()
  {
    return $this->paygateInfo;
  }
  /**
   * @param Presenter
   */
  public function setPresenter(Presenter $presenter)
  {
    $this->presenter = $presenter;
  }
  /**
   * @return Presenter
   */
  public function getPresenter()
  {
    return $this->presenter;
  }
  /**
   * @param RecordingInfo
   */
  public function setRecordingInfo(RecordingInfo $recordingInfo)
  {
    $this->recordingInfo = $recordingInfo;
  }
  /**
   * @return RecordingInfo
   */
  public function getRecordingInfo()
  {
    return $this->recordingInfo;
  }
  /**
   * @param RecordingSessionInfo
   */
  public function setRecordingSessionInfo(RecordingSessionInfo $recordingSessionInfo)
  {
    $this->recordingSessionInfo = $recordingSessionInfo;
  }
  /**
   * @return RecordingSessionInfo
   */
  public function getRecordingSessionInfo()
  {
    return $this->recordingSessionInfo;
  }
  /**
   * @param CallSettings
   */
  public function setSettings(CallSettings $settings)
  {
    $this->settings = $settings;
  }
  /**
   * @return CallSettings
   */
  public function getSettings()
  {
    return $this->settings;
  }
  /**
   * @param StreamingSessionInfo[]
   */
  public function setStreamingSessions($streamingSessions)
  {
    $this->streamingSessions = $streamingSessions;
  }
  /**
   * @return StreamingSessionInfo[]
   */
  public function getStreamingSessions()
  {
    return $this->streamingSessions;
  }
  /**
   * @param TranscriptionSessionInfo
   */
  public function setTranscriptionSessionInfo(TranscriptionSessionInfo $transcriptionSessionInfo)
  {
    $this->transcriptionSessionInfo = $transcriptionSessionInfo;
  }
  /**
   * @return TranscriptionSessionInfo
   */
  public function getTranscriptionSessionInfo()
  {
    return $this->transcriptionSessionInfo;
  }
  /**
   * @param int
   */
  public function setViewerCount($viewerCount)
  {
    $this->viewerCount = $viewerCount;
  }
  /**
   * @return int
   */
  public function getViewerCount()
  {
    return $this->viewerCount;
  }
  /**
   * @param YouTubeBroadcastSessionInfo[]
   */
  public function setYouTubeBroadcastSessionInfos($youTubeBroadcastSessionInfos)
  {
    $this->youTubeBroadcastSessionInfos = $youTubeBroadcastSessionInfos;
  }
  /**
   * @return YouTubeBroadcastSessionInfo[]
   */
  public function getYouTubeBroadcastSessionInfos()
  {
    return $this->youTubeBroadcastSessionInfos;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CallInfo::class, 'Google_Service_CloudSearch_CallInfo');
