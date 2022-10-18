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

class ImageSearchImageLicenseInfo extends \Google\Collection
{
  protected $collection_key = 'creator';
  /**
   * @var string
   */
  public $acquireLicensePage;
  /**
   * @var string
   */
  public $copyrightNotice;
  /**
   * @var string
   */
  public $copyrightNoticeSourceType;
  /**
   * @var string[]
   */
  public $creator;
  /**
   * @var string
   */
  public $creatorSourceType;
  /**
   * @var string
   */
  public $creditText;
  /**
   * @var string
   */
  public $creditTextSourceType;
  /**
   * @var bool
   */
  public $isRetiredCcUrl;
  /**
   * @var string
   */
  public $licenseType;
  /**
   * @var string
   */
  public $licenseUrl;
  /**
   * @var int
   */
  public $safesearchFlags;
  /**
   * @var string
   */
  public $sourceType;

  /**
   * @param string
   */
  public function setAcquireLicensePage($acquireLicensePage)
  {
    $this->acquireLicensePage = $acquireLicensePage;
  }
  /**
   * @return string
   */
  public function getAcquireLicensePage()
  {
    return $this->acquireLicensePage;
  }
  /**
   * @param string
   */
  public function setCopyrightNotice($copyrightNotice)
  {
    $this->copyrightNotice = $copyrightNotice;
  }
  /**
   * @return string
   */
  public function getCopyrightNotice()
  {
    return $this->copyrightNotice;
  }
  /**
   * @param string
   */
  public function setCopyrightNoticeSourceType($copyrightNoticeSourceType)
  {
    $this->copyrightNoticeSourceType = $copyrightNoticeSourceType;
  }
  /**
   * @return string
   */
  public function getCopyrightNoticeSourceType()
  {
    return $this->copyrightNoticeSourceType;
  }
  /**
   * @param string[]
   */
  public function setCreator($creator)
  {
    $this->creator = $creator;
  }
  /**
   * @return string[]
   */
  public function getCreator()
  {
    return $this->creator;
  }
  /**
   * @param string
   */
  public function setCreatorSourceType($creatorSourceType)
  {
    $this->creatorSourceType = $creatorSourceType;
  }
  /**
   * @return string
   */
  public function getCreatorSourceType()
  {
    return $this->creatorSourceType;
  }
  /**
   * @param string
   */
  public function setCreditText($creditText)
  {
    $this->creditText = $creditText;
  }
  /**
   * @return string
   */
  public function getCreditText()
  {
    return $this->creditText;
  }
  /**
   * @param string
   */
  public function setCreditTextSourceType($creditTextSourceType)
  {
    $this->creditTextSourceType = $creditTextSourceType;
  }
  /**
   * @return string
   */
  public function getCreditTextSourceType()
  {
    return $this->creditTextSourceType;
  }
  /**
   * @param bool
   */
  public function setIsRetiredCcUrl($isRetiredCcUrl)
  {
    $this->isRetiredCcUrl = $isRetiredCcUrl;
  }
  /**
   * @return bool
   */
  public function getIsRetiredCcUrl()
  {
    return $this->isRetiredCcUrl;
  }
  /**
   * @param string
   */
  public function setLicenseType($licenseType)
  {
    $this->licenseType = $licenseType;
  }
  /**
   * @return string
   */
  public function getLicenseType()
  {
    return $this->licenseType;
  }
  /**
   * @param string
   */
  public function setLicenseUrl($licenseUrl)
  {
    $this->licenseUrl = $licenseUrl;
  }
  /**
   * @return string
   */
  public function getLicenseUrl()
  {
    return $this->licenseUrl;
  }
  /**
   * @param int
   */
  public function setSafesearchFlags($safesearchFlags)
  {
    $this->safesearchFlags = $safesearchFlags;
  }
  /**
   * @return int
   */
  public function getSafesearchFlags()
  {
    return $this->safesearchFlags;
  }
  /**
   * @param string
   */
  public function setSourceType($sourceType)
  {
    $this->sourceType = $sourceType;
  }
  /**
   * @return string
   */
  public function getSourceType()
  {
    return $this->sourceType;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ImageSearchImageLicenseInfo::class, 'Google_Service_Contentwarehouse_ImageSearchImageLicenseInfo');
