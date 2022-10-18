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

class OtrModificationEvent extends \Google\Model
{
  /**
   * @var string
   */
  public $newOtrStatus;
  /**
   * @var string
   */
  public $newOtrToggle;
  /**
   * @var string
   */
  public $oldOtrStatus;
  /**
   * @var string
   */
  public $oldOtrToggle;

  /**
   * @param string
   */
  public function setNewOtrStatus($newOtrStatus)
  {
    $this->newOtrStatus = $newOtrStatus;
  }
  /**
   * @return string
   */
  public function getNewOtrStatus()
  {
    return $this->newOtrStatus;
  }
  /**
   * @param string
   */
  public function setNewOtrToggle($newOtrToggle)
  {
    $this->newOtrToggle = $newOtrToggle;
  }
  /**
   * @return string
   */
  public function getNewOtrToggle()
  {
    return $this->newOtrToggle;
  }
  /**
   * @param string
   */
  public function setOldOtrStatus($oldOtrStatus)
  {
    $this->oldOtrStatus = $oldOtrStatus;
  }
  /**
   * @return string
   */
  public function getOldOtrStatus()
  {
    return $this->oldOtrStatus;
  }
  /**
   * @param string
   */
  public function setOldOtrToggle($oldOtrToggle)
  {
    $this->oldOtrToggle = $oldOtrToggle;
  }
  /**
   * @return string
   */
  public function getOldOtrToggle()
  {
    return $this->oldOtrToggle;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(OtrModificationEvent::class, 'Google_Service_CloudSearch_OtrModificationEvent');
