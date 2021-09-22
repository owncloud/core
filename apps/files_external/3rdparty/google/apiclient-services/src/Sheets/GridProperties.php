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
  public $columnCount;
  public $columnGroupControlAfter;
  public $frozenColumnCount;
  public $frozenRowCount;
  public $hideGridlines;
  public $rowCount;
  public $rowGroupControlAfter;

  public function setColumnCount($columnCount)
  {
    $this->columnCount = $columnCount;
  }
  public function getColumnCount()
  {
    return $this->columnCount;
  }
  public function setColumnGroupControlAfter($columnGroupControlAfter)
  {
    $this->columnGroupControlAfter = $columnGroupControlAfter;
  }
  public function getColumnGroupControlAfter()
  {
    return $this->columnGroupControlAfter;
  }
  public function setFrozenColumnCount($frozenColumnCount)
  {
    $this->frozenColumnCount = $frozenColumnCount;
  }
  public function getFrozenColumnCount()
  {
    return $this->frozenColumnCount;
  }
  public function setFrozenRowCount($frozenRowCount)
  {
    $this->frozenRowCount = $frozenRowCount;
  }
  public function getFrozenRowCount()
  {
    return $this->frozenRowCount;
  }
  public function setHideGridlines($hideGridlines)
  {
    $this->hideGridlines = $hideGridlines;
  }
  public function getHideGridlines()
  {
    return $this->hideGridlines;
  }
  public function setRowCount($rowCount)
  {
    $this->rowCount = $rowCount;
  }
  public function getRowCount()
  {
    return $this->rowCount;
  }
  public function setRowGroupControlAfter($rowGroupControlAfter)
  {
    $this->rowGroupControlAfter = $rowGroupControlAfter;
  }
  public function getRowGroupControlAfter()
  {
    return $this->rowGroupControlAfter;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GridProperties::class, 'Google_Service_Sheets_GridProperties');
