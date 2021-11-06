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

namespace Google\Service\ManagedServiceforMicrosoftActiveDirectoryConsumerAPI\Resource;

use Google\Service\ManagedServiceforMicrosoftActiveDirectoryConsumerAPI\ListSqlIntegrationsResponse;
use Google\Service\ManagedServiceforMicrosoftActiveDirectoryConsumerAPI\SqlIntegration;

/**
 * The "sqlIntegrations" collection of methods.
 * Typical usage is:
 *  <code>
 *   $managedidentitiesService = new Google\Service\ManagedServiceforMicrosoftActiveDirectoryConsumerAPI(...);
 *   $sqlIntegrations = $managedidentitiesService->sqlIntegrations;
 *  </code>
 */
class ProjectsLocationsManagedidentitiesGlobalDomainsSqlIntegrations extends \Google\Service\Resource
{
  /**
   * Gets details of a single sqlIntegration. (sqlIntegrations.get)
   *
   * @param string $name Required. SQLIntegration resource name using the form: `p
   * rojects/{project_id}/locations/global/domains/{domain}/sqlIntegrations/{name}
   * `
   * @param array $optParams Optional parameters.
   * @return SqlIntegration
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], SqlIntegration::class);
  }
  /**
   * Lists SqlIntegrations in a given domain. (sqlIntegrations.listProjectsLocatio
   * nsManagedidentitiesGlobalDomainsSqlIntegrations)
   *
   * @param string $parent Required. The resource name of the SqlIntegrations
   * using the form: `projects/{project_id}/locations/global/domains`
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Optional. Filter specifying constraints of a list
   * operation. For example, `SqlIntegration.name="sql"`.
   * @opt_param string orderBy Optional. Specifies the ordering of results
   * following syntax at
   * https://cloud.google.com/apis/design/design_patterns#sorting_order.
   * @opt_param int pageSize Optional. The maximum number of items to return. If
   * not specified, a default value of 1000 will be used by the service.
   * Regardless of the page_size value, the response may include a partial list
   * and a caller should only rely on response'ANIZATIONs next_page_token to
   * determine if there are more instances left to be queried.
   * @opt_param string pageToken Optional. The next_page_token value returned from
   * a previous List request, if any.
   * @return ListSqlIntegrationsResponse
   */
  public function listProjectsLocationsManagedidentitiesGlobalDomainsSqlIntegrations($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListSqlIntegrationsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsManagedidentitiesGlobalDomainsSqlIntegrations::class, 'Google_Service_ManagedServiceforMicrosoftActiveDirectoryConsumerAPI_Resource_ProjectsLocationsManagedidentitiesGlobalDomainsSqlIntegrations');
