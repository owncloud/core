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

class DeploymentUpdate extends \Google\Collection
{
  protected $collection_key = 'labels';
  /**
   * @var string
   */
  public $description;
  protected $labelsType = DeploymentUpdateLabelEntry::class;
  protected $labelsDataType = 'array';
  /**
   * @var string
   */
  public $manifest;

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
   * @param DeploymentUpdateLabelEntry[]
   */
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  /**
   * @return DeploymentUpdateLabelEntry[]
   */
  public function getLabels()
  {
    return $this->labels;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DeploymentUpdate::class, 'Google_Service_DeploymentManager_DeploymentUpdate');
