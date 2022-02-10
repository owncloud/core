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

namespace Google\Service\Sheets;

class GridProperties extends \Google\Model
{
  /**
   * @var int
   */
  public $columnCount;
  /**
   * @var bool
   */
  public $columnGroupControlAfter;
  /**
   * @var int
   */
  public $frozenColumnCount;
  /**
   * @var int
   */
  public $frozenRowCount;
  /**
   * @var bool
   */
  public $hideGridlines;
  /**
   * @var int
   */
  public $rowCount;
  /**
   * @var bool
   */
  public $rowGroupControlAfter;

  /**
   * @param int
   */
  public function setColumnCount($columnCount)
  {
    $this->columnCount = $columnCount;
  }
  /**
   * @return int
   */
  public function getColumnCount()
  {
    return $this->columnCount;
  }
  /**
   * @param bool
   */
  public function setColumnGroupControlAfter($columnGroupControlAfter)
  {
    $this->columnGroupControlAfter = $columnGroupControlAfter;
  }
  /**
   * @return bool
   */
  public function getColumnGroupControlAfter()
  {
    return $this->columnGroupControlAfter;
  }
  /**
   * @param int
   */
  public function setFrozenColumnCount($frozenColumnCount)
  {
    $this->frozenColumnCount = $frozenColumnCount;
  }
  /**
   * @return int
   */
  public function getFrozenColumnCount()
  {
    return $this->frozenColumnCount;
  }
  /**
   * @param int
   */
  public function setFrozenRowCount($frozenRowCount)
  {
    $this->frozenRowCount = $frozenRowCount;
  }
  /**
   * @return int
   */
  public function getFrozenRowCount()
  {
    return $this->frozenRowCount;
  }
  /**
   * @param bool
   */
  public function setHideGridlines($hideGridlines)
  {
    $this->hideGridlines = $hideGridlines;
  }
  /**
   * @return bool
   */
  public function getHideGridlines()
  {
    return $this->hideGridlines;
  }
  /**
   * @param int
   */
  public function setRowCount($rowCount)
  {
    $this->rowCount = $rowCount;
  }
  /**
   * @return int
   */
  public function getRowCount()
  {
    return $this->rowCount;
  }
  /**
   * @param bool
   */
  public function setRowGroupControlAfter($rowGroupControlAfter)
  {
    $this->rowGroupControlAfter = $rowGroupControlAfter;
  }
  /**
   * @return bool
   */
  public function getRowGroupControlAfter()
  {
    return $this->rowGroupControlAfter;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GridProperties::class, 'Google_Service_Sheets_GridProperties');
