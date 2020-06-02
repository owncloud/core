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
 * Service definition for YouTube (v3).
 *
 * <p>
 * The YouTube Data API v3 is an API that provides access to YouTube data, such
 * as videos, playlists, and channels.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/youtube/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_YouTube extends Google_Service
{
  /** Manage your YouTube account. */
  const YOUTUBE =
      "https://www.googleapis.com/auth/youtube";
  /** See a list of your current active channel members, their current level, and when they became a member. */
  const YOUTUBE_CHANNEL_MEMBERSHIPS_CREATOR =
      "https://www.googleapis.com/auth/youtube.channel-memberships.creator";
  /** See, edit, and permanently delete your YouTube videos, ratings, comments and captions. */
  const YOUTUBE_FORCE_SSL =
      "https://www.googleapis.com/auth/youtube.force-ssl";
  /** View your YouTube account. */
  const YOUTUBE_READONLY =
      "https://www.googleapis.com/auth/youtube.readonly";
  /** Manage your YouTube videos. */
  const YOUTUBE_UPLOAD =
      "https://www.googleapis.com/auth/youtube.upload";
  /** View and manage your assets and associated content on YouTube. */
  const YOUTUBEPARTNER =
      "https://www.googleapis.com/auth/youtubepartner";
  /** View private information of your YouTube channel relevant during the audit process with a YouTube partner. */
  const YOUTUBEPARTNER_CHANNEL_AUDIT =
      "https://www.googleapis.com/auth/youtubepartner-channel-audit";

  public $activities;
  public $captions;
  public $channelBanners;
  public $channelSections;
  public $channels;
  public $commentThreads;
  public $comments;
  public $guideCategories;
  public $i18nLanguages;
  public $i18nRegions;
  public $liveBroadcasts;
  public $liveChatBans;
  public $liveChatMessages;
  public $liveChatModerators;
  public $liveStreams;
  public $members;
  public $membershipsLevels;
  public $playlistItems;
  public $playlists;
  public $search;
  public $sponsors;
  public $subscriptions;
  public $superChatEvents;
  public $thumbnails;
  public $videoAbuseReportReasons;
  public $videoCategories;
  public $videos;
  public $watermarks;
  
  /**
   * Constructs the internal representation of the YouTube service.
   *
   * @param Google_Client $client The client used to deliver requests.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct(Google_Client $client, $rootUrl = null)
  {
    parent::__construct($client);
    $this->rootUrl = $rootUrl ?: 'https://www.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch/youtube';
    $this->version = 'v3';
    $this->serviceName = 'youtube';

    $this->activities = new Google_Service_YouTube_Resource_Activities(
        $this,
        $this->serviceName,
        'activities',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'youtube/v3/activities',
              'httpMethod' => 'GET',
              'parameters' => array(
                'part' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                  'required' => true,
                ),
                'regionCode' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'channelId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'mine' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'publishedBefore' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'home' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'publishedAfter' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->captions = new Google_Service_YouTube_Resource_Captions(
        $this,
        $this->serviceName,
        'captions',
        array(
          'methods' => array(
            'delete' => array(
              'path' => 'youtube/v3/captions',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'id' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'onBehalfOfContentOwner' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'onBehalfOf' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'download' => array(
              'path' => 'youtube/v3/captions/{id}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'id' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'onBehalfOf' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'onBehalfOfContentOwner' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'tlang' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'tfmt' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'insert' => array(
              'path' => 'youtube/v3/captions',
              'httpMethod' => 'POST',
              'parameters' => array(
                'part' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                  'required' => true,
                ),
                'onBehalfOf' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'sync' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'onBehalfOfContentOwner' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'list' => array(
              'path' => 'youtube/v3/captions',
              'httpMethod' => 'GET',
              'parameters' => array(
                'videoId' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'part' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                  'required' => true,
                ),
                'onBehalfOf' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'id' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'onBehalfOfContentOwner' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'update' => array(
              'path' => 'youtube/v3/captions',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'part' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                  'required' => true,
                ),
                'sync' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'onBehalfOfContentOwner' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'onBehalfOf' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->channelBanners = new Google_Service_YouTube_Resource_ChannelBanners(
        $this,
        $this->serviceName,
        'channelBanners',
        array(
          'methods' => array(
            'insert' => array(
              'path' => 'youtube/v3/channelBanners/insert',
              'httpMethod' => 'POST',
              'parameters' => array(
                'channelId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'onBehalfOfContentOwner' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'onBehalfOfContentOwnerChannel' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->channelSections = new Google_Service_YouTube_Resource_ChannelSections(
        $this,
        $this->serviceName,
        'channelSections',
        array(
          'methods' => array(
            'delete' => array(
              'path' => 'youtube/v3/channelSections',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'id' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'onBehalfOfContentOwner' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'insert' => array(
              'path' => 'youtube/v3/channelSections',
              'httpMethod' => 'POST',
              'parameters' => array(
                'part' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                  'required' => true,
                ),
                'onBehalfOfContentOwner' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'onBehalfOfContentOwnerChannel' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'list' => array(
              'path' => 'youtube/v3/channelSections',
              'httpMethod' => 'GET',
              'parameters' => array(
                'part' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                  'required' => true,
                ),
                'mine' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'id' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'onBehalfOfContentOwner' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'channelId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'hl' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'update' => array(
              'path' => 'youtube/v3/channelSections',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'part' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                  'required' => true,
                ),
                'onBehalfOfContentOwner' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->channels = new Google_Service_YouTube_Resource_Channels(
        $this,
        $this->serviceName,
        'channels',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'youtube/v3/channels',
              'httpMethod' => 'GET',
              'parameters' => array(
                'part' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                  'required' => true,
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'id' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'forUsername' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'mySubscribers' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'mine' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'managedByMe' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'hl' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'categoryId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'onBehalfOfContentOwner' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'update' => array(
              'path' => 'youtube/v3/channels',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'part' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                  'required' => true,
                ),
                'onBehalfOfContentOwner' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->commentThreads = new Google_Service_YouTube_Resource_CommentThreads(
        $this,
        $this->serviceName,
        'commentThreads',
        array(
          'methods' => array(
            'insert' => array(
              'path' => 'youtube/v3/commentThreads',
              'httpMethod' => 'POST',
              'parameters' => array(
                'part' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'youtube/v3/commentThreads',
              'httpMethod' => 'GET',
              'parameters' => array(
                'part' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                  'required' => true,
                ),
                'channelId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'moderationStatus' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'searchTerms' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'textFormat' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'allThreadsRelatedToChannelId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'id' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'order' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'videoId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'update' => array(
              'path' => 'youtube/v3/commentThreads',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'part' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->comments = new Google_Service_YouTube_Resource_Comments(
        $this,
        $this->serviceName,
        'comments',
        array(
          'methods' => array(
            'delete' => array(
              'path' => 'youtube/v3/comments',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'id' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'insert' => array(
              'path' => 'youtube/v3/comments',
              'httpMethod' => 'POST',
              'parameters' => array(
                'part' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'youtube/v3/comments',
              'httpMethod' => 'GET',
              'parameters' => array(
                'part' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                  'required' => true,
                ),
                'id' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'parentId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'textFormat' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'markAsSpam' => array(
              'path' => 'youtube/v3/comments/markAsSpam',
              'httpMethod' => 'POST',
              'parameters' => array(
                'id' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                  'required' => true,
                ),
              ),
            ),'setModerationStatus' => array(
              'path' => 'youtube/v3/comments/setModerationStatus',
              'httpMethod' => 'POST',
              'parameters' => array(
                'id' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                  'required' => true,
                ),
                'moderationStatus' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'banAuthor' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
              ),
            ),'update' => array(
              'path' => 'youtube/v3/comments',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'part' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->guideCategories = new Google_Service_YouTube_Resource_GuideCategories(
        $this,
        $this->serviceName,
        'guideCategories',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'youtube/v3/guideCategories',
              'httpMethod' => 'GET',
              'parameters' => array(
                'part' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                  'required' => true,
                ),
                'id' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'hl' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'regionCode' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->i18nLanguages = new Google_Service_YouTube_Resource_I18nLanguages(
        $this,
        $this->serviceName,
        'i18nLanguages',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'youtube/v3/i18nLanguages',
              'httpMethod' => 'GET',
              'parameters' => array(
                'part' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                  'required' => true,
                ),
                'hl' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->i18nRegions = new Google_Service_YouTube_Resource_I18nRegions(
        $this,
        $this->serviceName,
        'i18nRegions',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'youtube/v3/i18nRegions',
              'httpMethod' => 'GET',
              'parameters' => array(
                'part' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                  'required' => true,
                ),
                'hl' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->liveBroadcasts = new Google_Service_YouTube_Resource_LiveBroadcasts(
        $this,
        $this->serviceName,
        'liveBroadcasts',
        array(
          'methods' => array(
            'bind' => array(
              'path' => 'youtube/v3/liveBroadcasts/bind',
              'httpMethod' => 'POST',
              'parameters' => array(
                'id' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'part' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                  'required' => true,
                ),
                'streamId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'onBehalfOfContentOwner' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'onBehalfOfContentOwnerChannel' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'control' => array(
              'path' => 'youtube/v3/liveBroadcasts/control',
              'httpMethod' => 'POST',
              'parameters' => array(
                'id' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'part' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                  'required' => true,
                ),
                'onBehalfOfContentOwnerChannel' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'offsetTimeMs' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'onBehalfOfContentOwner' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'displaySlate' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'walltime' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'delete' => array(
              'path' => 'youtube/v3/liveBroadcasts',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'id' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'onBehalfOfContentOwner' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'onBehalfOfContentOwnerChannel' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'insert' => array(
              'path' => 'youtube/v3/liveBroadcasts',
              'httpMethod' => 'POST',
              'parameters' => array(
                'part' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                  'required' => true,
                ),
                'onBehalfOfContentOwnerChannel' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'onBehalfOfContentOwner' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'list' => array(
              'path' => 'youtube/v3/liveBroadcasts',
              'httpMethod' => 'GET',
              'parameters' => array(
                'part' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                  'required' => true,
                ),
                'id' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'broadcastType' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'onBehalfOfContentOwner' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'onBehalfOfContentOwnerChannel' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'broadcastStatus' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'mine' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
              ),
            ),'transition' => array(
              'path' => 'youtube/v3/liveBroadcasts/transition',
              'httpMethod' => 'POST',
              'parameters' => array(
                'id' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'broadcastStatus' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'part' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                  'required' => true,
                ),
                'onBehalfOfContentOwnerChannel' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'onBehalfOfContentOwner' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'update' => array(
              'path' => 'youtube/v3/liveBroadcasts',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'part' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                  'required' => true,
                ),
                'onBehalfOfContentOwnerChannel' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'onBehalfOfContentOwner' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->liveChatBans = new Google_Service_YouTube_Resource_LiveChatBans(
        $this,
        $this->serviceName,
        'liveChatBans',
        array(
          'methods' => array(
            'delete' => array(
              'path' => 'youtube/v3/liveChat/bans',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'id' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'insert' => array(
              'path' => 'youtube/v3/liveChat/bans',
              'httpMethod' => 'POST',
              'parameters' => array(
                'part' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->liveChatMessages = new Google_Service_YouTube_Resource_LiveChatMessages(
        $this,
        $this->serviceName,
        'liveChatMessages',
        array(
          'methods' => array(
            'delete' => array(
              'path' => 'youtube/v3/liveChat/messages',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'id' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'insert' => array(
              'path' => 'youtube/v3/liveChat/messages',
              'httpMethod' => 'POST',
              'parameters' => array(
                'part' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'youtube/v3/liveChat/messages',
              'httpMethod' => 'GET',
              'parameters' => array(
                'liveChatId' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'part' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                  'required' => true,
                ),
                'hl' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'profileImageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
              ),
            ),
          )
        )
    );
    $this->liveChatModerators = new Google_Service_YouTube_Resource_LiveChatModerators(
        $this,
        $this->serviceName,
        'liveChatModerators',
        array(
          'methods' => array(
            'delete' => array(
              'path' => 'youtube/v3/liveChat/moderators',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'id' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'insert' => array(
              'path' => 'youtube/v3/liveChat/moderators',
              'httpMethod' => 'POST',
              'parameters' => array(
                'part' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'youtube/v3/liveChat/moderators',
              'httpMethod' => 'GET',
              'parameters' => array(
                'liveChatId' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'part' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                  'required' => true,
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
              ),
            ),
          )
        )
    );
    $this->liveStreams = new Google_Service_YouTube_Resource_LiveStreams(
        $this,
        $this->serviceName,
        'liveStreams',
        array(
          'methods' => array(
            'delete' => array(
              'path' => 'youtube/v3/liveStreams',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'id' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'onBehalfOfContentOwner' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'onBehalfOfContentOwnerChannel' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'insert' => array(
              'path' => 'youtube/v3/liveStreams',
              'httpMethod' => 'POST',
              'parameters' => array(
                'part' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                  'required' => true,
                ),
                'onBehalfOfContentOwnerChannel' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'onBehalfOfContentOwner' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'list' => array(
              'path' => 'youtube/v3/liveStreams',
              'httpMethod' => 'GET',
              'parameters' => array(
                'part' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                  'required' => true,
                ),
                'id' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'mine' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'onBehalfOfContentOwnerChannel' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'onBehalfOfContentOwner' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'update' => array(
              'path' => 'youtube/v3/liveStreams',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'part' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                  'required' => true,
                ),
                'onBehalfOfContentOwnerChannel' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'onBehalfOfContentOwner' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->members = new Google_Service_YouTube_Resource_Members(
        $this,
        $this->serviceName,
        'members',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'youtube/v3/members',
              'httpMethod' => 'GET',
              'parameters' => array(
                'part' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                  'required' => true,
                ),
                'hasAccessToLevel' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'mode' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'filterByMemberChannelId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'maxResults' => array(
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
    $this->membershipsLevels = new Google_Service_YouTube_Resource_MembershipsLevels(
        $this,
        $this->serviceName,
        'membershipsLevels',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'youtube/v3/membershipsLevels',
              'httpMethod' => 'GET',
              'parameters' => array(
                'part' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->playlistItems = new Google_Service_YouTube_Resource_PlaylistItems(
        $this,
        $this->serviceName,
        'playlistItems',
        array(
          'methods' => array(
            'delete' => array(
              'path' => 'youtube/v3/playlistItems',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'id' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'onBehalfOfContentOwner' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'insert' => array(
              'path' => 'youtube/v3/playlistItems',
              'httpMethod' => 'POST',
              'parameters' => array(
                'part' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                  'required' => true,
                ),
                'onBehalfOfContentOwner' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'list' => array(
              'path' => 'youtube/v3/playlistItems',
              'httpMethod' => 'GET',
              'parameters' => array(
                'part' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                  'required' => true,
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'playlistId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'onBehalfOfContentOwner' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'videoId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'id' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
              ),
            ),'update' => array(
              'path' => 'youtube/v3/playlistItems',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'part' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                  'required' => true,
                ),
                'onBehalfOfContentOwner' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->playlists = new Google_Service_YouTube_Resource_Playlists(
        $this,
        $this->serviceName,
        'playlists',
        array(
          'methods' => array(
            'delete' => array(
              'path' => 'youtube/v3/playlists',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'id' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'onBehalfOfContentOwner' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'insert' => array(
              'path' => 'youtube/v3/playlists',
              'httpMethod' => 'POST',
              'parameters' => array(
                'part' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                  'required' => true,
                ),
                'onBehalfOfContentOwnerChannel' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'onBehalfOfContentOwner' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'list' => array(
              'path' => 'youtube/v3/playlists',
              'httpMethod' => 'GET',
              'parameters' => array(
                'part' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                  'required' => true,
                ),
                'id' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'mine' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'hl' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'onBehalfOfContentOwner' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'onBehalfOfContentOwnerChannel' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'channelId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'update' => array(
              'path' => 'youtube/v3/playlists',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'part' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                  'required' => true,
                ),
                'onBehalfOfContentOwner' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->search = new Google_Service_YouTube_Resource_Search(
        $this,
        $this->serviceName,
        'search',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'youtube/v3/search',
              'httpMethod' => 'GET',
              'parameters' => array(
                'part' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                  'required' => true,
                ),
                'videoSyndicated' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'q' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'type' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'publishedAfter' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'videoCategoryId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'videoCaption' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'videoLicense' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'topicId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'location' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'channelType' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'videoDimension' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'order' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'safeSearch' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'forMine' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'onBehalfOfContentOwner' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'regionCode' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'channelId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'relevanceLanguage' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'videoType' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'publishedBefore' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'forContentOwner' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'relatedToVideoId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'videoDuration' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'eventType' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'locationRadius' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'videoDefinition' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'videoEmbeddable' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'forDeveloper' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
              ),
            ),
          )
        )
    );
    $this->sponsors = new Google_Service_YouTube_Resource_Sponsors(
        $this,
        $this->serviceName,
        'sponsors',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'youtube/v3/sponsors',
              'httpMethod' => 'GET',
              'parameters' => array(
                'part' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                  'required' => true,
                ),
                'maxResults' => array(
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
              ),
            ),
          )
        )
    );
    $this->subscriptions = new Google_Service_YouTube_Resource_Subscriptions(
        $this,
        $this->serviceName,
        'subscriptions',
        array(
          'methods' => array(
            'delete' => array(
              'path' => 'youtube/v3/subscriptions',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'id' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'insert' => array(
              'path' => 'youtube/v3/subscriptions',
              'httpMethod' => 'POST',
              'parameters' => array(
                'part' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'youtube/v3/subscriptions',
              'httpMethod' => 'GET',
              'parameters' => array(
                'part' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                  'required' => true,
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'mySubscribers' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'mine' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'order' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'id' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'channelId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'forChannelId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'myRecentSubscribers' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'onBehalfOfContentOwner' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'onBehalfOfContentOwnerChannel' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->superChatEvents = new Google_Service_YouTube_Resource_SuperChatEvents(
        $this,
        $this->serviceName,
        'superChatEvents',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'youtube/v3/superChatEvents',
              'httpMethod' => 'GET',
              'parameters' => array(
                'part' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                  'required' => true,
                ),
                'hl' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
              ),
            ),
          )
        )
    );
    $this->thumbnails = new Google_Service_YouTube_Resource_Thumbnails(
        $this,
        $this->serviceName,
        'thumbnails',
        array(
          'methods' => array(
            'set' => array(
              'path' => 'youtube/v3/thumbnails/set',
              'httpMethod' => 'POST',
              'parameters' => array(
                'videoId' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'onBehalfOfContentOwner' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->videoAbuseReportReasons = new Google_Service_YouTube_Resource_VideoAbuseReportReasons(
        $this,
        $this->serviceName,
        'videoAbuseReportReasons',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'youtube/v3/videoAbuseReportReasons',
              'httpMethod' => 'GET',
              'parameters' => array(
                'part' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                  'required' => true,
                ),
                'hl' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->videoCategories = new Google_Service_YouTube_Resource_VideoCategories(
        $this,
        $this->serviceName,
        'videoCategories',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'youtube/v3/videoCategories',
              'httpMethod' => 'GET',
              'parameters' => array(
                'part' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                  'required' => true,
                ),
                'id' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'regionCode' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'hl' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->videos = new Google_Service_YouTube_Resource_Videos(
        $this,
        $this->serviceName,
        'videos',
        array(
          'methods' => array(
            'delete' => array(
              'path' => 'youtube/v3/videos',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'id' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'onBehalfOfContentOwner' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'getRating' => array(
              'path' => 'youtube/v3/videos/getRating',
              'httpMethod' => 'GET',
              'parameters' => array(
                'id' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                  'required' => true,
                ),
                'onBehalfOfContentOwner' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'insert' => array(
              'path' => 'youtube/v3/videos',
              'httpMethod' => 'POST',
              'parameters' => array(
                'part' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                  'required' => true,
                ),
                'stabilize' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'notifySubscribers' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'onBehalfOfContentOwnerChannel' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'onBehalfOfContentOwner' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'autoLevels' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
              ),
            ),'list' => array(
              'path' => 'youtube/v3/videos',
              'httpMethod' => 'GET',
              'parameters' => array(
                'part' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                  'required' => true,
                ),
                'regionCode' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'id' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'videoCategoryId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'chart' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'locale' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'myRating' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'onBehalfOfContentOwner' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'maxHeight' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'hl' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'maxWidth' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
              ),
            ),'rate' => array(
              'path' => 'youtube/v3/videos/rate',
              'httpMethod' => 'POST',
              'parameters' => array(
                'id' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'rating' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'reportAbuse' => array(
              'path' => 'youtube/v3/videos/reportAbuse',
              'httpMethod' => 'POST',
              'parameters' => array(
                'onBehalfOfContentOwner' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'update' => array(
              'path' => 'youtube/v3/videos',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'part' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                  'required' => true,
                ),
                'onBehalfOfContentOwner' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->watermarks = new Google_Service_YouTube_Resource_Watermarks(
        $this,
        $this->serviceName,
        'watermarks',
        array(
          'methods' => array(
            'set' => array(
              'path' => 'youtube/v3/watermarks/set',
              'httpMethod' => 'POST',
              'parameters' => array(
                'channelId' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'onBehalfOfContentOwner' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'unset' => array(
              'path' => 'youtube/v3/watermarks/unset',
              'httpMethod' => 'POST',
              'parameters' => array(
                'channelId' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'onBehalfOfContentOwner' => array(
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
