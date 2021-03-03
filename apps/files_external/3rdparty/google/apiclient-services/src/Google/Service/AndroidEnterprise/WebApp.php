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

class Google_Service_AndroidEnterprise_WebApp extends Google_Collection
{
  protected $collection_key = 'icons';
  public $displayMode;
  protected $iconsType = 'Google_Service_AndroidEnterprise_WebAppIcon';
  protected $iconsDataType = 'array';
  public $isPublished;
  public $startUrl;
  public $title;
  public $versionCode;
  public $webAppId;

  public function setDisplayMode($displayMode)
  {
    $this->displayMode = $displayMode;
  }
  public function getDisplayMode()
  {
    return $this->displayMode;
  }
  /**
   * @param Google_Service_AndroidEnterprise_WebAppIcon[]
   */
  public function setIcons($icons)
  {
    $this->icons = $icons;
  }
  /**
   * @return Google_Service_AndroidEnterprise_WebAppIcon[]
   */
  public function getIcons()
  {
    return $this->icons;
  }
  public function setIsPublished($isPublished)
  {
    $this->isPublished = $isPublished;
  }
  public function getIsPublished()
  {
    return $this->isPublished;
  }
  public function setStartUrl($startUrl)
  {
    $this->startUrl = $startUrl;
  }
  public function getStartUrl()
  {
    return $this->startUrl;
  }
  public function setTitle($title)
  {
    $this->title = $title;
  }
  public function getTitle()
  {
    return $this->title;
  }
  public function setVersionCode($versionCode)
  {
    $this->versionCode = $versionCode;
  }
  public function getVersionCode()
  {
    return $this->versionCode;
  }
  public function setWebAppId($webAppId)
  {
    $this->webAppId = $webAppId;
  }
  public function getWebAppId()
  {
    return $this->webAppId;
  }
}
