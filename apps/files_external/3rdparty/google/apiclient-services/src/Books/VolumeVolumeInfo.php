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
  public $allowAnonLogging;
  public $authors;
  public $averageRating;
  public $canonicalVolumeLink;
  public $categories;
  public $comicsContent;
  public $contentVersion;
  public $description;
  protected $dimensionsType = VolumeVolumeInfoDimensions::class;
  protected $dimensionsDataType = '';
  protected $imageLinksType = VolumeVolumeInfoImageLinks::class;
  protected $imageLinksDataType = '';
  protected $industryIdentifiersType = VolumeVolumeInfoIndustryIdentifiers::class;
  protected $industryIdentifiersDataType = 'array';
  public $infoLink;
  public $language;
  public $mainCategory;
  public $maturityRating;
  public $pageCount;
  protected $panelizationSummaryType = VolumeVolumeInfoPanelizationSummary::class;
  protected $panelizationSummaryDataType = '';
  public $previewLink;
  public $printType;
  public $printedPageCount;
  public $publishedDate;
  public $publisher;
  public $ratingsCount;
  protected $readingModesType = VolumeVolumeInfoReadingModes::class;
  protected $readingModesDataType = '';
  public $samplePageCount;
  protected $seriesInfoType = Volumeseriesinfo::class;
  protected $seriesInfoDataType = '';
  public $subtitle;
  public $title;

  public function setAllowAnonLogging($allowAnonLogging)
  {
    $this->allowAnonLogging = $allowAnonLogging;
  }
  public function getAllowAnonLogging()
  {
    return $this->allowAnonLogging;
  }
  public function setAuthors($authors)
  {
    $this->authors = $authors;
  }
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
  public function setCanonicalVolumeLink($canonicalVolumeLink)
  {
    $this->canonicalVolumeLink = $canonicalVolumeLink;
  }
  public function getCanonicalVolumeLink()
  {
    return $this->canonicalVolumeLink;
  }
  public function setCategories($categories)
  {
    $this->categories = $categories;
  }
  public function getCategories()
  {
    return $this->categories;
  }
  public function setComicsContent($comicsContent)
  {
    $this->comicsContent = $comicsContent;
  }
  public function getComicsContent()
  {
    return $this->comicsContent;
  }
  public function setContentVersion($contentVersion)
  {
    $this->contentVersion = $contentVersion;
  }
  public function getContentVersion()
  {
    return $this->contentVersion;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
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
  public function setInfoLink($infoLink)
  {
    $this->infoLink = $infoLink;
  }
  public function getInfoLink()
  {
    return $this->infoLink;
  }
  public function setLanguage($language)
  {
    $this->language = $language;
  }
  public function getLanguage()
  {
    return $this->language;
  }
  public function setMainCategory($mainCategory)
  {
    $this->mainCategory = $mainCategory;
  }
  public function getMainCategory()
  {
    return $this->mainCategory;
  }
  public function setMaturityRating($maturityRating)
  {
    $this->maturityRating = $maturityRating;
  }
  public function getMaturityRating()
  {
    return $this->maturityRating;
  }
  public function setPageCount($pageCount)
  {
    $this->pageCount = $pageCount;
  }
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
  public function setPreviewLink($previewLink)
  {
    $this->previewLink = $previewLink;
  }
  public function getPreviewLink()
  {
    return $this->previewLink;
  }
  public function setPrintType($printType)
  {
    $this->printType = $printType;
  }
  public function getPrintType()
  {
    return $this->printType;
  }
  public function setPrintedPageCount($printedPageCount)
  {
    $this->printedPageCount = $printedPageCount;
  }
  public function getPrintedPageCount()
  {
    return $this->printedPageCount;
  }
  public function setPublishedDate($publishedDate)
  {
    $this->publishedDate = $publishedDate;
  }
  public function getPublishedDate()
  {
    return $this->publishedDate;
  }
  public function setPublisher($publisher)
  {
    $this->publisher = $publisher;
  }
  public function getPublisher()
  {
    return $this->publisher;
  }
  public function setRatingsCount($ratingsCount)
  {
    $this->ratingsCount = $ratingsCount;
  }
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
  public function setSamplePageCount($samplePageCount)
  {
    $this->samplePageCount = $samplePageCount;
  }
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
  public function setSubtitle($subtitle)
  {
    $this->subtitle = $subtitle;
  }
  public function getSubtitle()
  {
    return $this->subtitle;
  }
  public function setTitle($title)
  {
    $this->title = $title;
  }
  public function getTitle()
  {
    return $this->title;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VolumeVolumeInfo::class, 'Google_Service_Books_VolumeVolumeInfo');
