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

namespace Google\Service\Appengine\Resource;

use Google\Service\Appengine\AppengineEmpty;
use Google\Service\Appengine\BatchUpdateIngressRulesRequest;
use Google\Service\Appengine\BatchUpdateIngressRulesResponse;
use Google\Service\Appengine\FirewallRule;
use Google\Service\Appengine\ListIngressRulesResponse;

/**
 * The "ingressRules" collection of methods.
 * Typical usage is:
 *  <code>
 *   $appengineService = new Google\Service\Appengine(...);
 *   $ingressRules = $appengineService->ingressRules;
 *  </code>
 */
class AppsFirewallIngressRules extends \Google\Service\Resource
{
  /**
   * Replaces the entire firewall ruleset in one bulk operation. This overrides
   * and replaces the rules of an existing firewall with the new rules.If the
   * final rule does not match traffic with the '*' wildcard IP range, then an
   * "allow all" rule is explicitly added to the end of the list.
   * (ingressRules.batchUpdate)
   *
   * @param string $appsId Part of `name`. Name of the Firewall collection to set.
   * Example: apps/myapp/firewall/ingressRules.
   * @param BatchUpdateIngressRulesRequest $postBody
   * @param array $optParams Optional parameters.
   * @return BatchUpdateIngressRulesResponse
   */
  public function batchUpdate($appsId, BatchUpdateIngressRulesRequest $postBody, $optParams = [])
  {
    $params = ['appsId' => $appsId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('batchUpdate', [$params], BatchUpdateIngressRulesResponse::class);
  }
  /**
   * Creates a firewall rule for the application. (ingressRules.create)
   *
   * @param string $appsId Part of `parent`. Name of the parent Firewall
   * collection in which to create a new rule. Example:
   * apps/myapp/firewall/ingressRules.
   * @param FirewallRule $postBody
   * @param array $optParams Optional parameters.
   * @return FirewallRule
   */
  public function create($appsId, FirewallRule $postBody, $optParams = [])
  {
    $params = ['appsId' => $appsId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], FirewallRule::class);
  }
  /**
   * Deletes the specified firewall rule. (ingressRules.delete)
   *
   * @param string $appsId Part of `name`. Name of the Firewall resource to
   * delete. Example: apps/myapp/firewall/ingressRules/100.
   * @param string $ingressRulesId Part of `name`. See documentation of `appsId`.
   * @param array $optParams Optional parameters.
   * @return AppengineEmpty
   */
  public function delete($appsId, $ingressRulesId, $optParams = [])
  {
    $params = ['appsId' => $appsId, 'ingressRulesId' => $ingressRulesId];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], AppengineEmpty::class);
  }
  /**
   * Gets the specified firewall rule. (ingressRules.get)
   *
   * @param string $appsId Part of `name`. Name of the Firewall resource to
   * retrieve. Example: apps/myapp/firewall/ingressRules/100.
   * @param string $ingressRulesId Part of `name`. See documentation of `appsId`.
   * @param array $optParams Optional parameters.
   * @return FirewallRule
   */
  public function get($appsId, $ingressRulesId, $optParams = [])
  {
    $params = ['appsId' => $appsId, 'ingressRulesId' => $ingressRulesId];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], FirewallRule::class);
  }
  /**
   * Lists the firewall rules of an application.
   * (ingressRules.listAppsFirewallIngressRules)
   *
   * @param string $appsId Part of `parent`. Name of the Firewall collection to
   * retrieve. Example: apps/myapp/firewall/ingressRules.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string matchingAddress A valid IP Address. If set, only rules
   * matching this address will be returned. The first returned rule will be the
   * rule that fires on requests from this IP.
   * @opt_param int pageSize Maximum results to return per page.
   * @opt_param string pageToken Continuation token for fetching the next page of
   * results.
   * @return ListIngressRulesResponse
   */
  public function listAppsFirewallIngressRules($appsId, $optParams = [])
  {
    $params = ['appsId' => $appsId];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListIngressRulesResponse::class);
  }
  /**
   * Updates the specified firewall rule. (ingressRules.patch)
   *
   * @param string $appsId Part of `name`. Name of the Firewall resource to
   * update. Example: apps/myapp/firewall/ingressRules/100.
   * @param string $ingressRulesId Part of `name`. See documentation of `appsId`.
   * @param FirewallRule $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Standard field mask for the set of fields to be
   * updated.
   * @return FirewallRule
   */
  public function patch($appsId, $ingressRulesId, FirewallRule $postBody, $optParams = [])
  {
    $params = ['appsId' => $appsId, 'ingressRulesId' => $ingressRulesId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], FirewallRule::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AppsFirewallIngressRules::class, 'Google_Service_Appengine_Resource_AppsFirewallIngressRules');
