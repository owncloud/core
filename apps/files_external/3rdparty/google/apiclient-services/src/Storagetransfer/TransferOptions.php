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

class TransferOptions extends \Google\Model
{
  /**
   * @var bool
   */
  public $deleteObjectsFromSourceAfterTransfer;
  /**
   * @var bool
   */
  public $deleteObjectsUniqueInSink;
  protected $metadataOptionsType = MetadataOptions::class;
  protected $metadataOptionsDataType = '';
  /**
   * @var bool
   */
  public $overwriteObjectsAlreadyExistingInSink;

  /**
   * @param bool
   */
  public function setDeleteObjectsFromSourceAfterTransfer($deleteObjectsFromSourceAfterTransfer)
  {
    $this->deleteObjectsFromSourceAfterTransfer = $deleteObjectsFromSourceAfterTransfer;
  }
  /**
   * @return bool
   */
  public function getDeleteObjectsFromSourceAfterTransfer()
  {
    return $this->deleteObjectsFromSourceAfterTransfer;
  }
  /**
   * @param bool
   */
  public function setDeleteObjectsUniqueInSink($deleteObjectsUniqueInSink)
  {
    $this->deleteObjectsUniqueInSink = $deleteObjectsUniqueInSink;
  }
  /**
   * @return bool
   */
  public function getDeleteObjectsUniqueInSink()
  {
    return $this->deleteObjectsUniqueInSink;
  }
  /**
   * @param MetadataOptions
   */
  public function setMetadataOptions(MetadataOptions $metadataOptions)
  {
    $this->metadataOptions = $metadataOptions;
  }
  /**
   * @return MetadataOptions
   */
  public function getMetadataOptions()
  {
    return $this->metadataOptions;
  }
  /**
   * @param bool
   */
  public function setOverwriteObjectsAlreadyExistingInSink($overwriteObjectsAlreadyExistingInSink)
  {
    $this->overwriteObjectsAlreadyExistingInSink = $overwriteObjectsAlreadyExistingInSink;
  }
  /**
   * @return bool
   */
  public function getOverwriteObjectsAlreadyExistingInSink()
  {
    return $this->overwriteObjectsAlreadyExistingInSink;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(TransferOptions::class, 'Google_Service_Storagetransfer_TransferOptions');
