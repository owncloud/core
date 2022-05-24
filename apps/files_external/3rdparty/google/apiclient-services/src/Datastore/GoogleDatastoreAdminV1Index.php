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

class GoogleDatastoreAdminV1Index extends \Google\Collection
{
  protected $collection_key = 'properties';
  /**
   * @var string
   */
  public $ancestor;
  /**
   * @var string
   */
  public $indexId;
  /**
   * @var string
   */
  public $kind;
  /**
   * @var string
   */
  public $projectId;
  protected $propertiesType = GoogleDatastoreAdminV1IndexedProperty::class;
  protected $propertiesDataType = 'array';
  /**
   * @var string
   */
  public $state;

  /**
   * @param string
   */
  public function setAncestor($ancestor)
  {
    $this->ancestor = $ancestor;
  }
  /**
   * @return string
   */
  public function getAncestor()
  {
    return $this->ancestor;
  }
  /**
   * @param string
   */
  public function setIndexId($indexId)
  {
    $this->indexId = $indexId;
  }
  /**
   * @return string
   */
  public function getIndexId()
  {
    return $this->indexId;
  }
  /**
   * @param string
   */
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  /**
   * @return string
   */
  public function getKind()
  {
    return $this->kind;
  }
  /**
   * @param string
   */
  public function setProjectId($projectId)
  {
    $this->projectId = $projectId;
  }
  /**
   * @return string
   */
  public function getProjectId()
  {
    return $this->projectId;
  }
  /**
   * @param GoogleDatastoreAdminV1IndexedProperty[]
   */
  public function setProperties($properties)
  {
    $this->properties = $properties;
  }
  /**
   * @return GoogleDatastoreAdminV1IndexedProperty[]
   */
  public function getProperties()
  {
    return $this->properties;
  }
  /**
   * @param string
   */
  public function setState($state)
  {
    $this->state = $state;
  }
  /**
   * @return string
   */
  public function getState()
  {
    return $this->state;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleDatastoreAdminV1Index::class, 'Google_Service_Datastore_GoogleDatastoreAdminV1Index');
