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

namespace Google\Service\Dialogflow\Resource;

use Google\Service\Dialogflow\GoogleCloudDialogflowCxV3DetectIntentRequest;
use Google\Service\Dialogflow\GoogleCloudDialogflowCxV3DetectIntentResponse;
use Google\Service\Dialogflow\GoogleCloudDialogflowCxV3FulfillIntentRequest;
use Google\Service\Dialogflow\GoogleCloudDialogflowCxV3FulfillIntentResponse;
use Google\Service\Dialogflow\GoogleCloudDialogflowCxV3MatchIntentRequest;
use Google\Service\Dialogflow\GoogleCloudDialogflowCxV3MatchIntentResponse;

/**
 * The "sessions" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dialogflowService = new Google\Service\Dialogflow(...);
 *   $sessions = $dialogflowService->sessions;
 *  </code>
 */
class ProjectsLocationsAgentsEnvironmentsSessions extends \Google\Service\Resource
{
  /**
   * Processes a natural language query and returns structured, actionable data as
   * a result. This method is not idempotent, because it may cause session entity
   * types to be updated, which in turn might affect results of future queries.
   * Note: Always use agent versions for production traffic. See [Versions and
   * environments](https://cloud.google.com/dialogflow/cx/docs/concept/version).
   * (sessions.detectIntent)
   *
   * @param string $session Required. The name of the session this query is sent
   * to. Format: `projects//locations//agents//sessions/` or
   * `projects//locations//agents//environments//sessions/`. If `Environment ID`
   * is not specified, we assume default 'draft' environment. It's up to the API
   * caller to choose an appropriate `Session ID`. It can be a random number or
   * some type of session identifiers (preferably hashed). The length of the
   * `Session ID` must not exceed 36 characters. For more information, see the
   * [sessions
   * guide](https://cloud.google.com/dialogflow/cx/docs/concept/session). Note:
   * Always use agent versions for production traffic. See [Versions and
   * environments](https://cloud.google.com/dialogflow/cx/docs/concept/version).
   * @param GoogleCloudDialogflowCxV3DetectIntentRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleCloudDialogflowCxV3DetectIntentResponse
   */
  public function detectIntent($session, GoogleCloudDialogflowCxV3DetectIntentRequest $postBody, $optParams = [])
  {
    $params = ['session' => $session, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('detectIntent', [$params], GoogleCloudDialogflowCxV3DetectIntentResponse::class);
  }
  /**
   * Fulfills a matched intent returned by MatchIntent. Must be called after
   * MatchIntent, with input from MatchIntentResponse. Otherwise, the behavior is
   * undefined. (sessions.fulfillIntent)
   *
   * @param string $session Required. The name of the session this query is sent
   * to. Format: `projects//locations//agents//sessions/` or
   * `projects//locations//agents//environments//sessions/`. If `Environment ID`
   * is not specified, we assume default 'draft' environment. It's up to the API
   * caller to choose an appropriate `Session ID`. It can be a random number or
   * some type of session identifiers (preferably hashed). The length of the
   * `Session ID` must not exceed 36 characters. For more information, see the
   * [sessions
   * guide](https://cloud.google.com/dialogflow/cx/docs/concept/session).
   * @param GoogleCloudDialogflowCxV3FulfillIntentRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleCloudDialogflowCxV3FulfillIntentResponse
   */
  public function fulfillIntent($session, GoogleCloudDialogflowCxV3FulfillIntentRequest $postBody, $optParams = [])
  {
    $params = ['session' => $session, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('fulfillIntent', [$params], GoogleCloudDialogflowCxV3FulfillIntentResponse::class);
  }
  /**
   * Returns preliminary intent match results, doesn't change the session status.
   * (sessions.matchIntent)
   *
   * @param string $session Required. The name of the session this query is sent
   * to. Format: `projects//locations//agents//sessions/` or
   * `projects//locations//agents//environments//sessions/`. If `Environment ID`
   * is not specified, we assume default 'draft' environment. It's up to the API
   * caller to choose an appropriate `Session ID`. It can be a random number or
   * some type of session identifiers (preferably hashed). The length of the
   * `Session ID` must not exceed 36 characters. For more information, see the
   * [sessions
   * guide](https://cloud.google.com/dialogflow/cx/docs/concept/session).
   * @param GoogleCloudDialogflowCxV3MatchIntentRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleCloudDialogflowCxV3MatchIntentResponse
   */
  public function matchIntent($session, GoogleCloudDialogflowCxV3MatchIntentRequest $postBody, $optParams = [])
  {
    $params = ['session' => $session, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('matchIntent', [$params], GoogleCloudDialogflowCxV3MatchIntentResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsAgentsEnvironmentsSessions::class, 'Google_Service_Dialogflow_Resource_ProjectsLocationsAgentsEnvironmentsSessions');
