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

class ListenResponse extends \Google\Model
{
  protected $documentChangeType = DocumentChange::class;
  protected $documentChangeDataType = '';
  protected $documentDeleteType = DocumentDelete::class;
  protected $documentDeleteDataType = '';
  protected $documentRemoveType = DocumentRemove::class;
  protected $documentRemoveDataType = '';
  protected $filterType = ExistenceFilter::class;
  protected $filterDataType = '';
  protected $targetChangeType = TargetChange::class;
  protected $targetChangeDataType = '';

  /**
   * @param DocumentChange
   */
  public function setDocumentChange(DocumentChange $documentChange)
  {
    $this->documentChange = $documentChange;
  }
  /**
   * @return DocumentChange
   */
  public function getDocumentChange()
  {
    return $this->documentChange;
  }
  /**
   * @param DocumentDelete
   */
  public function setDocumentDelete(DocumentDelete $documentDelete)
  {
    $this->documentDelete = $documentDelete;
  }
  /**
   * @return DocumentDelete
   */
  public function getDocumentDelete()
  {
    return $this->documentDelete;
  }
  /**
   * @param DocumentRemove
   */
  public function setDocumentRemove(DocumentRemove $documentRemove)
  {
    $this->documentRemove = $documentRemove;
  }
  /**
   * @return DocumentRemove
   */
  public function getDocumentRemove()
  {
    return $this->documentRemove;
  }
  /**
   * @param ExistenceFilter
   */
  public function setFilter(ExistenceFilter $filter)
  {
    $this->filter = $filter;
  }
  /**
   * @return ExistenceFilter
   */
  public function getFilter()
  {
    return $this->filter;
  }
  /**
   * @param TargetChange
   */
  public function setTargetChange(TargetChange $targetChange)
  {
    $this->targetChange = $targetChange;
  }
  /**
   * @return TargetChange
   */
  public function getTargetChange()
  {
    return $this->targetChange;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ListenResponse::class, 'Google_Service_Firestore_ListenResponse');
