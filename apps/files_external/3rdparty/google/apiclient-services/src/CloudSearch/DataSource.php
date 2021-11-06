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
  public $disableModifications;
  public $disableServing;
  public $displayName;
  public $indexingServiceAccounts;
  protected $itemsVisibilityType = GSuitePrincipal::class;
  protected $itemsVisibilityDataType = 'array';
  public $name;
  public $operationIds;
  public $shortName;

  public function setDisableModifications($disableModifications)
  {
    $this->disableModifications = $disableModifications;
  }
  public function getDisableModifications()
  {
    return $this->disableModifications;
  }
  public function setDisableServing($disableServing)
  {
    $this->disableServing = $disableServing;
  }
  public function getDisableServing()
  {
    return $this->disableServing;
  }
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
  }
  public function setIndexingServiceAccounts($indexingServiceAccounts)
  {
    $this->indexingServiceAccounts = $indexingServiceAccounts;
  }
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
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setOperationIds($operationIds)
  {
    $this->operationIds = $operationIds;
  }
  public function getOperationIds()
  {
    return $this->operationIds;
  }
  public function setShortName($shortName)
  {
    $this->shortName = $shortName;
  }
  public function getShortName()
  {
    return $this->shortName;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DataSource::class, 'Google_Service_CloudSearch_DataSource');
