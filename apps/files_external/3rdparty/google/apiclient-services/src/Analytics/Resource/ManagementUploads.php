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

namespace Google\Service\Analytics\Resource;

use Google\Service\Analytics\AnalyticsDataimportDeleteUploadDataRequest;
use Google\Service\Analytics\Upload;
use Google\Service\Analytics\Uploads;

/**
 * The "uploads" collection of methods.
 * Typical usage is:
 *  <code>
 *   $analyticsService = new Google\Service\Analytics(...);
 *   $uploads = $analyticsService->uploads;
 *  </code>
 */
class ManagementUploads extends \Google\Service\Resource
{
  /**
   * Delete data associated with a previous upload. (uploads.deleteUploadData)
   *
   * @param string $accountId Account Id for the uploads to be deleted.
   * @param string $webPropertyId Web property Id for the uploads to be deleted.
   * @param string $customDataSourceId Custom data source Id for the uploads to be
   * deleted.
   * @param AnalyticsDataimportDeleteUploadDataRequest $postBody
   * @param array $optParams Optional parameters.
   */
  public function deleteUploadData($accountId, $webPropertyId, $customDataSourceId, AnalyticsDataimportDeleteUploadDataRequest $postBody, $optParams = [])
  {
    $params = ['accountId' => $accountId, 'webPropertyId' => $webPropertyId, 'customDataSourceId' => $customDataSourceId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('deleteUploadData', [$params]);
  }
  /**
   * List uploads to which the user has access. (uploads.get)
   *
   * @param string $accountId Account Id for the upload to retrieve.
   * @param string $webPropertyId Web property Id for the upload to retrieve.
   * @param string $customDataSourceId Custom data source Id for upload to
   * retrieve.
   * @param string $uploadId Upload Id to retrieve.
   * @param array $optParams Optional parameters.
   * @return Upload
   */
  public function get($accountId, $webPropertyId, $customDataSourceId, $uploadId, $optParams = [])
  {
    $params = ['accountId' => $accountId, 'webPropertyId' => $webPropertyId, 'customDataSourceId' => $customDataSourceId, 'uploadId' => $uploadId];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Upload::class);
  }
  /**
   * List uploads to which the user has access. (uploads.listManagementUploads)
   *
   * @param string $accountId Account Id for the uploads to retrieve.
   * @param string $webPropertyId Web property Id for the uploads to retrieve.
   * @param string $customDataSourceId Custom data source Id for uploads to
   * retrieve.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int max-results The maximum number of uploads to include in this
   * response.
   * @opt_param int start-index A 1-based index of the first upload to retrieve.
   * Use this parameter as a pagination mechanism along with the max-results
   * parameter.
   * @return Uploads
   */
  public function listManagementUploads($accountId, $webPropertyId, $customDataSourceId, $optParams = [])
  {
    $params = ['accountId' => $accountId, 'webPropertyId' => $webPropertyId, 'customDataSourceId' => $customDataSourceId];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], Uploads::class);
  }
  /**
   * Upload data for a custom data source. (uploads.uploadData)
   *
   * @param string $accountId Account Id associated with the upload.
   * @param string $webPropertyId Web property UA-string associated with the
   * upload.
   * @param string $customDataSourceId Custom data source Id to which the data
   * being uploaded belongs.
   * @param array $optParams Optional parameters.
   * @return Upload
   */
  public function uploadData($accountId, $webPropertyId, $customDataSourceId, $optParams = [])
  {
    $params = ['accountId' => $accountId, 'webPropertyId' => $webPropertyId, 'customDataSourceId' => $customDataSourceId];
    $params = array_merge($params, $optParams);
    return $this->call('uploadData', [$params], Upload::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ManagementUploads::class, 'Google_Service_Analytics_Resource_ManagementUploads');
