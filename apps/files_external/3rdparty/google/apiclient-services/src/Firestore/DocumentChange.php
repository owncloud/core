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

namespace Google\Service\Firestore;

class DocumentChange extends \Google\Collection
{
  protected $collection_key = 'targetIds';
  protected $documentType = Document::class;
  protected $documentDataType = '';
  /**
   * @var int[]
   */
  public $removedTargetIds;
  /**
   * @var int[]
   */
  public $targetIds;

  /**
   * @param Document
   */
  public function setDocument(Document $document)
  {
    $this->document = $document;
  }
  /**
   * @return Document
   */
  public function getDocument()
  {
    return $this->document;
  }
  /**
   * @param int[]
   */
  public function setRemovedTargetIds($removedTargetIds)
  {
    $this->removedTargetIds = $removedTargetIds;
  }
  /**
   * @return int[]
   */
  public function getRemovedTargetIds()
  {
    return $this->removedTargetIds;
  }
  /**
   * @param int[]
   */
  public function setTargetIds($targetIds)
  {
    $this->targetIds = $targetIds;
  }
  /**
   * @return int[]
   */
  public function getTargetIds()
  {
    return $this->targetIds;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DocumentChange::class, 'Google_Service_Firestore_DocumentChange');
