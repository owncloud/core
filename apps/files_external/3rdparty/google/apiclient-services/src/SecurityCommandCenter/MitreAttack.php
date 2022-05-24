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

namespace Google\Service\SecurityCommandCenter;

class MitreAttack extends \Google\Collection
{
  protected $collection_key = 'primaryTechniques';
  /**
   * @var string[]
   */
  public $additionalTactics;
  /**
   * @var string[]
   */
  public $additionalTechniques;
  /**
   * @var string
   */
  public $primaryTactic;
  /**
   * @var string[]
   */
  public $primaryTechniques;
  /**
   * @var string
   */
  public $version;

  /**
   * @param string[]
   */
  public function setAdditionalTactics($additionalTactics)
  {
    $this->additionalTactics = $additionalTactics;
  }
  /**
   * @return string[]
   */
  public function getAdditionalTactics()
  {
    return $this->additionalTactics;
  }
  /**
   * @param string[]
   */
  public function setAdditionalTechniques($additionalTechniques)
  {
    $this->additionalTechniques = $additionalTechniques;
  }
  /**
   * @return string[]
   */
  public function getAdditionalTechniques()
  {
    return $this->additionalTechniques;
  }
  /**
   * @param string
   */
  public function setPrimaryTactic($primaryTactic)
  {
    $this->primaryTactic = $primaryTactic;
  }
  /**
   * @return string
   */
  public function getPrimaryTactic()
  {
    return $this->primaryTactic;
  }
  /**
   * @param string[]
   */
  public function setPrimaryTechniques($primaryTechniques)
  {
    $this->primaryTechniques = $primaryTechniques;
  }
  /**
   * @return string[]
   */
  public function getPrimaryTechniques()
  {
    return $this->primaryTechniques;
  }
  /**
   * @param string
   */
  public function setVersion($version)
  {
    $this->version = $version;
  }
  /**
   * @return string
   */
  public function getVersion()
  {
    return $this->version;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(MitreAttack::class, 'Google_Service_SecurityCommandCenter_MitreAttack');
