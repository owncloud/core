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

class BatchClearValuesByDataFilterResponse extends \Google\Collection
{
  protected $collection_key = 'clearedRanges';
  /**
   * @var string[]
   */
  public $clearedRanges;
  /**
   * @var string
   */
  public $spreadsheetId;

  /**
   * @param string[]
   */
  public function setClearedRanges($clearedRanges)
  {
    $this->clearedRanges = $clearedRanges;
  }
  /**
   * @return string[]
   */
  public function getClearedRanges()
  {
    return $this->clearedRanges;
  }
  /**
   * @param string
   */
  public function setSpreadsheetId($spreadsheetId)
  {
    $this->spreadsheetId = $spreadsheetId;
  }
  /**
   * @return string
   */
  public function getSpreadsheetId()
  {
    return $this->spreadsheetId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(BatchClearValuesByDataFilterResponse::class, 'Google_Service_Sheets_BatchClearValuesByDataFilterResponse');
