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

namespace Google\Service\CloudFilestore;

class FileShareConfig extends \Google\Collection
{
  protected $collection_key = 'nfsExportOptions';
  public $capacityGb;
  public $name;
  protected $nfsExportOptionsType = NfsExportOptions::class;
  protected $nfsExportOptionsDataType = 'array';
  public $sourceBackup;

  public function setCapacityGb($capacityGb)
  {
    $this->capacityGb = $capacityGb;
  }
  public function getCapacityGb()
  {
    return $this->capacityGb;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param NfsExportOptions[]
   */
  public function setNfsExportOptions($nfsExportOptions)
  {
    $this->nfsExportOptions = $nfsExportOptions;
  }
  /**
   * @return NfsExportOptions[]
   */
  public function getNfsExportOptions()
  {
    return $this->nfsExportOptions;
  }
  public function setSourceBackup($sourceBackup)
  {
    $this->sourceBackup = $sourceBackup;
  }
  public function getSourceBackup()
  {
    return $this->sourceBackup;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(FileShareConfig::class, 'Google_Service_CloudFilestore_FileShareConfig');
