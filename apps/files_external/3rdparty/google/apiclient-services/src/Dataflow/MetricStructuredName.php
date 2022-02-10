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

namespace Google\Service\Dataflow;

class MetricStructuredName extends \Google\Model
{
  /**
   * @var string[]
   */
  public $context;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $origin;

  /**
   * @param string[]
   */
  public function setContext($context)
  {
    $this->context = $context;
  }
  /**
   * @return string[]
   */
  public function getContext()
  {
    return $this->context;
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
  public function setOrigin($origin)
  {
    $this->origin = $origin;
  }
  /**
   * @return string
   */
  public function getOrigin()
  {
    return $this->origin;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(MetricStructuredName::class, 'Google_Service_Dataflow_MetricStructuredName');
