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

class Google_Service_Directory_BatchCreatePrintersResponse extends Google_Collection
{
  protected $collection_key = 'printers';
  protected $failuresType = 'Google_Service_Directory_FailureInfo';
  protected $failuresDataType = 'array';
  protected $printersType = 'Google_Service_Directory_Printer';
  protected $printersDataType = 'array';

  /**
   * @param Google_Service_Directory_FailureInfo[]
   */
  public function setFailures($failures)
  {
    $this->failures = $failures;
  }
  /**
   * @return Google_Service_Directory_FailureInfo[]
   */
  public function getFailures()
  {
    return $this->failures;
  }
  /**
   * @param Google_Service_Directory_Printer[]
   */
  public function setPrinters($printers)
  {
    $this->printers = $printers;
  }
  /**
   * @return Google_Service_Directory_Printer[]
   */
  public function getPrinters()
  {
    return $this->printers;
  }
}
