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

class GeostoreFeatureProto extends \Google\Collection
{
  protected $collection_key = 'website';
  protected $accessPointType = GeostoreAccessPointProto::class;
  protected $accessPointDataType = 'array';
  protected $addressType = GeostoreAddressProto::class;
  protected $addressDataType = 'array';
  protected $anchoredGeometryType = GeostoreAnchoredGeometryProto::class;
  protected $anchoredGeometryDataType = '';
  protected $attachmentType = GeostoreAttachmentsAttachmentProto::class;
  protected $attachmentDataType = 'array';
  protected $attributeType = GeostoreAttributeProto::class;
  protected $attributeDataType = 'array';
  protected $bestLocaleType = GeostoreBestLocaleProto::class;
  protected $bestLocaleDataType = '';
  protected $borderType = GeostoreBorderProto::class;
  protected $borderDataType = '';
  protected $boundType = GeostoreRectProto::class;
  protected $boundDataType = '';
  protected $buildingType = GeostoreBuildingProto::class;
  protected $buildingDataType = '';
  protected $businessChainType = GeostoreBusinessChainProto::class;
  protected $businessChainDataType = '';
  protected $centerType = GeostorePointProto::class;
  protected $centerDataType = '';
  protected $childType = GeostoreFeatureIdProto::class;
  protected $childDataType = 'array';
  protected $coveringType = GeostoreCellCoveringProto::class;
  protected $coveringDataType = '';
  protected $dataSourceType = GeostoreDataSourceProto::class;
  protected $dataSourceDataType = '';
  protected $displayDataType = GeostoreDisplayDataProto::class;
  protected $displayDataDataType = '';
  protected $doodleType = GeostoreDoodleProto::class;
  protected $doodleDataType = '';
  protected $elevationType = GeostoreElevationProto::class;
  protected $elevationDataType = '';
  protected $elevationModelType = GeostoreElevationModelProto::class;
  protected $elevationModelDataType = '';
  protected $entranceType = GeostoreEntranceProto::class;
  protected $entranceDataType = '';
  protected $establishmentType = GeostoreEstablishmentProto::class;
  protected $establishmentDataType = '';
  protected $exemptRegulatedAreaType = GeostoreFeatureIdProto::class;
  protected $exemptRegulatedAreaDataType = 'array';
  protected $futureGeometryType = GeostoreFeatureIdProto::class;
  protected $futureGeometryDataType = '';
  protected $futureGeometryForType = GeostoreFeatureIdProto::class;
  protected $futureGeometryForDataType = '';
  public $geometryPrecisionMeters;
  protected $geopoliticalGeometryType = GeostoreGeopoliticalGeometryProto::class;
  protected $geopoliticalGeometryDataType = '';
  protected $htmlTextType = GeostoreHtmlTextProto::class;
  protected $htmlTextDataType = 'array';
  protected $idType = GeostoreFeatureIdProto::class;
  protected $idDataType = '';
  protected $inferredGeometryType = GeostoreInferredGeometryProto::class;
  protected $inferredGeometryDataType = '';
  protected $interiorCoveringType = GeostoreCellCoveringProto::class;
  protected $interiorCoveringDataType = '';
  protected $internalType = GeostoreInternalFeatureProto::class;
  protected $internalDataType = '';
  protected $intersectionType = GeostoreIntersectionProto::class;
  protected $intersectionDataType = '';
  protected $intersectionGroupType = GeostoreIntersectionGroupProto::class;
  protected $intersectionGroupDataType = '';
  protected $kgPropertyType = FreebasePropertyValue::class;
  protected $kgPropertyDataType = 'array';
  protected $knowledgeGraphReferenceType = GeostoreKnowledgeGraphReferenceProto::class;
  protected $knowledgeGraphReferenceDataType = '';
  protected $laneMarkerType = GeostoreLaneMarkerProto::class;
  protected $laneMarkerDataType = '';
  protected $levelType = GeostoreLevelProto::class;
  protected $levelDataType = '';
  protected $localeType = GeostoreLocaleProto::class;
  protected $localeDataType = '';
  protected $logicalBorderType = GeostoreLogicalBorderProto::class;
  protected $logicalBorderDataType = '';
  protected $metadataType = GeostoreFeatureMetadataProto::class;
  protected $metadataDataType = '';
  protected $nameType = GeostoreNameProto::class;
  protected $nameDataType = 'array';
  protected $operationsType = GeostoreOperationsProto::class;
  protected $operationsDataType = '';
  protected $originalIdType = GeostoreFeatureIdProto::class;
  protected $originalIdDataType = '';
  protected $parentType = GeostoreFeatureIdProto::class;
  protected $parentDataType = 'array';
  protected $parkingType = GeostoreParkingProto::class;
  protected $parkingDataType = '';
  protected $pointType = GeostorePointProto::class;
  protected $pointDataType = 'array';
  protected $politicalType = GeostorePoliticalProto::class;
  protected $politicalDataType = '';
  protected $polygonType = GeostorePolygonProto::class;
  protected $polygonDataType = 'array';
  protected $polygonForDisplayType = GeostorePolygonProto::class;
  protected $polygonForDisplayDataType = '';
  protected $polylineType = GeostorePolyLineProto::class;
  protected $polylineDataType = 'array';
  protected $poseType = GeostorePoseProto::class;
  protected $poseDataType = '';
  protected $preferredViewportType = GeostoreRectProto::class;
  protected $preferredViewportDataType = '';
  protected $propertyValueStatusType = GeostorePropertyValueStatusProto::class;
  protected $propertyValueStatusDataType = 'array';
  /**
   * @var float
   */
  public $rank;
  protected $rankDetailsType = GeostoreRankDetailsProto::class;
  protected $rankDetailsDataType = '';
  protected $rawGconceptInstanceContainerType = GeostoreOntologyRawGConceptInstanceContainerProto::class;
  protected $rawGconceptInstanceContainerDataType = '';
  protected $regulatedAreaType = GeostoreRegulatedAreaProto::class;
  protected $regulatedAreaDataType = '';
  protected $relatedBorderType = GeostoreFeatureIdProto::class;
  protected $relatedBorderDataType = 'array';
  protected $relatedEntranceType = GeostoreEntranceReferenceProto::class;
  protected $relatedEntranceDataType = 'array';
  protected $relatedFeatureType = GeostoreRelationProto::class;
  protected $relatedFeatureDataType = 'array';
  protected $relatedTerminalPointType = GeostoreFeatureIdProto::class;
  protected $relatedTerminalPointDataType = 'array';
  protected $relatedTimezoneType = GeostoreTimezoneProto::class;
  protected $relatedTimezoneDataType = 'array';
  protected $restrictionGroupType = GeostoreRestrictionGroupProto::class;
  protected $restrictionGroupDataType = '';
  protected $roadMonitorType = GeostoreRoadMonitorProto::class;
  protected $roadMonitorDataType = '';
  protected $routeType = GeostoreRouteProto::class;
  protected $routeDataType = '';
  protected $schoolDistrictType = GeostoreSchoolDistrictProto::class;
  protected $schoolDistrictDataType = '';
  protected $segmentType = GeostoreSegmentProto::class;
  protected $segmentDataType = '';
  protected $segmentPathType = GeostoreSegmentPathProto::class;
  protected $segmentPathDataType = '';
  protected $signType = GeostoreRoadSignProto::class;
  protected $signDataType = '';
  protected $skiBoundaryType = GeostoreSkiBoundaryProto::class;
  protected $skiBoundaryDataType = '';
  protected $skiLiftType = GeostoreSkiLiftProto::class;
  protected $skiLiftDataType = '';
  protected $skiTrailType = GeostoreSkiTrailProto::class;
  protected $skiTrailDataType = '';
  protected $socialReferenceType = GeostoreSocialReferenceProto::class;
  protected $socialReferenceDataType = '';
  protected $sourceInfoType = GeostoreSourceInfoProto::class;
  protected $sourceInfoDataType = 'array';
  protected $statusType = GeostoreExistenceProto::class;
  protected $statusDataType = '';
  protected $storefrontGeometryType = GeostoreAnchoredGeometryProto::class;
  protected $storefrontGeometryDataType = 'array';
  /**
   * @var bool
   */
  public $syntheticGeometry;
  protected $temporaryDataType = Proto2BridgeMessageSet::class;
  protected $temporaryDataDataType = '';
  protected $threeDimModelType = GeostoreThreeDimensionalModelProto::class;
  protected $threeDimModelDataType = '';
  protected $tollClusterType = GeostoreTollClusterProto::class;
  protected $tollClusterDataType = '';
  protected $trackType = GeostoreTrackProto::class;
  protected $trackDataType = 'array';
  protected $transitLineType = GeostoreTransitLineProto::class;
  protected $transitLineDataType = '';
  protected $transitLineVariantType = GeostoreTransitLineVariantProto::class;
  protected $transitLineVariantDataType = '';
  protected $transitStationType = GeostoreTransitStationProto::class;
  protected $transitStationDataType = '';
  /**
   * @var string
   */
  public $type;
  protected $verticalOrderingType = GeostoreVerticalOrderingProto::class;
  protected $verticalOrderingDataType = '';
  protected $waterRemovedPolygonType = GeostorePolygonProto::class;
  protected $waterRemovedPolygonDataType = '';
  protected $websiteType = GeostoreUrlProto::class;
  protected $websiteDataType = 'array';

  /**
   * @param GeostoreAccessPointProto[]
   */
  public function setAccessPoint($accessPoint)
  {
    $this->accessPoint = $accessPoint;
  }
  /**
   * @return GeostoreAccessPointProto[]
   */
  public function getAccessPoint()
  {
    return $this->accessPoint;
  }
  /**
   * @param GeostoreAddressProto[]
   */
  public function setAddress($address)
  {
    $this->address = $address;
  }
  /**
   * @return GeostoreAddressProto[]
   */
  public function getAddress()
  {
    return $this->address;
  }
  /**
   * @param GeostoreAnchoredGeometryProto
   */
  public function setAnchoredGeometry(GeostoreAnchoredGeometryProto $anchoredGeometry)
  {
    $this->anchoredGeometry = $anchoredGeometry;
  }
  /**
   * @return GeostoreAnchoredGeometryProto
   */
  public function getAnchoredGeometry()
  {
    return $this->anchoredGeometry;
  }
  /**
   * @param GeostoreAttachmentsAttachmentProto[]
   */
  public function setAttachment($attachment)
  {
    $this->attachment = $attachment;
  }
  /**
   * @return GeostoreAttachmentsAttachmentProto[]
   */
  public function getAttachment()
  {
    return $this->attachment;
  }
  /**
   * @param GeostoreAttributeProto[]
   */
  public function setAttribute($attribute)
  {
    $this->attribute = $attribute;
  }
  /**
   * @return GeostoreAttributeProto[]
   */
  public function getAttribute()
  {
    return $this->attribute;
  }
  /**
   * @param GeostoreBestLocaleProto
   */
  public function setBestLocale(GeostoreBestLocaleProto $bestLocale)
  {
    $this->bestLocale = $bestLocale;
  }
  /**
   * @return GeostoreBestLocaleProto
   */
  public function getBestLocale()
  {
    return $this->bestLocale;
  }
  /**
   * @param GeostoreBorderProto
   */
  public function setBorder(GeostoreBorderProto $border)
  {
    $this->border = $border;
  }
  /**
   * @return GeostoreBorderProto
   */
  public function getBorder()
  {
    return $this->border;
  }
  /**
   * @param GeostoreRectProto
   */
  public function setBound(GeostoreRectProto $bound)
  {
    $this->bound = $bound;
  }
  /**
   * @return GeostoreRectProto
   */
  public function getBound()
  {
    return $this->bound;
  }
  /**
   * @param GeostoreBuildingProto
   */
  public function setBuilding(GeostoreBuildingProto $building)
  {
    $this->building = $building;
  }
  /**
   * @return GeostoreBuildingProto
   */
  public function getBuilding()
  {
    return $this->building;
  }
  /**
   * @param GeostoreBusinessChainProto
   */
  public function setBusinessChain(GeostoreBusinessChainProto $businessChain)
  {
    $this->businessChain = $businessChain;
  }
  /**
   * @return GeostoreBusinessChainProto
   */
  public function getBusinessChain()
  {
    return $this->businessChain;
  }
  /**
   * @param GeostorePointProto
   */
  public function setCenter(GeostorePointProto $center)
  {
    $this->center = $center;
  }
  /**
   * @return GeostorePointProto
   */
  public function getCenter()
  {
    return $this->center;
  }
  /**
   * @param GeostoreFeatureIdProto[]
   */
  public function setChild($child)
  {
    $this->child = $child;
  }
  /**
   * @return GeostoreFeatureIdProto[]
   */
  public function getChild()
  {
    return $this->child;
  }
  /**
   * @param GeostoreCellCoveringProto
   */
  public function setCovering(GeostoreCellCoveringProto $covering)
  {
    $this->covering = $covering;
  }
  /**
   * @return GeostoreCellCoveringProto
   */
  public function getCovering()
  {
    return $this->covering;
  }
  /**
   * @param GeostoreDataSourceProto
   */
  public function setDataSource(GeostoreDataSourceProto $dataSource)
  {
    $this->dataSource = $dataSource;
  }
  /**
   * @return GeostoreDataSourceProto
   */
  public function getDataSource()
  {
    return $this->dataSource;
  }
  /**
   * @param GeostoreDisplayDataProto
   */
  public function setDisplayData(GeostoreDisplayDataProto $displayData)
  {
    $this->displayData = $displayData;
  }
  /**
   * @return GeostoreDisplayDataProto
   */
  public function getDisplayData()
  {
    return $this->displayData;
  }
  /**
   * @param GeostoreDoodleProto
   */
  public function setDoodle(GeostoreDoodleProto $doodle)
  {
    $this->doodle = $doodle;
  }
  /**
   * @return GeostoreDoodleProto
   */
  public function getDoodle()
  {
    return $this->doodle;
  }
  /**
   * @param GeostoreElevationProto
   */
  public function setElevation(GeostoreElevationProto $elevation)
  {
    $this->elevation = $elevation;
  }
  /**
   * @return GeostoreElevationProto
   */
  public function getElevation()
  {
    return $this->elevation;
  }
  /**
   * @param GeostoreElevationModelProto
   */
  public function setElevationModel(GeostoreElevationModelProto $elevationModel)
  {
    $this->elevationModel = $elevationModel;
  }
  /**
   * @return GeostoreElevationModelProto
   */
  public function getElevationModel()
  {
    return $this->elevationModel;
  }
  /**
   * @param GeostoreEntranceProto
   */
  public function setEntrance(GeostoreEntranceProto $entrance)
  {
    $this->entrance = $entrance;
  }
  /**
   * @return GeostoreEntranceProto
   */
  public function getEntrance()
  {
    return $this->entrance;
  }
  /**
   * @param GeostoreEstablishmentProto
   */
  public function setEstablishment(GeostoreEstablishmentProto $establishment)
  {
    $this->establishment = $establishment;
  }
  /**
   * @return GeostoreEstablishmentProto
   */
  public function getEstablishment()
  {
    return $this->establishment;
  }
  /**
   * @param GeostoreFeatureIdProto[]
   */
  public function setExemptRegulatedArea($exemptRegulatedArea)
  {
    $this->exemptRegulatedArea = $exemptRegulatedArea;
  }
  /**
   * @return GeostoreFeatureIdProto[]
   */
  public function getExemptRegulatedArea()
  {
    return $this->exemptRegulatedArea;
  }
  /**
   * @param GeostoreFeatureIdProto
   */
  public function setFutureGeometry(GeostoreFeatureIdProto $futureGeometry)
  {
    $this->futureGeometry = $futureGeometry;
  }
  /**
   * @return GeostoreFeatureIdProto
   */
  public function getFutureGeometry()
  {
    return $this->futureGeometry;
  }
  /**
   * @param GeostoreFeatureIdProto
   */
  public function setFutureGeometryFor(GeostoreFeatureIdProto $futureGeometryFor)
  {
    $this->futureGeometryFor = $futureGeometryFor;
  }
  /**
   * @return GeostoreFeatureIdProto
   */
  public function getFutureGeometryFor()
  {
    return $this->futureGeometryFor;
  }
  public function setGeometryPrecisionMeters($geometryPrecisionMeters)
  {
    $this->geometryPrecisionMeters = $geometryPrecisionMeters;
  }
  public function getGeometryPrecisionMeters()
  {
    return $this->geometryPrecisionMeters;
  }
  /**
   * @param GeostoreGeopoliticalGeometryProto
   */
  public function setGeopoliticalGeometry(GeostoreGeopoliticalGeometryProto $geopoliticalGeometry)
  {
    $this->geopoliticalGeometry = $geopoliticalGeometry;
  }
  /**
   * @return GeostoreGeopoliticalGeometryProto
   */
  public function getGeopoliticalGeometry()
  {
    return $this->geopoliticalGeometry;
  }
  /**
   * @param GeostoreHtmlTextProto[]
   */
  public function setHtmlText($htmlText)
  {
    $this->htmlText = $htmlText;
  }
  /**
   * @return GeostoreHtmlTextProto[]
   */
  public function getHtmlText()
  {
    return $this->htmlText;
  }
  /**
   * @param GeostoreFeatureIdProto
   */
  public function setId(GeostoreFeatureIdProto $id)
  {
    $this->id = $id;
  }
  /**
   * @return GeostoreFeatureIdProto
   */
  public function getId()
  {
    return $this->id;
  }
  /**
   * @param GeostoreInferredGeometryProto
   */
  public function setInferredGeometry(GeostoreInferredGeometryProto $inferredGeometry)
  {
    $this->inferredGeometry = $inferredGeometry;
  }
  /**
   * @return GeostoreInferredGeometryProto
   */
  public function getInferredGeometry()
  {
    return $this->inferredGeometry;
  }
  /**
   * @param GeostoreCellCoveringProto
   */
  public function setInteriorCovering(GeostoreCellCoveringProto $interiorCovering)
  {
    $this->interiorCovering = $interiorCovering;
  }
  /**
   * @return GeostoreCellCoveringProto
   */
  public function getInteriorCovering()
  {
    return $this->interiorCovering;
  }
  /**
   * @param GeostoreInternalFeatureProto
   */
  public function setInternal(GeostoreInternalFeatureProto $internal)
  {
    $this->internal = $internal;
  }
  /**
   * @return GeostoreInternalFeatureProto
   */
  public function getInternal()
  {
    return $this->internal;
  }
  /**
   * @param GeostoreIntersectionProto
   */
  public function setIntersection(GeostoreIntersectionProto $intersection)
  {
    $this->intersection = $intersection;
  }
  /**
   * @return GeostoreIntersectionProto
   */
  public function getIntersection()
  {
    return $this->intersection;
  }
  /**
   * @param GeostoreIntersectionGroupProto
   */
  public function setIntersectionGroup(GeostoreIntersectionGroupProto $intersectionGroup)
  {
    $this->intersectionGroup = $intersectionGroup;
  }
  /**
   * @return GeostoreIntersectionGroupProto
   */
  public function getIntersectionGroup()
  {
    return $this->intersectionGroup;
  }
  /**
   * @param FreebasePropertyValue[]
   */
  public function setKgProperty($kgProperty)
  {
    $this->kgProperty = $kgProperty;
  }
  /**
   * @return FreebasePropertyValue[]
   */
  public function getKgProperty()
  {
    return $this->kgProperty;
  }
  /**
   * @param GeostoreKnowledgeGraphReferenceProto
   */
  public function setKnowledgeGraphReference(GeostoreKnowledgeGraphReferenceProto $knowledgeGraphReference)
  {
    $this->knowledgeGraphReference = $knowledgeGraphReference;
  }
  /**
   * @return GeostoreKnowledgeGraphReferenceProto
   */
  public function getKnowledgeGraphReference()
  {
    return $this->knowledgeGraphReference;
  }
  /**
   * @param GeostoreLaneMarkerProto
   */
  public function setLaneMarker(GeostoreLaneMarkerProto $laneMarker)
  {
    $this->laneMarker = $laneMarker;
  }
  /**
   * @return GeostoreLaneMarkerProto
   */
  public function getLaneMarker()
  {
    return $this->laneMarker;
  }
  /**
   * @param GeostoreLevelProto
   */
  public function setLevel(GeostoreLevelProto $level)
  {
    $this->level = $level;
  }
  /**
   * @return GeostoreLevelProto
   */
  public function getLevel()
  {
    return $this->level;
  }
  /**
   * @param GeostoreLocaleProto
   */
  public function setLocale(GeostoreLocaleProto $locale)
  {
    $this->locale = $locale;
  }
  /**
   * @return GeostoreLocaleProto
   */
  public function getLocale()
  {
    return $this->locale;
  }
  /**
   * @param GeostoreLogicalBorderProto
   */
  public function setLogicalBorder(GeostoreLogicalBorderProto $logicalBorder)
  {
    $this->logicalBorder = $logicalBorder;
  }
  /**
   * @return GeostoreLogicalBorderProto
   */
  public function getLogicalBorder()
  {
    return $this->logicalBorder;
  }
  /**
   * @param GeostoreFeatureMetadataProto
   */
  public function setMetadata(GeostoreFeatureMetadataProto $metadata)
  {
    $this->metadata = $metadata;
  }
  /**
   * @return GeostoreFeatureMetadataProto
   */
  public function getMetadata()
  {
    return $this->metadata;
  }
  /**
   * @param GeostoreNameProto[]
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return GeostoreNameProto[]
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param GeostoreOperationsProto
   */
  public function setOperations(GeostoreOperationsProto $operations)
  {
    $this->operations = $operations;
  }
  /**
   * @return GeostoreOperationsProto
   */
  public function getOperations()
  {
    return $this->operations;
  }
  /**
   * @param GeostoreFeatureIdProto
   */
  public function setOriginalId(GeostoreFeatureIdProto $originalId)
  {
    $this->originalId = $originalId;
  }
  /**
   * @return GeostoreFeatureIdProto
   */
  public function getOriginalId()
  {
    return $this->originalId;
  }
  /**
   * @param GeostoreFeatureIdProto[]
   */
  public function setParent($parent)
  {
    $this->parent = $parent;
  }
  /**
   * @return GeostoreFeatureIdProto[]
   */
  public function getParent()
  {
    return $this->parent;
  }
  /**
   * @param GeostoreParkingProto
   */
  public function setParking(GeostoreParkingProto $parking)
  {
    $this->parking = $parking;
  }
  /**
   * @return GeostoreParkingProto
   */
  public function getParking()
  {
    return $this->parking;
  }
  /**
   * @param GeostorePointProto[]
   */
  public function setPoint($point)
  {
    $this->point = $point;
  }
  /**
   * @return GeostorePointProto[]
   */
  public function getPoint()
  {
    return $this->point;
  }
  /**
   * @param GeostorePoliticalProto
   */
  public function setPolitical(GeostorePoliticalProto $political)
  {
    $this->political = $political;
  }
  /**
   * @return GeostorePoliticalProto
   */
  public function getPolitical()
  {
    return $this->political;
  }
  /**
   * @param GeostorePolygonProto[]
   */
  public function setPolygon($polygon)
  {
    $this->polygon = $polygon;
  }
  /**
   * @return GeostorePolygonProto[]
   */
  public function getPolygon()
  {
    return $this->polygon;
  }
  /**
   * @param GeostorePolygonProto
   */
  public function setPolygonForDisplay(GeostorePolygonProto $polygonForDisplay)
  {
    $this->polygonForDisplay = $polygonForDisplay;
  }
  /**
   * @return GeostorePolygonProto
   */
  public function getPolygonForDisplay()
  {
    return $this->polygonForDisplay;
  }
  /**
   * @param GeostorePolyLineProto[]
   */
  public function setPolyline($polyline)
  {
    $this->polyline = $polyline;
  }
  /**
   * @return GeostorePolyLineProto[]
   */
  public function getPolyline()
  {
    return $this->polyline;
  }
  /**
   * @param GeostorePoseProto
   */
  public function setPose(GeostorePoseProto $pose)
  {
    $this->pose = $pose;
  }
  /**
   * @return GeostorePoseProto
   */
  public function getPose()
  {
    return $this->pose;
  }
  /**
   * @param GeostoreRectProto
   */
  public function setPreferredViewport(GeostoreRectProto $preferredViewport)
  {
    $this->preferredViewport = $preferredViewport;
  }
  /**
   * @return GeostoreRectProto
   */
  public function getPreferredViewport()
  {
    return $this->preferredViewport;
  }
  /**
   * @param GeostorePropertyValueStatusProto[]
   */
  public function setPropertyValueStatus($propertyValueStatus)
  {
    $this->propertyValueStatus = $propertyValueStatus;
  }
  /**
   * @return GeostorePropertyValueStatusProto[]
   */
  public function getPropertyValueStatus()
  {
    return $this->propertyValueStatus;
  }
  /**
   * @param float
   */
  public function setRank($rank)
  {
    $this->rank = $rank;
  }
  /**
   * @return float
   */
  public function getRank()
  {
    return $this->rank;
  }
  /**
   * @param GeostoreRankDetailsProto
   */
  public function setRankDetails(GeostoreRankDetailsProto $rankDetails)
  {
    $this->rankDetails = $rankDetails;
  }
  /**
   * @return GeostoreRankDetailsProto
   */
  public function getRankDetails()
  {
    return $this->rankDetails;
  }
  /**
   * @param GeostoreOntologyRawGConceptInstanceContainerProto
   */
  public function setRawGconceptInstanceContainer(GeostoreOntologyRawGConceptInstanceContainerProto $rawGconceptInstanceContainer)
  {
    $this->rawGconceptInstanceContainer = $rawGconceptInstanceContainer;
  }
  /**
   * @return GeostoreOntologyRawGConceptInstanceContainerProto
   */
  public function getRawGconceptInstanceContainer()
  {
    return $this->rawGconceptInstanceContainer;
  }
  /**
   * @param GeostoreRegulatedAreaProto
   */
  public function setRegulatedArea(GeostoreRegulatedAreaProto $regulatedArea)
  {
    $this->regulatedArea = $regulatedArea;
  }
  /**
   * @return GeostoreRegulatedAreaProto
   */
  public function getRegulatedArea()
  {
    return $this->regulatedArea;
  }
  /**
   * @param GeostoreFeatureIdProto[]
   */
  public function setRelatedBorder($relatedBorder)
  {
    $this->relatedBorder = $relatedBorder;
  }
  /**
   * @return GeostoreFeatureIdProto[]
   */
  public function getRelatedBorder()
  {
    return $this->relatedBorder;
  }
  /**
   * @param GeostoreEntranceReferenceProto[]
   */
  public function setRelatedEntrance($relatedEntrance)
  {
    $this->relatedEntrance = $relatedEntrance;
  }
  /**
   * @return GeostoreEntranceReferenceProto[]
   */
  public function getRelatedEntrance()
  {
    return $this->relatedEntrance;
  }
  /**
   * @param GeostoreRelationProto[]
   */
  public function setRelatedFeature($relatedFeature)
  {
    $this->relatedFeature = $relatedFeature;
  }
  /**
   * @return GeostoreRelationProto[]
   */
  public function getRelatedFeature()
  {
    return $this->relatedFeature;
  }
  /**
   * @param GeostoreFeatureIdProto[]
   */
  public function setRelatedTerminalPoint($relatedTerminalPoint)
  {
    $this->relatedTerminalPoint = $relatedTerminalPoint;
  }
  /**
   * @return GeostoreFeatureIdProto[]
   */
  public function getRelatedTerminalPoint()
  {
    return $this->relatedTerminalPoint;
  }
  /**
   * @param GeostoreTimezoneProto[]
   */
  public function setRelatedTimezone($relatedTimezone)
  {
    $this->relatedTimezone = $relatedTimezone;
  }
  /**
   * @return GeostoreTimezoneProto[]
   */
  public function getRelatedTimezone()
  {
    return $this->relatedTimezone;
  }
  /**
   * @param GeostoreRestrictionGroupProto
   */
  public function setRestrictionGroup(GeostoreRestrictionGroupProto $restrictionGroup)
  {
    $this->restrictionGroup = $restrictionGroup;
  }
  /**
   * @return GeostoreRestrictionGroupProto
   */
  public function getRestrictionGroup()
  {
    return $this->restrictionGroup;
  }
  /**
   * @param GeostoreRoadMonitorProto
   */
  public function setRoadMonitor(GeostoreRoadMonitorProto $roadMonitor)
  {
    $this->roadMonitor = $roadMonitor;
  }
  /**
   * @return GeostoreRoadMonitorProto
   */
  public function getRoadMonitor()
  {
    return $this->roadMonitor;
  }
  /**
   * @param GeostoreRouteProto
   */
  public function setRoute(GeostoreRouteProto $route)
  {
    $this->route = $route;
  }
  /**
   * @return GeostoreRouteProto
   */
  public function getRoute()
  {
    return $this->route;
  }
  /**
   * @param GeostoreSchoolDistrictProto
   */
  public function setSchoolDistrict(GeostoreSchoolDistrictProto $schoolDistrict)
  {
    $this->schoolDistrict = $schoolDistrict;
  }
  /**
   * @return GeostoreSchoolDistrictProto
   */
  public function getSchoolDistrict()
  {
    return $this->schoolDistrict;
  }
  /**
   * @param GeostoreSegmentProto
   */
  public function setSegment(GeostoreSegmentProto $segment)
  {
    $this->segment = $segment;
  }
  /**
   * @return GeostoreSegmentProto
   */
  public function getSegment()
  {
    return $this->segment;
  }
  /**
   * @param GeostoreSegmentPathProto
   */
  public function setSegmentPath(GeostoreSegmentPathProto $segmentPath)
  {
    $this->segmentPath = $segmentPath;
  }
  /**
   * @return GeostoreSegmentPathProto
   */
  public function getSegmentPath()
  {
    return $this->segmentPath;
  }
  /**
   * @param GeostoreRoadSignProto
   */
  public function setSign(GeostoreRoadSignProto $sign)
  {
    $this->sign = $sign;
  }
  /**
   * @return GeostoreRoadSignProto
   */
  public function getSign()
  {
    return $this->sign;
  }
  /**
   * @param GeostoreSkiBoundaryProto
   */
  public function setSkiBoundary(GeostoreSkiBoundaryProto $skiBoundary)
  {
    $this->skiBoundary = $skiBoundary;
  }
  /**
   * @return GeostoreSkiBoundaryProto
   */
  public function getSkiBoundary()
  {
    return $this->skiBoundary;
  }
  /**
   * @param GeostoreSkiLiftProto
   */
  public function setSkiLift(GeostoreSkiLiftProto $skiLift)
  {
    $this->skiLift = $skiLift;
  }
  /**
   * @return GeostoreSkiLiftProto
   */
  public function getSkiLift()
  {
    return $this->skiLift;
  }
  /**
   * @param GeostoreSkiTrailProto
   */
  public function setSkiTrail(GeostoreSkiTrailProto $skiTrail)
  {
    $this->skiTrail = $skiTrail;
  }
  /**
   * @return GeostoreSkiTrailProto
   */
  public function getSkiTrail()
  {
    return $this->skiTrail;
  }
  /**
   * @param GeostoreSocialReferenceProto
   */
  public function setSocialReference(GeostoreSocialReferenceProto $socialReference)
  {
    $this->socialReference = $socialReference;
  }
  /**
   * @return GeostoreSocialReferenceProto
   */
  public function getSocialReference()
  {
    return $this->socialReference;
  }
  /**
   * @param GeostoreSourceInfoProto[]
   */
  public function setSourceInfo($sourceInfo)
  {
    $this->sourceInfo = $sourceInfo;
  }
  /**
   * @return GeostoreSourceInfoProto[]
   */
  public function getSourceInfo()
  {
    return $this->sourceInfo;
  }
  /**
   * @param GeostoreExistenceProto
   */
  public function setStatus(GeostoreExistenceProto $status)
  {
    $this->status = $status;
  }
  /**
   * @return GeostoreExistenceProto
   */
  public function getStatus()
  {
    return $this->status;
  }
  /**
   * @param GeostoreAnchoredGeometryProto[]
   */
  public function setStorefrontGeometry($storefrontGeometry)
  {
    $this->storefrontGeometry = $storefrontGeometry;
  }
  /**
   * @return GeostoreAnchoredGeometryProto[]
   */
  public function getStorefrontGeometry()
  {
    return $this->storefrontGeometry;
  }
  /**
   * @param bool
   */
  public function setSyntheticGeometry($syntheticGeometry)
  {
    $this->syntheticGeometry = $syntheticGeometry;
  }
  /**
   * @return bool
   */
  public function getSyntheticGeometry()
  {
    return $this->syntheticGeometry;
  }
  /**
   * @param Proto2BridgeMessageSet
   */
  public function setTemporaryData(Proto2BridgeMessageSet $temporaryData)
  {
    $this->temporaryData = $temporaryData;
  }
  /**
   * @return Proto2BridgeMessageSet
   */
  public function getTemporaryData()
  {
    return $this->temporaryData;
  }
  /**
   * @param GeostoreThreeDimensionalModelProto
   */
  public function setThreeDimModel(GeostoreThreeDimensionalModelProto $threeDimModel)
  {
    $this->threeDimModel = $threeDimModel;
  }
  /**
   * @return GeostoreThreeDimensionalModelProto
   */
  public function getThreeDimModel()
  {
    return $this->threeDimModel;
  }
  /**
   * @param GeostoreTollClusterProto
   */
  public function setTollCluster(GeostoreTollClusterProto $tollCluster)
  {
    $this->tollCluster = $tollCluster;
  }
  /**
   * @return GeostoreTollClusterProto
   */
  public function getTollCluster()
  {
    return $this->tollCluster;
  }
  /**
   * @param GeostoreTrackProto[]
   */
  public function setTrack($track)
  {
    $this->track = $track;
  }
  /**
   * @return GeostoreTrackProto[]
   */
  public function getTrack()
  {
    return $this->track;
  }
  /**
   * @param GeostoreTransitLineProto
   */
  public function setTransitLine(GeostoreTransitLineProto $transitLine)
  {
    $this->transitLine = $transitLine;
  }
  /**
   * @return GeostoreTransitLineProto
   */
  public function getTransitLine()
  {
    return $this->transitLine;
  }
  /**
   * @param GeostoreTransitLineVariantProto
   */
  public function setTransitLineVariant(GeostoreTransitLineVariantProto $transitLineVariant)
  {
    $this->transitLineVariant = $transitLineVariant;
  }
  /**
   * @return GeostoreTransitLineVariantProto
   */
  public function getTransitLineVariant()
  {
    return $this->transitLineVariant;
  }
  /**
   * @param GeostoreTransitStationProto
   */
  public function setTransitStation(GeostoreTransitStationProto $transitStation)
  {
    $this->transitStation = $transitStation;
  }
  /**
   * @return GeostoreTransitStationProto
   */
  public function getTransitStation()
  {
    return $this->transitStation;
  }
  /**
   * @param string
   */
  public function setType($type)
  {
    $this->type = $type;
  }
  /**
   * @return string
   */
  public function getType()
  {
    return $this->type;
  }
  /**
   * @param GeostoreVerticalOrderingProto
   */
  public function setVerticalOrdering(GeostoreVerticalOrderingProto $verticalOrdering)
  {
    $this->verticalOrdering = $verticalOrdering;
  }
  /**
   * @return GeostoreVerticalOrderingProto
   */
  public function getVerticalOrdering()
  {
    return $this->verticalOrdering;
  }
  /**
   * @param GeostorePolygonProto
   */
  public function setWaterRemovedPolygon(GeostorePolygonProto $waterRemovedPolygon)
  {
    $this->waterRemovedPolygon = $waterRemovedPolygon;
  }
  /**
   * @return GeostorePolygonProto
   */
  public function getWaterRemovedPolygon()
  {
    return $this->waterRemovedPolygon;
  }
  /**
   * @param GeostoreUrlProto[]
   */
  public function setWebsite($website)
  {
    $this->website = $website;
  }
  /**
   * @return GeostoreUrlProto[]
   */
  public function getWebsite()
  {
    return $this->website;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GeostoreFeatureProto::class, 'Google_Service_Contentwarehouse_GeostoreFeatureProto');
