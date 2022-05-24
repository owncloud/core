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

namespace Google\Service\Vision;

class GoogleCloudVisionV1p1beta1SafeSearchAnnotation extends \Google\Model
{
  /**
   * @var string
   */
  public $adult;
  /**
   * @var string
   */
  public $medical;
  /**
   * @var string
   */
  public $racy;
  /**
   * @var string
   */
  public $spoof;
  /**
   * @var string
   */
  public $violence;

  /**
   * @param string
   */
  public function setAdult($adult)
  {
    $this->adult = $adult;
  }
  /**
   * @return string
   */
  public function getAdult()
  {
    return $this->adult;
  }
  /**
   * @param string
   */
  public function setMedical($medical)
  {
    $this->medical = $medical;
  }
  /**
   * @return string
   */
  public function getMedical()
  {
    return $this->medical;
  }
  /**
   * @param string
   */
  public function setRacy($racy)
  {
    $this->racy = $racy;
  }
  /**
   * @return string
   */
  public function getRacy()
  {
    return $this->racy;
  }
  /**
   * @param string
   */
  public function setSpoof($spoof)
  {
    $this->spoof = $spoof;
  }
  /**
   * @return string
   */
  public function getSpoof()
  {
    return $this->spoof;
  }
  /**
   * @param string
   */
  public function setViolence($violence)
  {
    $this->violence = $violence;
  }
  /**
   * @return string
   */
  public function getViolence()
  {
    return $this->violence;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudVisionV1p1beta1SafeSearchAnnotation::class, 'Google_Service_Vision_GoogleCloudVisionV1p1beta1SafeSearchAnnotation');
