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

namespace Google\Service\ServiceManagement;

class MetricDescriptor extends \Google\Collection
{
  protected $collection_key = 'monitoredResourceTypes';
  /**
   * @var string
   */
  public $description;
  /**
   * @var string
   */
  public $displayName;
  protected $labelsType = LabelDescriptor::class;
  protected $labelsDataType = 'array';
  /**
   * @var string
   */
  public $launchStage;
  protected $metadataType = MetricDescriptorMetadata::class;
  protected $metadataDataType = '';
  /**
   * @var string
   */
  public $metricKind;
  /**
   * @var string[]
   */
  public $monitoredResourceTypes;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $type;
  /**
   * @var string
   */
  public $unit;
  /**
   * @var string
   */
  public $valueType;

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
   * @param LabelDescriptor[]
   */
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  /**
   * @return LabelDescriptor[]
   */
  public function getLabels()
  {
    return $this->labels;
  }
  /**
   * @param string
   */
  public function setLaunchStage($launchStage)
  {
    $this->launchStage = $launchStage;
  }
  /**
   * @return string
   */
  public function getLaunchStage()
  {
    return $this->launchStage;
  }
  /**
   * @param MetricDescriptorMetadata
   */
  public function setMetadata(MetricDescriptorMetadata $metadata)
  {
    $this->metadata = $metadata;
  }
  /**
   * @return MetricDescriptorMetadata
   */
  public function getMetadata()
  {
    return $this->metadata;
  }
  /**
   * @param string
   */
  public function setMetricKind($metricKind)
  {
    $this->metricKind = $metricKind;
  }
  /**
   * @return string
   */
  public function getMetricKind()
  {
    return $this->metricKind;
  }
  /**
   * @param string[]
   */
  public function setMonitoredResourceTypes($monitoredResourceTypes)
  {
    $this->monitoredResourceTypes = $monitoredResourceTypes;
  }
  /**
   * @return string[]
   */
  public function getMonitoredResourceTypes()
  {
    return $this->monitoredResourceTypes;
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
  public function setUnit($unit)
  {
    $this->unit = $unit;
  }
  /**
   * @return string
   */
  public function getUnit()
  {
    return $this->unit;
  }
  /**
   * @param string
   */
  public function setValueType($valueType)
  {
    $this->valueType = $valueType;
  }
  /**
   * @return string
   */
  public function getValueType()
  {
    return $this->valueType;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(MetricDescriptor::class, 'Google_Service_ServiceManagement_MetricDescriptor');
