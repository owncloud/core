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

class MustangSnippetsRenderedToken extends \Google\Model
{
  /**
   * @var int
   */
  public $byteOffsetBegin;
  /**
   * @var int
   */
  public $byteOffsetEnd;
  /**
   * @var string
   */
  public $section;
  /**
   * @var string
   */
  public $tokenPos;

  /**
   * @param int
   */
  public function setByteOffsetBegin($byteOffsetBegin)
  {
    $this->byteOffsetBegin = $byteOffsetBegin;
  }
  /**
   * @return int
   */
  public function getByteOffsetBegin()
  {
    return $this->byteOffsetBegin;
  }
  /**
   * @param int
   */
  public function setByteOffsetEnd($byteOffsetEnd)
  {
    $this->byteOffsetEnd = $byteOffsetEnd;
  }
  /**
   * @return int
   */
  public function getByteOffsetEnd()
  {
    return $this->byteOffsetEnd;
  }
  /**
   * @param string
   */
  public function setSection($section)
  {
    $this->section = $section;
  }
  /**
   * @return string
   */
  public function getSection()
  {
    return $this->section;
  }
  /**
   * @param string
   */
  public function setTokenPos($tokenPos)
  {
    $this->tokenPos = $tokenPos;
  }
  /**
   * @return string
   */
  public function getTokenPos()
  {
    return $this->tokenPos;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(MustangSnippetsRenderedToken::class, 'Google_Service_Contentwarehouse_MustangSnippetsRenderedToken');
