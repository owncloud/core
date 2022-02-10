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

namespace Google\Service\YouTube;

class Video extends \Google\Model
{
  protected $ageGatingType = VideoAgeGating::class;
  protected $ageGatingDataType = '';
  protected $contentDetailsType = VideoContentDetails::class;
  protected $contentDetailsDataType = '';
  /**
   * @var string
   */
  public $etag;
  protected $fileDetailsType = VideoFileDetails::class;
  protected $fileDetailsDataType = '';
  /**
   * @var string
   */
  public $id;
  /**
   * @var string
   */
  public $kind;
  protected $liveStreamingDetailsType = VideoLiveStreamingDetails::class;
  protected $liveStreamingDetailsDataType = '';
  protected $localizationsType = VideoLocalization::class;
  protected $localizationsDataType = 'map';
  protected $monetizationDetailsType = VideoMonetizationDetails::class;
  protected $monetizationDetailsDataType = '';
  protected $playerType = VideoPlayer::class;
  protected $playerDataType = '';
  protected $processingDetailsType = VideoProcessingDetails::class;
  protected $processingDetailsDataType = '';
  protected $projectDetailsType = VideoProjectDetails::class;
  protected $projectDetailsDataType = '';
  protected $recordingDetailsType = VideoRecordingDetails::class;
  protected $recordingDetailsDataType = '';
  protected $snippetType = VideoSnippet::class;
  protected $snippetDataType = '';
  protected $statisticsType = VideoStatistics::class;
  protected $statisticsDataType = '';
  protected $statusType = VideoStatus::class;
  protected $statusDataType = '';
  protected $suggestionsType = VideoSuggestions::class;
  protected $suggestionsDataType = '';
  protected $topicDetailsType = VideoTopicDetails::class;
  protected $topicDetailsDataType = '';

  /**
   * @param VideoAgeGating
   */
  public function setAgeGating(VideoAgeGating $ageGating)
  {
    $this->ageGating = $ageGating;
  }
  /**
   * @return VideoAgeGating
   */
  public function getAgeGating()
  {
    return $this->ageGating;
  }
  /**
   * @param VideoContentDetails
   */
  public function setContentDetails(VideoContentDetails $contentDetails)
  {
    $this->contentDetails = $contentDetails;
  }
  /**
   * @return VideoContentDetails
   */
  public function getContentDetails()
  {
    return $this->contentDetails;
  }
  /**
   * @param string
   */
  public function setEtag($etag)
  {
    $this->etag = $etag;
  }
  /**
   * @return string
   */
  public function getEtag()
  {
    return $this->etag;
  }
  /**
   * @param VideoFileDetails
   */
  public function setFileDetails(VideoFileDetails $fileDetails)
  {
    $this->fileDetails = $fileDetails;
  }
  /**
   * @return VideoFileDetails
   */
  public function getFileDetails()
  {
    return $this->fileDetails;
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
   * @param string
   */
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  /**
   * @return string
   */
  public function getKind()
  {
    return $this->kind;
  }
  /**
   * @param VideoLiveStreamingDetails
   */
  public function setLiveStreamingDetails(VideoLiveStreamingDetails $liveStreamingDetails)
  {
    $this->liveStreamingDetails = $liveStreamingDetails;
  }
  /**
   * @return VideoLiveStreamingDetails
   */
  public function getLiveStreamingDetails()
  {
    return $this->liveStreamingDetails;
  }
  /**
   * @param VideoLocalization[]
   */
  public function setLocalizations($localizations)
  {
    $this->localizations = $localizations;
  }
  /**
   * @return VideoLocalization[]
   */
  public function getLocalizations()
  {
    return $this->localizations;
  }
  /**
   * @param VideoMonetizationDetails
   */
  public function setMonetizationDetails(VideoMonetizationDetails $monetizationDetails)
  {
    $this->monetizationDetails = $monetizationDetails;
  }
  /**
   * @return VideoMonetizationDetails
   */
  public function getMonetizationDetails()
  {
    return $this->monetizationDetails;
  }
  /**
   * @param VideoPlayer
   */
  public function setPlayer(VideoPlayer $player)
  {
    $this->player = $player;
  }
  /**
   * @return VideoPlayer
   */
  public function getPlayer()
  {
    return $this->player;
  }
  /**
   * @param VideoProcessingDetails
   */
  public function setProcessingDetails(VideoProcessingDetails $processingDetails)
  {
    $this->processingDetails = $processingDetails;
  }
  /**
   * @return VideoProcessingDetails
   */
  public function getProcessingDetails()
  {
    return $this->processingDetails;
  }
  /**
   * @param VideoProjectDetails
   */
  public function setProjectDetails(VideoProjectDetails $projectDetails)
  {
    $this->projectDetails = $projectDetails;
  }
  /**
   * @return VideoProjectDetails
   */
  public function getProjectDetails()
  {
    return $this->projectDetails;
  }
  /**
   * @param VideoRecordingDetails
   */
  public function setRecordingDetails(VideoRecordingDetails $recordingDetails)
  {
    $this->recordingDetails = $recordingDetails;
  }
  /**
   * @return VideoRecordingDetails
   */
  public function getRecordingDetails()
  {
    return $this->recordingDetails;
  }
  /**
   * @param VideoSnippet
   */
  public function setSnippet(VideoSnippet $snippet)
  {
    $this->snippet = $snippet;
  }
  /**
   * @return VideoSnippet
   */
  public function getSnippet()
  {
    return $this->snippet;
  }
  /**
   * @param VideoStatistics
   */
  public function setStatistics(VideoStatistics $statistics)
  {
    $this->statistics = $statistics;
  }
  /**
   * @return VideoStatistics
   */
  public function getStatistics()
  {
    return $this->statistics;
  }
  /**
   * @param VideoStatus
   */
  public function setStatus(VideoStatus $status)
  {
    $this->status = $status;
  }
  /**
   * @return VideoStatus
   */
  public function getStatus()
  {
    return $this->status;
  }
  /**
   * @param VideoSuggestions
   */
  public function setSuggestions(VideoSuggestions $suggestions)
  {
    $this->suggestions = $suggestions;
  }
  /**
   * @return VideoSuggestions
   */
  public function getSuggestions()
  {
    return $this->suggestions;
  }
  /**
   * @param VideoTopicDetails
   */
  public function setTopicDetails(VideoTopicDetails $topicDetails)
  {
    $this->topicDetails = $topicDetails;
  }
  /**
   * @return VideoTopicDetails
   */
  public function getTopicDetails()
  {
    return $this->topicDetails;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Video::class, 'Google_Service_YouTube_Video');
