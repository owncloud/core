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

namespace Google\Service\Directory;

class BatchDeletePrintersResponse extends \Google\Collection
{
  protected $collection_key = 'printerIds';
  protected $failedPrintersType = FailureInfo::class;
  protected $failedPrintersDataType = 'array';
  /**
   * @var string[]
   */
  public $printerIds;

  /**
   * @param FailureInfo[]
   */
  public function setFailedPrinters($failedPrinters)
  {
    $this->failedPrinters = $failedPrinters;
  }
  /**
   * @return FailureInfo[]
   */
  public function getFailedPrinters()
  {
    return $this->failedPrinters;
  }
  /**
   * @param string[]
   */
  public function setPrinterIds($printerIds)
  {
    $this->printerIds = $printerIds;
  }
  /**
   * @return string[]
   */
  public function getPrinterIds()
  {
    return $this->printerIds;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(BatchDeletePrintersResponse::class, 'Google_Service_Directory_BatchDeletePrintersResponse');
