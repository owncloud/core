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

namespace Google\Service\DataCatalog;

class GoogleCloudDatacatalogV1ColumnSchema extends \Google\Collection
{
  protected $collection_key = 'subcolumns';
  /**
   * @var string
   */
  public $column;
  /**
   * @var string
   */
  public $description;
  /**
   * @var string
   */
  public $mode;
  protected $subcolumnsType = GoogleCloudDatacatalogV1ColumnSchema::class;
  protected $subcolumnsDataType = 'array';
  /**
   * @var string
   */
  public $type;

  /**
   * @param string
   */
  public function setColumn($column)
  {
    $this->column = $column;
  }
  /**
   * @return string
   */
  public function getColumn()
  {
    return $this->column;
  }
  /**
   * @param string
   */
  public function setDescription($description)
  {
    $this->description = $description;
  }
  /**
   * @return string
   */
  public function getDescription()
  {
    return $this->description;
  }
  /**
   * @param string
   */
  public function setMode($mode)
  {
    $this->mode = $mode;
  }
  /**
   * @return string
   */
  public function getMode()
  {
    return $this->mode;
  }
  /**
   * @param GoogleCloudDatacatalogV1ColumnSchema[]
   */
  public function setSubcolumns($subcolumns)
  {
    $this->subcolumns = $subcolumns;
  }
  /**
   * @return GoogleCloudDatacatalogV1ColumnSchema[]
   */
  public function getSubcolumns()
  {
    return $this->subcolumns;
  }
  /**
   * @param string
   */
  public function setType($type)
  {
    $this->type = $type;
  }
  /**
   * @return string
   */
  public function getType()
  {
    return $this->type;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDatacatalogV1ColumnSchema::class, 'Google_Service_DataCatalog_GoogleCloudDatacatalogV1ColumnSchema');
