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

namespace Google\Service\CloudDataplex;

class GoogleCloudDataplexV1EntityCompatibilityStatus extends \Google\Model
{
  protected $bigqueryType = GoogleCloudDataplexV1EntityCompatibilityStatusCompatibility::class;
  protected $bigqueryDataType = '';
  protected $hiveMetastoreType = GoogleCloudDataplexV1EntityCompatibilityStatusCompatibility::class;
  protected $hiveMetastoreDataType = '';

  /**
   * @param GoogleCloudDataplexV1EntityCompatibilityStatusCompatibility
   */
  public function setBigquery(GoogleCloudDataplexV1EntityCompatibilityStatusCompatibility $bigquery)
  {
    $this->bigquery = $bigquery;
  }
  /**
   * @return GoogleCloudDataplexV1EntityCompatibilityStatusCompatibility
   */
  public function getBigquery()
  {
    return $this->bigquery;
  }
  /**
   * @param GoogleCloudDataplexV1EntityCompatibilityStatusCompatibility
   */
  public function setHiveMetastore(GoogleCloudDataplexV1EntityCompatibilityStatusCompatibility $hiveMetastore)
  {
    $this->hiveMetastore = $hiveMetastore;
  }
  /**
   * @return GoogleCloudDataplexV1EntityCompatibilityStatusCompatibility
   */
  public function getHiveMetastore()
  {
    return $this->hiveMetastore;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDataplexV1EntityCompatibilityStatus::class, 'Google_Service_CloudDataplex_GoogleCloudDataplexV1EntityCompatibilityStatus');
