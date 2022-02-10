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

namespace Google\Service\ChromeManagement;

class GoogleChromeManagementV1AppDetails extends \Google\Model
{
  protected $androidAppInfoType = GoogleChromeManagementV1AndroidAppInfo::class;
  protected $androidAppInfoDataType = '';
  /**
   * @var string
   */
  public $appId;
  protected $chromeAppInfoType = GoogleChromeManagementV1ChromeAppInfo::class;
  protected $chromeAppInfoDataType = '';
  /**
   * @var string
   */
  public $description;
  /**
   * @var string
   */
  public $detailUri;
  /**
   * @var string
   */
  public $displayName;
  /**
   * @var string
   */
  public $firstPublishTime;
  /**
   * @var string
   */
  public $homepageUri;
  /**
   * @var string
   */
  public $iconUri;
  /**
   * @var bool
   */
  public $isPaidApp;
  /**
   * @var string
   */
  public $latestPublishTime;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $privacyPolicyUri;
  /**
   * @var string
   */
  public $publisher;
  /**
   * @var string
   */
  public $reviewNumber;
  /**
   * @var float
   */
  public $reviewRating;
  /**
   * @var string
   */
  public $revisionId;
  protected $serviceErrorType = GoogleRpcStatus::class;
  protected $serviceErrorDataType = '';
  /**
   * @var string
   */
  public $type;

  /**
   * @param GoogleChromeManagementV1AndroidAppInfo
   */
  public function setAndroidAppInfo(GoogleChromeManagementV1AndroidAppInfo $androidAppInfo)
  {
    $this->androidAppInfo = $androidAppInfo;
  }
  /**
   * @return GoogleChromeManagementV1AndroidAppInfo
   */
  public function getAndroidAppInfo()
  {
    return $this->androidAppInfo;
  }
  /**
   * @param string
   */
  public function setAppId($appId)
  {
    $this->appId = $appId;
  }
  /**
   * @return string
   */
  public function getAppId()
  {
    return $this->appId;
  }
  /**
   * @param GoogleChromeManagementV1ChromeAppInfo
   */
  public function setChromeAppInfo(GoogleChromeManagementV1ChromeAppInfo $chromeAppInfo)
  {
    $this->chromeAppInfo = $chromeAppInfo;
  }
  /**
   * @return GoogleChromeManagementV1ChromeAppInfo
   */
  public function getChromeAppInfo()
  {
    return $this->chromeAppInfo;
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
   * @param string
   */
  public function setDetailUri($detailUri)
  {
    $this->detailUri = $detailUri;
  }
  /**
   * @return string
   */
  public function getDetailUri()
  {
    return $this->detailUri;
  }
  /**
   * @param string
   */
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  /**
   * @return string
   */
  public function getDisplayName()
  {
    return $this->displayName;
  }
  /**
   * @param string
   */
  public function setFirstPublishTime($firstPublishTime)
  {
    $this->firstPublishTime = $firstPublishTime;
  }
  /**
   * @return string
   */
  public function getFirstPublishTime()
  {
    return $this->firstPublishTime;
  }
  /**
   * @param string
   */
  public function setHomepageUri($homepageUri)
  {
    $this->homepageUri = $homepageUri;
  }
  /**
   * @return string
   */
  public function getHomepageUri()
  {
    return $this->homepageUri;
  }
  /**
   * @param string
   */
  public function setIconUri($iconUri)
  {
    $this->iconUri = $iconUri;
  }
  /**
   * @return string
   */
  public function getIconUri()
  {
    return $this->iconUri;
  }
  /**
   * @param bool
   */
  public function setIsPaidApp($isPaidApp)
  {
    $this->isPaidApp = $isPaidApp;
  }
  /**
   * @return bool
   */
  public function getIsPaidApp()
  {
    return $this->isPaidApp;
  }
  /**
   * @param string
   */
  public function setLatestPublishTime($latestPublishTime)
  {
    $this->latestPublishTime = $latestPublishTime;
  }
  /**
   * @return string
   */
  public function getLatestPublishTime()
  {
    return $this->latestPublishTime;
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
   * @param string
   */
  public function setPrivacyPolicyUri($privacyPolicyUri)
  {
    $this->privacyPolicyUri = $privacyPolicyUri;
  }
  /**
   * @return string
   */
  public function getPrivacyPolicyUri()
  {
    return $this->privacyPolicyUri;
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
   * @param string
   */
  public function setReviewNumber($reviewNumber)
  {
    $this->reviewNumber = $reviewNumber;
  }
  /**
   * @return string
   */
  public function getReviewNumber()
  {
    return $this->reviewNumber;
  }
  /**
   * @param float
   */
  public function setReviewRating($reviewRating)
  {
    $this->reviewRating = $reviewRating;
  }
  /**
   * @return float
   */
  public function getReviewRating()
  {
    return $this->reviewRating;
  }
  /**
   * @param string
   */
  public function setRevisionId($revisionId)
  {
    $this->revisionId = $revisionId;
  }
  /**
   * @return string
   */
  public function getRevisionId()
  {
    return $this->revisionId;
  }
  /**
   * @param GoogleRpcStatus
   */
  public function setServiceError(GoogleRpcStatus $serviceError)
  {
    $this->serviceError = $serviceError;
  }
  /**
   * @return GoogleRpcStatus
   */
  public function getServiceError()
  {
    return $this->serviceError;
  }
  /**
   * @param string
   */
  public function setType($type)
  {
    $this->type = $type;
  }
  /**
   * @return string
   */
  public function getType()
  {
    return $this->type;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleChromeManagementV1AppDetails::class, 'Google_Service_ChromeManagement_GoogleChromeManagementV1AppDetails');
