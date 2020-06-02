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
 * The "studies" collection of methods.
 * Typical usage is:
 *  <code>
 *   $healthcareService = new Google_Service_CloudHealthcare(...);
 *   $studies = $healthcareService->studies;
 *  </code>
 */
class Google_Service_CloudHealthcare_Resource_ProjectsLocationsDatasetsDicomStoresStudies extends Google_Service_Resource
{
  /**
   * DeleteStudy deletes all instances within the given study. Delete requests are
   * equivalent to the GET requests specified in the Retrieve transaction. The
   * method returns an Operation which will be marked successful when the deletion
   * is complete. (studies.delete)
   *
   * @param string $parent
   * @param string $dicomWebPath The path of the DeleteStudy request. For example,
   * `studies/{study_uid}`.
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudHealthcare_Operation
   */
  public function delete($parent, $dicomWebPath, $optParams = array())
  {
    $params = array('parent' => $parent, 'dicomWebPath' => $dicomWebPath);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_CloudHealthcare_Operation");
  }
  /**
   * RetrieveStudyMetadata returns instance associated with the given study
   * presented as metadata with the bulk data removed. See [RetrieveTransaction] (
   * http://dicom.nema.org/medical/dicom/current/output/html/part18.html#sect_10.4
   * ). (studies.retrieveMetadata)
   *
   * @param string $parent The name of the DICOM store that is being accessed. For
   * example, `projects/{project_id}/locations/{location_id}/datasets/{dataset_id}
   * /dicomStores/{dicom_store_id}`.
   * @param string $dicomWebPath The path of the RetrieveStudyMetadata DICOMweb
   * request. For example, `studies/{study_uid}/metadata`.
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudHealthcare_HttpBody
   */
  public function retrieveMetadata($parent, $dicomWebPath, $optParams = array())
  {
    $params = array('parent' => $parent, 'dicomWebPath' => $dicomWebPath);
    $params = array_merge($params, $optParams);
    return $this->call('retrieveMetadata', array($params), "Google_Service_CloudHealthcare_HttpBody");
  }
  /**
   * RetrieveStudy returns all instances within the given study. See
   * [RetrieveTransaction] (http://dicom.nema.org/medical/dicom/current/output/htm
   * l/part18.html#sect_10.4). (studies.retrieveStudy)
   *
   * @param string $parent The name of the DICOM store that is being accessed. For
   * example, `projects/{project_id}/locations/{location_id}/datasets/{dataset_id}
   * /dicomStores/{dicom_store_id}`.
   * @param string $dicomWebPath The path of the RetrieveStudy DICOMweb request.
   * For example, `studies/{study_uid}`.
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudHealthcare_HttpBody
   */
  public function retrieveStudy($parent, $dicomWebPath, $optParams = array())
  {
    $params = array('parent' => $parent, 'dicomWebPath' => $dicomWebPath);
    $params = array_merge($params, $optParams);
    return $this->call('retrieveStudy', array($params), "Google_Service_CloudHealthcare_HttpBody");
  }
  /**
   * SearchForInstances returns a list of matching instances. See [Search
   * Transaction] (http://dicom.nema.org/medical/dicom/current/output/html/part18.
   * html#sect_10.6). (studies.searchForInstances)
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
   * ). (studies.searchForSeries)
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
   * StoreInstances stores DICOM instances associated with study instance unique
   * identifiers (SUID). See [Store Transaction] (http://dicom.nema.org/medical/di
   * com/current/output/html/part18.html#sect_10.5). (studies.storeInstances)
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
}
