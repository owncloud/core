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

namespace Google\Service\Transcoder;

class JobConfig extends \Google\Collection
{
  protected $collection_key = 'spriteSheets';
  protected $adBreaksType = AdBreak::class;
  protected $adBreaksDataType = 'array';
  protected $editListType = EditAtom::class;
  protected $editListDataType = 'array';
  protected $elementaryStreamsType = ElementaryStream::class;
  protected $elementaryStreamsDataType = 'array';
  protected $inputsType = Input::class;
  protected $inputsDataType = 'array';
  protected $manifestsType = Manifest::class;
  protected $manifestsDataType = 'array';
  protected $muxStreamsType = MuxStream::class;
  protected $muxStreamsDataType = 'array';
  protected $outputType = Output::class;
  protected $outputDataType = '';
  protected $overlaysType = Overlay::class;
  protected $overlaysDataType = 'array';
  protected $pubsubDestinationType = PubsubDestination::class;
  protected $pubsubDestinationDataType = '';
  protected $spriteSheetsType = SpriteSheet::class;
  protected $spriteSheetsDataType = 'array';

  /**
   * @param AdBreak[]
   */
  public function setAdBreaks($adBreaks)
  {
    $this->adBreaks = $adBreaks;
  }
  /**
   * @return AdBreak[]
   */
  public function getAdBreaks()
  {
    return $this->adBreaks;
  }
  /**
   * @param EditAtom[]
   */
  public function setEditList($editList)
  {
    $this->editList = $editList;
  }
  /**
   * @return EditAtom[]
   */
  public function getEditList()
  {
    return $this->editList;
  }
  /**
   * @param ElementaryStream[]
   */
  public function setElementaryStreams($elementaryStreams)
  {
    $this->elementaryStreams = $elementaryStreams;
  }
  /**
   * @return ElementaryStream[]
   */
  public function getElementaryStreams()
  {
    return $this->elementaryStreams;
  }
  /**
   * @param Input[]
   */
  public function setInputs($inputs)
  {
    $this->inputs = $inputs;
  }
  /**
   * @return Input[]
   */
  public function getInputs()
  {
    return $this->inputs;
  }
  /**
   * @param Manifest[]
   */
  public function setManifests($manifests)
  {
    $this->manifests = $manifests;
  }
  /**
   * @return Manifest[]
   */
  public function getManifests()
  {
    return $this->manifests;
  }
  /**
   * @param MuxStream[]
   */
  public function setMuxStreams($muxStreams)
  {
    $this->muxStreams = $muxStreams;
  }
  /**
   * @return MuxStream[]
   */
  public function getMuxStreams()
  {
    return $this->muxStreams;
  }
  /**
   * @param Output
   */
  public function setOutput(Output $output)
  {
    $this->output = $output;
  }
  /**
   * @return Output
   */
  public function getOutput()
  {
    return $this->output;
  }
  /**
   * @param Overlay[]
   */
  public function setOverlays($overlays)
  {
    $this->overlays = $overlays;
  }
  /**
   * @return Overlay[]
   */
  public function getOverlays()
  {
    return $this->overlays;
  }
  /**
   * @param PubsubDestination
   */
  public function setPubsubDestination(PubsubDestination $pubsubDestination)
  {
    $this->pubsubDestination = $pubsubDestination;
  }
  /**
   * @return PubsubDestination
   */
  public function getPubsubDestination()
  {
    return $this->pubsubDestination;
  }
  /**
   * @param SpriteSheet[]
   */
  public function setSpriteSheets($spriteSheets)
  {
    $this->spriteSheets = $spriteSheets;
  }
  /**
   * @return SpriteSheet[]
   */
  public function getSpriteSheets()
  {
    return $this->spriteSheets;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(JobConfig::class, 'Google_Service_Transcoder_JobConfig');
