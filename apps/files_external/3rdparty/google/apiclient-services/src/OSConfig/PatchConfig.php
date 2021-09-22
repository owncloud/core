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

class PatchConfig extends \Google\Model
{
  protected $aptType = AptSettings::class;
  protected $aptDataType = '';
  protected $gooType = GooSettings::class;
  protected $gooDataType = '';
  protected $postStepType = ExecStep::class;
  protected $postStepDataType = '';
  protected $preStepType = ExecStep::class;
  protected $preStepDataType = '';
  public $rebootConfig;
  protected $windowsUpdateType = WindowsUpdateSettings::class;
  protected $windowsUpdateDataType = '';
  protected $yumType = YumSettings::class;
  protected $yumDataType = '';
  protected $zypperType = ZypperSettings::class;
  protected $zypperDataType = '';

  /**
   * @param AptSettings
   */
  public function setApt(AptSettings $apt)
  {
    $this->apt = $apt;
  }
  /**
   * @return AptSettings
   */
  public function getApt()
  {
    return $this->apt;
  }
  /**
   * @param GooSettings
   */
  public function setGoo(GooSettings $goo)
  {
    $this->goo = $goo;
  }
  /**
   * @return GooSettings
   */
  public function getGoo()
  {
    return $this->goo;
  }
  /**
   * @param ExecStep
   */
  public function setPostStep(ExecStep $postStep)
  {
    $this->postStep = $postStep;
  }
  /**
   * @return ExecStep
   */
  public function getPostStep()
  {
    return $this->postStep;
  }
  /**
   * @param ExecStep
   */
  public function setPreStep(ExecStep $preStep)
  {
    $this->preStep = $preStep;
  }
  /**
   * @return ExecStep
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
   * @param WindowsUpdateSettings
   */
  public function setWindowsUpdate(WindowsUpdateSettings $windowsUpdate)
  {
    $this->windowsUpdate = $windowsUpdate;
  }
  /**
   * @return WindowsUpdateSettings
   */
  public function getWindowsUpdate()
  {
    return $this->windowsUpdate;
  }
  /**
   * @param YumSettings
   */
  public function setYum(YumSettings $yum)
  {
    $this->yum = $yum;
  }
  /**
   * @return YumSettings
   */
  public function getYum()
  {
    return $this->yum;
  }
  /**
   * @param ZypperSettings
   */
  public function setZypper(ZypperSettings $zypper)
  {
    $this->zypper = $zypper;
  }
  /**
   * @return ZypperSettings
   */
  public function getZypper()
  {
    return $this->zypper;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PatchConfig::class, 'Google_Service_OSConfig_PatchConfig');
