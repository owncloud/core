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

class Google_Service_BigtableAdmin_Modification extends Google_Model
{
  protected $createType = 'Google_Service_BigtableAdmin_ColumnFamily';
  protected $createDataType = '';
  public $drop;
  public $id;
  protected $updateType = 'Google_Service_BigtableAdmin_ColumnFamily';
  protected $updateDataType = '';

  /**
   * @param Google_Service_BigtableAdmin_ColumnFamily
   */
  public function setCreate(Google_Service_BigtableAdmin_ColumnFamily $create)
  {
    $this->create = $create;
  }
  /**
   * @return Google_Service_BigtableAdmin_ColumnFamily
   */
  public function getCreate()
  {
    return $this->create;
  }
  public function setDrop($drop)
  {
    $this->drop = $drop;
  }
  public function getDrop()
  {
    return $this->drop;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  /**
   * @param Google_Service_BigtableAdmin_ColumnFamily
   */
  public function setUpdate(Google_Service_BigtableAdmin_ColumnFamily $update)
  {
    $this->update = $update;
  }
  /**
   * @return Google_Service_BigtableAdmin_ColumnFamily
   */
  public function getUpdate()
  {
    return $this->update;
  }
}
