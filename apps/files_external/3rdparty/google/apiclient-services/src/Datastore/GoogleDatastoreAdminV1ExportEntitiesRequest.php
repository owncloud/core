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

class GoogleDatastoreAdminV1ExportEntitiesRequest extends \Google\Model
{
  protected $entityFilterType = GoogleDatastoreAdminV1EntityFilter::class;
  protected $entityFilterDataType = '';
  public $labels;
  public $outputUrlPrefix;

  /**
   * @param GoogleDatastoreAdminV1EntityFilter
   */
  public function setEntityFilter(GoogleDatastoreAdminV1EntityFilter $entityFilter)
  {
    $this->entityFilter = $entityFilter;
  }
  /**
   * @return GoogleDatastoreAdminV1EntityFilter
   */
  public function getEntityFilter()
  {
    return $this->entityFilter;
  }
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  public function getLabels()
  {
    return $this->labels;
  }
  public function setOutputUrlPrefix($outputUrlPrefix)
  {
    $this->outputUrlPrefix = $outputUrlPrefix;
  }
  public function getOutputUrlPrefix()
  {
    return $this->outputUrlPrefix;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleDatastoreAdminV1ExportEntitiesRequest::class, 'Google_Service_Datastore_GoogleDatastoreAdminV1ExportEntitiesRequest');
