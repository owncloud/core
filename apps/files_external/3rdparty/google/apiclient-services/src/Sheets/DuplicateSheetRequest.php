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

class DuplicateSheetRequest extends \Google\Model
{
  /**
   * @var int
   */
  public $insertSheetIndex;
  /**
   * @var int
   */
  public $newSheetId;
  /**
   * @var string
   */
  public $newSheetName;
  /**
   * @var int
   */
  public $sourceSheetId;

  /**
   * @param int
   */
  public function setInsertSheetIndex($insertSheetIndex)
  {
    $this->insertSheetIndex = $insertSheetIndex;
  }
  /**
   * @return int
   */
  public function getInsertSheetIndex()
  {
    return $this->insertSheetIndex;
  }
  /**
   * @param int
   */
  public function setNewSheetId($newSheetId)
  {
    $this->newSheetId = $newSheetId;
  }
  /**
   * @return int
   */
  public function getNewSheetId()
  {
    return $this->newSheetId;
  }
  /**
   * @param string
   */
  public function setNewSheetName($newSheetName)
  {
    $this->newSheetName = $newSheetName;
  }
  /**
   * @return string
   */
  public function getNewSheetName()
  {
    return $this->newSheetName;
  }
  /**
   * @param int
   */
  public function setSourceSheetId($sourceSheetId)
  {
    $this->sourceSheetId = $sourceSheetId;
  }
  /**
   * @return int
   */
  public function getSourceSheetId()
  {
    return $this->sourceSheetId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DuplicateSheetRequest::class, 'Google_Service_Sheets_DuplicateSheetRequest');
