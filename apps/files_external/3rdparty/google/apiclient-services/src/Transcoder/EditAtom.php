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

namespace Google\Service\Transcoder;

class EditAtom extends \Google\Collection
{
  protected $collection_key = 'inputs';
  /**
   * @var string
   */
  public $endTimeOffset;
  /**
   * @var string[]
   */
  public $inputs;
  /**
   * @var string
   */
  public $key;
  /**
   * @var string
   */
  public $startTimeOffset;

  /**
   * @param string
   */
  public function setEndTimeOffset($endTimeOffset)
  {
    $this->endTimeOffset = $endTimeOffset;
  }
  /**
   * @return string
   */
  public function getEndTimeOffset()
  {
    return $this->endTimeOffset;
  }
  /**
   * @param string[]
   */
  public function setInputs($inputs)
  {
    $this->inputs = $inputs;
  }
  /**
   * @return string[]
   */
  public function getInputs()
  {
    return $this->inputs;
  }
  /**
   * @param string
   */
  public function setKey($key)
  {
    $this->key = $key;
  }
  /**
   * @return string
   */
  public function getKey()
  {
    return $this->key;
  }
  /**
   * @param string
   */
  public function setStartTimeOffset($startTimeOffset)
  {
    $this->startTimeOffset = $startTimeOffset;
  }
  /**
   * @return string
   */
  public function getStartTimeOffset()
  {
    return $this->startTimeOffset;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(EditAtom::class, 'Google_Service_Transcoder_EditAtom');
