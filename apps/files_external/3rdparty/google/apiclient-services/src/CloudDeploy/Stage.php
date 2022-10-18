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

namespace Google\Service\CloudDeploy;

class Stage extends \Google\Collection
{
  protected $collection_key = 'profiles';
  /**
   * @var string[]
   */
  public $profiles;
  protected $strategyType = Strategy::class;
  protected $strategyDataType = '';
  /**
   * @var string
   */
  public $targetId;

  /**
   * @param string[]
   */
  public function setProfiles($profiles)
  {
    $this->profiles = $profiles;
  }
  /**
   * @return string[]
   */
  public function getProfiles()
  {
    return $this->profiles;
  }
  /**
   * @param Strategy
   */
  public function setStrategy(Strategy $strategy)
  {
    $this->strategy = $strategy;
  }
  /**
   * @return Strategy
   */
  public function getStrategy()
  {
    return $this->strategy;
  }
  /**
   * @param string
   */
  public function setTargetId($targetId)
  {
    $this->targetId = $targetId;
  }
  /**
   * @return string
   */
  public function getTargetId()
  {
    return $this->targetId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Stage::class, 'Google_Service_CloudDeploy_Stage');
