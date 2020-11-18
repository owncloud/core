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
 * The "examples" collection of methods.
 * Typical usage is:
 *  <code>
 *   $datalabelingService = new Google_Service_DataLabeling(...);
 *   $examples = $datalabelingService->examples;
 *  </code>
 */
class Google_Service_DataLabeling_Resource_ProjectsDatasetsAnnotatedDatasetsExamples extends Google_Service_Resource
{
  /**
   * Gets an example by resource name, including both data and annotation.
   * (examples.get)
   *
   * @param string $name Required. Name of example, format:
   * projects/{project_id}/datasets/{dataset_id}/annotatedDatasets/
   * {annotated_dataset_id}/examples/{example_id}
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Optional. An expression for filtering Examples.
   * Filter by annotation_spec.display_name is supported. Format
   * "annotation_spec.display_name = {display_name}"
   * @return Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1Example
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1Example");
  }
  /**
   * Lists examples in an annotated dataset. Pagination is supported.
   * (examples.listProjectsDatasetsAnnotatedDatasetsExamples)
   *
   * @param string $parent Required. Example resource parent.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Optional. An expression for filtering Examples. For
   * annotated datasets that have annotation spec set, filter by
   * annotation_spec.display_name is supported. Format
   * "annotation_spec.display_name = {display_name}"
   * @opt_param string pageToken Optional. A token identifying a page of results
   * for the server to return. Typically obtained by
   * ListExamplesResponse.next_page_token of the previous
   * [DataLabelingService.ListExamples] call. Return first page if empty.
   * @opt_param int pageSize Optional. Requested page size. Server may return
   * fewer results than requested. Default value is 100.
   * @return Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1ListExamplesResponse
   */
  public function listProjectsDatasetsAnnotatedDatasetsExamples($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1ListExamplesResponse");
  }
}
