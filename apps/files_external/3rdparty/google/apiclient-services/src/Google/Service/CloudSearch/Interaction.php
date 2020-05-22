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

class Google_Service_CloudSearch_Interaction extends Google_Model
{
  public $interactionTime;
  protected $principalType = 'Google_Service_CloudSearch_Principal';
  protected $principalDataType = '';
  public $type;

  public function setInteractionTime($interactionTime)
  {
    $this->interactionTime = $interactionTime;
  }
  public function getInteractionTime()
  {
    return $this->interactionTime;
  }
  /**
   * @param Google_Service_CloudSearch_Principal
   */
  public function setPrincipal(Google_Service_CloudSearch_Principal $principal)
  {
    $this->principal = $principal;
  }
  /**
   * @return Google_Service_CloudSearch_Principal
   */
  public function getPrincipal()
  {
    return $this->principal;
  }
  public function setType($type)
  {
    $this->type = $type;
  }
  public function getType()
  {
    return $this->type;
  }
}
