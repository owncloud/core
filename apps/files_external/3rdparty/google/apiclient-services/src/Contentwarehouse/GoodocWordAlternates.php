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

class GoodocWordAlternates extends \Google\Collection
{
  protected $collection_key = 'alternate';
  protected $internal_gapi_mappings = [
        "errorProbability" => "ErrorProbability",
  ];
  /**
   * @var int
   */
  public $errorProbability;
  protected $alternateType = GoodocWordAlternatesAlternate::class;
  protected $alternateDataType = 'array';

  /**
   * @param int
   */
  public function setErrorProbability($errorProbability)
  {
    $this->errorProbability = $errorProbability;
  }
  /**
   * @return int
   */
  public function getErrorProbability()
  {
    return $this->errorProbability;
  }
  /**
   * @param GoodocWordAlternatesAlternate[]
   */
  public function setAlternate($alternate)
  {
    $this->alternate = $alternate;
  }
  /**
   * @return GoodocWordAlternatesAlternate[]
   */
  public function getAlternate()
  {
    return $this->alternate;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoodocWordAlternates::class, 'Google_Service_Contentwarehouse_GoodocWordAlternates');
