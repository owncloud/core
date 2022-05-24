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

class Write extends \Google\Collection
{
  protected $collection_key = 'updateTransforms';
  protected $currentDocumentType = Precondition::class;
  protected $currentDocumentDataType = '';
  /**
   * @var string
   */
  public $delete;
  protected $transformType = DocumentTransform::class;
  protected $transformDataType = '';
  protected $updateType = Document::class;
  protected $updateDataType = '';
  protected $updateMaskType = DocumentMask::class;
  protected $updateMaskDataType = '';
  protected $updateTransformsType = FieldTransform::class;
  protected $updateTransformsDataType = 'array';

  /**
   * @param Precondition
   */
  public function setCurrentDocument(Precondition $currentDocument)
  {
    $this->currentDocument = $currentDocument;
  }
  /**
   * @return Precondition
   */
  public function getCurrentDocument()
  {
    return $this->currentDocument;
  }
  /**
   * @param string
   */
  public function setDelete($delete)
  {
    $this->delete = $delete;
  }
  /**
   * @return string
   */
  public function getDelete()
  {
    return $this->delete;
  }
  /**
   * @param DocumentTransform
   */
  public function setTransform(DocumentTransform $transform)
  {
    $this->transform = $transform;
  }
  /**
   * @return DocumentTransform
   */
  public function getTransform()
  {
    return $this->transform;
  }
  /**
   * @param Document
   */
  public function setUpdate(Document $update)
  {
    $this->update = $update;
  }
  /**
   * @return Document
   */
  public function getUpdate()
  {
    return $this->update;
  }
  /**
   * @param DocumentMask
   */
  public function setUpdateMask(DocumentMask $updateMask)
  {
    $this->updateMask = $updateMask;
  }
  /**
   * @return DocumentMask
   */
  public function getUpdateMask()
  {
    return $this->updateMask;
  }
  /**
   * @param FieldTransform[]
   */
  public function setUpdateTransforms($updateTransforms)
  {
    $this->updateTransforms = $updateTransforms;
  }
  /**
   * @return FieldTransform[]
   */
  public function getUpdateTransforms()
  {
    return $this->updateTransforms;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Write::class, 'Google_Service_Firestore_Write');
