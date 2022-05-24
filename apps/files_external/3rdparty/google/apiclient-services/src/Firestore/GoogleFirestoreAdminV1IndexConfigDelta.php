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

class GoogleFirestoreAdminV1IndexConfigDelta extends \Google\Model
{
  /**
   * @var string
   */
  public $changeType;
  protected $indexType = GoogleFirestoreAdminV1Index::class;
  protected $indexDataType = '';

  /**
   * @param string
   */
  public function setChangeType($changeType)
  {
    $this->changeType = $changeType;
  }
  /**
   * @return string
   */
  public function getChangeType()
  {
    return $this->changeType;
  }
  /**
   * @param GoogleFirestoreAdminV1Index
   */
  public function setIndex(GoogleFirestoreAdminV1Index $index)
  {
    $this->index = $index;
  }
  /**
   * @return GoogleFirestoreAdminV1Index
   */
  public function getIndex()
  {
    return $this->index;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleFirestoreAdminV1IndexConfigDelta::class, 'Google_Service_Firestore_GoogleFirestoreAdminV1IndexConfigDelta');
