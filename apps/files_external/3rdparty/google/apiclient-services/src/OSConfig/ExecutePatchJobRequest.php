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

namespace Google\Service\OSConfig;

class ExecutePatchJobRequest extends \Google\Model
{
  /**
   * @var string
   */
  public $description;
  /**
   * @var string
   */
  public $displayName;
  /**
   * @var bool
   */
  public $dryRun;
  /**
   * @var string
   */
  public $duration;
  protected $instanceFilterType = PatchInstanceFilter::class;
  protected $instanceFilterDataType = '';
  protected $patchConfigType = PatchConfig::class;
  protected $patchConfigDataType = '';
  protected $rolloutType = PatchRollout::class;
  protected $rolloutDataType = '';

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
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  /**
   * @return string
   */
  public function getDisplayName()
  {
    return $this->displayName;
  }
  /**
   * @param bool
   */
  public function setDryRun($dryRun)
  {
    $this->dryRun = $dryRun;
  }
  /**
   * @return bool
   */
  public function getDryRun()
  {
    return $this->dryRun;
  }
  /**
   * @param string
   */
  public function setDuration($duration)
  {
    $this->duration = $duration;
  }
  /**
   * @return string
   */
  public function getDuration()
  {
    return $this->duration;
  }
  /**
   * @param PatchInstanceFilter
   */
  public function setInstanceFilter(PatchInstanceFilter $instanceFilter)
  {
    $this->instanceFilter = $instanceFilter;
  }
  /**
   * @return PatchInstanceFilter
   */
  public function getInstanceFilter()
  {
    return $this->instanceFilter;
  }
  /**
   * @param PatchConfig
   */
  public function setPatchConfig(PatchConfig $patchConfig)
  {
    $this->patchConfig = $patchConfig;
  }
  /**
   * @return PatchConfig
   */
  public function getPatchConfig()
  {
    return $this->patchConfig;
  }
  /**
   * @param PatchRollout
   */
  public function setRollout(PatchRollout $rollout)
  {
    $this->rollout = $rollout;
  }
  /**
   * @return PatchRollout
   */
  public function getRollout()
  {
    return $this->rollout;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ExecutePatchJobRequest::class, 'Google_Service_OSConfig_ExecutePatchJobRequest');
