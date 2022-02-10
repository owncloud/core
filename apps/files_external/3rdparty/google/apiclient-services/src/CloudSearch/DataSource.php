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

namespace Google\Service\CloudSearch;

class DataSource extends \Google\Collection
{
  protected $collection_key = 'operationIds';
  /**
   * @var bool
   */
  public $disableModifications;
  /**
   * @var bool
   */
  public $disableServing;
  /**
   * @var string
   */
  public $displayName;
  /**
   * @var string[]
   */
  public $indexingServiceAccounts;
  protected $itemsVisibilityType = GSuitePrincipal::class;
  protected $itemsVisibilityDataType = 'array';
  /**
   * @var string
   */
  public $name;
  /**
   * @var string[]
   */
  public $operationIds;
  /**
   * @var bool
   */
  public $returnThumbnailUrls;
  /**
   * @var string
   */
  public $shortName;

  /**
   * @param bool
   */
  public function setDisableModifications($disableModifications)
  {
    $this->disableModifications = $disableModifications;
  }
  /**
   * @return bool
   */
  public function getDisableModifications()
  {
    return $this->disableModifications;
  }
  /**
   * @param bool
   */
  public function setDisableServing($disableServing)
  {
    $this->disableServing = $disableServing;
  }
  /**
   * @return bool
   */
  public function getDisableServing()
  {
    return $this->disableServing;
  }
  /**
   * @param string
   */
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  /**
   * @return string
   */
  public function getDisplayName()
  {
    return $this->displayName;
  }
  /**
   * @param string[]
   */
  public function setIndexingServiceAccounts($indexingServiceAccounts)
  {
    $this->indexingServiceAccounts = $indexingServiceAccounts;
  }
  /**
   * @return string[]
   */
  public function getIndexingServiceAccounts()
  {
    return $this->indexingServiceAccounts;
  }
  /**
   * @param GSuitePrincipal[]
   */
  public function setItemsVisibility($itemsVisibility)
  {
    $this->itemsVisibility = $itemsVisibility;
  }
  /**
   * @return GSuitePrincipal[]
   */
  public function getItemsVisibility()
  {
    return $this->itemsVisibility;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param string[]
   */
  public function setOperationIds($operationIds)
  {
    $this->operationIds = $operationIds;
  }
  /**
   * @return string[]
   */
  public function getOperationIds()
  {
    return $this->operationIds;
  }
  /**
   * @param bool
   */
  public function setReturnThumbnailUrls($returnThumbnailUrls)
  {
    $this->returnThumbnailUrls = $returnThumbnailUrls;
  }
  /**
   * @return bool
   */
  public function getReturnThumbnailUrls()
  {
    return $this->returnThumbnailUrls;
  }
  /**
   * @param string
   */
  public function setShortName($shortName)
  {
    $this->shortName = $shortName;
  }
  /**
   * @return string
   */
  public function getShortName()
  {
    return $this->shortName;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DataSource::class, 'Google_Service_CloudSearch_DataSource');
