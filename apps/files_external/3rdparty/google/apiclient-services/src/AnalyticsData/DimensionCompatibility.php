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

namespace Google\Service\AnalyticsData;

class DimensionCompatibility extends \Google\Model
{
  public $compatibility;
  protected $dimensionMetadataType = DimensionMetadata::class;
  protected $dimensionMetadataDataType = '';

  public function setCompatibility($compatibility)
  {
    $this->compatibility = $compatibility;
  }
  public function getCompatibility()
  {
    return $this->compatibility;
  }
  /**
   * @param DimensionMetadata
   */
  public function setDimensionMetadata(DimensionMetadata $dimensionMetadata)
  {
    $this->dimensionMetadata = $dimensionMetadata;
  }
  /**
   * @return DimensionMetadata
   */
  public function getDimensionMetadata()
  {
    return $this->dimensionMetadata;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DimensionCompatibility::class, 'Google_Service_AnalyticsData_DimensionCompatibility');
