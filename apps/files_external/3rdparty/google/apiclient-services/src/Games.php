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
 * Service definition for Games (v1).
 *
 * <p>
 * The Google Play games service allows developers to enhance games with social
 * leaderboards, achievements, game state, sign-in with Google, and more.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/games/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Games extends \Google\Service
{
  /** See, create, and delete its own configuration data in your Google Drive. */
  const DRIVE_APPDATA =
      "https://www.googleapis.com/auth/drive.appdata";
  /** Create, edit, and delete your Google Play Games activity. */
  const GAMES =
      "https://www.googleapis.com/auth/games";

  public $achievementDefinitions;
  public $achievements;
  public $applications;
  public $events;
  public $leaderboards;
  public $metagame;
  public $players;
  public $revisions;
  public $scores;
  public $snapshots;
  public $stats;

  /**
   * Constructs the internal representation of the Games service.
   *
   * @param Client|array $clientOrConfig The client used to deliver requests, or a
   *                                     config array to pass to a new Client instance.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct($clientOrConfig = [], $rootUrl = null)
  {
    parent::__construct($clientOrConfig);
    $this->rootUrl = $rootUrl ?: 'https://games.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v1';
    $this->serviceName = 'games';

    $this->achievementDefinitions = new Games\Resource\AchievementDefinitions(
        $this,
        $this->serviceName,
        'achievementDefinitions',
        [
          'methods' => [
            'list' => [
              'path' => 'games/v1/achievements',
              'httpMethod' => 'GET',
              'parameters' => [
                'language' => [
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
    $this->achievements = new Games\Resource\Achievements(
        $this,
        $this->serviceName,
        'achievements',
        [
          'methods' => [
            'increment' => [
              'path' => 'games/v1/achievements/{achievementId}/increment',
              'httpMethod' => 'POST',
              'parameters' => [
                'achievementId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'stepsToIncrement' => [
                  'location' => 'query',
                  'type' => 'integer',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'list' => [
              'path' => 'games/v1/players/{playerId}/achievements',
              'httpMethod' => 'GET',
              'parameters' => [
                'playerId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'language' => [
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
                'state' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'reveal' => [
              'path' => 'games/v1/achievements/{achievementId}/reveal',
              'httpMethod' => 'POST',
              'parameters' => [
                'achievementId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'setStepsAtLeast' => [
              'path' => 'games/v1/achievements/{achievementId}/setStepsAtLeast',
              'httpMethod' => 'POST',
              'parameters' => [
                'achievementId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'steps' => [
                  'location' => 'query',
                  'type' => 'integer',
                  'required' => true,
                ],
              ],
            ],'unlock' => [
              'path' => 'games/v1/achievements/{achievementId}/unlock',
              'httpMethod' => 'POST',
              'parameters' => [
                'achievementId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'updateMultiple' => [
              'path' => 'games/v1/achievements/updateMultiple',
              'httpMethod' => 'POST',
              'parameters' => [],
            ],
          ]
        ]
    );
    $this->applications = new Games\Resource\Applications(
        $this,
        $this->serviceName,
        'applications',
        [
          'methods' => [
            'get' => [
              'path' => 'games/v1/applications/{applicationId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'applicationId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'language' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'platformType' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'getEndPoint' => [
              'path' => 'games/v1/applications/getEndPoint',
              'httpMethod' => 'POST',
              'parameters' => [
                'applicationId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'endPointType' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'played' => [
              'path' => 'games/v1/applications/played',
              'httpMethod' => 'POST',
              'parameters' => [],
            ],'verify' => [
              'path' => 'games/v1/applications/{applicationId}/verify',
              'httpMethod' => 'GET',
              'parameters' => [
                'applicationId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->events = new Games\Resource\Events(
        $this,
        $this->serviceName,
        'events',
        [
          'methods' => [
            'listByPlayer' => [
              'path' => 'games/v1/events',
              'httpMethod' => 'GET',
              'parameters' => [
                'language' => [
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
            ],'listDefinitions' => [
              'path' => 'games/v1/eventDefinitions',
              'httpMethod' => 'GET',
              'parameters' => [
                'language' => [
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
            ],'record' => [
              'path' => 'games/v1/events',
              'httpMethod' => 'POST',
              'parameters' => [
                'language' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->leaderboards = new Games\Resource\Leaderboards(
        $this,
        $this->serviceName,
        'leaderboards',
        [
          'methods' => [
            'get' => [
              'path' => 'games/v1/leaderboards/{leaderboardId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'leaderboardId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'language' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'list' => [
              'path' => 'games/v1/leaderboards',
              'httpMethod' => 'GET',
              'parameters' => [
                'language' => [
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
    $this->metagame = new Games\Resource\Metagame(
        $this,
        $this->serviceName,
        'metagame',
        [
          'methods' => [
            'getMetagameConfig' => [
              'path' => 'games/v1/metagameConfig',
              'httpMethod' => 'GET',
              'parameters' => [],
            ],'listCategoriesByPlayer' => [
              'path' => 'games/v1/players/{playerId}/categories/{collection}',
              'httpMethod' => 'GET',
              'parameters' => [
                'playerId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'collection' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'language' => [
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
    $this->players = new Games\Resource\Players(
        $this,
        $this->serviceName,
        'players',
        [
          'methods' => [
            'get' => [
              'path' => 'games/v1/players/{playerId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'playerId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'language' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'playerIdConsistencyToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'getScopedPlayerIds' => [
              'path' => 'games/v1/players/me/scopedIds',
              'httpMethod' => 'GET',
              'parameters' => [],
            ],'list' => [
              'path' => 'games/v1/players/me/players/{collection}',
              'httpMethod' => 'GET',
              'parameters' => [
                'collection' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'language' => [
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
    $this->revisions = new Games\Resource\Revisions(
        $this,
        $this->serviceName,
        'revisions',
        [
          'methods' => [
            'check' => [
              'path' => 'games/v1/revisions/check',
              'httpMethod' => 'GET',
              'parameters' => [
                'clientRevision' => [
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->scores = new Games\Resource\Scores(
        $this,
        $this->serviceName,
        'scores',
        [
          'methods' => [
            'get' => [
              'path' => 'games/v1/players/{playerId}/leaderboards/{leaderboardId}/scores/{timeSpan}',
              'httpMethod' => 'GET',
              'parameters' => [
                'playerId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'leaderboardId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'timeSpan' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'includeRankType' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'language' => [
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
            ],'list' => [
              'path' => 'games/v1/leaderboards/{leaderboardId}/scores/{collection}',
              'httpMethod' => 'GET',
              'parameters' => [
                'leaderboardId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'collection' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'timeSpan' => [
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ],
                'language' => [
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
            ],'listWindow' => [
              'path' => 'games/v1/leaderboards/{leaderboardId}/window/{collection}',
              'httpMethod' => 'GET',
              'parameters' => [
                'leaderboardId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'collection' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'timeSpan' => [
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ],
                'language' => [
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
                'resultsAbove' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'returnTopIfAbsent' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'submit' => [
              'path' => 'games/v1/leaderboards/{leaderboardId}/scores',
              'httpMethod' => 'POST',
              'parameters' => [
                'leaderboardId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'score' => [
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ],
                'language' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'scoreTag' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'submitMultiple' => [
              'path' => 'games/v1/leaderboards/scores',
              'httpMethod' => 'POST',
              'parameters' => [
                'language' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->snapshots = new Games\Resource\Snapshots(
        $this,
        $this->serviceName,
        'snapshots',
        [
          'methods' => [
            'get' => [
              'path' => 'games/v1/snapshots/{snapshotId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'snapshotId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'language' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'list' => [
              'path' => 'games/v1/players/{playerId}/snapshots',
              'httpMethod' => 'GET',
              'parameters' => [
                'playerId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'language' => [
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
    $this->stats = new Games\Resource\Stats(
        $this,
        $this->serviceName,
        'stats',
        [
          'methods' => [
            'get' => [
              'path' => 'games/v1/stats',
              'httpMethod' => 'GET',
              'parameters' => [],
            ],
          ]
        ]
    );
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Games::class, 'Google_Service_Games');
