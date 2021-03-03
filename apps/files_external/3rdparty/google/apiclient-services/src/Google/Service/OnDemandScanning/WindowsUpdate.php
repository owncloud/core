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

class Google_Service_OnDemandScanning_WindowsUpdate extends Google_Collection
{
  protected $collection_key = 'kbArticleIds';
  protected $categoriesType = 'Google_Service_OnDemandScanning_Category';
  protected $categoriesDataType = 'array';
  public $description;
  protected $identityType = 'Google_Service_OnDemandScanning_Identity';
  protected $identityDataType = '';
  public $kbArticleIds;
  public $lastPublishedTimestamp;
  public $supportUrl;
  public $title;

  /**
   * @param Google_Service_OnDemandScanning_Category[]
   */
  public function setCategories($categories)
  {
    $this->categories = $categories;
  }
  /**
   * @return Google_Service_OnDemandScanning_Category[]
   */
  public function getCategories()
  {
    return $this->categories;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  /**
   * @param Google_Service_OnDemandScanning_Identity
   */
  public function setIdentity(Google_Service_OnDemandScanning_Identity $identity)
  {
    $this->identity = $identity;
  }
  /**
   * @return Google_Service_OnDemandScanning_Identity
   */
  public function getIdentity()
  {
    return $this->identity;
  }
  public function setKbArticleIds($kbArticleIds)
  {
    $this->kbArticleIds = $kbArticleIds;
  }
  public function getKbArticleIds()
  {
    return $this->kbArticleIds;
  }
  public function setLastPublishedTimestamp($lastPublishedTimestamp)
  {
    $this->lastPublishedTimestamp = $lastPublishedTimestamp;
  }
  public function getLastPublishedTimestamp()
  {
    return $this->lastPublishedTimestamp;
  }
  public function setSupportUrl($supportUrl)
  {
    $this->supportUrl = $supportUrl;
  }
  public function getSupportUrl()
  {
    return $this->supportUrl;
  }
  public function setTitle($title)
  {
    $this->title = $title;
  }
  public function getTitle()
  {
    return $this->title;
  }
}
