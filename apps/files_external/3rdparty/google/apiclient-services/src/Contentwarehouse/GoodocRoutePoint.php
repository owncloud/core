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

class GoodocRoutePoint extends \Google\Model
{
  protected $internal_gapi_mappings = [
        "routeIndex" => "RouteIndex",
        "wordIndex" => "WordIndex",
  ];
  /**
   * @var int
   */
  public $routeIndex;
  /**
   * @var int
   */
  public $wordIndex;

  /**
   * @param int
   */
  public function setRouteIndex($routeIndex)
  {
    $this->routeIndex = $routeIndex;
  }
  /**
   * @return int
   */
  public function getRouteIndex()
  {
    return $this->routeIndex;
  }
  /**
   * @param int
   */
  public function setWordIndex($wordIndex)
  {
    $this->wordIndex = $wordIndex;
  }
  /**
   * @return int
   */
  public function getWordIndex()
  {
    return $this->wordIndex;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoodocRoutePoint::class, 'Google_Service_Contentwarehouse_GoodocRoutePoint');
