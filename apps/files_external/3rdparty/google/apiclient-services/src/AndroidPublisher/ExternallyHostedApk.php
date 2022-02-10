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

namespace Google\Service\AndroidPublisher;

class ExternallyHostedApk extends \Google\Collection
{
  protected $collection_key = 'usesPermissions';
  /**
   * @var string
   */
  public $applicationLabel;
  /**
   * @var string[]
   */
  public $certificateBase64s;
  /**
   * @var string
   */
  public $externallyHostedUrl;
  /**
   * @var string
   */
  public $fileSha1Base64;
  /**
   * @var string
   */
  public $fileSha256Base64;
  /**
   * @var string
   */
  public $fileSize;
  /**
   * @var string
   */
  public $iconBase64;
  /**
   * @var int
   */
  public $maximumSdk;
  /**
   * @var int
   */
  public $minimumSdk;
  /**
   * @var string[]
   */
  public $nativeCodes;
  /**
   * @var string
   */
  public $packageName;
  /**
   * @var string[]
   */
  public $usesFeatures;
  protected $usesPermissionsType = UsesPermission::class;
  protected $usesPermissionsDataType = 'array';
  /**
   * @var int
   */
  public $versionCode;
  /**
   * @var string
   */
  public $versionName;

  /**
   * @param string
   */
  public function setApplicationLabel($applicationLabel)
  {
    $this->applicationLabel = $applicationLabel;
  }
  /**
   * @return string
   */
  public function getApplicationLabel()
  {
    return $this->applicationLabel;
  }
  /**
   * @param string[]
   */
  public function setCertificateBase64s($certificateBase64s)
  {
    $this->certificateBase64s = $certificateBase64s;
  }
  /**
   * @return string[]
   */
  public function getCertificateBase64s()
  {
    return $this->certificateBase64s;
  }
  /**
   * @param string
   */
  public function setExternallyHostedUrl($externallyHostedUrl)
  {
    $this->externallyHostedUrl = $externallyHostedUrl;
  }
  /**
   * @return string
   */
  public function getExternallyHostedUrl()
  {
    return $this->externallyHostedUrl;
  }
  /**
   * @param string
   */
  public function setFileSha1Base64($fileSha1Base64)
  {
    $this->fileSha1Base64 = $fileSha1Base64;
  }
  /**
   * @return string
   */
  public function getFileSha1Base64()
  {
    return $this->fileSha1Base64;
  }
  /**
   * @param string
   */
  public function setFileSha256Base64($fileSha256Base64)
  {
    $this->fileSha256Base64 = $fileSha256Base64;
  }
  /**
   * @return string
   */
  public function getFileSha256Base64()
  {
    return $this->fileSha256Base64;
  }
  /**
   * @param string
   */
  public function setFileSize($fileSize)
  {
    $this->fileSize = $fileSize;
  }
  /**
   * @return string
   */
  public function getFileSize()
  {
    return $this->fileSize;
  }
  /**
   * @param string
   */
  public function setIconBase64($iconBase64)
  {
    $this->iconBase64 = $iconBase64;
  }
  /**
   * @return string
   */
  public function getIconBase64()
  {
    return $this->iconBase64;
  }
  /**
   * @param int
   */
  public function setMaximumSdk($maximumSdk)
  {
    $this->maximumSdk = $maximumSdk;
  }
  /**
   * @return int
   */
  public function getMaximumSdk()
  {
    return $this->maximumSdk;
  }
  /**
   * @param int
   */
  public function setMinimumSdk($minimumSdk)
  {
    $this->minimumSdk = $minimumSdk;
  }
  /**
   * @return int
   */
  public function getMinimumSdk()
  {
    return $this->minimumSdk;
  }
  /**
   * @param string[]
   */
  public function setNativeCodes($nativeCodes)
  {
    $this->nativeCodes = $nativeCodes;
  }
  /**
   * @return string[]
   */
  public function getNativeCodes()
  {
    return $this->nativeCodes;
  }
  /**
   * @param string
   */
  public function setPackageName($packageName)
  {
    $this->packageName = $packageName;
  }
  /**
   * @return string
   */
  public function getPackageName()
  {
    return $this->packageName;
  }
  /**
   * @param string[]
   */
  public function setUsesFeatures($usesFeatures)
  {
    $this->usesFeatures = $usesFeatures;
  }
  /**
   * @return string[]
   */
  public function getUsesFeatures()
  {
    return $this->usesFeatures;
  }
  /**
   * @param UsesPermission[]
   */
  public function setUsesPermissions($usesPermissions)
  {
    $this->usesPermissions = $usesPermissions;
  }
  /**
   * @return UsesPermission[]
   */
  public function getUsesPermissions()
  {
    return $this->usesPermissions;
  }
  /**
   * @param int
   */
  public function setVersionCode($versionCode)
  {
    $this->versionCode = $versionCode;
  }
  /**
   * @return int
   */
  public function getVersionCode()
  {
    return $this->versionCode;
  }
  /**
   * @param string
   */
  public function setVersionName($versionName)
  {
    $this->versionName = $versionName;
  }
  /**
   * @return string
   */
  public function getVersionName()
  {
    return $this->versionName;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ExternallyHostedApk::class, 'Google_Service_AndroidPublisher_ExternallyHostedApk');
