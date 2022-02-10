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

class Position extends \Google\Model
{
  /**
   * @var string
   */
  public $byteOffset;
  protected $concatPositionType = ConcatPosition::class;
  protected $concatPositionDataType = '';
  /**
   * @var bool
   */
  public $end;
  /**
   * @var string
   */
  public $key;
  /**
   * @var string
   */
  public $recordIndex;
  /**
   * @var string
   */
  public $shufflePosition;

  /**
   * @param string
   */
  public function setByteOffset($byteOffset)
  {
    $this->byteOffset = $byteOffset;
  }
  /**
   * @return string
   */
  public function getByteOffset()
  {
    return $this->byteOffset;
  }
  /**
   * @param ConcatPosition
   */
  public function setConcatPosition(ConcatPosition $concatPosition)
  {
    $this->concatPosition = $concatPosition;
  }
  /**
   * @return ConcatPosition
   */
  public function getConcatPosition()
  {
    return $this->concatPosition;
  }
  /**
   * @param bool
   */
  public function setEnd($end)
  {
    $this->end = $end;
  }
  /**
   * @return bool
   */
  public function getEnd()
  {
    return $this->end;
  }
  /**
   * @param string
   */
  public function setKey($key)
  {
    $this->key = $key;
  }
  /**
   * @return string
   */
  public function getKey()
  {
    return $this->key;
  }
  /**
   * @param string
   */
  public function setRecordIndex($recordIndex)
  {
    $this->recordIndex = $recordIndex;
  }
  /**
   * @return string
   */
  public function getRecordIndex()
  {
    return $this->recordIndex;
  }
  /**
   * @param string
   */
  public function setShufflePosition($shufflePosition)
  {
    $this->shufflePosition = $shufflePosition;
  }
  /**
   * @return string
   */
  public function getShufflePosition()
  {
    return $this->shufflePosition;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Position::class, 'Google_Service_Dataflow_Position');
