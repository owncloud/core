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

namespace Google\Service\Spanner;

class QueryOptions extends \Google\Model
{
  /**
   * @var string
   */
  public $optimizerStatisticsPackage;
  /**
   * @var string
   */
  public $optimizerVersion;

  /**
   * @param string
   */
  public function setOptimizerStatisticsPackage($optimizerStatisticsPackage)
  {
    $this->optimizerStatisticsPackage = $optimizerStatisticsPackage;
  }
  /**
   * @return string
   */
  public function getOptimizerStatisticsPackage()
  {
    return $this->optimizerStatisticsPackage;
  }
  /**
   * @param string
   */
  public function setOptimizerVersion($optimizerVersion)
  {
    $this->optimizerVersion = $optimizerVersion;
  }
  /**
   * @return string
   */
  public function getOptimizerVersion()
  {
    return $this->optimizerVersion;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(QueryOptions::class, 'Google_Service_Spanner_QueryOptions');
