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

namespace Google\Service\FirebaseRules\Resource;

use Google\Service\FirebaseRules\FirebaserulesEmpty;
use Google\Service\FirebaseRules\ListRulesetsResponse;
use Google\Service\FirebaseRules\Ruleset;

/**
 * The "rulesets" collection of methods.
 * Typical usage is:
 *  <code>
 *   $firebaserulesService = new Google\Service\FirebaseRules(...);
 *   $rulesets = $firebaserulesService->rulesets;
 *  </code>
 */
class ProjectsRulesets extends \Google\Service\Resource
{
  /**
   * Create a `Ruleset` from `Source`. The `Ruleset` is given a unique generated
   * name which is returned to the caller. `Source` containing syntactic or
   * semantics errors will result in an error response indicating the first error
   * encountered. For a detailed view of `Source` issues, use TestRuleset.
   * (rulesets.create)
   *
   * @param string $name Required. Resource name for Project which owns this
   * `Ruleset`. Format: `projects/{project_id}`
   * @param Ruleset $postBody
   * @param array $optParams Optional parameters.
   * @return Ruleset
   */
  public function create($name, Ruleset $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Ruleset::class);
  }
  /**
   * Delete a `Ruleset` by resource name. If the `Ruleset` is referenced by a
   * `Release` the operation will fail. (rulesets.delete)
   *
   * @param string $name Required. Resource name for the ruleset to delete.
   * Format: `projects/{project_id}/rulesets/{ruleset_id}`
   * @param array $optParams Optional parameters.
   * @return FirebaserulesEmpty
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], FirebaserulesEmpty::class);
  }
  /**
   * Get a `Ruleset` by name including the full `Source` contents. (rulesets.get)
   *
   * @param string $name Required. Resource name for the ruleset to get. Format:
   * `projects/{project_id}/rulesets/{ruleset_id}`
   * @param array $optParams Optional parameters.
   * @return Ruleset
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Ruleset::class);
  }
  /**
   * List `Ruleset` metadata only and optionally filter the results by `Ruleset`
   * name. The full `Source` contents of a `Ruleset` may be retrieved with
   * GetRuleset. (rulesets.listProjectsRulesets)
   *
   * @param string $name Required. Resource name for the project. Format:
   * `projects/{project_id}`
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter `Ruleset` filter. The list method supports filters
   * with restrictions on `Ruleset.name`. Filters on `Ruleset.create_time` should
   * use the `date` function which parses strings that conform to the RFC 3339
   * date/time specifications. Example: `create_time >
   * date("2017-01-01T00:00:00Z") AND name=UUID-*`
   * @opt_param int pageSize Page size to load. Maximum of 100. Defaults to 10.
   * Note: `page_size` is just a hint and the service may choose to load less than
   * `page_size` due to the size of the output. To traverse all of the releases,
   * caller should iterate until the `page_token` is empty.
   * @opt_param string pageToken Next page token for loading the next batch of
   * `Ruleset` instances.
   * @return ListRulesetsResponse
   */
  public function listProjectsRulesets($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListRulesetsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsRulesets::class, 'Google_Service_FirebaseRules_Resource_ProjectsRulesets');
