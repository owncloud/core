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

namespace Google\Service\CloudRun\Resource;

use Google\Service\CloudRun\GoogleCloudRunOpV2ListServicesResponse;
use Google\Service\CloudRun\GoogleCloudRunOpV2Service;
use Google\Service\CloudRun\GoogleIamV1Policy;
use Google\Service\CloudRun\GoogleIamV1SetIamPolicyRequest;
use Google\Service\CloudRun\GoogleIamV1TestIamPermissionsRequest;
use Google\Service\CloudRun\GoogleIamV1TestIamPermissionsResponse;
use Google\Service\CloudRun\GoogleLongrunningOperation;

/**
 * The "services" collection of methods.
 * Typical usage is:
 *  <code>
 *   $runService = new Google\Service\CloudRun(...);
 *   $services = $runService->services;
 *  </code>
 */
class ProjectsLocationsServices extends \Google\Service\Resource
{
  /**
   * Creates a new Service in a given project and location. (services.create)
   *
   * @param string $parent Required. The location and project in which this
   * service should be created. Format:
   * projects/{projectnumber}/locations/{location}
   * @param GoogleCloudRunOpV2Service $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string serviceId Required. The unique identifier for the Service.
   * The name of the service becomes {parent}/services/{service_id}.
   * @opt_param bool validateOnly Indicates that the request should be validated
   * and default values populated, without persisting the request or creating any
   * resources.
   * @return GoogleLongrunningOperation
   */
  public function create($parent, GoogleCloudRunOpV2Service $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], GoogleLongrunningOperation::class);
  }
  /**
   * Deletes a Service. This will cause the Service to stop serving traffic and
   * will delete all revisions. (services.delete)
   *
   * @param string $name Required. The full name of the Service. Format:
   * projects/{projectnumber}/locations/{location}/services/{service}
   * @param array $optParams Optional parameters.
   *
   * @opt_param string etag A system-generated fingerprint for this version of the
   * resource. May be used to detect modification conflict during updates.
   * @opt_param bool validateOnly Indicates that the request should be validated
   * without actually deleting any resources.
   * @return GoogleLongrunningOperation
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], GoogleLongrunningOperation::class);
  }
  /**
   * Gets information about a Service. (services.get)
   *
   * @param string $name Required. The full name of the Service. Format:
   * projects/{projectnumber}/locations/{location}/services/{service}
   * @param array $optParams Optional parameters.
   * @return GoogleCloudRunOpV2Service
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], GoogleCloudRunOpV2Service::class);
  }
  /**
   * Get the IAM Access Control policy currently in effect for the given Cloud Run
   * Service. This result does not include any inherited policies.
   * (services.getIamPolicy)
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
   * @return GoogleIamV1Policy
   */
  public function getIamPolicy($resource, $optParams = [])
  {
    $params = ['resource' => $resource];
    $params = array_merge($params, $optParams);
    return $this->call('getIamPolicy', [$params], GoogleIamV1Policy::class);
  }
  /**
   * List Services. (services.listProjectsLocationsServices)
   *
   * @param string $parent Required. The location and project to list resources
   * on. Format: projects/{projectnumber}/locations/{location}
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Maximum number of Services to return in this call.
   * @opt_param string pageToken A page token received from a previous call to
   * ListServices. All other parameters must match.
   * @opt_param bool showDeleted If true, returns deleted (but unexpired)
   * resources along with active ones.
   * @return GoogleCloudRunOpV2ListServicesResponse
   */
  public function listProjectsLocationsServices($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], GoogleCloudRunOpV2ListServicesResponse::class);
  }
  /**
   * Updates a Service. (services.patch)
   *
   * @param string $name The fully qualified name of this Service. In
   * CreateServiceRequest, this field is ignored, and instead composed from
   * CreateServiceRequest.parent and CreateServiceRequest.service_id. Format:
   * projects/{project}/locations/{location}/services/{service_id}
   * @param GoogleCloudRunOpV2Service $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool allowMissing If set to true, and if the Service does not
   * exist, it will create a new one. Caller must have both create and update
   * permissions for this call if this is set to true.
   * @opt_param string updateMask The list of fields to be updated.
   * @opt_param bool validateOnly Indicates that the request should be validated
   * and default values populated, without persisting the request or updating any
   * resources.
   * @return GoogleLongrunningOperation
   */
  public function patch($name, GoogleCloudRunOpV2Service $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], GoogleLongrunningOperation::class);
  }
  /**
   * Sets the IAM Access control policy for the specified Service. Overwrites any
   * existing policy. (services.setIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which the policy is being
   * specified. See the operation documentation for the appropriate value for this
   * field.
   * @param GoogleIamV1SetIamPolicyRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleIamV1Policy
   */
  public function setIamPolicy($resource, GoogleIamV1SetIamPolicyRequest $postBody, $optParams = [])
  {
    $params = ['resource' => $resource, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('setIamPolicy', [$params], GoogleIamV1Policy::class);
  }
  /**
   * Returns permissions that a caller has on the specified Project. There are no
   * permissions required for making this API call. (services.testIamPermissions)
   *
   * @param string $resource REQUIRED: The resource for which the policy detail is
   * being requested. See the operation documentation for the appropriate value
   * for this field.
   * @param GoogleIamV1TestIamPermissionsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleIamV1TestIamPermissionsResponse
   */
  public function testIamPermissions($resource, GoogleIamV1TestIamPermissionsRequest $postBody, $optParams = [])
  {
    $params = ['resource' => $resource, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('testIamPermissions', [$params], GoogleIamV1TestIamPermissionsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsServices::class, 'Google_Service_CloudRun_Resource_ProjectsLocationsServices');
