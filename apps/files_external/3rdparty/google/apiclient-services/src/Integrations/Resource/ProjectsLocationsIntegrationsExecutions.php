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

namespace Google\Service\Integrations\Resource;

use Google\Service\Integrations\GoogleCloudIntegrationsV1alphaListExecutionsResponse;

/**
 * The "executions" collection of methods.
 * Typical usage is:
 *  <code>
 *   $integrationsService = new Google\Service\Integrations(...);
 *   $executions = $integrationsService->executions;
 *  </code>
 */
class ProjectsLocationsIntegrationsExecutions extends \Google\Service\Resource
{
  /**
   * Lists the status of the integration executions.
   * (executions.listProjectsLocationsIntegrationsExecutions)
   *
   * @param string $parent Required. The parent resource name of the integration
   * execution.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Optional. Standard filter field, we support
   * filtering on all fields in EventExecutionParamIndexes table. All fields
   * support for EQUALS, in additional: CreateTimestamp support for LESS_THAN,
   * GREATER_THAN ParameterKey, ParameterValue, ParameterType support for HAS For
   * example: "parameter_value" HAS \"parameter1\" Also supports operators like
   * AND, OR, NOT For example, trigger_id=\"id1\" AND
   * event_execution_state=\"FAILED\"
   * @opt_param string filterParams.customFilter Optional user-provided custom
   * filter.
   * @opt_param string filterParams.endTime End timestamp.
   * @opt_param string filterParams.eventStatuses List of possible event statuses.
   * @opt_param string filterParams.executionId Execution id.
   * @opt_param string filterParams.parameterKey Param key. DEPRECATED. User
   * parameter_pair_key instead.
   * @opt_param string filterParams.parameterPairKey Param key in the key value
   * pair filter.
   * @opt_param string filterParams.parameterPairValue Param value in the key
   * value pair filter.
   * @opt_param string filterParams.parameterType Param type.
   * @opt_param string filterParams.parameterValue Param value. DEPRECATED. User
   * parameter_pair_value instead.
   * @opt_param string filterParams.startTime Start timestamp.
   * @opt_param string filterParams.taskStatuses List of possible task statuses.
   * @opt_param string filterParams.triggerId Trigger id.
   * @opt_param string filterParams.workflowName Workflow name.
   * @opt_param string orderBy Optional. The results would be returned in order
   * you specified here. Currently supporting "last_modified_time" and
   * "create_time".
   * @opt_param int pageSize Optional. The size of entries in the response.
   * @opt_param string pageToken Optional. The token returned in the previous
   * response.
   * @opt_param string readMask Optional. View mask for the response data. If set,
   * only the field specified will be returned as part of the result. If not set,
   * all fields in event execution info will be filled and returned.
   * @opt_param bool refreshAcl Optional. If true, the service will use the most
   * recent acl information to list event execution infos and renew the acl cache.
   * Note that fetching the most recent acl is synchronous, so it will increase
   * RPC call latency.
   * @opt_param bool truncateParams Optional. If true, the service will truncate
   * the params to only keep the first 1000 characters of string params and empty
   * the executions in order to make response smaller. Only works for UI and when
   * the params fields are not filtered out.
   * @return GoogleCloudIntegrationsV1alphaListExecutionsResponse
   */
  public function listProjectsLocationsIntegrationsExecutions($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], GoogleCloudIntegrationsV1alphaListExecutionsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsIntegrationsExecutions::class, 'Google_Service_Integrations_Resource_ProjectsLocationsIntegrationsExecutions');
