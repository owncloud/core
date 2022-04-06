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

namespace Google\Service\GameServices\Resource;

use Google\Service\GameServices\FetchDeploymentStateRequest;
use Google\Service\GameServices\FetchDeploymentStateResponse;
use Google\Service\GameServices\GameServerDeployment;
use Google\Service\GameServices\GameServerDeploymentRollout;
use Google\Service\GameServices\ListGameServerDeploymentsResponse;
use Google\Service\GameServices\Operation;
use Google\Service\GameServices\Policy;
use Google\Service\GameServices\PreviewGameServerDeploymentRolloutResponse;
use Google\Service\GameServices\SetIamPolicyRequest;
use Google\Service\GameServices\TestIamPermissionsRequest;
use Google\Service\GameServices\TestIamPermissionsResponse;

/**
 * The "gameServerDeployments" collection of methods.
 * Typical usage is:
 *  <code>
 *   $gameservicesService = new Google\Service\GameServices(...);
 *   $gameServerDeployments = $gameservicesService->gameServerDeployments;
 *  </code>
 */
class ProjectsLocationsGameServerDeployments extends \Google\Service\Resource
{
  /**
   * Creates a new game server deployment in a given project and location.
   * (gameServerDeployments.create)
   *
   * @param string $parent Required. The parent resource name, in the following
   * form: `projects/{project}/locations/{locationId}`.
   * @param GameServerDeployment $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string deploymentId Required. The ID of the game server deployment
   * resource to create.
   * @return Operation
   */
  public function create($parent, GameServerDeployment $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Operation::class);
  }
  /**
   * Deletes a single game server deployment. (gameServerDeployments.delete)
   *
   * @param string $name Required. The name of the game server deployment to
   * delete, in the following form: `projects/{project}/locations/{locationId}/gam
   * eServerDeployments/{deploymentId}`.
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], Operation::class);
  }
  /**
   * Retrieves information about the current state of the game server deployment.
   * Gathers all the Agones fleets and Agones autoscalers, including fleets
   * running an older version of the game server deployment.
   * (gameServerDeployments.fetchDeploymentState)
   *
   * @param string $name Required. The name of the game server deployment, in the
   * following form: `projects/{project}/locations/{locationId}/gameServerDeployme
   * nts/{deploymentId}`.
   * @param FetchDeploymentStateRequest $postBody
   * @param array $optParams Optional parameters.
   * @return FetchDeploymentStateResponse
   */
  public function fetchDeploymentState($name, FetchDeploymentStateRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('fetchDeploymentState', [$params], FetchDeploymentStateResponse::class);
  }
  /**
   * Gets details of a single game server deployment. (gameServerDeployments.get)
   *
   * @param string $name Required. The name of the game server deployment to
   * retrieve, in the following form: `projects/{project}/locations/{locationId}/g
   * ameServerDeployments/{deploymentId}`.
   * @param array $optParams Optional parameters.
   * @return GameServerDeployment
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], GameServerDeployment::class);
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
   * @opt_param int options.requestedPolicyVersion Optional. The maximum policy
   * version that will be used to format the policy. Valid values are 0, 1, and 3.
   * Requests specifying an invalid value will be rejected. Requests for policies
   * with any conditional role bindings must specify version 3. Policies with no
   * conditional role bindings may specify any valid value or leave the field
   * unset. The policy in the response might use the policy version that you
   * specified, or it might use a lower policy version. For example, if you
   * specify version 3, but the policy has no conditional role bindings, the
   * response uses version 1. To learn which resources support conditions in their
   * IAM policies, see the [IAM
   * documentation](https://cloud.google.com/iam/help/conditions/resource-
   * policies).
   * @return Policy
   */
  public function getIamPolicy($resource, $optParams = [])
  {
    $params = ['resource' => $resource];
    $params = array_merge($params, $optParams);
    return $this->call('getIamPolicy', [$params], Policy::class);
  }
  /**
   * Gets details of a single game server deployment rollout.
   * (gameServerDeployments.getRollout)
   *
   * @param string $name Required. The name of the game server deployment rollout
   * to retrieve, in the following form: `projects/{project}/locations/{locationId
   * }/gameServerDeployments/{deploymentId}/rollout`.
   * @param array $optParams Optional parameters.
   * @return GameServerDeploymentRollout
   */
  public function getRollout($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('getRollout', [$params], GameServerDeploymentRollout::class);
  }
  /**
   * Lists game server deployments in a given project and location.
   * (gameServerDeployments.listProjectsLocationsGameServerDeployments)
   *
   * @param string $parent Required. The parent resource name, in the following
   * form: `projects/{project}/locations/{locationId}`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Optional. The filter to apply to list results (see
   * [Filtering](https://google.aip.dev/160)).
   * @opt_param string orderBy Optional. Specifies the ordering of results
   * following [Cloud API
   * syntax](https://cloud.google.com/apis/design/design_patterns#sorting_order).
   * @opt_param int pageSize Optional. The maximum number of items to return. If
   * unspecified, the server picks an appropriate default. The server may return
   * fewer items than requested. A caller should only rely on the response's
   * next_page_token to determine if there are more GameServerDeployments left to
   * be queried.
   * @opt_param string pageToken Optional. The next_page_token value returned from
   * a previous list request, if any.
   * @return ListGameServerDeploymentsResponse
   */
  public function listProjectsLocationsGameServerDeployments($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListGameServerDeploymentsResponse::class);
  }
  /**
   * Patches a game server deployment. (gameServerDeployments.patch)
   *
   * @param string $name The resource name of the game server deployment, in the
   * following form: `projects/{project}/locations/{locationId}/gameServerDeployme
   * nts/{deploymentId}`. For example, `projects/my-
   * project/locations/global/gameServerDeployments/my-deployment`.
   * @param GameServerDeployment $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Required. The update mask to apply to the
   * resource. At least one path must be supplied in this field. For more
   * information, see the [`FieldMask` definition](https://developers.google.com
   * /protocol-buffers/docs/reference/google.protobuf#fieldmask).
   * @return Operation
   */
  public function patch($name, GameServerDeployment $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], Operation::class);
  }
  /**
   * Previews the game server deployment rollout. This API does not mutate the
   * rollout resource. (gameServerDeployments.previewRollout)
   *
   * @param string $name The resource name of the game server deployment rollout,
   * in the following form: `projects/{project}/locations/{locationId}/gameServerD
   * eployments/{deploymentId}/rollout`. For example, `projects/my-
   * project/locations/global/gameServerDeployments/my-deployment/rollout`.
   * @param GameServerDeploymentRollout $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string previewTime Optional. The target timestamp to compute the
   * preview. Defaults to the immediately after the proposed rollout completes.
   * @opt_param string updateMask Optional. The update mask to apply to the
   * resource. At least one path must be supplied in this field. For more
   * information, see the [`FieldMask` definition](https://developers.google.com
   * /protocol-buffers/docs/reference/google.protobuf#fieldmask).
   * @return PreviewGameServerDeploymentRolloutResponse
   */
  public function previewRollout($name, GameServerDeploymentRollout $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('previewRollout', [$params], PreviewGameServerDeploymentRolloutResponse::class);
  }
  /**
   * Sets the access control policy on the specified resource. Replaces any
   * existing policy. Can return `NOT_FOUND`, `INVALID_ARGUMENT`, and
   * `PERMISSION_DENIED` errors. (gameServerDeployments.setIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which the policy is being
   * specified. See the operation documentation for the appropriate value for this
   * field.
   * @param SetIamPolicyRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Policy
   */
  public function setIamPolicy($resource, SetIamPolicyRequest $postBody, $optParams = [])
  {
    $params = ['resource' => $resource, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('setIamPolicy', [$params], Policy::class);
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
   * @param TestIamPermissionsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return TestIamPermissionsResponse
   */
  public function testIamPermissions($resource, TestIamPermissionsRequest $postBody, $optParams = [])
  {
    $params = ['resource' => $resource, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('testIamPermissions', [$params], TestIamPermissionsResponse::class);
  }
  /**
   * Patches a single game server deployment rollout. The method will not return
   * an error if the update does not affect any existing realms. For example, the
   * following cases will not return an error: * The default_game_server_config is
   * changed but all existing realms use the override. * A non-existing realm is
   * explicitly called out in the game_server_config_overrides field.
   * (gameServerDeployments.updateRollout)
   *
   * @param string $name The resource name of the game server deployment rollout,
   * in the following form: `projects/{project}/locations/{locationId}/gameServerD
   * eployments/{deploymentId}/rollout`. For example, `projects/my-
   * project/locations/global/gameServerDeployments/my-deployment/rollout`.
   * @param GameServerDeploymentRollout $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Required. The update mask to apply to the
   * resource. At least one path must be supplied in this field. For more
   * information, see the [`FieldMask` definition](https://developers.google.com
   * /protocol-buffers/docs/reference/google.protobuf#fieldmask).
   * @return Operation
   */
  public function updateRollout($name, GameServerDeploymentRollout $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('updateRollout', [$params], Operation::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsGameServerDeployments::class, 'Google_Service_GameServices_Resource_ProjectsLocationsGameServerDeployments');
