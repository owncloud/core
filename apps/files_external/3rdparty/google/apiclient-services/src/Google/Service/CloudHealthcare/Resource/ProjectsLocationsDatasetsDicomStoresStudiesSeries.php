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
 * The "series" collection of methods.
 * Typical usage is:
 *  <code>
 *   $healthcareService = new Google_Service_CloudHealthcare(...);
 *   $series = $healthcareService->series;
 *  </code>
 */
class Google_Service_CloudHealthcare_Resource_ProjectsLocationsDatasetsDicomStoresStudiesSeries extends Google_Service_Resource
{
  /**
   * DeleteSeries deletes all instances within the given study and series. Delete
   * requests are equivalent to the GET requests specified in the Retrieve
   * transaction. The method returns an Operation which will be marked successful
   * when the deletion is complete. Warning: Inserting instances into a series
   * while a delete operation is running for that series could result in the new
   * instances not appearing in search results until the deletion operation
   * finishes. For samples that show how to call DeleteSeries, see [Deleting a
   * study, series, or instance](https://cloud.google.com/healthcare/docs/how-
   * tos/dicomweb#deleting_a_study_series_or_instance). (series.delete)
   *
   * @param string $parent The name of the DICOM store that is being accessed. For
   * example, `projects/{project_id}/locations/{location_id}/datasets/{dataset_id}
   * /dicomStores/{dicom_store_id}`.
   * @param string $dicomWebPath The path of the DeleteSeries request. For
   * example, `studies/{study_uid}/series/{series_uid}`.
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
   * RetrieveSeriesMetadata returns instance associated with the given study and
   * series, presented as metadata with the bulk data removed. See
   * [RetrieveTransaction] (http://dicom.nema.org/medical/dicom/current/output/htm
   * l/part18.html#sect_10.4). For details on the implementation of
   * RetrieveSeriesMetadata, see [Metadata
   * resources](https://cloud.google.com/healthcare/docs/dicom#metadata_resources)
   * in the Cloud Healthcare API conformance statement. For samples that show how
   * to call RetrieveSeriesMetadata, see [Retrieving
   * metadata](https://cloud.google.com/healthcare/docs/how-
   * tos/dicomweb#retrieving_metadata). (series.retrieveMetadata)
   *
   * @param string $parent The name of the DICOM store that is being accessed. For
   * example, `projects/{project_id}/locations/{location_id}/datasets/{dataset_id}
   * /dicomStores/{dicom_store_id}`.
   * @param string $dicomWebPath The path of the RetrieveSeriesMetadata DICOMweb
   * request. For example, `studies/{study_uid}/series/{series_uid}/metadata`.
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
   * RetrieveSeries returns all instances within the given study and series. See
   * [RetrieveTransaction] (http://dicom.nema.org/medical/dicom/current/output/htm
   * l/part18.html#sect_10.4). For details on the implementation of
   * RetrieveSeries, see [DICOM study/series/instances](https://cloud.google.com/h
   * ealthcare/docs/dicom#dicom_studyseriesinstances) in the Cloud Healthcare API
   * conformance statement. For samples that show how to call RetrieveSeries, see
   * [Retrieving DICOM data](https://cloud.google.com/healthcare/docs/how-
   * tos/dicomweb#retrieving_dicom_data). (series.retrieveSeries)
   *
   * @param string $parent The name of the DICOM store that is being accessed. For
   * example, `projects/{project_id}/locations/{location_id}/datasets/{dataset_id}
   * /dicomStores/{dicom_store_id}`.
   * @param string $dicomWebPath The path of the RetrieveSeries DICOMweb request.
   * For example, `studies/{study_uid}/series/{series_uid}`.
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudHealthcare_HttpBody
   */
  public function retrieveSeries($parent, $dicomWebPath, $optParams = array())
  {
    $params = array('parent' => $parent, 'dicomWebPath' => $dicomWebPath);
    $params = array_merge($params, $optParams);
    return $this->call('retrieveSeries', array($params), "Google_Service_CloudHealthcare_HttpBody");
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
   * (series.searchForInstances)
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
}
