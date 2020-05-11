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
 * The "fhirStores" collection of methods.
 * Typical usage is:
 *  <code>
 *   $healthcareService = new Google_Service_CloudHealthcare(...);
 *   $fhirStores = $healthcareService->fhirStores;
 *  </code>
 */
class Google_Service_CloudHealthcare_Resource_ProjectsLocationsDatasetsFhirStores extends Google_Service_Resource
{
  /**
   * Creates a new FHIR store within the parent dataset. (fhirStores.create)
   *
   * @param string $parent The name of the dataset this FHIR store belongs to.
   * @param Google_Service_CloudHealthcare_FhirStore $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string fhirStoreId The ID of the FHIR store that is being created.
   * The string must match the following regex: `[\p{L}\p{N}_\-\.]{1,256}`.
   * @return Google_Service_CloudHealthcare_FhirStore
   */
  public function create($parent, Google_Service_CloudHealthcare_FhirStore $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_CloudHealthcare_FhirStore");
  }
  /**
   * De-identifies data from the source store and writes it to the destination
   * store. The metadata field type is OperationMetadata. If the request is
   * successful, the response field type is DeidentifyFhirStoreSummary. If errors
   * occur, error is set. Error details are also logged to Stackdriver (see
   * [Viewing logs](/healthcare/docs/how-tos/stackdriver-logging)).
   * (fhirStores.deidentify)
   *
   * @param string $sourceStore Source FHIR store resource name. For example, `pro
   * jects/{project_id}/locations/{location_id}/datasets/{dataset_id}/fhirStores/{
   * fhir_store_id}`.
   * @param Google_Service_CloudHealthcare_DeidentifyFhirStoreRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudHealthcare_Operation
   */
  public function deidentify($sourceStore, Google_Service_CloudHealthcare_DeidentifyFhirStoreRequest $postBody, $optParams = array())
  {
    $params = array('sourceStore' => $sourceStore, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('deidentify', array($params), "Google_Service_CloudHealthcare_Operation");
  }
  /**
   * Deletes the specified FHIR store and removes all resources within it.
   * (fhirStores.delete)
   *
   * @param string $name The resource name of the FHIR store to delete.
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudHealthcare_HealthcareEmpty
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_CloudHealthcare_HealthcareEmpty");
  }
  /**
   * Export resources from the FHIR store to the specified destination.
   *
   * This method returns an Operation that can be used to track the status of the
   * export by calling GetOperation.
   *
   * Immediate fatal errors appear in the error field, errors are also logged to
   * Stackdriver (see [Viewing logs](/healthcare/docs/how-tos/stackdriver-
   * logging)). Otherwise, when the operation finishes, a detailed response of
   * type ExportResourcesResponse is returned in the response field. The metadata
   * field type for this operation is OperationMetadata. (fhirStores.export)
   *
   * @param string $name The name of the FHIR store to export resource from. The
   * name should be in the format of `projects/{project_id}/locations/{location_id
   * }/datasets/{dataset_id}/fhirStores/{fhir_store_id}`.
   * @param Google_Service_CloudHealthcare_ExportResourcesRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudHealthcare_Operation
   */
  public function export($name, Google_Service_CloudHealthcare_ExportResourcesRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('export', array($params), "Google_Service_CloudHealthcare_Operation");
  }
  /**
   * Gets the configuration of the specified FHIR store. (fhirStores.get)
   *
   * @param string $name The resource name of the FHIR store to get.
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudHealthcare_FhirStore
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_CloudHealthcare_FhirStore");
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
   * version to be returned.
   *
   * Valid values are 0, 1, and 3. Requests specifying an invalid value will be
   * rejected.
   *
   * Requests for policies with any conditional bindings must specify version 3.
   * Policies without any conditional bindings may specify any valid value or
   * leave the field unset.
   * @return Google_Service_CloudHealthcare_Policy
   */
  public function getIamPolicy($resource, $optParams = array())
  {
    $params = array('resource' => $resource);
    $params = array_merge($params, $optParams);
    return $this->call('getIamPolicy', array($params), "Google_Service_CloudHealthcare_Policy");
  }
  /**
   * Import resources to the FHIR store by loading data from the specified
   * sources. This method is optimized to load large quantities of data using
   * import semantics that ignore some FHIR store configuration options and are
   * not suitable for all use cases. It is primarily intended to load data into an
   * empty FHIR store that is not being used by other clients. In cases where this
   * method is not appropriate, consider using ExecuteBundle to load data.
   *
   * Every resource in the input must contain a client-supplied ID, and will be
   * stored using that ID regardless of the enable_update_create setting on the
   * FHIR store.
   *
   * The import process does not enforce referential integrity, regardless of the
   * disable_referential_integrity setting on the FHIR store. This allows the
   * import of resources with arbitrary interdependencies without considering
   * grouping or ordering, but if the input data contains invalid references or if
   * some resources fail to be imported, the FHIR store might be left in a state
   * that violates referential integrity.
   *
   * The import process does not trigger PubSub notification or BigQuery streaming
   * update, regardless of how those are configured on the FHIR store.
   *
   * If a resource with the specified ID already exists, the most recent version
   * of the resource is overwritten without creating a new historical version,
   * regardless of the disable_resource_versioning setting on the FHIR store. If
   * transient failures occur during the import, it is possible that successfully
   * imported resources will be overwritten more than once.
   *
   * The import operation is idempotent unless the input data contains multiple
   * valid resources with the same ID but different contents. In that case, after
   * the import completes, the store will contain exactly one resource with that
   * ID but there is no ordering guarantee on which version of the contents it
   * will have. The operation result counters do not count duplicate IDs as an
   * error and will count one success for each resource in the input, which might
   * result in a success count larger than the number of resources in the FHIR
   * store. This often occurs when importing data organized in bundles produced by
   * Patient-everything where each bundle contains its own copy of a resource such
   * as Practitioner that might be referred to by many patients.
   *
   * If some resources fail to import, for example due to parsing errors,
   * successfully imported resources are not rolled back.
   *
   * The location and format of the input data is specified by the parameters
   * below. Note that if no format is specified, this method assumes the `BUNDLE`
   * format. When using the `BUNDLE` format this method ignores the `Bundle.type`
   * field, except that `history` bundles are rejected, and does not apply any of
   * the bundle processing semantics for batch or transaction bundles. Unlike in
   * ExecuteBundle, transaction bundles are not executed as a single transaction
   * and bundle-internal references are not rewritten. The bundle is treated as a
   * collection of resources to be written as provided in `Bundle.entry.resource`,
   * ignoring `Bundle.entry.request`. As an example, this allows the import of
   * `searchset` bundles produced by a FHIR search or Patient-everything
   * operation.
   *
   * This method returns an Operation that can be used to track the status of the
   * import by calling GetOperation.
   *
   * Immediate fatal errors appear in the error field, errors are also logged to
   * Stackdriver (see [Viewing logs](/healthcare/docs/how-tos/stackdriver-
   * logging)). Otherwise, when the operation finishes, a detailed response of
   * type ImportResourcesResponse is returned in the response field. The metadata
   * field type for this operation is OperationMetadata. (fhirStores.import)
   *
   * @param string $name The name of the FHIR store to import FHIR resources to.
   * The name should be in the format of `projects/{project_id}/locations/{locatio
   * n_id}/datasets/{dataset_id}/fhirStores/{fhir_store_id}`.
   * @param Google_Service_CloudHealthcare_ImportResourcesRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudHealthcare_Operation
   */
  public function import($name, Google_Service_CloudHealthcare_ImportResourcesRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('import', array($params), "Google_Service_CloudHealthcare_Operation");
  }
  /**
   * Lists the FHIR stores in the given dataset.
   * (fhirStores.listProjectsLocationsDatasetsFhirStores)
   *
   * @param string $parent Name of the dataset.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Restricts stores returned to those matching a
   * filter. Syntax:
   * https://cloud.google.com/appengine/docs/standard/python/search/query_strings
   * Only filtering on labels is supported, for example `labels.key=value`.
   * @opt_param string pageToken The next_page_token value returned from the
   * previous List request, if any.
   * @opt_param int pageSize Limit on the number of FHIR stores to return in a
   * single response.  If zero the default page size of 100 is used.
   * @return Google_Service_CloudHealthcare_ListFhirStoresResponse
   */
  public function listProjectsLocationsDatasetsFhirStores($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_CloudHealthcare_ListFhirStoresResponse");
  }
  /**
   * Updates the configuration of the specified FHIR store. (fhirStores.patch)
   *
   * @param string $name Output only. Resource name of the FHIR store, of the form
   * `projects/{project_id}/datasets/{dataset_id}/fhirStores/{fhir_store_id}`.
   * @param Google_Service_CloudHealthcare_FhirStore $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask The update mask applies to the resource. For the
   * `FieldMask` definition, see https://developers.google.com/protocol-
   * buffers/docs/reference/google.protobuf#fieldmask
   * @return Google_Service_CloudHealthcare_FhirStore
   */
  public function patch($name, Google_Service_CloudHealthcare_FhirStore $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_CloudHealthcare_FhirStore");
  }
  /**
   * Searches for resources in the given FHIR store according to criteria
   * specified as query parameters.
   *
   * Implements the FHIR standard search interaction
   * ([DSTU2](http://hl7.org/implement/standards/fhir/DSTU2/http.html#search),
   * [STU3](http://hl7.org/implement/standards/fhir/STU3/http.html#search),
   * [R4](http://hl7.org/implement/standards/fhir/R4/http.html#search)) using the
   * search semantics described in the FHIR Search specification
   * ([DSTU2](http://hl7.org/implement/standards/fhir/DSTU2/search.html),
   * [STU3](http://hl7.org/implement/standards/fhir/STU3/search.html),
   * [R4](http://hl7.org/implement/standards/fhir/R4/search.html)).
   *
   * Supports three methods of search defined by the specification:
   *
   * *  `GET [base]?[parameters]` to search across all resources. *  `GET
   * [base]/[type]?[parameters]` to search resources of a specified type. *  `POST
   * [base]/[type]/_search?[parameters]` as an alternate form having the same
   * semantics as the `GET` method.
   *
   * The `GET` methods do not support compartment searches. The `POST` method does
   * not support `application/x-www-form-urlencoded` search parameters.
   *
   * On success, the response body will contain a JSON-encoded representation of a
   * `Bundle` resource of type `searchset`, containing the results of the search.
   * Errors generated by the FHIR store will contain a JSON-encoded
   * `OperationOutcome` resource describing the reason for the error. If the
   * request cannot be mapped to a valid API method on a FHIR store, a generic GCP
   * error might be returned instead.
   *
   * The server's capability statement, retrieved through capabilities, indicates
   * what search parameters are supported on each FHIR resource. A list of all
   * search parameters defined by the specification can be found in the FHIR
   * Search Parameter Registry
   * ([STU3](http://hl7.org/implement/standards/fhir/STU3/searchparameter-
   * registry.html), [R4](http://hl7.org/implement/standards/fhir/R4
   * /searchparameter-registry.html)). FHIR search parameters for DSTU2 can be
   * found on each resource's definition page.
   *
   * Supported search modifiers: `:missing`, `:exact`, `:contains`, `:text`,
   * `:in`, `:not-in`, `:above`, `:below`, `:[type]`, `:not`, and `:recurse`.
   *
   * Supported search result parameters: `_sort`, `_count`, `_include`,
   * `_revinclude`, `_summary=text`, `_summary=data`, and `_elements`.
   *
   * The maximum number of search results returned defaults to 100, which can be
   * overridden by the `_count` parameter up to a maximum limit of 1000. If there
   * are additional results, the returned `Bundle` will contain pagination links.
   *
   * Resources with a total size larger than 5MB or a field count larger than
   * 50,000 might not be fully searchable as the server might trim its generated
   * search index in those cases.
   *
   * Note: FHIR resources are indexed asynchronously, so there might be a slight
   * delay between the time a resource is created or changes and when the change
   * is reflected in search results. (fhirStores.search)
   *
   * @param string $parent Name of the FHIR store to retrieve resources from.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string resourceType The FHIR resource type to search, such as
   * Patient or Observation. For a complete list, see the FHIR Resource Index
   * ([DSTU2](http://hl7.org/implement/standards/fhir/DSTU2/resourcelist.html),
   * [STU3](http://hl7.org/implement/standards/fhir/STU3/resourcelist.html),
   * [R4](http://hl7.org/implement/standards/fhir/R4/resourcelist.html)).
   * @return Google_Service_CloudHealthcare_HttpBody
   */
  public function search($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('search', array($params), "Google_Service_CloudHealthcare_HttpBody");
  }
  /**
   * Sets the access control policy on the specified resource. Replaces any
   * existing policy.
   *
   * Can return Public Errors: NOT_FOUND, INVALID_ARGUMENT and PERMISSION_DENIED
   * (fhirStores.setIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which the policy is being
   * specified. See the operation documentation for the appropriate value for this
   * field.
   * @param Google_Service_CloudHealthcare_SetIamPolicyRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudHealthcare_Policy
   */
  public function setIamPolicy($resource, Google_Service_CloudHealthcare_SetIamPolicyRequest $postBody, $optParams = array())
  {
    $params = array('resource' => $resource, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('setIamPolicy', array($params), "Google_Service_CloudHealthcare_Policy");
  }
  /**
   * Returns permissions that a caller has on the specified resource. If the
   * resource does not exist, this will return an empty set of permissions, not a
   * NOT_FOUND error.
   *
   * Note: This operation is designed to be used for building permission-aware UIs
   * and command-line tools, not for authorization checking. This operation may
   * "fail open" without warning. (fhirStores.testIamPermissions)
   *
   * @param string $resource REQUIRED: The resource for which the policy detail is
   * being requested. See the operation documentation for the appropriate value
   * for this field.
   * @param Google_Service_CloudHealthcare_TestIamPermissionsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudHealthcare_TestIamPermissionsResponse
   */
  public function testIamPermissions($resource, Google_Service_CloudHealthcare_TestIamPermissionsRequest $postBody, $optParams = array())
  {
    $params = array('resource' => $resource, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('testIamPermissions', array($params), "Google_Service_CloudHealthcare_TestIamPermissionsResponse");
  }
}
