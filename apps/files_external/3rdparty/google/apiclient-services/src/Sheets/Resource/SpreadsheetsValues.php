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

use Google\Service\Sheets\AppendValuesResponse;
use Google\Service\Sheets\BatchClearValuesByDataFilterRequest;
use Google\Service\Sheets\BatchClearValuesByDataFilterResponse;
use Google\Service\Sheets\BatchClearValuesRequest;
use Google\Service\Sheets\BatchClearValuesResponse;
use Google\Service\Sheets\BatchGetValuesByDataFilterRequest;
use Google\Service\Sheets\BatchGetValuesByDataFilterResponse;
use Google\Service\Sheets\BatchGetValuesResponse;
use Google\Service\Sheets\BatchUpdateValuesByDataFilterRequest;
use Google\Service\Sheets\BatchUpdateValuesByDataFilterResponse;
use Google\Service\Sheets\BatchUpdateValuesRequest;
use Google\Service\Sheets\BatchUpdateValuesResponse;
use Google\Service\Sheets\ClearValuesRequest;
use Google\Service\Sheets\ClearValuesResponse;
use Google\Service\Sheets\UpdateValuesResponse;
use Google\Service\Sheets\ValueRange;

/**
 * The "values" collection of methods.
 * Typical usage is:
 *  <code>
 *   $sheetsService = new Google\Service\Sheets(...);
 *   $values = $sheetsService->values;
 *  </code>
 */
class SpreadsheetsValues extends \Google\Service\Resource
{
  /**
   * Appends values to a spreadsheet. The input range is used to search for
   * existing data and find a "table" within that range. Values will be appended
   * to the next row of the table, starting with the first column of the table.
   * See the [guide](/sheets/api/guides/values#appending_values) and [sample
   * code](/sheets/api/samples/writing#append_values) for specific details of how
   * tables are detected and data is appended. The caller must specify the
   * spreadsheet ID, range, and a valueInputOption. The `valueInputOption` only
   * controls how the input data will be added to the sheet (column-wise or row-
   * wise), it does not influence what cell the data starts being written to.
   * (values.append)
   *
   * @param string $spreadsheetId The ID of the spreadsheet to update.
   * @param string $range The [A1 notation](/sheets/api/guides/concepts#cell) of a
   * range to search for a logical table of data. Values are appended after the
   * last row of the table.
   * @param ValueRange $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool includeValuesInResponse Determines if the update response
   * should include the values of the cells that were appended. By default,
   * responses do not include the updated values.
   * @opt_param string insertDataOption How the input data should be inserted.
   * @opt_param string responseDateTimeRenderOption Determines how dates, times,
   * and durations in the response should be rendered. This is ignored if
   * response_value_render_option is FORMATTED_VALUE. The default dateTime render
   * option is SERIAL_NUMBER.
   * @opt_param string responseValueRenderOption Determines how values in the
   * response should be rendered. The default render option is FORMATTED_VALUE.
   * @opt_param string valueInputOption How the input data should be interpreted.
   * @return AppendValuesResponse
   */
  public function append($spreadsheetId, $range, ValueRange $postBody, $optParams = [])
  {
    $params = ['spreadsheetId' => $spreadsheetId, 'range' => $range, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('append', [$params], AppendValuesResponse::class);
  }
  /**
   * Clears one or more ranges of values from a spreadsheet. The caller must
   * specify the spreadsheet ID and one or more ranges. Only values are cleared --
   * all other properties of the cell (such as formatting and data validation) are
   * kept. (values.batchClear)
   *
   * @param string $spreadsheetId The ID of the spreadsheet to update.
   * @param BatchClearValuesRequest $postBody
   * @param array $optParams Optional parameters.
   * @return BatchClearValuesResponse
   */
  public function batchClear($spreadsheetId, BatchClearValuesRequest $postBody, $optParams = [])
  {
    $params = ['spreadsheetId' => $spreadsheetId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('batchClear', [$params], BatchClearValuesResponse::class);
  }
  /**
   * Clears one or more ranges of values from a spreadsheet. The caller must
   * specify the spreadsheet ID and one or more DataFilters. Ranges matching any
   * of the specified data filters will be cleared. Only values are cleared -- all
   * other properties of the cell (such as formatting, data validation, etc..) are
   * kept. (values.batchClearByDataFilter)
   *
   * @param string $spreadsheetId The ID of the spreadsheet to update.
   * @param BatchClearValuesByDataFilterRequest $postBody
   * @param array $optParams Optional parameters.
   * @return BatchClearValuesByDataFilterResponse
   */
  public function batchClearByDataFilter($spreadsheetId, BatchClearValuesByDataFilterRequest $postBody, $optParams = [])
  {
    $params = ['spreadsheetId' => $spreadsheetId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('batchClearByDataFilter', [$params], BatchClearValuesByDataFilterResponse::class);
  }
  /**
   * Returns one or more ranges of values from a spreadsheet. The caller must
   * specify the spreadsheet ID and one or more ranges. (values.batchGet)
   *
   * @param string $spreadsheetId The ID of the spreadsheet to retrieve data from.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string dateTimeRenderOption How dates, times, and durations should
   * be represented in the output. This is ignored if value_render_option is
   * FORMATTED_VALUE. The default dateTime render option is SERIAL_NUMBER.
   * @opt_param string majorDimension The major dimension that results should use.
   * For example, if the spreadsheet data is: `A1=1,B1=2,A2=3,B2=4`, then
   * requesting `ranges=["A1:B2"],majorDimension=ROWS` returns `[[1,2],[3,4]]`,
   * whereas requesting `ranges=["A1:B2"],majorDimension=COLUMNS` returns
   * `[[1,3],[2,4]]`.
   * @opt_param string ranges The [A1 notation or R1C1
   * notation](/sheets/api/guides/concepts#cell) of the range to retrieve values
   * from.
   * @opt_param string valueRenderOption How values should be represented in the
   * output. The default render option is ValueRenderOption.FORMATTED_VALUE.
   * @return BatchGetValuesResponse
   */
  public function batchGet($spreadsheetId, $optParams = [])
  {
    $params = ['spreadsheetId' => $spreadsheetId];
    $params = array_merge($params, $optParams);
    return $this->call('batchGet', [$params], BatchGetValuesResponse::class);
  }
  /**
   * Returns one or more ranges of values that match the specified data filters.
   * The caller must specify the spreadsheet ID and one or more DataFilters.
   * Ranges that match any of the data filters in the request will be returned.
   * (values.batchGetByDataFilter)
   *
   * @param string $spreadsheetId The ID of the spreadsheet to retrieve data from.
   * @param BatchGetValuesByDataFilterRequest $postBody
   * @param array $optParams Optional parameters.
   * @return BatchGetValuesByDataFilterResponse
   */
  public function batchGetByDataFilter($spreadsheetId, BatchGetValuesByDataFilterRequest $postBody, $optParams = [])
  {
    $params = ['spreadsheetId' => $spreadsheetId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('batchGetByDataFilter', [$params], BatchGetValuesByDataFilterResponse::class);
  }
  /**
   * Sets values in one or more ranges of a spreadsheet. The caller must specify
   * the spreadsheet ID, a valueInputOption, and one or more ValueRanges.
   * (values.batchUpdate)
   *
   * @param string $spreadsheetId The ID of the spreadsheet to update.
   * @param BatchUpdateValuesRequest $postBody
   * @param array $optParams Optional parameters.
   * @return BatchUpdateValuesResponse
   */
  public function batchUpdate($spreadsheetId, BatchUpdateValuesRequest $postBody, $optParams = [])
  {
    $params = ['spreadsheetId' => $spreadsheetId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('batchUpdate', [$params], BatchUpdateValuesResponse::class);
  }
  /**
   * Sets values in one or more ranges of a spreadsheet. The caller must specify
   * the spreadsheet ID, a valueInputOption, and one or more
   * DataFilterValueRanges. (values.batchUpdateByDataFilter)
   *
   * @param string $spreadsheetId The ID of the spreadsheet to update.
   * @param BatchUpdateValuesByDataFilterRequest $postBody
   * @param array $optParams Optional parameters.
   * @return BatchUpdateValuesByDataFilterResponse
   */
  public function batchUpdateByDataFilter($spreadsheetId, BatchUpdateValuesByDataFilterRequest $postBody, $optParams = [])
  {
    $params = ['spreadsheetId' => $spreadsheetId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('batchUpdateByDataFilter', [$params], BatchUpdateValuesByDataFilterResponse::class);
  }
  /**
   * Clears values from a spreadsheet. The caller must specify the spreadsheet ID
   * and range. Only values are cleared -- all other properties of the cell (such
   * as formatting, data validation, etc..) are kept. (values.clear)
   *
   * @param string $spreadsheetId The ID of the spreadsheet to update.
   * @param string $range The [A1 notation or R1C1
   * notation](/sheets/api/guides/concepts#cell) of the values to clear.
   * @param ClearValuesRequest $postBody
   * @param array $optParams Optional parameters.
   * @return ClearValuesResponse
   */
  public function clear($spreadsheetId, $range, ClearValuesRequest $postBody, $optParams = [])
  {
    $params = ['spreadsheetId' => $spreadsheetId, 'range' => $range, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('clear', [$params], ClearValuesResponse::class);
  }
  /**
   * Returns a range of values from a spreadsheet. The caller must specify the
   * spreadsheet ID and a range. (values.get)
   *
   * @param string $spreadsheetId The ID of the spreadsheet to retrieve data from.
   * @param string $range The [A1 notation or R1C1
   * notation](/sheets/api/guides/concepts#cell) of the range to retrieve values
   * from.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string dateTimeRenderOption How dates, times, and durations should
   * be represented in the output. This is ignored if value_render_option is
   * FORMATTED_VALUE. The default dateTime render option is SERIAL_NUMBER.
   * @opt_param string majorDimension The major dimension that results should use.
   * For example, if the spreadsheet data in Sheet1 is: `A1=1,B1=2,A2=3,B2=4`,
   * then requesting `range=Sheet1!A1:B2?majorDimension=ROWS` returns
   * `[[1,2],[3,4]]`, whereas requesting
   * `range=Sheet1!A1:B2?majorDimension=COLUMNS` returns `[[1,3],[2,4]]`.
   * @opt_param string valueRenderOption How values should be represented in the
   * output. The default render option is FORMATTED_VALUE.
   * @return ValueRange
   */
  public function get($spreadsheetId, $range, $optParams = [])
  {
    $params = ['spreadsheetId' => $spreadsheetId, 'range' => $range];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], ValueRange::class);
  }
  /**
   * Sets values in a range of a spreadsheet. The caller must specify the
   * spreadsheet ID, range, and a valueInputOption. (values.update)
   *
   * @param string $spreadsheetId The ID of the spreadsheet to update.
   * @param string $range The [A1 notation](/sheets/api/guides/concepts#cell) of
   * the values to update.
   * @param ValueRange $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool includeValuesInResponse Determines if the update response
   * should include the values of the cells that were updated. By default,
   * responses do not include the updated values. If the range to write was larger
   * than the range actually written, the response includes all values in the
   * requested range (excluding trailing empty rows and columns).
   * @opt_param string responseDateTimeRenderOption Determines how dates, times,
   * and durations in the response should be rendered. This is ignored if
   * response_value_render_option is FORMATTED_VALUE. The default dateTime render
   * option is SERIAL_NUMBER.
   * @opt_param string responseValueRenderOption Determines how values in the
   * response should be rendered. The default render option is FORMATTED_VALUE.
   * @opt_param string valueInputOption How the input data should be interpreted.
   * @return UpdateValuesResponse
   */
  public function update($spreadsheetId, $range, ValueRange $postBody, $optParams = [])
  {
    $params = ['spreadsheetId' => $spreadsheetId, 'range' => $range, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('update', [$params], UpdateValuesResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SpreadsheetsValues::class, 'Google_Service_Sheets_Resource_SpreadsheetsValues');
