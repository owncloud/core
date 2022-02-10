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

namespace Google\Service\Slides;

class UpdateTableRowPropertiesRequest extends \Google\Collection
{
  protected $collection_key = 'rowIndices';
  /**
   * @var string
   */
  public $fields;
  /**
   * @var string
   */
  public $objectId;
  /**
   * @var int[]
   */
  public $rowIndices;
  protected $tableRowPropertiesType = TableRowProperties::class;
  protected $tableRowPropertiesDataType = '';

  /**
   * @param string
   */
  public function setFields($fields)
  {
    $this->fields = $fields;
  }
  /**
   * @return string
   */
  public function getFields()
  {
    return $this->fields;
  }
  /**
   * @param string
   */
  public function setObjectId($objectId)
  {
    $this->objectId = $objectId;
  }
  /**
   * @return string
   */
  public function getObjectId()
  {
    return $this->objectId;
  }
  /**
   * @param int[]
   */
  public function setRowIndices($rowIndices)
  {
    $this->rowIndices = $rowIndices;
  }
  /**
   * @return int[]
   */
  public function getRowIndices()
  {
    return $this->rowIndices;
  }
  /**
   * @param TableRowProperties
   */
  public function setTableRowProperties(TableRowProperties $tableRowProperties)
  {
    $this->tableRowProperties = $tableRowProperties;
  }
  /**
   * @return TableRowProperties
   */
  public function getTableRowProperties()
  {
    return $this->tableRowProperties;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(UpdateTableRowPropertiesRequest::class, 'Google_Service_Slides_UpdateTableRowPropertiesRequest');
