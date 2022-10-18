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

class BatchCreatePrintServersResponse extends \Google\Collection
{
  protected $collection_key = 'printServers';
  protected $failuresType = PrintServerFailureInfo::class;
  protected $failuresDataType = 'array';
  protected $printServersType = PrintServer::class;
  protected $printServersDataType = 'array';

  /**
   * @param PrintServerFailureInfo[]
   */
  public function setFailures($failures)
  {
    $this->failures = $failures;
  }
  /**
   * @return PrintServerFailureInfo[]
   */
  public function getFailures()
  {
    return $this->failures;
  }
  /**
   * @param PrintServer[]
   */
  public function setPrintServers($printServers)
  {
    $this->printServers = $printServers;
  }
  /**
   * @return PrintServer[]
   */
  public function getPrintServers()
  {
    return $this->printServers;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(BatchCreatePrintServersResponse::class, 'Google_Service_Directory_BatchCreatePrintServersResponse');
