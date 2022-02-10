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

namespace Google\Service\AccessContextManager;

class ServicePerimeter extends \Google\Model
{
  /**
   * @var string
   */
  public $description;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $perimeterType;
  protected $specType = ServicePerimeterConfig::class;
  protected $specDataType = '';
  protected $statusType = ServicePerimeterConfig::class;
  protected $statusDataType = '';
  /**
   * @var string
   */
  public $title;
  /**
   * @var bool
   */
  public $useExplicitDryRunSpec;

  /**
   * @param string
   */
  public function setDescription($description)
  {
    $this->description = $description;
  }
  /**
   * @return string
   */
  public function getDescription()
  {
    return $this->description;
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
   * @param string
   */
  public function setPerimeterType($perimeterType)
  {
    $this->perimeterType = $perimeterType;
  }
  /**
   * @return string
   */
  public function getPerimeterType()
  {
    return $this->perimeterType;
  }
  /**
   * @param ServicePerimeterConfig
   */
  public function setSpec(ServicePerimeterConfig $spec)
  {
    $this->spec = $spec;
  }
  /**
   * @return ServicePerimeterConfig
   */
  public function getSpec()
  {
    return $this->spec;
  }
  /**
   * @param ServicePerimeterConfig
   */
  public function setStatus(ServicePerimeterConfig $status)
  {
    $this->status = $status;
  }
  /**
   * @return ServicePerimeterConfig
   */
  public function getStatus()
  {
    return $this->status;
  }
  /**
   * @param string
   */
  public function setTitle($title)
  {
    $this->title = $title;
  }
  /**
   * @return string
   */
  public function getTitle()
  {
    return $this->title;
  }
  /**
   * @param bool
   */
  public function setUseExplicitDryRunSpec($useExplicitDryRunSpec)
  {
    $this->useExplicitDryRunSpec = $useExplicitDryRunSpec;
  }
  /**
   * @return bool
   */
  public function getUseExplicitDryRunSpec()
  {
    return $this->useExplicitDryRunSpec;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ServicePerimeter::class, 'Google_Service_AccessContextManager_ServicePerimeter');
