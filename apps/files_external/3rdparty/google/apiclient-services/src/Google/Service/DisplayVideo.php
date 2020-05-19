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
  /** View and manage your reports in DoubleClick Bid Manager. */
  const DOUBLECLICKBIDMANAGER =
      "https://www.googleapis.com/auth/doubleclickbidmanager";

  public $advertisers;
  public $advertisers_assets;
  public $advertisers_campaigns;
  public $advertisers_channels;
  public $advertisers_creatives;
  public $advertisers_insertionOrders;
  public $advertisers_lineItems;
  public $advertisers_lineItems_targetingTypes_assignedTargetingOptions;
  public $advertisers_locationLists;
  public $advertisers_negativeKeywordLists;
  public $combinedAudiences;
  public $customLists;
  public $firstAndThirdPartyAudiences;
  public $floodlightGroups;
  public $googleAudiences;
  public $inventorySourceGroups;
  public $inventorySources;
  public $media;
  public $partners_channels;
  public $sdfdownloadtasks;
  public $sdfdownloadtasks_operations;
  public $targetingTypes_targetingOptions;
  
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
            'create' => array(
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
                'filter' => array(
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
                'filter' => array(
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
            'get' => array(
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
                'filter' => array(
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
            'get' => array(
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
                'filter' => array(
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
            'get' => array(
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
                'advertiserId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'partnerId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'list' => array(
              'path' => 'v1/combinedAudiences',
              'httpMethod' => 'GET',
              'parameters' => array(
                'advertiserId' => array(
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
                'advertiserId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'partnerId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'list' => array(
              'path' => 'v1/firstAndThirdPartyAudiences',
              'httpMethod' => 'GET',
              'parameters' => array(
                'advertiserId' => array(
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
                'advertiserId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'partnerId' => array(
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
                'orderBy' => array(
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
    $this->inventorySourceGroups = new Google_Service_DisplayVideo_Resource_InventorySourceGroups(
        $this,
        $this->serviceName,
        'inventorySourceGroups',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'v1/inventorySourceGroups/{+inventorySourceGroupId}',
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
              ),
            ),'list' => array(
              'path' => 'v1/inventorySourceGroups',
              'httpMethod' => 'GET',
              'parameters' => array(
                'advertiserId' => array(
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
                'advertiserId' => array(
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
    $this->partners_channels = new Google_Service_DisplayVideo_Resource_PartnersChannels(
        $this,
        $this->serviceName,
        'channels',
        array(
          'methods' => array(
            'get' => array(
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
              ),
            ),
          )
        )
    );
  }
}
