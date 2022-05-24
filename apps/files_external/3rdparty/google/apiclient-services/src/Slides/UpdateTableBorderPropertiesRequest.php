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

class UpdateTableBorderPropertiesRequest extends \Google\Model
{
  /**
   * @var string
   */
  public $borderPosition;
  /**
   * @var string
   */
  public $fields;
  /**
   * @var string
   */
  public $objectId;
  protected $tableBorderPropertiesType = TableBorderProperties::class;
  protected $tableBorderPropertiesDataType = '';
  protected $tableRangeType = TableRange::class;
  protected $tableRangeDataType = '';

  /**
   * @param string
   */
  public function setBorderPosition($borderPosition)
  {
    $this->borderPosition = $borderPosition;
  }
  /**
   * @return string
   */
  public function getBorderPosition()
  {
    return $this->borderPosition;
  }
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
   * @param TableBorderProperties
   */
  public function setTableBorderProperties(TableBorderProperties $tableBorderProperties)
  {
    $this->tableBorderProperties = $tableBorderProperties;
  }
  /**
   * @return TableBorderProperties
   */
  public function getTableBorderProperties()
  {
    return $this->tableBorderProperties;
  }
  /**
   * @param TableRange
   */
  public function setTableRange(TableRange $tableRange)
  {
    $this->tableRange = $tableRange;
  }
  /**
   * @return TableRange
   */
  public function getTableRange()
  {
    return $this->tableRange;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(UpdateTableBorderPropertiesRequest::class, 'Google_Service_Slides_UpdateTableBorderPropertiesRequest');
