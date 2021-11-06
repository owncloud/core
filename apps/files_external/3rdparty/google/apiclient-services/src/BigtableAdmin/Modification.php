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

namespace Google\Service\BigtableAdmin;

class Modification extends \Google\Model
{
  protected $createType = ColumnFamily::class;
  protected $createDataType = '';
  public $drop;
  public $id;
  protected $updateType = ColumnFamily::class;
  protected $updateDataType = '';

  /**
   * @param ColumnFamily
   */
  public function setCreate(ColumnFamily $create)
  {
    $this->create = $create;
  }
  /**
   * @return ColumnFamily
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
   * @param ColumnFamily
   */
  public function setUpdate(ColumnFamily $update)
  {
    $this->update = $update;
  }
  /**
   * @return ColumnFamily
   */
  public function getUpdate()
  {
    return $this->update;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Modification::class, 'Google_Service_BigtableAdmin_Modification');
