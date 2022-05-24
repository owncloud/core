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

namespace Google\Service\Firestore;

class GoogleFirestoreAdminV1IndexConfig extends \Google\Collection
{
  protected $collection_key = 'indexes';
  /**
   * @var string
   */
  public $ancestorField;
  protected $indexesType = GoogleFirestoreAdminV1Index::class;
  protected $indexesDataType = 'array';
  /**
   * @var bool
   */
  public $reverting;
  /**
   * @var bool
   */
  public $usesAncestorConfig;

  /**
   * @param string
   */
  public function setAncestorField($ancestorField)
  {
    $this->ancestorField = $ancestorField;
  }
  /**
   * @return string
   */
  public function getAncestorField()
  {
    return $this->ancestorField;
  }
  /**
   * @param GoogleFirestoreAdminV1Index[]
   */
  public function setIndexes($indexes)
  {
    $this->indexes = $indexes;
  }
  /**
   * @return GoogleFirestoreAdminV1Index[]
   */
  public function getIndexes()
  {
    return $this->indexes;
  }
  /**
   * @param bool
   */
  public function setReverting($reverting)
  {
    $this->reverting = $reverting;
  }
  /**
   * @return bool
   */
  public function getReverting()
  {
    return $this->reverting;
  }
  /**
   * @param bool
   */
  public function setUsesAncestorConfig($usesAncestorConfig)
  {
    $this->usesAncestorConfig = $usesAncestorConfig;
  }
  /**
   * @return bool
   */
  public function getUsesAncestorConfig()
  {
    return $this->usesAncestorConfig;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleFirestoreAdminV1IndexConfig::class, 'Google_Service_Firestore_GoogleFirestoreAdminV1IndexConfig');
