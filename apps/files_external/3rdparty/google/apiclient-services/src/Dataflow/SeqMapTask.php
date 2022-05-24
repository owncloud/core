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

namespace Google\Service\Dataflow;

class SeqMapTask extends \Google\Collection
{
  protected $collection_key = 'outputInfos';
  protected $inputsType = SideInputInfo::class;
  protected $inputsDataType = 'array';
  /**
   * @var string
   */
  public $name;
  protected $outputInfosType = SeqMapTaskOutputInfo::class;
  protected $outputInfosDataType = 'array';
  /**
   * @var string
   */
  public $stageName;
  /**
   * @var string
   */
  public $systemName;
  /**
   * @var array[]
   */
  public $userFn;

  /**
   * @param SideInputInfo[]
   */
  public function setInputs($inputs)
  {
    $this->inputs = $inputs;
  }
  /**
   * @return SideInputInfo[]
   */
  public function getInputs()
  {
    return $this->inputs;
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
   * @param SeqMapTaskOutputInfo[]
   */
  public function setOutputInfos($outputInfos)
  {
    $this->outputInfos = $outputInfos;
  }
  /**
   * @return SeqMapTaskOutputInfo[]
   */
  public function getOutputInfos()
  {
    return $this->outputInfos;
  }
  /**
   * @param string
   */
  public function setStageName($stageName)
  {
    $this->stageName = $stageName;
  }
  /**
   * @return string
   */
  public function getStageName()
  {
    return $this->stageName;
  }
  /**
   * @param string
   */
  public function setSystemName($systemName)
  {
    $this->systemName = $systemName;
  }
  /**
   * @return string
   */
  public function getSystemName()
  {
    return $this->systemName;
  }
  /**
   * @param array[]
   */
  public function setUserFn($userFn)
  {
    $this->userFn = $userFn;
  }
  /**
   * @return array[]
   */
  public function getUserFn()
  {
    return $this->userFn;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SeqMapTask::class, 'Google_Service_Dataflow_SeqMapTask');
