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

class GeostoreEntranceProto extends \Google\Model
{
  /**
   * @var string
   */
  public $allowance;
  /**
   * @var bool
   */
  public $canEnter;
  /**
   * @var bool
   */
  public $canExit;

  /**
   * @param string
   */
  public function setAllowance($allowance)
  {
    $this->allowance = $allowance;
  }
  /**
   * @return string
   */
  public function getAllowance()
  {
    return $this->allowance;
  }
  /**
   * @param bool
   */
  public function setCanEnter($canEnter)
  {
    $this->canEnter = $canEnter;
  }
  /**
   * @return bool
   */
  public function getCanEnter()
  {
    return $this->canEnter;
  }
  /**
   * @param bool
   */
  public function setCanExit($canExit)
  {
    $this->canExit = $canExit;
  }
  /**
   * @return bool
   */
  public function getCanExit()
  {
    return $this->canExit;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GeostoreEntranceProto::class, 'Google_Service_Contentwarehouse_GeostoreEntranceProto');
