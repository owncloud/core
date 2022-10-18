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

namespace Google\Service\CloudSearch;

class AppsDynamiteV1ApiCompatV1Field extends \Google\Model
{
  /**
   * @var bool
   */
  public $short;
  /**
   * @var string
   */
  public $title;
  /**
   * @var string
   */
  public $value;

  /**
   * @param bool
   */
  public function setShort($short)
  {
    $this->short = $short;
  }
  /**
   * @return bool
   */
  public function getShort()
  {
    return $this->short;
  }
  /**
   * @param string
   */
  public function setTitle($title)
  {
    $this->title = $title;
  }
  /**
   * @return string
   */
  public function getTitle()
  {
    return $this->title;
  }
  /**
   * @param string
   */
  public function setValue($value)
  {
    $this->value = $value;
  }
  /**
   * @return string
   */
  public function getValue()
  {
    return $this->value;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AppsDynamiteV1ApiCompatV1Field::class, 'Google_Service_CloudSearch_AppsDynamiteV1ApiCompatV1Field');
