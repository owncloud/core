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
 * Service definition for GamesManagement (v1management).
 *
 * <p>
 * The Google Play Game Management API allows developers to manage resources
 * from the Google Play Game service.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/games/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class GamesManagement extends \Google\Service
{
  /** Create, edit, and delete your Google Play Games activity. */
  const GAMES =
      "https://www.googleapis.com/auth/games";

  public $achievements;
  public $applications;
  public $events;
  public $players;
  public $scores;

  /**
   * Constructs the internal representation of the GamesManagement service.
   *
   * @param Client|array $clientOrConfig The client used to deliver requests, or a
   *                                     config array to pass to a new Client instance.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct($clientOrConfig = [], $rootUrl = null)
  {
    parent::__construct($clientOrConfig);
    $this->rootUrl = $rootUrl ?: 'https://gamesmanagement.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v1management';
    $this->serviceName = 'gamesManagement';

    $this->achievements = new GamesManagement\Resource\Achievements(
        $this,
        $this->serviceName,
        'achievements',
        [
          'methods' => [
            'reset' => [
              'path' => 'games/v1management/achievements/{achievementId}/reset',
              'httpMethod' => 'POST',
              'parameters' => [
                'achievementId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'resetAll' => [
              'path' => 'games/v1management/achievements/reset',
              'httpMethod' => 'POST',
              'parameters' => [],
            ],'resetAllForAllPlayers' => [
              'path' => 'games/v1management/achievements/resetAllForAllPlayers',
              'httpMethod' => 'POST',
              'parameters' => [],
            ],'resetForAllPlayers' => [
              'path' => 'games/v1management/achievements/{achievementId}/resetForAllPlayers',
              'httpMethod' => 'POST',
              'parameters' => [
                'achievementId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'resetMultipleForAllPlayers' => [
              'path' => 'games/v1management/achievements/resetMultipleForAllPlayers',
              'httpMethod' => 'POST',
              'parameters' => [],
            ],
          ]
        ]
    );
    $this->applications = new GamesManagement\Resource\Applications(
        $this,
        $this->serviceName,
        'applications',
        [
          'methods' => [
            'listHidden' => [
              'path' => 'games/v1management/applications/{applicationId}/players/hidden',
              'httpMethod' => 'GET',
              'parameters' => [
                'applicationId' => [
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
    $this->events = new GamesManagement\Resource\Events(
        $this,
        $this->serviceName,
        'events',
        [
          'methods' => [
            'reset' => [
              'path' => 'games/v1management/events/{eventId}/reset',
              'httpMethod' => 'POST',
              'parameters' => [
                'eventId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'resetAll' => [
              'path' => 'games/v1management/events/reset',
              'httpMethod' => 'POST',
              'parameters' => [],
            ],'resetAllForAllPlayers' => [
              'path' => 'games/v1management/events/resetAllForAllPlayers',
              'httpMethod' => 'POST',
              'parameters' => [],
            ],'resetForAllPlayers' => [
              'path' => 'games/v1management/events/{eventId}/resetForAllPlayers',
              'httpMethod' => 'POST',
              'parameters' => [
                'eventId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'resetMultipleForAllPlayers' => [
              'path' => 'games/v1management/events/resetMultipleForAllPlayers',
              'httpMethod' => 'POST',
              'parameters' => [],
            ],
          ]
        ]
    );
    $this->players = new GamesManagement\Resource\Players(
        $this,
        $this->serviceName,
        'players',
        [
          'methods' => [
            'hide' => [
              'path' => 'games/v1management/applications/{applicationId}/players/hidden/{playerId}',
              'httpMethod' => 'POST',
              'parameters' => [
                'applicationId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'playerId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'unhide' => [
              'path' => 'games/v1management/applications/{applicationId}/players/hidden/{playerId}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'applicationId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'playerId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->scores = new GamesManagement\Resource\Scores(
        $this,
        $this->serviceName,
        'scores',
        [
          'methods' => [
            'reset' => [
              'path' => 'games/v1management/leaderboards/{leaderboardId}/scores/reset',
              'httpMethod' => 'POST',
              'parameters' => [
                'leaderboardId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'resetAll' => [
              'path' => 'games/v1management/scores/reset',
              'httpMethod' => 'POST',
              'parameters' => [],
            ],'resetAllForAllPlayers' => [
              'path' => 'games/v1management/scores/resetAllForAllPlayers',
              'httpMethod' => 'POST',
              'parameters' => [],
            ],'resetForAllPlayers' => [
              'path' => 'games/v1management/leaderboards/{leaderboardId}/scores/resetForAllPlayers',
              'httpMethod' => 'POST',
              'parameters' => [
                'leaderboardId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'resetMultipleForAllPlayers' => [
              'path' => 'games/v1management/scores/resetMultipleForAllPlayers',
              'httpMethod' => 'POST',
              'parameters' => [],
            ],
          ]
        ]
    );
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GamesManagement::class, 'Google_Service_GamesManagement');
