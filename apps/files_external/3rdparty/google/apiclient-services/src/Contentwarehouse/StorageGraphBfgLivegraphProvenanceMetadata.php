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

class StorageGraphBfgLivegraphProvenanceMetadata extends \Google\Collection
{
  protected $collection_key = 'triangulationKey';
  /**
   * @var string
   */
  public $lgInternalWriterId;
  /**
   * @var bool
   */
  public $provenanceOnlyAddition;
  /**
   * @var string[]
   */
  public $triangulationKey;
  /**
   * @var bool
   */
  public $weakData;

  /**
   * @param string
   */
  public function setLgInternalWriterId($lgInternalWriterId)
  {
    $this->lgInternalWriterId = $lgInternalWriterId;
  }
  /**
   * @return string
   */
  public function getLgInternalWriterId()
  {
    return $this->lgInternalWriterId;
  }
  /**
   * @param bool
   */
  public function setProvenanceOnlyAddition($provenanceOnlyAddition)
  {
    $this->provenanceOnlyAddition = $provenanceOnlyAddition;
  }
  /**
   * @return bool
   */
  public function getProvenanceOnlyAddition()
  {
    return $this->provenanceOnlyAddition;
  }
  /**
   * @param string[]
   */
  public function setTriangulationKey($triangulationKey)
  {
    $this->triangulationKey = $triangulationKey;
  }
  /**
   * @return string[]
   */
  public function getTriangulationKey()
  {
    return $this->triangulationKey;
  }
  /**
   * @param bool
   */
  public function setWeakData($weakData)
  {
    $this->weakData = $weakData;
  }
  /**
   * @return bool
   */
  public function getWeakData()
  {
    return $this->weakData;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(StorageGraphBfgLivegraphProvenanceMetadata::class, 'Google_Service_Contentwarehouse_StorageGraphBfgLivegraphProvenanceMetadata');
