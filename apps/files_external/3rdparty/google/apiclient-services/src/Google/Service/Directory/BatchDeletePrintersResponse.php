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

class Google_Service_Directory_BatchDeletePrintersResponse extends Google_Collection
{
  protected $collection_key = 'printerIds';
  protected $failedPrintersType = 'Google_Service_Directory_FailureInfo';
  protected $failedPrintersDataType = 'array';
  public $printerIds;

  /**
   * @param Google_Service_Directory_FailureInfo[]
   */
  public function setFailedPrinters($failedPrinters)
  {
    $this->failedPrinters = $failedPrinters;
  }
  /**
   * @return Google_Service_Directory_FailureInfo[]
   */
  public function getFailedPrinters()
  {
    return $this->failedPrinters;
  }
  public function setPrinterIds($printerIds)
  {
    $this->printerIds = $printerIds;
  }
  public function getPrinterIds()
  {
    return $this->printerIds;
  }
}
