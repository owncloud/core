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

class Google_Service_Docs_Request extends Google_Model
{
  protected $createFooterType = 'Google_Service_Docs_CreateFooterRequest';
  protected $createFooterDataType = '';
  protected $createFootnoteType = 'Google_Service_Docs_CreateFootnoteRequest';
  protected $createFootnoteDataType = '';
  protected $createHeaderType = 'Google_Service_Docs_CreateHeaderRequest';
  protected $createHeaderDataType = '';
  protected $createNamedRangeType = 'Google_Service_Docs_CreateNamedRangeRequest';
  protected $createNamedRangeDataType = '';
  protected $createParagraphBulletsType = 'Google_Service_Docs_CreateParagraphBulletsRequest';
  protected $createParagraphBulletsDataType = '';
  protected $deleteContentRangeType = 'Google_Service_Docs_DeleteContentRangeRequest';
  protected $deleteContentRangeDataType = '';
  protected $deleteFooterType = 'Google_Service_Docs_DeleteFooterRequest';
  protected $deleteFooterDataType = '';
  protected $deleteHeaderType = 'Google_Service_Docs_DeleteHeaderRequest';
  protected $deleteHeaderDataType = '';
  protected $deleteNamedRangeType = 'Google_Service_Docs_DeleteNamedRangeRequest';
  protected $deleteNamedRangeDataType = '';
  protected $deleteParagraphBulletsType = 'Google_Service_Docs_DeleteParagraphBulletsRequest';
  protected $deleteParagraphBulletsDataType = '';
  protected $deletePositionedObjectType = 'Google_Service_Docs_DeletePositionedObjectRequest';
  protected $deletePositionedObjectDataType = '';
  protected $deleteTableColumnType = 'Google_Service_Docs_DeleteTableColumnRequest';
  protected $deleteTableColumnDataType = '';
  protected $deleteTableRowType = 'Google_Service_Docs_DeleteTableRowRequest';
  protected $deleteTableRowDataType = '';
  protected $insertInlineImageType = 'Google_Service_Docs_InsertInlineImageRequest';
  protected $insertInlineImageDataType = '';
  protected $insertPageBreakType = 'Google_Service_Docs_InsertPageBreakRequest';
  protected $insertPageBreakDataType = '';
  protected $insertSectionBreakType = 'Google_Service_Docs_InsertSectionBreakRequest';
  protected $insertSectionBreakDataType = '';
  protected $insertTableType = 'Google_Service_Docs_InsertTableRequest';
  protected $insertTableDataType = '';
  protected $insertTableColumnType = 'Google_Service_Docs_InsertTableColumnRequest';
  protected $insertTableColumnDataType = '';
  protected $insertTableRowType = 'Google_Service_Docs_InsertTableRowRequest';
  protected $insertTableRowDataType = '';
  protected $insertTextType = 'Google_Service_Docs_InsertTextRequest';
  protected $insertTextDataType = '';
  protected $mergeTableCellsType = 'Google_Service_Docs_MergeTableCellsRequest';
  protected $mergeTableCellsDataType = '';
  protected $replaceAllTextType = 'Google_Service_Docs_ReplaceAllTextRequest';
  protected $replaceAllTextDataType = '';
  protected $replaceImageType = 'Google_Service_Docs_ReplaceImageRequest';
  protected $replaceImageDataType = '';
  protected $replaceNamedRangeContentType = 'Google_Service_Docs_ReplaceNamedRangeContentRequest';
  protected $replaceNamedRangeContentDataType = '';
  protected $unmergeTableCellsType = 'Google_Service_Docs_UnmergeTableCellsRequest';
  protected $unmergeTableCellsDataType = '';
  protected $updateDocumentStyleType = 'Google_Service_Docs_UpdateDocumentStyleRequest';
  protected $updateDocumentStyleDataType = '';
  protected $updateParagraphStyleType = 'Google_Service_Docs_UpdateParagraphStyleRequest';
  protected $updateParagraphStyleDataType = '';
  protected $updateSectionStyleType = 'Google_Service_Docs_UpdateSectionStyleRequest';
  protected $updateSectionStyleDataType = '';
  protected $updateTableCellStyleType = 'Google_Service_Docs_UpdateTableCellStyleRequest';
  protected $updateTableCellStyleDataType = '';
  protected $updateTableColumnPropertiesType = 'Google_Service_Docs_UpdateTableColumnPropertiesRequest';
  protected $updateTableColumnPropertiesDataType = '';
  protected $updateTableRowStyleType = 'Google_Service_Docs_UpdateTableRowStyleRequest';
  protected $updateTableRowStyleDataType = '';
  protected $updateTextStyleType = 'Google_Service_Docs_UpdateTextStyleRequest';
  protected $updateTextStyleDataType = '';

  /**
   * @param Google_Service_Docs_CreateFooterRequest
   */
  public function setCreateFooter(Google_Service_Docs_CreateFooterRequest $createFooter)
  {
    $this->createFooter = $createFooter;
  }
  /**
   * @return Google_Service_Docs_CreateFooterRequest
   */
  public function getCreateFooter()
  {
    return $this->createFooter;
  }
  /**
   * @param Google_Service_Docs_CreateFootnoteRequest
   */
  public function setCreateFootnote(Google_Service_Docs_CreateFootnoteRequest $createFootnote)
  {
    $this->createFootnote = $createFootnote;
  }
  /**
   * @return Google_Service_Docs_CreateFootnoteRequest
   */
  public function getCreateFootnote()
  {
    return $this->createFootnote;
  }
  /**
   * @param Google_Service_Docs_CreateHeaderRequest
   */
  public function setCreateHeader(Google_Service_Docs_CreateHeaderRequest $createHeader)
  {
    $this->createHeader = $createHeader;
  }
  /**
   * @return Google_Service_Docs_CreateHeaderRequest
   */
  public function getCreateHeader()
  {
    return $this->createHeader;
  }
  /**
   * @param Google_Service_Docs_CreateNamedRangeRequest
   */
  public function setCreateNamedRange(Google_Service_Docs_CreateNamedRangeRequest $createNamedRange)
  {
    $this->createNamedRange = $createNamedRange;
  }
  /**
   * @return Google_Service_Docs_CreateNamedRangeRequest
   */
  public function getCreateNamedRange()
  {
    return $this->createNamedRange;
  }
  /**
   * @param Google_Service_Docs_CreateParagraphBulletsRequest
   */
  public function setCreateParagraphBullets(Google_Service_Docs_CreateParagraphBulletsRequest $createParagraphBullets)
  {
    $this->createParagraphBullets = $createParagraphBullets;
  }
  /**
   * @return Google_Service_Docs_CreateParagraphBulletsRequest
   */
  public function getCreateParagraphBullets()
  {
    return $this->createParagraphBullets;
  }
  /**
   * @param Google_Service_Docs_DeleteContentRangeRequest
   */
  public function setDeleteContentRange(Google_Service_Docs_DeleteContentRangeRequest $deleteContentRange)
  {
    $this->deleteContentRange = $deleteContentRange;
  }
  /**
   * @return Google_Service_Docs_DeleteContentRangeRequest
   */
  public function getDeleteContentRange()
  {
    return $this->deleteContentRange;
  }
  /**
   * @param Google_Service_Docs_DeleteFooterRequest
   */
  public function setDeleteFooter(Google_Service_Docs_DeleteFooterRequest $deleteFooter)
  {
    $this->deleteFooter = $deleteFooter;
  }
  /**
   * @return Google_Service_Docs_DeleteFooterRequest
   */
  public function getDeleteFooter()
  {
    return $this->deleteFooter;
  }
  /**
   * @param Google_Service_Docs_DeleteHeaderRequest
   */
  public function setDeleteHeader(Google_Service_Docs_DeleteHeaderRequest $deleteHeader)
  {
    $this->deleteHeader = $deleteHeader;
  }
  /**
   * @return Google_Service_Docs_DeleteHeaderRequest
   */
  public function getDeleteHeader()
  {
    return $this->deleteHeader;
  }
  /**
   * @param Google_Service_Docs_DeleteNamedRangeRequest
   */
  public function setDeleteNamedRange(Google_Service_Docs_DeleteNamedRangeRequest $deleteNamedRange)
  {
    $this->deleteNamedRange = $deleteNamedRange;
  }
  /**
   * @return Google_Service_Docs_DeleteNamedRangeRequest
   */
  public function getDeleteNamedRange()
  {
    return $this->deleteNamedRange;
  }
  /**
   * @param Google_Service_Docs_DeleteParagraphBulletsRequest
   */
  public function setDeleteParagraphBullets(Google_Service_Docs_DeleteParagraphBulletsRequest $deleteParagraphBullets)
  {
    $this->deleteParagraphBullets = $deleteParagraphBullets;
  }
  /**
   * @return Google_Service_Docs_DeleteParagraphBulletsRequest
   */
  public function getDeleteParagraphBullets()
  {
    return $this->deleteParagraphBullets;
  }
  /**
   * @param Google_Service_Docs_DeletePositionedObjectRequest
   */
  public function setDeletePositionedObject(Google_Service_Docs_DeletePositionedObjectRequest $deletePositionedObject)
  {
    $this->deletePositionedObject = $deletePositionedObject;
  }
  /**
   * @return Google_Service_Docs_DeletePositionedObjectRequest
   */
  public function getDeletePositionedObject()
  {
    return $this->deletePositionedObject;
  }
  /**
   * @param Google_Service_Docs_DeleteTableColumnRequest
   */
  public function setDeleteTableColumn(Google_Service_Docs_DeleteTableColumnRequest $deleteTableColumn)
  {
    $this->deleteTableColumn = $deleteTableColumn;
  }
  /**
   * @return Google_Service_Docs_DeleteTableColumnRequest
   */
  public function getDeleteTableColumn()
  {
    return $this->deleteTableColumn;
  }
  /**
   * @param Google_Service_Docs_DeleteTableRowRequest
   */
  public function setDeleteTableRow(Google_Service_Docs_DeleteTableRowRequest $deleteTableRow)
  {
    $this->deleteTableRow = $deleteTableRow;
  }
  /**
   * @return Google_Service_Docs_DeleteTableRowRequest
   */
  public function getDeleteTableRow()
  {
    return $this->deleteTableRow;
  }
  /**
   * @param Google_Service_Docs_InsertInlineImageRequest
   */
  public function setInsertInlineImage(Google_Service_Docs_InsertInlineImageRequest $insertInlineImage)
  {
    $this->insertInlineImage = $insertInlineImage;
  }
  /**
   * @return Google_Service_Docs_InsertInlineImageRequest
   */
  public function getInsertInlineImage()
  {
    return $this->insertInlineImage;
  }
  /**
   * @param Google_Service_Docs_InsertPageBreakRequest
   */
  public function setInsertPageBreak(Google_Service_Docs_InsertPageBreakRequest $insertPageBreak)
  {
    $this->insertPageBreak = $insertPageBreak;
  }
  /**
   * @return Google_Service_Docs_InsertPageBreakRequest
   */
  public function getInsertPageBreak()
  {
    return $this->insertPageBreak;
  }
  /**
   * @param Google_Service_Docs_InsertSectionBreakRequest
   */
  public function setInsertSectionBreak(Google_Service_Docs_InsertSectionBreakRequest $insertSectionBreak)
  {
    $this->insertSectionBreak = $insertSectionBreak;
  }
  /**
   * @return Google_Service_Docs_InsertSectionBreakRequest
   */
  public function getInsertSectionBreak()
  {
    return $this->insertSectionBreak;
  }
  /**
   * @param Google_Service_Docs_InsertTableRequest
   */
  public function setInsertTable(Google_Service_Docs_InsertTableRequest $insertTable)
  {
    $this->insertTable = $insertTable;
  }
  /**
   * @return Google_Service_Docs_InsertTableRequest
   */
  public function getInsertTable()
  {
    return $this->insertTable;
  }
  /**
   * @param Google_Service_Docs_InsertTableColumnRequest
   */
  public function setInsertTableColumn(Google_Service_Docs_InsertTableColumnRequest $insertTableColumn)
  {
    $this->insertTableColumn = $insertTableColumn;
  }
  /**
   * @return Google_Service_Docs_InsertTableColumnRequest
   */
  public function getInsertTableColumn()
  {
    return $this->insertTableColumn;
  }
  /**
   * @param Google_Service_Docs_InsertTableRowRequest
   */
  public function setInsertTableRow(Google_Service_Docs_InsertTableRowRequest $insertTableRow)
  {
    $this->insertTableRow = $insertTableRow;
  }
  /**
   * @return Google_Service_Docs_InsertTableRowRequest
   */
  public function getInsertTableRow()
  {
    return $this->insertTableRow;
  }
  /**
   * @param Google_Service_Docs_InsertTextRequest
   */
  public function setInsertText(Google_Service_Docs_InsertTextRequest $insertText)
  {
    $this->insertText = $insertText;
  }
  /**
   * @return Google_Service_Docs_InsertTextRequest
   */
  public function getInsertText()
  {
    return $this->insertText;
  }
  /**
   * @param Google_Service_Docs_MergeTableCellsRequest
   */
  public function setMergeTableCells(Google_Service_Docs_MergeTableCellsRequest $mergeTableCells)
  {
    $this->mergeTableCells = $mergeTableCells;
  }
  /**
   * @return Google_Service_Docs_MergeTableCellsRequest
   */
  public function getMergeTableCells()
  {
    return $this->mergeTableCells;
  }
  /**
   * @param Google_Service_Docs_ReplaceAllTextRequest
   */
  public function setReplaceAllText(Google_Service_Docs_ReplaceAllTextRequest $replaceAllText)
  {
    $this->replaceAllText = $replaceAllText;
  }
  /**
   * @return Google_Service_Docs_ReplaceAllTextRequest
   */
  public function getReplaceAllText()
  {
    return $this->replaceAllText;
  }
  /**
   * @param Google_Service_Docs_ReplaceImageRequest
   */
  public function setReplaceImage(Google_Service_Docs_ReplaceImageRequest $replaceImage)
  {
    $this->replaceImage = $replaceImage;
  }
  /**
   * @return Google_Service_Docs_ReplaceImageRequest
   */
  public function getReplaceImage()
  {
    return $this->replaceImage;
  }
  /**
   * @param Google_Service_Docs_ReplaceNamedRangeContentRequest
   */
  public function setReplaceNamedRangeContent(Google_Service_Docs_ReplaceNamedRangeContentRequest $replaceNamedRangeContent)
  {
    $this->replaceNamedRangeContent = $replaceNamedRangeContent;
  }
  /**
   * @return Google_Service_Docs_ReplaceNamedRangeContentRequest
   */
  public function getReplaceNamedRangeContent()
  {
    return $this->replaceNamedRangeContent;
  }
  /**
   * @param Google_Service_Docs_UnmergeTableCellsRequest
   */
  public function setUnmergeTableCells(Google_Service_Docs_UnmergeTableCellsRequest $unmergeTableCells)
  {
    $this->unmergeTableCells = $unmergeTableCells;
  }
  /**
   * @return Google_Service_Docs_UnmergeTableCellsRequest
   */
  public function getUnmergeTableCells()
  {
    return $this->unmergeTableCells;
  }
  /**
   * @param Google_Service_Docs_UpdateDocumentStyleRequest
   */
  public function setUpdateDocumentStyle(Google_Service_Docs_UpdateDocumentStyleRequest $updateDocumentStyle)
  {
    $this->updateDocumentStyle = $updateDocumentStyle;
  }
  /**
   * @return Google_Service_Docs_UpdateDocumentStyleRequest
   */
  public function getUpdateDocumentStyle()
  {
    return $this->updateDocumentStyle;
  }
  /**
   * @param Google_Service_Docs_UpdateParagraphStyleRequest
   */
  public function setUpdateParagraphStyle(Google_Service_Docs_UpdateParagraphStyleRequest $updateParagraphStyle)
  {
    $this->updateParagraphStyle = $updateParagraphStyle;
  }
  /**
   * @return Google_Service_Docs_UpdateParagraphStyleRequest
   */
  public function getUpdateParagraphStyle()
  {
    return $this->updateParagraphStyle;
  }
  /**
   * @param Google_Service_Docs_UpdateSectionStyleRequest
   */
  public function setUpdateSectionStyle(Google_Service_Docs_UpdateSectionStyleRequest $updateSectionStyle)
  {
    $this->updateSectionStyle = $updateSectionStyle;
  }
  /**
   * @return Google_Service_Docs_UpdateSectionStyleRequest
   */
  public function getUpdateSectionStyle()
  {
    return $this->updateSectionStyle;
  }
  /**
   * @param Google_Service_Docs_UpdateTableCellStyleRequest
   */
  public function setUpdateTableCellStyle(Google_Service_Docs_UpdateTableCellStyleRequest $updateTableCellStyle)
  {
    $this->updateTableCellStyle = $updateTableCellStyle;
  }
  /**
   * @return Google_Service_Docs_UpdateTableCellStyleRequest
   */
  public function getUpdateTableCellStyle()
  {
    return $this->updateTableCellStyle;
  }
  /**
   * @param Google_Service_Docs_UpdateTableColumnPropertiesRequest
   */
  public function setUpdateTableColumnProperties(Google_Service_Docs_UpdateTableColumnPropertiesRequest $updateTableColumnProperties)
  {
    $this->updateTableColumnProperties = $updateTableColumnProperties;
  }
  /**
   * @return Google_Service_Docs_UpdateTableColumnPropertiesRequest
   */
  public function getUpdateTableColumnProperties()
  {
    return $this->updateTableColumnProperties;
  }
  /**
   * @param Google_Service_Docs_UpdateTableRowStyleRequest
   */
  public function setUpdateTableRowStyle(Google_Service_Docs_UpdateTableRowStyleRequest $updateTableRowStyle)
  {
    $this->updateTableRowStyle = $updateTableRowStyle;
  }
  /**
   * @return Google_Service_Docs_UpdateTableRowStyleRequest
   */
  public function getUpdateTableRowStyle()
  {
    return $this->updateTableRowStyle;
  }
  /**
   * @param Google_Service_Docs_UpdateTextStyleRequest
   */
  public function setUpdateTextStyle(Google_Service_Docs_UpdateTextStyleRequest $updateTextStyle)
  {
    $this->updateTextStyle = $updateTextStyle;
  }
  /**
   * @return Google_Service_Docs_UpdateTextStyleRequest
   */
  public function getUpdateTextStyle()
  {
    return $this->updateTextStyle;
  }
}
