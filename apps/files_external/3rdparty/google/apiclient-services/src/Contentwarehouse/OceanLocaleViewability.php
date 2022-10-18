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

class OceanLocaleViewability extends \Google\Model
{
  protected $accessRightsType = OceanVolumeAccessRights::class;
  protected $accessRightsDataType = '';
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
  public $bibkey;
  /**
   * @var bool
   */
  public $canDisplayAds;
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
  public $canShowPhotos;
  /**
   * @var bool
   */
  public $canUseMetadataCover;
  /**
   * @var string
   */
  public $clientId;
  protected $computedAccessRightsType = OceanVolumeComputedAccessRights::class;
  protected $computedAccessRightsDataType = '';
  protected $datesType = OceanLocaleViewabilityDates::class;
  protected $datesDataType = '';
  protected $displayDetailsType = OceanVolumeDisplayDetails::class;
  protected $displayDetailsDataType = '';
  /**
   * @var bool
   */
  public $metadataViewMayIncludeInfoFromScans;
  /**
   * @var bool
   */
  public $metadataViewSampleAllowed;
  /**
   * @var int
   */
  public $percentBookShown;
  /**
   * @var bool
   */
  public $publicDomain;
  protected $sourcedetailsType = OceanLocaleViewabilitySourceDetails::class;
  protected $sourcedetailsDataType = '';
  /**
   * @var string
   */
  public $viewReason;
  /**
   * @var string
   */
  public $viewType;

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
   * @param bool
   */
  public function setCanDisplayAds($canDisplayAds)
  {
    $this->canDisplayAds = $canDisplayAds;
  }
  /**
   * @return bool
   */
  public function getCanDisplayAds()
  {
    return $this->canDisplayAds;
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
  public function setCanShowPhotos($canShowPhotos)
  {
    $this->canShowPhotos = $canShowPhotos;
  }
  /**
   * @return bool
   */
  public function getCanShowPhotos()
  {
    return $this->canShowPhotos;
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
   * @param string
   */
  public function setClientId($clientId)
  {
    $this->clientId = $clientId;
  }
  /**
   * @return string
   */
  public function getClientId()
  {
    return $this->clientId;
  }
  /**
   * @param OceanVolumeComputedAccessRights
   */
  public function setComputedAccessRights(OceanVolumeComputedAccessRights $computedAccessRights)
  {
    $this->computedAccessRights = $computedAccessRights;
  }
  /**
   * @return OceanVolumeComputedAccessRights
   */
  public function getComputedAccessRights()
  {
    return $this->computedAccessRights;
  }
  /**
   * @param OceanLocaleViewabilityDates
   */
  public function setDates(OceanLocaleViewabilityDates $dates)
  {
    $this->dates = $dates;
  }
  /**
   * @return OceanLocaleViewabilityDates
   */
  public function getDates()
  {
    return $this->dates;
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
   * @param bool
   */
  public function setMetadataViewMayIncludeInfoFromScans($metadataViewMayIncludeInfoFromScans)
  {
    $this->metadataViewMayIncludeInfoFromScans = $metadataViewMayIncludeInfoFromScans;
  }
  /**
   * @return bool
   */
  public function getMetadataViewMayIncludeInfoFromScans()
  {
    return $this->metadataViewMayIncludeInfoFromScans;
  }
  /**
   * @param bool
   */
  public function setMetadataViewSampleAllowed($metadataViewSampleAllowed)
  {
    $this->metadataViewSampleAllowed = $metadataViewSampleAllowed;
  }
  /**
   * @return bool
   */
  public function getMetadataViewSampleAllowed()
  {
    return $this->metadataViewSampleAllowed;
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
   * @param bool
   */
  public function setPublicDomain($publicDomain)
  {
    $this->publicDomain = $publicDomain;
  }
  /**
   * @return bool
   */
  public function getPublicDomain()
  {
    return $this->publicDomain;
  }
  /**
   * @param OceanLocaleViewabilitySourceDetails
   */
  public function setSourcedetails(OceanLocaleViewabilitySourceDetails $sourcedetails)
  {
    $this->sourcedetails = $sourcedetails;
  }
  /**
   * @return OceanLocaleViewabilitySourceDetails
   */
  public function getSourcedetails()
  {
    return $this->sourcedetails;
  }
  /**
   * @param string
   */
  public function setViewReason($viewReason)
  {
    $this->viewReason = $viewReason;
  }
  /**
   * @return string
   */
  public function getViewReason()
  {
    return $this->viewReason;
  }
  /**
   * @param string
   */
  public function setViewType($viewType)
  {
    $this->viewType = $viewType;
  }
  /**
   * @return string
   */
  public function getViewType()
  {
    return $this->viewType;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(OceanLocaleViewability::class, 'Google_Service_Contentwarehouse_OceanLocaleViewability');
