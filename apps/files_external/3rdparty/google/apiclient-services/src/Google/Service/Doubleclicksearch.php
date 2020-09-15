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
 * Service definition for Doubleclicksearch (v2).
 *
 * <p>
 * The Search Ads 360 API allows developers to automate uploading conversions
 * and downloading reports from Search Ads 360.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/search-ads" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_Doubleclicksearch extends Google_Service
{
  /** View and manage your advertising data in DoubleClick Search. */
  const DOUBLECLICKSEARCH =
      "https://www.googleapis.com/auth/doubleclicksearch";

  public $conversion;
  public $reports;
  public $savedColumns;
  
  /**
   * Constructs the internal representation of the Doubleclicksearch service.
   *
   * @param Google_Client $client The client used to deliver requests.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct(Google_Client $client, $rootUrl = null)
  {
    parent::__construct($client);
    $this->rootUrl = $rootUrl ?: 'https://doubleclicksearch.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v2';
    $this->serviceName = 'doubleclicksearch';

    $this->conversion = new Google_Service_Doubleclicksearch_Resource_Conversion(
        $this,
        $this->serviceName,
        'conversion',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'doubleclicksearch/v2/agency/{agencyId}/advertiser/{advertiserId}/engine/{engineAccountId}/conversion',
              'httpMethod' => 'GET',
              'parameters' => array(
                'agencyId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'advertiserId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'engineAccountId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'endDate' => array(
                  'location' => 'query',
                  'type' => 'integer',
                  'required' => true,
                ),
                'rowCount' => array(
                  'location' => 'query',
                  'type' => 'integer',
                  'required' => true,
                ),
                'startDate' => array(
                  'location' => 'query',
                  'type' => 'integer',
                  'required' => true,
                ),
                'startRow' => array(
                  'location' => 'query',
                  'type' => 'integer',
                  'required' => true,
                ),
                'adGroupId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'campaignId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'adId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'criterionId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'insert' => array(
              'path' => 'doubleclicksearch/v2/conversion',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),'update' => array(
              'path' => 'doubleclicksearch/v2/conversion',
              'httpMethod' => 'PUT',
              'parameters' => array(),
            ),'updateAvailability' => array(
              'path' => 'doubleclicksearch/v2/conversion/updateAvailability',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),
          )
        )
    );
    $this->reports = new Google_Service_Doubleclicksearch_Resource_Reports(
        $this,
        $this->serviceName,
        'reports',
        array(
          'methods' => array(
            'generate' => array(
              'path' => 'doubleclicksearch/v2/reports/generate',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),'get' => array(
              'path' => 'doubleclicksearch/v2/reports/{reportId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'reportId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'getFile' => array(
              'path' => 'doubleclicksearch/v2/reports/{reportId}/files/{reportFragment}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'reportId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'reportFragment' => array(
                  'location' => 'path',
                  'type' => 'integer',
                  'required' => true,
                ),
              ),
            ),'request' => array(
              'path' => 'doubleclicksearch/v2/reports',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),
          )
        )
    );
    $this->savedColumns = new Google_Service_Doubleclicksearch_Resource_SavedColumns(
        $this,
        $this->serviceName,
        'savedColumns',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'doubleclicksearch/v2/agency/{agencyId}/advertiser/{advertiserId}/savedcolumns',
              'httpMethod' => 'GET',
              'parameters' => array(
                'agencyId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'advertiserId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
  }
}
