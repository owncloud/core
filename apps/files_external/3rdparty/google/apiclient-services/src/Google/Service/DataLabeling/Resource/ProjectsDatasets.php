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
 * The "datasets" collection of methods.
 * Typical usage is:
 *  <code>
 *   $datalabelingService = new Google_Service_DataLabeling(...);
 *   $datasets = $datalabelingService->datasets;
 *  </code>
 */
class Google_Service_DataLabeling_Resource_ProjectsDatasets extends Google_Service_Resource
{
  /**
   * Creates dataset. If success return a Dataset resource. (datasets.create)
   *
   * @param string $parent Required. Dataset resource parent, format:
   * projects/{project_id}
   * @param Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1CreateDatasetRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1Dataset
   */
  public function create($parent, Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1CreateDatasetRequest $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1Dataset");
  }
  /**
   * Deletes a dataset by resource name. (datasets.delete)
   *
   * @param string $name Required. Dataset resource name, format:
   * projects/{project_id}/datasets/{dataset_id}
   * @param array $optParams Optional parameters.
   * @return Google_Service_DataLabeling_GoogleProtobufEmpty
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_DataLabeling_GoogleProtobufEmpty");
  }
  /**
   * Exports data and annotations from dataset. (datasets.exportData)
   *
   * @param string $name Required. Dataset resource name, format:
   * projects/{project_id}/datasets/{dataset_id}
   * @param Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1ExportDataRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_DataLabeling_GoogleLongrunningOperation
   */
  public function exportData($name, Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1ExportDataRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('exportData', array($params), "Google_Service_DataLabeling_GoogleLongrunningOperation");
  }
  /**
   * Gets dataset by resource name. (datasets.get)
   *
   * @param string $name Required. Dataset resource name, format:
   * projects/{project_id}/datasets/{dataset_id}
   * @param array $optParams Optional parameters.
   * @return Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1Dataset
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1Dataset");
  }
  /**
   * Imports data into dataset based on source locations defined in request. It
   * can be called multiple times for the same dataset. Each dataset can only have
   * one long running operation running on it. For example, no labeling task (also
   * long running operation) can be started while importing is still ongoing. Vice
   * versa. (datasets.importData)
   *
   * @param string $name Required. Dataset resource name, format:
   * projects/{project_id}/datasets/{dataset_id}
   * @param Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1ImportDataRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_DataLabeling_GoogleLongrunningOperation
   */
  public function importData($name, Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1ImportDataRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('importData', array($params), "Google_Service_DataLabeling_GoogleLongrunningOperation");
  }
  /**
   * Lists datasets under a project. Pagination is supported.
   * (datasets.listProjectsDatasets)
   *
   * @param string $parent Required. Dataset resource parent, format:
   * projects/{project_id}
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Optional. Requested page size. Server may return
   * fewer results than requested. Default value is 100.
   * @opt_param string filter Optional. Filter on dataset is not supported at this
   * moment.
   * @opt_param string pageToken Optional. A token identifying a page of results
   * for the server to return. Typically obtained by
   * ListDatasetsResponse.next_page_token of the previous
   * [DataLabelingService.ListDatasets] call. Returns the first page if empty.
   * @return Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1ListDatasetsResponse
   */
  public function listProjectsDatasets($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1ListDatasetsResponse");
  }
}
