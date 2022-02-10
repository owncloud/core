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

class ParDoInstruction extends \Google\Collection
{
  protected $collection_key = 'sideInputs';
  protected $inputType = InstructionInput::class;
  protected $inputDataType = '';
  protected $multiOutputInfosType = MultiOutputInfo::class;
  protected $multiOutputInfosDataType = 'array';
  /**
   * @var int
   */
  public $numOutputs;
  protected $sideInputsType = SideInputInfo::class;
  protected $sideInputsDataType = 'array';
  /**
   * @var array[]
   */
  public $userFn;

  /**
   * @param InstructionInput
   */
  public function setInput(InstructionInput $input)
  {
    $this->input = $input;
  }
  /**
   * @return InstructionInput
   */
  public function getInput()
  {
    return $this->input;
  }
  /**
   * @param MultiOutputInfo[]
   */
  public function setMultiOutputInfos($multiOutputInfos)
  {
    $this->multiOutputInfos = $multiOutputInfos;
  }
  /**
   * @return MultiOutputInfo[]
   */
  public function getMultiOutputInfos()
  {
    return $this->multiOutputInfos;
  }
  /**
   * @param int
   */
  public function setNumOutputs($numOutputs)
  {
    $this->numOutputs = $numOutputs;
  }
  /**
   * @return int
   */
  public function getNumOutputs()
  {
    return $this->numOutputs;
  }
  /**
   * @param SideInputInfo[]
   */
  public function setSideInputs($sideInputs)
  {
    $this->sideInputs = $sideInputs;
  }
  /**
   * @return SideInputInfo[]
   */
  public function getSideInputs()
  {
    return $this->sideInputs;
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
class_alias(ParDoInstruction::class, 'Google_Service_Dataflow_ParDoInstruction');
