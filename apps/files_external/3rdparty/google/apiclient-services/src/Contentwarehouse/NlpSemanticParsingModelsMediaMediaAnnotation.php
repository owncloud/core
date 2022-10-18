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

class NlpSemanticParsingModelsMediaMediaAnnotation extends \Google\Collection
{
  protected $collection_key = 'providerInfo';
  /**
   * @var string
   */
  public $artistName;
  protected $audiobookInfoType = NlpSemanticParsingModelsMediaAudiobookInfo::class;
  protected $audiobookInfoDataType = '';
  /**
   * @var string
   */
  public $contentType;
  protected $imageType = AssistantApiCoreTypesImage::class;
  protected $imageDataType = 'array';
  /**
   * @var string
   */
  public $name;
  protected $newsInfoType = NlpSemanticParsingModelsMediaNewsInfo::class;
  protected $newsInfoDataType = '';
  /**
   * @var string
   */
  public $personalDataIngestionEngine;
  /**
   * @var string
   */
  public $playlistVisibility;
  protected $podcastInfoType = NlpSemanticParsingModelsMediaPodcastInfo::class;
  protected $podcastInfoDataType = '';
  /**
   * @var string
   */
  public $primaryEntityMid;
  protected $providerInfoType = NlpSemanticParsingModelsMediaMediaProviderInfo::class;
  protected $providerInfoDataType = 'array';
  protected $purchaseInfoType = NlpSemanticParsingModelsMediaPurchaseInfo::class;
  protected $purchaseInfoDataType = '';
  protected $radioInfoType = NlpSemanticParsingModelsMediaRadioInfo::class;
  protected $radioInfoDataType = '';
  protected $rentalInfoType = NlpSemanticParsingModelsMediaRentalInfo::class;
  protected $rentalInfoDataType = '';
  /**
   * @var string
   */
  public $source;
  protected $youtubePlaylistInfoType = NlpSemanticParsingModelsMediaYouTubePlaylistInfo::class;
  protected $youtubePlaylistInfoDataType = '';

  /**
   * @param string
   */
  public function setArtistName($artistName)
  {
    $this->artistName = $artistName;
  }
  /**
   * @return string
   */
  public function getArtistName()
  {
    return $this->artistName;
  }
  /**
   * @param NlpSemanticParsingModelsMediaAudiobookInfo
   */
  public function setAudiobookInfo(NlpSemanticParsingModelsMediaAudiobookInfo $audiobookInfo)
  {
    $this->audiobookInfo = $audiobookInfo;
  }
  /**
   * @return NlpSemanticParsingModelsMediaAudiobookInfo
   */
  public function getAudiobookInfo()
  {
    return $this->audiobookInfo;
  }
  /**
   * @param string
   */
  public function setContentType($contentType)
  {
    $this->contentType = $contentType;
  }
  /**
   * @return string
   */
  public function getContentType()
  {
    return $this->contentType;
  }
  /**
   * @param AssistantApiCoreTypesImage[]
   */
  public function setImage($image)
  {
    $this->image = $image;
  }
  /**
   * @return AssistantApiCoreTypesImage[]
   */
  public function getImage()
  {
    return $this->image;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param NlpSemanticParsingModelsMediaNewsInfo
   */
  public function setNewsInfo(NlpSemanticParsingModelsMediaNewsInfo $newsInfo)
  {
    $this->newsInfo = $newsInfo;
  }
  /**
   * @return NlpSemanticParsingModelsMediaNewsInfo
   */
  public function getNewsInfo()
  {
    return $this->newsInfo;
  }
  /**
   * @param string
   */
  public function setPersonalDataIngestionEngine($personalDataIngestionEngine)
  {
    $this->personalDataIngestionEngine = $personalDataIngestionEngine;
  }
  /**
   * @return string
   */
  public function getPersonalDataIngestionEngine()
  {
    return $this->personalDataIngestionEngine;
  }
  /**
   * @param string
   */
  public function setPlaylistVisibility($playlistVisibility)
  {
    $this->playlistVisibility = $playlistVisibility;
  }
  /**
   * @return string
   */
  public function getPlaylistVisibility()
  {
    return $this->playlistVisibility;
  }
  /**
   * @param NlpSemanticParsingModelsMediaPodcastInfo
   */
  public function setPodcastInfo(NlpSemanticParsingModelsMediaPodcastInfo $podcastInfo)
  {
    $this->podcastInfo = $podcastInfo;
  }
  /**
   * @return NlpSemanticParsingModelsMediaPodcastInfo
   */
  public function getPodcastInfo()
  {
    return $this->podcastInfo;
  }
  /**
   * @param string
   */
  public function setPrimaryEntityMid($primaryEntityMid)
  {
    $this->primaryEntityMid = $primaryEntityMid;
  }
  /**
   * @return string
   */
  public function getPrimaryEntityMid()
  {
    return $this->primaryEntityMid;
  }
  /**
   * @param NlpSemanticParsingModelsMediaMediaProviderInfo[]
   */
  public function setProviderInfo($providerInfo)
  {
    $this->providerInfo = $providerInfo;
  }
  /**
   * @return NlpSemanticParsingModelsMediaMediaProviderInfo[]
   */
  public function getProviderInfo()
  {
    return $this->providerInfo;
  }
  /**
   * @param NlpSemanticParsingModelsMediaPurchaseInfo
   */
  public function setPurchaseInfo(NlpSemanticParsingModelsMediaPurchaseInfo $purchaseInfo)
  {
    $this->purchaseInfo = $purchaseInfo;
  }
  /**
   * @return NlpSemanticParsingModelsMediaPurchaseInfo
   */
  public function getPurchaseInfo()
  {
    return $this->purchaseInfo;
  }
  /**
   * @param NlpSemanticParsingModelsMediaRadioInfo
   */
  public function setRadioInfo(NlpSemanticParsingModelsMediaRadioInfo $radioInfo)
  {
    $this->radioInfo = $radioInfo;
  }
  /**
   * @return NlpSemanticParsingModelsMediaRadioInfo
   */
  public function getRadioInfo()
  {
    return $this->radioInfo;
  }
  /**
   * @param NlpSemanticParsingModelsMediaRentalInfo
   */
  public function setRentalInfo(NlpSemanticParsingModelsMediaRentalInfo $rentalInfo)
  {
    $this->rentalInfo = $rentalInfo;
  }
  /**
   * @return NlpSemanticParsingModelsMediaRentalInfo
   */
  public function getRentalInfo()
  {
    return $this->rentalInfo;
  }
  /**
   * @param string
   */
  public function setSource($source)
  {
    $this->source = $source;
  }
  /**
   * @return string
   */
  public function getSource()
  {
    return $this->source;
  }
  /**
   * @param NlpSemanticParsingModelsMediaYouTubePlaylistInfo
   */
  public function setYoutubePlaylistInfo(NlpSemanticParsingModelsMediaYouTubePlaylistInfo $youtubePlaylistInfo)
  {
    $this->youtubePlaylistInfo = $youtubePlaylistInfo;
  }
  /**
   * @return NlpSemanticParsingModelsMediaYouTubePlaylistInfo
   */
  public function getYoutubePlaylistInfo()
  {
    return $this->youtubePlaylistInfo;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NlpSemanticParsingModelsMediaMediaAnnotation::class, 'Google_Service_Contentwarehouse_NlpSemanticParsingModelsMediaMediaAnnotation');
