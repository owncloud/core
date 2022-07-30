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

namespace Google\Service\SecurityCommandCenter;

class Pod extends \Google\Collection
{
  protected $collection_key = 'labels';
  protected $containersType = Container::class;
  protected $containersDataType = 'array';
  protected $labelsType = Label::class;
  protected $labelsDataType = 'array';
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $ns;

  /**
   * @param Container[]
   */
  public function setContainers($containers)
  {
    $this->containers = $containers;
  }
  /**
   * @return Container[]
   */
  public function getContainers()
  {
    return $this->containers;
  }
  /**
   * @param Label[]
   */
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  /**
   * @return Label[]
   */
  public function getLabels()
  {
    return $this->labels;
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
   * @param string
   */
  public function setNs($ns)
  {
    $this->ns = $ns;
  }
  /**
   * @return string
   */
  public function getNs()
  {
    return $this->ns;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Pod::class, 'Google_Service_SecurityCommandCenter_Pod');
