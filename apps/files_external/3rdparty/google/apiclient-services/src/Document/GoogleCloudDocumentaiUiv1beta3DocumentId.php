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

class GoogleCloudDocumentaiUiv1beta3DocumentId extends \Google\Model
{
  protected $gcsManagedDocIdType = GoogleCloudDocumentaiUiv1beta3DocumentIdGCSManagedDocumentId::class;
  protected $gcsManagedDocIdDataType = '';
  protected $revisionReferenceType = GoogleCloudDocumentaiUiv1beta3RevisionReference::class;
  protected $revisionReferenceDataType = '';

  /**
   * @param GoogleCloudDocumentaiUiv1beta3DocumentIdGCSManagedDocumentId
   */
  public function setGcsManagedDocId(GoogleCloudDocumentaiUiv1beta3DocumentIdGCSManagedDocumentId $gcsManagedDocId)
  {
    $this->gcsManagedDocId = $gcsManagedDocId;
  }
  /**
   * @return GoogleCloudDocumentaiUiv1beta3DocumentIdGCSManagedDocumentId
   */
  public function getGcsManagedDocId()
  {
    return $this->gcsManagedDocId;
  }
  /**
   * @param GoogleCloudDocumentaiUiv1beta3RevisionReference
   */
  public function setRevisionReference(GoogleCloudDocumentaiUiv1beta3RevisionReference $revisionReference)
  {
    $this->revisionReference = $revisionReference;
  }
  /**
   * @return GoogleCloudDocumentaiUiv1beta3RevisionReference
   */
  public function getRevisionReference()
  {
    return $this->revisionReference;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDocumentaiUiv1beta3DocumentId::class, 'Google_Service_Document_GoogleCloudDocumentaiUiv1beta3DocumentId');
