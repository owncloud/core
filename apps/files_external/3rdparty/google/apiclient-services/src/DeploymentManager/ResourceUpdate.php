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

namespace Google\Service\DeploymentManager;

class ResourceUpdate extends \Google\Collection
{
  protected $collection_key = 'warnings';
  protected $accessControlType = ResourceAccessControl::class;
  protected $accessControlDataType = '';
  protected $errorType = ResourceUpdateError::class;
  protected $errorDataType = '';
  /**
   * @var string
   */
  public $finalProperties;
  /**
   * @var string
   */
  public $intent;
  /**
   * @var string
   */
  public $manifest;
  /**
   * @var string
   */
  public $properties;
  /**
   * @var string
   */
  public $state;
  protected $warningsType = ResourceUpdateWarnings::class;
  protected $warningsDataType = 'array';

  /**
   * @param ResourceAccessControl
   */
  public function setAccessControl(ResourceAccessControl $accessControl)
  {
    $this->accessControl = $accessControl;
  }
  /**
   * @return ResourceAccessControl
   */
  public function getAccessControl()
  {
    return $this->accessControl;
  }
  /**
   * @param ResourceUpdateError
   */
  public function setError(ResourceUpdateError $error)
  {
    $this->error = $error;
  }
  /**
   * @return ResourceUpdateError
   */
  public function getError()
  {
    return $this->error;
  }
  /**
   * @param string
   */
  public function setFinalProperties($finalProperties)
  {
    $this->finalProperties = $finalProperties;
  }
  /**
   * @return string
   */
  public function getFinalProperties()
  {
    return $this->finalProperties;
  }
  /**
   * @param string
   */
  public function setIntent($intent)
  {
    $this->intent = $intent;
  }
  /**
   * @return string
   */
  public function getIntent()
  {
    return $this->intent;
  }
  /**
   * @param string
   */
  public function setManifest($manifest)
  {
    $this->manifest = $manifest;
  }
  /**
   * @return string
   */
  public function getManifest()
  {
    return $this->manifest;
  }
  /**
   * @param string
   */
  public function setProperties($properties)
  {
    $this->properties = $properties;
  }
  /**
   * @return string
   */
  public function getProperties()
  {
    return $this->properties;
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
  /**
   * @param ResourceUpdateWarnings[]
   */
  public function setWarnings($warnings)
  {
    $this->warnings = $warnings;
  }
  /**
   * @return ResourceUpdateWarnings[]
   */
  public function getWarnings()
  {
    return $this->warnings;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ResourceUpdate::class, 'Google_Service_DeploymentManager_ResourceUpdate');
