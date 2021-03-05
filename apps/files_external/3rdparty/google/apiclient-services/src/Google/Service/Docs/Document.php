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

class Google_Service_Docs_Document extends Google_Model
{
  protected $bodyType = 'Google_Service_Docs_Body';
  protected $bodyDataType = '';
  public $documentId;
  protected $documentStyleType = 'Google_Service_Docs_DocumentStyle';
  protected $documentStyleDataType = '';
  protected $footersType = 'Google_Service_Docs_Footer';
  protected $footersDataType = 'map';
  protected $footnotesType = 'Google_Service_Docs_Footnote';
  protected $footnotesDataType = 'map';
  protected $headersType = 'Google_Service_Docs_Header';
  protected $headersDataType = 'map';
  protected $inlineObjectsType = 'Google_Service_Docs_InlineObject';
  protected $inlineObjectsDataType = 'map';
  protected $listsType = 'Google_Service_Docs_DocsList';
  protected $listsDataType = 'map';
  protected $namedRangesType = 'Google_Service_Docs_NamedRanges';
  protected $namedRangesDataType = 'map';
  protected $namedStylesType = 'Google_Service_Docs_NamedStyles';
  protected $namedStylesDataType = '';
  protected $positionedObjectsType = 'Google_Service_Docs_PositionedObject';
  protected $positionedObjectsDataType = 'map';
  public $revisionId;
  protected $suggestedDocumentStyleChangesType = 'Google_Service_Docs_SuggestedDocumentStyle';
  protected $suggestedDocumentStyleChangesDataType = 'map';
  protected $suggestedNamedStylesChangesType = 'Google_Service_Docs_SuggestedNamedStyles';
  protected $suggestedNamedStylesChangesDataType = 'map';
  public $suggestionsViewMode;
  public $title;

  /**
   * @param Google_Service_Docs_Body
   */
  public function setBody(Google_Service_Docs_Body $body)
  {
    $this->body = $body;
  }
  /**
   * @return Google_Service_Docs_Body
   */
  public function getBody()
  {
    return $this->body;
  }
  public function setDocumentId($documentId)
  {
    $this->documentId = $documentId;
  }
  public function getDocumentId()
  {
    return $this->documentId;
  }
  /**
   * @param Google_Service_Docs_DocumentStyle
   */
  public function setDocumentStyle(Google_Service_Docs_DocumentStyle $documentStyle)
  {
    $this->documentStyle = $documentStyle;
  }
  /**
   * @return Google_Service_Docs_DocumentStyle
   */
  public function getDocumentStyle()
  {
    return $this->documentStyle;
  }
  /**
   * @param Google_Service_Docs_Footer[]
   */
  public function setFooters($footers)
  {
    $this->footers = $footers;
  }
  /**
   * @return Google_Service_Docs_Footer[]
   */
  public function getFooters()
  {
    return $this->footers;
  }
  /**
   * @param Google_Service_Docs_Footnote[]
   */
  public function setFootnotes($footnotes)
  {
    $this->footnotes = $footnotes;
  }
  /**
   * @return Google_Service_Docs_Footnote[]
   */
  public function getFootnotes()
  {
    return $this->footnotes;
  }
  /**
   * @param Google_Service_Docs_Header[]
   */
  public function setHeaders($headers)
  {
    $this->headers = $headers;
  }
  /**
   * @return Google_Service_Docs_Header[]
   */
  public function getHeaders()
  {
    return $this->headers;
  }
  /**
   * @param Google_Service_Docs_InlineObject[]
   */
  public function setInlineObjects($inlineObjects)
  {
    $this->inlineObjects = $inlineObjects;
  }
  /**
   * @return Google_Service_Docs_InlineObject[]
   */
  public function getInlineObjects()
  {
    return $this->inlineObjects;
  }
  /**
   * @param Google_Service_Docs_DocsList[]
   */
  public function setLists($lists)
  {
    $this->lists = $lists;
  }
  /**
   * @return Google_Service_Docs_DocsList[]
   */
  public function getLists()
  {
    return $this->lists;
  }
  /**
   * @param Google_Service_Docs_NamedRanges[]
   */
  public function setNamedRanges($namedRanges)
  {
    $this->namedRanges = $namedRanges;
  }
  /**
   * @return Google_Service_Docs_NamedRanges[]
   */
  public function getNamedRanges()
  {
    return $this->namedRanges;
  }
  /**
   * @param Google_Service_Docs_NamedStyles
   */
  public function setNamedStyles(Google_Service_Docs_NamedStyles $namedStyles)
  {
    $this->namedStyles = $namedStyles;
  }
  /**
   * @return Google_Service_Docs_NamedStyles
   */
  public function getNamedStyles()
  {
    return $this->namedStyles;
  }
  /**
   * @param Google_Service_Docs_PositionedObject[]
   */
  public function setPositionedObjects($positionedObjects)
  {
    $this->positionedObjects = $positionedObjects;
  }
  /**
   * @return Google_Service_Docs_PositionedObject[]
   */
  public function getPositionedObjects()
  {
    return $this->positionedObjects;
  }
  public function setRevisionId($revisionId)
  {
    $this->revisionId = $revisionId;
  }
  public function getRevisionId()
  {
    return $this->revisionId;
  }
  /**
   * @param Google_Service_Docs_SuggestedDocumentStyle[]
   */
  public function setSuggestedDocumentStyleChanges($suggestedDocumentStyleChanges)
  {
    $this->suggestedDocumentStyleChanges = $suggestedDocumentStyleChanges;
  }
  /**
   * @return Google_Service_Docs_SuggestedDocumentStyle[]
   */
  public function getSuggestedDocumentStyleChanges()
  {
    return $this->suggestedDocumentStyleChanges;
  }
  /**
   * @param Google_Service_Docs_SuggestedNamedStyles[]
   */
  public function setSuggestedNamedStylesChanges($suggestedNamedStylesChanges)
  {
    $this->suggestedNamedStylesChanges = $suggestedNamedStylesChanges;
  }
  /**
   * @return Google_Service_Docs_SuggestedNamedStyles[]
   */
  public function getSuggestedNamedStylesChanges()
  {
    return $this->suggestedNamedStylesChanges;
  }
  public function setSuggestionsViewMode($suggestionsViewMode)
  {
    $this->suggestionsViewMode = $suggestionsViewMode;
  }
  public function getSuggestionsViewMode()
  {
    return $this->suggestionsViewMode;
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
