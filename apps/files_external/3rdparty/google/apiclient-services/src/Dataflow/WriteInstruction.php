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

class WriteInstruction extends \Google\Model
{
  protected $inputType = InstructionInput::class;
  protected $inputDataType = '';
  protected $sinkType = Sink::class;
  protected $sinkDataType = '';

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
   * @param Sink
   */
  public function setSink(Sink $sink)
  {
    $this->sink = $sink;
  }
  /**
   * @return Sink
   */
  public function getSink()
  {
    return $this->sink;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(WriteInstruction::class, 'Google_Service_Dataflow_WriteInstruction');
