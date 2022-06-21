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

class GoogleFirestoreAdminV1FieldOperationMetadata extends \Google\Collection
{
  protected $collection_key = 'indexConfigDeltas';
  /**
   * @var string
   */
  public $endTime;
  /**
   * @var string
   */
  public $field;
  protected $indexConfigDeltasType = GoogleFirestoreAdminV1IndexConfigDelta::class;
  protected $indexConfigDeltasDataType = 'array';
  protected $progressBytesType = GoogleFirestoreAdminV1Progress::class;
  protected $progressBytesDataType = '';
  protected $progressDocumentsType = GoogleFirestoreAdminV1Progress::class;
  protected $progressDocumentsDataType = '';
  /**
   * @var string
   */
  public $startTime;
  /**
   * @var string
   */
  public $state;
  protected $ttlConfigDeltaType = GoogleFirestoreAdminV1TtlConfigDelta::class;
  protected $ttlConfigDeltaDataType = '';

  /**
   * @param string
   */
  public function setEndTime($endTime)
  {
    $this->endTime = $endTime;
  }
  /**
   * @return string
   */
  public function getEndTime()
  {
    return $this->endTime;
  }
  /**
   * @param string
   */
  public function setField($field)
  {
    $this->field = $field;
  }
  /**
   * @return string
   */
  public function getField()
  {
    return $this->field;
  }
  /**
   * @param GoogleFirestoreAdminV1IndexConfigDelta[]
   */
  public function setIndexConfigDeltas($indexConfigDeltas)
  {
    $this->indexConfigDeltas = $indexConfigDeltas;
  }
  /**
   * @return GoogleFirestoreAdminV1IndexConfigDelta[]
   */
  public function getIndexConfigDeltas()
  {
    return $this->indexConfigDeltas;
  }
  /**
   * @param GoogleFirestoreAdminV1Progress
   */
  public function setProgressBytes(GoogleFirestoreAdminV1Progress $progressBytes)
  {
    $this->progressBytes = $progressBytes;
  }
  /**
   * @return GoogleFirestoreAdminV1Progress
   */
  public function getProgressBytes()
  {
    return $this->progressBytes;
  }
  /**
   * @param GoogleFirestoreAdminV1Progress
   */
  public function setProgressDocuments(GoogleFirestoreAdminV1Progress $progressDocuments)
  {
    $this->progressDocuments = $progressDocuments;
  }
  /**
   * @return GoogleFirestoreAdminV1Progress
   */
  public function getProgressDocuments()
  {
    return $this->progressDocuments;
  }
  /**
   * @param string
   */
  public function setStartTime($startTime)
  {
    $this->startTime = $startTime;
  }
  /**
   * @return string
   */
  public function getStartTime()
  {
    return $this->startTime;
  }
  /**
   * @param string
   */
  public function setState($state)
  {
    $this->state = $state;
  }
  /**
   * @return string
   */
  public function getState()
  {
    return $this->state;
  }
  /**
   * @param GoogleFirestoreAdminV1TtlConfigDelta
   */
  public function setTtlConfigDelta(GoogleFirestoreAdminV1TtlConfigDelta $ttlConfigDelta)
  {
    $this->ttlConfigDelta = $ttlConfigDelta;
  }
  /**
   * @return GoogleFirestoreAdminV1TtlConfigDelta
   */
  public function getTtlConfigDelta()
  {
    return $this->ttlConfigDelta;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleFirestoreAdminV1FieldOperationMetadata::class, 'Google_Service_Firestore_GoogleFirestoreAdminV1FieldOperationMetadata');
