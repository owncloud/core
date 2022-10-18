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
 * Service definition for DisplayVideo (v2).
 *
 * <p>
 * Display & Video 360 API allows users to automate complex Display & Video 360
 * workflows, such as creating insertion orders and setting targeting options
 * for individual line items.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/display-video/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class DisplayVideo extends \Google\Service
{
  /** Create, see, edit, and permanently delete your Display & Video 360 entities and reports. */
  const DISPLAY_VIDEO =
      "https://www.googleapis.com/auth/display-video";
  /** Create, see, and edit Display & Video 360 Campaign entities and see billing invoices. */
  const DISPLAY_VIDEO_MEDIAPLANNING =
      "https://www.googleapis.com/auth/display-video-mediaplanning";
  /** Private Service: https://www.googleapis.com/auth/display-video-user-management. */
  const DISPLAY_VIDEO_USER_MANAGEMENT =
      "https://www.googleapis.com/auth/display-video-user-management";
  /** View and manage your reports in DoubleClick Bid Manager. */
  const DOUBLECLICKBIDMANAGER =
      "https://www.googleapis.com/auth/doubleclickbidmanager";

  public $advertisers;
  public $advertisers_assets;
  public $advertisers_campaigns;
  public $advertisers_campaigns_targetingTypes_assignedTargetingOptions;
  public $advertisers_channels;
  public $advertisers_channels_sites;
  public $advertisers_creatives;
  public $advertisers_insertionOrders;
  public $advertisers_insertionOrders_targetingTypes_assignedTargetingOptions;
  public $advertisers_invoices;
  public $advertisers_lineItems;
  public $advertisers_lineItems_targetingTypes_assignedTargetingOptions;
  public $advertisers_locationLists;
  public $advertisers_locationLists_assignedLocations;
  public $advertisers_manualTriggers;
  public $advertisers_negativeKeywordLists;
  public $advertisers_negativeKeywordLists_negativeKeywords;
  public $advertisers_targetingTypes_assignedTargetingOptions;
  public $combinedAudiences;
  public $customBiddingAlgorithms;
  public $customBiddingAlgorithms_scripts;
  public $customLists;
  public $firstAndThirdPartyAudiences;
  public $floodlightGroups;
  public $googleAudiences;
  public $guaranteedOrders;
  public $inventorySourceGroups;
  public $inventorySourceGroups_assignedInventorySources;
  public $inventorySources;
  public $media;
  public $partners;
  public $partners_channels;
  public $partners_channels_sites;
  public $partners_targetingTypes_assignedTargetingOptions;
  public $sdfdownloadtasks;
  public $sdfdownloadtasks_operations;
  public $targetingTypes_targetingOptions;
  public $users;

  /**
   * Constructs the internal representation of the DisplayVideo service.
   *
   * @param Client|array $clientOrConfig The client used to deliver requests, or a
   *                                     config array to pass to a new Client instance.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct($clientOrConfig = [], $rootUrl = null)
  {
    parent::__construct($clientOrConfig);
    $this->rootUrl = $rootUrl ?: 'https://displayvideo.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v2';
    $this->serviceName = 'displayvideo';

    $this->advertisers = new DisplayVideo\Resource\Advertisers(
        $this,
        $this->serviceName,
        'advertisers',
        [
          'methods' => [
            'audit' => [
              'path' => 'v2/advertisers/{+advertiserId}:audit',
              'httpMethod' => 'GET',
              'parameters' => [
                'advertiserId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'readMask' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'create' => [
              'path' => 'v2/advertisers',
              'httpMethod' => 'POST',
              'parameters' => [],
            ],'delete' => [
              'path' => 'v2/advertisers/{+advertiserId}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'advertiserId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'editAssignedTargetingOptions' => [
              'path' => 'v2/advertisers/{+advertiserId}:editAssignedTargetingOptions',
              'httpMethod' => 'POST',
              'parameters' => [
                'advertiserId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'v2/advertisers/{+advertiserId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'advertiserId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'v2/advertisers',
              'httpMethod' => 'GET',
              'parameters' => [
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageSize' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'partnerId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'listAssignedTargetingOptions' => [
              'path' => 'v2/advertisers/{+advertiserId}:listAssignedTargetingOptions',
              'httpMethod' => 'GET',
              'parameters' => [
                'advertiserId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageSize' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'patch' => [
              'path' => 'v2/advertisers/{+advertiserId}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'advertiserId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'updateMask' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->advertisers_assets = new DisplayVideo\Resource\AdvertisersAssets(
        $this,
        $this->serviceName,
        'assets',
        [
          'methods' => [
            'upload' => [
              'path' => 'v2/advertisers/{+advertiserId}/assets',
              'httpMethod' => 'POST',
              'parameters' => [
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
    $this->advertisers_campaigns = new DisplayVideo\Resource\AdvertisersCampaigns(
        $this,
        $this->serviceName,
        'campaigns',
        [
          'methods' => [
            'create' => [
              'path' => 'v2/advertisers/{+advertiserId}/campaigns',
              'httpMethod' => 'POST',
              'parameters' => [
                'advertiserId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'delete' => [
              'path' => 'v2/advertisers/{+advertiserId}/campaigns/{+campaignId}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'advertiserId' => [
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
            ],'get' => [
              'path' => 'v2/advertisers/{+advertiserId}/campaigns/{+campaignId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'advertiserId' => [
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
              'path' => 'v2/advertisers/{+advertiserId}/campaigns',
              'httpMethod' => 'GET',
              'parameters' => [
                'advertiserId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageSize' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'listAssignedTargetingOptions' => [
              'path' => 'v2/advertisers/{+advertiserId}/campaigns/{+campaignId}:listAssignedTargetingOptions',
              'httpMethod' => 'GET',
              'parameters' => [
                'advertiserId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'campaignId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageSize' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'patch' => [
              'path' => 'v2/advertisers/{+advertiserId}/campaigns/{+campaignId}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'advertiserId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'campaignId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'updateMask' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->advertisers_campaigns_targetingTypes_assignedTargetingOptions = new DisplayVideo\Resource\AdvertisersCampaignsTargetingTypesAssignedTargetingOptions(
        $this,
        $this->serviceName,
        'assignedTargetingOptions',
        [
          'methods' => [
            'get' => [
              'path' => 'v2/advertisers/{+advertiserId}/campaigns/{+campaignId}/targetingTypes/{+targetingType}/assignedTargetingOptions/{+assignedTargetingOptionId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'advertiserId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'campaignId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'targetingType' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'assignedTargetingOptionId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'v2/advertisers/{+advertiserId}/campaigns/{+campaignId}/targetingTypes/{+targetingType}/assignedTargetingOptions',
              'httpMethod' => 'GET',
              'parameters' => [
                'advertiserId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'campaignId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'targetingType' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageSize' => [
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
    $this->advertisers_channels = new DisplayVideo\Resource\AdvertisersChannels(
        $this,
        $this->serviceName,
        'channels',
        [
          'methods' => [
            'create' => [
              'path' => 'v2/advertisers/{+advertiserId}/channels',
              'httpMethod' => 'POST',
              'parameters' => [
                'advertiserId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'partnerId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'get' => [
              'path' => 'v2/advertisers/{+advertiserId}/channels/{+channelId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'advertiserId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'channelId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'partnerId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'list' => [
              'path' => 'v2/advertisers/{+advertiserId}/channels',
              'httpMethod' => 'GET',
              'parameters' => [
                'advertiserId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageSize' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'partnerId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'patch' => [
              'path' => 'v2/advertisers/{+advertiserId}/channels/{channelId}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'advertiserId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'channelId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'partnerId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'updateMask' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->advertisers_channels_sites = new DisplayVideo\Resource\AdvertisersChannelsSites(
        $this,
        $this->serviceName,
        'sites',
        [
          'methods' => [
            'bulkEdit' => [
              'path' => 'v2/advertisers/{advertiserId}/channels/{+channelId}/sites:bulkEdit',
              'httpMethod' => 'POST',
              'parameters' => [
                'advertiserId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'channelId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'create' => [
              'path' => 'v2/advertisers/{advertiserId}/channels/{+channelId}/sites',
              'httpMethod' => 'POST',
              'parameters' => [
                'advertiserId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'channelId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'partnerId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'delete' => [
              'path' => 'v2/advertisers/{advertiserId}/channels/{+channelId}/sites/{+urlOrAppId}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'advertiserId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'channelId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'urlOrAppId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'partnerId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'list' => [
              'path' => 'v2/advertisers/{+advertiserId}/channels/{+channelId}/sites',
              'httpMethod' => 'GET',
              'parameters' => [
                'advertiserId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'channelId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageSize' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'partnerId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'replace' => [
              'path' => 'v2/advertisers/{advertiserId}/channels/{+channelId}/sites:replace',
              'httpMethod' => 'POST',
              'parameters' => [
                'advertiserId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'channelId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->advertisers_creatives = new DisplayVideo\Resource\AdvertisersCreatives(
        $this,
        $this->serviceName,
        'creatives',
        [
          'methods' => [
            'create' => [
              'path' => 'v2/advertisers/{+advertiserId}/creatives',
              'httpMethod' => 'POST',
              'parameters' => [
                'advertiserId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'delete' => [
              'path' => 'v2/advertisers/{+advertiserId}/creatives/{+creativeId}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'advertiserId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'creativeId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'v2/advertisers/{+advertiserId}/creatives/{+creativeId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'advertiserId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'creativeId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'v2/advertisers/{+advertiserId}/creatives',
              'httpMethod' => 'GET',
              'parameters' => [
                'advertiserId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageSize' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'patch' => [
              'path' => 'v2/advertisers/{+advertiserId}/creatives/{+creativeId}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'advertiserId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'creativeId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'updateMask' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->advertisers_insertionOrders = new DisplayVideo\Resource\AdvertisersInsertionOrders(
        $this,
        $this->serviceName,
        'insertionOrders',
        [
          'methods' => [
            'create' => [
              'path' => 'v2/advertisers/{+advertiserId}/insertionOrders',
              'httpMethod' => 'POST',
              'parameters' => [
                'advertiserId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'delete' => [
              'path' => 'v2/advertisers/{+advertiserId}/insertionOrders/{+insertionOrderId}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'advertiserId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'insertionOrderId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'v2/advertisers/{+advertiserId}/insertionOrders/{+insertionOrderId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'advertiserId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'insertionOrderId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'v2/advertisers/{+advertiserId}/insertionOrders',
              'httpMethod' => 'GET',
              'parameters' => [
                'advertiserId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageSize' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'listAssignedTargetingOptions' => [
              'path' => 'v2/advertisers/{+advertiserId}/insertionOrders/{+insertionOrderId}:listAssignedTargetingOptions',
              'httpMethod' => 'GET',
              'parameters' => [
                'advertiserId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'insertionOrderId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageSize' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'patch' => [
              'path' => 'v2/advertisers/{+advertiserId}/insertionOrders/{+insertionOrderId}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'advertiserId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'insertionOrderId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'updateMask' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->advertisers_insertionOrders_targetingTypes_assignedTargetingOptions = new DisplayVideo\Resource\AdvertisersInsertionOrdersTargetingTypesAssignedTargetingOptions(
        $this,
        $this->serviceName,
        'assignedTargetingOptions',
        [
          'methods' => [
            'get' => [
              'path' => 'v2/advertisers/{+advertiserId}/insertionOrders/{+insertionOrderId}/targetingTypes/{+targetingType}/assignedTargetingOptions/{+assignedTargetingOptionId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'advertiserId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'insertionOrderId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'targetingType' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'assignedTargetingOptionId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'v2/advertisers/{+advertiserId}/insertionOrders/{+insertionOrderId}/targetingTypes/{+targetingType}/assignedTargetingOptions',
              'httpMethod' => 'GET',
              'parameters' => [
                'advertiserId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'insertionOrderId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'targetingType' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageSize' => [
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
    $this->advertisers_invoices = new DisplayVideo\Resource\AdvertisersInvoices(
        $this,
        $this->serviceName,
        'invoices',
        [
          'methods' => [
            'list' => [
              'path' => 'v2/advertisers/{+advertiserId}/invoices',
              'httpMethod' => 'GET',
              'parameters' => [
                'advertiserId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'issueMonth' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'loiSapinInvoiceType' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageSize' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'lookupInvoiceCurrency' => [
              'path' => 'v2/advertisers/{+advertiserId}/invoices:lookupInvoiceCurrency',
              'httpMethod' => 'GET',
              'parameters' => [
                'advertiserId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'invoiceMonth' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->advertisers_lineItems = new DisplayVideo\Resource\AdvertisersLineItems(
        $this,
        $this->serviceName,
        'lineItems',
        [
          'methods' => [
            'bulkEditAssignedTargetingOptions' => [
              'path' => 'v2/advertisers/{+advertiserId}/lineItems:bulkEditAssignedTargetingOptions',
              'httpMethod' => 'POST',
              'parameters' => [
                'advertiserId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'bulkListAssignedTargetingOptions' => [
              'path' => 'v2/advertisers/{+advertiserId}/lineItems:bulkListAssignedTargetingOptions',
              'httpMethod' => 'GET',
              'parameters' => [
                'advertiserId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'lineItemIds' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageSize' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'bulkUpdate' => [
              'path' => 'v2/advertisers/{advertisersId}/lineItems:bulkUpdate',
              'httpMethod' => 'POST',
              'parameters' => [
                'advertisersId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'create' => [
              'path' => 'v2/advertisers/{+advertiserId}/lineItems',
              'httpMethod' => 'POST',
              'parameters' => [
                'advertiserId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'delete' => [
              'path' => 'v2/advertisers/{+advertiserId}/lineItems/{+lineItemId}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'advertiserId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'lineItemId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'generateDefault' => [
              'path' => 'v2/advertisers/{+advertiserId}/lineItems:generateDefault',
              'httpMethod' => 'POST',
              'parameters' => [
                'advertiserId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'v2/advertisers/{+advertiserId}/lineItems/{+lineItemId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'advertiserId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'lineItemId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'v2/advertisers/{+advertiserId}/lineItems',
              'httpMethod' => 'GET',
              'parameters' => [
                'advertiserId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageSize' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'patch' => [
              'path' => 'v2/advertisers/{+advertiserId}/lineItems/{+lineItemId}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'advertiserId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'lineItemId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'updateMask' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->advertisers_lineItems_targetingTypes_assignedTargetingOptions = new DisplayVideo\Resource\AdvertisersLineItemsTargetingTypesAssignedTargetingOptions(
        $this,
        $this->serviceName,
        'assignedTargetingOptions',
        [
          'methods' => [
            'create' => [
              'path' => 'v2/advertisers/{+advertiserId}/lineItems/{+lineItemId}/targetingTypes/{+targetingType}/assignedTargetingOptions',
              'httpMethod' => 'POST',
              'parameters' => [
                'advertiserId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'lineItemId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'targetingType' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'delete' => [
              'path' => 'v2/advertisers/{+advertiserId}/lineItems/{+lineItemId}/targetingTypes/{+targetingType}/assignedTargetingOptions/{+assignedTargetingOptionId}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'advertiserId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'lineItemId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'targetingType' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'assignedTargetingOptionId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'v2/advertisers/{+advertiserId}/lineItems/{+lineItemId}/targetingTypes/{+targetingType}/assignedTargetingOptions/{+assignedTargetingOptionId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'advertiserId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'lineItemId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'targetingType' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'assignedTargetingOptionId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'v2/advertisers/{+advertiserId}/lineItems/{+lineItemId}/targetingTypes/{+targetingType}/assignedTargetingOptions',
              'httpMethod' => 'GET',
              'parameters' => [
                'advertiserId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'lineItemId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'targetingType' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageSize' => [
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
    $this->advertisers_locationLists = new DisplayVideo\Resource\AdvertisersLocationLists(
        $this,
        $this->serviceName,
        'locationLists',
        [
          'methods' => [
            'create' => [
              'path' => 'v2/advertisers/{+advertiserId}/locationLists',
              'httpMethod' => 'POST',
              'parameters' => [
                'advertiserId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'v2/advertisers/{+advertiserId}/locationLists/{+locationListId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'advertiserId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'locationListId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'v2/advertisers/{+advertiserId}/locationLists',
              'httpMethod' => 'GET',
              'parameters' => [
                'advertiserId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageSize' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'patch' => [
              'path' => 'v2/advertisers/{+advertiserId}/locationLists/{locationListId}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'advertiserId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'locationListId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'updateMask' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->advertisers_locationLists_assignedLocations = new DisplayVideo\Resource\AdvertisersLocationListsAssignedLocations(
        $this,
        $this->serviceName,
        'assignedLocations',
        [
          'methods' => [
            'bulkEdit' => [
              'path' => 'v2/advertisers/{advertiserId}/locationLists/{+locationListId}/assignedLocations:bulkEdit',
              'httpMethod' => 'POST',
              'parameters' => [
                'advertiserId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'locationListId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'create' => [
              'path' => 'v2/advertisers/{advertiserId}/locationLists/{locationListId}/assignedLocations',
              'httpMethod' => 'POST',
              'parameters' => [
                'advertiserId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'locationListId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'delete' => [
              'path' => 'v2/advertisers/{advertiserId}/locationLists/{locationListId}/assignedLocations/{+assignedLocationId}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'advertiserId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'locationListId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'assignedLocationId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'v2/advertisers/{advertiserId}/locationLists/{locationListId}/assignedLocations',
              'httpMethod' => 'GET',
              'parameters' => [
                'advertiserId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'locationListId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageSize' => [
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
    $this->advertisers_manualTriggers = new DisplayVideo\Resource\AdvertisersManualTriggers(
        $this,
        $this->serviceName,
        'manualTriggers',
        [
          'methods' => [
            'activate' => [
              'path' => 'v2/advertisers/{+advertiserId}/manualTriggers/{+triggerId}:activate',
              'httpMethod' => 'POST',
              'parameters' => [
                'advertiserId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'triggerId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'create' => [
              'path' => 'v2/advertisers/{+advertiserId}/manualTriggers',
              'httpMethod' => 'POST',
              'parameters' => [
                'advertiserId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'deactivate' => [
              'path' => 'v2/advertisers/{+advertiserId}/manualTriggers/{+triggerId}:deactivate',
              'httpMethod' => 'POST',
              'parameters' => [
                'advertiserId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'triggerId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'v2/advertisers/{+advertiserId}/manualTriggers/{+triggerId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'advertiserId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'triggerId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'v2/advertisers/{+advertiserId}/manualTriggers',
              'httpMethod' => 'GET',
              'parameters' => [
                'advertiserId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageSize' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'patch' => [
              'path' => 'v2/advertisers/{+advertiserId}/manualTriggers/{+triggerId}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'advertiserId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'triggerId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'updateMask' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->advertisers_negativeKeywordLists = new DisplayVideo\Resource\AdvertisersNegativeKeywordLists(
        $this,
        $this->serviceName,
        'negativeKeywordLists',
        [
          'methods' => [
            'create' => [
              'path' => 'v2/advertisers/{+advertiserId}/negativeKeywordLists',
              'httpMethod' => 'POST',
              'parameters' => [
                'advertiserId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'delete' => [
              'path' => 'v2/advertisers/{+advertiserId}/negativeKeywordLists/{+negativeKeywordListId}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'advertiserId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'negativeKeywordListId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'v2/advertisers/{+advertiserId}/negativeKeywordLists/{+negativeKeywordListId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'advertiserId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'negativeKeywordListId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'v2/advertisers/{+advertiserId}/negativeKeywordLists',
              'httpMethod' => 'GET',
              'parameters' => [
                'advertiserId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'pageSize' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'patch' => [
              'path' => 'v2/advertisers/{+advertiserId}/negativeKeywordLists/{negativeKeywordListId}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'advertiserId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'negativeKeywordListId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'updateMask' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->advertisers_negativeKeywordLists_negativeKeywords = new DisplayVideo\Resource\AdvertisersNegativeKeywordListsNegativeKeywords(
        $this,
        $this->serviceName,
        'negativeKeywords',
        [
          'methods' => [
            'bulkEdit' => [
              'path' => 'v2/advertisers/{advertiserId}/negativeKeywordLists/{+negativeKeywordListId}/negativeKeywords:bulkEdit',
              'httpMethod' => 'POST',
              'parameters' => [
                'advertiserId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'negativeKeywordListId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'create' => [
              'path' => 'v2/advertisers/{advertiserId}/negativeKeywordLists/{+negativeKeywordListId}/negativeKeywords',
              'httpMethod' => 'POST',
              'parameters' => [
                'advertiserId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'negativeKeywordListId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'delete' => [
              'path' => 'v2/advertisers/{advertiserId}/negativeKeywordLists/{+negativeKeywordListId}/negativeKeywords/{+keywordValue}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'advertiserId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'negativeKeywordListId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'keywordValue' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'v2/advertisers/{+advertiserId}/negativeKeywordLists/{+negativeKeywordListId}/negativeKeywords',
              'httpMethod' => 'GET',
              'parameters' => [
                'advertiserId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'negativeKeywordListId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageSize' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'replace' => [
              'path' => 'v2/advertisers/{advertiserId}/negativeKeywordLists/{+negativeKeywordListId}/negativeKeywords:replace',
              'httpMethod' => 'POST',
              'parameters' => [
                'advertiserId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'negativeKeywordListId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->advertisers_targetingTypes_assignedTargetingOptions = new DisplayVideo\Resource\AdvertisersTargetingTypesAssignedTargetingOptions(
        $this,
        $this->serviceName,
        'assignedTargetingOptions',
        [
          'methods' => [
            'create' => [
              'path' => 'v2/advertisers/{+advertiserId}/targetingTypes/{+targetingType}/assignedTargetingOptions',
              'httpMethod' => 'POST',
              'parameters' => [
                'advertiserId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'targetingType' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'delete' => [
              'path' => 'v2/advertisers/{+advertiserId}/targetingTypes/{+targetingType}/assignedTargetingOptions/{+assignedTargetingOptionId}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'advertiserId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'targetingType' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'assignedTargetingOptionId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'v2/advertisers/{+advertiserId}/targetingTypes/{+targetingType}/assignedTargetingOptions/{+assignedTargetingOptionId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'advertiserId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'targetingType' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'assignedTargetingOptionId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'v2/advertisers/{+advertiserId}/targetingTypes/{+targetingType}/assignedTargetingOptions',
              'httpMethod' => 'GET',
              'parameters' => [
                'advertiserId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'targetingType' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageSize' => [
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
    $this->combinedAudiences = new DisplayVideo\Resource\CombinedAudiences(
        $this,
        $this->serviceName,
        'combinedAudiences',
        [
          'methods' => [
            'get' => [
              'path' => 'v2/combinedAudiences/{+combinedAudienceId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'combinedAudienceId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'advertiserId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'partnerId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'list' => [
              'path' => 'v2/combinedAudiences',
              'httpMethod' => 'GET',
              'parameters' => [
                'advertiserId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageSize' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'partnerId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->customBiddingAlgorithms = new DisplayVideo\Resource\CustomBiddingAlgorithms(
        $this,
        $this->serviceName,
        'customBiddingAlgorithms',
        [
          'methods' => [
            'create' => [
              'path' => 'v2/customBiddingAlgorithms',
              'httpMethod' => 'POST',
              'parameters' => [],
            ],'get' => [
              'path' => 'v2/customBiddingAlgorithms/{+customBiddingAlgorithmId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'customBiddingAlgorithmId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'advertiserId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'partnerId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'list' => [
              'path' => 'v2/customBiddingAlgorithms',
              'httpMethod' => 'GET',
              'parameters' => [
                'advertiserId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageSize' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'partnerId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'patch' => [
              'path' => 'v2/customBiddingAlgorithms/{+customBiddingAlgorithmId}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'customBiddingAlgorithmId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'updateMask' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'uploadScript' => [
              'path' => 'v2/customBiddingAlgorithms/{+customBiddingAlgorithmId}:uploadScript',
              'httpMethod' => 'GET',
              'parameters' => [
                'customBiddingAlgorithmId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'advertiserId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'partnerId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->customBiddingAlgorithms_scripts = new DisplayVideo\Resource\CustomBiddingAlgorithmsScripts(
        $this,
        $this->serviceName,
        'scripts',
        [
          'methods' => [
            'create' => [
              'path' => 'v2/customBiddingAlgorithms/{+customBiddingAlgorithmId}/scripts',
              'httpMethod' => 'POST',
              'parameters' => [
                'customBiddingAlgorithmId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'advertiserId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'partnerId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'get' => [
              'path' => 'v2/customBiddingAlgorithms/{+customBiddingAlgorithmId}/scripts/{+customBiddingScriptId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'customBiddingAlgorithmId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'customBiddingScriptId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'advertiserId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'partnerId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'list' => [
              'path' => 'v2/customBiddingAlgorithms/{+customBiddingAlgorithmId}/scripts',
              'httpMethod' => 'GET',
              'parameters' => [
                'customBiddingAlgorithmId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'advertiserId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageSize' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'partnerId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->customLists = new DisplayVideo\Resource\CustomLists(
        $this,
        $this->serviceName,
        'customLists',
        [
          'methods' => [
            'get' => [
              'path' => 'v2/customLists/{+customListId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'customListId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'advertiserId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'list' => [
              'path' => 'v2/customLists',
              'httpMethod' => 'GET',
              'parameters' => [
                'advertiserId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageSize' => [
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
    $this->firstAndThirdPartyAudiences = new DisplayVideo\Resource\FirstAndThirdPartyAudiences(
        $this,
        $this->serviceName,
        'firstAndThirdPartyAudiences',
        [
          'methods' => [
            'create' => [
              'path' => 'v2/firstAndThirdPartyAudiences',
              'httpMethod' => 'POST',
              'parameters' => [
                'advertiserId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'editCustomerMatchMembers' => [
              'path' => 'v2/firstAndThirdPartyAudiences/{+firstAndThirdPartyAudienceId}:editCustomerMatchMembers',
              'httpMethod' => 'POST',
              'parameters' => [
                'firstAndThirdPartyAudienceId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'v2/firstAndThirdPartyAudiences/{+firstAndThirdPartyAudienceId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'firstAndThirdPartyAudienceId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'advertiserId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'partnerId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'list' => [
              'path' => 'v2/firstAndThirdPartyAudiences',
              'httpMethod' => 'GET',
              'parameters' => [
                'advertiserId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageSize' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'partnerId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'patch' => [
              'path' => 'v2/firstAndThirdPartyAudiences/{+firstAndThirdPartyAudienceId}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'firstAndThirdPartyAudienceId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'advertiserId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'updateMask' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->floodlightGroups = new DisplayVideo\Resource\FloodlightGroups(
        $this,
        $this->serviceName,
        'floodlightGroups',
        [
          'methods' => [
            'get' => [
              'path' => 'v2/floodlightGroups/{+floodlightGroupId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'floodlightGroupId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'partnerId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'patch' => [
              'path' => 'v2/floodlightGroups/{floodlightGroupId}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'floodlightGroupId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'partnerId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'updateMask' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->googleAudiences = new DisplayVideo\Resource\GoogleAudiences(
        $this,
        $this->serviceName,
        'googleAudiences',
        [
          'methods' => [
            'get' => [
              'path' => 'v2/googleAudiences/{+googleAudienceId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'googleAudienceId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'advertiserId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'partnerId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'list' => [
              'path' => 'v2/googleAudiences',
              'httpMethod' => 'GET',
              'parameters' => [
                'advertiserId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageSize' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'partnerId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->guaranteedOrders = new DisplayVideo\Resource\GuaranteedOrders(
        $this,
        $this->serviceName,
        'guaranteedOrders',
        [
          'methods' => [
            'create' => [
              'path' => 'v2/guaranteedOrders',
              'httpMethod' => 'POST',
              'parameters' => [
                'advertiserId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'partnerId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'editGuaranteedOrderReadAccessors' => [
              'path' => 'v2/guaranteedOrders/{+guaranteedOrderId}:editGuaranteedOrderReadAccessors',
              'httpMethod' => 'POST',
              'parameters' => [
                'guaranteedOrderId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'v2/guaranteedOrders/{+guaranteedOrderId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'guaranteedOrderId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'advertiserId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'partnerId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'list' => [
              'path' => 'v2/guaranteedOrders',
              'httpMethod' => 'GET',
              'parameters' => [
                'advertiserId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageSize' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'partnerId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'patch' => [
              'path' => 'v2/guaranteedOrders/{+guaranteedOrderId}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'guaranteedOrderId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'advertiserId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'partnerId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'updateMask' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->inventorySourceGroups = new DisplayVideo\Resource\InventorySourceGroups(
        $this,
        $this->serviceName,
        'inventorySourceGroups',
        [
          'methods' => [
            'create' => [
              'path' => 'v2/inventorySourceGroups',
              'httpMethod' => 'POST',
              'parameters' => [
                'advertiserId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'partnerId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'delete' => [
              'path' => 'v2/inventorySourceGroups/{+inventorySourceGroupId}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'inventorySourceGroupId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'advertiserId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'partnerId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'get' => [
              'path' => 'v2/inventorySourceGroups/{+inventorySourceGroupId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'inventorySourceGroupId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'advertiserId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'partnerId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'list' => [
              'path' => 'v2/inventorySourceGroups',
              'httpMethod' => 'GET',
              'parameters' => [
                'advertiserId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageSize' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'partnerId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'patch' => [
              'path' => 'v2/inventorySourceGroups/{inventorySourceGroupId}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'inventorySourceGroupId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'advertiserId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'partnerId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'updateMask' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->inventorySourceGroups_assignedInventorySources = new DisplayVideo\Resource\InventorySourceGroupsAssignedInventorySources(
        $this,
        $this->serviceName,
        'assignedInventorySources',
        [
          'methods' => [
            'bulkEdit' => [
              'path' => 'v2/inventorySourceGroups/{+inventorySourceGroupId}/assignedInventorySources:bulkEdit',
              'httpMethod' => 'POST',
              'parameters' => [
                'inventorySourceGroupId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'create' => [
              'path' => 'v2/inventorySourceGroups/{+inventorySourceGroupId}/assignedInventorySources',
              'httpMethod' => 'POST',
              'parameters' => [
                'inventorySourceGroupId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'advertiserId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'partnerId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'delete' => [
              'path' => 'v2/inventorySourceGroups/{+inventorySourceGroupId}/assignedInventorySources/{+assignedInventorySourceId}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'inventorySourceGroupId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'assignedInventorySourceId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'advertiserId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'partnerId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'list' => [
              'path' => 'v2/inventorySourceGroups/{+inventorySourceGroupId}/assignedInventorySources',
              'httpMethod' => 'GET',
              'parameters' => [
                'inventorySourceGroupId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'advertiserId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageSize' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'partnerId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->inventorySources = new DisplayVideo\Resource\InventorySources(
        $this,
        $this->serviceName,
        'inventorySources',
        [
          'methods' => [
            'create' => [
              'path' => 'v2/inventorySources',
              'httpMethod' => 'POST',
              'parameters' => [
                'advertiserId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'partnerId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'editInventorySourceReadWriteAccessors' => [
              'path' => 'v2/inventorySources/{+inventorySourceId}:editInventorySourceReadWriteAccessors',
              'httpMethod' => 'POST',
              'parameters' => [
                'inventorySourceId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'v2/inventorySources/{+inventorySourceId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'inventorySourceId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'partnerId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'list' => [
              'path' => 'v2/inventorySources',
              'httpMethod' => 'GET',
              'parameters' => [
                'advertiserId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageSize' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'partnerId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'patch' => [
              'path' => 'v2/inventorySources/{+inventorySourceId}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'inventorySourceId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'advertiserId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'partnerId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'updateMask' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->media = new DisplayVideo\Resource\Media(
        $this,
        $this->serviceName,
        'media',
        [
          'methods' => [
            'download' => [
              'path' => 'download/{+resourceName}',
              'httpMethod' => 'GET',
              'parameters' => [
                'resourceName' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'upload' => [
              'path' => 'media/{+resourceName}',
              'httpMethod' => 'POST',
              'parameters' => [
                'resourceName' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->partners = new DisplayVideo\Resource\Partners(
        $this,
        $this->serviceName,
        'partners',
        [
          'methods' => [
            'editAssignedTargetingOptions' => [
              'path' => 'v2/partners/{+partnerId}:editAssignedTargetingOptions',
              'httpMethod' => 'POST',
              'parameters' => [
                'partnerId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'v2/partners/{+partnerId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'partnerId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'v2/partners',
              'httpMethod' => 'GET',
              'parameters' => [
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageSize' => [
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
    $this->partners_channels = new DisplayVideo\Resource\PartnersChannels(
        $this,
        $this->serviceName,
        'channels',
        [
          'methods' => [
            'create' => [
              'path' => 'v2/partners/{+partnerId}/channels',
              'httpMethod' => 'POST',
              'parameters' => [
                'partnerId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'advertiserId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'get' => [
              'path' => 'v2/partners/{+partnerId}/channels/{+channelId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'partnerId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'channelId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'advertiserId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'list' => [
              'path' => 'v2/partners/{+partnerId}/channels',
              'httpMethod' => 'GET',
              'parameters' => [
                'partnerId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'advertiserId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageSize' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'patch' => [
              'path' => 'v2/partners/{+partnerId}/channels/{channelId}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'partnerId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'channelId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'advertiserId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'updateMask' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->partners_channels_sites = new DisplayVideo\Resource\PartnersChannelsSites(
        $this,
        $this->serviceName,
        'sites',
        [
          'methods' => [
            'bulkEdit' => [
              'path' => 'v2/partners/{partnerId}/channels/{+channelId}/sites:bulkEdit',
              'httpMethod' => 'POST',
              'parameters' => [
                'partnerId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'channelId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'create' => [
              'path' => 'v2/partners/{partnerId}/channels/{+channelId}/sites',
              'httpMethod' => 'POST',
              'parameters' => [
                'partnerId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'channelId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'advertiserId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'delete' => [
              'path' => 'v2/partners/{partnerId}/channels/{+channelId}/sites/{+urlOrAppId}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'partnerId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'channelId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'urlOrAppId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'advertiserId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'list' => [
              'path' => 'v2/partners/{+partnerId}/channels/{+channelId}/sites',
              'httpMethod' => 'GET',
              'parameters' => [
                'partnerId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'channelId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'advertiserId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageSize' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'replace' => [
              'path' => 'v2/partners/{partnerId}/channels/{+channelId}/sites:replace',
              'httpMethod' => 'POST',
              'parameters' => [
                'partnerId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'channelId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->partners_targetingTypes_assignedTargetingOptions = new DisplayVideo\Resource\PartnersTargetingTypesAssignedTargetingOptions(
        $this,
        $this->serviceName,
        'assignedTargetingOptions',
        [
          'methods' => [
            'create' => [
              'path' => 'v2/partners/{+partnerId}/targetingTypes/{+targetingType}/assignedTargetingOptions',
              'httpMethod' => 'POST',
              'parameters' => [
                'partnerId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'targetingType' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'delete' => [
              'path' => 'v2/partners/{+partnerId}/targetingTypes/{+targetingType}/assignedTargetingOptions/{+assignedTargetingOptionId}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'partnerId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'targetingType' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'assignedTargetingOptionId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'v2/partners/{+partnerId}/targetingTypes/{+targetingType}/assignedTargetingOptions/{+assignedTargetingOptionId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'partnerId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'targetingType' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'assignedTargetingOptionId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'v2/partners/{+partnerId}/targetingTypes/{+targetingType}/assignedTargetingOptions',
              'httpMethod' => 'GET',
              'parameters' => [
                'partnerId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'targetingType' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageSize' => [
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
    $this->sdfdownloadtasks = new DisplayVideo\Resource\Sdfdownloadtasks(
        $this,
        $this->serviceName,
        'sdfdownloadtasks',
        [
          'methods' => [
            'create' => [
              'path' => 'v2/sdfdownloadtasks',
              'httpMethod' => 'POST',
              'parameters' => [],
            ],
          ]
        ]
    );
    $this->sdfdownloadtasks_operations = new DisplayVideo\Resource\SdfdownloadtasksOperations(
        $this,
        $this->serviceName,
        'operations',
        [
          'methods' => [
            'get' => [
              'path' => 'v2/{+name}',
              'httpMethod' => 'GET',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->targetingTypes_targetingOptions = new DisplayVideo\Resource\TargetingTypesTargetingOptions(
        $this,
        $this->serviceName,
        'targetingOptions',
        [
          'methods' => [
            'get' => [
              'path' => 'v2/targetingTypes/{+targetingType}/targetingOptions/{+targetingOptionId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'targetingType' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'targetingOptionId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'advertiserId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'list' => [
              'path' => 'v2/targetingTypes/{+targetingType}/targetingOptions',
              'httpMethod' => 'GET',
              'parameters' => [
                'targetingType' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'advertiserId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageSize' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'search' => [
              'path' => 'v2/targetingTypes/{+targetingType}/targetingOptions:search',
              'httpMethod' => 'POST',
              'parameters' => [
                'targetingType' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->users = new DisplayVideo\Resource\Users(
        $this,
        $this->serviceName,
        'users',
        [
          'methods' => [
            'bulkEditAssignedUserRoles' => [
              'path' => 'v2/users/{+userId}:bulkEditAssignedUserRoles',
              'httpMethod' => 'POST',
              'parameters' => [
                'userId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'create' => [
              'path' => 'v2/users',
              'httpMethod' => 'POST',
              'parameters' => [],
            ],'delete' => [
              'path' => 'v2/users/{+userId}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'userId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'v2/users/{+userId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'userId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'v2/users',
              'httpMethod' => 'GET',
              'parameters' => [
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageSize' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'patch' => [
              'path' => 'v2/users/{+userId}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'userId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'updateMask' => [
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
class_alias(DisplayVideo::class, 'Google_Service_DisplayVideo');
