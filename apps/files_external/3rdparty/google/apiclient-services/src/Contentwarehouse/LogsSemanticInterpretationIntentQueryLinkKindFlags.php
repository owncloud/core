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

namespace Google\Service\Contentwarehouse;

class LogsSemanticInterpretationIntentQueryLinkKindFlags extends \Google\Model
{
  /**
   * @var string
   */
  public $cluster;
  /**
   * @var string
   */
  public $geoContainment;
  /**
   * @var string
   */
  public $implication;
  /**
   * @var string
   */
  public $latentEntity;
  /**
   * @var string
   */
  public $mdvc;
  /**
   * @var string
   */
  public $property;
  /**
   * @var string
   */
  public $resolution;

  /**
   * @param string
   */
  public function setCluster($cluster)
  {
    $this->cluster = $cluster;
  }
  /**
   * @return string
   */
  public function getCluster()
  {
    return $this->cluster;
  }
  /**
   * @param string
   */
  public function setGeoContainment($geoContainment)
  {
    $this->geoContainment = $geoContainment;
  }
  /**
   * @return string
   */
  public function getGeoContainment()
  {
    return $this->geoContainment;
  }
  /**
   * @param string
   */
  public function setImplication($implication)
  {
    $this->implication = $implication;
  }
  /**
   * @return string
   */
  public function getImplication()
  {
    return $this->implication;
  }
  /**
   * @param string
   */
  public function setLatentEntity($latentEntity)
  {
    $this->latentEntity = $latentEntity;
  }
  /**
   * @return string
   */
  public function getLatentEntity()
  {
    return $this->latentEntity;
  }
  /**
   * @param string
   */
  public function setMdvc($mdvc)
  {
    $this->mdvc = $mdvc;
  }
  /**
   * @return string
   */
  public function getMdvc()
  {
    return $this->mdvc;
  }
  /**
   * @param string
   */
  public function setProperty($property)
  {
    $this->property = $property;
  }
  /**
   * @return string
   */
  public function getProperty()
  {
    return $this->property;
  }
  /**
   * @param string
   */
  public function setResolution($resolution)
  {
    $this->resolution = $resolution;
  }
  /**
   * @return string
   */
  public function getResolution()
  {
    return $this->resolution;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(LogsSemanticInterpretationIntentQueryLinkKindFlags::class, 'Google_Service_Contentwarehouse_LogsSemanticInterpretationIntentQueryLinkKindFlags');
