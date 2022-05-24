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

namespace Google\Service\Sheets;

class Response extends \Google\Model
{
  protected $addBandingType = AddBandingResponse::class;
  protected $addBandingDataType = '';
  protected $addChartType = AddChartResponse::class;
  protected $addChartDataType = '';
  protected $addDataSourceType = AddDataSourceResponse::class;
  protected $addDataSourceDataType = '';
  protected $addDimensionGroupType = AddDimensionGroupResponse::class;
  protected $addDimensionGroupDataType = '';
  protected $addFilterViewType = AddFilterViewResponse::class;
  protected $addFilterViewDataType = '';
  protected $addNamedRangeType = AddNamedRangeResponse::class;
  protected $addNamedRangeDataType = '';
  protected $addProtectedRangeType = AddProtectedRangeResponse::class;
  protected $addProtectedRangeDataType = '';
  protected $addSheetType = AddSheetResponse::class;
  protected $addSheetDataType = '';
  protected $addSlicerType = AddSlicerResponse::class;
  protected $addSlicerDataType = '';
  protected $createDeveloperMetadataType = CreateDeveloperMetadataResponse::class;
  protected $createDeveloperMetadataDataType = '';
  protected $deleteConditionalFormatRuleType = DeleteConditionalFormatRuleResponse::class;
  protected $deleteConditionalFormatRuleDataType = '';
  protected $deleteDeveloperMetadataType = DeleteDeveloperMetadataResponse::class;
  protected $deleteDeveloperMetadataDataType = '';
  protected $deleteDimensionGroupType = DeleteDimensionGroupResponse::class;
  protected $deleteDimensionGroupDataType = '';
  protected $deleteDuplicatesType = DeleteDuplicatesResponse::class;
  protected $deleteDuplicatesDataType = '';
  protected $duplicateFilterViewType = DuplicateFilterViewResponse::class;
  protected $duplicateFilterViewDataType = '';
  protected $duplicateSheetType = DuplicateSheetResponse::class;
  protected $duplicateSheetDataType = '';
  protected $findReplaceType = FindReplaceResponse::class;
  protected $findReplaceDataType = '';
  protected $refreshDataSourceType = RefreshDataSourceResponse::class;
  protected $refreshDataSourceDataType = '';
  protected $trimWhitespaceType = TrimWhitespaceResponse::class;
  protected $trimWhitespaceDataType = '';
  protected $updateConditionalFormatRuleType = UpdateConditionalFormatRuleResponse::class;
  protected $updateConditionalFormatRuleDataType = '';
  protected $updateDataSourceType = UpdateDataSourceResponse::class;
  protected $updateDataSourceDataType = '';
  protected $updateDeveloperMetadataType = UpdateDeveloperMetadataResponse::class;
  protected $updateDeveloperMetadataDataType = '';
  protected $updateEmbeddedObjectPositionType = UpdateEmbeddedObjectPositionResponse::class;
  protected $updateEmbeddedObjectPositionDataType = '';

  /**
   * @param AddBandingResponse
   */
  public function setAddBanding(AddBandingResponse $addBanding)
  {
    $this->addBanding = $addBanding;
  }
  /**
   * @return AddBandingResponse
   */
  public function getAddBanding()
  {
    return $this->addBanding;
  }
  /**
   * @param AddChartResponse
   */
  public function setAddChart(AddChartResponse $addChart)
  {
    $this->addChart = $addChart;
  }
  /**
   * @return AddChartResponse
   */
  public function getAddChart()
  {
    return $this->addChart;
  }
  /**
   * @param AddDataSourceResponse
   */
  public function setAddDataSource(AddDataSourceResponse $addDataSource)
  {
    $this->addDataSource = $addDataSource;
  }
  /**
   * @return AddDataSourceResponse
   */
  public function getAddDataSource()
  {
    return $this->addDataSource;
  }
  /**
   * @param AddDimensionGroupResponse
   */
  public function setAddDimensionGroup(AddDimensionGroupResponse $addDimensionGroup)
  {
    $this->addDimensionGroup = $addDimensionGroup;
  }
  /**
   * @return AddDimensionGroupResponse
   */
  public function getAddDimensionGroup()
  {
    return $this->addDimensionGroup;
  }
  /**
   * @param AddFilterViewResponse
   */
  public function setAddFilterView(AddFilterViewResponse $addFilterView)
  {
    $this->addFilterView = $addFilterView;
  }
  /**
   * @return AddFilterViewResponse
   */
  public function getAddFilterView()
  {
    return $this->addFilterView;
  }
  /**
   * @param AddNamedRangeResponse
   */
  public function setAddNamedRange(AddNamedRangeResponse $addNamedRange)
  {
    $this->addNamedRange = $addNamedRange;
  }
  /**
   * @return AddNamedRangeResponse
   */
  public function getAddNamedRange()
  {
    return $this->addNamedRange;
  }
  /**
   * @param AddProtectedRangeResponse
   */
  public function setAddProtectedRange(AddProtectedRangeResponse $addProtectedRange)
  {
    $this->addProtectedRange = $addProtectedRange;
  }
  /**
   * @return AddProtectedRangeResponse
   */
  public function getAddProtectedRange()
  {
    return $this->addProtectedRange;
  }
  /**
   * @param AddSheetResponse
   */
  public function setAddSheet(AddSheetResponse $addSheet)
  {
    $this->addSheet = $addSheet;
  }
  /**
   * @return AddSheetResponse
   */
  public function getAddSheet()
  {
    return $this->addSheet;
  }
  /**
   * @param AddSlicerResponse
   */
  public function setAddSlicer(AddSlicerResponse $addSlicer)
  {
    $this->addSlicer = $addSlicer;
  }
  /**
   * @return AddSlicerResponse
   */
  public function getAddSlicer()
  {
    return $this->addSlicer;
  }
  /**
   * @param CreateDeveloperMetadataResponse
   */
  public function setCreateDeveloperMetadata(CreateDeveloperMetadataResponse $createDeveloperMetadata)
  {
    $this->createDeveloperMetadata = $createDeveloperMetadata;
  }
  /**
   * @return CreateDeveloperMetadataResponse
   */
  public function getCreateDeveloperMetadata()
  {
    return $this->createDeveloperMetadata;
  }
  /**
   * @param DeleteConditionalFormatRuleResponse
   */
  public function setDeleteConditionalFormatRule(DeleteConditionalFormatRuleResponse $deleteConditionalFormatRule)
  {
    $this->deleteConditionalFormatRule = $deleteConditionalFormatRule;
  }
  /**
   * @return DeleteConditionalFormatRuleResponse
   */
  public function getDeleteConditionalFormatRule()
  {
    return $this->deleteConditionalFormatRule;
  }
  /**
   * @param DeleteDeveloperMetadataResponse
   */
  public function setDeleteDeveloperMetadata(DeleteDeveloperMetadataResponse $deleteDeveloperMetadata)
  {
    $this->deleteDeveloperMetadata = $deleteDeveloperMetadata;
  }
  /**
   * @return DeleteDeveloperMetadataResponse
   */
  public function getDeleteDeveloperMetadata()
  {
    return $this->deleteDeveloperMetadata;
  }
  /**
   * @param DeleteDimensionGroupResponse
   */
  public function setDeleteDimensionGroup(DeleteDimensionGroupResponse $deleteDimensionGroup)
  {
    $this->deleteDimensionGroup = $deleteDimensionGroup;
  }
  /**
   * @return DeleteDimensionGroupResponse
   */
  public function getDeleteDimensionGroup()
  {
    return $this->deleteDimensionGroup;
  }
  /**
   * @param DeleteDuplicatesResponse
   */
  public function setDeleteDuplicates(DeleteDuplicatesResponse $deleteDuplicates)
  {
    $this->deleteDuplicates = $deleteDuplicates;
  }
  /**
   * @return DeleteDuplicatesResponse
   */
  public function getDeleteDuplicates()
  {
    return $this->deleteDuplicates;
  }
  /**
   * @param DuplicateFilterViewResponse
   */
  public function setDuplicateFilterView(DuplicateFilterViewResponse $duplicateFilterView)
  {
    $this->duplicateFilterView = $duplicateFilterView;
  }
  /**
   * @return DuplicateFilterViewResponse
   */
  public function getDuplicateFilterView()
  {
    return $this->duplicateFilterView;
  }
  /**
   * @param DuplicateSheetResponse
   */
  public function setDuplicateSheet(DuplicateSheetResponse $duplicateSheet)
  {
    $this->duplicateSheet = $duplicateSheet;
  }
  /**
   * @return DuplicateSheetResponse
   */
  public function getDuplicateSheet()
  {
    return $this->duplicateSheet;
  }
  /**
   * @param FindReplaceResponse
   */
  public function setFindReplace(FindReplaceResponse $findReplace)
  {
    $this->findReplace = $findReplace;
  }
  /**
   * @return FindReplaceResponse
   */
  public function getFindReplace()
  {
    return $this->findReplace;
  }
  /**
   * @param RefreshDataSourceResponse
   */
  public function setRefreshDataSource(RefreshDataSourceResponse $refreshDataSource)
  {
    $this->refreshDataSource = $refreshDataSource;
  }
  /**
   * @return RefreshDataSourceResponse
   */
  public function getRefreshDataSource()
  {
    return $this->refreshDataSource;
  }
  /**
   * @param TrimWhitespaceResponse
   */
  public function setTrimWhitespace(TrimWhitespaceResponse $trimWhitespace)
  {
    $this->trimWhitespace = $trimWhitespace;
  }
  /**
   * @return TrimWhitespaceResponse
   */
  public function getTrimWhitespace()
  {
    return $this->trimWhitespace;
  }
  /**
   * @param UpdateConditionalFormatRuleResponse
   */
  public function setUpdateConditionalFormatRule(UpdateConditionalFormatRuleResponse $updateConditionalFormatRule)
  {
    $this->updateConditionalFormatRule = $updateConditionalFormatRule;
  }
  /**
   * @return UpdateConditionalFormatRuleResponse
   */
  public function getUpdateConditionalFormatRule()
  {
    return $this->updateConditionalFormatRule;
  }
  /**
   * @param UpdateDataSourceResponse
   */
  public function setUpdateDataSource(UpdateDataSourceResponse $updateDataSource)
  {
    $this->updateDataSource = $updateDataSource;
  }
  /**
   * @return UpdateDataSourceResponse
   */
  public function getUpdateDataSource()
  {
    return $this->updateDataSource;
  }
  /**
   * @param UpdateDeveloperMetadataResponse
   */
  public function setUpdateDeveloperMetadata(UpdateDeveloperMetadataResponse $updateDeveloperMetadata)
  {
    $this->updateDeveloperMetadata = $updateDeveloperMetadata;
  }
  /**
   * @return UpdateDeveloperMetadataResponse
   */
  public function getUpdateDeveloperMetadata()
  {
    return $this->updateDeveloperMetadata;
  }
  /**
   * @param UpdateEmbeddedObjectPositionResponse
   */
  public function setUpdateEmbeddedObjectPosition(UpdateEmbeddedObjectPositionResponse $updateEmbeddedObjectPosition)
  {
    $this->updateEmbeddedObjectPosition = $updateEmbeddedObjectPosition;
  }
  /**
   * @return UpdateEmbeddedObjectPositionResponse
   */
  public function getUpdateEmbeddedObjectPosition()
  {
    return $this->updateEmbeddedObjectPosition;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Response::class, 'Google_Service_Sheets_Response');
