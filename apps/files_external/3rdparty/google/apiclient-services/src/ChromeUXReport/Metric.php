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

namespace Google\Service\ChromeUXReport;

class Metric extends \Google\Collection
{
  protected $collection_key = 'histogram';
  protected $histogramType = Bin::class;
  protected $histogramDataType = 'array';
  protected $percentilesType = Percentiles::class;
  protected $percentilesDataType = '';

  /**
   * @param Bin[]
   */
  public function setHistogram($histogram)
  {
    $this->histogram = $histogram;
  }
  /**
   * @return Bin[]
   */
  public function getHistogram()
  {
    return $this->histogram;
  }
  /**
   * @param Percentiles
   */
  public function setPercentiles(Percentiles $percentiles)
  {
    $this->percentiles = $percentiles;
  }
  /**
   * @return Percentiles
   */
  public function getPercentiles()
  {
    return $this->percentiles;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Metric::class, 'Google_Service_ChromeUXReport_Metric');
