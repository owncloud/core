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

class BatchDeletePrintServersResponse extends \Google\Collection
{
  protected $collection_key = 'printServerIds';
  protected $failedPrintServersType = PrintServerFailureInfo::class;
  protected $failedPrintServersDataType = 'array';
  /**
   * @var string[]
   */
  public $printServerIds;

  /**
   * @param PrintServerFailureInfo[]
   */
  public function setFailedPrintServers($failedPrintServers)
  {
    $this->failedPrintServers = $failedPrintServers;
  }
  /**
   * @return PrintServerFailureInfo[]
   */
  public function getFailedPrintServers()
  {
    return $this->failedPrintServers;
  }
  /**
   * @param string[]
   */
  public function setPrintServerIds($printServerIds)
  {
    $this->printServerIds = $printServerIds;
  }
  /**
   * @return string[]
   */
  public function getPrintServerIds()
  {
    return $this->printServerIds;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(BatchDeletePrintServersResponse::class, 'Google_Service_Directory_BatchDeletePrintServersResponse');
