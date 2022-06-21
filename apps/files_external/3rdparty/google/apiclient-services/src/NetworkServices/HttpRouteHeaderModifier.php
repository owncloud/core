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

namespace Google\Service\NetworkServices;

class HttpRouteHeaderModifier extends \Google\Collection
{
  protected $collection_key = 'remove';
  /**
   * @var string[]
   */
  public $add;
  /**
   * @var string[]
   */
  public $remove;
  /**
   * @var string[]
   */
  public $set;

  /**
   * @param string[]
   */
  public function setAdd($add)
  {
    $this->add = $add;
  }
  /**
   * @return string[]
   */
  public function getAdd()
  {
    return $this->add;
  }
  /**
   * @param string[]
   */
  public function setRemove($remove)
  {
    $this->remove = $remove;
  }
  /**
   * @return string[]
   */
  public function getRemove()
  {
    return $this->remove;
  }
  /**
   * @param string[]
   */
  public function setSet($set)
  {
    $this->set = $set;
  }
  /**
   * @return string[]
   */
  public function getSet()
  {
    return $this->set;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(HttpRouteHeaderModifier::class, 'Google_Service_NetworkServices_HttpRouteHeaderModifier');
