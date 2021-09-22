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

class GoogleFirestoreAdminV1ImportDocumentsMetadata extends \Google\Collection
{
  protected $collection_key = 'collectionIds';
  public $collectionIds;
  public $endTime;
  public $inputUriPrefix;
  public $operationState;
  protected $progressBytesType = GoogleFirestoreAdminV1Progress::class;
  protected $progressBytesDataType = '';
  protected $progressDocumentsType = GoogleFirestoreAdminV1Progress::class;
  protected $progressDocumentsDataType = '';
  public $startTime;

  public function setCollectionIds($collectionIds)
  {
    $this->collectionIds = $collectionIds;
  }
  public function getCollectionIds()
  {
    return $this->collectionIds;
  }
  public function setEndTime($endTime)
  {
    $this->endTime = $endTime;
  }
  public function getEndTime()
  {
    return $this->endTime;
  }
  public function setInputUriPrefix($inputUriPrefix)
  {
    $this->inputUriPrefix = $inputUriPrefix;
  }
  public function getInputUriPrefix()
  {
    return $this->inputUriPrefix;
  }
  public function setOperationState($operationState)
  {
    $this->operationState = $operationState;
  }
  public function getOperationState()
  {
    return $this->operationState;
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
  public function setStartTime($startTime)
  {
    $this->startTime = $startTime;
  }
  public function getStartTime()
  {
    return $this->startTime;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleFirestoreAdminV1ImportDocumentsMetadata::class, 'Google_Service_Firestore_GoogleFirestoreAdminV1ImportDocumentsMetadata');
