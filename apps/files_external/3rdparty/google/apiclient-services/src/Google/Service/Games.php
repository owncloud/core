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
class Google_Service_Games extends Google_Service
{
  /** View and manage its own configuration data in your Google Drive. */
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
  public $snapshotsExtended;
  public $stats;
  
  /**
   * Constructs the internal representation of the Games service.
   *
   * @param Google_Client $client The client used to deliver requests.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct(Google_Client $client, $rootUrl = null)
  {
    parent::__construct($client);
    $this->rootUrl = $rootUrl ?: 'https://games.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v1';
    $this->serviceName = 'games';

    $this->achievementDefinitions = new Google_Service_Games_Resource_AchievementDefinitions(
        $this,
        $this->serviceName,
        'achievementDefinitions',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'games/v1/achievements',
              'httpMethod' => 'GET',
              'parameters' => array(
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'language' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->achievements = new Google_Service_Games_Resource_Achievements(
        $this,
        $this->serviceName,
        'achievements',
        array(
          'methods' => array(
            'increment' => array(
              'path' => 'games/v1/achievements/{achievementId}/increment',
              'httpMethod' => 'POST',
              'parameters' => array(
                'achievementId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'stepsToIncrement' => array(
                  'location' => 'query',
                  'type' => 'integer',
                  'required' => true,
                ),
                'requestId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'list' => array(
              'path' => 'games/v1/players/{playerId}/achievements',
              'httpMethod' => 'GET',
              'parameters' => array(
                'playerId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'language' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'state' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'reveal' => array(
              'path' => 'games/v1/achievements/{achievementId}/reveal',
              'httpMethod' => 'POST',
              'parameters' => array(
                'achievementId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'setStepsAtLeast' => array(
              'path' => 'games/v1/achievements/{achievementId}/setStepsAtLeast',
              'httpMethod' => 'POST',
              'parameters' => array(
                'achievementId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'steps' => array(
                  'location' => 'query',
                  'type' => 'integer',
                  'required' => true,
                ),
              ),
            ),'unlock' => array(
              'path' => 'games/v1/achievements/{achievementId}/unlock',
              'httpMethod' => 'POST',
              'parameters' => array(
                'achievementId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'updateMultiple' => array(
              'path' => 'games/v1/achievements/updateMultiple',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),
          )
        )
    );
    $this->applications = new Google_Service_Games_Resource_Applications(
        $this,
        $this->serviceName,
        'applications',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'games/v1/applications/{applicationId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'applicationId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'language' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'platformType' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'played' => array(
              'path' => 'games/v1/applications/played',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),'verify' => array(
              'path' => 'games/v1/applications/{applicationId}/verify',
              'httpMethod' => 'GET',
              'parameters' => array(
                'applicationId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->events = new Google_Service_Games_Resource_Events(
        $this,
        $this->serviceName,
        'events',
        array(
          'methods' => array(
            'listByPlayer' => array(
              'path' => 'games/v1/events',
              'httpMethod' => 'GET',
              'parameters' => array(
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'language' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'listDefinitions' => array(
              'path' => 'games/v1/eventDefinitions',
              'httpMethod' => 'GET',
              'parameters' => array(
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'language' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'record' => array(
              'path' => 'games/v1/events',
              'httpMethod' => 'POST',
              'parameters' => array(
                'language' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->leaderboards = new Google_Service_Games_Resource_Leaderboards(
        $this,
        $this->serviceName,
        'leaderboards',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'games/v1/leaderboards/{leaderboardId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'leaderboardId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'language' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'list' => array(
              'path' => 'games/v1/leaderboards',
              'httpMethod' => 'GET',
              'parameters' => array(
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'language' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->metagame = new Google_Service_Games_Resource_Metagame(
        $this,
        $this->serviceName,
        'metagame',
        array(
          'methods' => array(
            'getMetagameConfig' => array(
              'path' => 'games/v1/metagameConfig',
              'httpMethod' => 'GET',
              'parameters' => array(),
            ),'listCategoriesByPlayer' => array(
              'path' => 'games/v1/players/{playerId}/categories/{collection}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'playerId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'collection' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'language' => array(
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
    $this->players = new Google_Service_Games_Resource_Players(
        $this,
        $this->serviceName,
        'players',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'games/v1/players/{playerId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'playerId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'language' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'list' => array(
              'path' => 'games/v1/players/me/players/{collection}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'collection' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'language' => array(
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
    $this->revisions = new Google_Service_Games_Resource_Revisions(
        $this,
        $this->serviceName,
        'revisions',
        array(
          'methods' => array(
            'check' => array(
              'path' => 'games/v1/revisions/check',
              'httpMethod' => 'GET',
              'parameters' => array(
                'clientRevision' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->scores = new Google_Service_Games_Resource_Scores(
        $this,
        $this->serviceName,
        'scores',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'games/v1/players/{playerId}/leaderboards/{leaderboardId}/scores/{timeSpan}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'playerId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'leaderboardId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'timeSpan' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'includeRankType' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'language' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
              ),
            ),'list' => array(
              'path' => 'games/v1/leaderboards/{leaderboardId}/scores/{collection}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'leaderboardId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'collection' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'timeSpan' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'language' => array(
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
            ),'listWindow' => array(
              'path' => 'games/v1/leaderboards/{leaderboardId}/window/{collection}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'leaderboardId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'collection' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'timeSpan' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'language' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'resultsAbove' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'returnTopIfAbsent' => array(
                  'location' => 'query',
                  'type' => 'boolean',
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
            ),'submit' => array(
              'path' => 'games/v1/leaderboards/{leaderboardId}/scores',
              'httpMethod' => 'POST',
              'parameters' => array(
                'leaderboardId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'score' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'scoreTag' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'language' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'submitMultiple' => array(
              'path' => 'games/v1/leaderboards/scores',
              'httpMethod' => 'POST',
              'parameters' => array(
                'language' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->snapshots = new Google_Service_Games_Resource_Snapshots(
        $this,
        $this->serviceName,
        'snapshots',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'games/v1/snapshots/{snapshotId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'snapshotId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'language' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'list' => array(
              'path' => 'games/v1/players/{playerId}/snapshots',
              'httpMethod' => 'GET',
              'parameters' => array(
                'playerId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'language' => array(
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
    $this->snapshotsExtended = new Google_Service_Games_Resource_SnapshotsExtended(
        $this,
        $this->serviceName,
        'snapshotsExtended',
        array(
          'methods' => array(
            'resolveSnapshotHead' => array(
              'path' => 'games/v1/snapshotsExtended/{snapshotName}:resolveHead',
              'httpMethod' => 'POST',
              'parameters' => array(
                'snapshotName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->stats = new Google_Service_Games_Resource_Stats(
        $this,
        $this->serviceName,
        'stats',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'games/v1/stats',
              'httpMethod' => 'GET',
              'parameters' => array(),
            ),
          )
        )
    );
  }
}
