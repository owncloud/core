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

namespace Google\Service\Document;

class GoogleCloudDocumentaiV1DocumentTextAnchorTextSegment extends \Google\Model
{
  /**
   * @var string
   */
  public $endIndex;
  /**
   * @var string
   */
  public $startIndex;

  /**
   * @param string
   */
  public function setEndIndex($endIndex)
  {
    $this->endIndex = $endIndex;
  }
  /**
   * @return string
   */
  public function getEndIndex()
  {
    return $this->endIndex;
  }
  /**
   * @param string
   */
  public function setStartIndex($startIndex)
  {
    $this->startIndex = $startIndex;
  }
  /**
   * @return string
   */
  public function getStartIndex()
  {
    return $this->startIndex;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDocumentaiV1DocumentTextAnchorTextSegment::class, 'Google_Service_Document_GoogleCloudDocumentaiV1DocumentTextAnchorTextSegment');
