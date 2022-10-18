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

class GoodocSemanticLabel extends \Google\Collection
{
  protected $collection_key = 'snippetfilter';
  protected $internal_gapi_mappings = [
        "alternateText" => "AlternateText",
        "attribute" => "Attribute",
        "chapterStart" => "ChapterStart",
        "cleanupAnnotation" => "CleanupAnnotation",
        "continuesFromPreviousPage" => "ContinuesFromPreviousPage",
        "continuesFromPreviousPageHyphenated" => "ContinuesFromPreviousPageHyphenated",
        "continuesOnNextPage" => "ContinuesOnNextPage",
        "endOfSpanningLabel" => "EndOfSpanningLabel",
        "experimentalData" => "ExperimentalData",
        "flow" => "Flow",
        "modificationRecord" => "ModificationRecord",
        "pageNumberOrdinal" => "PageNumberOrdinal",
  ];
  /**
   * @var string
   */
  public $alternateText;
  /**
   * @var string[]
   */
  public $attribute;
  /**
   * @var bool
   */
  public $chapterStart;
  /**
   * @var int[]
   */
  public $cleanupAnnotation;
  /**
   * @var bool
   */
  public $continuesFromPreviousPage;
  /**
   * @var bool
   */
  public $continuesFromPreviousPageHyphenated;
  /**
   * @var bool
   */
  public $continuesOnNextPage;
  protected $endOfSpanningLabelType = GoodocLogicalEntity::class;
  protected $endOfSpanningLabelDataType = '';
  protected $experimentalDataType = Proto2BridgeMessageSet::class;
  protected $experimentalDataDataType = '';
  /**
   * @var string
   */
  public $flow;
  /**
   * @var string
   */
  public $modificationRecord;
  protected $pageNumberOrdinalType = GoodocOrdinal::class;
  protected $pageNumberOrdinalDataType = '';
  /**
   * @var int
   */
  public $appearance;
  protected $columndetailsType = GoodocSemanticLabelColumnDetails::class;
  protected $columndetailsDataType = '';
  protected $contentlinkType = GoodocSemanticLabelContentLink::class;
  protected $contentlinkDataType = '';
  protected $editcorrectioncandidateType = GoodocSemanticLabelEditCorrectionCandidate::class;
  protected $editcorrectioncandidateDataType = 'array';
  protected $overridesType = GoodocOverrides::class;
  protected $overridesDataType = '';
  protected $snippetfilterType = GoodocSemanticLabelSnippetFilter::class;
  protected $snippetfilterDataType = 'array';
  protected $tablecelldetailsType = GoodocSemanticLabelTableCellDetails::class;
  protected $tablecelldetailsDataType = '';
  protected $tabledetailsType = GoodocSemanticLabelTableDetails::class;
  protected $tabledetailsDataType = '';

  /**
   * @param string
   */
  public function setAlternateText($alternateText)
  {
    $this->alternateText = $alternateText;
  }
  /**
   * @return string
   */
  public function getAlternateText()
  {
    return $this->alternateText;
  }
  /**
   * @param string[]
   */
  public function setAttribute($attribute)
  {
    $this->attribute = $attribute;
  }
  /**
   * @return string[]
   */
  public function getAttribute()
  {
    return $this->attribute;
  }
  /**
   * @param bool
   */
  public function setChapterStart($chapterStart)
  {
    $this->chapterStart = $chapterStart;
  }
  /**
   * @return bool
   */
  public function getChapterStart()
  {
    return $this->chapterStart;
  }
  /**
   * @param int[]
   */
  public function setCleanupAnnotation($cleanupAnnotation)
  {
    $this->cleanupAnnotation = $cleanupAnnotation;
  }
  /**
   * @return int[]
   */
  public function getCleanupAnnotation()
  {
    return $this->cleanupAnnotation;
  }
  /**
   * @param bool
   */
  public function setContinuesFromPreviousPage($continuesFromPreviousPage)
  {
    $this->continuesFromPreviousPage = $continuesFromPreviousPage;
  }
  /**
   * @return bool
   */
  public function getContinuesFromPreviousPage()
  {
    return $this->continuesFromPreviousPage;
  }
  /**
   * @param bool
   */
  public function setContinuesFromPreviousPageHyphenated($continuesFromPreviousPageHyphenated)
  {
    $this->continuesFromPreviousPageHyphenated = $continuesFromPreviousPageHyphenated;
  }
  /**
   * @return bool
   */
  public function getContinuesFromPreviousPageHyphenated()
  {
    return $this->continuesFromPreviousPageHyphenated;
  }
  /**
   * @param bool
   */
  public function setContinuesOnNextPage($continuesOnNextPage)
  {
    $this->continuesOnNextPage = $continuesOnNextPage;
  }
  /**
   * @return bool
   */
  public function getContinuesOnNextPage()
  {
    return $this->continuesOnNextPage;
  }
  /**
   * @param GoodocLogicalEntity
   */
  public function setEndOfSpanningLabel(GoodocLogicalEntity $endOfSpanningLabel)
  {
    $this->endOfSpanningLabel = $endOfSpanningLabel;
  }
  /**
   * @return GoodocLogicalEntity
   */
  public function getEndOfSpanningLabel()
  {
    return $this->endOfSpanningLabel;
  }
  /**
   * @param Proto2BridgeMessageSet
   */
  public function setExperimentalData(Proto2BridgeMessageSet $experimentalData)
  {
    $this->experimentalData = $experimentalData;
  }
  /**
   * @return Proto2BridgeMessageSet
   */
  public function getExperimentalData()
  {
    return $this->experimentalData;
  }
  /**
   * @param string
   */
  public function setFlow($flow)
  {
    $this->flow = $flow;
  }
  /**
   * @return string
   */
  public function getFlow()
  {
    return $this->flow;
  }
  /**
   * @param string
   */
  public function setModificationRecord($modificationRecord)
  {
    $this->modificationRecord = $modificationRecord;
  }
  /**
   * @return string
   */
  public function getModificationRecord()
  {
    return $this->modificationRecord;
  }
  /**
   * @param GoodocOrdinal
   */
  public function setPageNumberOrdinal(GoodocOrdinal $pageNumberOrdinal)
  {
    $this->pageNumberOrdinal = $pageNumberOrdinal;
  }
  /**
   * @return GoodocOrdinal
   */
  public function getPageNumberOrdinal()
  {
    return $this->pageNumberOrdinal;
  }
  /**
   * @param int
   */
  public function setAppearance($appearance)
  {
    $this->appearance = $appearance;
  }
  /**
   * @return int
   */
  public function getAppearance()
  {
    return $this->appearance;
  }
  /**
   * @param GoodocSemanticLabelColumnDetails
   */
  public function setColumndetails(GoodocSemanticLabelColumnDetails $columndetails)
  {
    $this->columndetails = $columndetails;
  }
  /**
   * @return GoodocSemanticLabelColumnDetails
   */
  public function getColumndetails()
  {
    return $this->columndetails;
  }
  /**
   * @param GoodocSemanticLabelContentLink
   */
  public function setContentlink(GoodocSemanticLabelContentLink $contentlink)
  {
    $this->contentlink = $contentlink;
  }
  /**
   * @return GoodocSemanticLabelContentLink
   */
  public function getContentlink()
  {
    return $this->contentlink;
  }
  /**
   * @param GoodocSemanticLabelEditCorrectionCandidate[]
   */
  public function setEditcorrectioncandidate($editcorrectioncandidate)
  {
    $this->editcorrectioncandidate = $editcorrectioncandidate;
  }
  /**
   * @return GoodocSemanticLabelEditCorrectionCandidate[]
   */
  public function getEditcorrectioncandidate()
  {
    return $this->editcorrectioncandidate;
  }
  /**
   * @param GoodocOverrides
   */
  public function setOverrides(GoodocOverrides $overrides)
  {
    $this->overrides = $overrides;
  }
  /**
   * @return GoodocOverrides
   */
  public function getOverrides()
  {
    return $this->overrides;
  }
  /**
   * @param GoodocSemanticLabelSnippetFilter[]
   */
  public function setSnippetfilter($snippetfilter)
  {
    $this->snippetfilter = $snippetfilter;
  }
  /**
   * @return GoodocSemanticLabelSnippetFilter[]
   */
  public function getSnippetfilter()
  {
    return $this->snippetfilter;
  }
  /**
   * @param GoodocSemanticLabelTableCellDetails
   */
  public function setTablecelldetails(GoodocSemanticLabelTableCellDetails $tablecelldetails)
  {
    $this->tablecelldetails = $tablecelldetails;
  }
  /**
   * @return GoodocSemanticLabelTableCellDetails
   */
  public function getTablecelldetails()
  {
    return $this->tablecelldetails;
  }
  /**
   * @param GoodocSemanticLabelTableDetails
   */
  public function setTabledetails(GoodocSemanticLabelTableDetails $tabledetails)
  {
    $this->tabledetails = $tabledetails;
  }
  /**
   * @return GoodocSemanticLabelTableDetails
   */
  public function getTabledetails()
  {
    return $this->tabledetails;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoodocSemanticLabel::class, 'Google_Service_Contentwarehouse_GoodocSemanticLabel');
