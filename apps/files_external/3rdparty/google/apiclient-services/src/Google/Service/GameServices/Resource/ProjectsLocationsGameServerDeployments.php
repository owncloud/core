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
 * The "gameServerDeployments" collection of methods.
 * Typical usage is:
 *  <code>
 *   $gameservicesService = new Google_Service_GameServices(...);
 *   $gameServerDeployments = $gameservicesService->gameServerDeployments;
 *  </code>
 */
class Google_Service_GameServices_Resource_ProjectsLocationsGameServerDeployments extends Google_Service_Resource
{
  /**
   * Creates a new game server deployment in a given project and location.
   * (gameServerDeployments.create)
   *
   * @param string $parent Required. The parent resource name, in the following
   * form: `projects/{project}/locations/{location}`.
   * @param Google_Service_GameServices_GameServerDeployment $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string deploymentId Required. The ID of the game server delpoyment
   * resource to be created.
   * @return Google_Service_GameServices_Operation
   */
  public function create($parent, Google_Service_GameServices_GameServerDeployment $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_GameServices_Operation");
  }
  /**
   * Deletes a single game server deployment. (gameServerDeployments.delete)
   *
   * @param string $name Required. The name of the game server delpoyment to
   * delete, in the following form:
   * `projects/{project}/locations/{location}/gameServerDeployments/{deployment}`.
   * @param array $optParams Optional parameters.
   * @return Google_Service_GameServices_Operation
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_GameServices_Operation");
  }
  /**
   * Retrieves information about the current state of the game server deployment.
   * Gathers all the Agones fleets and Agones autoscalers, including fleets
   * running an older version of the game server deployment.
   * (gameServerDeployments.fetchDeploymentState)
   *
   * @param string $name Required. The name of the game server delpoyment, in the
   * following form:
   * `projects/{project}/locations/{location}/gameServerDeployments/{deployment}`.
   * @param Google_Service_GameServices_FetchDeploymentStateRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_GameServices_FetchDeploymentStateResponse
   */
  public function fetchDeploymentState($name, Google_Service_GameServices_FetchDeploymentStateRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('fetchDeploymentState', array($params), "Google_Service_GameServices_FetchDeploymentStateResponse");
  }
  /**
   * Gets details of a single game server deployment. (gameServerDeployments.get)
   *
   * @param string $name Required. The name of the game server delpoyment to
   * retrieve, in the following form:
   * `projects/{project}/locations/{location}/gameServerDeployments/{deployment}`.
   * @param array $optParams Optional parameters.
   * @return Google_Service_GameServices_GameServerDeployment
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_GameServices_GameServerDeployment");
  }
  /**
   * Gets the access control policy for a resource. Returns an empty policy if the
   * resource exists and does not have a policy set.
   * (gameServerDeployments.getIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which the policy is being
   * requested. See the operation documentation for the appropriate value for this
   * field.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int options.requestedPolicyVersion Optional. The policy format
   * version to be returned. Valid values are 0, 1, and 3. Requests specifying an
   * invalid value will be rejected. Requests for policies with any conditional
   * bindings must specify version 3. Policies without any conditional bindings
   * may specify any valid value or leave the field unset. To learn which
   * resources support conditions in their IAM policies, see the [IAM
   * documentation](https://cloud.google.com/iam/help/conditions/resource-
   * policies).
   * @return Google_Service_GameServices_Policy
   */
  public function getIamPolicy($resource, $optParams = array())
  {
    $params = array('resource' => $resource);
    $params = array_merge($params, $optParams);
    return $this->call('getIamPolicy', array($params), "Google_Service_GameServices_Policy");
  }
  /**
   * Gets details a single game server deployment rollout.
   * (gameServerDeployments.getRollout)
   *
   * @param string $name Required. The name of the game server delpoyment to
   * retrieve, in the following form: `projects/{project}/locations/{location}/gam
   * eServerDeployments/{deployment}/rollout`.
   * @param array $optParams Optional parameters.
   * @return Google_Service_GameServices_GameServerDeploymentRollout
   */
  public function getRollout($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('getRollout', array($params), "Google_Service_GameServices_GameServerDeploymentRollout");
  }
  /**
   * Lists game server deployments in a given project and location.
   * (gameServerDeployments.listProjectsLocationsGameServerDeployments)
   *
   * @param string $parent Required. The parent resource name, in the following
   * form: `projects/{project}/locations/{location}`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string orderBy Optional. Specifies the ordering of results
   * following syntax at
   * https://cloud.google.com/apis/design/design_patterns#sorting_order.
   * @opt_param string filter Optional. The filter to apply to list results.
   * @opt_param string pageToken Optional. The next_page_token value returned from
   * a previous List request, if any.
   * @opt_param int pageSize Optional. The maximum number of items to return. If
   * unspecified, the server will pick an appropriate default. The server may
   * return fewer items than requested. A caller should only rely on response's
   * next_page_token to determine if there are more GameServerDeployments left to
   * be queried.
   * @return Google_Service_GameServices_ListGameServerDeploymentsResponse
   */
  public function listProjectsLocationsGameServerDeployments($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_GameServices_ListGameServerDeploymentsResponse");
  }
  /**
   * Patches a game server deployment. (gameServerDeployments.patch)
   *
   * @param string $name The resource name of the game server deployment, in the
   * following form:
   * `projects/{project}/locations/{location}/gameServerDeployments/{deployment}`.
   * For example, `projects/my-project/locations/global/gameServerDeployments/my-
   * deployment`.
   * @param Google_Service_GameServices_GameServerDeployment $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Required. Mask of fields to update. At least one
   * path must be supplied in this field. For the `FieldMask` definition, see
   * https: //developers.google.com/protocol-buffers //
   * /docs/reference/google.protobuf#fieldmask
   * @return Google_Service_GameServices_Operation
   */
  public function patch($name, Google_Service_GameServices_GameServerDeployment $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_GameServices_Operation");
  }
  /**
   * Previews the game server deployment rollout. This API does not mutate the
   * rollout resource. (gameServerDeployments.previewRollout)
   *
   * @param string $name The resource name of the game server deployment rollout,
   * in the following form: `projects/{project}/locations/{location}/gameServerDep
   * loyments/{deployment}/rollout`. For example, `projects/my-
   * project/locations/global/gameServerDeployments/my-deployment/rollout`.
   * @param Google_Service_GameServices_GameServerDeploymentRollout $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string previewTime Optional. The target timestamp to compute the
   * preview. Defaults to the immediately after the proposed rollout completes.
   * @opt_param string updateMask Optional. Mask of fields to update. At least one
   * path must be supplied in this field. For the `FieldMask` definition, see
   * https: //developers.google.com/protocol-buffers //
   * /docs/reference/google.protobuf#fieldmask
   * @return Google_Service_GameServices_PreviewGameServerDeploymentRolloutResponse
   */
  public function previewRollout($name, Google_Service_GameServices_GameServerDeploymentRollout $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('previewRollout', array($params), "Google_Service_GameServices_PreviewGameServerDeploymentRolloutResponse");
  }
  /**
   * Sets the access control policy on the specified resource. Replaces any
   * existing policy. Can return `NOT_FOUND`, `INVALID_ARGUMENT`, and
   * `PERMISSION_DENIED` errors. (gameServerDeployments.setIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which the policy is being
   * specified. See the operation documentation for the appropriate value for this
   * field.
   * @param Google_Service_GameServices_SetIamPolicyRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_GameServices_Policy
   */
  public function setIamPolicy($resource, Google_Service_GameServices_SetIamPolicyRequest $postBody, $optParams = array())
  {
    $params = array('resource' => $resource, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('setIamPolicy', array($params), "Google_Service_GameServices_Policy");
  }
  /**
   * Returns permissions that a caller has on the specified resource. If the
   * resource does not exist, this will return an empty set of permissions, not a
   * `NOT_FOUND` error. Note: This operation is designed to be used for building
   * permission-aware UIs and command-line tools, not for authorization checking.
   * This operation may "fail open" without warning.
   * (gameServerDeployments.testIamPermissions)
   *
   * @param string $resource REQUIRED: The resource for which the policy detail is
   * being requested. See the operation documentation for the appropriate value
   * for this field.
   * @param Google_Service_GameServices_TestIamPermissionsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_GameServices_TestIamPermissionsResponse
   */
  public function testIamPermissions($resource, Google_Service_GameServices_TestIamPermissionsRequest $postBody, $optParams = array())
  {
    $params = array('resource' => $resource, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('testIamPermissions', array($params), "Google_Service_GameServices_TestIamPermissionsResponse");
  }
  /**
   * Patches a single game server deployment rollout. The method will not return
   * an error if the update does not affect any existing realms. For example - if
   * the default_game_server_config is changed but all existing realms use the
   * override, that is valid. Similarly, if a non existing realm is explicitly
   * called out in game_server_config_overrides field, that will also not result
   * in an error. (gameServerDeployments.updateRollout)
   *
   * @param string $name The resource name of the game server deployment rollout,
   * in the following form: `projects/{project}/locations/{location}/gameServerDep
   * loyments/{deployment}/rollout`. For example, `projects/my-
   * project/locations/global/gameServerDeployments/my-deployment/rollout`.
   * @param Google_Service_GameServices_GameServerDeploymentRollout $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Required. Mask of fields to update. At least one
   * path must be supplied in this field. For the `FieldMask` definition, see
   * https: //developers.google.com/protocol-buffers //
   * /docs/reference/google.protobuf#fieldmask
   * @return Google_Service_GameServices_Operation
   */
  public function updateRollout($name, Google_Service_GameServices_GameServerDeploymentRollout $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('updateRollout', array($params), "Google_Service_GameServices_Operation");
  }
}
