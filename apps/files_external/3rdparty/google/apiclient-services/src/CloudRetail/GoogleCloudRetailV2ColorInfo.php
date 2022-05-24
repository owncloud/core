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

namespace Google\Service\CloudRetail;

class GoogleCloudRetailV2ColorInfo extends \Google\Collection
{
  protected $collection_key = 'colors';
  /**
   * @var string[]
   */
  public $colorFamilies;
  /**
   * @var string[]
   */
  public $colors;

  /**
   * @param string[]
   */
  public function setColorFamilies($colorFamilies)
  {
    $this->colorFamilies = $colorFamilies;
  }
  /**
   * @return string[]
   */
  public function getColorFamilies()
  {
    return $this->colorFamilies;
  }
  /**
   * @param string[]
   */
  public function setColors($colors)
  {
    $this->colors = $colors;
  }
  /**
   * @return string[]
   */
  public function getColors()
  {
    return $this->colors;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudRetailV2ColorInfo::class, 'Google_Service_CloudRetail_GoogleCloudRetailV2ColorInfo');
