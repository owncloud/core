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

namespace Google\Service\GKEHub;

class ConfigManagementConfigSync extends \Google\Model
{
  /**
   * @var bool
   */
  public $allowVerticalScale;
  /**
   * @var bool
   */
  public $enabled;
  protected $gitType = ConfigManagementGitConfig::class;
  protected $gitDataType = '';
  protected $ociType = ConfigManagementOciConfig::class;
  protected $ociDataType = '';
  /**
   * @var bool
   */
  public $preventDrift;
  /**
   * @var string
   */
  public $sourceFormat;

  /**
   * @param bool
   */
  public function setAllowVerticalScale($allowVerticalScale)
  {
    $this->allowVerticalScale = $allowVerticalScale;
  }
  /**
   * @return bool
   */
  public function getAllowVerticalScale()
  {
    return $this->allowVerticalScale;
  }
  /**
   * @param bool
   */
  public function setEnabled($enabled)
  {
    $this->enabled = $enabled;
  }
  /**
   * @return bool
   */
  public function getEnabled()
  {
    return $this->enabled;
  }
  /**
   * @param ConfigManagementGitConfig
   */
  public function setGit(ConfigManagementGitConfig $git)
  {
    $this->git = $git;
  }
  /**
   * @return ConfigManagementGitConfig
   */
  public function getGit()
  {
    return $this->git;
  }
  /**
   * @param ConfigManagementOciConfig
   */
  public function setOci(ConfigManagementOciConfig $oci)
  {
    $this->oci = $oci;
  }
  /**
   * @return ConfigManagementOciConfig
   */
  public function getOci()
  {
    return $this->oci;
  }
  /**
   * @param bool
   */
  public function setPreventDrift($preventDrift)
  {
    $this->preventDrift = $preventDrift;
  }
  /**
   * @return bool
   */
  public function getPreventDrift()
  {
    return $this->preventDrift;
  }
  /**
   * @param string
   */
  public function setSourceFormat($sourceFormat)
  {
    $this->sourceFormat = $sourceFormat;
  }
  /**
   * @return string
   */
  public function getSourceFormat()
  {
    return $this->sourceFormat;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ConfigManagementConfigSync::class, 'Google_Service_GKEHub_ConfigManagementConfigSync');
