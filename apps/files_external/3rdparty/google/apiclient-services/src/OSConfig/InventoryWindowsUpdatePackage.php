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

namespace Google\Service\OSConfig;

class InventoryWindowsUpdatePackage extends \Google\Collection
{
  protected $collection_key = 'moreInfoUrls';
  protected $categoriesType = InventoryWindowsUpdatePackageWindowsUpdateCategory::class;
  protected $categoriesDataType = 'array';
  public $description;
  public $kbArticleIds;
  public $lastDeploymentChangeTime;
  public $moreInfoUrls;
  public $revisionNumber;
  public $supportUrl;
  public $title;
  public $updateId;

  /**
   * @param InventoryWindowsUpdatePackageWindowsUpdateCategory[]
   */
  public function setCategories($categories)
  {
    $this->categories = $categories;
  }
  /**
   * @return InventoryWindowsUpdatePackageWindowsUpdateCategory[]
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
  public function setKbArticleIds($kbArticleIds)
  {
    $this->kbArticleIds = $kbArticleIds;
  }
  public function getKbArticleIds()
  {
    return $this->kbArticleIds;
  }
  public function setLastDeploymentChangeTime($lastDeploymentChangeTime)
  {
    $this->lastDeploymentChangeTime = $lastDeploymentChangeTime;
  }
  public function getLastDeploymentChangeTime()
  {
    return $this->lastDeploymentChangeTime;
  }
  public function setMoreInfoUrls($moreInfoUrls)
  {
    $this->moreInfoUrls = $moreInfoUrls;
  }
  public function getMoreInfoUrls()
  {
    return $this->moreInfoUrls;
  }
  public function setRevisionNumber($revisionNumber)
  {
    $this->revisionNumber = $revisionNumber;
  }
  public function getRevisionNumber()
  {
    return $this->revisionNumber;
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
  public function setUpdateId($updateId)
  {
    $this->updateId = $updateId;
  }
  public function getUpdateId()
  {
    return $this->updateId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(InventoryWindowsUpdatePackage::class, 'Google_Service_OSConfig_InventoryWindowsUpdatePackage');
