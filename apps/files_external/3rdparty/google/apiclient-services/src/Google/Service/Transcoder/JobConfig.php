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

class Google_Service_Transcoder_JobConfig extends Google_Collection
{
  protected $collection_key = 'spriteSheets';
  protected $adBreaksType = 'Google_Service_Transcoder_AdBreak';
  protected $adBreaksDataType = 'array';
  protected $editListType = 'Google_Service_Transcoder_EditAtom';
  protected $editListDataType = 'array';
  protected $elementaryStreamsType = 'Google_Service_Transcoder_ElementaryStream';
  protected $elementaryStreamsDataType = 'array';
  protected $inputsType = 'Google_Service_Transcoder_Input';
  protected $inputsDataType = 'array';
  protected $manifestsType = 'Google_Service_Transcoder_Manifest';
  protected $manifestsDataType = 'array';
  protected $muxStreamsType = 'Google_Service_Transcoder_MuxStream';
  protected $muxStreamsDataType = 'array';
  protected $outputType = 'Google_Service_Transcoder_Output';
  protected $outputDataType = '';
  protected $overlaysType = 'Google_Service_Transcoder_Overlay';
  protected $overlaysDataType = 'array';
  protected $pubsubDestinationType = 'Google_Service_Transcoder_PubsubDestination';
  protected $pubsubDestinationDataType = '';
  protected $spriteSheetsType = 'Google_Service_Transcoder_SpriteSheet';
  protected $spriteSheetsDataType = 'array';

  /**
   * @param Google_Service_Transcoder_AdBreak[]
   */
  public function setAdBreaks($adBreaks)
  {
    $this->adBreaks = $adBreaks;
  }
  /**
   * @return Google_Service_Transcoder_AdBreak[]
   */
  public function getAdBreaks()
  {
    return $this->adBreaks;
  }
  /**
   * @param Google_Service_Transcoder_EditAtom[]
   */
  public function setEditList($editList)
  {
    $this->editList = $editList;
  }
  /**
   * @return Google_Service_Transcoder_EditAtom[]
   */
  public function getEditList()
  {
    return $this->editList;
  }
  /**
   * @param Google_Service_Transcoder_ElementaryStream[]
   */
  public function setElementaryStreams($elementaryStreams)
  {
    $this->elementaryStreams = $elementaryStreams;
  }
  /**
   * @return Google_Service_Transcoder_ElementaryStream[]
   */
  public function getElementaryStreams()
  {
    return $this->elementaryStreams;
  }
  /**
   * @param Google_Service_Transcoder_Input[]
   */
  public function setInputs($inputs)
  {
    $this->inputs = $inputs;
  }
  /**
   * @return Google_Service_Transcoder_Input[]
   */
  public function getInputs()
  {
    return $this->inputs;
  }
  /**
   * @param Google_Service_Transcoder_Manifest[]
   */
  public function setManifests($manifests)
  {
    $this->manifests = $manifests;
  }
  /**
   * @return Google_Service_Transcoder_Manifest[]
   */
  public function getManifests()
  {
    return $this->manifests;
  }
  /**
   * @param Google_Service_Transcoder_MuxStream[]
   */
  public function setMuxStreams($muxStreams)
  {
    $this->muxStreams = $muxStreams;
  }
  /**
   * @return Google_Service_Transcoder_MuxStream[]
   */
  public function getMuxStreams()
  {
    return $this->muxStreams;
  }
  /**
   * @param Google_Service_Transcoder_Output
   */
  public function setOutput(Google_Service_Transcoder_Output $output)
  {
    $this->output = $output;
  }
  /**
   * @return Google_Service_Transcoder_Output
   */
  public function getOutput()
  {
    return $this->output;
  }
  /**
   * @param Google_Service_Transcoder_Overlay[]
   */
  public function setOverlays($overlays)
  {
    $this->overlays = $overlays;
  }
  /**
   * @return Google_Service_Transcoder_Overlay[]
   */
  public function getOverlays()
  {
    return $this->overlays;
  }
  /**
   * @param Google_Service_Transcoder_PubsubDestination
   */
  public function setPubsubDestination(Google_Service_Transcoder_PubsubDestination $pubsubDestination)
  {
    $this->pubsubDestination = $pubsubDestination;
  }
  /**
   * @return Google_Service_Transcoder_PubsubDestination
   */
  public function getPubsubDestination()
  {
    return $this->pubsubDestination;
  }
  /**
   * @param Google_Service_Transcoder_SpriteSheet[]
   */
  public function setSpriteSheets($spriteSheets)
  {
    $this->spriteSheets = $spriteSheets;
  }
  /**
   * @return Google_Service_Transcoder_SpriteSheet[]
   */
  public function getSpriteSheets()
  {
    return $this->spriteSheets;
  }
}
