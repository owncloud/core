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

namespace Google\Service\DataTransfer;

class ApplicationDataTransfer extends \Google\Collection
{
  protected $collection_key = 'applicationTransferParams';
  public $applicationId;
  protected $applicationTransferParamsType = ApplicationTransferParam::class;
  protected $applicationTransferParamsDataType = 'array';
  public $applicationTransferStatus;

  public function setApplicationId($applicationId)
  {
    $this->applicationId = $applicationId;
  }
  public function getApplicationId()
  {
    return $this->applicationId;
  }
  /**
   * @param ApplicationTransferParam[]
   */
  public function setApplicationTransferParams($applicationTransferParams)
  {
    $this->applicationTransferParams = $applicationTransferParams;
  }
  /**
   * @return ApplicationTransferParam[]
   */
  public function getApplicationTransferParams()
  {
    return $this->applicationTransferParams;
  }
  public function setApplicationTransferStatus($applicationTransferStatus)
  {
    $this->applicationTransferStatus = $applicationTransferStatus;
  }
  public function getApplicationTransferStatus()
  {
    return $this->applicationTransferStatus;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ApplicationDataTransfer::class, 'Google_Service_DataTransfer_ApplicationDataTransfer');
