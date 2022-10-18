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

namespace Google\Service\CloudIAP;

class AttributePropagationSettings extends \Google\Collection
{
  protected $collection_key = 'outputCredentials';
  /**
   * @var bool
   */
  public $enable;
  /**
   * @var string
   */
  public $expression;
  /**
   * @var string[]
   */
  public $outputCredentials;

  /**
   * @param bool
   */
  public function setEnable($enable)
  {
    $this->enable = $enable;
  }
  /**
   * @return bool
   */
  public function getEnable()
  {
    return $this->enable;
  }
  /**
   * @param string
   */
  public function setExpression($expression)
  {
    $this->expression = $expression;
  }
  /**
   * @return string
   */
  public function getExpression()
  {
    return $this->expression;
  }
  /**
   * @param string[]
   */
  public function setOutputCredentials($outputCredentials)
  {
    $this->outputCredentials = $outputCredentials;
  }
  /**
   * @return string[]
   */
  public function getOutputCredentials()
  {
    return $this->outputCredentials;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AttributePropagationSettings::class, 'Google_Service_CloudIAP_AttributePropagationSettings');
