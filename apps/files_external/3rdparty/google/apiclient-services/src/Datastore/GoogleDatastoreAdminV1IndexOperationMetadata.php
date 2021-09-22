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

namespace Google\Service\Datastore;

class GoogleDatastoreAdminV1IndexOperationMetadata extends \Google\Model
{
  protected $commonType = GoogleDatastoreAdminV1CommonMetadata::class;
  protected $commonDataType = '';
  public $indexId;
  protected $progressEntitiesType = GoogleDatastoreAdminV1Progress::class;
  protected $progressEntitiesDataType = '';

  /**
   * @param GoogleDatastoreAdminV1CommonMetadata
   */
  public function setCommon(GoogleDatastoreAdminV1CommonMetadata $common)
  {
    $this->common = $common;
  }
  /**
   * @return GoogleDatastoreAdminV1CommonMetadata
   */
  public function getCommon()
  {
    return $this->common;
  }
  public function setIndexId($indexId)
  {
    $this->indexId = $indexId;
  }
  public function getIndexId()
  {
    return $this->indexId;
  }
  /**
   * @param GoogleDatastoreAdminV1Progress
   */
  public function setProgressEntities(GoogleDatastoreAdminV1Progress $progressEntities)
  {
    $this->progressEntities = $progressEntities;
  }
  /**
   * @return GoogleDatastoreAdminV1Progress
   */
  public function getProgressEntities()
  {
    return $this->progressEntities;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleDatastoreAdminV1IndexOperationMetadata::class, 'Google_Service_Datastore_GoogleDatastoreAdminV1IndexOperationMetadata');
