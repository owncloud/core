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

class PartialGroupByKeyInstruction extends \Google\Collection
{
  protected $collection_key = 'sideInputs';
  protected $inputType = InstructionInput::class;
  protected $inputDataType = '';
  /**
   * @var array[]
   */
  public $inputElementCodec;
  /**
   * @var string
   */
  public $originalCombineValuesInputStoreName;
  /**
   * @var string
   */
  public $originalCombineValuesStepName;
  protected $sideInputsType = SideInputInfo::class;
  protected $sideInputsDataType = 'array';
  /**
   * @var array[]
   */
  public $valueCombiningFn;

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
   * @param array[]
   */
  public function setInputElementCodec($inputElementCodec)
  {
    $this->inputElementCodec = $inputElementCodec;
  }
  /**
   * @return array[]
   */
  public function getInputElementCodec()
  {
    return $this->inputElementCodec;
  }
  /**
   * @param string
   */
  public function setOriginalCombineValuesInputStoreName($originalCombineValuesInputStoreName)
  {
    $this->originalCombineValuesInputStoreName = $originalCombineValuesInputStoreName;
  }
  /**
   * @return string
   */
  public function getOriginalCombineValuesInputStoreName()
  {
    return $this->originalCombineValuesInputStoreName;
  }
  /**
   * @param string
   */
  public function setOriginalCombineValuesStepName($originalCombineValuesStepName)
  {
    $this->originalCombineValuesStepName = $originalCombineValuesStepName;
  }
  /**
   * @return string
   */
  public function getOriginalCombineValuesStepName()
  {
    return $this->originalCombineValuesStepName;
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
  public function setValueCombiningFn($valueCombiningFn)
  {
    $this->valueCombiningFn = $valueCombiningFn;
  }
  /**
   * @return array[]
   */
  public function getValueCombiningFn()
  {
    return $this->valueCombiningFn;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PartialGroupByKeyInstruction::class, 'Google_Service_Dataflow_PartialGroupByKeyInstruction');
