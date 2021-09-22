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

namespace Google\Service\Area120Tables;

class Table extends \Google\Collection
{
  protected $collection_key = 'savedViews';
  protected $columnsType = ColumnDescription::class;
  protected $columnsDataType = 'array';
  public $createTime;
  public $displayName;
  public $name;
  protected $savedViewsType = SavedView::class;
  protected $savedViewsDataType = 'array';
  public $updateTime;

  /**
   * @param ColumnDescription[]
   */
  public function setColumns($columns)
  {
    $this->columns = $columns;
  }
  /**
   * @return ColumnDescription[]
   */
  public function getColumns()
  {
    return $this->columns;
  }
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  public function getCreateTime()
  {
    return $this->createTime;
  }
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
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
   * @param SavedView[]
   */
  public function setSavedViews($savedViews)
  {
    $this->savedViews = $savedViews;
  }
  /**
   * @return SavedView[]
   */
  public function getSavedViews()
  {
    return $this->savedViews;
  }
  public function setUpdateTime($updateTime)
  {
    $this->updateTime = $updateTime;
  }
  public function getUpdateTime()
  {
    return $this->updateTime;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Table::class, 'Google_Service_Area120Tables_Table');
