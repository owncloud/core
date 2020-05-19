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
 * The "entries" collection of methods.
 * Typical usage is:
 *  <code>
 *   $datacatalogService = new Google_Service_DataCatalog(...);
 *   $entries = $datacatalogService->entries;
 *  </code>
 */
class Google_Service_DataCatalog_Resource_Entries extends Google_Service_Resource
{
  /**
   * Get an entry by target resource name. This method allows clients to use the
   * resource name from the source Google Cloud Platform service to get the Data
   * Catalog Entry. (entries.lookup)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string linkedResource The full name of the Google Cloud Platform
   * resource the Data Catalog entry represents. See:
   * https://cloud.google.com/apis/design/resource_names#full_resource_name. Full
   * names are case-sensitive.
   *
   * Examples:
   *
   * //bigquery.googleapis.com/projects/projectId/datasets/datasetId/tables/tableI
   * d //pubsub.googleapis.com/projects/projectId/topics/topicId
   * @opt_param string sqlResource The SQL name of the entry. SQL names are case-
   * sensitive.
   *
   * Examples:
   *
   *   * `pubsub.project_id.topic_id`   * ``pubsub.project_id.`topic.id.with.dots`
   * ``   * `bigquery.table.project_id.dataset_id.table_id`   *
   * `bigquery.dataset.project_id.dataset_id`   *
   * `datacatalog.entry.project_id.location_id.entry_group_id.entry_id`
   *
   * `*_id`s shoud satisfy the standard SQL rules for identifiers.
   * https://cloud.google.com/bigquery/docs/reference/standard-sql/lexical.
   * @return Google_Service_DataCatalog_GoogleCloudDatacatalogV1beta1Entry
   */
  public function lookup($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('lookup', array($params), "Google_Service_DataCatalog_GoogleCloudDatacatalogV1beta1Entry");
  }
}
