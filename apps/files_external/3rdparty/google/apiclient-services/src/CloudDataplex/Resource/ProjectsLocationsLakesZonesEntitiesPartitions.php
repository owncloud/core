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

namespace Google\Service\CloudDataplex\Resource;

use Google\Service\CloudDataplex\DataplexEmpty;
use Google\Service\CloudDataplex\GoogleCloudDataplexV1ListPartitionsResponse;
use Google\Service\CloudDataplex\GoogleCloudDataplexV1Partition;

/**
 * The "partitions" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dataplexService = new Google\Service\CloudDataplex(...);
 *   $partitions = $dataplexService->partitions;
 *  </code>
 */
class ProjectsLocationsLakesZonesEntitiesPartitions extends \Google\Service\Resource
{
  /**
   * Create a metadata partition. (partitions.create)
   *
   * @param string $parent Required. The resource name of the parent zone: project
   * s/{project_number}/locations/{location_id}/lakes/{lake_id}/zones/{zone_id}/en
   * tities/{entity_id}.
   * @param GoogleCloudDataplexV1Partition $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool validateOnly Optional. Only validate the request, but do not
   * perform mutations. The default is false.
   * @return GoogleCloudDataplexV1Partition
   */
  public function create($parent, GoogleCloudDataplexV1Partition $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], GoogleCloudDataplexV1Partition::class);
  }
  /**
   * Delete a metadata partition. (partitions.delete)
   *
   * @param string $name Required. The resource name of the partition. format: pro
   * jects/{project_number}/locations/{location_id}/lakes/{lake_id}/zones/{zone_id
   * }/entities/{entity_id}/partitions/{partition_value_path}. The
   * {partition_value_path} segment consists of an ordered sequence of partition
   * values separated by "/". All values must be provided.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string etag Optional. The etag associated with the partition.
   * @return DataplexEmpty
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], DataplexEmpty::class);
  }
  /**
   * Get a metadata partition of an entity. (partitions.get)
   *
   * @param string $name Required. The resource name of the partition: projects/{p
   * roject_number}/locations/{location_id}/lakes/{lake_id}/zones/{zone_id}/entiti
   * es/{entity_id}/partitions/{partition_value_path}. The {partition_value_path}
   * segment consists of an ordered sequence of partition values separated by "/".
   * All values must be provided.
   * @param array $optParams Optional parameters.
   * @return GoogleCloudDataplexV1Partition
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], GoogleCloudDataplexV1Partition::class);
  }
  /**
   * List metadata partitions of an entity.
   * (partitions.listProjectsLocationsLakesZonesEntitiesPartitions)
   *
   * @param string $parent Required. The resource name of the parent entity: proje
   * cts/{project_number}/locations/{location_id}/lakes/{lake_id}/zones/{zone_id}/
   * entities/{entity_id}.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Optional. Filter the partitions returned to the
   * caller using a key value pair expression. Supported operators and syntax:
   * logic operators: AND, OR comparison operators: <, >, >=, <= ,=, != LIKE
   * operators: The right hand of a LIKE operator supports "." and "*" for
   * wildcard searches, for example "value1 LIKE ".*oo.*" parenthetical grouping:
   * ( )Sample filter expression: `?filter="key1 < value1 OR key2 > value2"Notes:
   * Keys to the left of operators are case insensitive. Partition results are
   * sorted first by creation time, then by lexicographic order. Up to 20 key
   * value filter pairs are allowed, but due to performance considerations, only
   * the first 10 will be used as a filter.
   * @opt_param int pageSize Optional. Maximum number of partitions to return. The
   * service may return fewer than this value. If unspecified, 100 partitions will
   * be returned by default. The maximum page size is 500; larger values will will
   * be truncated to 500.
   * @opt_param string pageToken Optional. Page token received from a previous
   * ListPartitions call. Provide this to retrieve the subsequent page. When
   * paginating, all other parameters provided to ListPartitions must match the
   * call that provided the page token.
   * @return GoogleCloudDataplexV1ListPartitionsResponse
   */
  public function listProjectsLocationsLakesZonesEntitiesPartitions($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], GoogleCloudDataplexV1ListPartitionsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsLakesZonesEntitiesPartitions::class, 'Google_Service_CloudDataplex_Resource_ProjectsLocationsLakesZonesEntitiesPartitions');
