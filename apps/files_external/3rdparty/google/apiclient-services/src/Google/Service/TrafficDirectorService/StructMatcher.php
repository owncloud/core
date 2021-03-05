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

class Google_Service_TrafficDirectorService_StructMatcher extends Google_Collection
{
  protected $collection_key = 'path';
  protected $pathType = 'Google_Service_TrafficDirectorService_PathSegment';
  protected $pathDataType = 'array';
  protected $valueType = 'Google_Service_TrafficDirectorService_ValueMatcher';
  protected $valueDataType = '';

  /**
   * @param Google_Service_TrafficDirectorService_PathSegment[]
   */
  public function setPath($path)
  {
    $this->path = $path;
  }
  /**
   * @return Google_Service_TrafficDirectorService_PathSegment[]
   */
  public function getPath()
  {
    return $this->path;
  }
  /**
   * @param Google_Service_TrafficDirectorService_ValueMatcher
   */
  public function setValue(Google_Service_TrafficDirectorService_ValueMatcher $value)
  {
    $this->value = $value;
  }
  /**
   * @return Google_Service_TrafficDirectorService_ValueMatcher
   */
  public function getValue()
  {
    return $this->value;
  }
}
