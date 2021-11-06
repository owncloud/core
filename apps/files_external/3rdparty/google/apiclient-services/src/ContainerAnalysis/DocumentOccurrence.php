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

namespace Google\Service\ContainerAnalysis;

class DocumentOccurrence extends \Google\Collection
{
  protected $collection_key = 'externalDocumentRefs';
  public $createTime;
  public $creatorComment;
  public $creators;
  public $documentComment;
  public $externalDocumentRefs;
  public $id;
  public $licenseListVersion;
  public $namespace;
  public $title;

  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  public function getCreateTime()
  {
    return $this->createTime;
  }
  public function setCreatorComment($creatorComment)
  {
    $this->creatorComment = $creatorComment;
  }
  public function getCreatorComment()
  {
    return $this->creatorComment;
  }
  public function setCreators($creators)
  {
    $this->creators = $creators;
  }
  public function getCreators()
  {
    return $this->creators;
  }
  public function setDocumentComment($documentComment)
  {
    $this->documentComment = $documentComment;
  }
  public function getDocumentComment()
  {
    return $this->documentComment;
  }
  public function setExternalDocumentRefs($externalDocumentRefs)
  {
    $this->externalDocumentRefs = $externalDocumentRefs;
  }
  public function getExternalDocumentRefs()
  {
    return $this->externalDocumentRefs;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setLicenseListVersion($licenseListVersion)
  {
    $this->licenseListVersion = $licenseListVersion;
  }
  public function getLicenseListVersion()
  {
    return $this->licenseListVersion;
  }
  public function setNamespace($namespace)
  {
    $this->namespace = $namespace;
  }
  public function getNamespace()
  {
    return $this->namespace;
  }
  public function setTitle($title)
  {
    $this->title = $title;
  }
  public function getTitle()
  {
    return $this->title;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DocumentOccurrence::class, 'Google_Service_ContainerAnalysis_DocumentOccurrence');
