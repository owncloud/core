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

namespace Google\Service\CloudHealthcare;

class AnalyzeEntitiesRequest extends \Google\Collection
{
  protected $collection_key = 'licensedVocabularies';
  public $documentContent;
  public $licensedVocabularies;

  public function setDocumentContent($documentContent)
  {
    $this->documentContent = $documentContent;
  }
  public function getDocumentContent()
  {
    return $this->documentContent;
  }
  public function setLicensedVocabularies($licensedVocabularies)
  {
    $this->licensedVocabularies = $licensedVocabularies;
  }
  public function getLicensedVocabularies()
  {
    return $this->licensedVocabularies;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AnalyzeEntitiesRequest::class, 'Google_Service_CloudHealthcare_AnalyzeEntitiesRequest');
