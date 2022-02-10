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

class GoogleCloudDocumentaiV1Vertex extends \Google\Model
{
  /**
   * @var int
   */
  public $x;
  /**
   * @var int
   */
  public $y;

  /**
   * @param int
   */
  public function setX($x)
  {
    $this->x = $x;
  }
  /**
   * @return int
   */
  public function getX()
  {
    return $this->x;
  }
  /**
   * @param int
   */
  public function setY($y)
  {
    $this->y = $y;
  }
  /**
   * @return int
   */
  public function getY()
  {
    return $this->y;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDocumentaiV1Vertex::class, 'Google_Service_Document_GoogleCloudDocumentaiV1Vertex');
