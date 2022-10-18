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

class IndexingEmbeddedContentOutputGenerationTimestamps extends \Google\Model
{
  /**
   * @var int
   */
  public $documentData;
  /**
   * @var int
   */
  public $renderedSnapshot;

  /**
   * @param int
   */
  public function setDocumentData($documentData)
  {
    $this->documentData = $documentData;
  }
  /**
   * @return int
   */
  public function getDocumentData()
  {
    return $this->documentData;
  }
  /**
   * @param int
   */
  public function setRenderedSnapshot($renderedSnapshot)
  {
    $this->renderedSnapshot = $renderedSnapshot;
  }
  /**
   * @return int
   */
  public function getRenderedSnapshot()
  {
    return $this->renderedSnapshot;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(IndexingEmbeddedContentOutputGenerationTimestamps::class, 'Google_Service_Contentwarehouse_IndexingEmbeddedContentOutputGenerationTimestamps');
