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

namespace Google\Service\Contentwarehouse;

class GoodocDocument extends \Google\Collection
{
  protected $collection_key = 'page';
  protected $internal_gapi_mappings = [
        "editingHistory" => "EditingHistory",
        "logicalEntity" => "LogicalEntity",
        "logicalEntityMessageName" => "LogicalEntityMessageName",
        "subDocuments" => "SubDocuments",
  ];
  /**
   * @var string[]
   */
  public $editingHistory;
  /**
   * @var string[]
   */
  public $logicalEntity;
  /**
   * @var string[]
   */
  public $logicalEntityMessageName;
  protected $subDocumentsType = GoodocDocument::class;
  protected $subDocumentsDataType = 'array';
  protected $headerType = GoodocDocumentHeader::class;
  protected $headerDataType = '';
  protected $pageType = GoodocDocumentPage::class;
  protected $pageDataType = 'array';

  /**
   * @param string[]
   */
  public function setEditingHistory($editingHistory)
  {
    $this->editingHistory = $editingHistory;
  }
  /**
   * @return string[]
   */
  public function getEditingHistory()
  {
    return $this->editingHistory;
  }
  /**
   * @param string[]
   */
  public function setLogicalEntity($logicalEntity)
  {
    $this->logicalEntity = $logicalEntity;
  }
  /**
   * @return string[]
   */
  public function getLogicalEntity()
  {
    return $this->logicalEntity;
  }
  /**
   * @param string[]
   */
  public function setLogicalEntityMessageName($logicalEntityMessageName)
  {
    $this->logicalEntityMessageName = $logicalEntityMessageName;
  }
  /**
   * @return string[]
   */
  public function getLogicalEntityMessageName()
  {
    return $this->logicalEntityMessageName;
  }
  /**
   * @param GoodocDocument[]
   */
  public function setSubDocuments($subDocuments)
  {
    $this->subDocuments = $subDocuments;
  }
  /**
   * @return GoodocDocument[]
   */
  public function getSubDocuments()
  {
    return $this->subDocuments;
  }
  /**
   * @param GoodocDocumentHeader
   */
  public function setHeader(GoodocDocumentHeader $header)
  {
    $this->header = $header;
  }
  /**
   * @return GoodocDocumentHeader
   */
  public function getHeader()
  {
    return $this->header;
  }
  /**
   * @param GoodocDocumentPage[]
   */
  public function setPage($page)
  {
    $this->page = $page;
  }
  /**
   * @return GoodocDocumentPage[]
   */
  public function getPage()
  {
    return $this->page;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoodocDocument::class, 'Google_Service_Contentwarehouse_GoodocDocument');
