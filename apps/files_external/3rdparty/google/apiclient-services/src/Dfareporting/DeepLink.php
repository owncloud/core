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

namespace Google\Service\Dfareporting;

class DeepLink extends \Google\Collection
{
  protected $collection_key = 'remarketingListIds';
  /**
   * @var string
   */
  public $appUrl;
  /**
   * @var string
   */
  public $fallbackUrl;
  /**
   * @var string
   */
  public $kind;
  protected $mobileAppType = MobileApp::class;
  protected $mobileAppDataType = '';
  /**
   * @var string[]
   */
  public $remarketingListIds;

  /**
   * @param string
   */
  public function setAppUrl($appUrl)
  {
    $this->appUrl = $appUrl;
  }
  /**
   * @return string
   */
  public function getAppUrl()
  {
    return $this->appUrl;
  }
  /**
   * @param string
   */
  public function setFallbackUrl($fallbackUrl)
  {
    $this->fallbackUrl = $fallbackUrl;
  }
  /**
   * @return string
   */
  public function getFallbackUrl()
  {
    return $this->fallbackUrl;
  }
  /**
   * @param string
   */
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  /**
   * @return string
   */
  public function getKind()
  {
    return $this->kind;
  }
  /**
   * @param MobileApp
   */
  public function setMobileApp(MobileApp $mobileApp)
  {
    $this->mobileApp = $mobileApp;
  }
  /**
   * @return MobileApp
   */
  public function getMobileApp()
  {
    return $this->mobileApp;
  }
  /**
   * @param string[]
   */
  public function setRemarketingListIds($remarketingListIds)
  {
    $this->remarketingListIds = $remarketingListIds;
  }
  /**
   * @return string[]
   */
  public function getRemarketingListIds()
  {
    return $this->remarketingListIds;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DeepLink::class, 'Google_Service_Dfareporting_DeepLink');
