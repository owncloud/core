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

namespace Google\Service\Contentwarehouse;

class NlpSemanticParsingLocalJoiner extends \Google\Model
{
  /**
   * @var int
   */
  public $numBytes;
  /**
   * @var int
   */
  public $numBytesForConversion;
  /**
   * @var int
   */
  public $startByte;
  /**
   * @var int
   */
  public $startByteForConversion;
  /**
   * @var string
   */
  public $text;
  /**
   * @var string
   */
  public $type;

  /**
   * @param int
   */
  public function setNumBytes($numBytes)
  {
    $this->numBytes = $numBytes;
  }
  /**
   * @return int
   */
  public function getNumBytes()
  {
    return $this->numBytes;
  }
  /**
   * @param int
   */
  public function setNumBytesForConversion($numBytesForConversion)
  {
    $this->numBytesForConversion = $numBytesForConversion;
  }
  /**
   * @return int
   */
  public function getNumBytesForConversion()
  {
    return $this->numBytesForConversion;
  }
  /**
   * @param int
   */
  public function setStartByte($startByte)
  {
    $this->startByte = $startByte;
  }
  /**
   * @return int
   */
  public function getStartByte()
  {
    return $this->startByte;
  }
  /**
   * @param int
   */
  public function setStartByteForConversion($startByteForConversion)
  {
    $this->startByteForConversion = $startByteForConversion;
  }
  /**
   * @return int
   */
  public function getStartByteForConversion()
  {
    return $this->startByteForConversion;
  }
  /**
   * @param string
   */
  public function setText($text)
  {
    $this->text = $text;
  }
  /**
   * @return string
   */
  public function getText()
  {
    return $this->text;
  }
  /**
   * @param string
   */
  public function setType($type)
  {
    $this->type = $type;
  }
  /**
   * @return string
   */
  public function getType()
  {
    return $this->type;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NlpSemanticParsingLocalJoiner::class, 'Google_Service_Contentwarehouse_NlpSemanticParsingLocalJoiner');
