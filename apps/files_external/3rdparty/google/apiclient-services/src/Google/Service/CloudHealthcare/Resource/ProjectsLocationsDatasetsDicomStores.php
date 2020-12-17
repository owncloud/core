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
 * The "dicomStores" collection of methods.
 * Typical usage is:
 *  <code>
 *   $healthcareService = new Google_Service_CloudHealthcare(...);
 *   $dicomStores = $healthcareService->dicomStores;
 *  </code>
 */
class Google_Service_CloudHealthcare_Resource_ProjectsLocationsDatasetsDicomStores extends Google_Service_Resource
{
  /**
   * Creates a new DICOM store within the parent dataset. (dicomStores.create)
   *
   * @param string $parent The name of the dataset this DICOM store belongs to.
   * @param Google_Service_CloudHealthcare_DicomStore $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string dicomStoreId The ID of the DICOM store that is being
   * created. Any string value up to 256 characters in length.
   * @return Google_Service_CloudHealthcare_DicomStore
   */
  public function create($parent, Google_Service_CloudHealthcare_DicomStore $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_CloudHealthcare_DicomStore");
  }
  /**
   * De-identifies data from the source store and writes it to the destination
   * store. The metadata field type is OperationMetadata. If the request is
   * successful, the response field type is DeidentifyDicomStoreSummary. If errors
   * occur, error is set. The LRO result may still be successful if de-
   * identification fails for some DICOM instances. The output DICOM store will
   * not contain these failed resources. Failed resource totals are tracked in
   * Operation.metadata. Error details are also logged to Cloud Logging (see
   * [Viewing logs](/healthcare/docs/how-tos/logging)). (dicomStores.deidentify)
   *
   * @param string $sourceStore Source DICOM store resource name. For example, `pr
   * ojects/{project_id}/locations/{location_id}/datasets/{dataset_id}/dicomStores
   * /{dicom_store_id}`.
   * @param Google_Service_CloudHealthcare_DeidentifyDicomStoreRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudHealthcare_Operation
   */
  public function deidentify($sourceStore, Google_Service_CloudHealthcare_DeidentifyDicomStoreRequest $postBody, $optParams = array())
  {
    $params = array('sourceStore' => $sourceStore, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('deidentify', array($params), "Google_Service_CloudHealthcare_Operation");
  }
  /**
   * Deletes the specified DICOM store and removes all images that are contained
   * within it. (dicomStores.delete)
   *
   * @param string $name The resource name of the DICOM store to delete.
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
   * Exports data to the specified destination by copying it from the DICOM store.
   * Errors are also logged to Cloud Logging. For more information, see [Viewing
   * logs](/healthcare/docs/how-tos/logging). The metadata field type is
   * OperationMetadata. (dicomStores.export)
   *
   * @param string $name The DICOM store resource name from which to export the
   * data. For example, `projects/{project_id}/locations/{location_id}/datasets/{d
   * ataset_id}/dicomStores/{dicom_store_id}`.
   * @param Google_Service_CloudHealthcare_ExportDicomDataRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudHealthcare_Operation
   */
  public function export($name, Google_Service_CloudHealthcare_ExportDicomDataRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('export', array($params), "Google_Service_CloudHealthcare_Operation");
  }
  /**
   * Gets the specified DICOM store. (dicomStores.get)
   *
   * @param string $name The resource name of the DICOM store to get.
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudHealthcare_DicomStore
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_CloudHealthcare_DicomStore");
  }
  /**
   * Gets the access control policy for a resource. Returns an empty policy if the
   * resource exists and does not have a policy set. (dicomStores.getIamPolicy)
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
   * @return Google_Service_CloudHealthcare_Policy
   */
  public function getIamPolicy($resource, $optParams = array())
  {
    $params = array('resource' => $resource);
    $params = array_merge($params, $optParams);
    return $this->call('getIamPolicy', array($params), "Google_Service_CloudHealthcare_Policy");
  }
  /**
   * Imports data into the DICOM store by copying it from the specified source.
   * Errors are logged to Cloud Logging. For more information, see [Viewing
   * logs](/healthcare/docs/how-tos/logging). The metadata field type is
   * OperationMetadata. (dicomStores.import)
   *
   * @param string $name The name of the DICOM store resource into which the data
   * is imported. For example, `projects/{project_id}/locations/{location_id}/data
   * sets/{dataset_id}/dicomStores/{dicom_store_id}`.
   * @param Google_Service_CloudHealthcare_ImportDicomDataRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudHealthcare_Operation
   */
  public function import($name, Google_Service_CloudHealthcare_ImportDicomDataRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('import', array($params), "Google_Service_CloudHealthcare_Operation");
  }
  /**
   * Lists the DICOM stores in the given dataset.
   * (dicomStores.listProjectsLocationsDatasetsDicomStores)
   *
   * @param string $parent Name of the dataset.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Restricts stores returned to those matching a
   * filter. Syntax:
   * https://cloud.google.com/appengine/docs/standard/python/search/query_strings
   * Only filtering on labels is supported. For example, `labels.key=value`.
   * @opt_param int pageSize Limit on the number of DICOM stores to return in a
   * single response. If zero the default page size of 100 is used.
   * @opt_param string pageToken The next_page_token value returned from the
   * previous List request, if any.
   * @return Google_Service_CloudHealthcare_ListDicomStoresResponse
   */
  public function listProjectsLocationsDatasetsDicomStores($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_CloudHealthcare_ListDicomStoresResponse");
  }
  /**
   * Updates the specified DICOM store. (dicomStores.patch)
   *
   * @param string $name Resource name of the DICOM store, of the form `projects/{
   * project_id}/locations/{location_id}/datasets/{dataset_id}/dicomStores/{dicom_
   * store_id}`.
   * @param Google_Service_CloudHealthcare_DicomStore $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask The update mask applies to the resource. For the
   * `FieldMask` definition, see https://developers.google.com/protocol-
   * buffers/docs/reference/google.protobuf#fieldmask
   * @return Google_Service_CloudHealthcare_DicomStore
   */
  public function patch($name, Google_Service_CloudHealthcare_DicomStore $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_CloudHealthcare_DicomStore");
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
   * @return Google_Service_CloudHealthcare_HttpBody
   */
  public function searchForInstances($parent, $dicomWebPath, $optParams = array())
  {
    $params = array('parent' => $parent, 'dicomWebPath' => $dicomWebPath);
    $params = array_merge($params, $optParams);
    return $this->call('searchForInstances', array($params), "Google_Service_CloudHealthcare_HttpBody");
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
   * @return Google_Service_CloudHealthcare_HttpBody
   */
  public function searchForSeries($parent, $dicomWebPath, $optParams = array())
  {
    $params = array('parent' => $parent, 'dicomWebPath' => $dicomWebPath);
    $params = array_merge($params, $optParams);
    return $this->call('searchForSeries', array($params), "Google_Service_CloudHealthcare_HttpBody");
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
   * @return Google_Service_CloudHealthcare_HttpBody
   */
  public function searchForStudies($parent, $dicomWebPath, $optParams = array())
  {
    $params = array('parent' => $parent, 'dicomWebPath' => $dicomWebPath);
    $params = array_merge($params, $optParams);
    return $this->call('searchForStudies', array($params), "Google_Service_CloudHealthcare_HttpBody");
  }
  /**
   * Sets the access control policy on the specified resource. Replaces any
   * existing policy. Can return `NOT_FOUND`, `INVALID_ARGUMENT`, and
   * `PERMISSION_DENIED` errors. (dicomStores.setIamPolicy)
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
   * @param Google_Service_CloudHealthcare_HttpBody $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudHealthcare_HttpBody
   */
  public function storeInstances($parent, $dicomWebPath, Google_Service_CloudHealthcare_HttpBody $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'dicomWebPath' => $dicomWebPath, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('storeInstances', array($params), "Google_Service_CloudHealthcare_HttpBody");
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
