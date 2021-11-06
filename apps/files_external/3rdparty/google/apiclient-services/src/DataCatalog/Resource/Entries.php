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

namespace Google\Service\DataCatalog\Resource;

use Google\Service\DataCatalog\GoogleCloudDatacatalogV1Entry;

/**
 * The "entries" collection of methods.
 * Typical usage is:
 *  <code>
 *   $datacatalogService = new Google\Service\DataCatalog(...);
 *   $entries = $datacatalogService->entries;
 *  </code>
 */
class Entries extends \Google\Service\Resource
{
  /**
   * Gets an entry by its target resource name. The resource name comes from the
   * source Google Cloud Platform service. (entries.lookup)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string fullyQualifiedName Fully qualified name (FQN) of the
   * resource. FQNs take two forms: * For non-regionalized resources:
   * `{SYSTEM}:{PROJECT}.{PATH_TO_RESOURCE_SEPARATED_WITH_DOTS}` * For
   * regionalized resources:
   * `{SYSTEM}:{PROJECT}.{LOCATION_ID}.{PATH_TO_RESOURCE_SEPARATED_WITH_DOTS}`
   * Example for a DPMS table: `dataproc_metastore:{PROJECT_ID}.{LOCATION_ID}.{INS
   * TANCE_ID}.{DATABASE_ID}.{TABLE_ID}`
   * @opt_param string linkedResource The full name of the Google Cloud Platform
   * resource the Data Catalog entry represents. For more information, see [Full
   * Resource Name]
   * (https://cloud.google.com/apis/design/resource_names#full_resource_name).
   * Full names are case-sensitive. For example: * `//bigquery.googleapis.com/proj
   * ects/{PROJECT_ID}/datasets/{DATASET_ID}/tables/{TABLE_ID}` *
   * `//pubsub.googleapis.com/projects/{PROJECT_ID}/topics/{TOPIC_ID}`
   * @opt_param string sqlResource The SQL name of the entry. SQL names are case-
   * sensitive. Examples: * `pubsub.topic.{PROJECT_ID}.{TOPIC_ID}` *
   * `pubsub.topic.{PROJECT_ID}.`\``{TOPIC.ID.SEPARATED.WITH.DOTS}`\` *
   * `bigquery.table.{PROJECT_ID}.{DATASET_ID}.{TABLE_ID}` *
   * `bigquery.dataset.{PROJECT_ID}.{DATASET_ID}` *
   * `datacatalog.entry.{PROJECT_ID}.{LOCATION_ID}.{ENTRY_GROUP_ID}.{ENTRY_ID}`
   * Identifiers (`*_ID`) should comply with the [Lexical structure in Standard
   * SQL] (https://cloud.google.com/bigquery/docs/reference/standard-sql/lexical).
   * @return GoogleCloudDatacatalogV1Entry
   */
  public function lookup($optParams = [])
  {
    $params = [];
    $params = array_merge($params, $optParams);
    return $this->call('lookup', [$params], GoogleCloudDatacatalogV1Entry::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Entries::class, 'Google_Service_DataCatalog_Resource_Entries');
