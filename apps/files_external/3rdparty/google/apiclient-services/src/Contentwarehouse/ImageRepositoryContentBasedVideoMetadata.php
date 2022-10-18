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

class ImageRepositoryContentBasedVideoMetadata extends \Google\Collection
{
  protected $collection_key = 'videoPreviews';
  /**
   * @var string
   */
  public $amarnaDocid;
  /**
   * @var string
   */
  public $aresClassificationRequestTimestamp;
  /**
   * @var bool
   */
  public $audioOnly;
  protected $cloudSpeechSignalsType = ImageRepositoryAmarnaCloudSpeechSignals::class;
  protected $cloudSpeechSignalsDataType = '';
  protected $featureSetDataType = DrishtiFeatureSetData::class;
  protected $featureSetDataDataType = '';
  protected $golden7SoapboxSummaryType = DrishtiFeatureSetData::class;
  protected $golden7SoapboxSummaryDataType = '';
  protected $inlinePlaybackType = VideoCrawlVideoInlinePlaybackMetadata::class;
  protected $inlinePlaybackDataType = '';
  protected $languageIdentificationType = VideoTimedtextS4ALIResults::class;
  protected $languageIdentificationDataType = '';
  protected $legosAnnotationDataType = VideoLegosLegosAnnotationsSets::class;
  protected $legosAnnotationDataDataType = '';
  protected $lmsPreviewFramePerdocsType = ImageRepositoryFramePerdocs::class;
  protected $lmsPreviewFramePerdocsDataType = '';
  protected $loudnessDataType = VideoStorageLoudnessData::class;
  protected $loudnessDataDataType = '';
  protected $mediaInfoType = VideoMediaInfo::class;
  protected $mediaInfoDataType = '';
  protected $representativeFrameDataType = ImageData::class;
  protected $representativeFrameDataDataType = '';
  protected $s3LanguageIdentificationType = ImageRepositoryS3LangIdSignals::class;
  protected $s3LanguageIdentificationDataType = '';
  protected $safesearchVideoContentSignalsType = SafesearchVideoContentSignals::class;
  protected $safesearchVideoContentSignalsDataType = '';
  /**
   * @var string
   */
  public $searchDocid;
  protected $signalsBlobType = ImageRepositoryAmarnaSignalsBlob::class;
  protected $signalsBlobDataType = '';
  protected $signalsBlobInfoType = ImageRepositoryAmarnaSignalsBlobInfo::class;
  protected $signalsBlobInfoDataType = '';
  protected $speechPropertiesType = IndexingSpeechSpeechPropertiesProto::class;
  protected $speechPropertiesDataType = '';
  protected $thumbnailQualityScoreType = VideoThumbnailsThumbnailScore::class;
  protected $thumbnailQualityScoreDataType = '';
  protected $thumbnailerDataType = VideoPipelineViperThumbnailerColumnData::class;
  protected $thumbnailerDataDataType = '';
  protected $transcodeMetadataType = ImageRepositoryApiItagSpecificMetadata::class;
  protected $transcodeMetadataDataType = 'array';
  protected $transcriptAsrType = PseudoVideoData::class;
  protected $transcriptAsrDataType = '';
  protected $truncationInfoType = ImageRepositoryFileTruncationInfo::class;
  protected $truncationInfoDataType = '';
  protected $unwantedContentType = ImageRepositoryUnwantedContent::class;
  protected $unwantedContentDataType = '';
  /**
   * @var string
   */
  public $venomId;
  protected $venomProcessingInfoType = ImageRepositoryVenomProcessingInfo::class;
  protected $venomProcessingInfoDataType = '';
  protected $videoAnchorSetType = VideoContentSearchVideoAnchorSets::class;
  protected $videoAnchorSetDataType = '';
  public $videoDurationSec;
  /**
   * @var float
   */
  public $videoPornScore;
  /**
   * @var float
   */
  public $videoPornScoreV4;
  protected $videoPreviewBytesType = ImageRepositoryVideoPreviewsVideoPreview::class;
  protected $videoPreviewBytesDataType = 'array';
  protected $videoPreviewsType = ImageBaseVideoPreviewMetadata::class;
  protected $videoPreviewsDataType = 'array';
  protected $videoStreamInfoType = VideoPipelineViperVSIColumnData::class;
  protected $videoStreamInfoDataType = '';
  protected $videoTranscriptAnnotationsType = QualityWebanswersVideoTranscriptAnnotations::class;
  protected $videoTranscriptAnnotationsDataType = '';
  protected $youtubeProcessingFilterType = ImageRepositoryYoutubeProcessingFilter::class;
  protected $youtubeProcessingFilterDataType = '';

  /**
   * @param string
   */
  public function setAmarnaDocid($amarnaDocid)
  {
    $this->amarnaDocid = $amarnaDocid;
  }
  /**
   * @return string
   */
  public function getAmarnaDocid()
  {
    return $this->amarnaDocid;
  }
  /**
   * @param string
   */
  public function setAresClassificationRequestTimestamp($aresClassificationRequestTimestamp)
  {
    $this->aresClassificationRequestTimestamp = $aresClassificationRequestTimestamp;
  }
  /**
   * @return string
   */
  public function getAresClassificationRequestTimestamp()
  {
    return $this->aresClassificationRequestTimestamp;
  }
  /**
   * @param bool
   */
  public function setAudioOnly($audioOnly)
  {
    $this->audioOnly = $audioOnly;
  }
  /**
   * @return bool
   */
  public function getAudioOnly()
  {
    return $this->audioOnly;
  }
  /**
   * @param ImageRepositoryAmarnaCloudSpeechSignals
   */
  public function setCloudSpeechSignals(ImageRepositoryAmarnaCloudSpeechSignals $cloudSpeechSignals)
  {
    $this->cloudSpeechSignals = $cloudSpeechSignals;
  }
  /**
   * @return ImageRepositoryAmarnaCloudSpeechSignals
   */
  public function getCloudSpeechSignals()
  {
    return $this->cloudSpeechSignals;
  }
  /**
   * @param DrishtiFeatureSetData
   */
  public function setFeatureSetData(DrishtiFeatureSetData $featureSetData)
  {
    $this->featureSetData = $featureSetData;
  }
  /**
   * @return DrishtiFeatureSetData
   */
  public function getFeatureSetData()
  {
    return $this->featureSetData;
  }
  /**
   * @param DrishtiFeatureSetData
   */
  public function setGolden7SoapboxSummary(DrishtiFeatureSetData $golden7SoapboxSummary)
  {
    $this->golden7SoapboxSummary = $golden7SoapboxSummary;
  }
  /**
   * @return DrishtiFeatureSetData
   */
  public function getGolden7SoapboxSummary()
  {
    return $this->golden7SoapboxSummary;
  }
  /**
   * @param VideoCrawlVideoInlinePlaybackMetadata
   */
  public function setInlinePlayback(VideoCrawlVideoInlinePlaybackMetadata $inlinePlayback)
  {
    $this->inlinePlayback = $inlinePlayback;
  }
  /**
   * @return VideoCrawlVideoInlinePlaybackMetadata
   */
  public function getInlinePlayback()
  {
    return $this->inlinePlayback;
  }
  /**
   * @param VideoTimedtextS4ALIResults
   */
  public function setLanguageIdentification(VideoTimedtextS4ALIResults $languageIdentification)
  {
    $this->languageIdentification = $languageIdentification;
  }
  /**
   * @return VideoTimedtextS4ALIResults
   */
  public function getLanguageIdentification()
  {
    return $this->languageIdentification;
  }
  /**
   * @param VideoLegosLegosAnnotationsSets
   */
  public function setLegosAnnotationData(VideoLegosLegosAnnotationsSets $legosAnnotationData)
  {
    $this->legosAnnotationData = $legosAnnotationData;
  }
  /**
   * @return VideoLegosLegosAnnotationsSets
   */
  public function getLegosAnnotationData()
  {
    return $this->legosAnnotationData;
  }
  /**
   * @param ImageRepositoryFramePerdocs
   */
  public function setLmsPreviewFramePerdocs(ImageRepositoryFramePerdocs $lmsPreviewFramePerdocs)
  {
    $this->lmsPreviewFramePerdocs = $lmsPreviewFramePerdocs;
  }
  /**
   * @return ImageRepositoryFramePerdocs
   */
  public function getLmsPreviewFramePerdocs()
  {
    return $this->lmsPreviewFramePerdocs;
  }
  /**
   * @param VideoStorageLoudnessData
   */
  public function setLoudnessData(VideoStorageLoudnessData $loudnessData)
  {
    $this->loudnessData = $loudnessData;
  }
  /**
   * @return VideoStorageLoudnessData
   */
  public function getLoudnessData()
  {
    return $this->loudnessData;
  }
  /**
   * @param VideoMediaInfo
   */
  public function setMediaInfo(VideoMediaInfo $mediaInfo)
  {
    $this->mediaInfo = $mediaInfo;
  }
  /**
   * @return VideoMediaInfo
   */
  public function getMediaInfo()
  {
    return $this->mediaInfo;
  }
  /**
   * @param ImageData
   */
  public function setRepresentativeFrameData(ImageData $representativeFrameData)
  {
    $this->representativeFrameData = $representativeFrameData;
  }
  /**
   * @return ImageData
   */
  public function getRepresentativeFrameData()
  {
    return $this->representativeFrameData;
  }
  /**
   * @param ImageRepositoryS3LangIdSignals
   */
  public function setS3LanguageIdentification(ImageRepositoryS3LangIdSignals $s3LanguageIdentification)
  {
    $this->s3LanguageIdentification = $s3LanguageIdentification;
  }
  /**
   * @return ImageRepositoryS3LangIdSignals
   */
  public function getS3LanguageIdentification()
  {
    return $this->s3LanguageIdentification;
  }
  /**
   * @param SafesearchVideoContentSignals
   */
  public function setSafesearchVideoContentSignals(SafesearchVideoContentSignals $safesearchVideoContentSignals)
  {
    $this->safesearchVideoContentSignals = $safesearchVideoContentSignals;
  }
  /**
   * @return SafesearchVideoContentSignals
   */
  public function getSafesearchVideoContentSignals()
  {
    return $this->safesearchVideoContentSignals;
  }
  /**
   * @param string
   */
  public function setSearchDocid($searchDocid)
  {
    $this->searchDocid = $searchDocid;
  }
  /**
   * @return string
   */
  public function getSearchDocid()
  {
    return $this->searchDocid;
  }
  /**
   * @param ImageRepositoryAmarnaSignalsBlob
   */
  public function setSignalsBlob(ImageRepositoryAmarnaSignalsBlob $signalsBlob)
  {
    $this->signalsBlob = $signalsBlob;
  }
  /**
   * @return ImageRepositoryAmarnaSignalsBlob
   */
  public function getSignalsBlob()
  {
    return $this->signalsBlob;
  }
  /**
   * @param ImageRepositoryAmarnaSignalsBlobInfo
   */
  public function setSignalsBlobInfo(ImageRepositoryAmarnaSignalsBlobInfo $signalsBlobInfo)
  {
    $this->signalsBlobInfo = $signalsBlobInfo;
  }
  /**
   * @return ImageRepositoryAmarnaSignalsBlobInfo
   */
  public function getSignalsBlobInfo()
  {
    return $this->signalsBlobInfo;
  }
  /**
   * @param IndexingSpeechSpeechPropertiesProto
   */
  public function setSpeechProperties(IndexingSpeechSpeechPropertiesProto $speechProperties)
  {
    $this->speechProperties = $speechProperties;
  }
  /**
   * @return IndexingSpeechSpeechPropertiesProto
   */
  public function getSpeechProperties()
  {
    return $this->speechProperties;
  }
  /**
   * @param VideoThumbnailsThumbnailScore
   */
  public function setThumbnailQualityScore(VideoThumbnailsThumbnailScore $thumbnailQualityScore)
  {
    $this->thumbnailQualityScore = $thumbnailQualityScore;
  }
  /**
   * @return VideoThumbnailsThumbnailScore
   */
  public function getThumbnailQualityScore()
  {
    return $this->thumbnailQualityScore;
  }
  /**
   * @param VideoPipelineViperThumbnailerColumnData
   */
  public function setThumbnailerData(VideoPipelineViperThumbnailerColumnData $thumbnailerData)
  {
    $this->thumbnailerData = $thumbnailerData;
  }
  /**
   * @return VideoPipelineViperThumbnailerColumnData
   */
  public function getThumbnailerData()
  {
    return $this->thumbnailerData;
  }
  /**
   * @param ImageRepositoryApiItagSpecificMetadata[]
   */
  public function setTranscodeMetadata($transcodeMetadata)
  {
    $this->transcodeMetadata = $transcodeMetadata;
  }
  /**
   * @return ImageRepositoryApiItagSpecificMetadata[]
   */
  public function getTranscodeMetadata()
  {
    return $this->transcodeMetadata;
  }
  /**
   * @param PseudoVideoData
   */
  public function setTranscriptAsr(PseudoVideoData $transcriptAsr)
  {
    $this->transcriptAsr = $transcriptAsr;
  }
  /**
   * @return PseudoVideoData
   */
  public function getTranscriptAsr()
  {
    return $this->transcriptAsr;
  }
  /**
   * @param ImageRepositoryFileTruncationInfo
   */
  public function setTruncationInfo(ImageRepositoryFileTruncationInfo $truncationInfo)
  {
    $this->truncationInfo = $truncationInfo;
  }
  /**
   * @return ImageRepositoryFileTruncationInfo
   */
  public function getTruncationInfo()
  {
    return $this->truncationInfo;
  }
  /**
   * @param ImageRepositoryUnwantedContent
   */
  public function setUnwantedContent(ImageRepositoryUnwantedContent $unwantedContent)
  {
    $this->unwantedContent = $unwantedContent;
  }
  /**
   * @return ImageRepositoryUnwantedContent
   */
  public function getUnwantedContent()
  {
    return $this->unwantedContent;
  }
  /**
   * @param string
   */
  public function setVenomId($venomId)
  {
    $this->venomId = $venomId;
  }
  /**
   * @return string
   */
  public function getVenomId()
  {
    return $this->venomId;
  }
  /**
   * @param ImageRepositoryVenomProcessingInfo
   */
  public function setVenomProcessingInfo(ImageRepositoryVenomProcessingInfo $venomProcessingInfo)
  {
    $this->venomProcessingInfo = $venomProcessingInfo;
  }
  /**
   * @return ImageRepositoryVenomProcessingInfo
   */
  public function getVenomProcessingInfo()
  {
    return $this->venomProcessingInfo;
  }
  /**
   * @param VideoContentSearchVideoAnchorSets
   */
  public function setVideoAnchorSet(VideoContentSearchVideoAnchorSets $videoAnchorSet)
  {
    $this->videoAnchorSet = $videoAnchorSet;
  }
  /**
   * @return VideoContentSearchVideoAnchorSets
   */
  public function getVideoAnchorSet()
  {
    return $this->videoAnchorSet;
  }
  public function setVideoDurationSec($videoDurationSec)
  {
    $this->videoDurationSec = $videoDurationSec;
  }
  public function getVideoDurationSec()
  {
    return $this->videoDurationSec;
  }
  /**
   * @param float
   */
  public function setVideoPornScore($videoPornScore)
  {
    $this->videoPornScore = $videoPornScore;
  }
  /**
   * @return float
   */
  public function getVideoPornScore()
  {
    return $this->videoPornScore;
  }
  /**
   * @param float
   */
  public function setVideoPornScoreV4($videoPornScoreV4)
  {
    $this->videoPornScoreV4 = $videoPornScoreV4;
  }
  /**
   * @return float
   */
  public function getVideoPornScoreV4()
  {
    return $this->videoPornScoreV4;
  }
  /**
   * @param ImageRepositoryVideoPreviewsVideoPreview[]
   */
  public function setVideoPreviewBytes($videoPreviewBytes)
  {
    $this->videoPreviewBytes = $videoPreviewBytes;
  }
  /**
   * @return ImageRepositoryVideoPreviewsVideoPreview[]
   */
  public function getVideoPreviewBytes()
  {
    return $this->videoPreviewBytes;
  }
  /**
   * @param ImageBaseVideoPreviewMetadata[]
   */
  public function setVideoPreviews($videoPreviews)
  {
    $this->videoPreviews = $videoPreviews;
  }
  /**
   * @return ImageBaseVideoPreviewMetadata[]
   */
  public function getVideoPreviews()
  {
    return $this->videoPreviews;
  }
  /**
   * @param VideoPipelineViperVSIColumnData
   */
  public function setVideoStreamInfo(VideoPipelineViperVSIColumnData $videoStreamInfo)
  {
    $this->videoStreamInfo = $videoStreamInfo;
  }
  /**
   * @return VideoPipelineViperVSIColumnData
   */
  public function getVideoStreamInfo()
  {
    return $this->videoStreamInfo;
  }
  /**
   * @param QualityWebanswersVideoTranscriptAnnotations
   */
  public function setVideoTranscriptAnnotations(QualityWebanswersVideoTranscriptAnnotations $videoTranscriptAnnotations)
  {
    $this->videoTranscriptAnnotations = $videoTranscriptAnnotations;
  }
  /**
   * @return QualityWebanswersVideoTranscriptAnnotations
   */
  public function getVideoTranscriptAnnotations()
  {
    return $this->videoTranscriptAnnotations;
  }
  /**
   * @param ImageRepositoryYoutubeProcessingFilter
   */
  public function setYoutubeProcessingFilter(ImageRepositoryYoutubeProcessingFilter $youtubeProcessingFilter)
  {
    $this->youtubeProcessingFilter = $youtubeProcessingFilter;
  }
  /**
   * @return ImageRepositoryYoutubeProcessingFilter
   */
  public function getYoutubeProcessingFilter()
  {
    return $this->youtubeProcessingFilter;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ImageRepositoryContentBasedVideoMetadata::class, 'Google_Service_Contentwarehouse_ImageRepositoryContentBasedVideoMetadata');
