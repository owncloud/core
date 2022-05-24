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

namespace Google\Service\Apigee;

class GoogleCloudApigeeV1SharedFlow extends \Google\Collection
{
  protected $collection_key = 'revision';
  /**
   * @var string
   */
  public $latestRevisionId;
  protected $metaDataType = GoogleCloudApigeeV1EntityMetadata::class;
  protected $metaDataDataType = '';
  /**
   * @var string
   */
  public $name;
  /**
   * @var string[]
   */
  public $revision;

  /**
   * @param string
   */
  public function setLatestRevisionId($latestRevisionId)
  {
    $this->latestRevisionId = $latestRevisionId;
  }
  /**
   * @return string
   */
  public function getLatestRevisionId()
  {
    return $this->latestRevisionId;
  }
  /**
   * @param GoogleCloudApigeeV1EntityMetadata
   */
  public function setMetaData(GoogleCloudApigeeV1EntityMetadata $metaData)
  {
    $this->metaData = $metaData;
  }
  /**
   * @return GoogleCloudApigeeV1EntityMetadata
   */
  public function getMetaData()
  {
    return $this->metaData;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param string[]
   */
  public function setRevision($revision)
  {
    $this->revision = $revision;
  }
  /**
   * @return string[]
   */
  public function getRevision()
  {
    return $this->revision;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudApigeeV1SharedFlow::class, 'Google_Service_Apigee_GoogleCloudApigeeV1SharedFlow');
