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

class GoogleCloudDataplexV1Entity extends \Google\Model
{
  /**
   * @var string
   */
  public $asset;
  /**
   * @var string
   */
  public $catalogEntry;
  protected $compatibilityType = GoogleCloudDataplexV1EntityCompatibilityStatus::class;
  protected $compatibilityDataType = '';
  /**
   * @var string
   */
  public $createTime;
  /**
   * @var string
   */
  public $dataPath;
  /**
   * @var string
   */
  public $dataPathPattern;
  /**
   * @var string
   */
  public $description;
  /**
   * @var string
   */
  public $displayName;
  /**
   * @var string
   */
  public $etag;
  protected $formatType = GoogleCloudDataplexV1StorageFormat::class;
  protected $formatDataType = '';
  /**
   * @var string
   */
  public $id;
  /**
   * @var string
   */
  public $name;
  protected $schemaType = GoogleCloudDataplexV1Schema::class;
  protected $schemaDataType = '';
  /**
   * @var string
   */
  public $system;
  /**
   * @var string
   */
  public $type;
  /**
   * @var string
   */
  public $updateTime;

  /**
   * @param string
   */
  public function setAsset($asset)
  {
    $this->asset = $asset;
  }
  /**
   * @return string
   */
  public function getAsset()
  {
    return $this->asset;
  }
  /**
   * @param string
   */
  public function setCatalogEntry($catalogEntry)
  {
    $this->catalogEntry = $catalogEntry;
  }
  /**
   * @return string
   */
  public function getCatalogEntry()
  {
    return $this->catalogEntry;
  }
  /**
   * @param GoogleCloudDataplexV1EntityCompatibilityStatus
   */
  public function setCompatibility(GoogleCloudDataplexV1EntityCompatibilityStatus $compatibility)
  {
    $this->compatibility = $compatibility;
  }
  /**
   * @return GoogleCloudDataplexV1EntityCompatibilityStatus
   */
  public function getCompatibility()
  {
    return $this->compatibility;
  }
  /**
   * @param string
   */
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  /**
   * @return string
   */
  public function getCreateTime()
  {
    return $this->createTime;
  }
  /**
   * @param string
   */
  public function setDataPath($dataPath)
  {
    $this->dataPath = $dataPath;
  }
  /**
   * @return string
   */
  public function getDataPath()
  {
    return $this->dataPath;
  }
  /**
   * @param string
   */
  public function setDataPathPattern($dataPathPattern)
  {
    $this->dataPathPattern = $dataPathPattern;
  }
  /**
   * @return string
   */
  public function getDataPathPattern()
  {
    return $this->dataPathPattern;
  }
  /**
   * @param string
   */
  public function setDescription($description)
  {
    $this->description = $description;
  }
  /**
   * @return string
   */
  public function getDescription()
  {
    return $this->description;
  }
  /**
   * @param string
   */
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  /**
   * @return string
   */
  public function getDisplayName()
  {
    return $this->displayName;
  }
  /**
   * @param string
   */
  public function setEtag($etag)
  {
    $this->etag = $etag;
  }
  /**
   * @return string
   */
  public function getEtag()
  {
    return $this->etag;
  }
  /**
   * @param GoogleCloudDataplexV1StorageFormat
   */
  public function setFormat(GoogleCloudDataplexV1StorageFormat $format)
  {
    $this->format = $format;
  }
  /**
   * @return GoogleCloudDataplexV1StorageFormat
   */
  public function getFormat()
  {
    return $this->format;
  }
  /**
   * @param string
   */
  public function setId($id)
  {
    $this->id = $id;
  }
  /**
   * @return string
   */
  public function getId()
  {
    return $this->id;
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
   * @param GoogleCloudDataplexV1Schema
   */
  public function setSchema(GoogleCloudDataplexV1Schema $schema)
  {
    $this->schema = $schema;
  }
  /**
   * @return GoogleCloudDataplexV1Schema
   */
  public function getSchema()
  {
    return $this->schema;
  }
  /**
   * @param string
   */
  public function setSystem($system)
  {
    $this->system = $system;
  }
  /**
   * @return string
   */
  public function getSystem()
  {
    return $this->system;
  }
  /**
   * @param string
   */
  public function setType($type)
  {
    $this->type = $type;
  }
  /**
   * @return string
   */
  public function getType()
  {
    return $this->type;
  }
  /**
   * @param string
   */
  public function setUpdateTime($updateTime)
  {
    $this->updateTime = $updateTime;
  }
  /**
   * @return string
   */
  public function getUpdateTime()
  {
    return $this->updateTime;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDataplexV1Entity::class, 'Google_Service_CloudDataplex_GoogleCloudDataplexV1Entity');
