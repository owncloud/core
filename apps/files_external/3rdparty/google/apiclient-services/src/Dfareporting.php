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
 * Service definition for Dfareporting (v4).
 *
 * <p>
 * Build applications to efficiently manage large or complex trafficking,
 * reporting, and attribution workflows for Campaign Manager 360.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/doubleclick-advertisers/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Dfareporting extends \Google\Service
{
  /** Manage DoubleClick Digital Marketing conversions. */
  const DDMCONVERSIONS =
      "https://www.googleapis.com/auth/ddmconversions";
  /** View and manage DoubleClick for Advertisers reports. */
  const DFAREPORTING =
      "https://www.googleapis.com/auth/dfareporting";
  /** View and manage your DoubleClick Campaign Manager's (DCM) display ad campaigns. */
  const DFATRAFFICKING =
      "https://www.googleapis.com/auth/dfatrafficking";

  public $accountActiveAdSummaries;
  public $accountPermissionGroups;
  public $accountPermissions;
  public $accountUserProfiles;
  public $accounts;
  public $ads;
  public $advertiserGroups;
  public $advertiserInvoices;
  public $advertiserLandingPages;
  public $advertisers;
  public $billingAssignments;
  public $billingProfiles;
  public $billingRates;
  public $browsers;
  public $campaignCreativeAssociations;
  public $campaigns;
  public $changeLogs;
  public $cities;
  public $connectionTypes;
  public $contentCategories;
  public $conversions;
  public $countries;
  public $creativeAssets;
  public $creativeFieldValues;
  public $creativeFields;
  public $creativeGroups;
  public $creatives;
  public $dimensionValues;
  public $directorySites;
  public $dynamicTargetingKeys;
  public $eventTags;
  public $files;
  public $floodlightActivities;
  public $floodlightActivityGroups;
  public $floodlightConfigurations;
  public $inventoryItems;
  public $languages;
  public $metros;
  public $mobileApps;
  public $mobileCarriers;
  public $operatingSystemVersions;
  public $operatingSystems;
  public $orderDocuments;
  public $orders;
  public $placementGroups;
  public $placementStrategies;
  public $placements;
  public $platformTypes;
  public $postalCodes;
  public $projects;
  public $regions;
  public $remarketingListShares;
  public $remarketingLists;
  public $reports;
  public $reports_compatibleFields;
  public $reports_files;
  public $sites;
  public $sizes;
  public $subaccounts;
  public $targetableRemarketingLists;
  public $targetingTemplates;
  public $userProfiles;
  public $userRolePermissionGroups;
  public $userRolePermissions;
  public $userRoles;
  public $videoFormats;

  /**
   * Constructs the internal representation of the Dfareporting service.
   *
   * @param Client|array $clientOrConfig The client used to deliver requests, or a
   *                                     config array to pass to a new Client instance.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct($clientOrConfig = [], $rootUrl = null)
  {
    parent::__construct($clientOrConfig);
    $this->rootUrl = $rootUrl ?: 'https://dfareporting.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v4';
    $this->serviceName = 'dfareporting';

    $this->accountActiveAdSummaries = new Dfareporting\Resource\AccountActiveAdSummaries(
        $this,
        $this->serviceName,
        'accountActiveAdSummaries',
        [
          'methods' => [
            'get' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/accountActiveAdSummaries/{summaryAccountId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'summaryAccountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->accountPermissionGroups = new Dfareporting\Resource\AccountPermissionGroups(
        $this,
        $this->serviceName,
        'accountPermissionGroups',
        [
          'methods' => [
            'get' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/accountPermissionGroups/{id}',
              'httpMethod' => 'GET',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'id' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/accountPermissionGroups',
              'httpMethod' => 'GET',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->accountPermissions = new Dfareporting\Resource\AccountPermissions(
        $this,
        $this->serviceName,
        'accountPermissions',
        [
          'methods' => [
            'get' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/accountPermissions/{id}',
              'httpMethod' => 'GET',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'id' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/accountPermissions',
              'httpMethod' => 'GET',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->accountUserProfiles = new Dfareporting\Resource\AccountUserProfiles(
        $this,
        $this->serviceName,
        'accountUserProfiles',
        [
          'methods' => [
            'get' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/accountUserProfiles/{id}',
              'httpMethod' => 'GET',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'id' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'insert' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/accountUserProfiles',
              'httpMethod' => 'POST',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/accountUserProfiles',
              'httpMethod' => 'GET',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'active' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'ids' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'searchString' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'sortField' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'sortOrder' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'subaccountId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'userRoleId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'patch' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/accountUserProfiles',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'id' => [
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'update' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/accountUserProfiles',
              'httpMethod' => 'PUT',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->accounts = new Dfareporting\Resource\Accounts(
        $this,
        $this->serviceName,
        'accounts',
        [
          'methods' => [
            'get' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/accounts/{id}',
              'httpMethod' => 'GET',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'id' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/accounts',
              'httpMethod' => 'GET',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'active' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'ids' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'searchString' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'sortField' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'sortOrder' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'patch' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/accounts',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'id' => [
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'update' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/accounts',
              'httpMethod' => 'PUT',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->ads = new Dfareporting\Resource\Ads(
        $this,
        $this->serviceName,
        'ads',
        [
          'methods' => [
            'get' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/ads/{id}',
              'httpMethod' => 'GET',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'id' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'insert' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/ads',
              'httpMethod' => 'POST',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/ads',
              'httpMethod' => 'GET',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'active' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'advertiserId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'archived' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'audienceSegmentIds' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'campaignIds' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'compatibility' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'creativeIds' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'creativeOptimizationConfigurationIds' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'dynamicClickTracker' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'ids' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'landingPageIds' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'overriddenEventTagId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'placementIds' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'remarketingListIds' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'searchString' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'sizeIds' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'sortField' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'sortOrder' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'sslCompliant' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'sslRequired' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'type' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
              ],
            ],'patch' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/ads',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'id' => [
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'update' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/ads',
              'httpMethod' => 'PUT',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->advertiserGroups = new Dfareporting\Resource\AdvertiserGroups(
        $this,
        $this->serviceName,
        'advertiserGroups',
        [
          'methods' => [
            'delete' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/advertiserGroups/{id}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'id' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/advertiserGroups/{id}',
              'httpMethod' => 'GET',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'id' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'insert' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/advertiserGroups',
              'httpMethod' => 'POST',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/advertiserGroups',
              'httpMethod' => 'GET',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'ids' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'searchString' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'sortField' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'sortOrder' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'patch' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/advertiserGroups',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'id' => [
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'update' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/advertiserGroups',
              'httpMethod' => 'PUT',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->advertiserInvoices = new Dfareporting\Resource\AdvertiserInvoices(
        $this,
        $this->serviceName,
        'advertiserInvoices',
        [
          'methods' => [
            'list' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/advertisers/{advertiserId}/invoices',
              'httpMethod' => 'GET',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'advertiserId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'issueMonth' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->advertiserLandingPages = new Dfareporting\Resource\AdvertiserLandingPages(
        $this,
        $this->serviceName,
        'advertiserLandingPages',
        [
          'methods' => [
            'get' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/advertiserLandingPages/{id}',
              'httpMethod' => 'GET',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'id' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'insert' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/advertiserLandingPages',
              'httpMethod' => 'POST',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/advertiserLandingPages',
              'httpMethod' => 'GET',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'advertiserIds' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'archived' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'campaignIds' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'ids' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'searchString' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'sortField' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'sortOrder' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'subaccountId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'patch' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/advertiserLandingPages',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'id' => [
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'update' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/advertiserLandingPages',
              'httpMethod' => 'PUT',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->advertisers = new Dfareporting\Resource\Advertisers(
        $this,
        $this->serviceName,
        'advertisers',
        [
          'methods' => [
            'get' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/advertisers/{id}',
              'httpMethod' => 'GET',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'id' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'insert' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/advertisers',
              'httpMethod' => 'POST',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/advertisers',
              'httpMethod' => 'GET',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'advertiserGroupIds' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'floodlightConfigurationIds' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'ids' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'includeAdvertisersWithoutGroupsOnly' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'onlyParent' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'searchString' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'sortField' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'sortOrder' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'status' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'subaccountId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'patch' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/advertisers',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'id' => [
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'update' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/advertisers',
              'httpMethod' => 'PUT',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->billingAssignments = new Dfareporting\Resource\BillingAssignments(
        $this,
        $this->serviceName,
        'billingAssignments',
        [
          'methods' => [
            'insert' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/billingProfiles/{billingProfileId}/billingAssignments',
              'httpMethod' => 'POST',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'billingProfileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/billingProfiles/{billingProfileId}/billingAssignments',
              'httpMethod' => 'GET',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'billingProfileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->billingProfiles = new Dfareporting\Resource\BillingProfiles(
        $this,
        $this->serviceName,
        'billingProfiles',
        [
          'methods' => [
            'get' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/billingProfiles/{id}',
              'httpMethod' => 'GET',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'id' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/billingProfiles',
              'httpMethod' => 'GET',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'currency_code' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'ids' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'name' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'onlySuggestion' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'sortField' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'sortOrder' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'status' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'subaccountIds' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
              ],
            ],'update' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/billingProfiles',
              'httpMethod' => 'PUT',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->billingRates = new Dfareporting\Resource\BillingRates(
        $this,
        $this->serviceName,
        'billingRates',
        [
          'methods' => [
            'list' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/billingProfiles/{billingProfileId}/billingRates',
              'httpMethod' => 'GET',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'billingProfileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->browsers = new Dfareporting\Resource\Browsers(
        $this,
        $this->serviceName,
        'browsers',
        [
          'methods' => [
            'list' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/browsers',
              'httpMethod' => 'GET',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->campaignCreativeAssociations = new Dfareporting\Resource\CampaignCreativeAssociations(
        $this,
        $this->serviceName,
        'campaignCreativeAssociations',
        [
          'methods' => [
            'insert' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/campaigns/{campaignId}/campaignCreativeAssociations',
              'httpMethod' => 'POST',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'campaignId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/campaigns/{campaignId}/campaignCreativeAssociations',
              'httpMethod' => 'GET',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'campaignId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'sortOrder' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->campaigns = new Dfareporting\Resource\Campaigns(
        $this,
        $this->serviceName,
        'campaigns',
        [
          'methods' => [
            'get' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/campaigns/{id}',
              'httpMethod' => 'GET',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'id' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'insert' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/campaigns',
              'httpMethod' => 'POST',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/campaigns',
              'httpMethod' => 'GET',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'advertiserGroupIds' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'advertiserIds' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'archived' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'atLeastOneOptimizationActivity' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'excludedIds' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'ids' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'overriddenEventTagId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'searchString' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'sortField' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'sortOrder' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'subaccountId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'patch' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/campaigns',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'id' => [
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'update' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/campaigns',
              'httpMethod' => 'PUT',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->changeLogs = new Dfareporting\Resource\ChangeLogs(
        $this,
        $this->serviceName,
        'changeLogs',
        [
          'methods' => [
            'get' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/changeLogs/{id}',
              'httpMethod' => 'GET',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'id' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/changeLogs',
              'httpMethod' => 'GET',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'action' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'ids' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'maxChangeTime' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'minChangeTime' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'objectIds' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'objectType' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'searchString' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'userProfileIds' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->cities = new Dfareporting\Resource\Cities(
        $this,
        $this->serviceName,
        'cities',
        [
          'methods' => [
            'list' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/cities',
              'httpMethod' => 'GET',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'countryDartIds' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'dartIds' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'namePrefix' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'regionDartIds' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->connectionTypes = new Dfareporting\Resource\ConnectionTypes(
        $this,
        $this->serviceName,
        'connectionTypes',
        [
          'methods' => [
            'get' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/connectionTypes/{id}',
              'httpMethod' => 'GET',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'id' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/connectionTypes',
              'httpMethod' => 'GET',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->contentCategories = new Dfareporting\Resource\ContentCategories(
        $this,
        $this->serviceName,
        'contentCategories',
        [
          'methods' => [
            'delete' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/contentCategories/{id}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'id' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/contentCategories/{id}',
              'httpMethod' => 'GET',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'id' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'insert' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/contentCategories',
              'httpMethod' => 'POST',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/contentCategories',
              'httpMethod' => 'GET',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'ids' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'searchString' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'sortField' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'sortOrder' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'patch' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/contentCategories',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'id' => [
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'update' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/contentCategories',
              'httpMethod' => 'PUT',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->conversions = new Dfareporting\Resource\Conversions(
        $this,
        $this->serviceName,
        'conversions',
        [
          'methods' => [
            'batchinsert' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/conversions/batchinsert',
              'httpMethod' => 'POST',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'batchupdate' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/conversions/batchupdate',
              'httpMethod' => 'POST',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->countries = new Dfareporting\Resource\Countries(
        $this,
        $this->serviceName,
        'countries',
        [
          'methods' => [
            'get' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/countries/{dartId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'dartId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/countries',
              'httpMethod' => 'GET',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->creativeAssets = new Dfareporting\Resource\CreativeAssets(
        $this,
        $this->serviceName,
        'creativeAssets',
        [
          'methods' => [
            'insert' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/creativeAssets/{advertiserId}/creativeAssets',
              'httpMethod' => 'POST',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'advertiserId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->creativeFieldValues = new Dfareporting\Resource\CreativeFieldValues(
        $this,
        $this->serviceName,
        'creativeFieldValues',
        [
          'methods' => [
            'delete' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/creativeFields/{creativeFieldId}/creativeFieldValues/{id}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'creativeFieldId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'id' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/creativeFields/{creativeFieldId}/creativeFieldValues/{id}',
              'httpMethod' => 'GET',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'creativeFieldId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'id' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'insert' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/creativeFields/{creativeFieldId}/creativeFieldValues',
              'httpMethod' => 'POST',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'creativeFieldId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/creativeFields/{creativeFieldId}/creativeFieldValues',
              'httpMethod' => 'GET',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'creativeFieldId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'ids' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'searchString' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'sortField' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'sortOrder' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'patch' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/creativeFields/{creativeFieldId}/creativeFieldValues',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'creativeFieldId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'id' => [
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'update' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/creativeFields/{creativeFieldId}/creativeFieldValues',
              'httpMethod' => 'PUT',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'creativeFieldId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->creativeFields = new Dfareporting\Resource\CreativeFields(
        $this,
        $this->serviceName,
        'creativeFields',
        [
          'methods' => [
            'delete' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/creativeFields/{id}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'id' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/creativeFields/{id}',
              'httpMethod' => 'GET',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'id' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'insert' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/creativeFields',
              'httpMethod' => 'POST',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/creativeFields',
              'httpMethod' => 'GET',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'advertiserIds' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'ids' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'searchString' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'sortField' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'sortOrder' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'patch' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/creativeFields',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'id' => [
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'update' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/creativeFields',
              'httpMethod' => 'PUT',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->creativeGroups = new Dfareporting\Resource\CreativeGroups(
        $this,
        $this->serviceName,
        'creativeGroups',
        [
          'methods' => [
            'get' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/creativeGroups/{id}',
              'httpMethod' => 'GET',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'id' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'insert' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/creativeGroups',
              'httpMethod' => 'POST',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/creativeGroups',
              'httpMethod' => 'GET',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'advertiserIds' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'groupNumber' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'ids' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'searchString' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'sortField' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'sortOrder' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'patch' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/creativeGroups',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'id' => [
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'update' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/creativeGroups',
              'httpMethod' => 'PUT',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->creatives = new Dfareporting\Resource\Creatives(
        $this,
        $this->serviceName,
        'creatives',
        [
          'methods' => [
            'get' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/creatives/{id}',
              'httpMethod' => 'GET',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'id' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'insert' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/creatives',
              'httpMethod' => 'POST',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/creatives',
              'httpMethod' => 'GET',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'active' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'advertiserId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'archived' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'campaignId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'companionCreativeIds' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'creativeFieldIds' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'ids' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'renderingIds' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'searchString' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'sizeIds' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'sortField' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'sortOrder' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'studioCreativeId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'types' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
              ],
            ],'patch' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/creatives',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'id' => [
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'update' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/creatives',
              'httpMethod' => 'PUT',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->dimensionValues = new Dfareporting\Resource\DimensionValues(
        $this,
        $this->serviceName,
        'dimensionValues',
        [
          'methods' => [
            'query' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/dimensionvalues/query',
              'httpMethod' => 'POST',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->directorySites = new Dfareporting\Resource\DirectorySites(
        $this,
        $this->serviceName,
        'directorySites',
        [
          'methods' => [
            'get' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/directorySites/{id}',
              'httpMethod' => 'GET',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'id' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'insert' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/directorySites',
              'httpMethod' => 'POST',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/directorySites',
              'httpMethod' => 'GET',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'acceptsInStreamVideoPlacements' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'acceptsInterstitialPlacements' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'acceptsPublisherPaidPlacements' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'active' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'dfpNetworkCode' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'ids' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'searchString' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'sortField' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'sortOrder' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->dynamicTargetingKeys = new Dfareporting\Resource\DynamicTargetingKeys(
        $this,
        $this->serviceName,
        'dynamicTargetingKeys',
        [
          'methods' => [
            'delete' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/dynamicTargetingKeys/{objectId}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'objectId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'name' => [
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ],
                'objectType' => [
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'insert' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/dynamicTargetingKeys',
              'httpMethod' => 'POST',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/dynamicTargetingKeys',
              'httpMethod' => 'GET',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'advertiserId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'names' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'objectId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'objectType' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->eventTags = new Dfareporting\Resource\EventTags(
        $this,
        $this->serviceName,
        'eventTags',
        [
          'methods' => [
            'delete' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/eventTags/{id}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'id' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/eventTags/{id}',
              'httpMethod' => 'GET',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'id' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'insert' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/eventTags',
              'httpMethod' => 'POST',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/eventTags',
              'httpMethod' => 'GET',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'adId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'advertiserId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'campaignId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'definitionsOnly' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'enabled' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'eventTagTypes' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'ids' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'searchString' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'sortField' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'sortOrder' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'patch' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/eventTags',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'id' => [
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'update' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/eventTags',
              'httpMethod' => 'PUT',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->files = new Dfareporting\Resource\Files(
        $this,
        $this->serviceName,
        'files',
        [
          'methods' => [
            'get' => [
              'path' => 'dfareporting/v4/reports/{reportId}/files/{fileId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'reportId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'fileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/files',
              'httpMethod' => 'GET',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'scope' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'sortField' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'sortOrder' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->floodlightActivities = new Dfareporting\Resource\FloodlightActivities(
        $this,
        $this->serviceName,
        'floodlightActivities',
        [
          'methods' => [
            'delete' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/floodlightActivities/{id}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'id' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'generatetag' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/floodlightActivities/generatetag',
              'httpMethod' => 'POST',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'floodlightActivityId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'get' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/floodlightActivities/{id}',
              'httpMethod' => 'GET',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'id' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'insert' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/floodlightActivities',
              'httpMethod' => 'POST',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/floodlightActivities',
              'httpMethod' => 'GET',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'advertiserId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'floodlightActivityGroupIds' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'floodlightActivityGroupName' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'floodlightActivityGroupTagString' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'floodlightActivityGroupType' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'floodlightConfigurationId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'ids' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'searchString' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'sortField' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'sortOrder' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'tagString' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'patch' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/floodlightActivities',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'id' => [
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'update' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/floodlightActivities',
              'httpMethod' => 'PUT',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->floodlightActivityGroups = new Dfareporting\Resource\FloodlightActivityGroups(
        $this,
        $this->serviceName,
        'floodlightActivityGroups',
        [
          'methods' => [
            'get' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/floodlightActivityGroups/{id}',
              'httpMethod' => 'GET',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'id' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'insert' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/floodlightActivityGroups',
              'httpMethod' => 'POST',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/floodlightActivityGroups',
              'httpMethod' => 'GET',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'advertiserId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'floodlightConfigurationId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'ids' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'searchString' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'sortField' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'sortOrder' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'type' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'patch' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/floodlightActivityGroups',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'id' => [
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'update' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/floodlightActivityGroups',
              'httpMethod' => 'PUT',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->floodlightConfigurations = new Dfareporting\Resource\FloodlightConfigurations(
        $this,
        $this->serviceName,
        'floodlightConfigurations',
        [
          'methods' => [
            'get' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/floodlightConfigurations/{id}',
              'httpMethod' => 'GET',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'id' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/floodlightConfigurations',
              'httpMethod' => 'GET',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'ids' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
              ],
            ],'patch' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/floodlightConfigurations',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'id' => [
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'update' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/floodlightConfigurations',
              'httpMethod' => 'PUT',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->inventoryItems = new Dfareporting\Resource\InventoryItems(
        $this,
        $this->serviceName,
        'inventoryItems',
        [
          'methods' => [
            'get' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/projects/{projectId}/inventoryItems/{id}',
              'httpMethod' => 'GET',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'projectId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'id' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/projects/{projectId}/inventoryItems',
              'httpMethod' => 'GET',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'projectId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'ids' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'inPlan' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderId' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'siteId' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'sortField' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'sortOrder' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'type' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->languages = new Dfareporting\Resource\Languages(
        $this,
        $this->serviceName,
        'languages',
        [
          'methods' => [
            'list' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/languages',
              'httpMethod' => 'GET',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->metros = new Dfareporting\Resource\Metros(
        $this,
        $this->serviceName,
        'metros',
        [
          'methods' => [
            'list' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/metros',
              'httpMethod' => 'GET',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->mobileApps = new Dfareporting\Resource\MobileApps(
        $this,
        $this->serviceName,
        'mobileApps',
        [
          'methods' => [
            'get' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/mobileApps/{id}',
              'httpMethod' => 'GET',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'id' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/mobileApps',
              'httpMethod' => 'GET',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'directories' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'ids' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'searchString' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->mobileCarriers = new Dfareporting\Resource\MobileCarriers(
        $this,
        $this->serviceName,
        'mobileCarriers',
        [
          'methods' => [
            'get' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/mobileCarriers/{id}',
              'httpMethod' => 'GET',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'id' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/mobileCarriers',
              'httpMethod' => 'GET',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->operatingSystemVersions = new Dfareporting\Resource\OperatingSystemVersions(
        $this,
        $this->serviceName,
        'operatingSystemVersions',
        [
          'methods' => [
            'get' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/operatingSystemVersions/{id}',
              'httpMethod' => 'GET',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'id' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/operatingSystemVersions',
              'httpMethod' => 'GET',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->operatingSystems = new Dfareporting\Resource\OperatingSystems(
        $this,
        $this->serviceName,
        'operatingSystems',
        [
          'methods' => [
            'get' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/operatingSystems/{dartId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'dartId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/operatingSystems',
              'httpMethod' => 'GET',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->orderDocuments = new Dfareporting\Resource\OrderDocuments(
        $this,
        $this->serviceName,
        'orderDocuments',
        [
          'methods' => [
            'get' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/projects/{projectId}/orderDocuments/{id}',
              'httpMethod' => 'GET',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'projectId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'id' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/projects/{projectId}/orderDocuments',
              'httpMethod' => 'GET',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'projectId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'approved' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'ids' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderId' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'searchString' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'siteId' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'sortField' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'sortOrder' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->orders = new Dfareporting\Resource\Orders(
        $this,
        $this->serviceName,
        'orders',
        [
          'methods' => [
            'get' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/projects/{projectId}/orders/{id}',
              'httpMethod' => 'GET',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'projectId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'id' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/projects/{projectId}/orders',
              'httpMethod' => 'GET',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'projectId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'ids' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'searchString' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'siteId' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'sortField' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'sortOrder' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->placementGroups = new Dfareporting\Resource\PlacementGroups(
        $this,
        $this->serviceName,
        'placementGroups',
        [
          'methods' => [
            'get' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/placementGroups/{id}',
              'httpMethod' => 'GET',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'id' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'insert' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/placementGroups',
              'httpMethod' => 'POST',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/placementGroups',
              'httpMethod' => 'GET',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'activeStatus' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'advertiserIds' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'campaignIds' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'contentCategoryIds' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'directorySiteIds' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'ids' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'maxEndDate' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'maxStartDate' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'minEndDate' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'minStartDate' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'placementGroupType' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'placementStrategyIds' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'pricingTypes' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'searchString' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'siteIds' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'sortField' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'sortOrder' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'patch' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/placementGroups',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'id' => [
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'update' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/placementGroups',
              'httpMethod' => 'PUT',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->placementStrategies = new Dfareporting\Resource\PlacementStrategies(
        $this,
        $this->serviceName,
        'placementStrategies',
        [
          'methods' => [
            'delete' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/placementStrategies/{id}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'id' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/placementStrategies/{id}',
              'httpMethod' => 'GET',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'id' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'insert' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/placementStrategies',
              'httpMethod' => 'POST',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/placementStrategies',
              'httpMethod' => 'GET',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'ids' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'searchString' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'sortField' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'sortOrder' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'patch' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/placementStrategies',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'id' => [
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'update' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/placementStrategies',
              'httpMethod' => 'PUT',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->placements = new Dfareporting\Resource\Placements(
        $this,
        $this->serviceName,
        'placements',
        [
          'methods' => [
            'generatetags' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/placements/generatetags',
              'httpMethod' => 'POST',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'campaignId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'placementIds' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'tagFormats' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
              ],
            ],'get' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/placements/{id}',
              'httpMethod' => 'GET',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'id' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'insert' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/placements',
              'httpMethod' => 'POST',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/placements',
              'httpMethod' => 'GET',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'activeStatus' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'advertiserIds' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'campaignIds' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'compatibilities' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'contentCategoryIds' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'directorySiteIds' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'groupIds' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'ids' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'maxEndDate' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'maxStartDate' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'minEndDate' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'minStartDate' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'paymentSource' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'placementStrategyIds' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'pricingTypes' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'searchString' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'siteIds' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'sizeIds' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'sortField' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'sortOrder' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'patch' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/placements',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'id' => [
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'update' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/placements',
              'httpMethod' => 'PUT',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->platformTypes = new Dfareporting\Resource\PlatformTypes(
        $this,
        $this->serviceName,
        'platformTypes',
        [
          'methods' => [
            'get' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/platformTypes/{id}',
              'httpMethod' => 'GET',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'id' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/platformTypes',
              'httpMethod' => 'GET',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->postalCodes = new Dfareporting\Resource\PostalCodes(
        $this,
        $this->serviceName,
        'postalCodes',
        [
          'methods' => [
            'get' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/postalCodes/{code}',
              'httpMethod' => 'GET',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'code' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/postalCodes',
              'httpMethod' => 'GET',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->projects = new Dfareporting\Resource\Projects(
        $this,
        $this->serviceName,
        'projects',
        [
          'methods' => [
            'get' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/projects/{id}',
              'httpMethod' => 'GET',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'id' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/projects',
              'httpMethod' => 'GET',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'advertiserIds' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'ids' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'searchString' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'sortField' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'sortOrder' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->regions = new Dfareporting\Resource\Regions(
        $this,
        $this->serviceName,
        'regions',
        [
          'methods' => [
            'list' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/regions',
              'httpMethod' => 'GET',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->remarketingListShares = new Dfareporting\Resource\RemarketingListShares(
        $this,
        $this->serviceName,
        'remarketingListShares',
        [
          'methods' => [
            'get' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/remarketingListShares/{remarketingListId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'remarketingListId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'patch' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/remarketingListShares',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'id' => [
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'update' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/remarketingListShares',
              'httpMethod' => 'PUT',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->remarketingLists = new Dfareporting\Resource\RemarketingLists(
        $this,
        $this->serviceName,
        'remarketingLists',
        [
          'methods' => [
            'get' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/remarketingLists/{id}',
              'httpMethod' => 'GET',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'id' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'insert' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/remarketingLists',
              'httpMethod' => 'POST',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/remarketingLists',
              'httpMethod' => 'GET',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'advertiserId' => [
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ],
                'active' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'floodlightActivityId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'name' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'sortField' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'sortOrder' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'patch' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/remarketingLists',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'id' => [
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'update' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/remarketingLists',
              'httpMethod' => 'PUT',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->reports = new Dfareporting\Resource\Reports(
        $this,
        $this->serviceName,
        'reports',
        [
          'methods' => [
            'delete' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/reports/{reportId}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'reportId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/reports/{reportId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'reportId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'insert' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/reports',
              'httpMethod' => 'POST',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/reports',
              'httpMethod' => 'GET',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'scope' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'sortField' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'sortOrder' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'patch' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/reports/{reportId}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'reportId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'run' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/reports/{reportId}/run',
              'httpMethod' => 'POST',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'reportId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'synchronous' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'update' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/reports/{reportId}',
              'httpMethod' => 'PUT',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'reportId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->reports_compatibleFields = new Dfareporting\Resource\ReportsCompatibleFields(
        $this,
        $this->serviceName,
        'compatibleFields',
        [
          'methods' => [
            'query' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/reports/compatiblefields/query',
              'httpMethod' => 'POST',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->reports_files = new Dfareporting\Resource\ReportsFiles(
        $this,
        $this->serviceName,
        'files',
        [
          'methods' => [
            'get' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/reports/{reportId}/files/{fileId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'reportId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'fileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/reports/{reportId}/files',
              'httpMethod' => 'GET',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'reportId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'sortField' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'sortOrder' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->sites = new Dfareporting\Resource\Sites(
        $this,
        $this->serviceName,
        'sites',
        [
          'methods' => [
            'get' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/sites/{id}',
              'httpMethod' => 'GET',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'id' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'insert' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/sites',
              'httpMethod' => 'POST',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/sites',
              'httpMethod' => 'GET',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'acceptsInStreamVideoPlacements' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'acceptsInterstitialPlacements' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'acceptsPublisherPaidPlacements' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'adWordsSite' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'approved' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'campaignIds' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'directorySiteIds' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'ids' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'searchString' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'sortField' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'sortOrder' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'subaccountId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'unmappedSite' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'patch' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/sites',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'id' => [
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'update' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/sites',
              'httpMethod' => 'PUT',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->sizes = new Dfareporting\Resource\Sizes(
        $this,
        $this->serviceName,
        'sizes',
        [
          'methods' => [
            'get' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/sizes/{id}',
              'httpMethod' => 'GET',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'id' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'insert' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/sizes',
              'httpMethod' => 'POST',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/sizes',
              'httpMethod' => 'GET',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'height' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'iabStandard' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'ids' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'width' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
              ],
            ],
          ]
        ]
    );
    $this->subaccounts = new Dfareporting\Resource\Subaccounts(
        $this,
        $this->serviceName,
        'subaccounts',
        [
          'methods' => [
            'get' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/subaccounts/{id}',
              'httpMethod' => 'GET',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'id' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'insert' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/subaccounts',
              'httpMethod' => 'POST',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/subaccounts',
              'httpMethod' => 'GET',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'ids' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'searchString' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'sortField' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'sortOrder' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'patch' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/subaccounts',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'id' => [
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'update' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/subaccounts',
              'httpMethod' => 'PUT',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->targetableRemarketingLists = new Dfareporting\Resource\TargetableRemarketingLists(
        $this,
        $this->serviceName,
        'targetableRemarketingLists',
        [
          'methods' => [
            'get' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/targetableRemarketingLists/{id}',
              'httpMethod' => 'GET',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'id' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/targetableRemarketingLists',
              'httpMethod' => 'GET',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'advertiserId' => [
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ],
                'active' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'name' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'sortField' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'sortOrder' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->targetingTemplates = new Dfareporting\Resource\TargetingTemplates(
        $this,
        $this->serviceName,
        'targetingTemplates',
        [
          'methods' => [
            'get' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/targetingTemplates/{id}',
              'httpMethod' => 'GET',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'id' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'insert' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/targetingTemplates',
              'httpMethod' => 'POST',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/targetingTemplates',
              'httpMethod' => 'GET',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'advertiserId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'ids' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'searchString' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'sortField' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'sortOrder' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'patch' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/targetingTemplates',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'id' => [
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'update' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/targetingTemplates',
              'httpMethod' => 'PUT',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->userProfiles = new Dfareporting\Resource\UserProfiles(
        $this,
        $this->serviceName,
        'userProfiles',
        [
          'methods' => [
            'get' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'dfareporting/v4/userprofiles',
              'httpMethod' => 'GET',
              'parameters' => [],
            ],
          ]
        ]
    );
    $this->userRolePermissionGroups = new Dfareporting\Resource\UserRolePermissionGroups(
        $this,
        $this->serviceName,
        'userRolePermissionGroups',
        [
          'methods' => [
            'get' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/userRolePermissionGroups/{id}',
              'httpMethod' => 'GET',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'id' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/userRolePermissionGroups',
              'httpMethod' => 'GET',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->userRolePermissions = new Dfareporting\Resource\UserRolePermissions(
        $this,
        $this->serviceName,
        'userRolePermissions',
        [
          'methods' => [
            'get' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/userRolePermissions/{id}',
              'httpMethod' => 'GET',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'id' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/userRolePermissions',
              'httpMethod' => 'GET',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'ids' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->userRoles = new Dfareporting\Resource\UserRoles(
        $this,
        $this->serviceName,
        'userRoles',
        [
          'methods' => [
            'delete' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/userRoles/{id}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'id' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/userRoles/{id}',
              'httpMethod' => 'GET',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'id' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'insert' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/userRoles',
              'httpMethod' => 'POST',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/userRoles',
              'httpMethod' => 'GET',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'accountUserRoleOnly' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'ids' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'searchString' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'sortField' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'sortOrder' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'subaccountId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'patch' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/userRoles',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'id' => [
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'update' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/userRoles',
              'httpMethod' => 'PUT',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->videoFormats = new Dfareporting\Resource\VideoFormats(
        $this,
        $this->serviceName,
        'videoFormats',
        [
          'methods' => [
            'get' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/videoFormats/{id}',
              'httpMethod' => 'GET',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'id' => [
                  'location' => 'path',
                  'type' => 'integer',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'dfareporting/v4/userprofiles/{profileId}/videoFormats',
              'httpMethod' => 'GET',
              'parameters' => [
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Dfareporting::class, 'Google_Service_Dfareporting');
