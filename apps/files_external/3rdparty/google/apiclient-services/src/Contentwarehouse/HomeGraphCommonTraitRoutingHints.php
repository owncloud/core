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

class HomeGraphCommonTraitRoutingHints extends \Google\Model
{
  /**
   * @var bool
   */
  public $cloudFulfillmentOnly;
  /**
   * @var string
   */
  public $trait;

  /**
   * @param bool
   */
  public function setCloudFulfillmentOnly($cloudFulfillmentOnly)
  {
    $this->cloudFulfillmentOnly = $cloudFulfillmentOnly;
  }
  /**
   * @return bool
   */
  public function getCloudFulfillmentOnly()
  {
    return $this->cloudFulfillmentOnly;
  }
  /**
   * @param string
   */
  public function setTrait($trait)
  {
    $this->trait = $trait;
  }
  /**
   * @return string
   */
  public function getTrait()
  {
    return $this->trait;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(HomeGraphCommonTraitRoutingHints::class, 'Google_Service_Contentwarehouse_HomeGraphCommonTraitRoutingHints');
