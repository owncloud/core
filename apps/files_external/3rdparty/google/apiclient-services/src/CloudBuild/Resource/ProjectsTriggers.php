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

namespace Google\Service\CloudBuild\Resource;

use Google\Service\CloudBuild\BuildTrigger;
use Google\Service\CloudBuild\CloudbuildEmpty;
use Google\Service\CloudBuild\HttpBody;
use Google\Service\CloudBuild\ListBuildTriggersResponse;
use Google\Service\CloudBuild\Operation;
use Google\Service\CloudBuild\ReceiveTriggerWebhookResponse;
use Google\Service\CloudBuild\RepoSource;

/**
 * The "triggers" collection of methods.
 * Typical usage is:
 *  <code>
 *   $cloudbuildService = new Google\Service\CloudBuild(...);
 *   $triggers = $cloudbuildService->triggers;
 *  </code>
 */
class ProjectsTriggers extends \Google\Service\Resource
{
  /**
   * Creates a new `BuildTrigger`. This API is experimental. (triggers.create)
   *
   * @param string $projectId Required. ID of the project for which to configure
   * automatic builds.
   * @param BuildTrigger $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string parent The parent resource where this trigger will be
   * created. Format: `projects/{project}/locations/{location}`
   * @return BuildTrigger
   */
  public function create($projectId, BuildTrigger $postBody, $optParams = [])
  {
    $params = ['projectId' => $projectId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], BuildTrigger::class);
  }
  /**
   * Deletes a `BuildTrigger` by its project ID and trigger ID. This API is
   * experimental. (triggers.delete)
   *
   * @param string $projectId Required. ID of the project that owns the trigger.
   * @param string $triggerId Required. ID of the `BuildTrigger` to delete.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string name The name of the `Trigger` to delete. Format:
   * `projects/{project}/locations/{location}/triggers/{trigger}`
   * @return CloudbuildEmpty
   */
  public function delete($projectId, $triggerId, $optParams = [])
  {
    $params = ['projectId' => $projectId, 'triggerId' => $triggerId];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], CloudbuildEmpty::class);
  }
  /**
   * Returns information about a `BuildTrigger`. This API is experimental.
   * (triggers.get)
   *
   * @param string $projectId Required. ID of the project that owns the trigger.
   * @param string $triggerId Required. Identifier (`id` or `name`) of the
   * `BuildTrigger` to get.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string name The name of the `Trigger` to retrieve. Format:
   * `projects/{project}/locations/{location}/triggers/{trigger}`
   * @return BuildTrigger
   */
  public function get($projectId, $triggerId, $optParams = [])
  {
    $params = ['projectId' => $projectId, 'triggerId' => $triggerId];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], BuildTrigger::class);
  }
  /**
   * Lists existing `BuildTrigger`s. This API is experimental.
   * (triggers.listProjectsTriggers)
   *
   * @param string $projectId Required. ID of the project for which to list
   * BuildTriggers.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Number of results to return in the list.
   * @opt_param string pageToken Token to provide to skip to a particular spot in
   * the list.
   * @opt_param string parent The parent of the collection of `Triggers`. Format:
   * `projects/{project}/locations/{location}`
   * @return ListBuildTriggersResponse
   */
  public function listProjectsTriggers($projectId, $optParams = [])
  {
    $params = ['projectId' => $projectId];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListBuildTriggersResponse::class);
  }
  /**
   * Updates a `BuildTrigger` by its project ID and trigger ID. This API is
   * experimental. (triggers.patch)
   *
   * @param string $projectId Required. ID of the project that owns the trigger.
   * @param string $triggerId Required. ID of the `BuildTrigger` to update.
   * @param BuildTrigger $postBody
   * @param array $optParams Optional parameters.
   * @return BuildTrigger
   */
  public function patch($projectId, $triggerId, BuildTrigger $postBody, $optParams = [])
  {
    $params = ['projectId' => $projectId, 'triggerId' => $triggerId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], BuildTrigger::class);
  }
  /**
   * Runs a `BuildTrigger` at a particular source revision. (triggers.run)
   *
   * @param string $projectId Required. ID of the project.
   * @param string $triggerId Required. ID of the trigger.
   * @param RepoSource $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string name The name of the `Trigger` to run. Format:
   * `projects/{project}/locations/{location}/triggers/{trigger}`
   * @return Operation
   */
  public function run($projectId, $triggerId, RepoSource $postBody, $optParams = [])
  {
    $params = ['projectId' => $projectId, 'triggerId' => $triggerId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('run', [$params], Operation::class);
  }
  /**
   * ReceiveTriggerWebhook [Experimental] is called when the API receives a
   * webhook request targeted at a specific trigger. (triggers.webhook)
   *
   * @param string $projectId Project in which the specified trigger lives
   * @param string $trigger Name of the trigger to run the payload against
   * @param HttpBody $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string name The name of the `ReceiveTriggerWebhook` to retrieve.
   * Format: `projects/{project}/locations/{location}/triggers/{trigger}`
   * @opt_param string secret Secret token used for authorization if an OAuth
   * token isn't provided.
   * @return ReceiveTriggerWebhookResponse
   */
  public function webhook($projectId, $trigger, HttpBody $postBody, $optParams = [])
  {
    $params = ['projectId' => $projectId, 'trigger' => $trigger, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('webhook', [$params], ReceiveTriggerWebhookResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsTriggers::class, 'Google_Service_CloudBuild_Resource_ProjectsTriggers');
