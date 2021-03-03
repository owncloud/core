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

class Google_Service_Compute_InitialStateConfig extends Google_Collection
{
  protected $collection_key = 'keks';
  protected $dbsType = 'Google_Service_Compute_FileContentBuffer';
  protected $dbsDataType = 'array';
  protected $dbxsType = 'Google_Service_Compute_FileContentBuffer';
  protected $dbxsDataType = 'array';
  protected $keksType = 'Google_Service_Compute_FileContentBuffer';
  protected $keksDataType = 'array';
  protected $pkType = 'Google_Service_Compute_FileContentBuffer';
  protected $pkDataType = '';

  /**
   * @param Google_Service_Compute_FileContentBuffer[]
   */
  public function setDbs($dbs)
  {
    $this->dbs = $dbs;
  }
  /**
   * @return Google_Service_Compute_FileContentBuffer[]
   */
  public function getDbs()
  {
    return $this->dbs;
  }
  /**
   * @param Google_Service_Compute_FileContentBuffer[]
   */
  public function setDbxs($dbxs)
  {
    $this->dbxs = $dbxs;
  }
  /**
   * @return Google_Service_Compute_FileContentBuffer[]
   */
  public function getDbxs()
  {
    return $this->dbxs;
  }
  /**
   * @param Google_Service_Compute_FileContentBuffer[]
   */
  public function setKeks($keks)
  {
    $this->keks = $keks;
  }
  /**
   * @return Google_Service_Compute_FileContentBuffer[]
   */
  public function getKeks()
  {
    return $this->keks;
  }
  /**
   * @param Google_Service_Compute_FileContentBuffer
   */
  public function setPk(Google_Service_Compute_FileContentBuffer $pk)
  {
    $this->pk = $pk;
  }
  /**
   * @return Google_Service_Compute_FileContentBuffer
   */
  public function getPk()
  {
    return $this->pk;
  }
}
