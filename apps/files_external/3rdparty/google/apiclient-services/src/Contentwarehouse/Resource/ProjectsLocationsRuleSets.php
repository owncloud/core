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

namespace Google\Service\Contentwarehouse\Resource;

use Google\Service\Contentwarehouse\GoogleCloudContentwarehouseV1ListRuleSetsResponse;
use Google\Service\Contentwarehouse\GoogleCloudContentwarehouseV1RuleSet;
use Google\Service\Contentwarehouse\GoogleCloudContentwarehouseV1UpdateRuleSetRequest;
use Google\Service\Contentwarehouse\GoogleProtobufEmpty;

/**
 * The "ruleSets" collection of methods.
 * Typical usage is:
 *  <code>
 *   $contentwarehouseService = new Google\Service\Contentwarehouse(...);
 *   $ruleSets = $contentwarehouseService->ruleSets;
 *  </code>
 */
class ProjectsLocationsRuleSets extends \Google\Service\Resource
{
  /**
   * Creates a ruleset. (ruleSets.create)
   *
   * @param string $parent Required. The parent name. Format:
   * projects/{project_number}/locations/{location}.
   * @param GoogleCloudContentwarehouseV1RuleSet $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleCloudContentwarehouseV1RuleSet
   */
  public function create($parent, GoogleCloudContentwarehouseV1RuleSet $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], GoogleCloudContentwarehouseV1RuleSet::class);
  }
  /**
   * Deletes a ruleset. Returns NOT_FOUND if the document does not exist.
   * (ruleSets.delete)
   *
   * @param string $name Required. The name of the rule set to delete. Format:
   * projects/{project_number}/locations/{location}/ruleSets/{rule_set_id}.
   * @param array $optParams Optional parameters.
   * @return GoogleProtobufEmpty
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], GoogleProtobufEmpty::class);
  }
  /**
   * Gets a ruleset. Returns NOT_FOUND if the ruleset does not exist.
   * (ruleSets.get)
   *
   * @param string $name Required. The name of the rule set to retrieve. Format:
   * projects/{project_number}/locations/{location}/ruleSets/{rule_set_id}.
   * @param array $optParams Optional parameters.
   * @return GoogleCloudContentwarehouseV1RuleSet
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], GoogleCloudContentwarehouseV1RuleSet::class);
  }
  /**
   * Lists rulesets. (ruleSets.listProjectsLocationsRuleSets)
   *
   * @param string $parent Required. The parent, which owns this collection of
   * document. Format: projects/{project_number}/locations/{location}.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of rule sets to return. The
   * service may return fewer than this value. If unspecified, at most 50 rule
   * sets will be returned. The maximum value is 1000; values above 1000 will be
   * coerced to 1000.
   * @opt_param string pageToken A page token, received from a previous
   * `ListRuleSets` call. Provide this to retrieve the subsequent page. When
   * paginating, all other parameters provided to `ListRuleSets` must match the
   * call that provided the page token.
   * @return GoogleCloudContentwarehouseV1ListRuleSetsResponse
   */
  public function listProjectsLocationsRuleSets($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], GoogleCloudContentwarehouseV1ListRuleSetsResponse::class);
  }
  /**
   * Updates a ruleset. Returns INVALID_ARGUMENT if the name of the ruleset is
   * non-empty and does not equal the existing name. (ruleSets.patch)
   *
   * @param string $name Required. The name of the rule set to update. Format:
   * projects/{project_number}/locations/{location}/ruleSets/{rule_set_id}.
   * @param GoogleCloudContentwarehouseV1UpdateRuleSetRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleCloudContentwarehouseV1RuleSet
   */
  public function patch($name, GoogleCloudContentwarehouseV1UpdateRuleSetRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], GoogleCloudContentwarehouseV1RuleSet::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsRuleSets::class, 'Google_Service_Contentwarehouse_Resource_ProjectsLocationsRuleSets');
