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

class GoogleCloudApigeeV1Schema extends \Google\Collection
{
  protected $collection_key = 'metrics';
  protected $dimensionsType = GoogleCloudApigeeV1SchemaSchemaElement::class;
  protected $dimensionsDataType = 'array';
  public $meta;
  protected $metricsType = GoogleCloudApigeeV1SchemaSchemaElement::class;
  protected $metricsDataType = 'array';

  /**
   * @param GoogleCloudApigeeV1SchemaSchemaElement[]
   */
  public function setDimensions($dimensions)
  {
    $this->dimensions = $dimensions;
  }
  /**
   * @return GoogleCloudApigeeV1SchemaSchemaElement[]
   */
  public function getDimensions()
  {
    return $this->dimensions;
  }
  public function setMeta($meta)
  {
    $this->meta = $meta;
  }
  public function getMeta()
  {
    return $this->meta;
  }
  /**
   * @param GoogleCloudApigeeV1SchemaSchemaElement[]
   */
  public function setMetrics($metrics)
  {
    $this->metrics = $metrics;
  }
  /**
   * @return GoogleCloudApigeeV1SchemaSchemaElement[]
   */
  public function getMetrics()
  {
    return $this->metrics;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudApigeeV1Schema::class, 'Google_Service_Apigee_GoogleCloudApigeeV1Schema');
