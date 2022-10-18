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

class GDocumentBaseOriginalContent extends \Google\Model
{
  protected $internal_gapi_mappings = [
        "representation" => "Representation",
        "uncompressedLength" => "UncompressedLength",
  ];
  /**
   * @var string
   */
  public $representation;
  /**
   * @var int
   */
  public $uncompressedLength;

  /**
   * @param string
   */
  public function setRepresentation($representation)
  {
    $this->representation = $representation;
  }
  /**
   * @return string
   */
  public function getRepresentation()
  {
    return $this->representation;
  }
  /**
   * @param int
   */
  public function setUncompressedLength($uncompressedLength)
  {
    $this->uncompressedLength = $uncompressedLength;
  }
  /**
   * @return int
   */
  public function getUncompressedLength()
  {
    return $this->uncompressedLength;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GDocumentBaseOriginalContent::class, 'Google_Service_Contentwarehouse_GDocumentBaseOriginalContent');
