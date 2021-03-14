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

class Google_Service_DataprocMetastore_MetadataExport extends Google_Model
{
  public $databaseDumpType;
  public $destinationGcsUri;
  public $endTime;
  public $startTime;
  public $state;

  public function setDatabaseDumpType($databaseDumpType)
  {
    $this->databaseDumpType = $databaseDumpType;
  }
  public function getDatabaseDumpType()
  {
    return $this->databaseDumpType;
  }
  public function setDestinationGcsUri($destinationGcsUri)
  {
    $this->destinationGcsUri = $destinationGcsUri;
  }
  public function getDestinationGcsUri()
  {
    return $this->destinationGcsUri;
  }
  public function setEndTime($endTime)
  {
    $this->endTime = $endTime;
  }
  public function getEndTime()
  {
    return $this->endTime;
  }
  public function setStartTime($startTime)
  {
    $this->startTime = $startTime;
  }
  public function getStartTime()
  {
    return $this->startTime;
  }
  public function setState($state)
  {
    $this->state = $state;
  }
  public function getState()
  {
    return $this->state;
  }
}
