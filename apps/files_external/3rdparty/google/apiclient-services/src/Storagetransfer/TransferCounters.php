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

namespace Google\Service\Storagetransfer;

class TransferCounters extends \Google\Model
{
  /**
   * @var string
   */
  public $bytesCopiedToSink;
  /**
   * @var string
   */
  public $bytesDeletedFromSink;
  /**
   * @var string
   */
  public $bytesDeletedFromSource;
  /**
   * @var string
   */
  public $bytesFailedToDeleteFromSink;
  /**
   * @var string
   */
  public $bytesFoundFromSource;
  /**
   * @var string
   */
  public $bytesFoundOnlyFromSink;
  /**
   * @var string
   */
  public $bytesFromSourceFailed;
  /**
   * @var string
   */
  public $bytesFromSourceSkippedBySync;
  /**
   * @var string
   */
  public $directoriesFailedToListFromSource;
  /**
   * @var string
   */
  public $directoriesFoundFromSource;
  /**
   * @var string
   */
  public $directoriesSuccessfullyListedFromSource;
  /**
   * @var string
   */
  public $intermediateObjectsCleanedUp;
  /**
   * @var string
   */
  public $intermediateObjectsFailedCleanedUp;
  /**
   * @var string
   */
  public $objectsCopiedToSink;
  /**
   * @var string
   */
  public $objectsDeletedFromSink;
  /**
   * @var string
   */
  public $objectsDeletedFromSource;
  /**
   * @var string
   */
  public $objectsFailedToDeleteFromSink;
  /**
   * @var string
   */
  public $objectsFoundFromSource;
  /**
   * @var string
   */
  public $objectsFoundOnlyFromSink;
  /**
   * @var string
   */
  public $objectsFromSourceFailed;
  /**
   * @var string
   */
  public $objectsFromSourceSkippedBySync;

  /**
   * @param string
   */
  public function setBytesCopiedToSink($bytesCopiedToSink)
  {
    $this->bytesCopiedToSink = $bytesCopiedToSink;
  }
  /**
   * @return string
   */
  public function getBytesCopiedToSink()
  {
    return $this->bytesCopiedToSink;
  }
  /**
   * @param string
   */
  public function setBytesDeletedFromSink($bytesDeletedFromSink)
  {
    $this->bytesDeletedFromSink = $bytesDeletedFromSink;
  }
  /**
   * @return string
   */
  public function getBytesDeletedFromSink()
  {
    return $this->bytesDeletedFromSink;
  }
  /**
   * @param string
   */
  public function setBytesDeletedFromSource($bytesDeletedFromSource)
  {
    $this->bytesDeletedFromSource = $bytesDeletedFromSource;
  }
  /**
   * @return string
   */
  public function getBytesDeletedFromSource()
  {
    return $this->bytesDeletedFromSource;
  }
  /**
   * @param string
   */
  public function setBytesFailedToDeleteFromSink($bytesFailedToDeleteFromSink)
  {
    $this->bytesFailedToDeleteFromSink = $bytesFailedToDeleteFromSink;
  }
  /**
   * @return string
   */
  public function getBytesFailedToDeleteFromSink()
  {
    return $this->bytesFailedToDeleteFromSink;
  }
  /**
   * @param string
   */
  public function setBytesFoundFromSource($bytesFoundFromSource)
  {
    $this->bytesFoundFromSource = $bytesFoundFromSource;
  }
  /**
   * @return string
   */
  public function getBytesFoundFromSource()
  {
    return $this->bytesFoundFromSource;
  }
  /**
   * @param string
   */
  public function setBytesFoundOnlyFromSink($bytesFoundOnlyFromSink)
  {
    $this->bytesFoundOnlyFromSink = $bytesFoundOnlyFromSink;
  }
  /**
   * @return string
   */
  public function getBytesFoundOnlyFromSink()
  {
    return $this->bytesFoundOnlyFromSink;
  }
  /**
   * @param string
   */
  public function setBytesFromSourceFailed($bytesFromSourceFailed)
  {
    $this->bytesFromSourceFailed = $bytesFromSourceFailed;
  }
  /**
   * @return string
   */
  public function getBytesFromSourceFailed()
  {
    return $this->bytesFromSourceFailed;
  }
  /**
   * @param string
   */
  public function setBytesFromSourceSkippedBySync($bytesFromSourceSkippedBySync)
  {
    $this->bytesFromSourceSkippedBySync = $bytesFromSourceSkippedBySync;
  }
  /**
   * @return string
   */
  public function getBytesFromSourceSkippedBySync()
  {
    return $this->bytesFromSourceSkippedBySync;
  }
  /**
   * @param string
   */
  public function setDirectoriesFailedToListFromSource($directoriesFailedToListFromSource)
  {
    $this->directoriesFailedToListFromSource = $directoriesFailedToListFromSource;
  }
  /**
   * @return string
   */
  public function getDirectoriesFailedToListFromSource()
  {
    return $this->directoriesFailedToListFromSource;
  }
  /**
   * @param string
   */
  public function setDirectoriesFoundFromSource($directoriesFoundFromSource)
  {
    $this->directoriesFoundFromSource = $directoriesFoundFromSource;
  }
  /**
   * @return string
   */
  public function getDirectoriesFoundFromSource()
  {
    return $this->directoriesFoundFromSource;
  }
  /**
   * @param string
   */
  public function setDirectoriesSuccessfullyListedFromSource($directoriesSuccessfullyListedFromSource)
  {
    $this->directoriesSuccessfullyListedFromSource = $directoriesSuccessfullyListedFromSource;
  }
  /**
   * @return string
   */
  public function getDirectoriesSuccessfullyListedFromSource()
  {
    return $this->directoriesSuccessfullyListedFromSource;
  }
  /**
   * @param string
   */
  public function setIntermediateObjectsCleanedUp($intermediateObjectsCleanedUp)
  {
    $this->intermediateObjectsCleanedUp = $intermediateObjectsCleanedUp;
  }
  /**
   * @return string
   */
  public function getIntermediateObjectsCleanedUp()
  {
    return $this->intermediateObjectsCleanedUp;
  }
  /**
   * @param string
   */
  public function setIntermediateObjectsFailedCleanedUp($intermediateObjectsFailedCleanedUp)
  {
    $this->intermediateObjectsFailedCleanedUp = $intermediateObjectsFailedCleanedUp;
  }
  /**
   * @return string
   */
  public function getIntermediateObjectsFailedCleanedUp()
  {
    return $this->intermediateObjectsFailedCleanedUp;
  }
  /**
   * @param string
   */
  public function setObjectsCopiedToSink($objectsCopiedToSink)
  {
    $this->objectsCopiedToSink = $objectsCopiedToSink;
  }
  /**
   * @return string
   */
  public function getObjectsCopiedToSink()
  {
    return $this->objectsCopiedToSink;
  }
  /**
   * @param string
   */
  public function setObjectsDeletedFromSink($objectsDeletedFromSink)
  {
    $this->objectsDeletedFromSink = $objectsDeletedFromSink;
  }
  /**
   * @return string
   */
  public function getObjectsDeletedFromSink()
  {
    return $this->objectsDeletedFromSink;
  }
  /**
   * @param string
   */
  public function setObjectsDeletedFromSource($objectsDeletedFromSource)
  {
    $this->objectsDeletedFromSource = $objectsDeletedFromSource;
  }
  /**
   * @return string
   */
  public function getObjectsDeletedFromSource()
  {
    return $this->objectsDeletedFromSource;
  }
  /**
   * @param string
   */
  public function setObjectsFailedToDeleteFromSink($objectsFailedToDeleteFromSink)
  {
    $this->objectsFailedToDeleteFromSink = $objectsFailedToDeleteFromSink;
  }
  /**
   * @return string
   */
  public function getObjectsFailedToDeleteFromSink()
  {
    return $this->objectsFailedToDeleteFromSink;
  }
  /**
   * @param string
   */
  public function setObjectsFoundFromSource($objectsFoundFromSource)
  {
    $this->objectsFoundFromSource = $objectsFoundFromSource;
  }
  /**
   * @return string
   */
  public function getObjectsFoundFromSource()
  {
    return $this->objectsFoundFromSource;
  }
  /**
   * @param string
   */
  public function setObjectsFoundOnlyFromSink($objectsFoundOnlyFromSink)
  {
    $this->objectsFoundOnlyFromSink = $objectsFoundOnlyFromSink;
  }
  /**
   * @return string
   */
  public function getObjectsFoundOnlyFromSink()
  {
    return $this->objectsFoundOnlyFromSink;
  }
  /**
   * @param string
   */
  public function setObjectsFromSourceFailed($objectsFromSourceFailed)
  {
    $this->objectsFromSourceFailed = $objectsFromSourceFailed;
  }
  /**
   * @return string
   */
  public function getObjectsFromSourceFailed()
  {
    return $this->objectsFromSourceFailed;
  }
  /**
   * @param string
   */
  public function setObjectsFromSourceSkippedBySync($objectsFromSourceSkippedBySync)
  {
    $this->objectsFromSourceSkippedBySync = $objectsFromSourceSkippedBySync;
  }
  /**
   * @return string
   */
  public function getObjectsFromSourceSkippedBySync()
  {
    return $this->objectsFromSourceSkippedBySync;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(TransferCounters::class, 'Google_Service_Storagetransfer_TransferCounters');
