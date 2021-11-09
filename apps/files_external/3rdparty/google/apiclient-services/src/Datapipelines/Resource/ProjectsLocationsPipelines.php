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

namespace Google\Service\Datapipelines\Resource;

use Google\Service\Datapipelines\GoogleCloudDatapipelinesV1Pipeline;
use Google\Service\Datapipelines\GoogleCloudDatapipelinesV1RunPipelineRequest;
use Google\Service\Datapipelines\GoogleCloudDatapipelinesV1RunPipelineResponse;
use Google\Service\Datapipelines\GoogleCloudDatapipelinesV1StopPipelineRequest;
use Google\Service\Datapipelines\GoogleProtobufEmpty;

/**
 * The "pipelines" collection of methods.
 * Typical usage is:
 *  <code>
 *   $datapipelinesService = new Google\Service\Datapipelines(...);
 *   $pipelines = $datapipelinesService->pipelines;
 *  </code>
 */
class ProjectsLocationsPipelines extends \Google\Service\Resource
{
  /**
   * Creates a pipeline. For a batch pipeline, you can pass scheduler information.
   * Data Pipelines uses the scheduler information to create an internal scheduler
   * that runs jobs periodically. If the internal scheduler is not configured, you
   * can use RunPipeline to run jobs. (pipelines.create)
   *
   * @param string $parent Required. The location name. For example:
   * `projects/PROJECT_ID/locations/LOCATION_ID`.
   * @param GoogleCloudDatapipelinesV1Pipeline $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleCloudDatapipelinesV1Pipeline
   */
  public function create($parent, GoogleCloudDatapipelinesV1Pipeline $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], GoogleCloudDatapipelinesV1Pipeline::class);
  }
  /**
   * Deletes a pipeline. If a scheduler job is attached to the pipeline, it will
   * be deleted. (pipelines.delete)
   *
   * @param string $name Required. The pipeline name. For example:
   * `projects/PROJECT_ID/locations/LOCATION_ID/pipelines/PIPELINE_ID`.
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
   * Looks up a single pipeline. Returns a "NOT_FOUND" error if no such pipeline
   * exists. Returns a "FORBIDDEN" error if the caller doesn't have permission to
   * access it. (pipelines.get)
   *
   * @param string $name Required. The pipeeline name. For example:
   * `projects/PROJECT_ID/locations/LOCATION_ID/pipelines/PIPELINE_ID`.
   * @param array $optParams Optional parameters.
   * @return GoogleCloudDatapipelinesV1Pipeline
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], GoogleCloudDatapipelinesV1Pipeline::class);
  }
  /**
   * Updates a pipeline. If successful, the updated [Pipeline] is returned.
   * Returns `NOT_FOUND` if the pipeline doesn't exist. If UpdatePipeline does not
   * return successfully, you can retry the UpdatePipeline request until you
   * receive a successful response. (pipelines.patch)
   *
   * @param string $name The pipeline name. For example:
   * `projects/PROJECT_ID/locations/LOCATION_ID/pipelines/PIPELINE_ID`. *
   * `PROJECT_ID` can contain letters ([A-Za-z]), numbers ([0-9]), hyphens (-),
   * colons (:), and periods (.). For more information, see [Identifying
   * projects](https://cloud.google.com/resource-manager/docs/creating-managing-
   * projects#identifying_projects) * `LOCATION_ID` is the canonical ID for the
   * pipeline's location. The list of available locations can be obtained by
   * calling ListLocations. Note that the Data Pipelines service is not available
   * in all regions. It depends on Cloud Scheduler, an App Engine application, so
   * it's only available in [App Engine
   * regions](https://cloud.google.com/about/locations#region). * `PIPELINE_ID` is
   * the ID of the pipeline. Must be unique for the selected project and location.
   * @param GoogleCloudDatapipelinesV1Pipeline $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask The list of fields to be updated.
   * @return GoogleCloudDatapipelinesV1Pipeline
   */
  public function patch($name, GoogleCloudDatapipelinesV1Pipeline $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], GoogleCloudDatapipelinesV1Pipeline::class);
  }
  /**
   * Creates a job for the specified pipeline directly. You can use this method
   * when the internal scheduler is not configured and you want to trigger the job
   * directly or through an external system. Returns a "NOT_FOUND" error if the
   * pipeline doesn't exist. Returns a "FOBIDDEN" error if the user doesn't have
   * permission to access the pipeline or run jobs for the pipeline.
   * (pipelines.run)
   *
   * @param string $name Required. The pipeline name. For example:
   * `projects/PROJECT_ID/locations/LOCATION_ID/pipelines/PIPELINE_ID`.
   * @param GoogleCloudDatapipelinesV1RunPipelineRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleCloudDatapipelinesV1RunPipelineResponse
   */
  public function run($name, GoogleCloudDatapipelinesV1RunPipelineRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('run', [$params], GoogleCloudDatapipelinesV1RunPipelineResponse::class);
  }
  /**
   * Freezes pipeline execution permanently. If there's a corresponding scheduler
   * entry, it's deleted, and the pipeline state is changed to "ARCHIVED".
   * However, pipeline metadata is retained. Upon success, the pipeline state is
   * updated to ARCHIVED. (pipelines.stop)
   *
   * @param string $name Required. The pipeline name. For example:
   * `projects/PROJECT_ID/locations/LOCATION_ID/pipelines/PIPELINE_ID`.
   * @param GoogleCloudDatapipelinesV1StopPipelineRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleCloudDatapipelinesV1Pipeline
   */
  public function stop($name, GoogleCloudDatapipelinesV1StopPipelineRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('stop', [$params], GoogleCloudDatapipelinesV1Pipeline::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsPipelines::class, 'Google_Service_Datapipelines_Resource_ProjectsLocationsPipelines');
