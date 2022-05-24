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

class DataTransfer extends \Google\Collection
{
  protected $collection_key = 'applicationDataTransfers';
  protected $applicationDataTransfersType = ApplicationDataTransfer::class;
  protected $applicationDataTransfersDataType = 'array';
  /**
   * @var string
   */
  public $etag;
  /**
   * @var string
   */
  public $id;
  /**
   * @var string
   */
  public $kind;
  /**
   * @var string
   */
  public $newOwnerUserId;
  /**
   * @var string
   */
  public $oldOwnerUserId;
  /**
   * @var string
   */
  public $overallTransferStatusCode;
  /**
   * @var string
   */
  public $requestTime;

  /**
   * @param ApplicationDataTransfer[]
   */
  public function setApplicationDataTransfers($applicationDataTransfers)
  {
    $this->applicationDataTransfers = $applicationDataTransfers;
  }
  /**
   * @return ApplicationDataTransfer[]
   */
  public function getApplicationDataTransfers()
  {
    return $this->applicationDataTransfers;
  }
  /**
   * @param string
   */
  public function setEtag($etag)
  {
    $this->etag = $etag;
  }
  /**
   * @return string
   */
  public function getEtag()
  {
    return $this->etag;
  }
  /**
   * @param string
   */
  public function setId($id)
  {
    $this->id = $id;
  }
  /**
   * @return string
   */
  public function getId()
  {
    return $this->id;
  }
  /**
   * @param string
   */
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  /**
   * @return string
   */
  public function getKind()
  {
    return $this->kind;
  }
  /**
   * @param string
   */
  public function setNewOwnerUserId($newOwnerUserId)
  {
    $this->newOwnerUserId = $newOwnerUserId;
  }
  /**
   * @return string
   */
  public function getNewOwnerUserId()
  {
    return $this->newOwnerUserId;
  }
  /**
   * @param string
   */
  public function setOldOwnerUserId($oldOwnerUserId)
  {
    $this->oldOwnerUserId = $oldOwnerUserId;
  }
  /**
   * @return string
   */
  public function getOldOwnerUserId()
  {
    return $this->oldOwnerUserId;
  }
  /**
   * @param string
   */
  public function setOverallTransferStatusCode($overallTransferStatusCode)
  {
    $this->overallTransferStatusCode = $overallTransferStatusCode;
  }
  /**
   * @return string
   */
  public function getOverallTransferStatusCode()
  {
    return $this->overallTransferStatusCode;
  }
  /**
   * @param string
   */
  public function setRequestTime($requestTime)
  {
    $this->requestTime = $requestTime;
  }
  /**
   * @return string
   */
  public function getRequestTime()
  {
    return $this->requestTime;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DataTransfer::class, 'Google_Service_DataTransfer_DataTransfer');
