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

namespace Google\Service;

use Google\Client;

/**
 * Service definition for Sheets (v4).
 *
 * <p>
 * Reads and writes Google Sheets.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/sheets/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Sheets extends \Google\Service
{
  /** See, edit, create, and delete all of your Google Drive files. */
  const DRIVE =
      "https://www.googleapis.com/auth/drive";
  /** See, edit, create, and delete only the specific Google Drive files you use with this app. */
  const DRIVE_FILE =
      "https://www.googleapis.com/auth/drive.file";
  /** See and download all your Google Drive files. */
  const DRIVE_READONLY =
      "https://www.googleapis.com/auth/drive.readonly";
  /** See, edit, create, and delete all your Google Sheets spreadsheets. */
  const SPREADSHEETS =
      "https://www.googleapis.com/auth/spreadsheets";
  /** See all your Google Sheets spreadsheets. */
  const SPREADSHEETS_READONLY =
      "https://www.googleapis.com/auth/spreadsheets.readonly";

  public $spreadsheets;
  public $spreadsheets_developerMetadata;
  public $spreadsheets_sheets;
  public $spreadsheets_values;

  /**
   * Constructs the internal representation of the Sheets service.
   *
   * @param Client|array $clientOrConfig The client used to deliver requests, or a
   *                                     config array to pass to a new Client instance.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct($clientOrConfig = [], $rootUrl = null)
  {
    parent::__construct($clientOrConfig);
    $this->rootUrl = $rootUrl ?: 'https://sheets.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v4';
    $this->serviceName = 'sheets';

    $this->spreadsheets = new Sheets\Resource\Spreadsheets(
        $this,
        $this->serviceName,
        'spreadsheets',
        [
          'methods' => [
            'batchUpdate' => [
              'path' => 'v4/spreadsheets/{spreadsheetId}:batchUpdate',
              'httpMethod' => 'POST',
              'parameters' => [
                'spreadsheetId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'create' => [
              'path' => 'v4/spreadsheets',
              'httpMethod' => 'POST',
              'parameters' => [],
            ],'get' => [
              'path' => 'v4/spreadsheets/{spreadsheetId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'spreadsheetId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'includeGridData' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'ranges' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
              ],
            ],'getByDataFilter' => [
              'path' => 'v4/spreadsheets/{spreadsheetId}:getByDataFilter',
              'httpMethod' => 'POST',
              'parameters' => [
                'spreadsheetId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->spreadsheets_developerMetadata = new Sheets\Resource\SpreadsheetsDeveloperMetadata(
        $this,
        $this->serviceName,
        'developerMetadata',
        [
          'methods' => [
            'get' => [
              'path' => 'v4/spreadsheets/{spreadsheetId}/developerMetadata/{metadataId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'spreadsheetId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'metadataId' => [
                  'location' => 'path',
                  'type' => 'integer',
                  'required' => true,
                ],
              ],
            ],'search' => [
              'path' => 'v4/spreadsheets/{spreadsheetId}/developerMetadata:search',
              'httpMethod' => 'POST',
              'parameters' => [
                'spreadsheetId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->spreadsheets_sheets = new Sheets\Resource\SpreadsheetsSheets(
        $this,
        $this->serviceName,
        'sheets',
        [
          'methods' => [
            'copyTo' => [
              'path' => 'v4/spreadsheets/{spreadsheetId}/sheets/{sheetId}:copyTo',
              'httpMethod' => 'POST',
              'parameters' => [
                'spreadsheetId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'sheetId' => [
                  'location' => 'path',
                  'type' => 'integer',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->spreadsheets_values = new Sheets\Resource\SpreadsheetsValues(
        $this,
        $this->serviceName,
        'values',
        [
          'methods' => [
            'append' => [
              'path' => 'v4/spreadsheets/{spreadsheetId}/values/{range}:append',
              'httpMethod' => 'POST',
              'parameters' => [
                'spreadsheetId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'range' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'includeValuesInResponse' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'insertDataOption' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'responseDateTimeRenderOption' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'responseValueRenderOption' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'valueInputOption' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'batchClear' => [
              'path' => 'v4/spreadsheets/{spreadsheetId}/values:batchClear',
              'httpMethod' => 'POST',
              'parameters' => [
                'spreadsheetId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'batchClearByDataFilter' => [
              'path' => 'v4/spreadsheets/{spreadsheetId}/values:batchClearByDataFilter',
              'httpMethod' => 'POST',
              'parameters' => [
                'spreadsheetId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'batchGet' => [
              'path' => 'v4/spreadsheets/{spreadsheetId}/values:batchGet',
              'httpMethod' => 'GET',
              'parameters' => [
                'spreadsheetId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'dateTimeRenderOption' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'majorDimension' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'ranges' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'valueRenderOption' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'batchGetByDataFilter' => [
              'path' => 'v4/spreadsheets/{spreadsheetId}/values:batchGetByDataFilter',
              'httpMethod' => 'POST',
              'parameters' => [
                'spreadsheetId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'batchUpdate' => [
              'path' => 'v4/spreadsheets/{spreadsheetId}/values:batchUpdate',
              'httpMethod' => 'POST',
              'parameters' => [
                'spreadsheetId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'batchUpdateByDataFilter' => [
              'path' => 'v4/spreadsheets/{spreadsheetId}/values:batchUpdateByDataFilter',
              'httpMethod' => 'POST',
              'parameters' => [
                'spreadsheetId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'clear' => [
              'path' => 'v4/spreadsheets/{spreadsheetId}/values/{range}:clear',
              'httpMethod' => 'POST',
              'parameters' => [
                'spreadsheetId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'range' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'v4/spreadsheets/{spreadsheetId}/values/{range}',
              'httpMethod' => 'GET',
              'parameters' => [
                'spreadsheetId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'range' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'dateTimeRenderOption' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'majorDimension' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'valueRenderOption' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'update' => [
              'path' => 'v4/spreadsheets/{spreadsheetId}/values/{range}',
              'httpMethod' => 'PUT',
              'parameters' => [
                'spreadsheetId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'range' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'includeValuesInResponse' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'responseDateTimeRenderOption' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'responseValueRenderOption' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'valueInputOption' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Sheets::class, 'Google_Service_Sheets');
