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

namespace Google\Service\Compute;

class InitialStateConfig extends \Google\Collection
{
  protected $collection_key = 'keks';
  protected $dbsType = FileContentBuffer::class;
  protected $dbsDataType = 'array';
  protected $dbxsType = FileContentBuffer::class;
  protected $dbxsDataType = 'array';
  protected $keksType = FileContentBuffer::class;
  protected $keksDataType = 'array';
  protected $pkType = FileContentBuffer::class;
  protected $pkDataType = '';

  /**
   * @param FileContentBuffer[]
   */
  public function setDbs($dbs)
  {
    $this->dbs = $dbs;
  }
  /**
   * @return FileContentBuffer[]
   */
  public function getDbs()
  {
    return $this->dbs;
  }
  /**
   * @param FileContentBuffer[]
   */
  public function setDbxs($dbxs)
  {
    $this->dbxs = $dbxs;
  }
  /**
   * @return FileContentBuffer[]
   */
  public function getDbxs()
  {
    return $this->dbxs;
  }
  /**
   * @param FileContentBuffer[]
   */
  public function setKeks($keks)
  {
    $this->keks = $keks;
  }
  /**
   * @return FileContentBuffer[]
   */
  public function getKeks()
  {
    return $this->keks;
  }
  /**
   * @param FileContentBuffer
   */
  public function setPk(FileContentBuffer $pk)
  {
    $this->pk = $pk;
  }
  /**
   * @return FileContentBuffer
   */
  public function getPk()
  {
    return $this->pk;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(InitialStateConfig::class, 'Google_Service_Compute_InitialStateConfig');
