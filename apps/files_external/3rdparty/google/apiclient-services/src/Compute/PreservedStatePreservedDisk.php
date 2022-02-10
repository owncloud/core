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

namespace Google\Service\Compute;

class PreservedStatePreservedDisk extends \Google\Model
{
  /**
   * @var string
   */
  public $autoDelete;
  /**
   * @var string
   */
  public $mode;
  /**
   * @var string
   */
  public $source;

  /**
   * @param string
   */
  public function setAutoDelete($autoDelete)
  {
    $this->autoDelete = $autoDelete;
  }
  /**
   * @return string
   */
  public function getAutoDelete()
  {
    return $this->autoDelete;
  }
  /**
   * @param string
   */
  public function setMode($mode)
  {
    $this->mode = $mode;
  }
  /**
   * @return string
   */
  public function getMode()
  {
    return $this->mode;
  }
  /**
   * @param string
   */
  public function setSource($source)
  {
    $this->source = $source;
  }
  /**
   * @return string
   */
  public function getSource()
  {
    return $this->source;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PreservedStatePreservedDisk::class, 'Google_Service_Compute_PreservedStatePreservedDisk');
