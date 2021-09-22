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

namespace Google\Service\CloudHealthcare\Resource;

use Google\Service\CloudHealthcare\CheckDataAccessRequest;
use Google\Service\CloudHealthcare\CheckDataAccessResponse;
use Google\Service\CloudHealthcare\ConsentStore;
use Google\Service\CloudHealthcare\EvaluateUserConsentsRequest;
use Google\Service\CloudHealthcare\EvaluateUserConsentsResponse;
use Google\Service\CloudHealthcare\HealthcareEmpty;
use Google\Service\CloudHealthcare\ListConsentStoresResponse;
use Google\Service\CloudHealthcare\Operation;
use Google\Service\CloudHealthcare\Policy;
use Google\Service\CloudHealthcare\QueryAccessibleDataRequest;
use Google\Service\CloudHealthcare\SetIamPolicyRequest;
use Google\Service\CloudHealthcare\TestIamPermissionsRequest;
use Google\Service\CloudHealthcare\TestIamPermissionsResponse;

/**
 * The "consentStores" collection of methods.
 * Typical usage is:
 *  <code>
 *   $healthcareService = new Google\Service\CloudHealthcare(...);
 *   $consentStores = $healthcareService->consentStores;
 *  </code>
 */
class ProjectsLocationsDatasetsConsentStores extends \Google\Service\Resource
{
  /**
   * Checks if a particular data_id of a User data mapping in the specified
   * consent store is consented for the specified use.
   * (consentStores.checkDataAccess)
   *
   * @param string $consentStore Required. Name of the consent store where the
   * requested data_id is stored, of the form `projects/{project_id}/locations/{lo
   * cation_id}/datasets/{dataset_id}/consentStores/{consent_store_id}`.
   * @param CheckDataAccessRequest $postBody
   * @param array $optParams Optional parameters.
   * @return CheckDataAccessResponse
   */
  public function checkDataAccess($consentStore, CheckDataAccessRequest $postBody, $optParams = [])
  {
    $params = ['consentStore' => $consentStore, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('checkDataAccess', [$params], CheckDataAccessResponse::class);
  }
  /**
   * Creates a new consent store in the parent dataset. Attempting to create a
   * consent store with the same ID as an existing store fails with an
   * ALREADY_EXISTS error. (consentStores.create)
   *
   * @param string $parent Required. The name of the dataset this consent store
   * belongs to.
   * @param ConsentStore $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string consentStoreId Required. The ID of the consent store to
   * create. The string must match the following regex:
   * `[\p{L}\p{N}_\-\.]{1,256}`. Cannot be changed after creation.
   * @return ConsentStore
   */
  public function create($parent, ConsentStore $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], ConsentStore::class);
  }
  /**
   * Deletes the specified consent store and removes all the consent store's data.
   * (consentStores.delete)
   *
   * @param string $name Required. The resource name of the consent store to
   * delete.
   * @param array $optParams Optional parameters.
   * @return HealthcareEmpty
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], HealthcareEmpty::class);
  }
  /**
   * Evaluates the user's Consents for all matching User data mappings. Note: User
   * data mappings are indexed asynchronously, which can cause a slight delay
   * between the time mappings are created or updated and when they are included
   * in EvaluateUserConsents results. (consentStores.evaluateUserConsents)
   *
   * @param string $consentStore Required. Name of the consent store to retrieve
   * User data mappings from.
   * @param EvaluateUserConsentsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return EvaluateUserConsentsResponse
   */
  public function evaluateUserConsents($consentStore, EvaluateUserConsentsRequest $postBody, $optParams = [])
  {
    $params = ['consentStore' => $consentStore, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('evaluateUserConsents', [$params], EvaluateUserConsentsResponse::class);
  }
  /**
   * Gets the specified consent store. (consentStores.get)
   *
   * @param string $name Required. The resource name of the consent store to get.
   * @param array $optParams Optional parameters.
   * @return ConsentStore
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], ConsentStore::class);
  }
  /**
   * Gets the access control policy for a resource. Returns an empty policy if the
   * resource exists and does not have a policy set. (consentStores.getIamPolicy)
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
   * @return Policy
   */
  public function getIamPolicy($resource, $optParams = [])
  {
    $params = ['resource' => $resource];
    $params = array_merge($params, $optParams);
    return $this->call('getIamPolicy', [$params], Policy::class);
  }
  /**
   * Lists the consent stores in the specified dataset.
   * (consentStores.listProjectsLocationsDatasetsConsentStores)
   *
   * @param string $parent Required. Name of the dataset.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Optional. Restricts the stores returned to those
   * matching a filter. Only filtering on labels is supported. For example,
   * `filter=labels.key=value`.
   * @opt_param int pageSize Optional. Limit on the number of consent stores to
   * return in a single response. If not specified, 100 is used. May not be larger
   * than 1000.
   * @opt_param string pageToken Optional. Token to retrieve the next page of
   * results, or empty to get the first page.
   * @return ListConsentStoresResponse
   */
  public function listProjectsLocationsDatasetsConsentStores($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListConsentStoresResponse::class);
  }
  /**
   * Updates the specified consent store. (consentStores.patch)
   *
   * @param string $name Resource name of the consent store, of the form `projects
   * /{project_id}/locations/{location_id}/datasets/{dataset_id}/consentStores/{co
   * nsent_store_id}`. Cannot be changed after creation.
   * @param ConsentStore $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Required. The update mask that applies to the
   * resource. For the `FieldMask` definition, see https://developers.google.com
   * /protocol-buffers/docs/reference/google.protobuf#fieldmask. Only the
   * `labels`, `default_consent_ttl`, and `enable_consent_create_on_update` fields
   * are allowed to be updated.
   * @return ConsentStore
   */
  public function patch($name, ConsentStore $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], ConsentStore::class);
  }
  /**
   * Queries all data_ids that are consented for a specified use in the given
   * consent store and writes them to a specified destination. The returned
   * Operation includes a progress counter for the number of User data mappings
   * processed. If the request is successful, a detailed response is returned of
   * type QueryAccessibleDataResponse, contained in the response field when the
   * operation finishes. The metadata field type is OperationMetadata. Errors are
   * logged to Cloud Logging (see [Viewing error logs in Cloud
   * Logging](https://cloud.google.com/healthcare/docs/how-tos/logging)). For
   * example, the following sample log entry shows a `failed to evaluate consent
   * policy` error that occurred during a QueryAccessibleData call to consent
   * store `projects/{project_id}/locations/{location_id}/datasets/{dataset_id}/co
   * nsentStores/{consent_store_id}`. ```json jsonPayload: { @type: "type.googleap
   * is.com/google.cloud.healthcare.logging.QueryAccessibleDataLogEntry" error: {
   * code: 9 message: "failed to evaluate consent policy" } resourceName: "project
   * s/{project_id}/locations/{location_id}/datasets/{dataset_id}/consentStores/{c
   * onsent_store_id}/consents/{consent_id}" } logName: "projects/{project_id}/log
   * s/healthcare.googleapis.com%2Fquery_accessible_data" operation: { id: "projec
   * ts/{project_id}/locations/{location_id}/datasets/{dataset_id}/operations/{ope
   * ration_id}" producer: "healthcare.googleapis.com/QueryAccessibleData" }
   * receiveTimestamp: "TIMESTAMP" resource: { labels: { consent_store_id:
   * "{consent_store_id}" dataset_id: "{dataset_id}" location: "{location_id}"
   * project_id: "{project_id}" } type: "healthcare_consent_store" } severity:
   * "ERROR" timestamp: "TIMESTAMP" ``` (consentStores.queryAccessibleData)
   *
   * @param string $consentStore Required. Name of the consent store to retrieve
   * User data mappings from.
   * @param QueryAccessibleDataRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function queryAccessibleData($consentStore, QueryAccessibleDataRequest $postBody, $optParams = [])
  {
    $params = ['consentStore' => $consentStore, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('queryAccessibleData', [$params], Operation::class);
  }
  /**
   * Sets the access control policy on the specified resource. Replaces any
   * existing policy. Can return `NOT_FOUND`, `INVALID_ARGUMENT`, and
   * `PERMISSION_DENIED` errors. (consentStores.setIamPolicy)
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
   * (consentStores.testIamPermissions)
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsDatasetsConsentStores::class, 'Google_Service_CloudHealthcare_Resource_ProjectsLocationsDatasetsConsentStores');
