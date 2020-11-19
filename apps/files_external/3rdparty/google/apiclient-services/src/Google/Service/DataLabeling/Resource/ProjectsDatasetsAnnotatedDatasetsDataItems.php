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
 * The "dataItems" collection of methods.
 * Typical usage is:
 *  <code>
 *   $datalabelingService = new Google_Service_DataLabeling(...);
 *   $dataItems = $datalabelingService->dataItems;
 *  </code>
 */
class Google_Service_DataLabeling_Resource_ProjectsDatasetsAnnotatedDatasetsDataItems extends Google_Service_Resource
{
  /**
   * Gets a data item in a dataset by resource name. This API can be called after
   * data are imported into dataset. (dataItems.get)
   *
   * @param string $name Required. The name of the data item to get, format:
   * projects/{project_id}/datasets/{dataset_id}/dataItems/{data_item_id}
   * @param array $optParams Optional parameters.
   * @return Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1DataItem
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1DataItem");
  }
  /**
   * Lists data items in a dataset. This API can be called after data are imported
   * into dataset. Pagination is supported.
   * (dataItems.listProjectsDatasetsAnnotatedDatasetsDataItems)
   *
   * @param string $parent Required. Name of the dataset to list data items,
   * format: projects/{project_id}/datasets/{dataset_id}
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Optional. Requested page size. Server may return
   * fewer results than requested. Default value is 100.
   * @opt_param string pageToken Optional. A token identifying a page of results
   * for the server to return. Typically obtained by
   * ListDataItemsResponse.next_page_token of the previous
   * [DataLabelingService.ListDataItems] call. Return first page if empty.
   * @opt_param string filter Optional. Filter is not supported at this moment.
   * @return Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1ListDataItemsResponse
   */
  public function listProjectsDatasetsAnnotatedDatasetsDataItems($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1ListDataItemsResponse");
  }
}
