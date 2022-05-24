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

namespace Google\Service\ContainerAnalysis;

class WindowsUpdate extends \Google\Collection
{
  protected $collection_key = 'kbArticleIds';
  protected $categoriesType = Category::class;
  protected $categoriesDataType = 'array';
  /**
   * @var string
   */
  public $description;
  protected $identityType = Identity::class;
  protected $identityDataType = '';
  /**
   * @var string[]
   */
  public $kbArticleIds;
  /**
   * @var string
   */
  public $lastPublishedTimestamp;
  /**
   * @var string
   */
  public $supportUrl;
  /**
   * @var string
   */
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
  public function setLastPublishedTimestamp($lastPublishedTimestamp)
  {
    $this->lastPublishedTimestamp = $lastPublishedTimestamp;
  }
  /**
   * @return string
   */
  public function getLastPublishedTimestamp()
  {
    return $this->lastPublishedTimestamp;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(WindowsUpdate::class, 'Google_Service_ContainerAnalysis_WindowsUpdate');
