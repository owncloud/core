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

namespace Google\Service\Monitoring;

class CollectdPayload extends \Google\Collection
{
  protected $collection_key = 'values';
  /**
   * @var string
   */
  public $endTime;
  protected $metadataType = TypedValue::class;
  protected $metadataDataType = 'map';
  /**
   * @var string
   */
  public $plugin;
  /**
   * @var string
   */
  public $pluginInstance;
  /**
   * @var string
   */
  public $startTime;
  /**
   * @var string
   */
  public $type;
  /**
   * @var string
   */
  public $typeInstance;
  protected $valuesType = CollectdValue::class;
  protected $valuesDataType = 'array';

  /**
   * @param string
   */
  public function setEndTime($endTime)
  {
    $this->endTime = $endTime;
  }
  /**
   * @return string
   */
  public function getEndTime()
  {
    return $this->endTime;
  }
  /**
   * @param TypedValue[]
   */
  public function setMetadata($metadata)
  {
    $this->metadata = $metadata;
  }
  /**
   * @return TypedValue[]
   */
  public function getMetadata()
  {
    return $this->metadata;
  }
  /**
   * @param string
   */
  public function setPlugin($plugin)
  {
    $this->plugin = $plugin;
  }
  /**
   * @return string
   */
  public function getPlugin()
  {
    return $this->plugin;
  }
  /**
   * @param string
   */
  public function setPluginInstance($pluginInstance)
  {
    $this->pluginInstance = $pluginInstance;
  }
  /**
   * @return string
   */
  public function getPluginInstance()
  {
    return $this->pluginInstance;
  }
  /**
   * @param string
   */
  public function setStartTime($startTime)
  {
    $this->startTime = $startTime;
  }
  /**
   * @return string
   */
  public function getStartTime()
  {
    return $this->startTime;
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
  public function setTypeInstance($typeInstance)
  {
    $this->typeInstance = $typeInstance;
  }
  /**
   * @return string
   */
  public function getTypeInstance()
  {
    return $this->typeInstance;
  }
  /**
   * @param CollectdValue[]
   */
  public function setValues($values)
  {
    $this->values = $values;
  }
  /**
   * @return CollectdValue[]
   */
  public function getValues()
  {
    return $this->values;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CollectdPayload::class, 'Google_Service_Monitoring_CollectdPayload');
