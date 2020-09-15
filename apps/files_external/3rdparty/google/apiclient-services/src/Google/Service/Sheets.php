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
class Google_Service_Sheets extends Google_Service
{
  /** See, edit, create, and delete all of your Google Drive files. */
  const DRIVE =
      "https://www.googleapis.com/auth/drive";
  /** View and manage Google Drive files and folders that you have opened or created with this app. */
  const DRIVE_FILE =
      "https://www.googleapis.com/auth/drive.file";
  /** See and download all your Google Drive files. */
  const DRIVE_READONLY =
      "https://www.googleapis.com/auth/drive.readonly";
  /** See, edit, create, and delete your spreadsheets in Google Drive. */
  const SPREADSHEETS =
      "https://www.googleapis.com/auth/spreadsheets";
  /** View your Google Spreadsheets. */
  const SPREADSHEETS_READONLY =
      "https://www.googleapis.com/auth/spreadsheets.readonly";

  public $spreadsheets;
  public $spreadsheets_developerMetadata;
  public $spreadsheets_sheets;
  public $spreadsheets_values;
  
  /**
   * Constructs the internal representation of the Sheets service.
   *
   * @param Google_Client $client The client used to deliver requests.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct(Google_Client $client, $rootUrl = null)
  {
    parent::__construct($client);
    $this->rootUrl = $rootUrl ?: 'https://sheets.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v4';
    $this->serviceName = 'sheets';

    $this->spreadsheets = new Google_Service_Sheets_Resource_Spreadsheets(
        $this,
        $this->serviceName,
        'spreadsheets',
        array(
          'methods' => array(
            'batchUpdate' => array(
              'path' => 'v4/spreadsheets/{spreadsheetId}:batchUpdate',
              'httpMethod' => 'POST',
              'parameters' => array(
                'spreadsheetId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'create' => array(
              'path' => 'v4/spreadsheets',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),'get' => array(
              'path' => 'v4/spreadsheets/{spreadsheetId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'spreadsheetId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'ranges' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'includeGridData' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
              ),
            ),'getByDataFilter' => array(
              'path' => 'v4/spreadsheets/{spreadsheetId}:getByDataFilter',
              'httpMethod' => 'POST',
              'parameters' => array(
                'spreadsheetId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->spreadsheets_developerMetadata = new Google_Service_Sheets_Resource_SpreadsheetsDeveloperMetadata(
        $this,
        $this->serviceName,
        'developerMetadata',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'v4/spreadsheets/{spreadsheetId}/developerMetadata/{metadataId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'spreadsheetId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'metadataId' => array(
                  'location' => 'path',
                  'type' => 'integer',
                  'required' => true,
                ),
              ),
            ),'search' => array(
              'path' => 'v4/spreadsheets/{spreadsheetId}/developerMetadata:search',
              'httpMethod' => 'POST',
              'parameters' => array(
                'spreadsheetId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->spreadsheets_sheets = new Google_Service_Sheets_Resource_SpreadsheetsSheets(
        $this,
        $this->serviceName,
        'sheets',
        array(
          'methods' => array(
            'copyTo' => array(
              'path' => 'v4/spreadsheets/{spreadsheetId}/sheets/{sheetId}:copyTo',
              'httpMethod' => 'POST',
              'parameters' => array(
                'spreadsheetId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'sheetId' => array(
                  'location' => 'path',
                  'type' => 'integer',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->spreadsheets_values = new Google_Service_Sheets_Resource_SpreadsheetsValues(
        $this,
        $this->serviceName,
        'values',
        array(
          'methods' => array(
            'append' => array(
              'path' => 'v4/spreadsheets/{spreadsheetId}/values/{range}:append',
              'httpMethod' => 'POST',
              'parameters' => array(
                'spreadsheetId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'range' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'responseValueRenderOption' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'valueInputOption' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'responseDateTimeRenderOption' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'insertDataOption' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'includeValuesInResponse' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
              ),
            ),'batchClear' => array(
              'path' => 'v4/spreadsheets/{spreadsheetId}/values:batchClear',
              'httpMethod' => 'POST',
              'parameters' => array(
                'spreadsheetId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'batchClearByDataFilter' => array(
              'path' => 'v4/spreadsheets/{spreadsheetId}/values:batchClearByDataFilter',
              'httpMethod' => 'POST',
              'parameters' => array(
                'spreadsheetId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'batchGet' => array(
              'path' => 'v4/spreadsheets/{spreadsheetId}/values:batchGet',
              'httpMethod' => 'GET',
              'parameters' => array(
                'spreadsheetId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'majorDimension' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'ranges' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'valueRenderOption' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'dateTimeRenderOption' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'batchGetByDataFilter' => array(
              'path' => 'v4/spreadsheets/{spreadsheetId}/values:batchGetByDataFilter',
              'httpMethod' => 'POST',
              'parameters' => array(
                'spreadsheetId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'batchUpdate' => array(
              'path' => 'v4/spreadsheets/{spreadsheetId}/values:batchUpdate',
              'httpMethod' => 'POST',
              'parameters' => array(
                'spreadsheetId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'batchUpdateByDataFilter' => array(
              'path' => 'v4/spreadsheets/{spreadsheetId}/values:batchUpdateByDataFilter',
              'httpMethod' => 'POST',
              'parameters' => array(
                'spreadsheetId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'clear' => array(
              'path' => 'v4/spreadsheets/{spreadsheetId}/values/{range}:clear',
              'httpMethod' => 'POST',
              'parameters' => array(
                'spreadsheetId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'range' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'v4/spreadsheets/{spreadsheetId}/values/{range}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'spreadsheetId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'range' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'dateTimeRenderOption' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'majorDimension' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'valueRenderOption' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'update' => array(
              'path' => 'v4/spreadsheets/{spreadsheetId}/values/{range}',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'spreadsheetId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'range' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'includeValuesInResponse' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'responseValueRenderOption' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'valueInputOption' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'responseDateTimeRenderOption' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
  }
}
