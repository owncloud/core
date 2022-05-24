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

class VolumeAccessInfo extends \Google\Model
{
  /**
   * @var string
   */
  public $accessViewStatus;
  /**
   * @var string
   */
  public $country;
  protected $downloadAccessType = DownloadAccessRestriction::class;
  protected $downloadAccessDataType = '';
  /**
   * @var string
   */
  public $driveImportedContentLink;
  /**
   * @var bool
   */
  public $embeddable;
  protected $epubType = VolumeAccessInfoEpub::class;
  protected $epubDataType = '';
  /**
   * @var bool
   */
  public $explicitOfflineLicenseManagement;
  protected $pdfType = VolumeAccessInfoPdf::class;
  protected $pdfDataType = '';
  /**
   * @var bool
   */
  public $publicDomain;
  /**
   * @var bool
   */
  public $quoteSharingAllowed;
  /**
   * @var string
   */
  public $textToSpeechPermission;
  /**
   * @var string
   */
  public $viewOrderUrl;
  /**
   * @var string
   */
  public $viewability;
  /**
   * @var string
   */
  public $webReaderLink;

  /**
   * @param string
   */
  public function setAccessViewStatus($accessViewStatus)
  {
    $this->accessViewStatus = $accessViewStatus;
  }
  /**
   * @return string
   */
  public function getAccessViewStatus()
  {
    return $this->accessViewStatus;
  }
  /**
   * @param string
   */
  public function setCountry($country)
  {
    $this->country = $country;
  }
  /**
   * @return string
   */
  public function getCountry()
  {
    return $this->country;
  }
  /**
   * @param DownloadAccessRestriction
   */
  public function setDownloadAccess(DownloadAccessRestriction $downloadAccess)
  {
    $this->downloadAccess = $downloadAccess;
  }
  /**
   * @return DownloadAccessRestriction
   */
  public function getDownloadAccess()
  {
    return $this->downloadAccess;
  }
  /**
   * @param string
   */
  public function setDriveImportedContentLink($driveImportedContentLink)
  {
    $this->driveImportedContentLink = $driveImportedContentLink;
  }
  /**
   * @return string
   */
  public function getDriveImportedContentLink()
  {
    return $this->driveImportedContentLink;
  }
  /**
   * @param bool
   */
  public function setEmbeddable($embeddable)
  {
    $this->embeddable = $embeddable;
  }
  /**
   * @return bool
   */
  public function getEmbeddable()
  {
    return $this->embeddable;
  }
  /**
   * @param VolumeAccessInfoEpub
   */
  public function setEpub(VolumeAccessInfoEpub $epub)
  {
    $this->epub = $epub;
  }
  /**
   * @return VolumeAccessInfoEpub
   */
  public function getEpub()
  {
    return $this->epub;
  }
  /**
   * @param bool
   */
  public function setExplicitOfflineLicenseManagement($explicitOfflineLicenseManagement)
  {
    $this->explicitOfflineLicenseManagement = $explicitOfflineLicenseManagement;
  }
  /**
   * @return bool
   */
  public function getExplicitOfflineLicenseManagement()
  {
    return $this->explicitOfflineLicenseManagement;
  }
  /**
   * @param VolumeAccessInfoPdf
   */
  public function setPdf(VolumeAccessInfoPdf $pdf)
  {
    $this->pdf = $pdf;
  }
  /**
   * @return VolumeAccessInfoPdf
   */
  public function getPdf()
  {
    return $this->pdf;
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
   * @param bool
   */
  public function setQuoteSharingAllowed($quoteSharingAllowed)
  {
    $this->quoteSharingAllowed = $quoteSharingAllowed;
  }
  /**
   * @return bool
   */
  public function getQuoteSharingAllowed()
  {
    return $this->quoteSharingAllowed;
  }
  /**
   * @param string
   */
  public function setTextToSpeechPermission($textToSpeechPermission)
  {
    $this->textToSpeechPermission = $textToSpeechPermission;
  }
  /**
   * @return string
   */
  public function getTextToSpeechPermission()
  {
    return $this->textToSpeechPermission;
  }
  /**
   * @param string
   */
  public function setViewOrderUrl($viewOrderUrl)
  {
    $this->viewOrderUrl = $viewOrderUrl;
  }
  /**
   * @return string
   */
  public function getViewOrderUrl()
  {
    return $this->viewOrderUrl;
  }
  /**
   * @param string
   */
  public function setViewability($viewability)
  {
    $this->viewability = $viewability;
  }
  /**
   * @return string
   */
  public function getViewability()
  {
    return $this->viewability;
  }
  /**
   * @param string
   */
  public function setWebReaderLink($webReaderLink)
  {
    $this->webReaderLink = $webReaderLink;
  }
  /**
   * @return string
   */
  public function getWebReaderLink()
  {
    return $this->webReaderLink;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VolumeAccessInfo::class, 'Google_Service_Books_VolumeAccessInfo');
