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

class Google_Service_Sheets_RefreshDataSourceRequest extends Google_Model
{
  public $dataSourceId;
  public $force;
  public $isAll;
  protected $referencesType = 'Google_Service_Sheets_DataSourceObjectReferences';
  protected $referencesDataType = '';

  public function setDataSourceId($dataSourceId)
  {
    $this->dataSourceId = $dataSourceId;
  }
  public function getDataSourceId()
  {
    return $this->dataSourceId;
  }
  public function setForce($force)
  {
    $this->force = $force;
  }
  public function getForce()
  {
    return $this->force;
  }
  public function setIsAll($isAll)
  {
    $this->isAll = $isAll;
  }
  public function getIsAll()
  {
    return $this->isAll;
  }
  /**
   * @param Google_Service_Sheets_DataSourceObjectReferences
   */
  public function setReferences(Google_Service_Sheets_DataSourceObjectReferences $references)
  {
    $this->references = $references;
  }
  /**
   * @return Google_Service_Sheets_DataSourceObjectReferences
   */
  public function getReferences()
  {
    return $this->references;
  }
}
