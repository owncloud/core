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

namespace Google\Service\Sheets\Resource;

use Google\Service\Sheets\CopySheetToAnotherSpreadsheetRequest;
use Google\Service\Sheets\SheetProperties;

/**
 * The "sheets" collection of methods.
 * Typical usage is:
 *  <code>
 *   $sheetsService = new Google\Service\Sheets(...);
 *   $sheets = $sheetsService->sheets;
 *  </code>
 */
class SpreadsheetsSheets extends \Google\Service\Resource
{
  /**
   * Copies a single sheet from a spreadsheet to another spreadsheet. Returns the
   * properties of the newly created sheet. (sheets.copyTo)
   *
   * @param string $spreadsheetId The ID of the spreadsheet containing the sheet
   * to copy.
   * @param int $sheetId The ID of the sheet to copy.
   * @param CopySheetToAnotherSpreadsheetRequest $postBody
   * @param array $optParams Optional parameters.
   * @return SheetProperties
   */
  public function copyTo($spreadsheetId, $sheetId, CopySheetToAnotherSpreadsheetRequest $postBody, $optParams = [])
  {
    $params = ['spreadsheetId' => $spreadsheetId, 'sheetId' => $sheetId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('copyTo', [$params], SheetProperties::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SpreadsheetsSheets::class, 'Google_Service_Sheets_Resource_SpreadsheetsSheets');
