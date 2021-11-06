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

class GoogleCloudDocumentaiV1beta1DocumentProvenance extends \Google\Collection
{
  protected $collection_key = 'parents';
  public $id;
  protected $parentsType = GoogleCloudDocumentaiV1beta1DocumentProvenanceParent::class;
  protected $parentsDataType = 'array';
  public $revision;
  public $type;

  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  /**
   * @param GoogleCloudDocumentaiV1beta1DocumentProvenanceParent[]
   */
  public function setParents($parents)
  {
    $this->parents = $parents;
  }
  /**
   * @return GoogleCloudDocumentaiV1beta1DocumentProvenanceParent[]
   */
  public function getParents()
  {
    return $this->parents;
  }
  public function setRevision($revision)
  {
    $this->revision = $revision;
  }
  public function getRevision()
  {
    return $this->revision;
  }
  public function setType($type)
  {
    $this->type = $type;
  }
  public function getType()
  {
    return $this->type;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDocumentaiV1beta1DocumentProvenance::class, 'Google_Service_Document_GoogleCloudDocumentaiV1beta1DocumentProvenance');
