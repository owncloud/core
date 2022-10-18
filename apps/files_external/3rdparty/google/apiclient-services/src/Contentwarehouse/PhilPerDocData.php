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

class PhilPerDocData extends \Google\Model
{
  protected $internal_gapi_mappings = [
        "philString" => "PhilString",
        "philVersion" => "PhilVersion",
  ];
  /**
   * @var string
   */
  public $philString;
  /**
   * @var int
   */
  public $philVersion;

  /**
   * @param string
   */
  public function setPhilString($philString)
  {
    $this->philString = $philString;
  }
  /**
   * @return string
   */
  public function getPhilString()
  {
    return $this->philString;
  }
  /**
   * @param int
   */
  public function setPhilVersion($philVersion)
  {
    $this->philVersion = $philVersion;
  }
  /**
   * @return int
   */
  public function getPhilVersion()
  {
    return $this->philVersion;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PhilPerDocData::class, 'Google_Service_Contentwarehouse_PhilPerDocData');
