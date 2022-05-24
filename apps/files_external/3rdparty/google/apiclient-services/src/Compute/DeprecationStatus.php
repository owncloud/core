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

class DeprecationStatus extends \Google\Model
{
  /**
   * @var string
   */
  public $deleted;
  /**
   * @var string
   */
  public $deprecated;
  /**
   * @var string
   */
  public $obsolete;
  /**
   * @var string
   */
  public $replacement;
  /**
   * @var string
   */
  public $state;

  /**
   * @param string
   */
  public function setDeleted($deleted)
  {
    $this->deleted = $deleted;
  }
  /**
   * @return string
   */
  public function getDeleted()
  {
    return $this->deleted;
  }
  /**
   * @param string
   */
  public function setDeprecated($deprecated)
  {
    $this->deprecated = $deprecated;
  }
  /**
   * @return string
   */
  public function getDeprecated()
  {
    return $this->deprecated;
  }
  /**
   * @param string
   */
  public function setObsolete($obsolete)
  {
    $this->obsolete = $obsolete;
  }
  /**
   * @return string
   */
  public function getObsolete()
  {
    return $this->obsolete;
  }
  /**
   * @param string
   */
  public function setReplacement($replacement)
  {
    $this->replacement = $replacement;
  }
  /**
   * @return string
   */
  public function getReplacement()
  {
    return $this->replacement;
  }
  /**
   * @param string
   */
  public function setState($state)
  {
    $this->state = $state;
  }
  /**
   * @return string
   */
  public function getState()
  {
    return $this->state;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DeprecationStatus::class, 'Google_Service_Compute_DeprecationStatus');
