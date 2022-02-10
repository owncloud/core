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

namespace Google\Service\CloudDomains;

class CustomDns extends \Google\Collection
{
  protected $collection_key = 'nameServers';
  protected $dsRecordsType = DsRecord::class;
  protected $dsRecordsDataType = 'array';
  /**
   * @var string[]
   */
  public $nameServers;

  /**
   * @param DsRecord[]
   */
  public function setDsRecords($dsRecords)
  {
    $this->dsRecords = $dsRecords;
  }
  /**
   * @return DsRecord[]
   */
  public function getDsRecords()
  {
    return $this->dsRecords;
  }
  /**
   * @param string[]
   */
  public function setNameServers($nameServers)
  {
    $this->nameServers = $nameServers;
  }
  /**
   * @return string[]
   */
  public function getNameServers()
  {
    return $this->nameServers;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CustomDns::class, 'Google_Service_CloudDomains_CustomDns');
