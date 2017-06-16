<?php

namespace com\boxalino\p13n\api\thrift;

use Thrift\Type\TType;
use Thrift\Exception\TProtocolException;
class Variant {
  static $_TSPEC;

  /**
   * @var string
   */
  public $variantId = null;
  /**
   * @var string
   */
  public $scenarioId = null;
  /**
   * @var \com\boxalino\p13n\api\thrift\SearchResult
   */
  public $searchResult = null;
  /**
   * @var string
   */
  public $searchResultTitle = null;
  /**
   * @var \com\boxalino\p13n\api\thrift\SearchRelaxation
   */
  public $searchRelaxation = null;
  /**
   * @var \com\boxalino\p13n\api\thrift\SearchResult[]
   */
  public $semanticFilteringResults = null;

  public function __construct($vals=null) {
    if (!isset(self::$_TSPEC)) {
      self::$_TSPEC = array(
        1 => array(
          'var' => 'variantId',
          'type' => TType::STRING,
          ),
        2 => array(
          'var' => 'scenarioId',
          'type' => TType::STRING,
          ),
        3 => array(
          'var' => 'searchResult',
          'type' => TType::STRUCT,
          'class' => '\com\boxalino\p13n\api\thrift\SearchResult',
          ),
        4 => array(
          'var' => 'searchResultTitle',
          'type' => TType::STRING,
          ),
        50 => array(
          'var' => 'searchRelaxation',
          'type' => TType::STRUCT,
          'class' => '\com\boxalino\p13n\api\thrift\SearchRelaxation',
          ),
        60 => array(
          'var' => 'semanticFilteringResults',
          'type' => TType::LST,
          'etype' => TType::STRUCT,
          'elem' => array(
            'type' => TType::STRUCT,
            'class' => '\com\boxalino\p13n\api\thrift\SearchResult',
            ),
          ),
        );
    }
    if (is_array($vals)) {
      if (isset($vals['variantId'])) {
        $this->variantId = $vals['variantId'];
      }
      if (isset($vals['scenarioId'])) {
        $this->scenarioId = $vals['scenarioId'];
      }
      if (isset($vals['searchResult'])) {
        $this->searchResult = $vals['searchResult'];
      }
      if (isset($vals['searchResultTitle'])) {
        $this->searchResultTitle = $vals['searchResultTitle'];
      }
      if (isset($vals['searchRelaxation'])) {
        $this->searchRelaxation = $vals['searchRelaxation'];
      }
      if (isset($vals['semanticFilteringResults'])) {
        $this->semanticFilteringResults = $vals['semanticFilteringResults'];
      }
    }
  }

  public function getName() {
    return 'Variant';
  }

  public function read($input)
  {
    $xfer = 0;
    $fname = null;
    $ftype = 0;
    $fid = 0;
    $xfer += $input->readStructBegin($fname);
    while (true)
    {
      $xfer += $input->readFieldBegin($fname, $ftype, $fid);
      if ($ftype == TType::STOP) {
        break;
      }
      switch ($fid)
      {
        case 1:
          if ($ftype == TType::STRING) {
            $xfer += $input->readString($this->variantId);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 2:
          if ($ftype == TType::STRING) {
            $xfer += $input->readString($this->scenarioId);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 3:
          if ($ftype == TType::STRUCT) {
            $this->searchResult = new \com\boxalino\p13n\api\thrift\SearchResult();
            $xfer += $this->searchResult->read($input);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 4:
          if ($ftype == TType::STRING) {
            $xfer += $input->readString($this->searchResultTitle);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 50:
          if ($ftype == TType::STRUCT) {
            $this->searchRelaxation = new \com\boxalino\p13n\api\thrift\SearchRelaxation();
            $xfer += $this->searchRelaxation->read($input);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 60:
          if ($ftype == TType::LST) {
            $this->semanticFilteringResults = array();
            $_size167 = 0;
            $_etype170 = 0;
            $xfer += $input->readListBegin($_etype170, $_size167);
            for ($_i171 = 0; $_i171 < $_size167; ++$_i171)
            {
              $elem172 = null;
              $elem172 = new \com\boxalino\p13n\api\thrift\SearchResult();
              $xfer += $elem172->read($input);
              $this->semanticFilteringResults []= $elem172;
            }
            $xfer += $input->readListEnd();
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        default:
          $xfer += $input->skip($ftype);
          break;
      }
      $xfer += $input->readFieldEnd();
    }
    $xfer += $input->readStructEnd();
    return $xfer;
  }

  public function write($output) {
    $xfer = 0;
    $xfer += $output->writeStructBegin('Variant');
    if ($this->variantId !== null) {
      $xfer += $output->writeFieldBegin('variantId', TType::STRING, 1);
      $xfer += $output->writeString($this->variantId);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->scenarioId !== null) {
      $xfer += $output->writeFieldBegin('scenarioId', TType::STRING, 2);
      $xfer += $output->writeString($this->scenarioId);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->searchResult !== null) {
      if (!is_object($this->searchResult)) {
        throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
      }
      $xfer += $output->writeFieldBegin('searchResult', TType::STRUCT, 3);
      $xfer += $this->searchResult->write($output);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->searchResultTitle !== null) {
      $xfer += $output->writeFieldBegin('searchResultTitle', TType::STRING, 4);
      $xfer += $output->writeString($this->searchResultTitle);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->searchRelaxation !== null) {
      if (!is_object($this->searchRelaxation)) {
        throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
      }
      $xfer += $output->writeFieldBegin('searchRelaxation', TType::STRUCT, 50);
      $xfer += $this->searchRelaxation->write($output);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->semanticFilteringResults !== null) {
      if (!is_array($this->semanticFilteringResults)) {
        throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
      }
      $xfer += $output->writeFieldBegin('semanticFilteringResults', TType::LST, 60);
      {
        $output->writeListBegin(TType::STRUCT, count($this->semanticFilteringResults));
        {
          foreach ($this->semanticFilteringResults as $iter173)
          {
            $xfer += $iter173->write($output);
          }
        }
        $output->writeListEnd();
      }
      $xfer += $output->writeFieldEnd();
    }
    $xfer += $output->writeFieldStop();
    $xfer += $output->writeStructEnd();
    return $xfer;
  }

}