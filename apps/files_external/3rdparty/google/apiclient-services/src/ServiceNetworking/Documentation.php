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

namespace Google\Service\ServiceNetworking;

class Documentation extends \Google\Collection
{
  protected $collection_key = 'rules';
  public $documentationRootUrl;
  public $overview;
  protected $pagesType = Page::class;
  protected $pagesDataType = 'array';
  protected $rulesType = DocumentationRule::class;
  protected $rulesDataType = 'array';
  public $serviceRootUrl;
  public $summary;

  public function setDocumentationRootUrl($documentationRootUrl)
  {
    $this->documentationRootUrl = $documentationRootUrl;
  }
  public function getDocumentationRootUrl()
  {
    return $this->documentationRootUrl;
  }
  public function setOverview($overview)
  {
    $this->overview = $overview;
  }
  public function getOverview()
  {
    return $this->overview;
  }
  /**
   * @param Page[]
   */
  public function setPages($pages)
  {
    $this->pages = $pages;
  }
  /**
   * @return Page[]
   */
  public function getPages()
  {
    return $this->pages;
  }
  /**
   * @param DocumentationRule[]
   */
  public function setRules($rules)
  {
    $this->rules = $rules;
  }
  /**
   * @return DocumentationRule[]
   */
  public function getRules()
  {
    return $this->rules;
  }
  public function setServiceRootUrl($serviceRootUrl)
  {
    $this->serviceRootUrl = $serviceRootUrl;
  }
  public function getServiceRootUrl()
  {
    return $this->serviceRootUrl;
  }
  public function setSummary($summary)
  {
    $this->summary = $summary;
  }
  public function getSummary()
  {
    return $this->summary;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Documentation::class, 'Google_Service_ServiceNetworking_Documentation');
