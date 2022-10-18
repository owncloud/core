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

namespace Google\Service\Contentwarehouse;

class EntitySignalsEntityClassification extends \Google\Collection
{
  protected $collection_key = 'features';
  /**
   * @var string
   */
  public $entityId;
  protected $featuresType = EntitySignalsEntityFeature::class;
  protected $featuresDataType = 'array';
  protected $outputType = EntitySignalsClassificationOutput::class;
  protected $outputDataType = '';

  /**
   * @param string
   */
  public function setEntityId($entityId)
  {
    $this->entityId = $entityId;
  }
  /**
   * @return string
   */
  public function getEntityId()
  {
    return $this->entityId;
  }
  /**
   * @param EntitySignalsEntityFeature[]
   */
  public function setFeatures($features)
  {
    $this->features = $features;
  }
  /**
   * @return EntitySignalsEntityFeature[]
   */
  public function getFeatures()
  {
    return $this->features;
  }
  /**
   * @param EntitySignalsClassificationOutput
   */
  public function setOutput(EntitySignalsClassificationOutput $output)
  {
    $this->output = $output;
  }
  /**
   * @return EntitySignalsClassificationOutput
   */
  public function getOutput()
  {
    return $this->output;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(EntitySignalsEntityClassification::class, 'Google_Service_Contentwarehouse_EntitySignalsEntityClassification');
