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

class QualityDialogManagerExternalIds extends \Google\Model
{
  protected $blueGingerSupportedServicesType = BlueGingerClientVisibleProtoBlueGingerSupportedServices::class;
  protected $blueGingerSupportedServicesDataType = '';
  /**
   * @var string
   */
  public $knowledgeGraphMid;
  protected $maddenSupportedActionsType = GeoOndemandAssistantSupportedActions::class;
  protected $maddenSupportedActionsDataType = '';
  /**
   * @var string
   */
  public $openTableRestaurantId;

  /**
   * @param BlueGingerClientVisibleProtoBlueGingerSupportedServices
   */
  public function setBlueGingerSupportedServices(BlueGingerClientVisibleProtoBlueGingerSupportedServices $blueGingerSupportedServices)
  {
    $this->blueGingerSupportedServices = $blueGingerSupportedServices;
  }
  /**
   * @return BlueGingerClientVisibleProtoBlueGingerSupportedServices
   */
  public function getBlueGingerSupportedServices()
  {
    return $this->blueGingerSupportedServices;
  }
  /**
   * @param string
   */
  public function setKnowledgeGraphMid($knowledgeGraphMid)
  {
    $this->knowledgeGraphMid = $knowledgeGraphMid;
  }
  /**
   * @return string
   */
  public function getKnowledgeGraphMid()
  {
    return $this->knowledgeGraphMid;
  }
  /**
   * @param GeoOndemandAssistantSupportedActions
   */
  public function setMaddenSupportedActions(GeoOndemandAssistantSupportedActions $maddenSupportedActions)
  {
    $this->maddenSupportedActions = $maddenSupportedActions;
  }
  /**
   * @return GeoOndemandAssistantSupportedActions
   */
  public function getMaddenSupportedActions()
  {
    return $this->maddenSupportedActions;
  }
  /**
   * @param string
   */
  public function setOpenTableRestaurantId($openTableRestaurantId)
  {
    $this->openTableRestaurantId = $openTableRestaurantId;
  }
  /**
   * @return string
   */
  public function getOpenTableRestaurantId()
  {
    return $this->openTableRestaurantId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(QualityDialogManagerExternalIds::class, 'Google_Service_Contentwarehouse_QualityDialogManagerExternalIds');
