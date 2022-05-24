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
class YouTube extends \Google\Service
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

  public $abuseReports;
  public $activities;
  public $captions;
  public $channelBanners;
  public $channelSections;
  public $channels;
  public $commentThreads;
  public $comments;
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
  public $subscriptions;
  public $superChatEvents;
  public $tests;
  public $thirdPartyLinks;
  public $thumbnails;
  public $videoAbuseReportReasons;
  public $videoCategories;
  public $videos;
  public $watermarks;
  public $youtube_v3;

  /**
   * Constructs the internal representation of the YouTube service.
   *
   * @param Client|array $clientOrConfig The client used to deliver requests, or a
   *                                     config array to pass to a new Client instance.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct($clientOrConfig = [], $rootUrl = null)
  {
    parent::__construct($clientOrConfig);
    $this->rootUrl = $rootUrl ?: 'https://youtube.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v3';
    $this->serviceName = 'youtube';

    $this->abuseReports = new YouTube\Resource\AbuseReports(
        $this,
        $this->serviceName,
        'abuseReports',
        [
          'methods' => [
            'insert' => [
              'path' => 'youtube/v3/abuseReports',
              'httpMethod' => 'POST',
              'parameters' => [
                'part' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->activities = new YouTube\Resource\Activities(
        $this,
        $this->serviceName,
        'activities',
        [
          'methods' => [
            'list' => [
              'path' => 'youtube/v3/activities',
              'httpMethod' => 'GET',
              'parameters' => [
                'part' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                  'required' => true,
                ],
                'channelId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'home' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'mine' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'publishedAfter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'publishedBefore' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'regionCode' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->captions = new YouTube\Resource\Captions(
        $this,
        $this->serviceName,
        'captions',
        [
          'methods' => [
            'delete' => [
              'path' => 'youtube/v3/captions',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'id' => [
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ],
                'onBehalfOf' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'onBehalfOfContentOwner' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'download' => [
              'path' => 'youtube/v3/captions/{id}',
              'httpMethod' => 'GET',
              'parameters' => [
                'id' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'onBehalfOf' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'onBehalfOfContentOwner' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'tfmt' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'tlang' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'insert' => [
              'path' => 'youtube/v3/captions',
              'httpMethod' => 'POST',
              'parameters' => [
                'part' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                  'required' => true,
                ],
                'onBehalfOf' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'onBehalfOfContentOwner' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'sync' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'list' => [
              'path' => 'youtube/v3/captions',
              'httpMethod' => 'GET',
              'parameters' => [
                'part' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                  'required' => true,
                ],
                'videoId' => [
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ],
                'id' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'onBehalfOf' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'onBehalfOfContentOwner' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'update' => [
              'path' => 'youtube/v3/captions',
              'httpMethod' => 'PUT',
              'parameters' => [
                'part' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                  'required' => true,
                ],
                'onBehalfOf' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'onBehalfOfContentOwner' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'sync' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],
          ]
        ]
    );
    $this->channelBanners = new YouTube\Resource\ChannelBanners(
        $this,
        $this->serviceName,
        'channelBanners',
        [
          'methods' => [
            'insert' => [
              'path' => 'youtube/v3/channelBanners/insert',
              'httpMethod' => 'POST',
              'parameters' => [
                'channelId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'onBehalfOfContentOwner' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'onBehalfOfContentOwnerChannel' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->channelSections = new YouTube\Resource\ChannelSections(
        $this,
        $this->serviceName,
        'channelSections',
        [
          'methods' => [
            'delete' => [
              'path' => 'youtube/v3/channelSections',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'id' => [
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ],
                'onBehalfOfContentOwner' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'insert' => [
              'path' => 'youtube/v3/channelSections',
              'httpMethod' => 'POST',
              'parameters' => [
                'part' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                  'required' => true,
                ],
                'onBehalfOfContentOwner' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'onBehalfOfContentOwnerChannel' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'list' => [
              'path' => 'youtube/v3/channelSections',
              'httpMethod' => 'GET',
              'parameters' => [
                'part' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                  'required' => true,
                ],
                'channelId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'hl' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'id' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'mine' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'onBehalfOfContentOwner' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'update' => [
              'path' => 'youtube/v3/channelSections',
              'httpMethod' => 'PUT',
              'parameters' => [
                'part' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                  'required' => true,
                ],
                'onBehalfOfContentOwner' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->channels = new YouTube\Resource\Channels(
        $this,
        $this->serviceName,
        'channels',
        [
          'methods' => [
            'list' => [
              'path' => 'youtube/v3/channels',
              'httpMethod' => 'GET',
              'parameters' => [
                'part' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                  'required' => true,
                ],
                'categoryId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'forUsername' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'hl' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'id' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'managedByMe' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'mine' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'mySubscribers' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'onBehalfOfContentOwner' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'update' => [
              'path' => 'youtube/v3/channels',
              'httpMethod' => 'PUT',
              'parameters' => [
                'part' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                  'required' => true,
                ],
                'onBehalfOfContentOwner' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->commentThreads = new YouTube\Resource\CommentThreads(
        $this,
        $this->serviceName,
        'commentThreads',
        [
          'methods' => [
            'insert' => [
              'path' => 'youtube/v3/commentThreads',
              'httpMethod' => 'POST',
              'parameters' => [
                'part' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'youtube/v3/commentThreads',
              'httpMethod' => 'GET',
              'parameters' => [
                'part' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                  'required' => true,
                ],
                'allThreadsRelatedToChannelId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'channelId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'id' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'moderationStatus' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'order' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'searchTerms' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'textFormat' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'videoId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->comments = new YouTube\Resource\Comments(
        $this,
        $this->serviceName,
        'comments',
        [
          'methods' => [
            'delete' => [
              'path' => 'youtube/v3/comments',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'id' => [
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'insert' => [
              'path' => 'youtube/v3/comments',
              'httpMethod' => 'POST',
              'parameters' => [
                'part' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'youtube/v3/comments',
              'httpMethod' => 'GET',
              'parameters' => [
                'part' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                  'required' => true,
                ],
                'id' => [
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
                'parentId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'textFormat' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'markAsSpam' => [
              'path' => 'youtube/v3/comments/markAsSpam',
              'httpMethod' => 'POST',
              'parameters' => [
                'id' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                  'required' => true,
                ],
              ],
            ],'setModerationStatus' => [
              'path' => 'youtube/v3/comments/setModerationStatus',
              'httpMethod' => 'POST',
              'parameters' => [
                'id' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                  'required' => true,
                ],
                'moderationStatus' => [
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ],
                'banAuthor' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'update' => [
              'path' => 'youtube/v3/comments',
              'httpMethod' => 'PUT',
              'parameters' => [
                'part' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->i18nLanguages = new YouTube\Resource\I18nLanguages(
        $this,
        $this->serviceName,
        'i18nLanguages',
        [
          'methods' => [
            'list' => [
              'path' => 'youtube/v3/i18nLanguages',
              'httpMethod' => 'GET',
              'parameters' => [
                'part' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                  'required' => true,
                ],
                'hl' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->i18nRegions = new YouTube\Resource\I18nRegions(
        $this,
        $this->serviceName,
        'i18nRegions',
        [
          'methods' => [
            'list' => [
              'path' => 'youtube/v3/i18nRegions',
              'httpMethod' => 'GET',
              'parameters' => [
                'part' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                  'required' => true,
                ],
                'hl' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->liveBroadcasts = new YouTube\Resource\LiveBroadcasts(
        $this,
        $this->serviceName,
        'liveBroadcasts',
        [
          'methods' => [
            'bind' => [
              'path' => 'youtube/v3/liveBroadcasts/bind',
              'httpMethod' => 'POST',
              'parameters' => [
                'id' => [
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ],
                'part' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                  'required' => true,
                ],
                'onBehalfOfContentOwner' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'onBehalfOfContentOwnerChannel' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'streamId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'delete' => [
              'path' => 'youtube/v3/liveBroadcasts',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'id' => [
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ],
                'onBehalfOfContentOwner' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'onBehalfOfContentOwnerChannel' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'insert' => [
              'path' => 'youtube/v3/liveBroadcasts',
              'httpMethod' => 'POST',
              'parameters' => [
                'part' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                  'required' => true,
                ],
                'onBehalfOfContentOwner' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'onBehalfOfContentOwnerChannel' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'list' => [
              'path' => 'youtube/v3/liveBroadcasts',
              'httpMethod' => 'GET',
              'parameters' => [
                'part' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                  'required' => true,
                ],
                'broadcastStatus' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'broadcastType' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'id' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'mine' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'onBehalfOfContentOwner' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'onBehalfOfContentOwnerChannel' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'transition' => [
              'path' => 'youtube/v3/liveBroadcasts/transition',
              'httpMethod' => 'POST',
              'parameters' => [
                'broadcastStatus' => [
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ],
                'id' => [
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ],
                'part' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                  'required' => true,
                ],
                'onBehalfOfContentOwner' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'onBehalfOfContentOwnerChannel' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'update' => [
              'path' => 'youtube/v3/liveBroadcasts',
              'httpMethod' => 'PUT',
              'parameters' => [
                'part' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                  'required' => true,
                ],
                'onBehalfOfContentOwner' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'onBehalfOfContentOwnerChannel' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->liveChatBans = new YouTube\Resource\LiveChatBans(
        $this,
        $this->serviceName,
        'liveChatBans',
        [
          'methods' => [
            'delete' => [
              'path' => 'youtube/v3/liveChat/bans',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'id' => [
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'insert' => [
              'path' => 'youtube/v3/liveChat/bans',
              'httpMethod' => 'POST',
              'parameters' => [
                'part' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->liveChatMessages = new YouTube\Resource\LiveChatMessages(
        $this,
        $this->serviceName,
        'liveChatMessages',
        [
          'methods' => [
            'delete' => [
              'path' => 'youtube/v3/liveChat/messages',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'id' => [
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'insert' => [
              'path' => 'youtube/v3/liveChat/messages',
              'httpMethod' => 'POST',
              'parameters' => [
                'part' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'youtube/v3/liveChat/messages',
              'httpMethod' => 'GET',
              'parameters' => [
                'liveChatId' => [
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ],
                'part' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                  'required' => true,
                ],
                'hl' => [
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
                'profileImageSize' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
              ],
            ],
          ]
        ]
    );
    $this->liveChatModerators = new YouTube\Resource\LiveChatModerators(
        $this,
        $this->serviceName,
        'liveChatModerators',
        [
          'methods' => [
            'delete' => [
              'path' => 'youtube/v3/liveChat/moderators',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'id' => [
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'insert' => [
              'path' => 'youtube/v3/liveChat/moderators',
              'httpMethod' => 'POST',
              'parameters' => [
                'part' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'youtube/v3/liveChat/moderators',
              'httpMethod' => 'GET',
              'parameters' => [
                'liveChatId' => [
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ],
                'part' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
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
    $this->liveStreams = new YouTube\Resource\LiveStreams(
        $this,
        $this->serviceName,
        'liveStreams',
        [
          'methods' => [
            'delete' => [
              'path' => 'youtube/v3/liveStreams',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'id' => [
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ],
                'onBehalfOfContentOwner' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'onBehalfOfContentOwnerChannel' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'insert' => [
              'path' => 'youtube/v3/liveStreams',
              'httpMethod' => 'POST',
              'parameters' => [
                'part' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                  'required' => true,
                ],
                'onBehalfOfContentOwner' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'onBehalfOfContentOwnerChannel' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'list' => [
              'path' => 'youtube/v3/liveStreams',
              'httpMethod' => 'GET',
              'parameters' => [
                'part' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                  'required' => true,
                ],
                'id' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'mine' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'onBehalfOfContentOwner' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'onBehalfOfContentOwnerChannel' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'update' => [
              'path' => 'youtube/v3/liveStreams',
              'httpMethod' => 'PUT',
              'parameters' => [
                'part' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                  'required' => true,
                ],
                'onBehalfOfContentOwner' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'onBehalfOfContentOwnerChannel' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->members = new YouTube\Resource\Members(
        $this,
        $this->serviceName,
        'members',
        [
          'methods' => [
            'list' => [
              'path' => 'youtube/v3/members',
              'httpMethod' => 'GET',
              'parameters' => [
                'part' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                  'required' => true,
                ],
                'filterByMemberChannelId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'hasAccessToLevel' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'mode' => [
                  'location' => 'query',
                  'type' => 'string',
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
    $this->membershipsLevels = new YouTube\Resource\MembershipsLevels(
        $this,
        $this->serviceName,
        'membershipsLevels',
        [
          'methods' => [
            'list' => [
              'path' => 'youtube/v3/membershipsLevels',
              'httpMethod' => 'GET',
              'parameters' => [
                'part' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->playlistItems = new YouTube\Resource\PlaylistItems(
        $this,
        $this->serviceName,
        'playlistItems',
        [
          'methods' => [
            'delete' => [
              'path' => 'youtube/v3/playlistItems',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'id' => [
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ],
                'onBehalfOfContentOwner' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'insert' => [
              'path' => 'youtube/v3/playlistItems',
              'httpMethod' => 'POST',
              'parameters' => [
                'part' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                  'required' => true,
                ],
                'onBehalfOfContentOwner' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'list' => [
              'path' => 'youtube/v3/playlistItems',
              'httpMethod' => 'GET',
              'parameters' => [
                'part' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                  'required' => true,
                ],
                'id' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'onBehalfOfContentOwner' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'playlistId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'videoId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'update' => [
              'path' => 'youtube/v3/playlistItems',
              'httpMethod' => 'PUT',
              'parameters' => [
                'part' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                  'required' => true,
                ],
                'onBehalfOfContentOwner' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->playlists = new YouTube\Resource\Playlists(
        $this,
        $this->serviceName,
        'playlists',
        [
          'methods' => [
            'delete' => [
              'path' => 'youtube/v3/playlists',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'id' => [
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ],
                'onBehalfOfContentOwner' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'insert' => [
              'path' => 'youtube/v3/playlists',
              'httpMethod' => 'POST',
              'parameters' => [
                'part' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                  'required' => true,
                ],
                'onBehalfOfContentOwner' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'onBehalfOfContentOwnerChannel' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'list' => [
              'path' => 'youtube/v3/playlists',
              'httpMethod' => 'GET',
              'parameters' => [
                'part' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                  'required' => true,
                ],
                'channelId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'hl' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'id' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'mine' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'onBehalfOfContentOwner' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'onBehalfOfContentOwnerChannel' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'update' => [
              'path' => 'youtube/v3/playlists',
              'httpMethod' => 'PUT',
              'parameters' => [
                'part' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                  'required' => true,
                ],
                'onBehalfOfContentOwner' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->search = new YouTube\Resource\Search(
        $this,
        $this->serviceName,
        'search',
        [
          'methods' => [
            'list' => [
              'path' => 'youtube/v3/search',
              'httpMethod' => 'GET',
              'parameters' => [
                'part' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                  'required' => true,
                ],
                'channelId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'channelType' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'eventType' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'forContentOwner' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'forDeveloper' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'forMine' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'location' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'locationRadius' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'onBehalfOfContentOwner' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'order' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'publishedAfter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'publishedBefore' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'q' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'regionCode' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'relatedToVideoId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'relevanceLanguage' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'safeSearch' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'topicId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'type' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'videoCaption' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'videoCategoryId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'videoDefinition' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'videoDimension' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'videoDuration' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'videoEmbeddable' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'videoLicense' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'videoSyndicated' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'videoType' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->subscriptions = new YouTube\Resource\Subscriptions(
        $this,
        $this->serviceName,
        'subscriptions',
        [
          'methods' => [
            'delete' => [
              'path' => 'youtube/v3/subscriptions',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'id' => [
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'insert' => [
              'path' => 'youtube/v3/subscriptions',
              'httpMethod' => 'POST',
              'parameters' => [
                'part' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'youtube/v3/subscriptions',
              'httpMethod' => 'GET',
              'parameters' => [
                'part' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                  'required' => true,
                ],
                'channelId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'forChannelId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'id' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'mine' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'myRecentSubscribers' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'mySubscribers' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'onBehalfOfContentOwner' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'onBehalfOfContentOwnerChannel' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'order' => [
                  'location' => 'query',
                  'type' => 'string',
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
    $this->superChatEvents = new YouTube\Resource\SuperChatEvents(
        $this,
        $this->serviceName,
        'superChatEvents',
        [
          'methods' => [
            'list' => [
              'path' => 'youtube/v3/superChatEvents',
              'httpMethod' => 'GET',
              'parameters' => [
                'part' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                  'required' => true,
                ],
                'hl' => [
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
    $this->tests = new YouTube\Resource\Tests(
        $this,
        $this->serviceName,
        'tests',
        [
          'methods' => [
            'insert' => [
              'path' => 'youtube/v3/tests',
              'httpMethod' => 'POST',
              'parameters' => [
                'part' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                  'required' => true,
                ],
                'externalChannelId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->thirdPartyLinks = new YouTube\Resource\ThirdPartyLinks(
        $this,
        $this->serviceName,
        'thirdPartyLinks',
        [
          'methods' => [
            'delete' => [
              'path' => 'youtube/v3/thirdPartyLinks',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'linkingToken' => [
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ],
                'type' => [
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ],
                'externalChannelId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'part' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
              ],
            ],'insert' => [
              'path' => 'youtube/v3/thirdPartyLinks',
              'httpMethod' => 'POST',
              'parameters' => [
                'part' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                  'required' => true,
                ],
                'externalChannelId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'list' => [
              'path' => 'youtube/v3/thirdPartyLinks',
              'httpMethod' => 'GET',
              'parameters' => [
                'part' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                  'required' => true,
                ],
                'externalChannelId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'linkingToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'type' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'update' => [
              'path' => 'youtube/v3/thirdPartyLinks',
              'httpMethod' => 'PUT',
              'parameters' => [
                'part' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                  'required' => true,
                ],
                'externalChannelId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->thumbnails = new YouTube\Resource\Thumbnails(
        $this,
        $this->serviceName,
        'thumbnails',
        [
          'methods' => [
            'set' => [
              'path' => 'youtube/v3/thumbnails/set',
              'httpMethod' => 'POST',
              'parameters' => [
                'videoId' => [
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ],
                'onBehalfOfContentOwner' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->videoAbuseReportReasons = new YouTube\Resource\VideoAbuseReportReasons(
        $this,
        $this->serviceName,
        'videoAbuseReportReasons',
        [
          'methods' => [
            'list' => [
              'path' => 'youtube/v3/videoAbuseReportReasons',
              'httpMethod' => 'GET',
              'parameters' => [
                'part' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                  'required' => true,
                ],
                'hl' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->videoCategories = new YouTube\Resource\VideoCategories(
        $this,
        $this->serviceName,
        'videoCategories',
        [
          'methods' => [
            'list' => [
              'path' => 'youtube/v3/videoCategories',
              'httpMethod' => 'GET',
              'parameters' => [
                'part' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                  'required' => true,
                ],
                'hl' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'id' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'regionCode' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->videos = new YouTube\Resource\Videos(
        $this,
        $this->serviceName,
        'videos',
        [
          'methods' => [
            'delete' => [
              'path' => 'youtube/v3/videos',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'id' => [
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ],
                'onBehalfOfContentOwner' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'getRating' => [
              'path' => 'youtube/v3/videos/getRating',
              'httpMethod' => 'GET',
              'parameters' => [
                'id' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                  'required' => true,
                ],
                'onBehalfOfContentOwner' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'insert' => [
              'path' => 'youtube/v3/videos',
              'httpMethod' => 'POST',
              'parameters' => [
                'part' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                  'required' => true,
                ],
                'autoLevels' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'notifySubscribers' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'onBehalfOfContentOwner' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'onBehalfOfContentOwnerChannel' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'stabilize' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'list' => [
              'path' => 'youtube/v3/videos',
              'httpMethod' => 'GET',
              'parameters' => [
                'part' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                  'required' => true,
                ],
                'chart' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'hl' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'id' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'locale' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxHeight' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'maxWidth' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'myRating' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'onBehalfOfContentOwner' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'regionCode' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'videoCategoryId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'rate' => [
              'path' => 'youtube/v3/videos/rate',
              'httpMethod' => 'POST',
              'parameters' => [
                'id' => [
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ],
                'rating' => [
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'reportAbuse' => [
              'path' => 'youtube/v3/videos/reportAbuse',
              'httpMethod' => 'POST',
              'parameters' => [
                'onBehalfOfContentOwner' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'update' => [
              'path' => 'youtube/v3/videos',
              'httpMethod' => 'PUT',
              'parameters' => [
                'part' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                  'required' => true,
                ],
                'onBehalfOfContentOwner' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->watermarks = new YouTube\Resource\Watermarks(
        $this,
        $this->serviceName,
        'watermarks',
        [
          'methods' => [
            'set' => [
              'path' => 'youtube/v3/watermarks/set',
              'httpMethod' => 'POST',
              'parameters' => [
                'channelId' => [
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ],
                'onBehalfOfContentOwner' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'unset' => [
              'path' => 'youtube/v3/watermarks/unset',
              'httpMethod' => 'POST',
              'parameters' => [
                'channelId' => [
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ],
                'onBehalfOfContentOwner' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->youtube_v3 = new YouTube\Resource\YoutubeV3(
        $this,
        $this->serviceName,
        'v3',
        [
          'methods' => [
            'updateCommentThreads' => [
              'path' => 'youtube/v3/commentThreads',
              'httpMethod' => 'PUT',
              'parameters' => [
                'part' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
              ],
            ],
          ]
        ]
    );
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(YouTube::class, 'Google_Service_YouTube');
