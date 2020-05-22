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

class Google_Service_Firestore_GoogleFirestoreAdminV1IndexConfig extends Google_Collection
{
  protected $collection_key = 'indexes';
  public $ancestorField;
  protected $indexesType = 'Google_Service_Firestore_GoogleFirestoreAdminV1Index';
  protected $indexesDataType = 'array';
  public $reverting;
  public $usesAncestorConfig;

  public function setAncestorField($ancestorField)
  {
    $this->ancestorField = $ancestorField;
  }
  public function getAncestorField()
  {
    return $this->ancestorField;
  }
  /**
   * @param Google_Service_Firestore_GoogleFirestoreAdminV1Index
   */
  public function setIndexes($indexes)
  {
    $this->indexes = $indexes;
  }
  /**
   * @return Google_Service_Firestore_GoogleFirestoreAdminV1Index
   */
  public function getIndexes()
  {
    return $this->indexes;
  }
  public function setReverting($reverting)
  {
    $this->reverting = $reverting;
  }
  public function getReverting()
  {
    return $this->reverting;
  }
  public function setUsesAncestorConfig($usesAncestorConfig)
  {
    $this->usesAncestorConfig = $usesAncestorConfig;
  }
  public function getUsesAncestorConfig()
  {
    return $this->usesAncestorConfig;
  }
}
