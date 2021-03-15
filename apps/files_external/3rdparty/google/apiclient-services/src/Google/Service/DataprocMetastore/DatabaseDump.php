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

class Google_Service_DataprocMetastore_DatabaseDump extends Google_Model
{
  public $databaseType;
  public $gcsUri;
  public $sourceDatabase;
  public $type;

  public function setDatabaseType($databaseType)
  {
    $this->databaseType = $databaseType;
  }
  public function getDatabaseType()
  {
    return $this->databaseType;
  }
  public function setGcsUri($gcsUri)
  {
    $this->gcsUri = $gcsUri;
  }
  public function getGcsUri()
  {
    return $this->gcsUri;
  }
  public function setSourceDatabase($sourceDatabase)
  {
    $this->sourceDatabase = $sourceDatabase;
  }
  public function getSourceDatabase()
  {
    return $this->sourceDatabase;
  }
  public function setType($type)
  {
    $this->type = $type;
  }
  public function getType()
  {
    return $this->type;
  }
}
