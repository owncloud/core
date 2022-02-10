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

namespace Google\Service\CloudAsset;

class WindowsUpdatePackage extends \Google\Collection
{
  protected $collection_key = 'moreInfoUrls';
  protected $categoriesType = WindowsUpdateCategory::class;
  protected $categoriesDataType = 'array';
  /**
   * @var string
   */
  public $description;
  /**
   * @var string[]
   */
  public $kbArticleIds;
  /**
   * @var string
   */
  public $lastDeploymentChangeTime;
  /**
   * @var string[]
   */
  public $moreInfoUrls;
  /**
   * @var int
   */
  public $revisionNumber;
  /**
   * @var string
   */
  public $supportUrl;
  /**
   * @var string
   */
  public $title;
  /**
   * @var string
   */
  public $updateId;

  /**
   * @param WindowsUpdateCategory[]
   */
  public function setCategories($categories)
  {
    $this->categories = $categories;
  }
  /**
   * @return WindowsUpdateCategory[]
   */
  public function getCategories()
  {
    return $this->categories;
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
   * @param string[]
   */
  public function setKbArticleIds($kbArticleIds)
  {
    $this->kbArticleIds = $kbArticleIds;
  }
  /**
   * @return string[]
   */
  public function getKbArticleIds()
  {
    return $this->kbArticleIds;
  }
  /**
   * @param string
   */
  public function setLastDeploymentChangeTime($lastDeploymentChangeTime)
  {
    $this->lastDeploymentChangeTime = $lastDeploymentChangeTime;
  }
  /**
   * @return string
   */
  public function getLastDeploymentChangeTime()
  {
    return $this->lastDeploymentChangeTime;
  }
  /**
   * @param string[]
   */
  public function setMoreInfoUrls($moreInfoUrls)
  {
    $this->moreInfoUrls = $moreInfoUrls;
  }
  /**
   * @return string[]
   */
  public function getMoreInfoUrls()
  {
    return $this->moreInfoUrls;
  }
  /**
   * @param int
   */
  public function setRevisionNumber($revisionNumber)
  {
    $this->revisionNumber = $revisionNumber;
  }
  /**
   * @return int
   */
  public function getRevisionNumber()
  {
    return $this->revisionNumber;
  }
  /**
   * @param string
   */
  public function setSupportUrl($supportUrl)
  {
    $this->supportUrl = $supportUrl;
  }
  /**
   * @return string
   */
  public function getSupportUrl()
  {
    return $this->supportUrl;
  }
  /**
   * @param string
   */
  public function setTitle($title)
  {
    $this->title = $title;
  }
  /**
   * @return string
   */
  public function getTitle()
  {
    return $this->title;
  }
  /**
   * @param string
   */
  public function setUpdateId($updateId)
  {
    $this->updateId = $updateId;
  }
  /**
   * @return string
   */
  public function getUpdateId()
  {
    return $this->updateId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(WindowsUpdatePackage::class, 'Google_Service_CloudAsset_WindowsUpdatePackage');
