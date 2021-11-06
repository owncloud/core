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

namespace Google\Service\Spanner;

class Mutation extends \Google\Model
{
  protected $deleteType = Delete::class;
  protected $deleteDataType = '';
  protected $insertType = Write::class;
  protected $insertDataType = '';
  protected $insertOrUpdateType = Write::class;
  protected $insertOrUpdateDataType = '';
  protected $replaceType = Write::class;
  protected $replaceDataType = '';
  protected $updateType = Write::class;
  protected $updateDataType = '';

  /**
   * @param Delete
   */
  public function setDelete(Delete $delete)
  {
    $this->delete = $delete;
  }
  /**
   * @return Delete
   */
  public function getDelete()
  {
    return $this->delete;
  }
  /**
   * @param Write
   */
  public function setInsert(Write $insert)
  {
    $this->insert = $insert;
  }
  /**
   * @return Write
   */
  public function getInsert()
  {
    return $this->insert;
  }
  /**
   * @param Write
   */
  public function setInsertOrUpdate(Write $insertOrUpdate)
  {
    $this->insertOrUpdate = $insertOrUpdate;
  }
  /**
   * @return Write
   */
  public function getInsertOrUpdate()
  {
    return $this->insertOrUpdate;
  }
  /**
   * @param Write
   */
  public function setReplace(Write $replace)
  {
    $this->replace = $replace;
  }
  /**
   * @return Write
   */
  public function getReplace()
  {
    return $this->replace;
  }
  /**
   * @param Write
   */
  public function setUpdate(Write $update)
  {
    $this->update = $update;
  }
  /**
   * @return Write
   */
  public function getUpdate()
  {
    return $this->update;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Mutation::class, 'Google_Service_Spanner_Mutation');
