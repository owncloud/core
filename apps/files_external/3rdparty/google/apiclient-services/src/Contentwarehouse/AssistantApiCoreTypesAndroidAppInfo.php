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

class AssistantApiCoreTypesAndroidAppInfo extends \Google\Model
{
  /**
   * @var string
   */
  public $accountType;
  /**
   * @var string
   */
  public $androidIntent;
  /**
   * @var string
   */
  public $appUniqueId;
  /**
   * @var int
   */
  public $appVersion;
  /**
   * @var string
   */
  public $dataMimetype;
  /**
   * @var bool
   */
  public $isBroadcastIntent;
  /**
   * @var bool
   */
  public $isDefault;
  /**
   * @var string
   */
  public $localizedAppName;
  /**
   * @var string
   */
  public $longVersionCode;
  /**
   * @var string
   */
  public $mimetype;
  /**
   * @var string
   */
  public $packageName;
  /**
   * @var string
   */
  public $providerType;
  /**
   * @var string
   */
  public $shortcutId;
  /**
   * @var string
   */
  public $versionName;

  /**
   * @param string
   */
  public function setAccountType($accountType)
  {
    $this->accountType = $accountType;
  }
  /**
   * @return string
   */
  public function getAccountType()
  {
    return $this->accountType;
  }
  /**
   * @param string
   */
  public function setAndroidIntent($androidIntent)
  {
    $this->androidIntent = $androidIntent;
  }
  /**
   * @return string
   */
  public function getAndroidIntent()
  {
    return $this->androidIntent;
  }
  /**
   * @param string
   */
  public function setAppUniqueId($appUniqueId)
  {
    $this->appUniqueId = $appUniqueId;
  }
  /**
   * @return string
   */
  public function getAppUniqueId()
  {
    return $this->appUniqueId;
  }
  /**
   * @param int
   */
  public function setAppVersion($appVersion)
  {
    $this->appVersion = $appVersion;
  }
  /**
   * @return int
   */
  public function getAppVersion()
  {
    return $this->appVersion;
  }
  /**
   * @param string
   */
  public function setDataMimetype($dataMimetype)
  {
    $this->dataMimetype = $dataMimetype;
  }
  /**
   * @return string
   */
  public function getDataMimetype()
  {
    return $this->dataMimetype;
  }
  /**
   * @param bool
   */
  public function setIsBroadcastIntent($isBroadcastIntent)
  {
    $this->isBroadcastIntent = $isBroadcastIntent;
  }
  /**
   * @return bool
   */
  public function getIsBroadcastIntent()
  {
    return $this->isBroadcastIntent;
  }
  /**
   * @param bool
   */
  public function setIsDefault($isDefault)
  {
    $this->isDefault = $isDefault;
  }
  /**
   * @return bool
   */
  public function getIsDefault()
  {
    return $this->isDefault;
  }
  /**
   * @param string
   */
  public function setLocalizedAppName($localizedAppName)
  {
    $this->localizedAppName = $localizedAppName;
  }
  /**
   * @return string
   */
  public function getLocalizedAppName()
  {
    return $this->localizedAppName;
  }
  /**
   * @param string
   */
  public function setLongVersionCode($longVersionCode)
  {
    $this->longVersionCode = $longVersionCode;
  }
  /**
   * @return string
   */
  public function getLongVersionCode()
  {
    return $this->longVersionCode;
  }
  /**
   * @param string
   */
  public function setMimetype($mimetype)
  {
    $this->mimetype = $mimetype;
  }
  /**
   * @return string
   */
  public function getMimetype()
  {
    return $this->mimetype;
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
   * @param string
   */
  public function setProviderType($providerType)
  {
    $this->providerType = $providerType;
  }
  /**
   * @return string
   */
  public function getProviderType()
  {
    return $this->providerType;
  }
  /**
   * @param string
   */
  public function setShortcutId($shortcutId)
  {
    $this->shortcutId = $shortcutId;
  }
  /**
   * @return string
   */
  public function getShortcutId()
  {
    return $this->shortcutId;
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
class_alias(AssistantApiCoreTypesAndroidAppInfo::class, 'Google_Service_Contentwarehouse_AssistantApiCoreTypesAndroidAppInfo');
