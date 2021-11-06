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

use Google\Service\CloudHealthcare\DeidentifyFhirStoreRequest;
use Google\Service\CloudHealthcare\ExportResourcesRequest;
use Google\Service\CloudHealthcare\FhirStore;
use Google\Service\CloudHealthcare\HealthcareEmpty;
use Google\Service\CloudHealthcare\ImportResourcesRequest;
use Google\Service\CloudHealthcare\ListFhirStoresResponse;
use Google\Service\CloudHealthcare\Operation;
use Google\Service\CloudHealthcare\Policy;
use Google\Service\CloudHealthcare\SetIamPolicyRequest;
use Google\Service\CloudHealthcare\TestIamPermissionsRequest;
use Google\Service\CloudHealthcare\TestIamPermissionsResponse;

/**
 * The "fhirStores" collection of methods.
 * Typical usage is:
 *  <code>
 *   $healthcareService = new Google\Service\CloudHealthcare(...);
 *   $fhirStores = $healthcareService->fhirStores;
 *  </code>
 */
class ProjectsLocationsDatasetsFhirStores extends \Google\Service\Resource
{
  /**
   * Creates a new FHIR store within the parent dataset. (fhirStores.create)
   *
   * @param string $parent The name of the dataset this FHIR store belongs to.
   * @param FhirStore $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string fhirStoreId The ID of the FHIR store that is being created.
   * The string must match the following regex: `[\p{L}\p{N}_\-\.]{1,256}`.
   * @return FhirStore
   */
  public function create($parent, FhirStore $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], FhirStore::class);
  }
  /**
   * De-identifies data from the source store and writes it to the destination
   * store. The metadata field type is OperationMetadata. If the request is
   * successful, the response field type is DeidentifyFhirStoreSummary. If errors
   * occur, error is set. Error details are also logged to Cloud Logging (see
   * [Viewing error logs in Cloud
   * Logging](https://cloud.google.com/healthcare/docs/how-tos/logging)).
   * (fhirStores.deidentify)
   *
   * @param string $sourceStore Source FHIR store resource name. For example, `pro
   * jects/{project_id}/locations/{location_id}/datasets/{dataset_id}/fhirStores/{
   * fhir_store_id}`.
   * @param DeidentifyFhirStoreRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function deidentify($sourceStore, DeidentifyFhirStoreRequest $postBody, $optParams = [])
  {
    $params = ['sourceStore' => $sourceStore, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('deidentify', [$params], Operation::class);
  }
  /**
   * Deletes the specified FHIR store and removes all resources within it.
   * (fhirStores.delete)
   *
   * @param string $name The resource name of the FHIR store to delete.
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
   * Export resources from the FHIR store to the specified destination. This
   * method returns an Operation that can be used to track the status of the
   * export by calling GetOperation. Immediate fatal errors appear in the error
   * field, errors are also logged to Cloud Logging (see [Viewing error logs in
   * Cloud Logging](https://cloud.google.com/healthcare/docs/how-tos/logging)).
   * Otherwise, when the operation finishes, a detailed response of type
   * ExportResourcesResponse is returned in the response field. The metadata field
   * type for this operation is OperationMetadata. (fhirStores.export)
   *
   * @param string $name The name of the FHIR store to export resource from, in
   * the format of `projects/{project_id}/locations/{location_id}/datasets/{datase
   * t_id}/fhirStores/{fhir_store_id}`.
   * @param ExportResourcesRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function export($name, ExportResourcesRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('export', [$params], Operation::class);
  }
  /**
   * Gets the configuration of the specified FHIR store. (fhirStores.get)
   *
   * @param string $name The resource name of the FHIR store to get.
   * @param array $optParams Optional parameters.
   * @return FhirStore
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], FhirStore::class);
  }
  /**
   * Gets the access control policy for a resource. Returns an empty policy if the
   * resource exists and does not have a policy set. (fhirStores.getIamPolicy)
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
   * Imports resources to the FHIR store by loading data from the specified
   * sources. This method is optimized to load large quantities of data using
   * import semantics that ignore some FHIR store configuration options and are
   * not suitable for all use cases. It is primarily intended to load data into an
   * empty FHIR store that is not being used by other clients. In cases where this
   * method is not appropriate, consider using ExecuteBundle to load data. Every
   * resource in the input must contain a client-supplied ID. Each resource is
   * stored using the supplied ID regardless of the enable_update_create setting
   * on the FHIR store. It is strongly advised not to include or encode any
   * sensitive data such as patient identifiers in client-specified resource IDs.
   * Those IDs are part of the FHIR resource path recorded in Cloud Audit Logs and
   * Cloud Pub/Sub notifications. Those IDs can also be contained in reference
   * fields within other resources. The import process does not enforce
   * referential integrity, regardless of the disable_referential_integrity
   * setting on the FHIR store. This allows the import of resources with arbitrary
   * interdependencies without considering grouping or ordering, but if the input
   * data contains invalid references or if some resources fail to be imported,
   * the FHIR store might be left in a state that violates referential integrity.
   * The import process does not trigger Pub/Sub notification or BigQuery
   * streaming update, regardless of how those are configured on the FHIR store.
   * If a resource with the specified ID already exists, the most recent version
   * of the resource is overwritten without creating a new historical version,
   * regardless of the disable_resource_versioning setting on the FHIR store. If
   * transient failures occur during the import, it's possible that successfully
   * imported resources will be overwritten more than once. The import operation
   * is idempotent unless the input data contains multiple valid resources with
   * the same ID but different contents. In that case, after the import completes,
   * the store contains exactly one resource with that ID but there is no ordering
   * guarantee on which version of the contents it will have. The operation result
   * counters do not count duplicate IDs as an error and count one success for
   * each resource in the input, which might result in a success count larger than
   * the number of resources in the FHIR store. This often occurs when importing
   * data organized in bundles produced by Patient-everything where each bundle
   * contains its own copy of a resource such as Practitioner that might be
   * referred to by many patients. If some resources fail to import, for example
   * due to parsing errors, successfully imported resources are not rolled back.
   * The location and format of the input data is specified by the parameters in
   * ImportResourcesRequest. Note that if no format is specified, this method
   * assumes the `BUNDLE` format. When using the `BUNDLE` format this method
   * ignores the `Bundle.type` field, except that `history` bundles are rejected,
   * and does not apply any of the bundle processing semantics for batch or
   * transaction bundles. Unlike in ExecuteBundle, transaction bundles are not
   * executed as a single transaction and bundle-internal references are not
   * rewritten. The bundle is treated as a collection of resources to be written
   * as provided in `Bundle.entry.resource`, ignoring `Bundle.entry.request`. As
   * an example, this allows the import of `searchset` bundles produced by a FHIR
   * search or Patient-everything operation. This method returns an Operation that
   * can be used to track the status of the import by calling GetOperation.
   * Immediate fatal errors appear in the error field, errors are also logged to
   * Cloud Logging (see [Viewing error logs in Cloud
   * Logging](https://cloud.google.com/healthcare/docs/how-tos/logging)).
   * Otherwise, when the operation finishes, a detailed response of type
   * ImportResourcesResponse is returned in the response field. The metadata field
   * type for this operation is OperationMetadata. (fhirStores.import)
   *
   * @param string $name The name of the FHIR store to import FHIR resources to,
   * in the format of `projects/{project_id}/locations/{location_id}/datasets/{dat
   * aset_id}/fhirStores/{fhir_store_id}`.
   * @param ImportResourcesRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function import($name, ImportResourcesRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('import', [$params], Operation::class);
  }
  /**
   * Lists the FHIR stores in the given dataset.
   * (fhirStores.listProjectsLocationsDatasetsFhirStores)
   *
   * @param string $parent Name of the dataset.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Restricts stores returned to those matching a
   * filter. The following syntax is available: * A string field value can be
   * written as text inside quotation marks, for example `"query text"`. The only
   * valid relational operation for text fields is equality (`=`), where text is
   * searched within the field, rather than having the field be equal to the text.
   * For example, `"Comment = great"` returns messages with `great` in the comment
   * field. * A number field value can be written as an integer, a decimal, or an
   * exponential. The valid relational operators for number fields are the
   * equality operator (`=`), along with the less than/greater than operators
   * (`<`, `<=`, `>`, `>=`). Note that there is no inequality (`!=`) operator. You
   * can prepend the `NOT` operator to an expression to negate it. * A date field
   * value must be written in `yyyy-mm-dd` form. Fields with date and time use the
   * RFC3339 time format. Leading zeros are required for one-digit months and
   * days. The valid relational operators for date fields are the equality
   * operator (`=`) , along with the less than/greater than operators (`<`, `<=`,
   * `>`, `>=`). Note that there is no inequality (`!=`) operator. You can prepend
   * the `NOT` operator to an expression to negate it. * Multiple field query
   * expressions can be combined in one query by adding `AND` or `OR` operators
   * between the expressions. If a boolean operator appears within a quoted
   * string, it is not treated as special, it's just another part of the character
   * string to be matched. You can prepend the `NOT` operator to an expression to
   * negate it. Only filtering on labels is supported, for example
   * `labels.key=value`.
   * @opt_param int pageSize Limit on the number of FHIR stores to return in a
   * single response. If not specified, 100 is used. May not be larger than 1000.
   * @opt_param string pageToken The next_page_token value returned from the
   * previous List request, if any.
   * @return ListFhirStoresResponse
   */
  public function listProjectsLocationsDatasetsFhirStores($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListFhirStoresResponse::class);
  }
  /**
   * Updates the configuration of the specified FHIR store. (fhirStores.patch)
   *
   * @param string $name Output only. Resource name of the FHIR store, of the form
   * `projects/{project_id}/datasets/{dataset_id}/fhirStores/{fhir_store_id}`.
   * @param FhirStore $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask The update mask applies to the resource. For the
   * `FieldMask` definition, see https://developers.google.com/protocol-
   * buffers/docs/reference/google.protobuf#fieldmask
   * @return FhirStore
   */
  public function patch($name, FhirStore $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], FhirStore::class);
  }
  /**
   * Sets the access control policy on the specified resource. Replaces any
   * existing policy. Can return `NOT_FOUND`, `INVALID_ARGUMENT`, and
   * `PERMISSION_DENIED` errors. (fhirStores.setIamPolicy)
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
   * (fhirStores.testIamPermissions)
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
class_alias(ProjectsLocationsDatasetsFhirStores::class, 'Google_Service_CloudHealthcare_Resource_ProjectsLocationsDatasetsFhirStores');
