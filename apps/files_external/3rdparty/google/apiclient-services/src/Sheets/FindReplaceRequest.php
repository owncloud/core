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

class FindReplaceRequest extends \Google\Model
{
  /**
   * @var bool
   */
  public $allSheets;
  /**
   * @var string
   */
  public $find;
  /**
   * @var bool
   */
  public $includeFormulas;
  /**
   * @var bool
   */
  public $matchCase;
  /**
   * @var bool
   */
  public $matchEntireCell;
  protected $rangeType = GridRange::class;
  protected $rangeDataType = '';
  /**
   * @var string
   */
  public $replacement;
  /**
   * @var bool
   */
  public $searchByRegex;
  /**
   * @var int
   */
  public $sheetId;

  /**
   * @param bool
   */
  public function setAllSheets($allSheets)
  {
    $this->allSheets = $allSheets;
  }
  /**
   * @return bool
   */
  public function getAllSheets()
  {
    return $this->allSheets;
  }
  /**
   * @param string
   */
  public function setFind($find)
  {
    $this->find = $find;
  }
  /**
   * @return string
   */
  public function getFind()
  {
    return $this->find;
  }
  /**
   * @param bool
   */
  public function setIncludeFormulas($includeFormulas)
  {
    $this->includeFormulas = $includeFormulas;
  }
  /**
   * @return bool
   */
  public function getIncludeFormulas()
  {
    return $this->includeFormulas;
  }
  /**
   * @param bool
   */
  public function setMatchCase($matchCase)
  {
    $this->matchCase = $matchCase;
  }
  /**
   * @return bool
   */
  public function getMatchCase()
  {
    return $this->matchCase;
  }
  /**
   * @param bool
   */
  public function setMatchEntireCell($matchEntireCell)
  {
    $this->matchEntireCell = $matchEntireCell;
  }
  /**
   * @return bool
   */
  public function getMatchEntireCell()
  {
    return $this->matchEntireCell;
  }
  /**
   * @param GridRange
   */
  public function setRange(GridRange $range)
  {
    $this->range = $range;
  }
  /**
   * @return GridRange
   */
  public function getRange()
  {
    return $this->range;
  }
  /**
   * @param string
   */
  public function setReplacement($replacement)
  {
    $this->replacement = $replacement;
  }
  /**
   * @return string
   */
  public function getReplacement()
  {
    return $this->replacement;
  }
  /**
   * @param bool
   */
  public function setSearchByRegex($searchByRegex)
  {
    $this->searchByRegex = $searchByRegex;
  }
  /**
   * @return bool
   */
  public function getSearchByRegex()
  {
    return $this->searchByRegex;
  }
  /**
   * @param int
   */
  public function setSheetId($sheetId)
  {
    $this->sheetId = $sheetId;
  }
  /**
   * @return int
   */
  public function getSheetId()
  {
    return $this->sheetId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(FindReplaceRequest::class, 'Google_Service_Sheets_FindReplaceRequest');
