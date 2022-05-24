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

namespace Google\Service\Bigquery;

class ArimaResult extends \Google\Collection
{
  protected $collection_key = 'seasonalPeriods';
  protected $arimaModelInfoType = ArimaModelInfo::class;
  protected $arimaModelInfoDataType = 'array';
  /**
   * @var string[]
   */
  public $seasonalPeriods;

  /**
   * @param ArimaModelInfo[]
   */
  public function setArimaModelInfo($arimaModelInfo)
  {
    $this->arimaModelInfo = $arimaModelInfo;
  }
  /**
   * @return ArimaModelInfo[]
   */
  public function getArimaModelInfo()
  {
    return $this->arimaModelInfo;
  }
  /**
   * @param string[]
   */
  public function setSeasonalPeriods($seasonalPeriods)
  {
    $this->seasonalPeriods = $seasonalPeriods;
  }
  /**
   * @return string[]
   */
  public function getSeasonalPeriods()
  {
    return $this->seasonalPeriods;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ArimaResult::class, 'Google_Service_Bigquery_ArimaResult');
