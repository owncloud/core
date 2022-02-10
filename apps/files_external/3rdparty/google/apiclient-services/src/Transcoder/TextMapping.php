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

class TextMapping extends \Google\Model
{
  /**
   * @var string
   */
  public $atomKey;
  /**
   * @var string
   */
  public $inputKey;
  /**
   * @var int
   */
  public $inputTrack;

  /**
   * @param string
   */
  public function setAtomKey($atomKey)
  {
    $this->atomKey = $atomKey;
  }
  /**
   * @return string
   */
  public function getAtomKey()
  {
    return $this->atomKey;
  }
  /**
   * @param string
   */
  public function setInputKey($inputKey)
  {
    $this->inputKey = $inputKey;
  }
  /**
   * @return string
   */
  public function getInputKey()
  {
    return $this->inputKey;
  }
  /**
   * @param int
   */
  public function setInputTrack($inputTrack)
  {
    $this->inputTrack = $inputTrack;
  }
  /**
   * @return int
   */
  public function getInputTrack()
  {
    return $this->inputTrack;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(TextMapping::class, 'Google_Service_Transcoder_TextMapping');
