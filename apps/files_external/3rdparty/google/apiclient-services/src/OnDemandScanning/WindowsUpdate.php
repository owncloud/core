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

namespace Google\Service\OnDemandScanning;

class WindowsUpdate extends \Google\Collection
{
  protected $collection_key = 'kbArticleIds';
  protected $categoriesType = Category::class;
  protected $categoriesDataType = 'array';
  public $description;
  protected $identityType = Identity::class;
  protected $identityDataType = '';
  public $kbArticleIds;
  public $lastPublishedTimestamp;
  public $supportUrl;
  public $title;

  /**
   * @param Category[]
   */
  public function setCategories($categories)
  {
    $this->categories = $categories;
  }
  /**
   * @return Category[]
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
   * @param Identity
   */
  public function setIdentity(Identity $identity)
  {
    $this->identity = $identity;
  }
  /**
   * @return Identity
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

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(WindowsUpdate::class, 'Google_Service_OnDemandScanning_WindowsUpdate');
