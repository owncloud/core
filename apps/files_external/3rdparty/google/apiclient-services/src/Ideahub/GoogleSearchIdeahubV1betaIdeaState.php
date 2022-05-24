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

namespace Google\Service\Ideahub;

class GoogleSearchIdeahubV1betaIdeaState extends \Google\Model
{
  /**
   * @var bool
   */
  public $dismissed;
  /**
   * @var string
   */
  public $name;
  /**
   * @var bool
   */
  public $saved;

  /**
   * @param bool
   */
  public function setDismissed($dismissed)
  {
    $this->dismissed = $dismissed;
  }
  /**
   * @return bool
   */
  public function getDismissed()
  {
    return $this->dismissed;
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
   * @param bool
   */
  public function setSaved($saved)
  {
    $this->saved = $saved;
  }
  /**
   * @return bool
   */
  public function getSaved()
  {
    return $this->saved;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleSearchIdeahubV1betaIdeaState::class, 'Google_Service_Ideahub_GoogleSearchIdeahubV1betaIdeaState');
