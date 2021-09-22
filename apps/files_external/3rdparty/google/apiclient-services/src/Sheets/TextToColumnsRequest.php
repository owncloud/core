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

namespace Google\Service\Sheets;

class TextToColumnsRequest extends \Google\Model
{
  public $delimiter;
  public $delimiterType;
  protected $sourceType = GridRange::class;
  protected $sourceDataType = '';

  public function setDelimiter($delimiter)
  {
    $this->delimiter = $delimiter;
  }
  public function getDelimiter()
  {
    return $this->delimiter;
  }
  public function setDelimiterType($delimiterType)
  {
    $this->delimiterType = $delimiterType;
  }
  public function getDelimiterType()
  {
    return $this->delimiterType;
  }
  /**
   * @param GridRange
   */
  public function setSource(GridRange $source)
  {
    $this->source = $source;
  }
  /**
   * @return GridRange
   */
  public function getSource()
  {
    return $this->source;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(TextToColumnsRequest::class, 'Google_Service_Sheets_TextToColumnsRequest');
