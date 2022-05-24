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

namespace Google\Service\Books;

class VolumeVolumeInfo extends \Google\Collection
{
  protected $collection_key = 'industryIdentifiers';
  /**
   * @var bool
   */
  public $allowAnonLogging;
  /**
   * @var string[]
   */
  public $authors;
  public $averageRating;
  /**
   * @var string
   */
  public $canonicalVolumeLink;
  /**
   * @var string[]
   */
  public $categories;
  /**
   * @var bool
   */
  public $comicsContent;
  /**
   * @var string
   */
  public $contentVersion;
  /**
   * @var string
   */
  public $description;
  protected $dimensionsType = VolumeVolumeInfoDimensions::class;
  protected $dimensionsDataType = '';
  protected $imageLinksType = VolumeVolumeInfoImageLinks::class;
  protected $imageLinksDataType = '';
  protected $industryIdentifiersType = VolumeVolumeInfoIndustryIdentifiers::class;
  protected $industryIdentifiersDataType = 'array';
  /**
   * @var string
   */
  public $infoLink;
  /**
   * @var string
   */
  public $language;
  /**
   * @var string
   */
  public $mainCategory;
  /**
   * @var string
   */
  public $maturityRating;
  /**
   * @var int
   */
  public $pageCount;
  protected $panelizationSummaryType = VolumeVolumeInfoPanelizationSummary::class;
  protected $panelizationSummaryDataType = '';
  /**
   * @var string
   */
  public $previewLink;
  /**
   * @var string
   */
  public $printType;
  /**
   * @var int
   */
  public $printedPageCount;
  /**
   * @var string
   */
  public $publishedDate;
  /**
   * @var string
   */
  public $publisher;
  /**
   * @var int
   */
  public $ratingsCount;
  protected $readingModesType = VolumeVolumeInfoReadingModes::class;
  protected $readingModesDataType = '';
  /**
   * @var int
   */
  public $samplePageCount;
  protected $seriesInfoType = Volumeseriesinfo::class;
  protected $seriesInfoDataType = '';
  /**
   * @var string
   */
  public $subtitle;
  /**
   * @var string
   */
  public $title;

  /**
   * @param bool
   */
  public function setAllowAnonLogging($allowAnonLogging)
  {
    $this->allowAnonLogging = $allowAnonLogging;
  }
  /**
   * @return bool
   */
  public function getAllowAnonLogging()
  {
    return $this->allowAnonLogging;
  }
  /**
   * @param string[]
   */
  public function setAuthors($authors)
  {
    $this->authors = $authors;
  }
  /**
   * @return string[]
   */
  public function getAuthors()
  {
    return $this->authors;
  }
  public function setAverageRating($averageRating)
  {
    $this->averageRating = $averageRating;
  }
  public function getAverageRating()
  {
    return $this->averageRating;
  }
  /**
   * @param string
   */
  public function setCanonicalVolumeLink($canonicalVolumeLink)
  {
    $this->canonicalVolumeLink = $canonicalVolumeLink;
  }
  /**
   * @return string
   */
  public function getCanonicalVolumeLink()
  {
    return $this->canonicalVolumeLink;
  }
  /**
   * @param string[]
   */
  public function setCategories($categories)
  {
    $this->categories = $categories;
  }
  /**
   * @return string[]
   */
  public function getCategories()
  {
    return $this->categories;
  }
  /**
   * @param bool
   */
  public function setComicsContent($comicsContent)
  {
    $this->comicsContent = $comicsContent;
  }
  /**
   * @return bool
   */
  public function getComicsContent()
  {
    return $this->comicsContent;
  }
  /**
   * @param string
   */
  public function setContentVersion($contentVersion)
  {
    $this->contentVersion = $contentVersion;
  }
  /**
   * @return string
   */
  public function getContentVersion()
  {
    return $this->contentVersion;
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
   * @param VolumeVolumeInfoDimensions
   */
  public function setDimensions(VolumeVolumeInfoDimensions $dimensions)
  {
    $this->dimensions = $dimensions;
  }
  /**
   * @return VolumeVolumeInfoDimensions
   */
  public function getDimensions()
  {
    return $this->dimensions;
  }
  /**
   * @param VolumeVolumeInfoImageLinks
   */
  public function setImageLinks(VolumeVolumeInfoImageLinks $imageLinks)
  {
    $this->imageLinks = $imageLinks;
  }
  /**
   * @return VolumeVolumeInfoImageLinks
   */
  public function getImageLinks()
  {
    return $this->imageLinks;
  }
  /**
   * @param VolumeVolumeInfoIndustryIdentifiers[]
   */
  public function setIndustryIdentifiers($industryIdentifiers)
  {
    $this->industryIdentifiers = $industryIdentifiers;
  }
  /**
   * @return VolumeVolumeInfoIndustryIdentifiers[]
   */
  public function getIndustryIdentifiers()
  {
    return $this->industryIdentifiers;
  }
  /**
   * @param string
   */
  public function setInfoLink($infoLink)
  {
    $this->infoLink = $infoLink;
  }
  /**
   * @return string
   */
  public function getInfoLink()
  {
    return $this->infoLink;
  }
  /**
   * @param string
   */
  public function setLanguage($language)
  {
    $this->language = $language;
  }
  /**
   * @return string
   */
  public function getLanguage()
  {
    return $this->language;
  }
  /**
   * @param string
   */
  public function setMainCategory($mainCategory)
  {
    $this->mainCategory = $mainCategory;
  }
  /**
   * @return string
   */
  public function getMainCategory()
  {
    return $this->mainCategory;
  }
  /**
   * @param string
   */
  public function setMaturityRating($maturityRating)
  {
    $this->maturityRating = $maturityRating;
  }
  /**
   * @return string
   */
  public function getMaturityRating()
  {
    return $this->maturityRating;
  }
  /**
   * @param int
   */
  public function setPageCount($pageCount)
  {
    $this->pageCount = $pageCount;
  }
  /**
   * @return int
   */
  public function getPageCount()
  {
    return $this->pageCount;
  }
  /**
   * @param VolumeVolumeInfoPanelizationSummary
   */
  public function setPanelizationSummary(VolumeVolumeInfoPanelizationSummary $panelizationSummary)
  {
    $this->panelizationSummary = $panelizationSummary;
  }
  /**
   * @return VolumeVolumeInfoPanelizationSummary
   */
  public function getPanelizationSummary()
  {
    return $this->panelizationSummary;
  }
  /**
   * @param string
   */
  public function setPreviewLink($previewLink)
  {
    $this->previewLink = $previewLink;
  }
  /**
   * @return string
   */
  public function getPreviewLink()
  {
    return $this->previewLink;
  }
  /**
   * @param string
   */
  public function setPrintType($printType)
  {
    $this->printType = $printType;
  }
  /**
   * @return string
   */
  public function getPrintType()
  {
    return $this->printType;
  }
  /**
   * @param int
   */
  public function setPrintedPageCount($printedPageCount)
  {
    $this->printedPageCount = $printedPageCount;
  }
  /**
   * @return int
   */
  public function getPrintedPageCount()
  {
    return $this->printedPageCount;
  }
  /**
   * @param string
   */
  public function setPublishedDate($publishedDate)
  {
    $this->publishedDate = $publishedDate;
  }
  /**
   * @return string
   */
  public function getPublishedDate()
  {
    return $this->publishedDate;
  }
  /**
   * @param string
   */
  public function setPublisher($publisher)
  {
    $this->publisher = $publisher;
  }
  /**
   * @return string
   */
  public function getPublisher()
  {
    return $this->publisher;
  }
  /**
   * @param int
   */
  public function setRatingsCount($ratingsCount)
  {
    $this->ratingsCount = $ratingsCount;
  }
  /**
   * @return int
   */
  public function getRatingsCount()
  {
    return $this->ratingsCount;
  }
  /**
   * @param VolumeVolumeInfoReadingModes
   */
  public function setReadingModes(VolumeVolumeInfoReadingModes $readingModes)
  {
    $this->readingModes = $readingModes;
  }
  /**
   * @return VolumeVolumeInfoReadingModes
   */
  public function getReadingModes()
  {
    return $this->readingModes;
  }
  /**
   * @param int
   */
  public function setSamplePageCount($samplePageCount)
  {
    $this->samplePageCount = $samplePageCount;
  }
  /**
   * @return int
   */
  public function getSamplePageCount()
  {
    return $this->samplePageCount;
  }
  /**
   * @param Volumeseriesinfo
   */
  public function setSeriesInfo(Volumeseriesinfo $seriesInfo)
  {
    $this->seriesInfo = $seriesInfo;
  }
  /**
   * @return Volumeseriesinfo
   */
  public function getSeriesInfo()
  {
    return $this->seriesInfo;
  }
  /**
   * @param string
   */
  public function setSubtitle($subtitle)
  {
    $this->subtitle = $subtitle;
  }
  /**
   * @return string
   */
  public function getSubtitle()
  {
    return $this->subtitle;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VolumeVolumeInfo::class, 'Google_Service_Books_VolumeVolumeInfo');
