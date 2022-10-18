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

class OceanDocTag extends \Google\Collection
{
  protected $collection_key = 'grantableLocale';
  protected $internal_gapi_mappings = [
        "dEPRECATEDApplicationDate" => "DEPRECATEDApplicationDate",
        "dEPRECATEDIssueDate" => "DEPRECATEDIssueDate",
        "dEPRECATEDPatentAssignee" => "DEPRECATEDPatentAssignee",
        "dEPRECATEDPatentNumber" => "DEPRECATEDPatentNumber",
        "dEPRECATEDPublisherPercentVisible" => "DEPRECATEDPublisherPercentVisible",
  ];
  /**
   * @var string
   */
  public $dEPRECATEDApplicationDate;
  /**
   * @var string
   */
  public $dEPRECATEDIssueDate;
  /**
   * @var string
   */
  public $dEPRECATEDPatentAssignee;
  /**
   * @var string
   */
  public $dEPRECATEDPatentNumber;
  /**
   * @var int
   */
  public $dEPRECATEDPublisherPercentVisible;
  /**
   * @var string
   */
  public $authors;
  /**
   * @var int
   */
  public $availableDownloads;
  /**
   * @var bool
   */
  public $blockSnippet;
  protected $bookspecificType = OceanDocTagBookSpecific::class;
  protected $bookspecificDataType = '';
  protected $catalogspecificType = OceanDocTagCatalogSpecific::class;
  protected $catalogspecificDataType = '';
  /**
   * @var int
   */
  public $contentType;
  protected $contributorType = OceanDocTagContributor::class;
  protected $contributorDataType = 'array';
  /**
   * @var string
   */
  public $coverPage;
  protected $coverPageSizeType = OceanImageSize::class;
  protected $coverPageSizeDataType = '';
  /**
   * @var string
   */
  public $editors;
  /**
   * @var string
   */
  public $encryptedExpressionId;
  /**
   * @var string
   */
  public $encryptedVolumeId;
  /**
   * @var string[]
   */
  public $geoRestrict;
  /**
   * @var int
   */
  public $goodTextDetail;
  /**
   * @var string[]
   */
  public $grantableLocale;
  /**
   * @var bool
   */
  public $isGeQuality;
  /**
   * @var bool
   */
  public $isLandingPage;
  protected $magazinespecificType = OceanDocTagMagazineSpecific::class;
  protected $magazinespecificDataType = '';
  /**
   * @var bool
   */
  public $metadataCoverExists;
  protected $metadataCoverSizeType = OceanImageSize::class;
  protected $metadataCoverSizeDataType = '';
  protected $newspaperspecificType = OceanDocTagNewspaperSpecific::class;
  protected $newspaperspecificDataType = '';
  /**
   * @var int
   */
  public $numPages;
  /**
   * @var int
   */
  public $objectionableContentBitmap;
  /**
   * @var int
   */
  public $pageNumber;
  /**
   * @var int
   */
  public $pageid;
  public $pagerank;
  protected $patentspecificType = OceanDocTagPatentSpecific::class;
  protected $patentspecificDataType = '';
  protected $priceType = OceanGEPrice::class;
  protected $priceDataType = '';
  /**
   * @var string
   */
  public $printedPageNumber;
  /**
   * @var string
   */
  public $refPageUrl;
  /**
   * @var string
   */
  public $searchInBookUrl;
  /**
   * @var int
   */
  public $segmentTime;
  /**
   * @var int
   */
  public $sourceType;
  /**
   * @var string
   */
  public $structuredPageNumber;
  /**
   * @var string
   */
  public $subTitle;
  /**
   * @var string
   */
  public $subjectBitmap;
  /**
   * @var string
   */
  public $thumbnailUrl;
  /**
   * @var string
   */
  public $title;
  /**
   * @var string
   */
  public $urlKey;
  /**
   * @var bool
   */
  public $usingActualCover;
  protected $viewabilityType = OceanVolumeViewability::class;
  protected $viewabilityDataType = '';
  /**
   * @var int
   */
  public $volumeType;
  /**
   * @var string
   */
  public $volumeVersion;
  protected $workclusterType = OceanDocTagWorkCluster::class;
  protected $workclusterDataType = '';

  /**
   * @param string
   */
  public function setDEPRECATEDApplicationDate($dEPRECATEDApplicationDate)
  {
    $this->dEPRECATEDApplicationDate = $dEPRECATEDApplicationDate;
  }
  /**
   * @return string
   */
  public function getDEPRECATEDApplicationDate()
  {
    return $this->dEPRECATEDApplicationDate;
  }
  /**
   * @param string
   */
  public function setDEPRECATEDIssueDate($dEPRECATEDIssueDate)
  {
    $this->dEPRECATEDIssueDate = $dEPRECATEDIssueDate;
  }
  /**
   * @return string
   */
  public function getDEPRECATEDIssueDate()
  {
    return $this->dEPRECATEDIssueDate;
  }
  /**
   * @param string
   */
  public function setDEPRECATEDPatentAssignee($dEPRECATEDPatentAssignee)
  {
    $this->dEPRECATEDPatentAssignee = $dEPRECATEDPatentAssignee;
  }
  /**
   * @return string
   */
  public function getDEPRECATEDPatentAssignee()
  {
    return $this->dEPRECATEDPatentAssignee;
  }
  /**
   * @param string
   */
  public function setDEPRECATEDPatentNumber($dEPRECATEDPatentNumber)
  {
    $this->dEPRECATEDPatentNumber = $dEPRECATEDPatentNumber;
  }
  /**
   * @return string
   */
  public function getDEPRECATEDPatentNumber()
  {
    return $this->dEPRECATEDPatentNumber;
  }
  /**
   * @param int
   */
  public function setDEPRECATEDPublisherPercentVisible($dEPRECATEDPublisherPercentVisible)
  {
    $this->dEPRECATEDPublisherPercentVisible = $dEPRECATEDPublisherPercentVisible;
  }
  /**
   * @return int
   */
  public function getDEPRECATEDPublisherPercentVisible()
  {
    return $this->dEPRECATEDPublisherPercentVisible;
  }
  /**
   * @param string
   */
  public function setAuthors($authors)
  {
    $this->authors = $authors;
  }
  /**
   * @return string
   */
  public function getAuthors()
  {
    return $this->authors;
  }
  /**
   * @param int
   */
  public function setAvailableDownloads($availableDownloads)
  {
    $this->availableDownloads = $availableDownloads;
  }
  /**
   * @return int
   */
  public function getAvailableDownloads()
  {
    return $this->availableDownloads;
  }
  /**
   * @param bool
   */
  public function setBlockSnippet($blockSnippet)
  {
    $this->blockSnippet = $blockSnippet;
  }
  /**
   * @return bool
   */
  public function getBlockSnippet()
  {
    return $this->blockSnippet;
  }
  /**
   * @param OceanDocTagBookSpecific
   */
  public function setBookspecific(OceanDocTagBookSpecific $bookspecific)
  {
    $this->bookspecific = $bookspecific;
  }
  /**
   * @return OceanDocTagBookSpecific
   */
  public function getBookspecific()
  {
    return $this->bookspecific;
  }
  /**
   * @param OceanDocTagCatalogSpecific
   */
  public function setCatalogspecific(OceanDocTagCatalogSpecific $catalogspecific)
  {
    $this->catalogspecific = $catalogspecific;
  }
  /**
   * @return OceanDocTagCatalogSpecific
   */
  public function getCatalogspecific()
  {
    return $this->catalogspecific;
  }
  /**
   * @param int
   */
  public function setContentType($contentType)
  {
    $this->contentType = $contentType;
  }
  /**
   * @return int
   */
  public function getContentType()
  {
    return $this->contentType;
  }
  /**
   * @param OceanDocTagContributor[]
   */
  public function setContributor($contributor)
  {
    $this->contributor = $contributor;
  }
  /**
   * @return OceanDocTagContributor[]
   */
  public function getContributor()
  {
    return $this->contributor;
  }
  /**
   * @param string
   */
  public function setCoverPage($coverPage)
  {
    $this->coverPage = $coverPage;
  }
  /**
   * @return string
   */
  public function getCoverPage()
  {
    return $this->coverPage;
  }
  /**
   * @param OceanImageSize
   */
  public function setCoverPageSize(OceanImageSize $coverPageSize)
  {
    $this->coverPageSize = $coverPageSize;
  }
  /**
   * @return OceanImageSize
   */
  public function getCoverPageSize()
  {
    return $this->coverPageSize;
  }
  /**
   * @param string
   */
  public function setEditors($editors)
  {
    $this->editors = $editors;
  }
  /**
   * @return string
   */
  public function getEditors()
  {
    return $this->editors;
  }
  /**
   * @param string
   */
  public function setEncryptedExpressionId($encryptedExpressionId)
  {
    $this->encryptedExpressionId = $encryptedExpressionId;
  }
  /**
   * @return string
   */
  public function getEncryptedExpressionId()
  {
    return $this->encryptedExpressionId;
  }
  /**
   * @param string
   */
  public function setEncryptedVolumeId($encryptedVolumeId)
  {
    $this->encryptedVolumeId = $encryptedVolumeId;
  }
  /**
   * @return string
   */
  public function getEncryptedVolumeId()
  {
    return $this->encryptedVolumeId;
  }
  /**
   * @param string[]
   */
  public function setGeoRestrict($geoRestrict)
  {
    $this->geoRestrict = $geoRestrict;
  }
  /**
   * @return string[]
   */
  public function getGeoRestrict()
  {
    return $this->geoRestrict;
  }
  /**
   * @param int
   */
  public function setGoodTextDetail($goodTextDetail)
  {
    $this->goodTextDetail = $goodTextDetail;
  }
  /**
   * @return int
   */
  public function getGoodTextDetail()
  {
    return $this->goodTextDetail;
  }
  /**
   * @param string[]
   */
  public function setGrantableLocale($grantableLocale)
  {
    $this->grantableLocale = $grantableLocale;
  }
  /**
   * @return string[]
   */
  public function getGrantableLocale()
  {
    return $this->grantableLocale;
  }
  /**
   * @param bool
   */
  public function setIsGeQuality($isGeQuality)
  {
    $this->isGeQuality = $isGeQuality;
  }
  /**
   * @return bool
   */
  public function getIsGeQuality()
  {
    return $this->isGeQuality;
  }
  /**
   * @param bool
   */
  public function setIsLandingPage($isLandingPage)
  {
    $this->isLandingPage = $isLandingPage;
  }
  /**
   * @return bool
   */
  public function getIsLandingPage()
  {
    return $this->isLandingPage;
  }
  /**
   * @param OceanDocTagMagazineSpecific
   */
  public function setMagazinespecific(OceanDocTagMagazineSpecific $magazinespecific)
  {
    $this->magazinespecific = $magazinespecific;
  }
  /**
   * @return OceanDocTagMagazineSpecific
   */
  public function getMagazinespecific()
  {
    return $this->magazinespecific;
  }
  /**
   * @param bool
   */
  public function setMetadataCoverExists($metadataCoverExists)
  {
    $this->metadataCoverExists = $metadataCoverExists;
  }
  /**
   * @return bool
   */
  public function getMetadataCoverExists()
  {
    return $this->metadataCoverExists;
  }
  /**
   * @param OceanImageSize
   */
  public function setMetadataCoverSize(OceanImageSize $metadataCoverSize)
  {
    $this->metadataCoverSize = $metadataCoverSize;
  }
  /**
   * @return OceanImageSize
   */
  public function getMetadataCoverSize()
  {
    return $this->metadataCoverSize;
  }
  /**
   * @param OceanDocTagNewspaperSpecific
   */
  public function setNewspaperspecific(OceanDocTagNewspaperSpecific $newspaperspecific)
  {
    $this->newspaperspecific = $newspaperspecific;
  }
  /**
   * @return OceanDocTagNewspaperSpecific
   */
  public function getNewspaperspecific()
  {
    return $this->newspaperspecific;
  }
  /**
   * @param int
   */
  public function setNumPages($numPages)
  {
    $this->numPages = $numPages;
  }
  /**
   * @return int
   */
  public function getNumPages()
  {
    return $this->numPages;
  }
  /**
   * @param int
   */
  public function setObjectionableContentBitmap($objectionableContentBitmap)
  {
    $this->objectionableContentBitmap = $objectionableContentBitmap;
  }
  /**
   * @return int
   */
  public function getObjectionableContentBitmap()
  {
    return $this->objectionableContentBitmap;
  }
  /**
   * @param int
   */
  public function setPageNumber($pageNumber)
  {
    $this->pageNumber = $pageNumber;
  }
  /**
   * @return int
   */
  public function getPageNumber()
  {
    return $this->pageNumber;
  }
  /**
   * @param int
   */
  public function setPageid($pageid)
  {
    $this->pageid = $pageid;
  }
  /**
   * @return int
   */
  public function getPageid()
  {
    return $this->pageid;
  }
  public function setPagerank($pagerank)
  {
    $this->pagerank = $pagerank;
  }
  public function getPagerank()
  {
    return $this->pagerank;
  }
  /**
   * @param OceanDocTagPatentSpecific
   */
  public function setPatentspecific(OceanDocTagPatentSpecific $patentspecific)
  {
    $this->patentspecific = $patentspecific;
  }
  /**
   * @return OceanDocTagPatentSpecific
   */
  public function getPatentspecific()
  {
    return $this->patentspecific;
  }
  /**
   * @param OceanGEPrice
   */
  public function setPrice(OceanGEPrice $price)
  {
    $this->price = $price;
  }
  /**
   * @return OceanGEPrice
   */
  public function getPrice()
  {
    return $this->price;
  }
  /**
   * @param string
   */
  public function setPrintedPageNumber($printedPageNumber)
  {
    $this->printedPageNumber = $printedPageNumber;
  }
  /**
   * @return string
   */
  public function getPrintedPageNumber()
  {
    return $this->printedPageNumber;
  }
  /**
   * @param string
   */
  public function setRefPageUrl($refPageUrl)
  {
    $this->refPageUrl = $refPageUrl;
  }
  /**
   * @return string
   */
  public function getRefPageUrl()
  {
    return $this->refPageUrl;
  }
  /**
   * @param string
   */
  public function setSearchInBookUrl($searchInBookUrl)
  {
    $this->searchInBookUrl = $searchInBookUrl;
  }
  /**
   * @return string
   */
  public function getSearchInBookUrl()
  {
    return $this->searchInBookUrl;
  }
  /**
   * @param int
   */
  public function setSegmentTime($segmentTime)
  {
    $this->segmentTime = $segmentTime;
  }
  /**
   * @return int
   */
  public function getSegmentTime()
  {
    return $this->segmentTime;
  }
  /**
   * @param int
   */
  public function setSourceType($sourceType)
  {
    $this->sourceType = $sourceType;
  }
  /**
   * @return int
   */
  public function getSourceType()
  {
    return $this->sourceType;
  }
  /**
   * @param string
   */
  public function setStructuredPageNumber($structuredPageNumber)
  {
    $this->structuredPageNumber = $structuredPageNumber;
  }
  /**
   * @return string
   */
  public function getStructuredPageNumber()
  {
    return $this->structuredPageNumber;
  }
  /**
   * @param string
   */
  public function setSubTitle($subTitle)
  {
    $this->subTitle = $subTitle;
  }
  /**
   * @return string
   */
  public function getSubTitle()
  {
    return $this->subTitle;
  }
  /**
   * @param string
   */
  public function setSubjectBitmap($subjectBitmap)
  {
    $this->subjectBitmap = $subjectBitmap;
  }
  /**
   * @return string
   */
  public function getSubjectBitmap()
  {
    return $this->subjectBitmap;
  }
  /**
   * @param string
   */
  public function setThumbnailUrl($thumbnailUrl)
  {
    $this->thumbnailUrl = $thumbnailUrl;
  }
  /**
   * @return string
   */
  public function getThumbnailUrl()
  {
    return $this->thumbnailUrl;
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
  /**
   * @param string
   */
  public function setUrlKey($urlKey)
  {
    $this->urlKey = $urlKey;
  }
  /**
   * @return string
   */
  public function getUrlKey()
  {
    return $this->urlKey;
  }
  /**
   * @param bool
   */
  public function setUsingActualCover($usingActualCover)
  {
    $this->usingActualCover = $usingActualCover;
  }
  /**
   * @return bool
   */
  public function getUsingActualCover()
  {
    return $this->usingActualCover;
  }
  /**
   * @param OceanVolumeViewability
   */
  public function setViewability(OceanVolumeViewability $viewability)
  {
    $this->viewability = $viewability;
  }
  /**
   * @return OceanVolumeViewability
   */
  public function getViewability()
  {
    return $this->viewability;
  }
  /**
   * @param int
   */
  public function setVolumeType($volumeType)
  {
    $this->volumeType = $volumeType;
  }
  /**
   * @return int
   */
  public function getVolumeType()
  {
    return $this->volumeType;
  }
  /**
   * @param string
   */
  public function setVolumeVersion($volumeVersion)
  {
    $this->volumeVersion = $volumeVersion;
  }
  /**
   * @return string
   */
  public function getVolumeVersion()
  {
    return $this->volumeVersion;
  }
  /**
   * @param OceanDocTagWorkCluster
   */
  public function setWorkcluster(OceanDocTagWorkCluster $workcluster)
  {
    $this->workcluster = $workcluster;
  }
  /**
   * @return OceanDocTagWorkCluster
   */
  public function getWorkcluster()
  {
    return $this->workcluster;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(OceanDocTag::class, 'Google_Service_Contentwarehouse_OceanDocTag');
