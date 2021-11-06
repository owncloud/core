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

namespace Google\Service\Dfareporting;

class PathToConversionReportCompatibleFields extends \Google\Collection
{
  protected $collection_key = 'perInteractionDimensions';
  protected $conversionDimensionsType = Dimension::class;
  protected $conversionDimensionsDataType = 'array';
  protected $customFloodlightVariablesType = Dimension::class;
  protected $customFloodlightVariablesDataType = 'array';
  public $kind;
  protected $metricsType = Metric::class;
  protected $metricsDataType = 'array';
  protected $perInteractionDimensionsType = Dimension::class;
  protected $perInteractionDimensionsDataType = 'array';

  /**
   * @param Dimension[]
   */
  public function setConversionDimensions($conversionDimensions)
  {
    $this->conversionDimensions = $conversionDimensions;
  }
  /**
   * @return Dimension[]
   */
  public function getConversionDimensions()
  {
    return $this->conversionDimensions;
  }
  /**
   * @param Dimension[]
   */
  public function setCustomFloodlightVariables($customFloodlightVariables)
  {
    $this->customFloodlightVariables = $customFloodlightVariables;
  }
  /**
   * @return Dimension[]
   */
  public function getCustomFloodlightVariables()
  {
    return $this->customFloodlightVariables;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  /**
   * @param Metric[]
   */
  public function setMetrics($metrics)
  {
    $this->metrics = $metrics;
  }
  /**
   * @return Metric[]
   */
  public function getMetrics()
  {
    return $this->metrics;
  }
  /**
   * @param Dimension[]
   */
  public function setPerInteractionDimensions($perInteractionDimensions)
  {
    $this->perInteractionDimensions = $perInteractionDimensions;
  }
  /**
   * @return Dimension[]
   */
  public function getPerInteractionDimensions()
  {
    return $this->perInteractionDimensions;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PathToConversionReportCompatibleFields::class, 'Google_Service_Dfareporting_PathToConversionReportCompatibleFields');
