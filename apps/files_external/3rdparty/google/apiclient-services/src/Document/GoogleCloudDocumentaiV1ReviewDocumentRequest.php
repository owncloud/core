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

class GoogleCloudDocumentaiV1ReviewDocumentRequest extends \Google\Model
{
  public $enableSchemaValidation;
  protected $inlineDocumentType = GoogleCloudDocumentaiV1Document::class;
  protected $inlineDocumentDataType = '';
  public $priority;

  public function setEnableSchemaValidation($enableSchemaValidation)
  {
    $this->enableSchemaValidation = $enableSchemaValidation;
  }
  public function getEnableSchemaValidation()
  {
    return $this->enableSchemaValidation;
  }
  /**
   * @param GoogleCloudDocumentaiV1Document
   */
  public function setInlineDocument(GoogleCloudDocumentaiV1Document $inlineDocument)
  {
    $this->inlineDocument = $inlineDocument;
  }
  /**
   * @return GoogleCloudDocumentaiV1Document
   */
  public function getInlineDocument()
  {
    return $this->inlineDocument;
  }
  public function setPriority($priority)
  {
    $this->priority = $priority;
  }
  public function getPriority()
  {
    return $this->priority;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDocumentaiV1ReviewDocumentRequest::class, 'Google_Service_Document_GoogleCloudDocumentaiV1ReviewDocumentRequest');
