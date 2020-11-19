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

class Google_Service_OSConfig_PatchConfig extends Google_Model
{
  protected $aptType = 'Google_Service_OSConfig_AptSettings';
  protected $aptDataType = '';
  protected $gooType = 'Google_Service_OSConfig_GooSettings';
  protected $gooDataType = '';
  protected $postStepType = 'Google_Service_OSConfig_ExecStep';
  protected $postStepDataType = '';
  protected $preStepType = 'Google_Service_OSConfig_ExecStep';
  protected $preStepDataType = '';
  public $rebootConfig;
  protected $windowsUpdateType = 'Google_Service_OSConfig_WindowsUpdateSettings';
  protected $windowsUpdateDataType = '';
  protected $yumType = 'Google_Service_OSConfig_YumSettings';
  protected $yumDataType = '';
  protected $zypperType = 'Google_Service_OSConfig_ZypperSettings';
  protected $zypperDataType = '';

  /**
   * @param Google_Service_OSConfig_AptSettings
   */
  public function setApt(Google_Service_OSConfig_AptSettings $apt)
  {
    $this->apt = $apt;
  }
  /**
   * @return Google_Service_OSConfig_AptSettings
   */
  public function getApt()
  {
    return $this->apt;
  }
  /**
   * @param Google_Service_OSConfig_GooSettings
   */
  public function setGoo(Google_Service_OSConfig_GooSettings $goo)
  {
    $this->goo = $goo;
  }
  /**
   * @return Google_Service_OSConfig_GooSettings
   */
  public function getGoo()
  {
    return $this->goo;
  }
  /**
   * @param Google_Service_OSConfig_ExecStep
   */
  public function setPostStep(Google_Service_OSConfig_ExecStep $postStep)
  {
    $this->postStep = $postStep;
  }
  /**
   * @return Google_Service_OSConfig_ExecStep
   */
  public function getPostStep()
  {
    return $this->postStep;
  }
  /**
   * @param Google_Service_OSConfig_ExecStep
   */
  public function setPreStep(Google_Service_OSConfig_ExecStep $preStep)
  {
    $this->preStep = $preStep;
  }
  /**
   * @return Google_Service_OSConfig_ExecStep
   */
  public function getPreStep()
  {
    return $this->preStep;
  }
  public function setRebootConfig($rebootConfig)
  {
    $this->rebootConfig = $rebootConfig;
  }
  public function getRebootConfig()
  {
    return $this->rebootConfig;
  }
  /**
   * @param Google_Service_OSConfig_WindowsUpdateSettings
   */
  public function setWindowsUpdate(Google_Service_OSConfig_WindowsUpdateSettings $windowsUpdate)
  {
    $this->windowsUpdate = $windowsUpdate;
  }
  /**
   * @return Google_Service_OSConfig_WindowsUpdateSettings
   */
  public function getWindowsUpdate()
  {
    return $this->windowsUpdate;
  }
  /**
   * @param Google_Service_OSConfig_YumSettings
   */
  public function setYum(Google_Service_OSConfig_YumSettings $yum)
  {
    $this->yum = $yum;
  }
  /**
   * @return Google_Service_OSConfig_YumSettings
   */
  public function getYum()
  {
    return $this->yum;
  }
  /**
   * @param Google_Service_OSConfig_ZypperSettings
   */
  public function setZypper(Google_Service_OSConfig_ZypperSettings $zypper)
  {
    $this->zypper = $zypper;
  }
  /**
   * @return Google_Service_OSConfig_ZypperSettings
   */
  public function getZypper()
  {
    return $this->zypper;
  }
}
