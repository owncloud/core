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
  public $appId;
  protected $chromeAppInfoType = GoogleChromeManagementV1ChromeAppInfo::class;
  protected $chromeAppInfoDataType = '';
  public $description;
  public $detailUri;
  public $displayName;
  public $firstPublishTime;
  public $homepageUri;
  public $iconUri;
  public $isPaidApp;
  public $latestPublishTime;
  public $name;
  public $privacyPolicyUri;
  public $publisher;
  public $reviewNumber;
  public $reviewRating;
  public $revisionId;
  protected $serviceErrorType = GoogleRpcStatus::class;
  protected $serviceErrorDataType = '';
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
  public function setAppId($appId)
  {
    $this->appId = $appId;
  }
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
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setDetailUri($detailUri)
  {
    $this->detailUri = $detailUri;
  }
  public function getDetailUri()
  {
    return $this->detailUri;
  }
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
  }
  public function setFirstPublishTime($firstPublishTime)
  {
    $this->firstPublishTime = $firstPublishTime;
  }
  public function getFirstPublishTime()
  {
    return $this->firstPublishTime;
  }
  public function setHomepageUri($homepageUri)
  {
    $this->homepageUri = $homepageUri;
  }
  public function getHomepageUri()
  {
    return $this->homepageUri;
  }
  public function setIconUri($iconUri)
  {
    $this->iconUri = $iconUri;
  }
  public function getIconUri()
  {
    return $this->iconUri;
  }
  public function setIsPaidApp($isPaidApp)
  {
    $this->isPaidApp = $isPaidApp;
  }
  public function getIsPaidApp()
  {
    return $this->isPaidApp;
  }
  public function setLatestPublishTime($latestPublishTime)
  {
    $this->latestPublishTime = $latestPublishTime;
  }
  public function getLatestPublishTime()
  {
    return $this->latestPublishTime;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setPrivacyPolicyUri($privacyPolicyUri)
  {
    $this->privacyPolicyUri = $privacyPolicyUri;
  }
  public function getPrivacyPolicyUri()
  {
    return $this->privacyPolicyUri;
  }
  public function setPublisher($publisher)
  {
    $this->publisher = $publisher;
  }
  public function getPublisher()
  {
    return $this->publisher;
  }
  public function setReviewNumber($reviewNumber)
  {
    $this->reviewNumber = $reviewNumber;
  }
  public function getReviewNumber()
  {
    return $this->reviewNumber;
  }
  public function setReviewRating($reviewRating)
  {
    $this->reviewRating = $reviewRating;
  }
  public function getReviewRating()
  {
    return $this->reviewRating;
  }
  public function setRevisionId($revisionId)
  {
    $this->revisionId = $revisionId;
  }
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
  public function setType($type)
  {
    $this->type = $type;
  }
  public function getType()
  {
    return $this->type;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleChromeManagementV1AppDetails::class, 'Google_Service_ChromeManagement_GoogleChromeManagementV1AppDetails');
