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

class ParallelInstruction extends \Google\Collection
{
  protected $collection_key = 'outputs';
  protected $flattenType = FlattenInstruction::class;
  protected $flattenDataType = '';
  public $name;
  public $originalName;
  protected $outputsType = InstructionOutput::class;
  protected $outputsDataType = 'array';
  protected $parDoType = ParDoInstruction::class;
  protected $parDoDataType = '';
  protected $partialGroupByKeyType = PartialGroupByKeyInstruction::class;
  protected $partialGroupByKeyDataType = '';
  protected $readType = ReadInstruction::class;
  protected $readDataType = '';
  public $systemName;
  protected $writeType = WriteInstruction::class;
  protected $writeDataType = '';

  /**
   * @param FlattenInstruction
   */
  public function setFlatten(FlattenInstruction $flatten)
  {
    $this->flatten = $flatten;
  }
  /**
   * @return FlattenInstruction
   */
  public function getFlatten()
  {
    return $this->flatten;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setOriginalName($originalName)
  {
    $this->originalName = $originalName;
  }
  public function getOriginalName()
  {
    return $this->originalName;
  }
  /**
   * @param InstructionOutput[]
   */
  public function setOutputs($outputs)
  {
    $this->outputs = $outputs;
  }
  /**
   * @return InstructionOutput[]
   */
  public function getOutputs()
  {
    return $this->outputs;
  }
  /**
   * @param ParDoInstruction
   */
  public function setParDo(ParDoInstruction $parDo)
  {
    $this->parDo = $parDo;
  }
  /**
   * @return ParDoInstruction
   */
  public function getParDo()
  {
    return $this->parDo;
  }
  /**
   * @param PartialGroupByKeyInstruction
   */
  public function setPartialGroupByKey(PartialGroupByKeyInstruction $partialGroupByKey)
  {
    $this->partialGroupByKey = $partialGroupByKey;
  }
  /**
   * @return PartialGroupByKeyInstruction
   */
  public function getPartialGroupByKey()
  {
    return $this->partialGroupByKey;
  }
  /**
   * @param ReadInstruction
   */
  public function setRead(ReadInstruction $read)
  {
    $this->read = $read;
  }
  /**
   * @return ReadInstruction
   */
  public function getRead()
  {
    return $this->read;
  }
  public function setSystemName($systemName)
  {
    $this->systemName = $systemName;
  }
  public function getSystemName()
  {
    return $this->systemName;
  }
  /**
   * @param WriteInstruction
   */
  public function setWrite(WriteInstruction $write)
  {
    $this->write = $write;
  }
  /**
   * @return WriteInstruction
   */
  public function getWrite()
  {
    return $this->write;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ParallelInstruction::class, 'Google_Service_Dataflow_ParallelInstruction');
