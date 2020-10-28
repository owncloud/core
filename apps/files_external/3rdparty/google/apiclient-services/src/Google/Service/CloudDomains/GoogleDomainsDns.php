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

class Google_Service_CloudDomains_GoogleDomainsDns extends Google_Collection
{
  protected $collection_key = 'nameServers';
  protected $dsRecordsType = 'Google_Service_CloudDomains_DsRecord';
  protected $dsRecordsDataType = 'array';
  public $dsState;
  public $nameServers;

  /**
   * @param Google_Service_CloudDomains_DsRecord
   */
  public function setDsRecords($dsRecords)
  {
    $this->dsRecords = $dsRecords;
  }
  /**
   * @return Google_Service_CloudDomains_DsRecord
   */
  public function getDsRecords()
  {
    return $this->dsRecords;
  }
  public function setDsState($dsState)
  {
    $this->dsState = $dsState;
  }
  public function getDsState()
  {
    return $this->dsState;
  }
  public function setNameServers($nameServers)
  {
    $this->nameServers = $nameServers;
  }
  public function getNameServers()
  {
    return $this->nameServers;
  }
}
