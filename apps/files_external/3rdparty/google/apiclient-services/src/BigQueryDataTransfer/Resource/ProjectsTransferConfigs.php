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

namespace Google\Service\BigQueryDataTransfer\Resource;

use Google\Service\BigQueryDataTransfer\BigquerydatatransferEmpty;
use Google\Service\BigQueryDataTransfer\ListTransferConfigsResponse;
use Google\Service\BigQueryDataTransfer\ScheduleTransferRunsRequest;
use Google\Service\BigQueryDataTransfer\ScheduleTransferRunsResponse;
use Google\Service\BigQueryDataTransfer\StartManualTransferRunsRequest;
use Google\Service\BigQueryDataTransfer\StartManualTransferRunsResponse;
use Google\Service\BigQueryDataTransfer\TransferConfig;

/**
 * The "transferConfigs" collection of methods.
 * Typical usage is:
 *  <code>
 *   $bigquerydatatransferService = new Google\Service\BigQueryDataTransfer(...);
 *   $transferConfigs = $bigquerydatatransferService->transferConfigs;
 *  </code>
 */
class ProjectsTransferConfigs extends \Google\Service\Resource
{
  /**
   * Creates a new data transfer configuration. (transferConfigs.create)
   *
   * @param string $parent Required. The BigQuery project id where the transfer
   * configuration should be created. Must be in the format
   * projects/{project_id}/locations/{location_id} or projects/{project_id}. If
   * specified location and location of the destination bigquery dataset do not
   * match - the request will fail.
   * @param TransferConfig $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string authorizationCode Optional OAuth2 authorization code to use
   * with this transfer configuration. This is required only if
   * `transferConfig.dataSourceId` is 'youtube_channel' and new credentials are
   * needed, as indicated by `CheckValidCreds`. In order to obtain
   * authorization_code, make a request to the following URL: https://www.gstatic.
   * com/bigquerydatatransfer/oauthz/auth?redirect_uri=urn:ietf:wg:oauth:2.0:oob_t
   * ype=authorization_code_id=client_id=data_source_scopes * The client_id is the
   * OAuth client_id of the a data source as returned by ListDataSources method. *
   * data_source_scopes are the scopes returned by ListDataSources method. Note
   * that this should not be set when `service_account_name` is used to create the
   * transfer config.
   * @opt_param string serviceAccountName Optional service account name. If this
   * field is set, the transfer config will be created with this service account's
   * credentials. It requires that the requesting user calling this API has
   * permissions to act as this service account. Note that not all data sources
   * support service account credentials when creating a transfer config. For the
   * latest list of data sources, read about [using service
   * accounts](https://cloud.google.com/bigquery-transfer/docs/use-service-
   * accounts).
   * @opt_param string versionInfo Optional version info. This is required only if
   * `transferConfig.dataSourceId` is not 'youtube_channel' and new credentials
   * are needed, as indicated by `CheckValidCreds`. In order to obtain version
   * info, make a request to the following URL: https://www.gstatic.com/bigqueryda
   * tatransfer/oauthz/auth?redirect_uri=urn:ietf:wg:oauth:2.0:oob_type=version_in
   * fo_id=client_id=data_source_scopes * The client_id is the OAuth client_id of
   * the a data source as returned by ListDataSources method. * data_source_scopes
   * are the scopes returned by ListDataSources method. Note that this should not
   * be set when `service_account_name` is used to create the transfer config.
   * @return TransferConfig
   */
  public function create($parent, TransferConfig $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], TransferConfig::class);
  }
  /**
   * Deletes a data transfer configuration, including any associated transfer runs
   * and logs. (transferConfigs.delete)
   *
   * @param string $name Required. The field will contain name of the resource
   * requested, for example: `projects/{project_id}/transferConfigs/{config_id}`
   * or
   * `projects/{project_id}/locations/{location_id}/transferConfigs/{config_id}`
   * @param array $optParams Optional parameters.
   * @return BigquerydatatransferEmpty
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], BigquerydatatransferEmpty::class);
  }
  /**
   * Returns information about a data transfer config. (transferConfigs.get)
   *
   * @param string $name Required. The field will contain name of the resource
   * requested, for example: `projects/{project_id}/transferConfigs/{config_id}`
   * or
   * `projects/{project_id}/locations/{location_id}/transferConfigs/{config_id}`
   * @param array $optParams Optional parameters.
   * @return TransferConfig
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], TransferConfig::class);
  }
  /**
   * Returns information about all transfer configs owned by a project in the
   * specified location. (transferConfigs.listProjectsTransferConfigs)
   *
   * @param string $parent Required. The BigQuery project id for which transfer
   * configs should be returned: `projects/{project_id}` or
   * `projects/{project_id}/locations/{location_id}`
   * @param array $optParams Optional parameters.
   *
   * @opt_param string dataSourceIds When specified, only configurations of
   * requested data sources are returned.
   * @opt_param int pageSize Page size. The default page size is the maximum value
   * of 1000 results.
   * @opt_param string pageToken Pagination token, which can be used to request a
   * specific page of `ListTransfersRequest` list results. For multiple-page
   * results, `ListTransfersResponse` outputs a `next_page` token, which can be
   * used as the `page_token` value to request the next page of list results.
   * @return ListTransferConfigsResponse
   */
  public function listProjectsTransferConfigs($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListTransferConfigsResponse::class);
  }
  /**
   * Updates a data transfer configuration. All fields must be set, even if they
   * are not updated. (transferConfigs.patch)
   *
   * @param string $name The resource name of the transfer config. Transfer config
   * names have the form
   * `projects/{project_id}/locations/{region}/transferConfigs/{config_id}`. Where
   * `config_id` is usually a uuid, even though it is not guaranteed or required.
   * The name is ignored when creating a transfer config.
   * @param TransferConfig $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string authorizationCode Optional OAuth2 authorization code to use
   * with this transfer configuration. This is required only if
   * `transferConfig.dataSourceId` is 'youtube_channel' and new credentials are
   * needed, as indicated by `CheckValidCreds`. In order to obtain
   * authorization_code, make a request to the following URL: https://www.gstatic.
   * com/bigquerydatatransfer/oauthz/auth?redirect_uri=urn:ietf:wg:oauth:2.0:oob_t
   * ype=authorization_code_id=client_id=data_source_scopes * The client_id is the
   * OAuth client_id of the a data source as returned by ListDataSources method. *
   * data_source_scopes are the scopes returned by ListDataSources method. Note
   * that this should not be set when `service_account_name` is used to update the
   * transfer config.
   * @opt_param string serviceAccountName Optional service account name. If this
   * field is set, the transfer config will be created with this service account's
   * credentials. It requires that the requesting user calling this API has
   * permissions to act as this service account. Note that not all data sources
   * support service account credentials when creating a transfer config. For the
   * latest list of data sources, read about [using service
   * accounts](https://cloud.google.com/bigquery-transfer/docs/use-service-
   * accounts).
   * @opt_param string updateMask Required. Required list of fields to be updated
   * in this request.
   * @opt_param string versionInfo Optional version info. This is required only if
   * `transferConfig.dataSourceId` is not 'youtube_channel' and new credentials
   * are needed, as indicated by `CheckValidCreds`. In order to obtain version
   * info, make a request to the following URL: https://www.gstatic.com/bigqueryda
   * tatransfer/oauthz/auth?redirect_uri=urn:ietf:wg:oauth:2.0:oob_type=version_in
   * fo_id=client_id=data_source_scopes * The client_id is the OAuth client_id of
   * the a data source as returned by ListDataSources method. * data_source_scopes
   * are the scopes returned by ListDataSources method. Note that this should not
   * be set when `service_account_name` is used to update the transfer config.
   * @return TransferConfig
   */
  public function patch($name, TransferConfig $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], TransferConfig::class);
  }
  /**
   * Creates transfer runs for a time range [start_time, end_time]. For each date
   * - or whatever granularity the data source supports - in the range, one
   * transfer run is created. Note that runs are created per UTC time in the time
   * range. DEPRECATED: use StartManualTransferRuns instead.
   * (transferConfigs.scheduleRuns)
   *
   * @param string $parent Required. Transfer configuration name in the form:
   * `projects/{project_id}/transferConfigs/{config_id}` or
   * `projects/{project_id}/locations/{location_id}/transferConfigs/{config_id}`.
   * @param ScheduleTransferRunsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return ScheduleTransferRunsResponse
   */
  public function scheduleRuns($parent, ScheduleTransferRunsRequest $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('scheduleRuns', [$params], ScheduleTransferRunsResponse::class);
  }
  /**
   * Start manual transfer runs to be executed now with schedule_time equal to
   * current time. The transfer runs can be created for a time range where the
   * run_time is between start_time (inclusive) and end_time (exclusive), or for a
   * specific run_time. (transferConfigs.startManualRuns)
   *
   * @param string $parent Transfer configuration name in the form:
   * `projects/{project_id}/transferConfigs/{config_id}` or
   * `projects/{project_id}/locations/{location_id}/transferConfigs/{config_id}`.
   * @param StartManualTransferRunsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return StartManualTransferRunsResponse
   */
  public function startManualRuns($parent, StartManualTransferRunsRequest $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('startManualRuns', [$params], StartManualTransferRunsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsTransferConfigs::class, 'Google_Service_BigQueryDataTransfer_Resource_ProjectsTransferConfigs');
