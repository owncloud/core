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

class Request extends \Google\Model
{
  protected $addBandingType = AddBandingRequest::class;
  protected $addBandingDataType = '';
  protected $addChartType = AddChartRequest::class;
  protected $addChartDataType = '';
  protected $addConditionalFormatRuleType = AddConditionalFormatRuleRequest::class;
  protected $addConditionalFormatRuleDataType = '';
  protected $addDataSourceType = AddDataSourceRequest::class;
  protected $addDataSourceDataType = '';
  protected $addDimensionGroupType = AddDimensionGroupRequest::class;
  protected $addDimensionGroupDataType = '';
  protected $addFilterViewType = AddFilterViewRequest::class;
  protected $addFilterViewDataType = '';
  protected $addNamedRangeType = AddNamedRangeRequest::class;
  protected $addNamedRangeDataType = '';
  protected $addProtectedRangeType = AddProtectedRangeRequest::class;
  protected $addProtectedRangeDataType = '';
  protected $addSheetType = AddSheetRequest::class;
  protected $addSheetDataType = '';
  protected $addSlicerType = AddSlicerRequest::class;
  protected $addSlicerDataType = '';
  protected $appendCellsType = AppendCellsRequest::class;
  protected $appendCellsDataType = '';
  protected $appendDimensionType = AppendDimensionRequest::class;
  protected $appendDimensionDataType = '';
  protected $autoFillType = AutoFillRequest::class;
  protected $autoFillDataType = '';
  protected $autoResizeDimensionsType = AutoResizeDimensionsRequest::class;
  protected $autoResizeDimensionsDataType = '';
  protected $clearBasicFilterType = ClearBasicFilterRequest::class;
  protected $clearBasicFilterDataType = '';
  protected $copyPasteType = CopyPasteRequest::class;
  protected $copyPasteDataType = '';
  protected $createDeveloperMetadataType = CreateDeveloperMetadataRequest::class;
  protected $createDeveloperMetadataDataType = '';
  protected $cutPasteType = CutPasteRequest::class;
  protected $cutPasteDataType = '';
  protected $deleteBandingType = DeleteBandingRequest::class;
  protected $deleteBandingDataType = '';
  protected $deleteConditionalFormatRuleType = DeleteConditionalFormatRuleRequest::class;
  protected $deleteConditionalFormatRuleDataType = '';
  protected $deleteDataSourceType = DeleteDataSourceRequest::class;
  protected $deleteDataSourceDataType = '';
  protected $deleteDeveloperMetadataType = DeleteDeveloperMetadataRequest::class;
  protected $deleteDeveloperMetadataDataType = '';
  protected $deleteDimensionType = DeleteDimensionRequest::class;
  protected $deleteDimensionDataType = '';
  protected $deleteDimensionGroupType = DeleteDimensionGroupRequest::class;
  protected $deleteDimensionGroupDataType = '';
  protected $deleteDuplicatesType = DeleteDuplicatesRequest::class;
  protected $deleteDuplicatesDataType = '';
  protected $deleteEmbeddedObjectType = DeleteEmbeddedObjectRequest::class;
  protected $deleteEmbeddedObjectDataType = '';
  protected $deleteFilterViewType = DeleteFilterViewRequest::class;
  protected $deleteFilterViewDataType = '';
  protected $deleteNamedRangeType = DeleteNamedRangeRequest::class;
  protected $deleteNamedRangeDataType = '';
  protected $deleteProtectedRangeType = DeleteProtectedRangeRequest::class;
  protected $deleteProtectedRangeDataType = '';
  protected $deleteRangeType = DeleteRangeRequest::class;
  protected $deleteRangeDataType = '';
  protected $deleteSheetType = DeleteSheetRequest::class;
  protected $deleteSheetDataType = '';
  protected $duplicateFilterViewType = DuplicateFilterViewRequest::class;
  protected $duplicateFilterViewDataType = '';
  protected $duplicateSheetType = DuplicateSheetRequest::class;
  protected $duplicateSheetDataType = '';
  protected $findReplaceType = FindReplaceRequest::class;
  protected $findReplaceDataType = '';
  protected $insertDimensionType = InsertDimensionRequest::class;
  protected $insertDimensionDataType = '';
  protected $insertRangeType = InsertRangeRequest::class;
  protected $insertRangeDataType = '';
  protected $mergeCellsType = MergeCellsRequest::class;
  protected $mergeCellsDataType = '';
  protected $moveDimensionType = MoveDimensionRequest::class;
  protected $moveDimensionDataType = '';
  protected $pasteDataType = PasteDataRequest::class;
  protected $pasteDataDataType = '';
  protected $randomizeRangeType = RandomizeRangeRequest::class;
  protected $randomizeRangeDataType = '';
  protected $refreshDataSourceType = RefreshDataSourceRequest::class;
  protected $refreshDataSourceDataType = '';
  protected $repeatCellType = RepeatCellRequest::class;
  protected $repeatCellDataType = '';
  protected $setBasicFilterType = SetBasicFilterRequest::class;
  protected $setBasicFilterDataType = '';
  protected $setDataValidationType = SetDataValidationRequest::class;
  protected $setDataValidationDataType = '';
  protected $sortRangeType = SortRangeRequest::class;
  protected $sortRangeDataType = '';
  protected $textToColumnsType = TextToColumnsRequest::class;
  protected $textToColumnsDataType = '';
  protected $trimWhitespaceType = TrimWhitespaceRequest::class;
  protected $trimWhitespaceDataType = '';
  protected $unmergeCellsType = UnmergeCellsRequest::class;
  protected $unmergeCellsDataType = '';
  protected $updateBandingType = UpdateBandingRequest::class;
  protected $updateBandingDataType = '';
  protected $updateBordersType = UpdateBordersRequest::class;
  protected $updateBordersDataType = '';
  protected $updateCellsType = UpdateCellsRequest::class;
  protected $updateCellsDataType = '';
  protected $updateChartSpecType = UpdateChartSpecRequest::class;
  protected $updateChartSpecDataType = '';
  protected $updateConditionalFormatRuleType = UpdateConditionalFormatRuleRequest::class;
  protected $updateConditionalFormatRuleDataType = '';
  protected $updateDataSourceType = UpdateDataSourceRequest::class;
  protected $updateDataSourceDataType = '';
  protected $updateDeveloperMetadataType = UpdateDeveloperMetadataRequest::class;
  protected $updateDeveloperMetadataDataType = '';
  protected $updateDimensionGroupType = UpdateDimensionGroupRequest::class;
  protected $updateDimensionGroupDataType = '';
  protected $updateDimensionPropertiesType = UpdateDimensionPropertiesRequest::class;
  protected $updateDimensionPropertiesDataType = '';
  protected $updateEmbeddedObjectBorderType = UpdateEmbeddedObjectBorderRequest::class;
  protected $updateEmbeddedObjectBorderDataType = '';
  protected $updateEmbeddedObjectPositionType = UpdateEmbeddedObjectPositionRequest::class;
  protected $updateEmbeddedObjectPositionDataType = '';
  protected $updateFilterViewType = UpdateFilterViewRequest::class;
  protected $updateFilterViewDataType = '';
  protected $updateNamedRangeType = UpdateNamedRangeRequest::class;
  protected $updateNamedRangeDataType = '';
  protected $updateProtectedRangeType = UpdateProtectedRangeRequest::class;
  protected $updateProtectedRangeDataType = '';
  protected $updateSheetPropertiesType = UpdateSheetPropertiesRequest::class;
  protected $updateSheetPropertiesDataType = '';
  protected $updateSlicerSpecType = UpdateSlicerSpecRequest::class;
  protected $updateSlicerSpecDataType = '';
  protected $updateSpreadsheetPropertiesType = UpdateSpreadsheetPropertiesRequest::class;
  protected $updateSpreadsheetPropertiesDataType = '';

  /**
   * @param AddBandingRequest
   */
  public function setAddBanding(AddBandingRequest $addBanding)
  {
    $this->addBanding = $addBanding;
  }
  /**
   * @return AddBandingRequest
   */
  public function getAddBanding()
  {
    return $this->addBanding;
  }
  /**
   * @param AddChartRequest
   */
  public function setAddChart(AddChartRequest $addChart)
  {
    $this->addChart = $addChart;
  }
  /**
   * @return AddChartRequest
   */
  public function getAddChart()
  {
    return $this->addChart;
  }
  /**
   * @param AddConditionalFormatRuleRequest
   */
  public function setAddConditionalFormatRule(AddConditionalFormatRuleRequest $addConditionalFormatRule)
  {
    $this->addConditionalFormatRule = $addConditionalFormatRule;
  }
  /**
   * @return AddConditionalFormatRuleRequest
   */
  public function getAddConditionalFormatRule()
  {
    return $this->addConditionalFormatRule;
  }
  /**
   * @param AddDataSourceRequest
   */
  public function setAddDataSource(AddDataSourceRequest $addDataSource)
  {
    $this->addDataSource = $addDataSource;
  }
  /**
   * @return AddDataSourceRequest
   */
  public function getAddDataSource()
  {
    return $this->addDataSource;
  }
  /**
   * @param AddDimensionGroupRequest
   */
  public function setAddDimensionGroup(AddDimensionGroupRequest $addDimensionGroup)
  {
    $this->addDimensionGroup = $addDimensionGroup;
  }
  /**
   * @return AddDimensionGroupRequest
   */
  public function getAddDimensionGroup()
  {
    return $this->addDimensionGroup;
  }
  /**
   * @param AddFilterViewRequest
   */
  public function setAddFilterView(AddFilterViewRequest $addFilterView)
  {
    $this->addFilterView = $addFilterView;
  }
  /**
   * @return AddFilterViewRequest
   */
  public function getAddFilterView()
  {
    return $this->addFilterView;
  }
  /**
   * @param AddNamedRangeRequest
   */
  public function setAddNamedRange(AddNamedRangeRequest $addNamedRange)
  {
    $this->addNamedRange = $addNamedRange;
  }
  /**
   * @return AddNamedRangeRequest
   */
  public function getAddNamedRange()
  {
    return $this->addNamedRange;
  }
  /**
   * @param AddProtectedRangeRequest
   */
  public function setAddProtectedRange(AddProtectedRangeRequest $addProtectedRange)
  {
    $this->addProtectedRange = $addProtectedRange;
  }
  /**
   * @return AddProtectedRangeRequest
   */
  public function getAddProtectedRange()
  {
    return $this->addProtectedRange;
  }
  /**
   * @param AddSheetRequest
   */
  public function setAddSheet(AddSheetRequest $addSheet)
  {
    $this->addSheet = $addSheet;
  }
  /**
   * @return AddSheetRequest
   */
  public function getAddSheet()
  {
    return $this->addSheet;
  }
  /**
   * @param AddSlicerRequest
   */
  public function setAddSlicer(AddSlicerRequest $addSlicer)
  {
    $this->addSlicer = $addSlicer;
  }
  /**
   * @return AddSlicerRequest
   */
  public function getAddSlicer()
  {
    return $this->addSlicer;
  }
  /**
   * @param AppendCellsRequest
   */
  public function setAppendCells(AppendCellsRequest $appendCells)
  {
    $this->appendCells = $appendCells;
  }
  /**
   * @return AppendCellsRequest
   */
  public function getAppendCells()
  {
    return $this->appendCells;
  }
  /**
   * @param AppendDimensionRequest
   */
  public function setAppendDimension(AppendDimensionRequest $appendDimension)
  {
    $this->appendDimension = $appendDimension;
  }
  /**
   * @return AppendDimensionRequest
   */
  public function getAppendDimension()
  {
    return $this->appendDimension;
  }
  /**
   * @param AutoFillRequest
   */
  public function setAutoFill(AutoFillRequest $autoFill)
  {
    $this->autoFill = $autoFill;
  }
  /**
   * @return AutoFillRequest
   */
  public function getAutoFill()
  {
    return $this->autoFill;
  }
  /**
   * @param AutoResizeDimensionsRequest
   */
  public function setAutoResizeDimensions(AutoResizeDimensionsRequest $autoResizeDimensions)
  {
    $this->autoResizeDimensions = $autoResizeDimensions;
  }
  /**
   * @return AutoResizeDimensionsRequest
   */
  public function getAutoResizeDimensions()
  {
    return $this->autoResizeDimensions;
  }
  /**
   * @param ClearBasicFilterRequest
   */
  public function setClearBasicFilter(ClearBasicFilterRequest $clearBasicFilter)
  {
    $this->clearBasicFilter = $clearBasicFilter;
  }
  /**
   * @return ClearBasicFilterRequest
   */
  public function getClearBasicFilter()
  {
    return $this->clearBasicFilter;
  }
  /**
   * @param CopyPasteRequest
   */
  public function setCopyPaste(CopyPasteRequest $copyPaste)
  {
    $this->copyPaste = $copyPaste;
  }
  /**
   * @return CopyPasteRequest
   */
  public function getCopyPaste()
  {
    return $this->copyPaste;
  }
  /**
   * @param CreateDeveloperMetadataRequest
   */
  public function setCreateDeveloperMetadata(CreateDeveloperMetadataRequest $createDeveloperMetadata)
  {
    $this->createDeveloperMetadata = $createDeveloperMetadata;
  }
  /**
   * @return CreateDeveloperMetadataRequest
   */
  public function getCreateDeveloperMetadata()
  {
    return $this->createDeveloperMetadata;
  }
  /**
   * @param CutPasteRequest
   */
  public function setCutPaste(CutPasteRequest $cutPaste)
  {
    $this->cutPaste = $cutPaste;
  }
  /**
   * @return CutPasteRequest
   */
  public function getCutPaste()
  {
    return $this->cutPaste;
  }
  /**
   * @param DeleteBandingRequest
   */
  public function setDeleteBanding(DeleteBandingRequest $deleteBanding)
  {
    $this->deleteBanding = $deleteBanding;
  }
  /**
   * @return DeleteBandingRequest
   */
  public function getDeleteBanding()
  {
    return $this->deleteBanding;
  }
  /**
   * @param DeleteConditionalFormatRuleRequest
   */
  public function setDeleteConditionalFormatRule(DeleteConditionalFormatRuleRequest $deleteConditionalFormatRule)
  {
    $this->deleteConditionalFormatRule = $deleteConditionalFormatRule;
  }
  /**
   * @return DeleteConditionalFormatRuleRequest
   */
  public function getDeleteConditionalFormatRule()
  {
    return $this->deleteConditionalFormatRule;
  }
  /**
   * @param DeleteDataSourceRequest
   */
  public function setDeleteDataSource(DeleteDataSourceRequest $deleteDataSource)
  {
    $this->deleteDataSource = $deleteDataSource;
  }
  /**
   * @return DeleteDataSourceRequest
   */
  public function getDeleteDataSource()
  {
    return $this->deleteDataSource;
  }
  /**
   * @param DeleteDeveloperMetadataRequest
   */
  public function setDeleteDeveloperMetadata(DeleteDeveloperMetadataRequest $deleteDeveloperMetadata)
  {
    $this->deleteDeveloperMetadata = $deleteDeveloperMetadata;
  }
  /**
   * @return DeleteDeveloperMetadataRequest
   */
  public function getDeleteDeveloperMetadata()
  {
    return $this->deleteDeveloperMetadata;
  }
  /**
   * @param DeleteDimensionRequest
   */
  public function setDeleteDimension(DeleteDimensionRequest $deleteDimension)
  {
    $this->deleteDimension = $deleteDimension;
  }
  /**
   * @return DeleteDimensionRequest
   */
  public function getDeleteDimension()
  {
    return $this->deleteDimension;
  }
  /**
   * @param DeleteDimensionGroupRequest
   */
  public function setDeleteDimensionGroup(DeleteDimensionGroupRequest $deleteDimensionGroup)
  {
    $this->deleteDimensionGroup = $deleteDimensionGroup;
  }
  /**
   * @return DeleteDimensionGroupRequest
   */
  public function getDeleteDimensionGroup()
  {
    return $this->deleteDimensionGroup;
  }
  /**
   * @param DeleteDuplicatesRequest
   */
  public function setDeleteDuplicates(DeleteDuplicatesRequest $deleteDuplicates)
  {
    $this->deleteDuplicates = $deleteDuplicates;
  }
  /**
   * @return DeleteDuplicatesRequest
   */
  public function getDeleteDuplicates()
  {
    return $this->deleteDuplicates;
  }
  /**
   * @param DeleteEmbeddedObjectRequest
   */
  public function setDeleteEmbeddedObject(DeleteEmbeddedObjectRequest $deleteEmbeddedObject)
  {
    $this->deleteEmbeddedObject = $deleteEmbeddedObject;
  }
  /**
   * @return DeleteEmbeddedObjectRequest
   */
  public function getDeleteEmbeddedObject()
  {
    return $this->deleteEmbeddedObject;
  }
  /**
   * @param DeleteFilterViewRequest
   */
  public function setDeleteFilterView(DeleteFilterViewRequest $deleteFilterView)
  {
    $this->deleteFilterView = $deleteFilterView;
  }
  /**
   * @return DeleteFilterViewRequest
   */
  public function getDeleteFilterView()
  {
    return $this->deleteFilterView;
  }
  /**
   * @param DeleteNamedRangeRequest
   */
  public function setDeleteNamedRange(DeleteNamedRangeRequest $deleteNamedRange)
  {
    $this->deleteNamedRange = $deleteNamedRange;
  }
  /**
   * @return DeleteNamedRangeRequest
   */
  public function getDeleteNamedRange()
  {
    return $this->deleteNamedRange;
  }
  /**
   * @param DeleteProtectedRangeRequest
   */
  public function setDeleteProtectedRange(DeleteProtectedRangeRequest $deleteProtectedRange)
  {
    $this->deleteProtectedRange = $deleteProtectedRange;
  }
  /**
   * @return DeleteProtectedRangeRequest
   */
  public function getDeleteProtectedRange()
  {
    return $this->deleteProtectedRange;
  }
  /**
   * @param DeleteRangeRequest
   */
  public function setDeleteRange(DeleteRangeRequest $deleteRange)
  {
    $this->deleteRange = $deleteRange;
  }
  /**
   * @return DeleteRangeRequest
   */
  public function getDeleteRange()
  {
    return $this->deleteRange;
  }
  /**
   * @param DeleteSheetRequest
   */
  public function setDeleteSheet(DeleteSheetRequest $deleteSheet)
  {
    $this->deleteSheet = $deleteSheet;
  }
  /**
   * @return DeleteSheetRequest
   */
  public function getDeleteSheet()
  {
    return $this->deleteSheet;
  }
  /**
   * @param DuplicateFilterViewRequest
   */
  public function setDuplicateFilterView(DuplicateFilterViewRequest $duplicateFilterView)
  {
    $this->duplicateFilterView = $duplicateFilterView;
  }
  /**
   * @return DuplicateFilterViewRequest
   */
  public function getDuplicateFilterView()
  {
    return $this->duplicateFilterView;
  }
  /**
   * @param DuplicateSheetRequest
   */
  public function setDuplicateSheet(DuplicateSheetRequest $duplicateSheet)
  {
    $this->duplicateSheet = $duplicateSheet;
  }
  /**
   * @return DuplicateSheetRequest
   */
  public function getDuplicateSheet()
  {
    return $this->duplicateSheet;
  }
  /**
   * @param FindReplaceRequest
   */
  public function setFindReplace(FindReplaceRequest $findReplace)
  {
    $this->findReplace = $findReplace;
  }
  /**
   * @return FindReplaceRequest
   */
  public function getFindReplace()
  {
    return $this->findReplace;
  }
  /**
   * @param InsertDimensionRequest
   */
  public function setInsertDimension(InsertDimensionRequest $insertDimension)
  {
    $this->insertDimension = $insertDimension;
  }
  /**
   * @return InsertDimensionRequest
   */
  public function getInsertDimension()
  {
    return $this->insertDimension;
  }
  /**
   * @param InsertRangeRequest
   */
  public function setInsertRange(InsertRangeRequest $insertRange)
  {
    $this->insertRange = $insertRange;
  }
  /**
   * @return InsertRangeRequest
   */
  public function getInsertRange()
  {
    return $this->insertRange;
  }
  /**
   * @param MergeCellsRequest
   */
  public function setMergeCells(MergeCellsRequest $mergeCells)
  {
    $this->mergeCells = $mergeCells;
  }
  /**
   * @return MergeCellsRequest
   */
  public function getMergeCells()
  {
    return $this->mergeCells;
  }
  /**
   * @param MoveDimensionRequest
   */
  public function setMoveDimension(MoveDimensionRequest $moveDimension)
  {
    $this->moveDimension = $moveDimension;
  }
  /**
   * @return MoveDimensionRequest
   */
  public function getMoveDimension()
  {
    return $this->moveDimension;
  }
  /**
   * @param PasteDataRequest
   */
  public function setPasteData(PasteDataRequest $pasteData)
  {
    $this->pasteData = $pasteData;
  }
  /**
   * @return PasteDataRequest
   */
  public function getPasteData()
  {
    return $this->pasteData;
  }
  /**
   * @param RandomizeRangeRequest
   */
  public function setRandomizeRange(RandomizeRangeRequest $randomizeRange)
  {
    $this->randomizeRange = $randomizeRange;
  }
  /**
   * @return RandomizeRangeRequest
   */
  public function getRandomizeRange()
  {
    return $this->randomizeRange;
  }
  /**
   * @param RefreshDataSourceRequest
   */
  public function setRefreshDataSource(RefreshDataSourceRequest $refreshDataSource)
  {
    $this->refreshDataSource = $refreshDataSource;
  }
  /**
   * @return RefreshDataSourceRequest
   */
  public function getRefreshDataSource()
  {
    return $this->refreshDataSource;
  }
  /**
   * @param RepeatCellRequest
   */
  public function setRepeatCell(RepeatCellRequest $repeatCell)
  {
    $this->repeatCell = $repeatCell;
  }
  /**
   * @return RepeatCellRequest
   */
  public function getRepeatCell()
  {
    return $this->repeatCell;
  }
  /**
   * @param SetBasicFilterRequest
   */
  public function setSetBasicFilter(SetBasicFilterRequest $setBasicFilter)
  {
    $this->setBasicFilter = $setBasicFilter;
  }
  /**
   * @return SetBasicFilterRequest
   */
  public function getSetBasicFilter()
  {
    return $this->setBasicFilter;
  }
  /**
   * @param SetDataValidationRequest
   */
  public function setSetDataValidation(SetDataValidationRequest $setDataValidation)
  {
    $this->setDataValidation = $setDataValidation;
  }
  /**
   * @return SetDataValidationRequest
   */
  public function getSetDataValidation()
  {
    return $this->setDataValidation;
  }
  /**
   * @param SortRangeRequest
   */
  public function setSortRange(SortRangeRequest $sortRange)
  {
    $this->sortRange = $sortRange;
  }
  /**
   * @return SortRangeRequest
   */
  public function getSortRange()
  {
    return $this->sortRange;
  }
  /**
   * @param TextToColumnsRequest
   */
  public function setTextToColumns(TextToColumnsRequest $textToColumns)
  {
    $this->textToColumns = $textToColumns;
  }
  /**
   * @return TextToColumnsRequest
   */
  public function getTextToColumns()
  {
    return $this->textToColumns;
  }
  /**
   * @param TrimWhitespaceRequest
   */
  public function setTrimWhitespace(TrimWhitespaceRequest $trimWhitespace)
  {
    $this->trimWhitespace = $trimWhitespace;
  }
  /**
   * @return TrimWhitespaceRequest
   */
  public function getTrimWhitespace()
  {
    return $this->trimWhitespace;
  }
  /**
   * @param UnmergeCellsRequest
   */
  public function setUnmergeCells(UnmergeCellsRequest $unmergeCells)
  {
    $this->unmergeCells = $unmergeCells;
  }
  /**
   * @return UnmergeCellsRequest
   */
  public function getUnmergeCells()
  {
    return $this->unmergeCells;
  }
  /**
   * @param UpdateBandingRequest
   */
  public function setUpdateBanding(UpdateBandingRequest $updateBanding)
  {
    $this->updateBanding = $updateBanding;
  }
  /**
   * @return UpdateBandingRequest
   */
  public function getUpdateBanding()
  {
    return $this->updateBanding;
  }
  /**
   * @param UpdateBordersRequest
   */
  public function setUpdateBorders(UpdateBordersRequest $updateBorders)
  {
    $this->updateBorders = $updateBorders;
  }
  /**
   * @return UpdateBordersRequest
   */
  public function getUpdateBorders()
  {
    return $this->updateBorders;
  }
  /**
   * @param UpdateCellsRequest
   */
  public function setUpdateCells(UpdateCellsRequest $updateCells)
  {
    $this->updateCells = $updateCells;
  }
  /**
   * @return UpdateCellsRequest
   */
  public function getUpdateCells()
  {
    return $this->updateCells;
  }
  /**
   * @param UpdateChartSpecRequest
   */
  public function setUpdateChartSpec(UpdateChartSpecRequest $updateChartSpec)
  {
    $this->updateChartSpec = $updateChartSpec;
  }
  /**
   * @return UpdateChartSpecRequest
   */
  public function getUpdateChartSpec()
  {
    return $this->updateChartSpec;
  }
  /**
   * @param UpdateConditionalFormatRuleRequest
   */
  public function setUpdateConditionalFormatRule(UpdateConditionalFormatRuleRequest $updateConditionalFormatRule)
  {
    $this->updateConditionalFormatRule = $updateConditionalFormatRule;
  }
  /**
   * @return UpdateConditionalFormatRuleRequest
   */
  public function getUpdateConditionalFormatRule()
  {
    return $this->updateConditionalFormatRule;
  }
  /**
   * @param UpdateDataSourceRequest
   */
  public function setUpdateDataSource(UpdateDataSourceRequest $updateDataSource)
  {
    $this->updateDataSource = $updateDataSource;
  }
  /**
   * @return UpdateDataSourceRequest
   */
  public function getUpdateDataSource()
  {
    return $this->updateDataSource;
  }
  /**
   * @param UpdateDeveloperMetadataRequest
   */
  public function setUpdateDeveloperMetadata(UpdateDeveloperMetadataRequest $updateDeveloperMetadata)
  {
    $this->updateDeveloperMetadata = $updateDeveloperMetadata;
  }
  /**
   * @return UpdateDeveloperMetadataRequest
   */
  public function getUpdateDeveloperMetadata()
  {
    return $this->updateDeveloperMetadata;
  }
  /**
   * @param UpdateDimensionGroupRequest
   */
  public function setUpdateDimensionGroup(UpdateDimensionGroupRequest $updateDimensionGroup)
  {
    $this->updateDimensionGroup = $updateDimensionGroup;
  }
  /**
   * @return UpdateDimensionGroupRequest
   */
  public function getUpdateDimensionGroup()
  {
    return $this->updateDimensionGroup;
  }
  /**
   * @param UpdateDimensionPropertiesRequest
   */
  public function setUpdateDimensionProperties(UpdateDimensionPropertiesRequest $updateDimensionProperties)
  {
    $this->updateDimensionProperties = $updateDimensionProperties;
  }
  /**
   * @return UpdateDimensionPropertiesRequest
   */
  public function getUpdateDimensionProperties()
  {
    return $this->updateDimensionProperties;
  }
  /**
   * @param UpdateEmbeddedObjectBorderRequest
   */
  public function setUpdateEmbeddedObjectBorder(UpdateEmbeddedObjectBorderRequest $updateEmbeddedObjectBorder)
  {
    $this->updateEmbeddedObjectBorder = $updateEmbeddedObjectBorder;
  }
  /**
   * @return UpdateEmbeddedObjectBorderRequest
   */
  public function getUpdateEmbeddedObjectBorder()
  {
    return $this->updateEmbeddedObjectBorder;
  }
  /**
   * @param UpdateEmbeddedObjectPositionRequest
   */
  public function setUpdateEmbeddedObjectPosition(UpdateEmbeddedObjectPositionRequest $updateEmbeddedObjectPosition)
  {
    $this->updateEmbeddedObjectPosition = $updateEmbeddedObjectPosition;
  }
  /**
   * @return UpdateEmbeddedObjectPositionRequest
   */
  public function getUpdateEmbeddedObjectPosition()
  {
    return $this->updateEmbeddedObjectPosition;
  }
  /**
   * @param UpdateFilterViewRequest
   */
  public function setUpdateFilterView(UpdateFilterViewRequest $updateFilterView)
  {
    $this->updateFilterView = $updateFilterView;
  }
  /**
   * @return UpdateFilterViewRequest
   */
  public function getUpdateFilterView()
  {
    return $this->updateFilterView;
  }
  /**
   * @param UpdateNamedRangeRequest
   */
  public function setUpdateNamedRange(UpdateNamedRangeRequest $updateNamedRange)
  {
    $this->updateNamedRange = $updateNamedRange;
  }
  /**
   * @return UpdateNamedRangeRequest
   */
  public function getUpdateNamedRange()
  {
    return $this->updateNamedRange;
  }
  /**
   * @param UpdateProtectedRangeRequest
   */
  public function setUpdateProtectedRange(UpdateProtectedRangeRequest $updateProtectedRange)
  {
    $this->updateProtectedRange = $updateProtectedRange;
  }
  /**
   * @return UpdateProtectedRangeRequest
   */
  public function getUpdateProtectedRange()
  {
    return $this->updateProtectedRange;
  }
  /**
   * @param UpdateSheetPropertiesRequest
   */
  public function setUpdateSheetProperties(UpdateSheetPropertiesRequest $updateSheetProperties)
  {
    $this->updateSheetProperties = $updateSheetProperties;
  }
  /**
   * @return UpdateSheetPropertiesRequest
   */
  public function getUpdateSheetProperties()
  {
    return $this->updateSheetProperties;
  }
  /**
   * @param UpdateSlicerSpecRequest
   */
  public function setUpdateSlicerSpec(UpdateSlicerSpecRequest $updateSlicerSpec)
  {
    $this->updateSlicerSpec = $updateSlicerSpec;
  }
  /**
   * @return UpdateSlicerSpecRequest
   */
  public function getUpdateSlicerSpec()
  {
    return $this->updateSlicerSpec;
  }
  /**
   * @param UpdateSpreadsheetPropertiesRequest
   */
  public function setUpdateSpreadsheetProperties(UpdateSpreadsheetPropertiesRequest $updateSpreadsheetProperties)
  {
    $this->updateSpreadsheetProperties = $updateSpreadsheetProperties;
  }
  /**
   * @return UpdateSpreadsheetPropertiesRequest
   */
  public function getUpdateSpreadsheetProperties()
  {
    return $this->updateSpreadsheetProperties;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Request::class, 'Google_Service_Sheets_Request');
