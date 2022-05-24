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

namespace Google\Service\OnDemandScanning;

class Command extends \Google\Collection
{
  protected $collection_key = 'waitFor';
  /**
   * @var string[]
   */
  public $args;
  /**
   * @var string
   */
  public $dir;
  /**
   * @var string[]
   */
  public $env;
  /**
   * @var string
   */
  public $id;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string[]
   */
  public $waitFor;

  /**
   * @param string[]
   */
  public function setArgs($args)
  {
    $this->args = $args;
  }
  /**
   * @return string[]
   */
  public function getArgs()
  {
    return $this->args;
  }
  /**
   * @param string
   */
  public function setDir($dir)
  {
    $this->dir = $dir;
  }
  /**
   * @return string
   */
  public function getDir()
  {
    return $this->dir;
  }
  /**
   * @param string[]
   */
  public function setEnv($env)
  {
    $this->env = $env;
  }
  /**
   * @return string[]
   */
  public function getEnv()
  {
    return $this->env;
  }
  /**
   * @param string
   */
  public function setId($id)
  {
    $this->id = $id;
  }
  /**
   * @return string
   */
  public function getId()
  {
    return $this->id;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param string[]
   */
  public function setWaitFor($waitFor)
  {
    $this->waitFor = $waitFor;
  }
  /**
   * @return string[]
   */
  public function getWaitFor()
  {
    return $this->waitFor;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Command::class, 'Google_Service_OnDemandScanning_Command');
