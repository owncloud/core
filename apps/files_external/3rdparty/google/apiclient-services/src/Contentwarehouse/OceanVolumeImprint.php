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

class OceanVolumeImprint extends \Google\Model
{
  protected $accessRightsType = OceanVolumeAccessRights::class;
  protected $accessRightsDataType = '';
  /**
   * @var string
   */
  public $adsId;
  /**
   * @var bool
   */
  public $allowAddingFrontmatterToPreview;
  /**
   * @var bool
   */
  public $allowContinuousBrowse;
  /**
   * @var bool
   */
  public $allowRetailSyndication;
  /**
   * @var string
   */
  public $author;
  /**
   * @var string
   */
  public $bibkey;
  /**
   * @var string
   */
  public $buyTheBookText;
  /**
   * @var string
   */
  public $buyTheBookUrl;
  /**
   * @var bool
   */
  public $canDownloadEpub;
  /**
   * @var bool
   */
  public $canDownloadPdf;
  /**
   * @var bool
   */
  public $canShowLibraryLinks;
  /**
   * @var bool
   */
  public $canUseMetadataCover;
  /**
   * @var bool
   */
  public $disableOtherBuyTheBookLinks;
  protected $displayDetailsType = OceanVolumeDisplayDetails::class;
  protected $displayDetailsDataType = '';
  /**
   * @var string
   */
  public $geBibkey;
  /**
   * @var string
   */
  public $imprintId;
  /**
   * @var string
   */
  public $imprintName;
  /**
   * @var string
   */
  public $imprintUrl;
  /**
   * @var int
   */
  public $logoHeight;
  /**
   * @var string
   */
  public $logoLocation;
  /**
   * @var int
   */
  public $logoWidth;
  /**
   * @var int
   */
  public $percentBookShown;
  /**
   * @var string
   */
  public $promotionalText;
  /**
   * @var string
   */
  public $promotionalUrl;
  /**
   * @var string
   */
  public $publishedImprintName;
  /**
   * @var string
   */
  public $pviRowid;
  /**
   * @var string
   */
  public $title;
  /**
   * @var bool
   */
  public $useBibdata;
  /**
   * @var string
   */
  public $verticalType;

  /**
   * @param OceanVolumeAccessRights
   */
  public function setAccessRights(OceanVolumeAccessRights $accessRights)
  {
    $this->accessRights = $accessRights;
  }
  /**
   * @return OceanVolumeAccessRights
   */
  public function getAccessRights()
  {
    return $this->accessRights;
  }
  /**
   * @param string
   */
  public function setAdsId($adsId)
  {
    $this->adsId = $adsId;
  }
  /**
   * @return string
   */
  public function getAdsId()
  {
    return $this->adsId;
  }
  /**
   * @param bool
   */
  public function setAllowAddingFrontmatterToPreview($allowAddingFrontmatterToPreview)
  {
    $this->allowAddingFrontmatterToPreview = $allowAddingFrontmatterToPreview;
  }
  /**
   * @return bool
   */
  public function getAllowAddingFrontmatterToPreview()
  {
    return $this->allowAddingFrontmatterToPreview;
  }
  /**
   * @param bool
   */
  public function setAllowContinuousBrowse($allowContinuousBrowse)
  {
    $this->allowContinuousBrowse = $allowContinuousBrowse;
  }
  /**
   * @return bool
   */
  public function getAllowContinuousBrowse()
  {
    return $this->allowContinuousBrowse;
  }
  /**
   * @param bool
   */
  public function setAllowRetailSyndication($allowRetailSyndication)
  {
    $this->allowRetailSyndication = $allowRetailSyndication;
  }
  /**
   * @return bool
   */
  public function getAllowRetailSyndication()
  {
    return $this->allowRetailSyndication;
  }
  /**
   * @param string
   */
  public function setAuthor($author)
  {
    $this->author = $author;
  }
  /**
   * @return string
   */
  public function getAuthor()
  {
    return $this->author;
  }
  /**
   * @param string
   */
  public function setBibkey($bibkey)
  {
    $this->bibkey = $bibkey;
  }
  /**
   * @return string
   */
  public function getBibkey()
  {
    return $this->bibkey;
  }
  /**
   * @param string
   */
  public function setBuyTheBookText($buyTheBookText)
  {
    $this->buyTheBookText = $buyTheBookText;
  }
  /**
   * @return string
   */
  public function getBuyTheBookText()
  {
    return $this->buyTheBookText;
  }
  /**
   * @param string
   */
  public function setBuyTheBookUrl($buyTheBookUrl)
  {
    $this->buyTheBookUrl = $buyTheBookUrl;
  }
  /**
   * @return string
   */
  public function getBuyTheBookUrl()
  {
    return $this->buyTheBookUrl;
  }
  /**
   * @param bool
   */
  public function setCanDownloadEpub($canDownloadEpub)
  {
    $this->canDownloadEpub = $canDownloadEpub;
  }
  /**
   * @return bool
   */
  public function getCanDownloadEpub()
  {
    return $this->canDownloadEpub;
  }
  /**
   * @param bool
   */
  public function setCanDownloadPdf($canDownloadPdf)
  {
    $this->canDownloadPdf = $canDownloadPdf;
  }
  /**
   * @return bool
   */
  public function getCanDownloadPdf()
  {
    return $this->canDownloadPdf;
  }
  /**
   * @param bool
   */
  public function setCanShowLibraryLinks($canShowLibraryLinks)
  {
    $this->canShowLibraryLinks = $canShowLibraryLinks;
  }
  /**
   * @return bool
   */
  public function getCanShowLibraryLinks()
  {
    return $this->canShowLibraryLinks;
  }
  /**
   * @param bool
   */
  public function setCanUseMetadataCover($canUseMetadataCover)
  {
    $this->canUseMetadataCover = $canUseMetadataCover;
  }
  /**
   * @return bool
   */
  public function getCanUseMetadataCover()
  {
    return $this->canUseMetadataCover;
  }
  /**
   * @param bool
   */
  public function setDisableOtherBuyTheBookLinks($disableOtherBuyTheBookLinks)
  {
    $this->disableOtherBuyTheBookLinks = $disableOtherBuyTheBookLinks;
  }
  /**
   * @return bool
   */
  public function getDisableOtherBuyTheBookLinks()
  {
    return $this->disableOtherBuyTheBookLinks;
  }
  /**
   * @param OceanVolumeDisplayDetails
   */
  public function setDisplayDetails(OceanVolumeDisplayDetails $displayDetails)
  {
    $this->displayDetails = $displayDetails;
  }
  /**
   * @return OceanVolumeDisplayDetails
   */
  public function getDisplayDetails()
  {
    return $this->displayDetails;
  }
  /**
   * @param string
   */
  public function setGeBibkey($geBibkey)
  {
    $this->geBibkey = $geBibkey;
  }
  /**
   * @return string
   */
  public function getGeBibkey()
  {
    return $this->geBibkey;
  }
  /**
   * @param string
   */
  public function setImprintId($imprintId)
  {
    $this->imprintId = $imprintId;
  }
  /**
   * @return string
   */
  public function getImprintId()
  {
    return $this->imprintId;
  }
  /**
   * @param string
   */
  public function setImprintName($imprintName)
  {
    $this->imprintName = $imprintName;
  }
  /**
   * @return string
   */
  public function getImprintName()
  {
    return $this->imprintName;
  }
  /**
   * @param string
   */
  public function setImprintUrl($imprintUrl)
  {
    $this->imprintUrl = $imprintUrl;
  }
  /**
   * @return string
   */
  public function getImprintUrl()
  {
    return $this->imprintUrl;
  }
  /**
   * @param int
   */
  public function setLogoHeight($logoHeight)
  {
    $this->logoHeight = $logoHeight;
  }
  /**
   * @return int
   */
  public function getLogoHeight()
  {
    return $this->logoHeight;
  }
  /**
   * @param string
   */
  public function setLogoLocation($logoLocation)
  {
    $this->logoLocation = $logoLocation;
  }
  /**
   * @return string
   */
  public function getLogoLocation()
  {
    return $this->logoLocation;
  }
  /**
   * @param int
   */
  public function setLogoWidth($logoWidth)
  {
    $this->logoWidth = $logoWidth;
  }
  /**
   * @return int
   */
  public function getLogoWidth()
  {
    return $this->logoWidth;
  }
  /**
   * @param int
   */
  public function setPercentBookShown($percentBookShown)
  {
    $this->percentBookShown = $percentBookShown;
  }
  /**
   * @return int
   */
  public function getPercentBookShown()
  {
    return $this->percentBookShown;
  }
  /**
   * @param string
   */
  public function setPromotionalText($promotionalText)
  {
    $this->promotionalText = $promotionalText;
  }
  /**
   * @return string
   */
  public function getPromotionalText()
  {
    return $this->promotionalText;
  }
  /**
   * @param string
   */
  public function setPromotionalUrl($promotionalUrl)
  {
    $this->promotionalUrl = $promotionalUrl;
  }
  /**
   * @return string
   */
  public function getPromotionalUrl()
  {
    return $this->promotionalUrl;
  }
  /**
   * @param string
   */
  public function setPublishedImprintName($publishedImprintName)
  {
    $this->publishedImprintName = $publishedImprintName;
  }
  /**
   * @return string
   */
  public function getPublishedImprintName()
  {
    return $this->publishedImprintName;
  }
  /**
   * @param string
   */
  public function setPviRowid($pviRowid)
  {
    $this->pviRowid = $pviRowid;
  }
  /**
   * @return string
   */
  public function getPviRowid()
  {
    return $this->pviRowid;
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
   * @param bool
   */
  public function setUseBibdata($useBibdata)
  {
    $this->useBibdata = $useBibdata;
  }
  /**
   * @return bool
   */
  public function getUseBibdata()
  {
    return $this->useBibdata;
  }
  /**
   * @param string
   */
  public function setVerticalType($verticalType)
  {
    $this->verticalType = $verticalType;
  }
  /**
   * @return string
   */
  public function getVerticalType()
  {
    return $this->verticalType;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(OceanVolumeImprint::class, 'Google_Service_Contentwarehouse_OceanVolumeImprint');
