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

class GoogleCloudDocumentaiV1ProcessResponse extends \Google\Model
{
  protected $documentType = GoogleCloudDocumentaiV1Document::class;
  protected $documentDataType = '';
  protected $humanReviewStatusType = GoogleCloudDocumentaiV1HumanReviewStatus::class;
  protected $humanReviewStatusDataType = '';

  /**
   * @param GoogleCloudDocumentaiV1Document
   */
  public function setDocument(GoogleCloudDocumentaiV1Document $document)
  {
    $this->document = $document;
  }
  /**
   * @return GoogleCloudDocumentaiV1Document
   */
  public function getDocument()
  {
    return $this->document;
  }
  /**
   * @param GoogleCloudDocumentaiV1HumanReviewStatus
   */
  public function setHumanReviewStatus(GoogleCloudDocumentaiV1HumanReviewStatus $humanReviewStatus)
  {
    $this->humanReviewStatus = $humanReviewStatus;
  }
  /**
   * @return GoogleCloudDocumentaiV1HumanReviewStatus
   */
  public function getHumanReviewStatus()
  {
    return $this->humanReviewStatus;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDocumentaiV1ProcessResponse::class, 'Google_Service_Document_GoogleCloudDocumentaiV1ProcessResponse');
