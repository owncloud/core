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
 * Service definition for DisplayVideo (v1).
 *
 * <p>
 * Display & Video 360 API allows users to manage and create campaigns and
 * reports.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/display-video/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_DisplayVideo extends Google_Service
{
  /** Create, see, edit, and permanently delete your Display & Video 360 entities and reports. */
  const DISPLAY_VIDEO =
      "https://www.googleapis.com/auth/display-video";
  /** Create, see, and edit Display & Video 360 Campaign entities and see billing invoices. */
  const DISPLAY_VIDEO_MEDIAPLANNING =
      "https://www.googleapis.com/auth/display-video-mediaplanning";
  /** New Service: https://www.googleapis.com/auth/display-video-user-management. */
  const DISPLAY_VIDEO_USER_MANAGEMENT =
      "https://www.googleapis.com/auth/display-video-user-management";
  /** View and manage your reports in DoubleClick Bid Manager. */
  const DOUBLECLICKBIDMANAGER =
      "https://www.googleapis.com/auth/doubleclickbidmanager";

  public $advertisers;
  public $advertisers_assets;
  public $advertisers_campaigns;
  public $advertisers_channels;
  public $advertisers_channels_sites;
  public $advertisers_creatives;
  public $advertisers_insertionOrders;
  public $advertisers_lineItems;
  public $advertisers_lineItems_targetingTypes_assignedTargetingOptions;
  public $advertisers_locationLists;
  public $advertisers_locationLists_assignedLocations;
  public $advertisers_negativeKeywordLists;
  public $advertisers_negativeKeywordLists_negativeKeywords;
  public $advertisers_targetingTypes_assignedTargetingOptions;
  public $combinedAudiences;
  public $customBiddingAlgorithms;
  public $customLists;
  public $firstAndThirdPartyAudiences;
  public $floodlightGroups;
  public $googleAudiences;
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
   * @param Google_Client $client The client used to deliver requests.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct(Google_Client $client, $rootUrl = null)
  {
    parent::__construct($client);
    $this->rootUrl = $rootUrl ?: 'https://displayvideo.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v1';
    $this->serviceName = 'displayvideo';

    $this->advertisers = new Google_Service_DisplayVideo_Resource_Advertisers(
        $this,
        $this->serviceName,
        'advertisers',
        array(
          'methods' => array(
            'audit' => array(
              'path' => 'v1/advertisers/{+advertiserId}:audit',
              'httpMethod' => 'GET',
              'parameters' => array(
                'advertiserId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'readMask' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'bulkEditAdvertiserAssignedTargetingOptions' => array(
              'path' => 'v1/advertisers/{+advertiserId}:bulkEditAdvertiserAssignedTargetingOptions',
              'httpMethod' => 'POST',
              'parameters' => array(
                'advertiserId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'bulkListAdvertiserAssignedTargetingOptions' => array(
              'path' => 'v1/advertisers/{+advertiserId}:bulkListAdvertiserAssignedTargetingOptions',
              'httpMethod' => 'GET',
              'parameters' => array(
                'advertiserId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'orderBy' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'filter' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'create' => array(
              'path' => 'v1/advertisers',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),'delete' => array(
              'path' => 'v1/advertisers/{+advertiserId}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'advertiserId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'v1/advertisers/{+advertiserId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'advertiserId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'v1/advertisers',
              'httpMethod' => 'GET',
              'parameters' => array(
                'orderBy' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'filter' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'partnerId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'patch' => array(
              'path' => 'v1/advertisers/{+advertiserId}',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'advertiserId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'updateMask' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->advertisers_assets = new Google_Service_DisplayVideo_Resource_AdvertisersAssets(
        $this,
        $this->serviceName,
        'assets',
        array(
          'methods' => array(
            'upload' => array(
              'path' => 'v1/advertisers/{+advertiserId}/assets',
              'httpMethod' => 'POST',
              'parameters' => array(
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
    $this->advertisers_campaigns = new Google_Service_DisplayVideo_Resource_AdvertisersCampaigns(
        $this,
        $this->serviceName,
        'campaigns',
        array(
          'methods' => array(
            'create' => array(
              'path' => 'v1/advertisers/{+advertiserId}/campaigns',
              'httpMethod' => 'POST',
              'parameters' => array(
                'advertiserId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'delete' => array(
              'path' => 'v1/advertisers/{+advertiserId}/campaigns/{+campaignId}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'advertiserId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'campaignId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'v1/advertisers/{+advertiserId}/campaigns/{+campaignId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'advertiserId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'campaignId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'v1/advertisers/{+advertiserId}/campaigns',
              'httpMethod' => 'GET',
              'parameters' => array(
                'advertiserId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'filter' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'orderBy' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'patch' => array(
              'path' => 'v1/advertisers/{+advertiserId}/campaigns/{+campaignId}',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'advertiserId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'campaignId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'updateMask' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->advertisers_channels = new Google_Service_DisplayVideo_Resource_AdvertisersChannels(
        $this,
        $this->serviceName,
        'channels',
        array(
          'methods' => array(
            'create' => array(
              'path' => 'v1/advertisers/{+advertiserId}/channels',
              'httpMethod' => 'POST',
              'parameters' => array(
                'advertiserId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'partnerId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'get' => array(
              'path' => 'v1/advertisers/{+advertiserId}/channels/{+channelId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'advertiserId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'channelId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'partnerId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'list' => array(
              'path' => 'v1/advertisers/{+advertiserId}/channels',
              'httpMethod' => 'GET',
              'parameters' => array(
                'advertiserId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'partnerId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'orderBy' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'filter' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'patch' => array(
              'path' => 'v1/advertisers/{+advertiserId}/channels/{channelId}',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'advertiserId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'channelId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'updateMask' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'partnerId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->advertisers_channels_sites = new Google_Service_DisplayVideo_Resource_AdvertisersChannelsSites(
        $this,
        $this->serviceName,
        'sites',
        array(
          'methods' => array(
            'bulkEdit' => array(
              'path' => 'v1/advertisers/{advertiserId}/channels/{+channelId}/sites:bulkEdit',
              'httpMethod' => 'POST',
              'parameters' => array(
                'advertiserId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'channelId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'create' => array(
              'path' => 'v1/advertisers/{advertiserId}/channels/{+channelId}/sites',
              'httpMethod' => 'POST',
              'parameters' => array(
                'advertiserId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'channelId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'partnerId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'delete' => array(
              'path' => 'v1/advertisers/{advertiserId}/channels/{+channelId}/sites/{+urlOrAppId}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'advertiserId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'channelId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'urlOrAppId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'partnerId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'list' => array(
              'path' => 'v1/advertisers/{+advertiserId}/channels/{+channelId}/sites',
              'httpMethod' => 'GET',
              'parameters' => array(
                'advertiserId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'channelId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'partnerId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'filter' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'orderBy' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->advertisers_creatives = new Google_Service_DisplayVideo_Resource_AdvertisersCreatives(
        $this,
        $this->serviceName,
        'creatives',
        array(
          'methods' => array(
            'create' => array(
              'path' => 'v1/advertisers/{+advertiserId}/creatives',
              'httpMethod' => 'POST',
              'parameters' => array(
                'advertiserId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'delete' => array(
              'path' => 'v1/advertisers/{+advertiserId}/creatives/{+creativeId}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'advertiserId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'creativeId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'v1/advertisers/{+advertiserId}/creatives/{+creativeId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'advertiserId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'creativeId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'v1/advertisers/{+advertiserId}/creatives',
              'httpMethod' => 'GET',
              'parameters' => array(
                'advertiserId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'orderBy' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'filter' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'patch' => array(
              'path' => 'v1/advertisers/{+advertiserId}/creatives/{+creativeId}',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'advertiserId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'creativeId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'updateMask' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->advertisers_insertionOrders = new Google_Service_DisplayVideo_Resource_AdvertisersInsertionOrders(
        $this,
        $this->serviceName,
        'insertionOrders',
        array(
          'methods' => array(
            'create' => array(
              'path' => 'v1/advertisers/{+advertiserId}/insertionOrders',
              'httpMethod' => 'POST',
              'parameters' => array(
                'advertiserId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'delete' => array(
              'path' => 'v1/advertisers/{+advertiserId}/insertionOrders/{+insertionOrderId}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'advertiserId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'insertionOrderId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'v1/advertisers/{+advertiserId}/insertionOrders/{+insertionOrderId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'advertiserId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'insertionOrderId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'v1/advertisers/{+advertiserId}/insertionOrders',
              'httpMethod' => 'GET',
              'parameters' => array(
                'advertiserId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'orderBy' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'filter' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'patch' => array(
              'path' => 'v1/advertisers/{+advertiserId}/insertionOrders/{+insertionOrderId}',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'advertiserId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'insertionOrderId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'updateMask' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->advertisers_lineItems = new Google_Service_DisplayVideo_Resource_AdvertisersLineItems(
        $this,
        $this->serviceName,
        'lineItems',
        array(
          'methods' => array(
            'bulkEditLineItemAssignedTargetingOptions' => array(
              'path' => 'v1/advertisers/{+advertiserId}/lineItems/{+lineItemId}:bulkEditLineItemAssignedTargetingOptions',
              'httpMethod' => 'POST',
              'parameters' => array(
                'advertiserId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'lineItemId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'bulkListLineItemAssignedTargetingOptions' => array(
              'path' => 'v1/advertisers/{+advertiserId}/lineItems/{+lineItemId}:bulkListLineItemAssignedTargetingOptions',
              'httpMethod' => 'GET',
              'parameters' => array(
                'advertiserId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'lineItemId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'orderBy' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'filter' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
              ),
            ),'create' => array(
              'path' => 'v1/advertisers/{+advertiserId}/lineItems',
              'httpMethod' => 'POST',
              'parameters' => array(
                'advertiserId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'delete' => array(
              'path' => 'v1/advertisers/{+advertiserId}/lineItems/{+lineItemId}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'advertiserId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'lineItemId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'v1/advertisers/{+advertiserId}/lineItems/{+lineItemId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'advertiserId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'lineItemId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'v1/advertisers/{+advertiserId}/lineItems',
              'httpMethod' => 'GET',
              'parameters' => array(
                'advertiserId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'filter' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'orderBy' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'patch' => array(
              'path' => 'v1/advertisers/{+advertiserId}/lineItems/{+lineItemId}',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'advertiserId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'lineItemId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'updateMask' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->advertisers_lineItems_targetingTypes_assignedTargetingOptions = new Google_Service_DisplayVideo_Resource_AdvertisersLineItemsTargetingTypesAssignedTargetingOptions(
        $this,
        $this->serviceName,
        'assignedTargetingOptions',
        array(
          'methods' => array(
            'create' => array(
              'path' => 'v1/advertisers/{+advertiserId}/lineItems/{+lineItemId}/targetingTypes/{+targetingType}/assignedTargetingOptions',
              'httpMethod' => 'POST',
              'parameters' => array(
                'advertiserId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'lineItemId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'targetingType' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'delete' => array(
              'path' => 'v1/advertisers/{+advertiserId}/lineItems/{+lineItemId}/targetingTypes/{+targetingType}/assignedTargetingOptions/{+assignedTargetingOptionId}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'advertiserId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'lineItemId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'targetingType' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'assignedTargetingOptionId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'v1/advertisers/{+advertiserId}/lineItems/{+lineItemId}/targetingTypes/{+targetingType}/assignedTargetingOptions/{+assignedTargetingOptionId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'advertiserId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'lineItemId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'targetingType' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'assignedTargetingOptionId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'v1/advertisers/{+advertiserId}/lineItems/{+lineItemId}/targetingTypes/{+targetingType}/assignedTargetingOptions',
              'httpMethod' => 'GET',
              'parameters' => array(
                'advertiserId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'lineItemId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'targetingType' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'filter' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'orderBy' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
              ),
            ),
          )
        )
    );
    $this->advertisers_locationLists = new Google_Service_DisplayVideo_Resource_AdvertisersLocationLists(
        $this,
        $this->serviceName,
        'locationLists',
        array(
          'methods' => array(
            'create' => array(
              'path' => 'v1/advertisers/{+advertiserId}/locationLists',
              'httpMethod' => 'POST',
              'parameters' => array(
                'advertiserId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'v1/advertisers/{+advertiserId}/locationLists/{+locationListId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'advertiserId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'locationListId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'v1/advertisers/{+advertiserId}/locationLists',
              'httpMethod' => 'GET',
              'parameters' => array(
                'advertiserId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'orderBy' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'filter' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'patch' => array(
              'path' => 'v1/advertisers/{+advertiserId}/locationLists/{locationListId}',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'advertiserId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'locationListId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'updateMask' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->advertisers_locationLists_assignedLocations = new Google_Service_DisplayVideo_Resource_AdvertisersLocationListsAssignedLocations(
        $this,
        $this->serviceName,
        'assignedLocations',
        array(
          'methods' => array(
            'bulkEdit' => array(
              'path' => 'v1/advertisers/{advertiserId}/locationLists/{+locationListId}/assignedLocations:bulkEdit',
              'httpMethod' => 'POST',
              'parameters' => array(
                'advertiserId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'locationListId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'create' => array(
              'path' => 'v1/advertisers/{advertiserId}/locationLists/{locationListId}/assignedLocations',
              'httpMethod' => 'POST',
              'parameters' => array(
                'advertiserId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'locationListId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'delete' => array(
              'path' => 'v1/advertisers/{advertiserId}/locationLists/{locationListId}/assignedLocations/{+assignedLocationId}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'advertiserId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'locationListId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'assignedLocationId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'v1/advertisers/{advertiserId}/locationLists/{locationListId}/assignedLocations',
              'httpMethod' => 'GET',
              'parameters' => array(
                'advertiserId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'locationListId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'filter' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'orderBy' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->advertisers_negativeKeywordLists = new Google_Service_DisplayVideo_Resource_AdvertisersNegativeKeywordLists(
        $this,
        $this->serviceName,
        'negativeKeywordLists',
        array(
          'methods' => array(
            'create' => array(
              'path' => 'v1/advertisers/{+advertiserId}/negativeKeywordLists',
              'httpMethod' => 'POST',
              'parameters' => array(
                'advertiserId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'delete' => array(
              'path' => 'v1/advertisers/{+advertiserId}/negativeKeywordLists/{+negativeKeywordListId}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'advertiserId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'negativeKeywordListId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'v1/advertisers/{+advertiserId}/negativeKeywordLists/{+negativeKeywordListId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'advertiserId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'negativeKeywordListId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'v1/advertisers/{+advertiserId}/negativeKeywordLists',
              'httpMethod' => 'GET',
              'parameters' => array(
                'advertiserId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
              ),
            ),'patch' => array(
              'path' => 'v1/advertisers/{+advertiserId}/negativeKeywordLists/{negativeKeywordListId}',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'advertiserId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'negativeKeywordListId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'updateMask' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->advertisers_negativeKeywordLists_negativeKeywords = new Google_Service_DisplayVideo_Resource_AdvertisersNegativeKeywordListsNegativeKeywords(
        $this,
        $this->serviceName,
        'negativeKeywords',
        array(
          'methods' => array(
            'bulkEdit' => array(
              'path' => 'v1/advertisers/{advertiserId}/negativeKeywordLists/{+negativeKeywordListId}/negativeKeywords:bulkEdit',
              'httpMethod' => 'POST',
              'parameters' => array(
                'advertiserId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'negativeKeywordListId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'create' => array(
              'path' => 'v1/advertisers/{advertiserId}/negativeKeywordLists/{+negativeKeywordListId}/negativeKeywords',
              'httpMethod' => 'POST',
              'parameters' => array(
                'advertiserId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'negativeKeywordListId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'delete' => array(
              'path' => 'v1/advertisers/{advertiserId}/negativeKeywordLists/{+negativeKeywordListId}/negativeKeywords/{+keywordValue}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'advertiserId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'negativeKeywordListId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'keywordValue' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'v1/advertisers/{+advertiserId}/negativeKeywordLists/{+negativeKeywordListId}/negativeKeywords',
              'httpMethod' => 'GET',
              'parameters' => array(
                'advertiserId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'negativeKeywordListId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'orderBy' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'filter' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->advertisers_targetingTypes_assignedTargetingOptions = new Google_Service_DisplayVideo_Resource_AdvertisersTargetingTypesAssignedTargetingOptions(
        $this,
        $this->serviceName,
        'assignedTargetingOptions',
        array(
          'methods' => array(
            'create' => array(
              'path' => 'v1/advertisers/{+advertiserId}/targetingTypes/{+targetingType}/assignedTargetingOptions',
              'httpMethod' => 'POST',
              'parameters' => array(
                'advertiserId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'targetingType' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'delete' => array(
              'path' => 'v1/advertisers/{+advertiserId}/targetingTypes/{+targetingType}/assignedTargetingOptions/{+assignedTargetingOptionId}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'advertiserId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'targetingType' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'assignedTargetingOptionId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'v1/advertisers/{+advertiserId}/targetingTypes/{+targetingType}/assignedTargetingOptions/{+assignedTargetingOptionId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'advertiserId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'targetingType' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'assignedTargetingOptionId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'v1/advertisers/{+advertiserId}/targetingTypes/{+targetingType}/assignedTargetingOptions',
              'httpMethod' => 'GET',
              'parameters' => array(
                'advertiserId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'targetingType' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'filter' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'orderBy' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->combinedAudiences = new Google_Service_DisplayVideo_Resource_CombinedAudiences(
        $this,
        $this->serviceName,
        'combinedAudiences',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'v1/combinedAudiences/{+combinedAudienceId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'combinedAudienceId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'partnerId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'advertiserId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'list' => array(
              'path' => 'v1/combinedAudiences',
              'httpMethod' => 'GET',
              'parameters' => array(
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'orderBy' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'partnerId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'filter' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'advertiserId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->customBiddingAlgorithms = new Google_Service_DisplayVideo_Resource_CustomBiddingAlgorithms(
        $this,
        $this->serviceName,
        'customBiddingAlgorithms',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'v1/customBiddingAlgorithms/{+customBiddingAlgorithmId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'customBiddingAlgorithmId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'partnerId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'advertiserId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'list' => array(
              'path' => 'v1/customBiddingAlgorithms',
              'httpMethod' => 'GET',
              'parameters' => array(
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'advertiserId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'partnerId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'orderBy' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'filter' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->customLists = new Google_Service_DisplayVideo_Resource_CustomLists(
        $this,
        $this->serviceName,
        'customLists',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'v1/customLists/{+customListId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'customListId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'advertiserId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'list' => array(
              'path' => 'v1/customLists',
              'httpMethod' => 'GET',
              'parameters' => array(
                'advertiserId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'orderBy' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'filter' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
              ),
            ),
          )
        )
    );
    $this->firstAndThirdPartyAudiences = new Google_Service_DisplayVideo_Resource_FirstAndThirdPartyAudiences(
        $this,
        $this->serviceName,
        'firstAndThirdPartyAudiences',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'v1/firstAndThirdPartyAudiences/{+firstAndThirdPartyAudienceId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'firstAndThirdPartyAudienceId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'partnerId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'advertiserId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'list' => array(
              'path' => 'v1/firstAndThirdPartyAudiences',
              'httpMethod' => 'GET',
              'parameters' => array(
                'filter' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'advertiserId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'orderBy' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'partnerId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->floodlightGroups = new Google_Service_DisplayVideo_Resource_FloodlightGroups(
        $this,
        $this->serviceName,
        'floodlightGroups',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'v1/floodlightGroups/{+floodlightGroupId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'floodlightGroupId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'partnerId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'patch' => array(
              'path' => 'v1/floodlightGroups/{floodlightGroupId}',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'floodlightGroupId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'partnerId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'updateMask' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->googleAudiences = new Google_Service_DisplayVideo_Resource_GoogleAudiences(
        $this,
        $this->serviceName,
        'googleAudiences',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'v1/googleAudiences/{+googleAudienceId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'googleAudienceId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'partnerId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'advertiserId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'list' => array(
              'path' => 'v1/googleAudiences',
              'httpMethod' => 'GET',
              'parameters' => array(
                'filter' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'partnerId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'orderBy' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'advertiserId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
              ),
            ),
          )
        )
    );
    $this->inventorySourceGroups = new Google_Service_DisplayVideo_Resource_InventorySourceGroups(
        $this,
        $this->serviceName,
        'inventorySourceGroups',
        array(
          'methods' => array(
            'create' => array(
              'path' => 'v1/inventorySourceGroups',
              'httpMethod' => 'POST',
              'parameters' => array(
                'advertiserId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'partnerId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'delete' => array(
              'path' => 'v1/inventorySourceGroups/{+inventorySourceGroupId}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'inventorySourceGroupId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'partnerId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'advertiserId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'get' => array(
              'path' => 'v1/inventorySourceGroups/{+inventorySourceGroupId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'inventorySourceGroupId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'partnerId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'advertiserId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'list' => array(
              'path' => 'v1/inventorySourceGroups',
              'httpMethod' => 'GET',
              'parameters' => array(
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'orderBy' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'advertiserId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'filter' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'partnerId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'patch' => array(
              'path' => 'v1/inventorySourceGroups/{inventorySourceGroupId}',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'inventorySourceGroupId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'partnerId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'updateMask' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'advertiserId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->inventorySourceGroups_assignedInventorySources = new Google_Service_DisplayVideo_Resource_InventorySourceGroupsAssignedInventorySources(
        $this,
        $this->serviceName,
        'assignedInventorySources',
        array(
          'methods' => array(
            'bulkEdit' => array(
              'path' => 'v1/inventorySourceGroups/{+inventorySourceGroupId}/assignedInventorySources:bulkEdit',
              'httpMethod' => 'POST',
              'parameters' => array(
                'inventorySourceGroupId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'create' => array(
              'path' => 'v1/inventorySourceGroups/{+inventorySourceGroupId}/assignedInventorySources',
              'httpMethod' => 'POST',
              'parameters' => array(
                'inventorySourceGroupId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'partnerId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'advertiserId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'delete' => array(
              'path' => 'v1/inventorySourceGroups/{+inventorySourceGroupId}/assignedInventorySources/{+assignedInventorySourceId}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'inventorySourceGroupId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'assignedInventorySourceId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'partnerId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'advertiserId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'list' => array(
              'path' => 'v1/inventorySourceGroups/{+inventorySourceGroupId}/assignedInventorySources',
              'httpMethod' => 'GET',
              'parameters' => array(
                'inventorySourceGroupId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'advertiserId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'partnerId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'filter' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'orderBy' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->inventorySources = new Google_Service_DisplayVideo_Resource_InventorySources(
        $this,
        $this->serviceName,
        'inventorySources',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'v1/inventorySources/{+inventorySourceId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'inventorySourceId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'partnerId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'list' => array(
              'path' => 'v1/inventorySources',
              'httpMethod' => 'GET',
              'parameters' => array(
                'orderBy' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'filter' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'advertiserId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'partnerId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->media = new Google_Service_DisplayVideo_Resource_Media(
        $this,
        $this->serviceName,
        'media',
        array(
          'methods' => array(
            'download' => array(
              'path' => 'download/{+resourceName}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'resourceName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->partners = new Google_Service_DisplayVideo_Resource_Partners(
        $this,
        $this->serviceName,
        'partners',
        array(
          'methods' => array(
            'bulkEditPartnerAssignedTargetingOptions' => array(
              'path' => 'v1/partners/{+partnerId}:bulkEditPartnerAssignedTargetingOptions',
              'httpMethod' => 'POST',
              'parameters' => array(
                'partnerId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'v1/partners/{+partnerId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'partnerId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'v1/partners',
              'httpMethod' => 'GET',
              'parameters' => array(
                'filter' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'orderBy' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->partners_channels = new Google_Service_DisplayVideo_Resource_PartnersChannels(
        $this,
        $this->serviceName,
        'channels',
        array(
          'methods' => array(
            'create' => array(
              'path' => 'v1/partners/{+partnerId}/channels',
              'httpMethod' => 'POST',
              'parameters' => array(
                'partnerId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'advertiserId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'get' => array(
              'path' => 'v1/partners/{+partnerId}/channels/{+channelId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'partnerId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'channelId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'advertiserId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'list' => array(
              'path' => 'v1/partners/{+partnerId}/channels',
              'httpMethod' => 'GET',
              'parameters' => array(
                'partnerId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'advertiserId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'filter' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'orderBy' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'patch' => array(
              'path' => 'v1/partners/{+partnerId}/channels/{channelId}',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'partnerId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'channelId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'advertiserId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'updateMask' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->partners_channels_sites = new Google_Service_DisplayVideo_Resource_PartnersChannelsSites(
        $this,
        $this->serviceName,
        'sites',
        array(
          'methods' => array(
            'bulkEdit' => array(
              'path' => 'v1/partners/{partnerId}/channels/{+channelId}/sites:bulkEdit',
              'httpMethod' => 'POST',
              'parameters' => array(
                'partnerId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'channelId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'create' => array(
              'path' => 'v1/partners/{partnerId}/channels/{+channelId}/sites',
              'httpMethod' => 'POST',
              'parameters' => array(
                'partnerId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'channelId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'advertiserId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'delete' => array(
              'path' => 'v1/partners/{partnerId}/channels/{+channelId}/sites/{+urlOrAppId}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'partnerId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'channelId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'urlOrAppId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'advertiserId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'list' => array(
              'path' => 'v1/partners/{+partnerId}/channels/{+channelId}/sites',
              'httpMethod' => 'GET',
              'parameters' => array(
                'partnerId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'channelId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'advertiserId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'filter' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'orderBy' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->partners_targetingTypes_assignedTargetingOptions = new Google_Service_DisplayVideo_Resource_PartnersTargetingTypesAssignedTargetingOptions(
        $this,
        $this->serviceName,
        'assignedTargetingOptions',
        array(
          'methods' => array(
            'create' => array(
              'path' => 'v1/partners/{+partnerId}/targetingTypes/{+targetingType}/assignedTargetingOptions',
              'httpMethod' => 'POST',
              'parameters' => array(
                'partnerId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'targetingType' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'delete' => array(
              'path' => 'v1/partners/{+partnerId}/targetingTypes/{+targetingType}/assignedTargetingOptions/{+assignedTargetingOptionId}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'partnerId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'targetingType' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'assignedTargetingOptionId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'v1/partners/{+partnerId}/targetingTypes/{+targetingType}/assignedTargetingOptions/{+assignedTargetingOptionId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'partnerId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'targetingType' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'assignedTargetingOptionId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'v1/partners/{+partnerId}/targetingTypes/{+targetingType}/assignedTargetingOptions',
              'httpMethod' => 'GET',
              'parameters' => array(
                'partnerId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'targetingType' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'orderBy' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'filter' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->sdfdownloadtasks = new Google_Service_DisplayVideo_Resource_Sdfdownloadtasks(
        $this,
        $this->serviceName,
        'sdfdownloadtasks',
        array(
          'methods' => array(
            'create' => array(
              'path' => 'v1/sdfdownloadtasks',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),
          )
        )
    );
    $this->sdfdownloadtasks_operations = new Google_Service_DisplayVideo_Resource_SdfdownloadtasksOperations(
        $this,
        $this->serviceName,
        'operations',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'v1/{+name}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->targetingTypes_targetingOptions = new Google_Service_DisplayVideo_Resource_TargetingTypesTargetingOptions(
        $this,
        $this->serviceName,
        'targetingOptions',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'v1/targetingTypes/{+targetingType}/targetingOptions/{+targetingOptionId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'targetingType' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'targetingOptionId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'advertiserId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'list' => array(
              'path' => 'v1/targetingTypes/{+targetingType}/targetingOptions',
              'httpMethod' => 'GET',
              'parameters' => array(
                'targetingType' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'advertiserId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'filter' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'orderBy' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->users = new Google_Service_DisplayVideo_Resource_Users(
        $this,
        $this->serviceName,
        'users',
        array(
          'methods' => array(
            'bulkEditAssignedUserRoles' => array(
              'path' => 'v1/users/{+userId}:bulkEditAssignedUserRoles',
              'httpMethod' => 'POST',
              'parameters' => array(
                'userId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'create' => array(
              'path' => 'v1/users',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),'delete' => array(
              'path' => 'v1/users/{+userId}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'userId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'v1/users/{+userId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'userId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'v1/users',
              'httpMethod' => 'GET',
              'parameters' => array(
                'filter' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'orderBy' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
              ),
            ),'patch' => array(
              'path' => 'v1/users/{+userId}',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'userId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'updateMask' => array(
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
