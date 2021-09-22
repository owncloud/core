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

use Google\Service\Sheets\DeveloperMetadata;
use Google\Service\Sheets\SearchDeveloperMetadataRequest;
use Google\Service\Sheets\SearchDeveloperMetadataResponse;

/**
 * The "developerMetadata" collection of methods.
 * Typical usage is:
 *  <code>
 *   $sheetsService = new Google\Service\Sheets(...);
 *   $developerMetadata = $sheetsService->developerMetadata;
 *  </code>
 */
class SpreadsheetsDeveloperMetadata extends \Google\Service\Resource
{
  /**
   * Returns the developer metadata with the specified ID. The caller must specify
   * the spreadsheet ID and the developer metadata's unique metadataId.
   * (developerMetadata.get)
   *
   * @param string $spreadsheetId The ID of the spreadsheet to retrieve metadata
   * from.
   * @param int $metadataId The ID of the developer metadata to retrieve.
   * @param array $optParams Optional parameters.
   * @return DeveloperMetadata
   */
  public function get($spreadsheetId, $metadataId, $optParams = [])
  {
    $params = ['spreadsheetId' => $spreadsheetId, 'metadataId' => $metadataId];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], DeveloperMetadata::class);
  }
  /**
   * Returns all developer metadata matching the specified DataFilter. If the
   * provided DataFilter represents a DeveloperMetadataLookup object, this will
   * return all DeveloperMetadata entries selected by it. If the DataFilter
   * represents a location in a spreadsheet, this will return all developer
   * metadata associated with locations intersecting that region.
   * (developerMetadata.search)
   *
   * @param string $spreadsheetId The ID of the spreadsheet to retrieve metadata
   * from.
   * @param SearchDeveloperMetadataRequest $postBody
   * @param array $optParams Optional parameters.
   * @return SearchDeveloperMetadataResponse
   */
  public function search($spreadsheetId, SearchDeveloperMetadataRequest $postBody, $optParams = [])
  {
    $params = ['spreadsheetId' => $spreadsheetId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('search', [$params], SearchDeveloperMetadataResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SpreadsheetsDeveloperMetadata::class, 'Google_Service_Sheets_Resource_SpreadsheetsDeveloperMetadata');
