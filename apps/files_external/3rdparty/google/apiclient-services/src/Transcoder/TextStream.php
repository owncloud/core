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

namespace Google\Service\Transcoder;

class TextStream extends \Google\Collection
{
  protected $collection_key = 'mapping';
  /**
   * @var string
   */
  public $codec;
  protected $mappingType = TextMapping::class;
  protected $mappingDataType = 'array';

  /**
   * @param string
   */
  public function setCodec($codec)
  {
    $this->codec = $codec;
  }
  /**
   * @return string
   */
  public function getCodec()
  {
    return $this->codec;
  }
  /**
   * @param TextMapping[]
   */
  public function setMapping($mapping)
  {
    $this->mapping = $mapping;
  }
  /**
   * @return TextMapping[]
   */
  public function getMapping()
  {
    return $this->mapping;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(TextStream::class, 'Google_Service_Transcoder_TextStream');
