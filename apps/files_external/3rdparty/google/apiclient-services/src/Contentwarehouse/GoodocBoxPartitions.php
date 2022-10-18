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

class GoodocBoxPartitions extends \Google\Collection
{
  protected $collection_key = 'span';
  /**
   * @var int
   */
  public $direction;
  /**
   * @var int[]
   */
  public $span;

  /**
   * @param int
   */
  public function setDirection($direction)
  {
    $this->direction = $direction;
  }
  /**
   * @return int
   */
  public function getDirection()
  {
    return $this->direction;
  }
  /**
   * @param int[]
   */
  public function setSpan($span)
  {
    $this->span = $span;
  }
  /**
   * @return int[]
   */
  public function getSpan()
  {
    return $this->span;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoodocBoxPartitions::class, 'Google_Service_Contentwarehouse_GoodocBoxPartitions');
