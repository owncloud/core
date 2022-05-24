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

namespace Google\Service\TrafficDirectorService;

class StructMatcher extends \Google\Collection
{
  protected $collection_key = 'path';
  protected $pathType = PathSegment::class;
  protected $pathDataType = 'array';
  protected $valueType = ValueMatcher::class;
  protected $valueDataType = '';

  /**
   * @param PathSegment[]
   */
  public function setPath($path)
  {
    $this->path = $path;
  }
  /**
   * @return PathSegment[]
   */
  public function getPath()
  {
    return $this->path;
  }
  /**
   * @param ValueMatcher
   */
  public function setValue(ValueMatcher $value)
  {
    $this->value = $value;
  }
  /**
   * @return ValueMatcher
   */
  public function getValue()
  {
    return $this->value;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(StructMatcher::class, 'Google_Service_TrafficDirectorService_StructMatcher');
