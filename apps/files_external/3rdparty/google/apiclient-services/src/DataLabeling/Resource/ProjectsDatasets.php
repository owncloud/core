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

namespace Google\Service\DataLabeling\Resource;

use Google\Service\DataLabeling\GoogleCloudDatalabelingV1beta1CreateDatasetRequest;
use Google\Service\DataLabeling\GoogleCloudDatalabelingV1beta1Dataset;
use Google\Service\DataLabeling\GoogleCloudDatalabelingV1beta1ExportDataRequest;
use Google\Service\DataLabeling\GoogleCloudDatalabelingV1beta1ImportDataRequest;
use Google\Service\DataLabeling\GoogleCloudDatalabelingV1beta1ListDatasetsResponse;
use Google\Service\DataLabeling\GoogleLongrunningOperation;
use Google\Service\DataLabeling\GoogleProtobufEmpty;

/**
 * The "datasets" collection of methods.
 * Typical usage is:
 *  <code>
 *   $datalabelingService = new Google\Service\DataLabeling(...);
 *   $datasets = $datalabelingService->datasets;
 *  </code>
 */
class ProjectsDatasets extends \Google\Service\Resource
{
  /**
   * Creates dataset. If success return a Dataset resource. (datasets.create)
   *
   * @param string $parent Required. Dataset resource parent, format:
   * projects/{project_id}
   * @param GoogleCloudDatalabelingV1beta1CreateDatasetRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleCloudDatalabelingV1beta1Dataset
   */
  public function create($parent, GoogleCloudDatalabelingV1beta1CreateDatasetRequest $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], GoogleCloudDatalabelingV1beta1Dataset::class);
  }
  /**
   * Deletes a dataset by resource name. (datasets.delete)
   *
   * @param string $name Required. Dataset resource name, format:
   * projects/{project_id}/datasets/{dataset_id}
   * @param array $optParams Optional parameters.
   * @return GoogleProtobufEmpty
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], GoogleProtobufEmpty::class);
  }
  /**
   * Exports data and annotations from dataset. (datasets.exportData)
   *
   * @param string $name Required. Dataset resource name, format:
   * projects/{project_id}/datasets/{dataset_id}
   * @param GoogleCloudDatalabelingV1beta1ExportDataRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleLongrunningOperation
   */
  public function exportData($name, GoogleCloudDatalabelingV1beta1ExportDataRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('exportData', [$params], GoogleLongrunningOperation::class);
  }
  /**
   * Gets dataset by resource name. (datasets.get)
   *
   * @param string $name Required. Dataset resource name, format:
   * projects/{project_id}/datasets/{dataset_id}
   * @param array $optParams Optional parameters.
   * @return GoogleCloudDatalabelingV1beta1Dataset
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], GoogleCloudDatalabelingV1beta1Dataset::class);
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
   * @param GoogleCloudDatalabelingV1beta1ImportDataRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleLongrunningOperation
   */
  public function importData($name, GoogleCloudDatalabelingV1beta1ImportDataRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('importData', [$params], GoogleLongrunningOperation::class);
  }
  /**
   * Lists datasets under a project. Pagination is supported.
   * (datasets.listProjectsDatasets)
   *
   * @param string $parent Required. Dataset resource parent, format:
   * projects/{project_id}
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Optional. Filter on dataset is not supported at this
   * moment.
   * @opt_param int pageSize Optional. Requested page size. Server may return
   * fewer results than requested. Default value is 100.
   * @opt_param string pageToken Optional. A token identifying a page of results
   * for the server to return. Typically obtained by
   * ListDatasetsResponse.next_page_token of the previous
   * [DataLabelingService.ListDatasets] call. Returns the first page if empty.
   * @return GoogleCloudDatalabelingV1beta1ListDatasetsResponse
   */
  public function listProjectsDatasets($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], GoogleCloudDatalabelingV1beta1ListDatasetsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsDatasets::class, 'Google_Service_DataLabeling_Resource_ProjectsDatasets');
