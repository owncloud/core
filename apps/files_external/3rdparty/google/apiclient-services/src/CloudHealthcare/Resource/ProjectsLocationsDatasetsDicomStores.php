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

use Google\Service\CloudHealthcare\DeidentifyDicomStoreRequest;
use Google\Service\CloudHealthcare\DicomStore;
use Google\Service\CloudHealthcare\ExportDicomDataRequest;
use Google\Service\CloudHealthcare\HealthcareEmpty;
use Google\Service\CloudHealthcare\HttpBody;
use Google\Service\CloudHealthcare\ImportDicomDataRequest;
use Google\Service\CloudHealthcare\ListDicomStoresResponse;
use Google\Service\CloudHealthcare\Operation;
use Google\Service\CloudHealthcare\Policy;
use Google\Service\CloudHealthcare\SetIamPolicyRequest;
use Google\Service\CloudHealthcare\TestIamPermissionsRequest;
use Google\Service\CloudHealthcare\TestIamPermissionsResponse;

/**
 * The "dicomStores" collection of methods.
 * Typical usage is:
 *  <code>
 *   $healthcareService = new Google\Service\CloudHealthcare(...);
 *   $dicomStores = $healthcareService->dicomStores;
 *  </code>
 */
class ProjectsLocationsDatasetsDicomStores extends \Google\Service\Resource
{
  /**
   * Creates a new DICOM store within the parent dataset. (dicomStores.create)
   *
   * @param string $parent The name of the dataset this DICOM store belongs to.
   * @param DicomStore $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string dicomStoreId The ID of the DICOM store that is being
   * created. Any string value up to 256 characters in length.
   * @return DicomStore
   */
  public function create($parent, DicomStore $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], DicomStore::class);
  }
  /**
   * De-identifies data from the source store and writes it to the destination
   * store. The metadata field type is OperationMetadata. If the request is
   * successful, the response field type is DeidentifyDicomStoreSummary. If errors
   * occur, error is set. The LRO result may still be successful if de-
   * identification fails for some DICOM instances. The output DICOM store will
   * not contain these failed resources. Failed resource totals are tracked in
   * Operation.metadata. Error details are also logged to Cloud Logging (see
   * [Viewing error logs in Cloud Logging](/healthcare/docs/how-tos/logging)).
   * (dicomStores.deidentify)
   *
   * @param string $sourceStore Source DICOM store resource name. For example, `pr
   * ojects/{project_id}/locations/{location_id}/datasets/{dataset_id}/dicomStores
   * /{dicom_store_id}`.
   * @param DeidentifyDicomStoreRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function deidentify($sourceStore, DeidentifyDicomStoreRequest $postBody, $optParams = [])
  {
    $params = ['sourceStore' => $sourceStore, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('deidentify', [$params], Operation::class);
  }
  /**
   * Deletes the specified DICOM store and removes all images that are contained
   * within it. (dicomStores.delete)
   *
   * @param string $name The resource name of the DICOM store to delete.
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
   * Exports data to the specified destination by copying it from the DICOM store.
   * Errors are also logged to Cloud Logging. For more information, see [Viewing
   * error logs in Cloud Logging](https://cloud.google.com/healthcare/docs/how-
   * tos/logging). The metadata field type is OperationMetadata.
   * (dicomStores.export)
   *
   * @param string $name The DICOM store resource name from which to export the
   * data. For example, `projects/{project_id}/locations/{location_id}/datasets/{d
   * ataset_id}/dicomStores/{dicom_store_id}`.
   * @param ExportDicomDataRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function export($name, ExportDicomDataRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('export', [$params], Operation::class);
  }
  /**
   * Gets the specified DICOM store. (dicomStores.get)
   *
   * @param string $name The resource name of the DICOM store to get.
   * @param array $optParams Optional parameters.
   * @return DicomStore
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], DicomStore::class);
  }
  /**
   * Gets the access control policy for a resource. Returns an empty policy if the
   * resource exists and does not have a policy set. (dicomStores.getIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which the policy is being
   * requested. See [Resource
   * names](https://cloud.google.com/apis/design/resource_names) for the
   * appropriate value for this field.
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
   * Imports data into the DICOM store by copying it from the specified source.
   * Errors are logged to Cloud Logging. For more information, see [Viewing error
   * logs in Cloud Logging](https://cloud.google.com/healthcare/docs/how-
   * tos/logging). The metadata field type is OperationMetadata.
   * (dicomStores.import)
   *
   * @param string $name The name of the DICOM store resource into which the data
   * is imported. For example, `projects/{project_id}/locations/{location_id}/data
   * sets/{dataset_id}/dicomStores/{dicom_store_id}`.
   * @param ImportDicomDataRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function import($name, ImportDicomDataRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('import', [$params], Operation::class);
  }
  /**
   * Lists the DICOM stores in the given dataset.
   * (dicomStores.listProjectsLocationsDatasetsDicomStores)
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
   * negate it. Only filtering on labels is supported. For example,
   * `labels.key=value`.
   * @opt_param int pageSize Limit on the number of DICOM stores to return in a
   * single response. If not specified, 100 is used. May not be larger than 1000.
   * @opt_param string pageToken The next_page_token value returned from the
   * previous List request, if any.
   * @return ListDicomStoresResponse
   */
  public function listProjectsLocationsDatasetsDicomStores($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListDicomStoresResponse::class);
  }
  /**
   * Updates the specified DICOM store. (dicomStores.patch)
   *
   * @param string $name Resource name of the DICOM store, of the form `projects/{
   * project_id}/locations/{location_id}/datasets/{dataset_id}/dicomStores/{dicom_
   * store_id}`.
   * @param DicomStore $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask The update mask applies to the resource. For the
   * `FieldMask` definition, see https://developers.google.com/protocol-
   * buffers/docs/reference/google.protobuf#fieldmask
   * @return DicomStore
   */
  public function patch($name, DicomStore $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], DicomStore::class);
  }
  /**
   * SearchForInstances returns a list of matching instances. See [Search
   * Transaction] (http://dicom.nema.org/medical/dicom/current/output/html/part18.
   * html#sect_10.6). For details on the implementation of SearchForInstances, see
   * [Search transaction](https://cloud.google.com/healthcare/docs/dicom#search_tr
   * ansaction) in the Cloud Healthcare API conformance statement. For samples
   * that show how to call SearchForInstances, see [Searching for studies, series,
   * instances, and frames](https://cloud.google.com/healthcare/docs/how-
   * tos/dicomweb#searching_for_studies_series_instances_and_frames).
   * (dicomStores.searchForInstances)
   *
   * @param string $parent The name of the DICOM store that is being accessed. For
   * example, `projects/{project_id}/locations/{location_id}/datasets/{dataset_id}
   * /dicomStores/{dicom_store_id}`.
   * @param string $dicomWebPath The path of the SearchForInstancesRequest
   * DICOMweb request. For example, `instances`, `series/{series_uid}/instances`,
   * or `studies/{study_uid}/instances`.
   * @param array $optParams Optional parameters.
   * @return HttpBody
   */
  public function searchForInstances($parent, $dicomWebPath, $optParams = [])
  {
    $params = ['parent' => $parent, 'dicomWebPath' => $dicomWebPath];
    $params = array_merge($params, $optParams);
    return $this->call('searchForInstances', [$params], HttpBody::class);
  }
  /**
   * SearchForSeries returns a list of matching series. See [Search Transaction] (
   * http://dicom.nema.org/medical/dicom/current/output/html/part18.html#sect_10.6
   * ). For details on the implementation of SearchForSeries, see [Search transact
   * ion](https://cloud.google.com/healthcare/docs/dicom#search_transaction) in
   * the Cloud Healthcare API conformance statement. For samples that show how to
   * call SearchForSeries, see [Searching for studies, series, instances, and
   * frames](https://cloud.google.com/healthcare/docs/how-
   * tos/dicomweb#searching_for_studies_series_instances_and_frames).
   * (dicomStores.searchForSeries)
   *
   * @param string $parent The name of the DICOM store that is being accessed. For
   * example, `projects/{project_id}/locations/{location_id}/datasets/{dataset_id}
   * /dicomStores/{dicom_store_id}`.
   * @param string $dicomWebPath The path of the SearchForSeries DICOMweb request.
   * For example, `series` or `studies/{study_uid}/series`.
   * @param array $optParams Optional parameters.
   * @return HttpBody
   */
  public function searchForSeries($parent, $dicomWebPath, $optParams = [])
  {
    $params = ['parent' => $parent, 'dicomWebPath' => $dicomWebPath];
    $params = array_merge($params, $optParams);
    return $this->call('searchForSeries', [$params], HttpBody::class);
  }
  /**
   * SearchForStudies returns a list of matching studies. See [Search Transaction]
   * (http://dicom.nema.org/medical/dicom/current/output/html/part18.html#sect_10.
   * 6). For details on the implementation of SearchForStudies, see [Search transa
   * ction](https://cloud.google.com/healthcare/docs/dicom#search_transaction) in
   * the Cloud Healthcare API conformance statement. For samples that show how to
   * call SearchForStudies, see [Searching for studies, series, instances, and
   * frames](https://cloud.google.com/healthcare/docs/how-
   * tos/dicomweb#searching_for_studies_series_instances_and_frames).
   * (dicomStores.searchForStudies)
   *
   * @param string $parent The name of the DICOM store that is being accessed. For
   * example, `projects/{project_id}/locations/{location_id}/datasets/{dataset_id}
   * /dicomStores/{dicom_store_id}`.
   * @param string $dicomWebPath The path of the SearchForStudies DICOMweb
   * request. For example, `studies`.
   * @param array $optParams Optional parameters.
   * @return HttpBody
   */
  public function searchForStudies($parent, $dicomWebPath, $optParams = [])
  {
    $params = ['parent' => $parent, 'dicomWebPath' => $dicomWebPath];
    $params = array_merge($params, $optParams);
    return $this->call('searchForStudies', [$params], HttpBody::class);
  }
  /**
   * Sets the access control policy on the specified resource. Replaces any
   * existing policy. Can return `NOT_FOUND`, `INVALID_ARGUMENT`, and
   * `PERMISSION_DENIED` errors. (dicomStores.setIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which the policy is being
   * specified. See [Resource
   * names](https://cloud.google.com/apis/design/resource_names) for the
   * appropriate value for this field.
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
   * StoreInstances stores DICOM instances associated with study instance unique
   * identifiers (SUID). See [Store Transaction] (http://dicom.nema.org/medical/di
   * com/current/output/html/part18.html#sect_10.5). For details on the
   * implementation of StoreInstances, see [Store transaction](https://cloud.googl
   * e.com/healthcare/docs/dicom#store_transaction) in the Cloud Healthcare API
   * conformance statement. For samples that show how to call StoreInstances, see
   * [Storing DICOM data](https://cloud.google.com/healthcare/docs/how-
   * tos/dicomweb#storing_dicom_data). (dicomStores.storeInstances)
   *
   * @param string $parent The name of the DICOM store that is being accessed. For
   * example, `projects/{project_id}/locations/{location_id}/datasets/{dataset_id}
   * /dicomStores/{dicom_store_id}`.
   * @param string $dicomWebPath The path of the StoreInstances DICOMweb request.
   * For example, `studies/[{study_uid}]`. Note that the `study_uid` is optional.
   * @param HttpBody $postBody
   * @param array $optParams Optional parameters.
   * @return HttpBody
   */
  public function storeInstances($parent, $dicomWebPath, HttpBody $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'dicomWebPath' => $dicomWebPath, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('storeInstances', [$params], HttpBody::class);
  }
  /**
   * Returns permissions that a caller has on the specified resource. If the
   * resource does not exist, this will return an empty set of permissions, not a
   * `NOT_FOUND` error. Note: This operation is designed to be used for building
   * permission-aware UIs and command-line tools, not for authorization checking.
   * This operation may "fail open" without warning.
   * (dicomStores.testIamPermissions)
   *
   * @param string $resource REQUIRED: The resource for which the policy detail is
   * being requested. See [Resource
   * names](https://cloud.google.com/apis/design/resource_names) for the
   * appropriate value for this field.
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
class_alias(ProjectsLocationsDatasetsDicomStores::class, 'Google_Service_CloudHealthcare_Resource_ProjectsLocationsDatasetsDicomStores');
